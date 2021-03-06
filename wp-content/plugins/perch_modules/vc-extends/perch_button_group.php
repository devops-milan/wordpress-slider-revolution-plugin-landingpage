<?php

/*
Element Description: VC Title area
*/
 
// Element Class 
class PerchButtonGroup extends PerchVcMap {
     
    private $base = 'perch_button_group';

    private $title = 'Button group';
    
    function __construct() {
        // vc map inits
        add_action( 'init', array( $this, 'vc_mapping' ) );

        // Shortcode filter
        add_filter( $this->base, array( $this, 'perch_button_group_output' ), 30, 2 ); 
        add_filter( $this->base.'_slide', array( $this, 'perch_button_group_slide_output' ), 30, 2 ); 
    }

   

    // Title element mapping
    private function vc_map_args(){        

        $array = array( 
                array(                
                  'heading' => __( 'Button Group', 'perch' ),
                  'param_name' => 'params',   
                  'type' => 'param_group',
                  'save_always' => true,             
                  'value' => urlencode( json_encode( array(
                      array(
                          'button_type' => 'img_btn', 
                          'img_btn' => get_template_directory_uri(). '/images/appstore.png',
                          'img_btn_size' => '160',                          
                          'button_text' => 'appstore',
                          'button_url' => '#',
                          'button_target' => '_blank',
                      ),
                      array(
                        'button_type' => 'img_btn', 
                        'img_btn' => get_template_directory_uri(). '/images/googleplay.png',
                        'img_btn_size' => '160',                          
                        'button_text' => 'Googleplay',
                        'button_url' => '#',
                        'button_target' => '_blank',
                      ),
                  ) ) ),
                  'params' => PerchVcMapButtons::button_groups_param()
              ), 
            );        
        $array = array_merge($array, PerchVcMap::_vc_map_input_field_group('subtitle', 'Sub-Title', true, array('textarea' => true)));
        $array = array_merge($array, PerchVcMap::element_common_args());
         
        $array = apply_filters( 'perch_modules/vc/'.$this->base , $array);

        return $array;
    } 
     
     
    // Element HTML
    public function perch_button_group_output( $atts, $content = NULL ) {
        $map_arr = self::vc_mapping(true);
        $args = PerchVcMap::get_vc_element_atts_array($map_arr, $content); 
        // Params extraction
        $atts = shortcode_atts( $args, $atts );

        $wrapper_attributes = perch_modules_shortcode_wrapper_attributes($atts, $this->base );
        $paramsArr = (function_exists('vc_param_group_parse_atts'))? vc_param_group_parse_atts($atts['params']) : array(); 
        // Used for periodic animation
        PerchVcMap::periodic_animation_start($atts);
      
        // Fill $html var with data
        $html ='
        <div '. implode( ' ', $wrapper_attributes ).'>            
            <div class="stores-badge"> 
                '.PerchVcMapButtons::button_groups_html($paramsArr, 'store', $atts).'            
                <div class="os-version">'.perch_modules_get_vc_param_html('subtitle', $atts, $map_arr ).'</div>  
            </div> 
        </div>';

        $html_args = array(
            'wrapper_attributes' => $wrapper_attributes,
            'button_groups_html' => PerchVcMapButtons::button_groups_html($paramsArr, 'store', $atts),
            'subtitle' => perch_modules_get_vc_param_html('subtitle', $atts, $map_arr ),
        );     

        $html = apply_filters('perch_modules/button_group/output', $html, $html_args, $atts); 

        PerchVcMap::periodic_animation_end();     
         
        return wpb_js_remove_wpautop($html);
         
    }

    public function perch_button_group_slide_output( $atts, $content = NULL ) {
        $map_arr = self::vc_map_args();
        $args = PerchVcMap::get_vc_element_atts_array($map_arr, $content); 

        // Params extraction
        $atts = shortcode_atts( $args, $atts );

        $html ='<div class="perch-slide-item">';
        $html .= self::perch_button_group_output($atts);
        $html .='</div>';

        return $html;
    }


    // Element Mapping
    public function vc_mapping( $return = false ) {
        $params = $this->vc_map_args();
        if($return) {
            return $params;  
        }        
       
       $vc_map = array(
                'class' => perch_shortcodes_vc_class(),
                'category' => perch_shortcodes_vc_category(),
                'base' => $this->base,
                'name' => $this->title,                
                'description' => __('Display title & subtitle', 'perch'),                 
                'params' => $params,
                'js_view' => 'PerchVcElementPreview',
                'custom_markup' => '<div class="perch_vc_element_container">{{title}}</div>',  
                'admin_enqueue_js' =>   array( PERCH_MODULES_URI. '/assets/js/vc-admin-scripts.js'),       
            ); 
        // slide element
        $vc_map_slide = array(
                'class' => perch_shortcodes_vc_class(),
                'category' => perch_shortcodes_vc_category(),
                'base' => $this->base.'_slide',
                'name' => $this->title,                
                'description' => __('Display title & subtitle', 'perch'),                 
                'as_child'  => array('only' => 'perch_vc_carousel'),           
                'params' => $params,
                'js_view' => 'PerchVcElementPreview',
                'custom_markup' => '<div class="perch_vc_element_container">{{title}}</div>',        
            );
        
        vc_map( $vc_map );
        vc_map( $vc_map_slide );
        
    }
    
    
     
} // End Element Class 
 
// Element Class Init
new PerchButtonGroup();