$(function() {

    var videofile = $('input[name="videofile"]'),
        userfile = $('input[name="userfile"]'),
        logofile = $('input[name="logofile"]'),
        messagefile = $('input[name="messagefile"]'),
        homeworkfile = $('input[name="homeworkfile"]'),
        submited = false;

    videofile.hide();
    userfile.hide();
    logofile.hide();
    homeworkfile.hide();

    $('#add_homework > button:submit').on('click', function (event) {
        event.preventDefault();
        homeworkfile.click();
    });

    $('.add_method > button:submit').on('click', function (event) {
        event.preventDefault();
        var self = $(this);
        self.prev().click();
    });

    $(videofile).add(userfile).add(homeworkfile).change(function () {
        var self = $(this),
            filename = self.val();

        if (filename !== undefined) {
            self.parent().submit();
        }
    });

    // ----------- Асинхронное добавление логотипа в новый курс
    $(logofile).change(function () {
        var fd = new FormData(),
            self = $(this),
            file = self.get(0).files[0];

        fd.append("logofile", file);
        if (self.val() !== undefined && self.val() !== '') {
            $.ajax({
                url: '/courses/addLogo',
                type: "POST",
                headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
                data: fd,
                processData: false,
                contentType: false,
                success: function () {
                    $('.plate > img').attr('src', '/images/icon/' + file.name);
                    $('.plate > .bottom').addClass('under');
                },
                error: function (msg) {
                    console.log(msg);
                }
            });
        }
    });

    $('#add_video > button:submit').on('click', function (event) {
        if ($('input[name="ltitle"]').val().trim().length > 0) {
            if ($('input[name="ldesc"]').val().trim().length > 0) {
                event.preventDefault();
                videofile.click();
            }
        }
    });

    $('#add_logo > button:submit').on('click', function (event) {
        event.preventDefault();
        logofile.click();
    });

    // ----------- Слайдинг добавления лекции
    $('.buttonLecChange').on('click', function() {
        $(this).hide();
        $('.changeLecForm').slideToggle(400, function() {
            //$("html, body").animate({ scrollTop: $(window).height() }, 1000);
        });
        $('#add_video').find('input[type=text]').eq(0).focus();
    });

    // ------------ Слайдинг описания видео
    $('.buttonchange').on('click', function() {
        var self = $(this),
            changeForm = $('.changeForm'),
            input = self.next(changeForm).find('textarea');

        self.toggleClass('buttonChange');
        self.next(changeForm).slideToggle(400).css({display: "block"});
        if (self.hasClass('buttonChange')) { input.focus(); }
    });
    // ------------ спиннер-лоадер
    $('#add_video').add('#add_message').on('submit', function (e) {
        if (!submited) {
            e.preventDefault();

            $('.spinner-wrapper').css({display: 'flex'});

            var opts = {
                lines: 13 // The number of lines to draw
                , length: 28 // The length of each line
                , width: 14 // The line thickness
                , radius: 42 // The radius of the inner circle
                , scale: 0.5 // Scales overall size of the spinner
                , corners: 1 // Corner roundness (0..1)
                , color: '#fff' // #rgb or #rrggbb or array of colors
                , opacity: 0.25 // Opacity of the lines
                , rotate: 0 // The rotation offset
                , direction: 1 // 1: clockwise, -1: counterclockwise
                , speed: 1 // Rounds per second
                , trail: 60 // Afterglow percentage
                , fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
                , zIndex: 2e9 // The z-index (defaults to 2000000000)
                , className: 'spinner-object' // The CSS class to assign to the spinner
                //, top: '50%' // Top position relative to parent
                //, left: '50%' // Left position relative to parent
                , shadow: false // Whether to render a shadow
                , hwaccel: false // Whether to use hardware acceleration
                //, position: 'absolute' // Element positioning
            };
            var target = $('.spinner').get(0);
            var spinner = new Spinner(opts).spin(target);
            submited = true;
            $(this).trigger('submit');
        }
    });

    // ------------ Добавление в избранное
    $('.toggleLiked').on('click', function (e) {
        var self = $(this),
            url = self.attr('data-url'),
            id = self.attr('data-id');

        e.preventDefault();
        $.ajax({
            url: url + 'courses/toggleLiked',
            type: "POST",
            data: { id: id },
            headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
            success: function ($list) {
                //self.html($list);
                self.toggleClass('active');
                //if (self.attr('src') == 'http://localhost/images/silver.png') {
                //    self.attr('src', 'http://localhost/images/star_silver.png');
                //} else {
                //    self.attr('src', 'http://localhost/images/silver.png');
                //}
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });

    $('.homework_link').on('click', function(e) {
        e.preventDefault();
        homeworkfile.click();
    })
    if (window.location.hash === '#lection_comments') {
        $('a[href="#lection_material"]').removeClass('is-active');
        $('a[href="#lection_comments"]').addClass('is-active');
        $('#lection_material').removeClass('is-active');
        $('#lection_comments').addClass('is-active');
    }

    $('.disabled').on('click', function(e) {
        e.preventDefault();
    })
})