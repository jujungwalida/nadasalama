<?php

class NSI_About_Company_Widget extends WP_Widget {

    public $args = array(
        'before_widget' => '<section class="widget">',
        'after_widget'  => '</section>',
    );

    public function __construct() {
        parent::__construct(
            'nsi_about_company_widget',
            __( 'About Company', 'nsi' ),
            array(
                'description' => __( 'Widget for About Company', 'nsi' ),
            )
        );

        add_action( 'widgets_init', function () {
            register_widget( 'NSI_About_Company_Widget' );
        } );
    }

    public function widget( $args, $instance ) {
        $logo          = empty( get_theme_mod( 'custom_logo' ) ) ? '' : wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) , 'full' )[0];
        $name          = get_bloginfo( 'name' );
        $about_company = get_theme_mod( 'nsi_about_company' );
        $facebook      = get_theme_mod( 'nsi_facebook' );
        $twitter       = get_theme_mod( 'nsi_twitter' );
        $instagram     = get_theme_mod( 'nsi_instagram' );
        $linkedin      = get_theme_mod( 'nsi_linkedin' );

        echo $args['before_widget'];

        ?>
        <div class="flex items-center space-x-2">

            <?php if ( has_custom_logo() ) : ?>
                <div class="flex-shrink-0"><img class="h-auto w-6" src="<?php echo esc_url_raw( $logo ); ?>"></div>
            <?php endif; ?>

            <div class="flex-grow"><p class="font-medium"><?php echo esc_html( $name ); ?></div>
        </div>

        <p class="mt-4 mb-8"><?php echo esc_html( $about_company ); ?></p>

        <ul class="flex space-x-3">
            <?php if ($facebook): ?>
                <li><a class="text-gray-300 hover:text-white" href="<?php esc_url_raw( $facebook ); ?>"><?php echo nsi_get_icon_svg( 'social', 'facebook' ); ?></a></li>
            <?php endif; ?>

            <?php if ($twitter): ?>
                <li><a class="text-gray-300 hover:text-white" href="<?php esc_url_raw( $twitter ); ?>"><?php echo nsi_get_icon_svg( 'social', 'twitter' ); ?></a></li>
            <?php endif; ?>

            <?php if ($instagram): ?>
                <li><a class="text-gray-300 hover:text-white" href="<?php esc_url_raw( $instagram ); ?>"><?php echo nsi_get_icon_svg( 'social', 'instagram' ); ?></a></li>
            <?php endif; ?>

            <?php if ($linkedin): ?>
                <li><a class="text-gray-300 hover:text-white" href="<?php esc_url_raw( $linked ); ?>"><?php echo nsi_get_icon_svg( 'social', 'linkedin' ); ?></a></li>
            <?php endif; ?>
        </ul>
        <?php

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $about = get_theme_mod( 'nsi_about_company' );

        if ( empty( $about ) ) :
            ?><p>Make sure you define About Company at Contact and Social Media panel.</p><?php
        endif;
    }

    public function update( $new_instance, $old_instance ) {
        return array();
    }

}
$NSI_About_Company_Widget = new NSI_About_Company_Widget();
