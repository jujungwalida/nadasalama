<?php $blog_info = get_bloginfo( 'name' ); ?>

<footer class="text-white bg-secondary-blue border-t border-white border-opacity-50">
    <div class="w-10/12 py-4 mx-auto">
        <p class="text-sm">Copyrights &copy; <?php echo do_shortcode('[year]'); ?>. All rights reserved by <?php echo esc_html( $blog_info ); ?></p>
    </div>
</footer>
