$(function () {
    "use strict";



    /* ==========================================================================
   Prevend Right and button click 
   ========================================================================== */


    $("body").on("contextmenu", function (e) {
        return false;
    });
    $(document).keydown(function (e) {
        if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 || e.keyCode === 117)) {
            return false;
        }
        if (e.which === 123) {
            return false;
        }
        if (e.metaKey) {
            return false;
        }
        //document.onkeydown = function(e) {
        // "I" key
        if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
            return false;
        }
        // "J" key
        if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
            return false;
        }
        // "S" key + macOS
        if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
            return false;
        }
        if (e.keyCode == 224 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
            return false;
        }
        // "U" key
        if (e.ctrlKey && e.keyCode == 85) {
            return false;
        }
        // "F12" key
        if (event.keyCode == 123) {
            return false;
        }
    });



    /* ==========================================================================
   On Scroll animation
   ========================================================================== */

    if ($(window).width() > 992) {
        new WOW().init();
    };



    /* ==========================================================================
   Tweet
   ========================================================================== */


    $('.tweet').twittie({
        username: 'envatomarket', // change username here
        dateFormat: '%b. %d, %Y',
        template: '{{tweet}} {{user_name}}',
        count: 10
    }, function () {
        var item = $('.tweet ul');

        item.children('li').first().show().siblings().hide();
        setInterval(function () {
            item.find('li:visible').fadeOut(500, function () {
                $(this).appendTo(item);
                item.children('li').first().fadeIn(500);
            });
        }, 5000);
    });

    /* ==========================================================================
   countdown
   ========================================================================== */

    $('.countdown').downCount({
        date: '04/30/2022 12:00:00' // m/d/y
    });


    /* ==========================================================================
     sub form
     ========================================================================== */

    var $form = $('#mc-form');

    $('#mc-subscribe').on('click', function (event) {
        if (event)
            event.preventDefault();
        register($form);
    });

    function register($form) {
        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            cache: false,
            dataType: 'json',
            contentType: "application/json; charset=utf-8",
            error: function (err) {
                $('#mc-notification').hide().html('<span class="alert">Could not connect to server. Please try again later.</span>').fadeIn("slow");

            },
            success: function (data) {

                if (data.result != "success") {
                    var message = data.msg.substring(4);
                    $('#mc-notification').hide().html('<span class="alert"><i class="fa fa-exclamation-triangle"></i>' + message + '</span>').fadeIn("slow");

                } else {
                    var message = data.msg.substring(4);
                    $("#mc-form")[0].reset();
                    $('#mc-notification').hide().html('<span class="success"><i class="fa fa-envelope"></i>' + 'Awesome! Subscription confirmed.' + '</span>').fadeIn("slow");

                }
            }
        });
    }


    /* ==========================================================================
     Textrotator
     ========================================================================== */



    $(".rotate").textrotator({
        animation: "dissolve",
        separator: ",",
        speed: 2500
    });

    /* ==========================================================================
       Contact Form
       ========================================================================== */


    $('#contact-form').validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },

            message: {
                required: true,
                minlength: 10
            }
        },
        messages: {
            name: "<i class='fa fa-exclamation-triangle'></i>Please specify your name.",
            email: {
                required: "<i class='fa fa-exclamation-triangle'></i>We need your email address to contact you.",
                email: "<i class='fa fa-exclamation-triangle'></i>Please enter a valid email address."
            },
            message: "<i class='fa fa-exclamation-triangle'></i>Please enter your message."
        },
        submitHandler: function (form) {
            $(form).ajaxSubmit({
                type: "POST",
                data: $(form).serialize(),
                url: "php/contact-me.php",
                success: function () {
                    $("#contact-form")[0].reset();
                    $('#contact-form :input').attr('disabled', 'disabled');
                    $('#contact-form').fadeTo("slow", 0.15, function () {
                        $(this).find(':input').attr('disabled', 'disabled');
                        $(this).find('label').css('cursor', 'default');
                        $('.success-cf').fadeIn();
                    });
                },
                error: function () {
                    $('#contact-form').fadeTo("slow", 0.15, function () {
                        $('.error-cf').fadeIn();
                    });
                }
            });
        }
    });

    /* ==========================================================================
   ScrollTop Button
   ========================================================================== */


    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.scroll-top a').fadeIn(200);
        } else {
            $('.scroll-top a').fadeOut(200);
        }
    });


    $('.scroll-top a').click(function (event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    });



});
