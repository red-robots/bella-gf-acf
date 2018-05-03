<?php

if ( ! class_exists( 'GFForms' ) ) {
    die();
}

GFForms::include_addon_framework();

class BellaGFACFAddOn extends GFAddOn {

    protected $_version = BELLA_GF_ACF_ADDON_VERSION;
    protected $_min_gravityforms_version = '1.9';
    protected $_slug = 'bella-gf-acf';
    protected $_path = 'bella-gf-acf/bella-gf-acf.php';
    protected $_full_path = __FILE__;
    protected $_title = 'Bellaworks Gravityforms Advanced Custom Fields Connector';
    protected $_short_title = 'Bella AddOn';

    private static $_instance = null;

    public static function get_instance() {

        if ( self::$_instance == null ) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function pre_init() {

        parent::pre_init();

        // load
        if ( $this->is_gravityforms_supported() && class_exists( 'GF_Field' ) ) {

            //load compatability
            require_once( 'includes/class-bella-gf-acf-connector.php' );
        }
    }

    public function init() {
        parent::init();
    }

}