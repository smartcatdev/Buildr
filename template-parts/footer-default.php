<footer id="colophon" class="site-footer">

    <div class="site-info">
        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'designr' ) ); ?>"><?php
            /* translators: %s: CMS name, i.e. WordPress. */
            printf( esc_html__( 'Proudly powered by %s', 'designr' ), 'WordPress' );
        ?></a>
        <span class="sep"> | </span>
        <?php
            /* translators: 1: Theme name, 2: Theme author. */
            printf( esc_html__( 'Theme: %1$s by %2$s.', 'designr' ), 'designr', '<a href="https://smartcatdesign.net">Smarcat</a>' );
        ?>
    </div><!-- .site-info -->

</footer><!-- #colophon -->
