<?php
/**
 * Header/Footer Builder
 * Logo Component
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// List of options we'll need to move.
$opts_to_move = array(
    'general' => array(
        'site_logo',
        'sitcky_header_logo',
        'blogname',
        'blogdescription',
        'site_logo_size',
        'logo_site_title',
        'display_header_text',
        'site_icon'
    ),
    'style'   => array(
        'site_title_color',
        'site_title_font_size',
        'site_desc_color',
        'site_desc_font_size',
    )
);

// Register New Options.
$wp_customize->add_section(
    new Sydney_Section_Hidden(
        $wp_customize,
        'sydney_section_hb_component__logo',
        array(
            'title'      => esc_html__( 'Logo', 'sydney' ),
            'panel'      => 'sydney_panel_header'
        )
    )
);

$wp_customize->add_setting(
    'sydney_section_hb_component__logo_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Sydney_Tab_Control (
        $wp_customize,
        'sydney_section_hb_component__logo_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'sydney_section_hb_component__logo',
            'controls_general'		=> wp_json_encode(
                array_merge(
                    array_map( function( $name ){ return "#customize-control-$name"; }, $opts_to_move[ 'general' ] ),
                    array(
                        '#customize-control-sydney_section_hb_component__logo_text_alignment',
                        '#customize-control-sydney_section_hb_component__logo_visibility'
                    )
                )
            ),
            'controls_design'		=> wp_json_encode(
                array_merge(
                    array_map( function( $name ){ return "#customize-control-$name"; }, $opts_to_move[ 'style' ] ),
                    array(
                        '#customize-control-logo_sticky_title',
                        '#customize-control-site_title_sticky_color',
                        '#customize-control-site_description_sticky_color',
                        '#customize-control-sydney_section_hb_component__logo_padding',
                        '#customize-control-sydney_section_hb_component__logo_margin',
                        '#customize-control-sydney_section_hb_component__logo_layout_title'    
                    )
                )
            ),
            'priority' 				=> 20
        )
    )
);

// Sticky Header - Title
$wp_customize->add_setting( 
    'logo_sticky_title',
    array(
        'default' 			=> '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control( 
    new Sydney_Text_Control( 
        $wp_customize, 
        'logo_sticky_title',
        array(
            'label'			  => esc_html__( 'Sticky Mode', 'sydney' ),
            'section' 		  => 'sydney_section_hb_component__logo',
            'active_callback' => 'sydney_callback_sticky_header',
            'priority'	 	  => 51
        )
    )
);

// Text Alignment
$wp_customize->add_setting( 
    'sydney_section_hb_component__logo_text_alignment_desktop',
    array(
        'default' 			=> 'left',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting( 
    'sydney_section_hb_component__logo_text_alignment_tablet',
    array(
        'default' 			=> 'left',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting( 
    'sydney_section_hb_component__logo_text_alignment_mobile',
    array(
        'default' 			=> 'left',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( 
    new Sydney_Radio_Buttons( 
        $wp_customize, 
        'sydney_section_hb_component__logo_text_alignment',
        array(
            'label'         => esc_html__( 'Text Alignment', 'sydney' ),
            'section'       => 'sydney_section_hb_component__logo',
            'is_responsive' => true,
            'settings' => array(
                'desktop' 		=> 'sydney_section_hb_component__logo_text_alignment_desktop',
                'tablet' 		=> 'sydney_section_hb_component__logo_text_alignment_tablet',
                'mobile' 		=> 'sydney_section_hb_component__logo_text_alignment_mobile'
            ),
            'choices'       => array(
                'left' 		=> '<svg width="16" height="13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h10v1H0zM0 4h16v1H0zM0 8h10v1H0zM0 12h16v1H0z"/></svg>',
                'center' 	=> '<svg width="16" height="13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 0h10v1H3zM0 4h16v1H0zM3 8h10v1H3zM0 12h16v1H0z"/></svg>',
                'right' 	=> '<svg width="16" height="13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 0h10v1H6zM0 4h16v1H0zM6 8h10v1H6zM0 12h16v1H0z"/></svg>'
            ),
            'priority'      => 58
        )
    ) 
);

// Visibility
$wp_customize->add_setting( 
    'sydney_section_hb_component__logo_visibility_desktop',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting( 
    'sydney_section_hb_component__logo_visibility_tablet',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting( 
    'sydney_section_hb_component__logo_visibility_mobile',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( 
    new Sydney_Radio_Buttons( 
        $wp_customize, 
        'sydney_section_hb_component__logo_visibility',
        array(
            'label'         => esc_html__( 'Visibility', 'sydney' ),
            'section'       => 'sydney_section_hb_component__logo',
            'is_responsive' => true,
            'settings' => array(
                'desktop' 		=> 'sydney_section_hb_component__logo_visibility_desktop',
                'tablet' 		=> 'sydney_section_hb_component__logo_visibility_tablet',
                'mobile' 		=> 'sydney_section_hb_component__logo_visibility_mobile'
            ),
            'choices'       => array(
                'visible' => esc_html__( 'Visible', 'sydney' ),
                'hidden'  => esc_html__( 'Hidden', 'sydney' )
            ),
            'priority'      => 58
        )
    ) 
);

/**
 * Styling
 */

// Sticky Header - Site TItle Color
$wp_customize->add_setting(
	'site_title_sticky_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control(
	new Sydney_Alpha_Color(
		$wp_customize,
		'site_title_sticky_color',
		array(
			'label'         	=> esc_html__( 'Site Title Color', 'sydney' ),
			'section'       	=> 'sydney_section_hb_component__logo',
            'active_callback'   => 'sydney_callback_sticky_header',
			'priority'			=> 52
		)
	)
);

// Sticky Header - Site Description Color
$wp_customize->add_setting(
	'site_description_sticky_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control(
	new Sydney_Alpha_Color(
		$wp_customize,
		'site_description_sticky_color',
		array(
			'label'         	=> esc_html__( 'Site Description Color', 'sydney' ),
			'section'       	=> 'sydney_section_hb_component__logo',
            'active_callback'   => 'sydney_callback_sticky_header',
			'priority'			=> 53
		)
	)
);

$wp_customize->add_setting(
    'sydney_section_hb_component__logo_layout_title',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);

$wp_customize->add_control(
    new Sydney_Text_Control(
        $wp_customize,
        'sydney_section_hb_component__logo_layout_title',
        array(
            'label'    => esc_html__( 'Layout', 'sydney' ),
            'section'  => 'sydney_section_hb_component__logo',
            'priority' => 70,
            'separator' => 'before'
        )
    )
);

// Padding
$wp_customize->add_setting( 
    'sydney_section_hb_component__logo_padding_desktop',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'sydney_section_hb_component__logo_padding_tablet',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'sydney_section_hb_component__logo_padding_mobile',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_control( 
    new Sydney_Dimensions_Control( 
        $wp_customize, 
        'sydney_section_hb_component__logo_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'sydney' ),
            'section'         	=> 'sydney_section_hb_component__logo',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'              => array( 'px', '%', 'rem', 'em', 'vw', 'vh' ),
            'link_values_toggle' => true,
            'is_responsive'   	 => true,
            'settings'        	 => array(
                'desktop' => 'sydney_section_hb_component__logo_padding_desktop',
                'tablet'  => 'sydney_section_hb_component__logo_padding_tablet',
                'mobile'  => 'sydney_section_hb_component__logo_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Margin
$wp_customize->add_setting( 
    'sydney_section_hb_component__logo_margin_desktop',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'sydney_section_hb_component__logo_margin_tablet',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'sydney_section_hb_component__logo_margin_mobile',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_control( 
    new Sydney_Dimensions_Control( 
        $wp_customize, 
        'sydney_section_hb_component__logo_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'sydney' ),
            'section'         	=> 'sydney_section_hb_component__logo',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'              => array( 'px', '%', 'rem', 'em', 'vw', 'vh' ),
            'link_values_toggle' => true,
            'is_responsive'   	 => true,
            'settings'        	 => array(
                'desktop' => 'sydney_section_hb_component__logo_margin_desktop',
                'tablet'  => 'sydney_section_hb_component__logo_margin_tablet',
                'mobile'  => 'sydney_section_hb_component__logo_margin_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Move existing options.
$priority = 40;
foreach( $opts_to_move as $control_tabs ) {
    foreach( $control_tabs as $option_name ) {

        if( $wp_customize->get_control( $option_name ) === NULL ) {
            continue;
        }

        if( $option_name === 'site_logo_size' ) {
            $wp_customize->get_setting( $option_name . '_desktop' )->default = 120;
        }
        
        $wp_customize->get_control( $option_name )->section  = 'sydney_section_hb_component__logo';
        $wp_customize->get_control( $option_name )->priority = $priority;

        if( $option_name === 'site_icon' ) {
            $wp_customize->get_control( $option_name )->priority = 60;
        }
        
        $priority++;
    }
}

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound