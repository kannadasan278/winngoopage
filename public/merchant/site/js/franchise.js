var categoriesList = [];
var options = [];

$(function() {
    $("body").tooltip({ selector: "[data-toggle=tooltip]" });
    // Function to disable all <a> tags inside the <ul>
    function disableLinksfree() {
        $('ul[role="tablist"] a').each(function() {
            $(this)
                .addClass("disabled")
                .attr("tabindex", "-1")
                .attr("aria-disabled", "true");
        });

        $('ul[role="tablist"] li').each(function() {
            $(this)
                .attr("aria-disabled", "true")
                .addClass("disabled");
        });
    }
    var form = $("#merchant-signup-form");
    $.validator.addMethod(
        "emailExists",
        function(value, element) {
            let result = false;
            $.ajax({
                type: "POST",
                url: merchantregistration,
                data: { email: value, _token: csrf },
                async: false,
                success: function(response) {
                    result = !response.email_exists;
                }
            });
            return result;
        },
        "Email already registered."
    );
    $.validator.addMethod(
        "filesize",
        function(value, element, param) {
            // param is the size limit in bytes (200 * 1024 = 204800 bytes)
            return this.optional(element) || element.files[0].size <= param;
        },
        "File size must be less than 200KB"
    );
    form.validate({
        rules: {
            business_type_id: {
                required: true
            },

            email: {
                required: true,
                email: true,
                emailcheck: true,
                emailExists: true
            },
            confirmemail: {
                required: true,
                equalTo: "#email"
            },
            password: {
                required: true,
                pwcheck: true
            },
            confirm_password: {
                required: true,
                equalTo: "#password"
            },
            phone_number: {
                required: true,
                phonecheck2: true
            },
            referral_code: {
                referrercheck: true
            },
            image: {
                required: true,
                filesize: 204800 // 200 KB in bytes
            }
        },
        messages: {
            business_type_id: {
                required: "Please choose your business type."
            },

            email: {
                required: "This field is required.",
                email: "Please enter a valid email address."
            },
            confirmemail: {
                required: "This field is required.",
                equalTo: "The email confirmation does not match."
            },
            password: {
                required: "This field is required.",
                equalTo: "The password confirmation does not match."
            },
            confirm_password: {
                required: "This field is required.",
                equalTo: "The password confirmation does not match."
            },
            phone_number: {
                required: "This field is required."
            },
            image: {
                required: "Please upload an image",
                filesize: "File size must be less than 200KB"
            }
        },
        errorPlacement: function(error, element) {
            if (
                element.parent().hasClass("input-group") ||
                element.parent().hasClass("custom-checkbox") ||
                element.parent().hasClass("multiselect-section")
            ) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });

    $("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        transitionEffectSpeed: 500,
        onInit: function(event, currentIndex) {
            if (currentIndex == 0) {
                $("#tab-header-text").text("Personal Information");
            }
        },
        onStepChanging: function(event, currentIndex, newIndex) {
            var headerText = "";
            switch (newIndex) {
                case 0:
                    headerText = "Personal Information";
                    break;
                case 1:
                    headerText = "Manager/Owner Details";
                    break;
                case 2:
                    headerText = "Additional Information";
                    break;
                case 3:
                    headerText = "Business Information";
                    break;
                case 4:
                    headerText = "Working Hours";
                    break;
            }
            if (newIndex > currentIndex) {
                if (currentIndex == 3) {
                    form.validate().settings.ignore = [
                        ':hidden:not("#category")',
                        ':hidden:not("#sub_category")'
                    ];
                }

                var isValid = form.valid();
                if (isValid) {
                    $("#tab-header-text").text(headerText);
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        },
        onStepChanged: function(event, currentIndex, priorIndex) {
            var placeIndex = currentIndex + 1;
            $(".wizard > .steps li:nth-child(" + placeIndex + ")").addClass(
                "checked"
            );
            $(".wizard > .steps li:nth-child(" + placeIndex + ")")
                .prevAll()
                .addClass("checked");
            $(".wizard > .steps li:nth-child(" + placeIndex + ")")
                .nextAll()
                .removeClass("checked");
        },
        onFinished: function(event, currentIndex) {
                var formData = new FormData(form[0]);

                $.ajax({
                    type: "POST",
                    url: form.attr("action"), // Ensure your form has an action attribute or update this to your URL
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Show success alert
                        $("#merchant_success").attr("style", "display:block");
                        $('#merchant_success').text(response.message);

                        $("#wizard-t-0").trigger("click");
                        $("#tab-header-text").text("Personal Information");
                          setTimeout(function() {
                              $("#merchant_success").attr(
                                  "style",
                                  "display:none"
                              );
                          }, 9000);
                        // Reset the form fields
                        form[0].reset();
                        // Optionally, you can reset other parts of the form, such as select elements or dynamically added fields
                        form.find("select").val('-1'); // Reset selects to default value
                        form.find("input[type=checkbox], input[type=radio]").prop('checked', false); // Uncheck checkboxes and radios
                        form.find("input[type=file]").val(''); // Clear file inputs

                        // Optionally, handle additional UI changes or redirections here
                    },
                    error: function(xhr) {
                        // Extract and display error messages
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = "";
                        $.each(errors, function(key, value) {
                            errorMessage += value + "\n";
                        });
                        alert("Error submitting form: \n" + errorMessage);

                    },
                    });
                },
        labels: {
            finish: "Submit",
            next: "Next",
            previous: "Previous"
        }
    });

    $("#category").multiselect({
        buttonWidth: "100%",
        includeSelectAllOption: true,
        onChange: function(option, checked) {
            loadSubcategories(option.val(), checked);
        }
    });

    $("#sub_category").multiselect({
        buttonWidth: "100%",
        includeSelectAllOption: true
    });

    $(".date").datetimepicker({
        format: "LT",
        icons: {
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down"
        }
    });
});


$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

function loadSubcategories(categoryId, catStatus) {
    $.ajax({
        method: "POST",
        url: categorySubcategoryRoute,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        data: {
            category_id: categoryId
        },
        dataType: "json",
        async: false,
        beforeSend: function() {
            $("#overlay").fadeIn();
        },
        success: function(data) {
            var slctSubcat = $("#sub_category"),
                option = "";
            slctSubcat.empty();
            if (catStatus == 1) {
                categoriesList.push(categoryId);
                for (var i = 0; i < data.length; i++) {
                    option += `<option value="${data[i].id}">${data[i].subcategory_name_en}</option>`;
                    options.push({
                        label: data[i].subcategory_name_en,
                        title: data[i].subcategory_name_en,
                        value: data[i].id
                    });
                }
            } else {
                categoriesList.splice(categoriesList.indexOf(categoryId), 1);
                for (var i = 0; i < data.length; i++) {
                    option += `<option value="${data[i].id}">${data[i].name}</option>`;
                    options = options.filter(opt => opt.value !== data[i].id);
                }
            }
            slctSubcat.append(option);
            $("#sub_category").multiselect("dataprovider", options);
        }
    });
}

function initialize() {
    var input = document.getElementById("address_line_1");
    var autocomplete = new google.maps.places.Autocomplete(input);

    google.maps.event.addListener(autocomplete, "place_changed", function() {
        var place = autocomplete.getPlace();
        $("#latitude").val(place.geometry.location.lat());
        $("#longitude").val(place.geometry.location.lng());

        place.address_components.forEach(component => {
            component.types.forEach(type => {
                if (type == "postal_code") {
                    $("#post_code").val(component["long_name"]);
                }
                if (type == "locality") {
                    $("#city").val(component["long_name"]);
                }
                if (type == "country") {
                    $("#country")
                        .val(component["long_name"])
                        .change();
                }
            });
        });
    });
}

google.maps.event.addDomListener(window, "load", initialize);
