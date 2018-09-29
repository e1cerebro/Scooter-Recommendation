(function($) {

    /**
     * All of the code for your public-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
     *
     * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */

    jQuery('div.driver-information').slideUp(10);

    $('#additional-recommendation-yes').click(function() {
        $('div.driver-information').slideDown();
    });

    $('#additional-recommendation-no').click(function() {
        $('div.driver-information').slideUp(100);
    });

    $('.success-feedback').slideUp(10);
    jQuery(document).on('click', '.radio-feedback', function() {

        var feedback = 'Yes';

        feedback = jQuery(this).data('feedback');
        var id = jQuery('.last_id').val();

        jQuery.ajax({
            url: scooter_recommendation_script_ajax.ajax_url,
            type: 'post',
            data: {
                action: 'save_feedback',
                feedback: feedback,
                id: id
            },
            success: function(response) {
                $('.radio__container').slideUp();
                $('.success-feedback').slideDown();
            }
        });

    });


})(jQuery);