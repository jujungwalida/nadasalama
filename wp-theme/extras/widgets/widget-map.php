<?php

class NSI_Map_Widget extends WP_Widget {

    public $args = array(
        'before_widget' => '<section class="widget">',
        'after_widget'  => '</section>',
    );

    public function __construct() {
        parent::__construct(
            'nsi_map_widget',
            __( 'Map', 'nsi' ),
            array(
                'description' => __( 'Widget for Map', 'nsi' ),
            )
        );

        add_action( 'widgets_init', function () {
            register_widget( 'NSI_Map_Widget' );
        } );
    }

    public function widget( $args, $instance ) {
        $location = get_theme_mod( 'nsi_google_map' );

        echo $args['before_widget'];

        if ( esc_url_raw( $location ) ) {

            ?>
            <a href="<?php echo esc_url_raw( $location ); ?>" target="_blank"><img class="opacity-75 w-full h-auto" src="<?php echo get_template_directory_uri() . '/assets/img/world-map.svg'; ?>"></a>
            <?php

        } else {

            ?>
            <img class="opacity-75 w-full h-auto" src="<?php echo get_template_directory_uri() . '/assets/img/world-map.svg'; ?>">
            <?php

        }

        echo $args['after_widget'];
    }

    public function form( $instance ) {}

    public function update( $new_instance, $old_instance ) {
        return array();
    }

}
$NSI_Map_Widget = new NSI_Map_Widget();
