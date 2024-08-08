$.validator.addMethod("pwcheck",
    function(value, element) {
        return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@#$£!%*?-£]{8,}$/.test(value);
}, 'Invalid password format.');

$.validator.addMethod("emailcheck", 
    function(value, element, param) {
        return /^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,}$/.test(value);
}, 'Please enter a valid email address.');

$.validator.addMethod("phonecheck", 
    function(value, element, param) {
        return /^[0]{1}[0-9]{10,10}$/.test(value);
}, 'Phone number must be a 11 digit number, starting with Zero.');

$.validator.addMethod("phonecheck2", 
    function(value, element, param) {
        return /^[0-9]{11,11}$/.test(value);
}, 'Phone number must be a 11 digit number');

$.validator.addMethod("referrercheck", 
    function(value, element, param) {
        if(value != "") {
            var referrerRoute = $(element).attr('data-validate-url');
            var data = new FormData();
            data.append('referrer_code', value);
            var response = false;
            $.ajax(referrerRoute, {
                method: 'POST',
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                dataType: 'json',
                async: false,
                success: function (result) {
                    if(result && result.referrer_name){
                        $("#referred_by_name").html(result.referrer_name);
                        response = true;
                    } else {
                        $("#referred_by_name").html("None");
                        response = false;
                    }
                }
            });
            return response;
        }
        else {
            $("#referred_by_name").html("None");
            return true;
        }
}, 'Invalid referral code.');