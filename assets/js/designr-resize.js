/* -------------------------------------------------------------------------
* Header: On-Resize Handler 
* ---------------------------------------------------------------------- */
(function($, viewport){
    
    $(document).ready(function() {

        function doMasonry() {

            var $card_blog = $( ".masonry_card_blog" ).imagesLoaded(function () {
                $card_blog.masonry({
                    itemSelector: '.blog_item_wrap',
                    columnWidth: '.grid_sizer',
                    percentPosition: true,
                    transitionDuration: '.5s'
                });
            });

        }

        // Initialize Masonry Card Blog
        doMasonry();

        // Execute code each time window size changes
        $(window).resize(
            viewport.changed(function() {

                console.log('Current breakpoint: ', viewport.current());

                /**
                 * Resize Navbar Submenu Widths
                 */
                $('#slim-header ul.slim-header-menu > li.menu-item-has-children').each( function( index ) {
                    if ( ( ( 200 - $(this).outerWidth() ) / 2 ) > 0 ) {
                        $(this).find('ul.sub-menu').css('transform','translate(-' + ( ( 200 - $(this).outerWidth() ) / 2 ) + 'px,0)');    
                    } else {
                        $(this).find('ul.sub-menu').css('width', $(this).outerWidth() + 'px');    
                    }
                });
                
                /**
                 * Re-Call Masonry
                 */
                doMasonry();
                
            }, 150 )
        );

    });
})(jQuery, ResponsiveBootstrapToolkit);