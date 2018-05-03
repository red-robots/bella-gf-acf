<?php 
if ( ! class_exists( 'GFForms' ) ) {
    die();
}

/**
 * Class BellaGFACFConnector
 */
class BellaGFACFConnector {

    function __construct() {
        add_filter( 'gform_after_create_post', array( $this , 'add_acf_row' ), 10, 3  );
    }

    function add_acf_row($post_id, $lead, $form) {
        global $wpdb;

        foreach ( $form['fields'] as $field ) { 
            $meta_key = $field->postCustomFieldName;
            if(!empty($meta_key)){    
                $results = $wpdb->get_results($wpdb->prepare("SELECT post_name FROM {$wpdb->posts} WHERE post_type like '%s' AND post_excerpt like '%s' LIMIT 1",'acf_field',$meta_key));
                if(!empty($results)){
                    add_post_meta( $post_id, "_".$meta_key, $results[0]->post_name );
                }
                if(is_a($field, 'GF_Field_Date')){
                    $old_date = get_post_meta($post_id,$meta_key,true);
                    $new_date = preg_replace('/[^0-9]/','',$old_date);
                    update_post_meta($post_id,$meta_key,$new_date,$old_date);
                }
            }
        }
    }
}

new BellaGFACFConnector();