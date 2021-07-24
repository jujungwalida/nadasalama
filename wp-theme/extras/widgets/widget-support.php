<?php

class NSI_Support_Widget extends WP_Widget {

    public $args = array(
        'before_widget' => '<section class="widget">',
        'after_widget'  => '</section>',
    );

    public function __construct() {
        parent::__construct(
            'nsi_support_widget',
            __( 'Support', 'nsi' ),
            array(
                'description' => __( 'Widget for Support', 'nsi' ),
            ),
        );

        add_action( 'widgets_init', function () {
            register_widget( 'NSI_Support_Widget' );
        } );
    }

    public function widget( $args, $instance ) {

        $address    = get_theme_mod( 'nsi_address' );
        $phone      = get_theme_mod( 'nsi_phone' );
        $phone_link = get_theme_mod( 'nsi_phone_display_link' ) === 'whatsapp' ? 'https://wa.me/+' . str_replace( ' ', '', $phone ) : 'tel:' . str_replace( ' ', '', $phone );
        $email      = get_theme_mod( 'nsi_email' );

        if ( ( empty( $address ) ) && ( empty ( $phone ) ) && ( empty( $email ) ) ) return;

        echo $args['before_widget'];

        ?>
        <p class="font-black leading-none uppercase">Support</p>

        <ul class="mt-4">
            <?php if ( ! empty( $address ) ) : ?>
            <li class="flex space-x-2">
                <div class="flex-shrink-0 mt-1">
                    <?php echo nsi_get_icon_svg( 'site', 'marker' ); ?>
                </div>
                <div class="flex-grow"><?php echo esc_html( $address ); ?></div>
            </li>
            <?php endif; ?>

            <?php if ( ! empty( $phone ) ) : ?>
            <li class="flex space-x-2">
                <div class="flex-shrink-0 mt-1">
                <?php echo nsi_get_icon_svg( 'site', 'phone' ); ?>
                </div>
                <div class="flex-grow"><a class="text-gray-300 hover:text-white" href="#"><?php echo esc_html( $phone ); ?></a></div>
            </li>
            <?php endif; ?>

            <?php if ( ! empty( $email ) ) : ?>
            <li class="flex space-x-2">
                <div class="flex-shrink-0 mt-1">
                <?php echo nsi_get_icon_svg( 'site', 'mail' ); ?>
                </div>
                <div class="flex-grow"><a class="text-gray-300 hover:text-white" href="#"><?php echo esc_html( $email ); ?></a></div>
            </li>
            <?php endif; ?>
        </ul>
        <?php

        echo $args['after_widget'];
    }

    public function form( $instance ) {}

    public function update( $new_instance, $old_instance ) {
        return array();
    }

}

$NSI_Support_Widget = new NSI_Support_Widget();
