(function ($) {
    ("use strict");
  
     // auto generated side menu from top header menu start
      var topHeaderMenu = $("header nav > ul").clone();
      var sideMenu = $(".side-menu-wrap nav");
      sideMenu.append(topHeaderMenu);
      if ($(sideMenu).find(".sub-menu").length != 0) {
        $(sideMenu)
          .find(".sub-menu")
          .parent()
          .append('<i class="fas fa-chevron-right d-flex align-items-center"></i>');
      }
      // auto generated side menu from top header menu end
  
      // close menu when clicked on menu link start
      // $('.side-menu-wrap nav > ul > li > a').on('click', function () {
      //   sideMenuCloseAction();
      // });
      // close menu when clicked on menu link end
  
      // open close sub menu of side menu start
      var sideMenuList = $(".side-menu-wrap nav > ul > li > i");
      $(sideMenuList).on("click", function () {
        if (!$(this).siblings(".sub-menu").hasClass("d-block")) {
          $(this).siblings(".sub-menu").addClass("d-block");
        } else {
          $(this).siblings(".sub-menu").removeClass("d-block");
        }
      });
      // open close sub menu of side menu end
  
      // side menu close start
      $(".side-menu-close").on("click", function () {
        if (!$(".side-menu-close").hasClass("closed")) {
          $(".side-menu-close").addClass("closed");
        } else {
          $(".side-menu-close").removeClass("closed");
        }
      });
      // side menu close end
  
      // auto append overlay to body start
      $(".wrapper").append('<div class="custom-overlay h-100 w-100"></div>');
      // auto append overlay to body end
  
      // open side menu when clicked on menu button start
      $(".side-menu-close").on("click", function () {
        if (
          !$(".side-menu-wrap").hasClass("opened") &&
          !$(".custom-overlay").hasClass("show")
        ) {
          $(".side-menu-wrap").addClass("opened");
          $(".custom-overlay").addClass("show");
        } else {
          $(".side-menu-wrap").removeClass("opened");
          $(".custom-overlay").removeClass("show");
        }
      });
      // open side menu when clicked on menu button end
  
      // close side menu when clicked on overlay start
      $(".custom-overlay").on("click", function () {
        sideMenuCloseAction();
      });
      // close side menu when clicked on overlay end
  
      // close side menu when swiped start
      var isDragging = false,
        initialOffset = 0,
        finalOffset = 0;
      $(".side-menu-wrap")
        .mousedown(function (e) {
          isDragging = false;
          initialOffset = e.offsetX;
        })
        .mousemove(function () {
          isDragging = true;
        })
        .mouseup(function (e) {
          var wasDragging = isDragging;
          isDragging = false;
          finalOffset = e.offsetX;
          if (wasDragging) {
            if (initialOffset > finalOffset) {
              sideMenuCloseAction();
            }
          }
        });
      // close side menu when swiped end
  
      function sideMenuCloseAction() {
        $(".side-menu-wrap").addClass("open");
        $(".wrapper").addClass("freeze");
        $(".custom-overlay").removeClass("show");
        $(".side-menu-wrap").removeClass("opened");
        $(".side-menu-close").removeClass("closed");
        $(sideMenuList).siblings(".sub-menu").removeClass("d-block");
      }
      // close side menu when clicked on overlay end
  
      // close side menu over 992px start
      $(window).on("resize", function () {
        if ($(window).width() >= 992) {
          sideMenuCloseAction();
        }
      });
      // close side menu over 992px end
  
      // Wow Js
      wow = new WOW(
        {
          boxClass: 'wow',      // default
          animateClass: 'animated', // default
          offset: 100,          // default
          mobile: true,       // default
          live: true        // default
        }
      )
      wow.init();
  
      $(window).on("scroll", function () {
        function isScrollIntoView(elem, index) {
          var docViewTop = $(window).scrollTop();
          var docViewBottom = docViewTop + $(window).height();
          var elemTop = $(elem).offset().top;
          var elemBottom = elemTop + $(window).height() * 0.5;
          if (elemBottom <= docViewBottom && elemTop >= docViewTop) {
            $(elem).addClass("active");
          }
          if (!(elemBottom <= docViewBottom)) {
            $(elem).removeClass("active");
          }
        }
        var timeline = $(".vertical-scrollable-timeline li");
        Array.from(timeline).forEach(isScrollIntoView);
      });
      
      // section menu active
    // function onScroll(event) {
    //   var sections = document.querySelectorAll('.js-scroll-trigger');
    //   var scrollPos = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;

    //   for (var i = 0; i < sections.length; i++) {
    //     var currLink = sections[i];
    //     var val = currLink.getAttribute('href');
    //     var refElement = document.querySelector(val);
    //     var scrollTopMinus = scrollPos + 73;
    //     console.log('scrollTopMinus', scrollTopMinus);
    //     if (refElement.offsetTop <= scrollTopMinus && (refElement.offsetTop + refElement.offsetHeight > scrollTopMinus)) {
    //       document.querySelector('.js-scroll-trigger').classList.remove('active');
    //       currLink.classList.add('active');
    //     } else {
    //       currLink.classList.remove('active');
    //     }
    //   }
    // };

    // window.document.addEventListener('scroll', onScroll);
    
    // // for menu scroll 
    // var pageLink = document.querySelectorAll('.js-scroll-trigger');

    // pageLink.forEach(elem => {
    //     elem.addEventListener('click', e => {
    //         e.preventDefault();
    //         document.querySelector(elem.getAttribute('href')).scrollIntoView({
    //             behavior: 'smooth',
    //             offsetTop: 1 - 60,
    //         });
    //     });
    // });
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function () {
     
      if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
       
       
      var target = $(this.hash);
          target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
      var headerHeight = $('.header').innerHeight() + 30;
          if (target.length) {
            $('.js-scroll-trigger').removeClass('active');
            $('.js-scroll-trigger[href="'+ this.hash +'"]').addClass('active');
            if(location.hash.match('#')){
              
              window.location.replace(window.location.href.split('#')[0] + $(this).attr('href'));
            }
           
              $("html, body").animate(
                  {
                      scrollTop: target.offset().top - headerHeight,
                  },
                  1000,
                  "easeInOutExpo"
              );
              return false;
          }
      }
    });

  // $("body").scrollspy({
  //     target: "#mainNav",
  //     offset: 120,
  // });
    
  
  })(jQuery);
$(window).on('load',function(){
  
  if (location.hash) {
         
    var target = $(location.hash);
        target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
   
      if (target.length) {
          $('.js-scroll-trigger').removeClass('active');
          $('.js-scroll-trigger[href="'+ location.hash +'"]').addClass('active');
          $("html, body").animate(
              {
                  scrollTop: target.offset().top - 130,
              },
              1000,
              "easeInOutExpo"
          );
          return false;
      }
  }
  
});
 