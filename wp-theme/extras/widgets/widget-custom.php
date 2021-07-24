<?php

class NSI_Custom_Widget extends WP_Widget {

    public $args = array(
        'before_widget' => '<section class="widget">',
        'after_widget'  => '</section>',
    );

    public function __construct() {
        parent::__construct(
            'nsi_custom_widget',
            __( 'Custom Widget', 'nsi' ),
            array(
                'description' => __( 'Custom Widget for Custom Company', 'nsi' ),
            ),
        );

        add_action( 'widgets_init', function () {
            register_widget( 'NSI_Custom_Widget' );
        } );
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        echo 'Lorem ipsum';
    }

    public function update( $new_instance, $old_instance ) {
        return array();
    }

}
$NSI_Custom_Widget = new NSI_Custom_Widget();
