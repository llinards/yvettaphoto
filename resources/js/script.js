// change background for navbar when scrolling down
$(function () {
    $(document).scroll(function () {
        var $nav = $(".fixed-top");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });


    // handle links with @href started with '#' only
    $(document).on('click', 'a[href^="#"]', function (e) {
        // target element id
        var id = $(this).attr('href');

        // target element
        var $id = $(id);
        if ($id.length === 0) {
            return;
        }

        // prevent standard hash navigation (avoid blinking in IE)
        e.preventDefault();

        // top position relative to the document
        var pos = $id.offset().top - 50;

        // animated top scrolling
        $('body, html').animate({
            scrollTop: pos
        }).offset();
    });

    $('.nav-link').click(function () {
        var $this = $(this);
        if ($this.hasClass('active')) {
            $this.removeClass('active');
        } else {
            $this.addClass('active');
        }
    });

    $('.gallery-list-item').click(function () {
        let value = $(this).attr('data-filter');
        if (value === 'all') {
            $('.filter').show(300);
        } else {
            $('.filter').not('.' + value).hide(300);
            $('.filter').filter('.' + value).show(300);
        }
    });

    $('.gallery-list-item').click(function () {
        $(this).addClass('active-item').siblings().removeClass('active-item');
    });

    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });



    var btn = $('#button');

    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '300');
    });

    $(document).on('click', '.navbar-collapse', function (e) {
        if ($(e.target).is('a')) {
            $(this).collapse('hide');
        }
    });

    $(document).on('click', '.deleteCategory', function () {
        var categoryId = $(this).attr('data-categoryid');
        $('#modelToDeleteId').val(categoryId);
        $('#deleteModal').modal('show');
    });

    $(document).on('click', '.editCategory', function () {
        var categoryName = $(this).attr('data-categoryname');
        var categoryId = $(this).attr('data-categoryid');
        $('#modelToEditName').val(categoryName);
        $('#modelToEditId').val(categoryId);
        $('#editModal').modal('show');
    });

    $(document).on('click', '.deleteImage', function () {
        var imageId = $(this).attr('data-imageid');
        $('#modelToDeleteId').val(imageId);
        $('#deleteModal').modal('show');
    });

    function resizeGridItem(item) {
        grid = document.getElementsByClassName("grid")[0];
        rowHeight = parseInt(window.getComputedStyle(grid).getPropertyValue('grid-auto-rows'));
        rowGap = parseInt(window.getComputedStyle(grid).getPropertyValue('grid-row-gap'));
        rowSpan = Math.ceil((item.querySelector('.content').getBoundingClientRect().height + rowGap) / (rowHeight + rowGap));
        item.style.gridRowEnd = "span " + rowSpan;
    }

    function resizeAllGridItems() {
        allItems = document.getElementsByClassName("item");
        for (x = 0; x < allItems.length; x++) {
            resizeGridItem(allItems[x]);
        }
    }

    function resizeInstance(instance) {
        item = instance.elements[0];
        resizeGridItem(item);
    }

    window.onload = resizeAllGridItems();
    window.addEventListener("resize", resizeAllGridItems);

    allItems = document.getElementsByClassName("item");
    for (x = 0; x < allItems.length; x++) {
        imagesLoaded(allItems[x], resizeInstance);
    }

    // var total_photos_counter = 0;
    // Dropzone.options.myDropzone = {
    //     uploadMultiple: true,
    //     parallelUploads: 2,
    //     maxFilesize: 16,
    //     previewTemplate: document.querySelector('#preview').innerHTML,
    //     addRemoveLinks: true,
    //     dictRemoveFile: 'Remove file',
    //     dictFileTooBig: 'Image is larger than 16MB',
    //     timeout: 10000,

    //     init: function () {
    //         this.on("removedfile", function (file) {
    //             $.post({
    //                 url: '/images-delete',
    //                 data: {
    //                     id: file.name,
    //                     _token: $('[name="_token"]').val()
    //                 },
    //                 dataType: 'json',
    //                 success: function (data) {
    //                     total_photos_counter--;
    //                     $("#counter").text("# " + total_photos_counter);
    //                 }
    //             });
    //         });
    //     },
    //     success: function (file, done) {
    //         total_photos_counter++;
    //         $("#counter").text("# " + total_photos_counter);
    //     }
    // };

    $('.photothumb').bind("contextmenu", function (e) {
        return false;
    });
});
