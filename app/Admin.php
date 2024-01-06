<?php

namespace Habib\BSC_API\App;

class Admin {

    /**
     * Class Constructor
     */
    public function __construct() {
        add_action( 'rest_api_init', [$this, 'bsc_license_api_endpoint'] );
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

        $response = array(
            'license_key' => $license_key,
            'status'    => 'success', 
            'message'   => 'Verify License key.',
        );
    
        return rest_ensure_response($response);
    }

}