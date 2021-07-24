<?php

class NSI_Customizer {

    public function __construct() {
        add_action( 'customize_register', array( $this, 'register' ) );
    }

    public function register( $wp_customize ) {
        // Change site-title & description to postMessage.
        $wp_customize->get_setting( 'blogname' )->transport        = 'postMessage'; // @phpstan-ignore-line. Assume that this setting exists.
        $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage'; // @phpstan-ignore-line. Assume that this setting exists.

        // Add partial for blodname.
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title',
                'render_callback' => array( $this, 'partial_blogname' ),
            )
        );

        // Add partial for blogdescription.
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => array( $this, 'partial_blogdescription' ),
            )
        );

        // Add control for the "display_title_and_tagline" setting.
		$wp_customize->add_setting(
            'display_title_and_tagline',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => true,
                'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
            )
        );

        $wp_customize->add_control(
            'display_title_and_tagline',
            array(
                'type'    => 'checkbox',
                'section' => 'title_tagline',
                'label'   => esc_html__( 'Display Site Title & Tagline', 'nsi' ),
            )
        );

        /** Remove Section Static Front Page */
        $wp_customize->remove_section( 'static_front_page' );

        /**
         * Panel Home Page Settings
         */
        $wp_customize->add_panel(
            'nsi_home_page_settings_panel',
            array(
                'priority' => 30,
                'title' => __( 'Home Page Settings', 'nsi' ),
                'description' => __( 'Customize Home Page Settings' ),
            )
        );

        /**
         * Section Banner
         */
        $wp_customize->add_section(
            'nsi_banner_section',
            array(
                'panel'    => 'nsi_home_page_settings_panel',
                'priority' => 10,
                'title'    => __( 'Banner', 'nsi' ),
            )
        );

        // Control Enable/disable
        $wp_customize->add_setting(
            'nsi_banner_enable_disable',
            array(
                'default'           => false,
                'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
            )
        );

        $wp_customize->add_control(
            'nsi_banner_enable_disable',
            array(
                'section' => 'nsi_banner_section',
                'label'   => esc_html__( 'Enable Section', 'nsi'),
                'type'    => 'checkbox',
            )
        );

        // Control Image for Banner 1
        $wp_customize->add_setting(
            'nsi_banner_1_image',
            array(
                'sanitize_callback' => array( $this, 'sanitize_image' ),
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Upload_Control(
                $wp_customize,
                'nsi_banner_1_image',
                array(
                    'label'   => esc_html__( 'Banner 1', 'nsi' ),
                    'section' => 'nsi_banner_section',
                )
            )
        );

        // Control Small Text for Banner 1
        $wp_customize->add_setting(
            'nsi_banner_1_small_text',
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'nsi_banner_1_small_text',
            array(
                'section'     => 'nsi_banner_section',
                'type'        => 'text',
                'placeholder' => 'Small text goes here'
            )
        );

        // Control Big Text for Banner 1
        $wp_customize->add_setting(
            'nsi_banner_1_big_text',
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'nsi_banner_1_big_text',
            array(
                'section'     => 'nsi_banner_section',
                'type'        => 'text',
                'placeholder' => 'Big text goes here',
            )
        );

        // Control Image for Banner 2
        $wp_customize->add_setting(
            'nsi_banner_2_image',
            array(
                'sanitize_callback' => array( $this, 'sanitize_image' ),
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Upload_Control(
                $wp_customize,
                'nsi_banner_2_image',
                array(
                    'label'   => esc_html__( 'Banner 2', 'nsi' ),
                    'section' => 'nsi_banner_section',
                )
            )
        );

        // Control Small Text for Banner 2
        $wp_customize->add_setting(
            'nsi_banner_2_small_text',
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'nsi_banner_2_small_text',
            array(
                'section'     => 'nsi_banner_section',
                'type'        => 'text',
                'placeholder' => 'Small text goes here'
            )
        );

        // Control Big Text for Banner 2
        $wp_customize->add_setting(
            'nsi_banner_2_big_text',
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'nsi_banner_2_big_text',
            array(
                'section'     => 'nsi_banner_section',
                'type'        => 'text',
                'placeholder' => 'Big text goes here',
            )
        );

        // Control Image for Banner 3
        $wp_customize->add_setting(
            'nsi_banner_3_image',
            array(
                'sanitize_callback' => array( $this, 'sanitize_image' ),
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Upload_Control(
                $wp_customize,
                'nsi_banner_3_image',
                array(
                    'label'   => esc_html__( 'Banner 3', 'nsi' ),
                    'section' => 'nsi_banner_section',
                )
            )
        );

        // Control Small Text for Banner 3
        $wp_customize->add_setting(
            'nsi_banner_3_small_text',
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'nsi_banner_3_small_text',
            array(
                'section'     => 'nsi_banner_section',
                'type'        => 'text',
                'placeholder' => 'Small text goes here'
            )
        );

        // Control Big Text for Banner 3
        $wp_customize->add_setting(
            'nsi_banner_3_big_text',
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'nsi_banner_3_big_text',
            array(
                'section'     => 'nsi_banner_section',
                'type'        => 'text',
                'placeholder' => 'Big text goes here',
            )
        );

        /**
         * Section Products
         */
        $wp_customize->add_section(
            'nsi_products_section',
            array(
                'panel' => 'nsi_home_page_settings_panel',
                'priority' => 10,
                'title' => __( 'Products', 'nsi' ),
            )
        );

        // Control Enable/disable
        $wp_customize->add_setting(
            'nsi_products_enable_disable',
            array(
                'default' => false,
                'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
            )
        );

        $wp_customize->add_control(
            'nsi_products_enable_disable',
            array(
                'section' => 'nsi_products_section',
                'label' => esc_html__( 'Enable Section', 'nsi'),
                'type' => 'checkbox',
            )
        );

        // Control Page
        $wp_customize->add_setting(
            'nsi_products_page',
            array(
                'sanitize_callback' => 'absint',
            )
        );

        $wp_customize->add_control(
            'nsi_products_page',
            array(
                'label'          => esc_html__( 'Select Page' ),
                'section'        => 'nsi_products_section',
                'type'           => 'dropdown-pages',
                'allow_addition' => false,
            )
        );

        /**
         * Section About
         */
        $wp_customize->add_section(
            'nsi_about_us_section',
            array(
                'panel' => 'nsi_home_page_settings_panel',
                'priority' => 10,
                'title' => __( 'About Us', 'nsi' ),
            )
        );

        // Control Enable/disable
        $wp_customize->add_setting(
            'nsi_about_us_enable_disable',
            array(
                'default' => false,
                'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
            )
        );

        $wp_customize->add_control(
            'nsi_about_us_enable_disable',
            array(
                'section' => 'nsi_about_us_section',
                'label' => esc_html__( 'Enable Sectionx', 'nsi'),
                'type' => 'checkbox',
            )
        );

        // Control Page
        $wp_customize->add_setting(
            'nsi_about_us_page',
            array(
                'sanitize_callback' => 'absint',
            )
        );

        $wp_customize->add_control(
            'nsi_about_us_page',
            array(
                'label'          => esc_html__( 'Select Page' ),
                'section'        => 'nsi_about_us_section',
                'type'           => 'dropdown-pages',
                'allow_addition' => false,
            )
        );

        // Control Image for Page
        $wp_customize->add_setting(
            'nsi_about_us_image',
            array(
                'sanitize_callback' => array( $this, 'sanitize_image' ),
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Upload_Control(
                $wp_customize,
                'nsi_about_us_image',
                array(
                    'label'    => esc_html__( 'Image', 'nsi' ),
                    'section'  => 'nsi_about_us_section',
                )
            )
        );

        /**
         * Section Why Choose Us
         */
        $wp_customize->add_section(
            'nsi_why_choose_us_section',
            array(
                'panel' => 'nsi_home_page_settings_panel',
                'priority' => 10,
                'title' => __( 'Why Choose Us', 'nsi' ),
            )
        );

        // Control Enable/disable
        $wp_customize->add_setting(
            'nsi_why_choose_us_enable_disable',
            array(
                'default' => false,
                'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
            )
        );

        $wp_customize->add_control(
            'nsi_why_choose_us_enable_disable',
            array(
                'section' => 'nsi_why_choose_us_section',
                'label' => esc_html__( 'Enable Section', 'nsi'),
                'type' => 'checkbox',
            )
        );

        // Control Page
        $wp_customize->add_setting(
            'nsi_why_choose_us_page',
            array(
                'sanitize_callback' => 'absint',
            )
        );

        $wp_customize->add_control(
            'nsi_why_choose_us_page',
            array(
                'label'          => esc_html__( 'Select Page' ),
                'section'        => 'nsi_why_choose_us_section',
                'type'           => 'dropdown-pages',
                'allow_addition' => false,
            )
        );

        /**
         * Section Gallery
         */
        $wp_customize->add_section(
            'nsi_gallery_section',
            array(
                'panel' => 'nsi_home_page_settings_panel',
                'priority' => 10,
                'title' => __( 'Gallery', 'nsi' ),
            )
        );

        // Control Enable/disable
        $wp_customize->add_setting(
            'nsi_gallery_enable_disable',
            array(
                'default' => false,
                'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
            )
        );

        $wp_customize->add_control(
            'nsi_gallery_enable_disable',
            array(
                'section' => 'nsi_gallery_section',
                'label' => esc_html__( 'Enable Section', 'nsi'),
                'type' => 'checkbox',
            )
        );

        // Control Page
        $wp_customize->add_setting(
            'nsi_gallery_page',
            array(
                'sanitize_callback' => 'absint',
            )
        );

        $wp_customize->add_control(
            'nsi_gallery_page',
            array(
                'label'          => esc_html__( 'Select Page' ),
                'section'        => 'nsi_gallery_section',
                'type'           => 'dropdown-pages',
                'allow_addition' => false,
            )
        );

        /**
         * Panel Contact and Social Media
         */
        $wp_customize->add_panel(
            'nsi_support_and_social_media_panel', array(
                'priority' => 30,
                'title' => __( 'Contact Support and Social Media', 'nsi' ),
                'description' => __( 'Customize Contact Support and; Social Media' ),
            )
        );

        /**
         * Section Contact Support
        */
        $wp_customize->add_section(
            'nsi_support_section',
            array(
                'panel' => 'nsi_support_and_social_media_panel',
                'priority' => 10,
                'title' => __( 'Contact Support', 'nsi' ),
                'description' => __( 'Most of these will show inside About Company Widget, Support Widget and Map Widget' ),
            )
        );

        // Control About Company
        $wp_customize->add_setting(
            'nsi_about_company',
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'nsi_about_company',
            array(
                'section' => 'nsi_support_section',
                'label' => esc_html__( 'About Company', 'nsi' ),
                'type' => 'textarea',
            )
        );

        // Control Address
        $wp_customize->add_setting(
            'nsi_address',
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'nsi_address',
            array(
                'section' => 'nsi_support_section',
                'label' => esc_html__( 'Address', 'nsi' ),
                'type' => 'textarea',
            )
        );

        // Control Google Map
        $wp_customize->add_setting(
            'nsi_google_map',
            array(
                'sanitize_callback' => 'esc_url_raw',
            )
        );

        $wp_customize->add_control(
            'nsi_google_map',
            array(
                'section' => 'nsi_support_section',
                'label' => esc_html__( 'Google Map Link', 'nsi' ),
                'type' => 'url',
                'description' => esc_html__( 'Open Google Map from your browser, select location, press share, copy generated link then paste here.', 'nsi' ),
            )
        );

        // Control Phone
        $wp_customize->add_setting(
            'nsi_phone',
            array(
                'sanitize_callback' => array( $this, 'sanitize_phone' ),
            )
        );

        $wp_customize->add_control(
            'nsi_phone',
            array(
                'section' => 'nsi_support_section',
                'label' => esc_html__( 'Phone Number', 'nsi' ),
                'description' => __( 'DO NOT preceded by a plus sign. Only numbers and spaces.<br>Example: 62 812 345 6789', 'nsi' ),
                'type' => '',
            )
        );

        // Control Phone Display Link
        $wp_customize->add_setting(
            'nsi_phone_display_link',
            array(
                'sanitize_callback' => function( $value ) {
                    return 'phone' === $value || 'whatsapp' === $value ? $value : 'phone';
                },
                'default' => 'phone',
            )
        );

        $wp_customize->add_control(
            'nsi_phone_display_link',
            array(
                'section' => 'nsi_support_section',
                'label' => esc_html__( 'Link Phone Number as', 'nsi' ),
                'type' => 'radio',
                'choices' => array(
                    'phone' => esc_html__( 'Phone', 'nsi' ),
                    'whatsapp' => esc_html__( 'WhatsApp', 'nsi' ),
                ),
            )
        );

        // Control Email
        $wp_customize->add_setting(
            'nsi_email',
            array(
                'sanitize_callback' => 'sanitize_email',
            )
        );

        $wp_customize->add_control(
            'nsi_email',
            array(
                'section' => 'nsi_support_section',
                'label' => esc_html__( 'Email', 'nsi' ),
                'type' => 'email',
            )
        );

        /**
         * Section Social Media
         */
        $wp_customize->add_section(
            'nsi_social_media_section',
            array(
                'panel' => 'nsi_support_and_social_media_panel',
                'priority' => 10,
                'title' => __( 'Social Media', 'nsi' ),
                'description' => __( 'These will show inside About Company Widget' ),
            )
        );

        // Control Facebook
        $wp_customize->add_setting(
            'nsi_facebook',
            array(
                'sanitize_callback' => 'esc_url_raw',
            )
        );

        $wp_customize->add_control(
            'nsi_facebook',
            array(
                'section' => 'nsi_social_media_section',
                'label' => esc_html__( 'Facebook', 'nsi' ),
                'type' => 'url',
            )
        );

        // Control Twitter
        $wp_customize->add_setting(
            'nsi_twitter',
            array(
                'sanitize_callback' => 'esc_url_raw',
            )
        );

        $wp_customize->add_control(
            'nsi_twitter',
            array(
                'section' => 'nsi_social_media_section',
                'label' => esc_html__( 'Twitter', 'nsi' ),
                'type' => 'url',
            )
        );

        // Control Instagram
        $wp_customize->add_setting(
            'nsi_instagram',
            array(
                'sanitize_callback' => 'esc_url_raw',
            )
        );

        $wp_customize->add_control(
            'nsi_instagram',
            array(
                'section' => 'nsi_social_media_section',
                'label' => esc_html__( 'Instagram', 'nsi' ),
                'type' => 'url',
            )
        );

        // Control LinkedIn
        $wp_customize->add_setting(
            'nsi_linkedin',
            array(
                'sanitize_callback' => 'esc_url_raw',
            )
        );

        $wp_customize->add_control(
            'nsi_linkedin',
            array(
                'section' => 'nsi_social_media_section',
                'label' => esc_html__( 'LinkedIn', 'nsi' ),
                'type' => 'url',
            )
        );

        /**
         * Panel Extra
         */
        $wp_customize->add_panel(
            'nsi_extra_panel',
            array(
                'priority' => 30,
                'title' => __( 'Extra Settings', 'nsi' ),
                'description' => __( 'Customize Extra Settings' ),
            )
        );

        /**
         * Section Products Archive
         */
        $wp_customize->add_section(
            'nsi_products_archive_section',
            array(
                'panel' => 'nsi_extra_panel',
                'priority' => 10,
                'title' => __( 'Page for Products Archive', 'nsi' ),
            )
        );

        // Control Page
        $wp_customize->add_setting(
            'nsi_products_archive_page',
            array(
                'sanitize_callback' => 'absint',
            )
        );

        $wp_customize->add_control(
            'nsi_products_archive_page',
            array(
                'label'          => esc_html__( 'Select Page' ),
                'section'        => 'nsi_products_archive_section',
                'type'           => 'dropdown-pages',
                'allow_addition' => false,
                'description'    => 'Selected page will show in product archive'
            )
        );

        /**
         * Section Gallery Header
         */
        $wp_customize->add_section(
            'nsi_gallery_header_section',
            array(
                'panel' => 'nsi_extra_panel',
                'priority' => 10,
                'title' => __( 'Page for Gallery', 'nsi' ),
            )
        );

        // Control Page
        $wp_customize->add_setting(
            'nsi_gallery_header_page',
            array(
                'sanitize_callback' => 'absint',
            )
        );

        $wp_customize->add_control(
            'nsi_gallery_header_page',
            array(
                'label'          => esc_html__( 'Select Page' ),
                'section'        => 'nsi_gallery_header_section',
                'type'           => 'dropdown-pages',
                'allow_addition' => false,
                'description'    => 'Selected page will show in gallery'
            )
        );
    }

    public function partial_blogname() {
        bloginfo( 'name' );
    }

    public function partial_blogdescription() {
        bloginfo( 'description' );
    }

    public function sanitize_checkbox( $checked = null ) {
        return (bool) isset( $checked ) && true === $checked;
    }

    public function sanitize_image( $file, $setting ) {
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png'
        );

        $file_ext = wp_check_filetype( $file, $mimes );

        return ( $file_ext['ext'] ? $file : $setting->default );
    }

    public static function sanitize_phone($phone) {
        return preg_replace( '/[^\d+]/', '', $phone );
    }

}
