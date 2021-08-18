<?php
function shiftkey_paragraph_typography_options( $args = array() ){
    $options  = array(
        array(
            'id'       => 'p',
            'type'     => 'typography',
            'title'    => esc_attr__( 'Paragraph Font', 'shiftkey' ),
            'subtitle' => esc_attr__( 'Specify the global Paragraph font properties.', 'shiftkey' ),
            'font_family_clear' => true,
            'google'   => true,
            'font-backup' => false,
            'non-google' => 'Arial',
            'letter-spacing'=> true,
            'font-size'     => true,
            'line-height'   => true,
            'text-align'   => false,
            'units'       => 'rem',            
            'default'  => array(
                'color'       => '',
                'font-style'  => '',
                'font-family' => '',                
                'font-size'     => '',               
            ),
        ),
        array(
            'id'       => 'p-sm',
            'type'     => 'typography',
            'title'    => esc_attr__( 'Paragraph small', 'shiftkey' ),
            'subtitle' => esc_attr__( 'Specify the paragraph small properties.', 'shiftkey' ),
            'font_family_clear' => true,
            'google'   => true,
            'letter-spacing'=> true,
            'font-size'     => true,
            'line-height'   => true,
            'text-align'   => false,
            'units'       => 'rem',           
            'default'  => array(
                'color'       => '',
                'font-style'  => '',
                'font-family' => '',                  
                'font-size'     => '',               
            ),
        ),
        array(
            'id'       => 'p-md',
            'type'     => 'typography',
            'title'    => esc_attr__( 'Paragraph medium', 'shiftkey' ),
            'subtitle' => esc_attr__( 'Specify the paragraph medium properties.', 'shiftkey' ),
            'font_family_clear' => true,
            'google'   => true,
            'letter-spacing'=> true,
            'font-size'     => true,
            'line-height'   => true,
            'text-align'   => false,
            'units'       => 'rem',            
            'default'  => array(
                'color'       => '',
                'font-style'  => '',
                'font-family' => '',                
                'font-size'     => '',               
            ),
        ),
        array(
            'id'       => 'p-lg',
            'type'     => 'typography',
            'title'    => esc_attr__( 'Paragraph large', 'shiftkey' ),
            'subtitle' => esc_attr__( 'Specify the paragraph large properties.', 'shiftkey' ),
            'font_family_clear' => true,
            'google'   => true,
            'letter-spacing'=> true,
            'font-size'     => true,
            'line-height'   => true,
            'text-align'   => false,
            'units'       => 'rem',            
            'default'  => array(
                'color'       => '',
                'font-style'  => '',
                'font-family' => '',               
                'font-size'     => '',               
            ),
        ),
        array(
            'id'       => 'p-xl',
            'type'     => 'typography',
            'title'    => esc_attr__( 'Paragraph extra large', 'shiftkey' ),
            'subtitle' => esc_attr__( 'Specify the paragraph extra large properties.', 'shiftkey' ),
            'font_family_clear' => true,
            'google'   => true,
            'letter-spacing'=> true,
            'font-size'     => true,
            'line-height'   => true,
            'text-align'   => false,
            'units'       => 'rem',            
            'default'  => array(
                'color'       => '',
                'font-style'  => '',
                'font-family' => '',                
                'font-size'     => '',               
            ),
        ), 
    );

    return apply_filters( 'shiftkey/paragraph_typography_options', $options, $args );
}