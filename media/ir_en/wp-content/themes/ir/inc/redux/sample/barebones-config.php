<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "plandd_option";
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    //array de avatars para o instagram
    //$arr_hash_imgs = get_hash_imgs();

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => 'I-R Studio',
        // Name that appears at the top of your panel
        'display_version'      => THEME_VERSION,
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'I-R Studio', 'redux-framework-demo' ),
        'page_title'           => __( 'I-R Studio', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        //'menu_icon'            => THEME_ICON,
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        //'page_icon'            =>  THEME_ICON,
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'https://www.facebook.com/sigaPlanDD?fref=ts',
        'title' => __( 'Siga-nos', 'redux-framework-demo' ),
    );

    /*$args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'redux-framework-demo' ),
    );*/

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/plandd',
        'title' => 'Nosso GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/planndd?fref=ts',
        'title' => 'Nosso Facebook',
        'icon'  => 'el el-facebook'
    );
    // $args['share_icons'][] = array(
    //     'url'   => 'http://twitter.com/reduxframework',
    //     'title' => 'Follow us on Twitter',
    //     'icon'  => 'el el-twitter'
    // );
    // $args['share_icons'][] = array(
    //     'url'   => 'http://www.linkedin.com/company/redux-framework',
    //     'title' => 'Find us on LinkedIn',
    //     'icon'  => 'el el-linkedin'
    // );
    //
    // $args['share_icons'][] = array(
    //     'url'   => 'https://www.facebook.com/sigaPlanDD?fref=ts',
    //     'title' => 'PlanDD no Facebook',
    //     'icon'  => 'el el-facebook'
    // );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Opções gerais para configurações do tema</p>', 'redux-framework-demo' ), $v );
    } else {
        $args['intro_text'] = __( '<p></p>', 'redux-framework-demo' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p></p>', 'redux-framework-demo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'PlanDD', 'redux-framework-demo' ),
            'content' => __( '<p><a href="http://plandd.cc" target="_blank">Nosso site</a></p>', 'redux-framework-demo' )
        ),
    );

    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>Para outras dúvidas, entre em contato com o suporte</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );

    /**
     * OPÇÕES GERAIS
     * ---------------------------------------------------------------
     */
    Redux::setSection( $opt_name, array(
        'title'     => __( 'Institucional', 'redux-framework-demo' ),
        'id'        => 'basic',
        'desc'      => __( 'Dados institucionais da empresa', 'redux-framework-demo' ),
        'icon'      => 'el el-home',
        'fields'    => array(
          array(
              'id'       => 'inst-email',
              'type'     => 'text',
              'title'    => __( 'E-mail primário', 'redux-framework-demo' ),
              'subtitle' => __( '', 'redux-framework-demo' ),
              'desc'     => __( '', 'redux-framework-demo' ),
              'default'  => 'ola@i-r-studio.com',
          ),
          array(
              'id'       => 'inst-facebook',
              'type'     => 'text',
              'title'    => __( 'Endereço facebook', 'redux-framework-demo' ),
              'subtitle' => __( 'Obrigatório', 'redux-framework-demo' ),
              'desc'     => __( '', 'redux-framework-demo' ),
              'default'  => 'http://facebook.com',
          ),
          array(
              'id'       => 'inst-instagram',
              'type'     => 'text',
              'title'    => __( 'Endereço instagram', 'redux-framework-demo' ),
              'subtitle' => __( '', 'redux-framework-demo' ),
              'desc'     => __( '', 'redux-framework-demo' ),
              'default'  => 'http://instagram.com',
          ),
          array(
              'id'       => 'inst-analytics',
              'type'     => 'textarea',
              'title'    => __( 'Google Analytics', 'redux-framework-demo' ),
              'subtitle' => __( '', 'redux-framework-demo' ),
              'desc'     => __( '', 'redux-framework-demo' ),
              'default'  => '',
          ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'     => __( 'About us', 'redux-framework-demo' ),
        'id'        => 'about',
        'desc'      => __( 'Dados institucionais da empresa', 'redux-framework-demo' ),
        'icon'      => 'el el-question',
        'fields'    => array(
          array(
              'id'       => 'btn-about',
              'type'     => 'text',
              'title'    => __( 'Botão da página sobre', 'redux-framework-demo' ),
              'subtitle' => __( '', 'redux-framework-demo' ),
              'desc'     => __( '', 'redux-framework-demo' ),
              'default'  => 'About<br>Us',
          ),
          array(
              'id'       => 'txt-about-one',
              'type'     => 'textarea',
              'title'    => __( 'Primeiro paragrafo da pagina', 'redux-framework-demo' ),
              'subtitle' => __( '', 'redux-framework-demo' ),
              'desc'     => __( '', 'redux-framework-demo' ),
              'default'  => '',
          ),
          array(
              'id'       => 'txt-about-two',
              'type'     => 'textarea',
              'title'    => __( 'Segundo paragrafo da pagina', 'redux-framework-demo' ),
              'subtitle' => __( '', 'redux-framework-demo' ),
              'desc'     => __( '', 'redux-framework-demo' ),
              'default'  => '',
          ),
        )
    ) );

    /*
     * <--- END SECTIONS
     */
