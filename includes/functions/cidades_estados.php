<?php
function plandd_install_uf_cities() {
    global $wpdb;
    $jal_db_version = '1.0';
    $installed_ver = get_option( "jal_db_version_modabiz" );
    $charset_collate = $wpdb->get_charset_collate();
    
    if ( !$installed_ver ) {

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );

        add_option( 'jal_db_version_modabiz', $jal_db_version );
    }
    
}
add_action( 'init', 'plandd_install_uf_cities' );
?>