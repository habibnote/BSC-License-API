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
        register_rest_route('bsc/v1', '/post-data/', array(
            'methods'   => 'POST',
            'callback'  => [$this, 'handle_post_data'],
        ));
    }

    /**
     * API Callback function 
     */
    public function handle_post_data( $data ) {
        $response = array(
            'status' => 'success',
            'message' => 'Data received successfully.',
        );
    
        return rest_ensure_response( $response );
    }

}