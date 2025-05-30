<?php
/**
 * Header Builder
 * Columns
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

/**
 * Columns
 */

foreach( $this->header_rows as $row ) {

    // Up to 6 columns.
    for( $i=1; $i<=6; $i++ ) {
        $section_id = 'sydney_header_row__' . $row['id'] . '_column' . $i;

        // Section.
        $wp_customize->add_section(
            new Sydney_Section_Hidden(
				$wp_customize,
                $section_id,
                array(
                    /* translators: 1: column number. */
                    'title'      => sprintf( esc_html__( 'Column %s', 'sydney' ), $i ),
                    'panel'      => 'sydney_panel_header'
                )
            )
        );

        /**
         * Tabs (Layout / Design)
         * 
         */
        $wp_customize->add_setting(
            $section_id . '_tabs',
            array(
                'default'           => '',
                'sanitize_callback' => 'esc_attr'
            )
        );
        $wp_customize->add_control(
            new Sydney_Tab_Control (
                $wp_customize,
                $section_id . '_tabs',
                array(
                    'label' 				=> '',
                    'section'       		=> $section_id,
                    'controls_general'		=> wp_json_encode(
                        array(
                            "#customize-control-{$section_id}_vertical_alignment",
                            "#customize-control-{$section_id}_inner_layout",
                            "#customize-control-{$section_id}_horizontal_alignment",
                            "#customize-control-{$section_id}_elements_spacing",
                        ),
                    ),
                    'controls_design'		=> wp_json_encode(
                        array(
                            "#customize-control-{$section_id}_padding",
                            "#customize-control-{$section_id}_margin",
                        )
                    ),
                    'priority' 				=> 10
                )
            )
        );

        /**
         * Layout (Tab Content)
         * 
         */

        // Vertical Alignment.
        $default = Sydney_Header_Footer_Builder::get_row_column_default_customizer_value( $row[ 'id' ], $i, 'vertical_alignment' );

        $wp_customize->add_setting( 
            $section_id . '_vertical_alignment_desktop',
            array(
                'default' 			=> $default,
                'sanitize_callback' => 'sydney_sanitize_text',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_setting( 
            $section_id . '_vertical_alignment_tablet',
            array(
                'default' 			=> $default,
                'sanitize_callback' => 'sydney_sanitize_text',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_setting( 
            $section_id . '_vertical_alignment_mobile',
            array(
                'default' 			=> $default,
                'sanitize_callback' => 'sydney_sanitize_text',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_control( 
            new Sydney_Radio_Buttons( 
                $wp_customize, 
                $section_id . '_vertical_alignment',
                array(
                    'label'         => esc_html__( 'Vertical Alignment', 'sydney' ),
                    'section'       => $section_id,
                    'is_responsive' => true,
                    'settings' 		=> array (
                        'desktop' 		=> $section_id . '_vertical_alignment_desktop',
                        'tablet' 		=> $section_id . '_vertical_alignment_tablet',
                        'mobile' 		=> $section_id . '_vertical_alignment_mobile'
                    ),
                    'choices'       => array(
                        'top'    => esc_html__( 'Top', 'sydney' ),
                        'middle' => esc_html__( 'Middle', 'sydney' ),
                        'bottom' => esc_html__( 'Bottom', 'sydney' )
                    ),
                    'priority'      => 20
                )
            ) 
        );

        // Inner Elements Layout.
        $default = Sydney_Header_Footer_Builder::get_row_column_default_customizer_value( $row[ 'id' ], $i, 'inner_layout' );

        $wp_customize->add_setting( 
            $section_id . '_inner_layout_desktop',
            array(
                'default' 			=> $default,
                'sanitize_callback' => 'sydney_sanitize_text',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_setting( 
            $section_id . '_inner_layout_tablet',
            array(
                'default' 			=> $default,
                'sanitize_callback' => 'sydney_sanitize_text',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_setting( 
            $section_id . '_inner_layout_mobile',
            array(
                'default' 			=> $default,
                'sanitize_callback' => 'sydney_sanitize_text',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_control( 
            new Sydney_Radio_Buttons( 
                $wp_customize, 
                $section_id . '_inner_layout',
                array(
                    'label'   => esc_html__( 'Inner Elements Layout', 'sydney' ),
                    'section' => $section_id,
                    'is_responsive' => true,
                    'settings' => array(
                        'desktop' 		=> $section_id . '_inner_layout_desktop',
                        'tablet' 		=> $section_id . '_inner_layout_tablet',
                        'mobile' 		=> $section_id . '_inner_layout_mobile'
                    ),
                    'choices' => array(
                        'stack'  => esc_html__( 'Stack', 'sydney' ),
                        'inline' => esc_html__( 'Inline', 'sydney' )
                    ),
                    'priority'              => 25
                )
            ) 
        );
    
        // Horizontal Alignment.
        $default = Sydney_Header_Footer_Builder::get_row_column_default_customizer_value( $row[ 'id' ], $i, 'horizontal_alignment' );

        $wp_customize->add_setting( 
            $section_id . '_horizontal_alignment_desktop',
            array(
                'default' 			=> $default,
                'sanitize_callback' => 'sydney_sanitize_text',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_setting( 
            $section_id . '_horizontal_alignment_tablet',
            array(
                'default' 			=> $default,
                'sanitize_callback' => 'sydney_sanitize_text',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_setting( 
            $section_id . '_horizontal_alignment_mobile',
            array(
                'default' 			=> $default,
                'sanitize_callback' => 'sydney_sanitize_text',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_control( 
            new Sydney_Radio_Buttons( 
                $wp_customize, 
                $section_id . '_horizontal_alignment',
                array(
                    'label'         => esc_html__( 'Horizontal Alignment', 'sydney' ),
                    'section'       => $section_id,
                    'is_responsive' => true,
                    'settings' => array(
                        'desktop' 		=> $section_id . '_horizontal_alignment_desktop',
                        'tablet' 		=> $section_id . '_horizontal_alignment_tablet',
                        'mobile' 		=> $section_id . '_horizontal_alignment_mobile'
                    ),
                    'choices'       => array(
                        'start'  => esc_html__( 'Start', 'sydney' ),
                        'center' => esc_html__( 'Center', 'sydney' ),
                        'end'    => esc_html__( 'End', 'sydney' )
                    ),
                    'priority'      => 30
                )
            ) 
        );

        // Elements Spacing.
        $wp_customize->add_setting( 
            $section_id . '_elements_spacing_desktop',
            array(
                'default'   		=> 25,
                'transport'			=> 'postMessage',
                'sanitize_callback' => 'absint'
            ) 
        );
        $wp_customize->add_setting( 
            $section_id . '_elements_spacing_tablet',
            array(
                'default'   		=> 25,
                'transport'			=> 'postMessage',
                'sanitize_callback' => 'absint'
            ) 
        );
        $wp_customize->add_setting( 
            $section_id . '_elements_spacing_mobile',
            array(
                'default'   		=> 25,
                'transport'			=> 'postMessage',
                'sanitize_callback' => 'absint'
            ) 
        );			
        
        $wp_customize->add_control( 
            new Sydney_Responsive_Slider( 
                $wp_customize, 
                $section_id . '_elements_spacing',
                array(
                    'label' 		=> esc_html__( 'Elements Spacing', 'sydney' ),
                    'section' 		=> $section_id,
                    'is_responsive'	=> true,
                    'settings' 		=> array (
                        'size_desktop' 		=> $section_id . '_elements_spacing_desktop',
                        'size_tablet' 		=> $section_id . '_elements_spacing_tablet',
                        'size_mobile' 		=> $section_id . '_elements_spacing_mobile'
                    ),
                    'input_attrs' => array (
                        'min'	=> 0,
                        'max'	=> 150,
                        'step'  => 1
                    ),
                    'priority'     => 30
                )
            ) 
        );

        /**
         * Design (Tab Content)
         * 
         */

        // Padding
        $wp_customize->add_setting( 
            $section_id . '_padding_desktop',
            array(
                'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
                'sanitize_callback' => 'sydney_sanitize_text',
                'transport'         => 'postMessage'
            ) 
        );
        $wp_customize->add_setting( 
            $section_id . '_padding_tablet',
            array(
                'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
                'sanitize_callback' => 'sydney_sanitize_text',
                'transport'         => 'postMessage'
            ) 
        );
        $wp_customize->add_setting( 
            $section_id . '_padding_mobile',
            array(
                'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
                'sanitize_callback' => 'sydney_sanitize_text',
                'transport'         => 'postMessage'
            ) 
        );
        $wp_customize->add_control( 
            new Sydney_Dimensions_Control( 
                $wp_customize, 
                $section_id . '_padding',
                array(
                    'label'           	=> __( 'Padding', 'sydney' ),
                    'section'         	=> $section_id,
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
                        'desktop' => $section_id . '_padding_desktop',
                        'tablet'  => $section_id . '_padding_tablet',
                        'mobile'  => $section_id . '_padding_mobile'
                    ),
                    'priority'	      	 => 32
                )
            )
        );

        // Margin
        $wp_customize->add_setting( 
            $section_id . '_margin_desktop',
            array(
                'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
                'sanitize_callback' => 'sydney_sanitize_text',
                'transport'         => 'postMessage'
            ) 
        );
        $wp_customize->add_setting( 
            $section_id . '_margin_tablet',
            array(
                'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
                'sanitize_callback' => 'sydney_sanitize_text',
                'transport'         => 'postMessage'
            ) 
        );
        $wp_customize->add_setting( 
            $section_id . '_margin_mobile',
            array(
                'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
                'sanitize_callback' => 'sydney_sanitize_text',
                'transport'         => 'postMessage'
            ) 
        );
        $wp_customize->add_control( 
            new Sydney_Dimensions_Control( 
                $wp_customize, 
                $section_id . '_margin',
                array(
                    'label'           	=> __( 'Margin', 'sydney' ),
                    'section'         	=> $section_id,
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
                        'desktop' => $section_id . '_margin_desktop',
                        'tablet'  => $section_id . '_margin_tablet',
                        'mobile'  => $section_id . '_margin_mobile'
                    ),
                    'priority'	      	 => 32
                )
            )
        );

    }
    
}

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound