<?php

namespace Habib\BSC_API\App;

class Admin {

    /**
     * Class Constructor
     */
    public function __construct() {
        add_action( 'init', [$this, 'init'] );
    }

    public function init() {
        echo "Hello";
    }

}