<?php
/**
 * Plugin Name: Bellaworks GF - ACF Compatability Addon
 * Plugin URI: 
 * Description: Slim Image Cropper for Gravity Forms is a cross platform Image Cropping and Uploading plugin. It’s very easy to setup and features beautiful graphics and animations.
 * Version: 0.0.1
 * Author: FritzHealy
 * Author URI: 
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: bella-gf-acf
 */

// sets global gf slim version for use in script embeds
define( 'BELLA_GF_ACF_ADDON_VERSION', '0.0.1' );

// wait for gravity forms to load
add_action( 'gform_loaded', array( 'Bella_GF_ACF_AddOn_Bootstrap', 'load' ), 5 );

// sets up the slim addon
class Bella_GF_ACF_AddOn_Bootstrap {

    public static function load() {

        if ( ! method_exists( 'GFForms', 'include_addon_framework' ) ) {
            return;
        }

        require_once( 'class-bella-gf-acf-addon.php' );

        GFAddOn::register( 'BellaGFACFAddOn' );

    }

}