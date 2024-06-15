    jQuery(document).ready(function () {

        // tooltip
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

        // data background
        $("[data-background]").each(function () {
            $(this).css(
                "background-image",
                "url(" + $(this).attr("data-background") + ")"
            );
        });

        // copyright year
        $("#copyYear").text(new Date().getFullYear());

        // Navbar Active Class
        var curUrl = $(location).attr('href');
        var terSegments = curUrl.split("/");
        var desired_segment = terSegments[terSegments.length - 1];
        var checkLink = $('.main-menu__part a[href="' + desired_segment + '"]');
        var targetClass = checkLink.addClass('select');

        targetClass.parents(".nav_dropdown").find(".dropdown_arrow ").first().addClass('active');
        targetClass.parents().closest('.nav_dropdown').addClass("show");
        targetClass.parents().closest('.show .nav_dropdown-menu').slideToggle();


        $(".dropdown_arrow").on("click", function () {
            var $ul = $(this).next("ul");
            $(".main-menu__part .nav_dropdown ul").not($ul).slideUp();

            if ($(window).width() > 1200 && $('body').hasClass('horizontal')) {
                $ul.off('click');
            }
            else if ($(window).width() > 320 && $('body').hasClass('two-column')) {
                $ul.slideDown();
            }
            else {
                $ul.slideToggle();
            }

            $('.main-menu li button').removeClass("active");
            $(this).addClass("active");
        });


        // Add event handler for hovering over .aside-wrapper
        $('.aside-wrapper').on('mouseenter', function () {
            if ($('body').hasClass('hovered')) {
                $('body').removeClass('hovered').addClass('Vertical hove');
            }
        })
            .on('mouseleave', function () {
                if ($('body').hasClass('Vertical hove')) {
                    $('body').removeClass('Vertical hove').addClass('hovered');
                }
            });


        $('.nav_tab').on('click', function () {
            $('.aside-wrapper, .company-logo, .top-menu, .main-content, .footer, .two-column_logo').toggleClass('short');
            var windowWidth = $(window).width();
            if (windowWidth < 1199) {
                $('body').addClass('overlayo');
            }
        });

        function checkWindowWidth() {
            if ($(window).width() < 1199) {
                $(document).on("click", function (event) {
                    if (!$(event.target).closest('.aside-wrapper, .company-logo, .nav_tab, .search__form_nav').length && !$(event.target).is('.nav_tab')) {
                        $('body').removeClass('overlayo');
                        $('.aside-wrapper, .company-logo, .two-column_logo').addClass('short');
                        $('.navbar-toggle-item').slideUp(300);
                        $('body').removeClass('overflow-hidden');
                        $('.navbar-toggle-btn').removeClass('open');
                        $('.search__form_nav').removeClass("show");
                    }
                });
            } else {
                $(document).off("click");
            }
        }

        // Initial check on document ready
        checkWindowWidth();

        // Check on window resize
        $(window).on('resize', function () {
            checkWindowWidth();
        });



        // navbar custom
        $('.navbar-toggle-btn').on('click', function () {
            $('.navbar-toggle-item').slideToggle(300);
            $('body').toggleClass('overflow-hidden');
            $(this).toggleClass('open');
        });

        // navbar cross
        $(".close_nav").on("click", function () {
            $('.aside-wrapper, .company-logo, .top-menu, .main-content, .footer, .two-column_logo').addClass('short');
            $('.navbar-toggle-item').slideUp(300);
            $('body').removeClass('overflow-hidden');
            $('.navbar-toggle-btn').removeClass('open');
            $('body').removeClass('overlayo');
        });

        // nav_search_short
        $(".nav_search_short").on("click", function (event) {
            event.stopPropagation();
            $(this).toggleClass("active");
            $('.search__form_nav').toggleClass("show");
        });


        function checkWindowWidth2() {
            if ($(window).width() > 120) {
                $(document).on("click", function (event) {
                    if (!$(event.target).closest('.search__form_nav').length && !$(event.target).is('.search__form_nav')) {
                        $('.search__form_nav').removeClass("show");
                        $('.nav_search_short').removeClass("active");
                    }
                });
            } else {
                $(document).off("click");
            }
        }

        // Initial check on document ready
        checkWindowWidth2();

        // Check on window resize
        $(window).on('resize', function () {
            checkWindowWidth2();
        });



        // exchange_btn
        $(".exchange_btn").on("click", function () {
            $('.from_area').toggleClass("exchange");
        });

        // Navbar Custom Menu Button
        $('.navbar-toggler').on('click', function () {
            $(this).toggleClass('open');
        });

        // Custom Tabs
        $(".tablinks .nav-links").each(function () {
            var targetTab = $(this).closest(".singletab");
            targetTab.find(".tablinks .tablink").each(function () {
                var navBtn = targetTab.find(".tablinks .tablink");
                navBtn.click(function () {
                    navBtn.removeClass('active');
                    $(this).addClass('active');
                    var indexNum = $(this).closest("li").index();
                    var tabcontent = targetTab.find(".tabcontents .tabitem");
                    $(tabcontent).removeClass('active');
                    $(tabcontent).eq(indexNum).addClass('active');
                });
            });
        });


        // windowWidth auto resize
        function handleWindowResize() {
            var windowWidth = $(window).width();

            if (windowWidth < 1199) {
                $('.aside-wrapper, .company-logo, .main-content, .footer, .top-menu, .two-column_logo').addClass('short');;
                $('.navbar-toggle-item').slideUp(300);
                $('body').removeClass('overflow-hidden');
                $('.navbar-toggle-btn').removeClass('open');
                $('body').removeClass("overlayo");
                $('.search__form_nav').removeClass("show");
            } else {
                $('.aside-wrapper, .company-logo, .main-content, .footer, .top-menu, .two-column_logo').removeClass('short');
            }
        }

        // Attach the handleWindowResize function to the window resize event
        $(window).resize(function () {
            handleWindowResize();
        });

        const isWindowNarrow = window.innerWidth < 1199;
        $('.aside-wrapper, .company-logo, .top-menu, .main-content, .footer').toggleClass('short', isWindowNarrow);
        $('.top-menu').removeClass("short", isWindowNarrow);




        if (document.querySelector(".clone_area")) {
            // clone
            const toggleSwitch = document.querySelector('.toggle-switch');
            const nav_tab = document.querySelector('.nav_tab.second');
            const notification_area = document.querySelector('.notification_area');
            const lang_nav = document.querySelector('.lang_nav');
            const userAccount = document.querySelector('.user-account');

            const clonetoggleSwitch = toggleSwitch.cloneNode(true);
            const clonenav_tab = nav_tab.cloneNode(true);
            const clonedNotification = notification_area.cloneNode(true);
            const clonelang_nav = lang_nav.cloneNode(true);
            const cloneuserAccount = userAccount.cloneNode(true);

            const cloneArea = document.querySelector('.clone_area');

            cloneArea.appendChild(clonetoggleSwitch);
            cloneArea.appendChild(clonelang_nav);
            cloneArea.appendChild(nav_tab);
            cloneArea.appendChild(clonedNotification);
            cloneArea.appendChild(cloneuserAccount);
        }


        $(window).resize(function () {
            var windowWidth = $(window).width();
            if (windowWidth < 1700) {
                $('.four_grid > div').removeClass('col-xxl-3').addClass('col-xxl-4');
            } else {
                $('.four_grid > div').removeClass('col-xxl-4').addClass('col-xxl-3');
            }
        });

        // Triggering the resize event on page load
        $(window).resize();


        // active
        $(window).scroll(function() {
            var windscroll = $(window).scrollTop();
            if (windscroll >= 100) {
                $('.terms__part').each(function(i) {
                    if ($(this).position().top <= windscroll + 280) {
                        $('.terms_list li a.active').removeClass('active');
                        $('.terms_list li a').eq(i).addClass('active');
                        // $('.terms__part.active').removeClass('active');
                        // $('.terms__part').eq(i).addClass('active');
                    }
                });

            } else {

                $('.terms_list li a.active').removeClass('active');
                $('.terms_list li a:first').addClass('active');
                // $('.terms__part.active').removeClass('active');
                // $('.terms__part:first').addClass('active');
            }
        }).scroll();


        // page functiion
        // Password Show Hide
        $('.password-eye-icon').on('click', function () {
            var passwordInput = $($(this).siblings(".input-pass input"));

            if (passwordInput.attr("type") == "password") {
                passwordInput.attr("type", "text");
            } else {
                passwordInput.attr("type", "password");
            }
            $(this).toggleClass('visible');
        });


        // box_drop
        $(".box_drop_button__top").on("click", function () {
            $(this).toggleClass("rotate");
            $(this).parent().next(".box_drop").slideToggle();
        });

        // identity
        $(".address_identity button").on("click", function () {
            $('.address_identity button').removeClass("btn_active");
            $(this).addClass("btn_active");
        });
        $(".verification_identity button").on("click", function () {
            $('.verification_identity button').removeClass("btn_active");
            $(this).addClass("btn_active");
        });

        // three dot
        $(".action_setting").on("click", function () {
            var $dot = $(this).next(".action_drop");
            $(".action_drop").not($dot).slideUp();
            $(this).next(".action_drop").slideToggle();
        });
        $(document).on("click", function (event) {
            if (!$(event.target).closest('.action_drop').length && !$(event.target).is('.action_setting')) {
                $('.action_drop').slideUp();
            }
        });

        // search__form
        $(".nav_search").on("click", function () {
            $('.search__form_nav').toggleClass("show");
        });

        // reply
        $(".reply").on("click", function () {
            $(this).toggleClass("reply-active");
            $(this).parent().next(".reply__content").slideToggle();
        });

        // sidebar_btn inner page
        $(".sidebar_btn").on("click", function () {
            $('.mail_menu').toggleClass("show");
        });
        $(".sidebar_btn_chat").on("click", function () {
            $('.single_box.chat_menu').toggleClass("show");
        });
        $(".sidebar_btn__account").on("click", function () {
            $('.profile__account__box').toggleClass("show");
        });
        $(".sidebar_btn__acc_setting").on("click", function () {
            $('.account-profile__menu').toggleClass("show");
        });

        // lang_nav
        $(".nav_dropdown_btn").on("click", function () {
            $(this).parents(".lang_nav").find(".lang_nav_list").toggleClass('show');
            $(this).parents(".lang_nav").find(".nav_dropdown_btn").toggleClass('active');
        });
        $(document).on("click", function (event) {
            if (!$(event.target).closest('.lang_nav').length && !$(event.target).is('.nav_dropdown_btn')) {
                $(".lang_nav_list").removeClass('show');
                $(".nav_dropdown_btn").removeClass('active');
            }
        });
        // lang_nav
        $(".lang_nav_list li").on("click", function () {
            $(".lang_nav_list").removeClass('show');
            $(".nav_dropdown_btn").removeClass('active');
        });

        // user-profile
        $(".profile-nav").on("click", function () {
            $(this).parents(".user-account").find(".user-profile ").toggleClass('show');
        });
        $(document).on("click", function (event) {
            if (!$(event.target).closest('.user-account').length && !$(event.target).is('.profile-nav')) {
                $(".user-profile.show").removeClass('show');
            }
        });

        // notification_nav
        $(".notification_icon").on("click", function () {
            $(this).parents(".notification_area").find(".notification_nav ").toggleClass('show');
            $(this).parents(".notification_area").find(".notification_icon ").toggleClass('active');
        });
        $(document).on("click", function (event) {
            if (!$(event.target).closest('.notification_area').length && !$(event.target).is('.notification_icon')) {
                $(".notification_nav.show").removeClass('show');
                $(".notification_icon").removeClass('active');
            }
        });

        // nav_layout
        $(".nav_layout").on("click", function () {
            $(this).toggleClass('active');
        });
        $(document).on("click", function (event) {
            if (!$(event.target).closest('.nav_layout').length && !$(event.target).is('.nav_layout')) {
                $(".nav_layout").removeClass('active');
            }
        });


        // sidebar
        $(".profile-link__top").on("click", function () {
            $(this).toggleClass("active");
            $(".profile-link").slideToggle();
        });



        // Selection row bg
        $(".favorite_btn").on("click", function () {
            $(this).toggleClass('fill');
        });



        // // contact form
        // // ajax
        // jQuery('#frmContactus').on('submit', function (e) {
        //     jQuery('#msg').html('');
        //     jQuery('#submit').html('Please wait....');
        //     jQuery('#submit').attr('disabled', true);
        //     jQuery.ajax({
        //         url: 'mail.php',
        //         type: 'POST',
        //         data: jQuery('#frmContactus').serialize(),
        //         success: function (result) {
        //             jQuery('#msg').html(result);
        //             jQuery('#submit').html('Send Message');
        //             jQuery('#submit').attr('disabled', false);
        //             jQuery('#frmContactus')[0].reset();

        //             setTimeout(function () {
        //                 $('.alert-dismissible').fadeOut('slow', function () {
        //                     $(this).remove();
        //                 });
        //             }, 3000);
        //         }
        //     });
        //     e.preventDefault();
        // });

        // // Email Subscribe
        // jQuery('#frmSubscribe').on('submit', function (e) {
        //     var emailSubscribe = jQuery("input[name='sMail']").val();
        //     jQuery('#subscribeMsg').html('');
        //     jQuery('#emailSubscribe').html('Please wait....');
        //     jQuery('#emailSubscribe').attr('disabled', true);
        //     jQuery.ajax({
        //         url: 'mail.php',
        //         type: 'POST',
        //         data: {
        //             'subscribes': '',
        //             'emailSubscribe': emailSubscribe
        //         },
        //         success: function (result) {
        //             jQuery('#subscribeMsg').html(result);
        //             jQuery('#emailSubscribe').html('Subscribe');
        //             jQuery('#emailSubscribe').attr('disabled', false);
        //             jQuery('#frmSubscribe')[0].reset();

        //             setTimeout(function () {
        //                 $('.alert-dismissible').fadeOut('slow', function () {
        //                     $(this).remove();
        //                 });
        //             }, 3000);
        //         }
        //     });
        //     e.preventDefault();
        // });

        // cmn-btn effect
        $(function () {
            $('.cmn-btn')
                .on('mousemove', function (e) {
                    var parentOffset = $(this).offset(),
                        relX = e.pageX - parentOffset.left,
                        relY = e.pageY - parentOffset.top;
                    $(this).css({ '--top': relY + 'px', '--left': relX + 'px' });
                });
        });
        $(function () {
            $('.btn_box')
                .on('mousemove', function (e) {
                    var parentOffset = $(this).offset(),
                        relX = e.pageX - parentOffset.left,
                        relY = e.pageY - parentOffset.top;
                    $(this).css({ '--top': relY + 'px', '--left': relX + 'px' });
                });
        });


        // toggleSwitch dark-light mode
        if (document.querySelector(".toggle-switch")){

            const toggleSwitch = document.getElementById('checkbox');
            const currentMode = localStorage.getItem('theme');

            if (currentMode) {
                document.documentElement.setAttribute('data-mode', currentMode);

                if (currentMode === 'dark') {
                    toggleSwitch.checked = true;
                }
            }

            function switchTheme(e) {
                if (e.target.checked) {
                    document.documentElement.setAttribute('data-mode', 'dark');
                    localStorage.setItem('theme', 'dark');
                }
                else {
                    document.documentElement.setAttribute('data-mode', 'light');
                    localStorage.setItem('theme', 'light');
                }
            }

            toggleSwitch.addEventListener('change', switchTheme, false);
        }

        // cssProgress bar
        $('.cssProgress').each(function () {
            var self = $(this);
            var progress_bar = self.find('.cssProgress-bar');
            var progress_label = self.siblings('.cssProgress-label');
            var progress_value = progress_bar.data('percent');
            var percentage = parseInt(progress_value, 10) + '%';

            progress_bar.css({
                'width': '0%',
                'transition': 'none',
                '-webkit-transition': 'none',
                '-moz-transition': 'none'
            });

            progress_bar.animate({
                width: percentage
            }, {
                duration: 1000,
                step: function (x) {
                    progress_label.text(Math.round(x) + '%');
                }
            });
        });

        // checkAll
        $(".checkAll").on("click", function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        $('input[type="checkbox"]').not('.checkAll').click(function() {
            if (!$(this).prop('checked')) {
                $(".checkAll").prop('checked', false);
            }
        });


        // custom Accordion
        $('.accordion-single .header-area').on('click', function () {
            if ($(this).closest(".accordion-single").hasClass("active")) {
                $(this).closest(".accordion-single").removeClass("active");
                $(this).next(".content-area").slideUp();
            } else {
                $(".accordion-single").removeClass("active");
                $(this).closest(".accordion-single").addClass("active");
                $(".content-area").not($(this).next(".content-area")).slideUp();
                $(this).next(".content-area").slideToggle();
            }
        });


        // file drag & drop
        $('.file-input').on('click', function() {
            $('#file_upload').trigger('click');
        });

        $('#file_upload').on('change', function() {
            let filesCount = this.files.length;
            let $textContainer = $(this).next(".kwt-file__msg");
            let placeholderText = $(this).attr('placeholder') || '';

            if (filesCount === 1) {
                let fileName = $(this).val().split("\\").pop();
                $textContainer.text(fileName).next(".kwt-file__delete").show();
            } else if (filesCount > 1) {
                $textContainer.text(filesCount + " files selected").next(".kwt-file__delete").show();
            } else {
                $textContainer.text(placeholderText).next(".kwt-file__delete").hide();
            }
        });

    });


// // // java script

// // cus_dropdowna with body image
const clone_cus_drop_lang = document.querySelector(".clone_area .lang_nav");
const cus_drop_lang = document.querySelector(".lang_nav");
// custom dropdown for body
if (cus_drop_lang) {

    function toggleDropNav() {
        const lang_nav_list = document.querySelector(".lang_nav_list");
    }

    function selectOptionNav(navItem, navImgSrc) {
        const dropdownContent = document.querySelector(".nav_lang");
        const flagImage = document.querySelector(".flag-img");

        dropdownContent.textContent = navItem;
        flagImage.src = navImgSrc;

        toggleDropNav();
    }
}





// // cus_dropdowna with body image
const cus_dropdowna = document.querySelector(".cus_dropdowna");
// custom dropdown for body
if (cus_dropdowna) {
    document.addEventListener("click", function (event) {
        const dropdownLists = document.querySelector(".dropdownLists");
        const isClickInsideDropdown = cus_dropdowna.contains(event.target);

        if (!isClickInsideDropdown) {
            dropdownLists.classList.remove("show");
        }
    });

    function toggleDropdowna() {
        const dropdownLists = document.querySelector(".dropdownLists");
        dropdownLists.classList.toggle("show");

        // Rotate the dropIcon when the dropdown is toggled
        const dropIcon = document.querySelector(".dropdown-btn .dropIcon");
        dropIcon.classList.toggle("rotated");
    }

    function selectOptions(item, imageSrc) {
        const dropdownContent = document.querySelector(".dropdownBtns");
        const itemImage = document.querySelector(".item-images");

        dropdownContent.textContent = item;
        itemImage.src = imageSrc;

        toggleDropdowna();
    }

    // Function to rotate the dropIcon separately without toggling the dropdown
    // const dropBtn = document.querySelector(".dropdown-btn");
    // dropBtn.addEventListener("click", function () {
    //     const dropIcon = this.querySelector(".dropIcon");
    //     dropIcon.classList.toggle("rotated");
    // });
}


// layout_change
if (document.querySelector("#layout_change")) {
    function handleChange() {
        let selectedLayout = document.querySelector(".nav_layout__dropdown li.active").textContent.toLowerCase();
        document.body.className = selectedLayout;

        // Save selected layout to localStorage
        localStorage.setItem('selectedLayout', selectedLayout);
    }

    document.addEventListener("DOMContentLoaded", function () {
        let layoutSelect = document.querySelector(".nav_layout__dropdown");
        let options = layoutSelect.getElementsByTagName("li");

        for (let i = 0; i < options.length; i++) {
            options[i].addEventListener("click", function () {
                for (let j = 0; j < options.length; j++) {
                    options[j].classList.remove("active");
                }
                options[i].classList.add("active");

                handleChange();
            });
        }

        // Set the initial layout from localStorage if available
        if (localStorage.getItem('selectedLayout')) {
            let storedLayout = localStorage.getItem('selectedLayout');
            document.body.className = storedLayout;

            // Set the corresponding option as active
            for (let i = 0; i < options.length; i++) {
                if (options[i].textContent.toLowerCase() === storedLayout) {
                    options[i].classList.add('active');
                }
            }
        } else {
            // Call handleChange initially to set the body class to the default value
            handleChange();
        }
    });
}


