<?php

namespace Habib\BSC_API\App;

class Admin {

    /**
     * Class Constructor
     */
    public function __construct() {
        add_action( 'rest_api_init', [$this, 'bsc_license_api_endpoint'] );
        add_action( 'woocommerce_new_order', [$this, 'save_license_data'], 10, 1 );
        add_action( 'woocommerce_account_dashboard', [$this, 'display_woocommerce_license_key'] );
    }

    /**
     * Display License Key into woocommerce Dashboard
     */
    public function display_woocommerce_license_key() {
        $current_user_id = get_current_user_id();

        printf( "<div><label>Your License Key<label>: <span> %s </span></div>", get_user_meta( $current_user_id, 'bsc_license_key', true ));
    }

    /**
     * Save license key as a meta key into wordpress user meta
     */
    public function save_license_data( $order_id ) {

        $order      = wc_get_order($order_id);
        $user_id    = $order->get_user_id();

        $license_key = md5( $user_id ) . $user_id;

        update_user_meta( $user_id, 'bsc_license_key', $license_key );
    }

    /**
     * Register Custom Enpoint
     */
    public function bsc_license_api_endpoint() {
        register_rest_route('bsc/v1', '/verify-license/', array(
            'methods'   => 'POST',
            'callback'  => [$this, 'verify_license_callback'],
        ));
    }

    /**
     * API Callback function 
     */
    public function verify_license_callback( $request ) {

        $license_key = sanitize_text_field( $request->get_param('license_key') );

        $user_id  = substr( $license_key, 32 );

        $user_meta_key = get_user_meta( $user_id, 'bsc_license_key', true );

        if( $license_key == $user_meta_key ) {
            $response = array(
                'status'    => 'success', 
                'message'   => 'Verify License key.',
            );
        }else{
            $response = array(
                'status' => 'error', 
                'message' => 'Invalid license key'
            );
        }

        return rest_ensure_response($response);
    }

}