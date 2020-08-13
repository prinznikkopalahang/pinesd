jQuery(function($){
    $('body').on('click', '.pinesd_upload_image_button', function(e){
        e.preventDefault();

        var button = $(this),
        aw_uploader = wp.media({
            title: 'Banner Image',
            library : {
                uploadedTo : wp.media.view.settings.post.id,
                type : 'image'
            },
            button: {
                text: 'Use this image'
            },
            multiple: false
        }).on('select', function() {
            var attachment = aw_uploader.state().get('selection').first().toJSON();
            $('.banner-preview').attr('src', attachment.url);
            $('#post_banner').val(attachment.url);
        })
        .open();
    });

    $('body').on('click', '.pinesd_upload_image_button_gallery_1', function(e){
        e.preventDefault();

        var button = $(this),
        aw_uploader = wp.media({
            title: 'Gallery Image',
            library : {
                uploadedTo : wp.media.view.settings.post.id,
                type : 'image'
            },
            button: {
                text: 'Use this image'
            },
            multiple: false
        }).on('select', function() {
            var attachment = aw_uploader.state().get('selection').first().toJSON();
            $('.banner-preview-1').attr('src', attachment.url);
            $('#post_gallery_1').val(attachment.url);
        })
        .open();
    });

    $('body').on('click', '.pinesd_upload_image_button_gallery_2', function(e){
        e.preventDefault();

        var button = $(this),
        aw_uploader = wp.media({
            title: 'Gallery Image',
            library : {
                uploadedTo : wp.media.view.settings.post.id,
                type : 'image'
            },
            button: {
                text: 'Use this image'
            },
            multiple: false
        }).on('select', function() {
            var attachment = aw_uploader.state().get('selection').first().toJSON();
            $('.banner-preview-2').attr('src', attachment.url);
            $('#post_gallery_2').val(attachment.url);
        })
        .open();
    });
});
