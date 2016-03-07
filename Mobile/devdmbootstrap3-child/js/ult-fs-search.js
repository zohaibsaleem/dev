jQuery(function () {
    jQuery('a[href="#fs-search"]').on('click', function(event) {
        event.preventDefault();
        jQuery('#fs-search').addClass('open');
        jQuery('#fs-search > form > input[type="text"]').focus();
    });

    jQuery('#fs-search, #fs-search button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            jQuery(this).removeClass('open');
        }
    });


});