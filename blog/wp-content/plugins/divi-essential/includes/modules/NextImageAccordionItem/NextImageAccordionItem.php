<?php

class Next_ImageAccordionItem extends ET_Builder_Module {

	public $slug       		= 'dnxte_image_accordion_item';
	public $vb_support 		= 'on';
	public $type            = 'child';
    public $child_title_var = 'dnxte_imga_title';

	protected $module_credits = array(
		'module_uri' => 'https://www.diviessential.com/divi-image-accordion/',
		'author'     => 'Divi Next',
		'author_uri' => 'www.divinext.com',
	);

	public function init() {
		$this->name = esc_html__( 'Next Image Accordion Item', 'dnxte-divi-essential' );
		$this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'dnxte_accordion_bg' 	=> esc_html__('Image', 'dnxte-divi-essential'),
					'dnxte_accordion' 		=> esc_html__('Accordion', 'dnxte-divi-essential'),
					'dnxte_btn_bg'			=> array(
						'title'		=>	esc_html__('Button Background', 'dnxte-divi-essential'),
						'priority'	=>	78,
					),
					'dnxte_icon_bg'			=> array(
						'title'		=>	esc_html__('Icon Background', 'dnxte-divi-essential'),
						'priority'	=>	79,
					),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'dnxte_icon' 	  => esc_html__('Icon', 'dnxte-divi-essential'),
                    'dnxte_imga_img'  => esc_html__('Image', 'dnxte-divi-essential'),
					'dnxte_imga_text' => array(
						'title' => esc_html__('Text', 'dnxte-divi-essential'),
                        'sub_toggles' => array(
                            'title' => array(
                                'name' => esc_html__('Title', 'dnxte-divi-essential'),
							),
                            'desc' => array(
                                'name' => esc_html__('Description', 'dnxte-divi-essential'),
							),
                        ),
                        'tabbed_subtoggles'    => true,
                        'priority' => 49,
                    ),
					'dnxte_ovly_bg' 		=> esc_html__('Overlay', 'dnxte-divi-essential'),
					'dnxte_accordion_btn' 	=> esc_html__('Button', 'dnxte-divi-essential'),
				),
            ),
            'custom_css' => array(
                'toggles' => array(),
            ),
		);

		$this->advanced_fields = array(
            'fonts' => array(
                'header' => array(
                    'label' => esc_html__('Title', 'dnxte-divi-essential'),
                    'css' => array(
                        'main'        => "%%order_class%% .dnxte-accordion-title",
                        'text_align'  => "%%order_class%% .dnxte-accordion-title",
					),
					'toggle_slug'	=> 'dnxte_imga_text',
					'sub_toggle'	=> 'title',
					'tab_slug'		=> 'advanced',
                    'header_level' => array(
                        'default' => 'h2',
					),
				),
                'dnxte_imga_desc' => array(
                    'label' => esc_html__('Description', 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => "%%order_class%% .dnxte-imageacdion-pra",
					),
					'toggle_slug'	=> 'dnxte_imga_text',
					'sub_toggle'	=> 'desc',
					'tab_slug'		=> 'advanced',
				),
				'dnxte_btn_text' => array(
					'label'    			=> esc_html__( '', 'dnxte-divi-essential' ),
					'toggle_slug'   	=> 'dnxte_accordion_btn',
					'tab_slug'			=> 'advanced',
					'css'      => array(
						'main' => "%%order_class%% .dnxte_accordion_button",
						'text_align'  => "%%order_class%% .dnxte-accordion-button-wrap",
					),
				),
			),
			'background' => array(
                'settings' => array(
                    'color' => 'alpha',
                ),
                'css' => array(
                    'main' => "%%order_class%%",
                    'important' => true,
                ),
            ),
            'borders' => array(
                'default' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%%",
                            'border_styles' => "%%order_class%%",
                        ),
                    ),
                ),
                'imga_icon_style'  => array(
                    'css'      => array(
                        'main' => array(
                            'border_radii'  => "%%order_class%% .dnxte-imageacdion-social",
                            'border_styles' => "%%order_class%% .dnxte-imageacdion-social",
                        ),
                    ),
                    'defaults'    => array(
                        'border_radii'  => 'on|0px|0px|0px|0px',
                        'border_styles' => array(
                            'width' => '0px',
                            'color' => '#FFFFFF',
                            'style' => 'solid',
                        ),
                    ),
                    'label_prefix' => esc_html__( '', 'dnxte-divi-essential' ),
                    'tab_slug'     => 'advanced',
                    'toggle_slug'  => 'dnxte_icon',
                ),
                'imga_img_style'  => array(
                    'css'      => array(
                        'main' => array(
                            'border_radii'  => "%%order_class%% .dnxte-icon-image",
                            'border_styles' => "%%order_class%% .dnxte-icon-image",
                        ),
                    ),
                    'defaults'    => array(
                        'border_radii'  => 'on|0px|0px|0px|0px',
                        'border_styles' => array(
                            'width' => '0px',
                            'color' => '#FFFFFF',
                            'style' => 'solid',
                        ),
                    ),
                    'label_prefix' => esc_html__( '', 'dnxte-divi-essential' ),
                    'tab_slug'     => 'advanced',
                    'toggle_slug'  => 'dnxte_imga_img',
                ),
                'btn_border_style'  => array(
                    'css'      => array(
                        'main' => array(
                            'border_radii'  => "%%order_class%% .dnxte_accordion_button",
                            'border_styles' => "%%order_class%% .dnxte_accordion_button",
                        ),
                    ),
                    'defaults'    => array(
                        'border_radii'  => 'on|0px|0px|0px|0px',
                        'border_styles' => array(
                            'width' => '0px',
                            'color' => '#FFFFFF',
                            'style' => 'solid',
                        ),
                    ),
                    'label_prefix' => esc_html__( '', 'dnxte-divi-essential' ),
                    'tab_slug'     => 'advanced',
                    'toggle_slug'  => 'dnxte_accordion_btn',
                ),
            ),
            'box_shadow' => array(
                'default' => array(
                    'css' => array(
                        'main' => "%%order_class%%",
                        'hover' => '%%order_class%%:hover',
                        'overlay' => 'inset',
                    ),
                ),
            ),
            'margin_padding' => array(
                'css' => array(
                    'main' => '%%order_class%%',
                    'important' => 'all',
                ),
            ),
            'max_width' => array(
                'css' => array(
                    'module_alignment' => '%%order_class%%',
                ),
            ),
            'filters' => array(
                'css' => array(
                    'main' => '%%order_class%%',
                ),
                'child_filters_target' => array(
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'image',
                ),
            ),
            //'button' => false,
            'text' => false,
        );

        $this->custom_css_fields = array(
            'icon' => array(
                'label' => esc_html__('Icon', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-imageacdion-social',
            ),
            'image' => array(
                'label' => esc_html__('Icon Image', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-imageacdion-social',
            ),
            'title' => array(
                'label' => esc_html__('Title', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-imageacdion-heading',
            ),
            'desc' => array(
                'label' => esc_html__('Description', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-accordion-description',
            ),
            'btn' => array(
                'label' => esc_html__('Button', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-accordion-button-wrap',
            ),
        );
	}

	public function get_fields() {
		$fields = array(
			'dnxte_bg_img' 				=> array(
                'label' 				=> esc_html__('Image', 'dnxte-divi-essential'),
                'type' 					=> 'upload',
                'option_category' 		=> 'basic_option',
                'upload_button_text' 	=> esc_attr__('Upload an image', 'dnxte-divi-essential'),
                'choose_text' 			=> esc_attr__('Choose an Image', 'dnxte-divi-essential'),
                'update_text' 			=> esc_attr__('Set As Image', 'dnxte-divi-essential'),
                'description' 			=> esc_html__('Upload an image to display at the top of your team overlay.', 'dnxte-divi-essential'),
                'toggle_slug' 			=> 'dnxte_accordion_bg',
                'dynamic_content' 		=> 'image',
                'mobile_options' 		=> true,
                'hover' 				=> 'tabs',
            ),
           'dnxte_use_onload_active'          => array(
                'label'                 => esc_html__('Onload Active', 'dnxte-divi-essential'),
                'type'                  => 'yes_no_button',
                'options'               => array(
                    'off' => esc_html__('No', 'dnxte-divi-essential'),
                    'on'  => esc_html__('Yes', 'dnxte-divi-essential'),
                ),
                'toggle_slug'           => 'dnxte_accordion',
            ),
			'dnxte_imga_title' 			=> array(
                'label' 				=> esc_html__( 'Title', 'dnxte-divi-essential' ),
                'description' 			=> esc_html__('Input the name of the person', 'dnxte-divi-essential'),
                'type' 					=> 'text',
                'toggle_slug' 			=> 'dnxte_accordion',
                'dynamic_content' 		=> 'text',
                'mobile_options' 		=> true,
                'hover' 				=> 'tabs',
			),
			'dnxte_imga_des' 			=> array(
                'label' 				=> esc_html__( 'Desccription', 'dnxte-divi-essential' ),
                'description' 			=> esc_html__('Input the name of the person', 'dnxte-divi-essential'),
                'type' 					=> 'tiny_mce',
                'toggle_slug' 			=> 'dnxte_accordion',
                'dynamic_content' 		=> 'text',
                'mobile_options' 		=> true,
                'hover' 				=> 'tabs',
			),
			'dnxte_use_icon' 	        => array(
				'label'                 => esc_html__( 'Use Icon', 'dnxte-divi-essential' ),
                'description' 	        => esc_html__( 'Here you can choose whether icon set below should be used.', 'dnxte-divi-essential' ),
				'type'                  => 'yes_no_button',
				'options'               => array(
					'off' 		        => esc_html__( 'No', 'dnxte-divi-essential' ),
					'on'  		        => esc_html__( 'Yes', 'dnxte-divi-essential' ),
				),
				'toggle_slug'           => 'dnxte_accordion',
				'default_on_front'      => 'on',
				'affects'               => array(
					'dnxte_font_icon',
					'dnxte_imga_icon_margin',
					'dnxte_imga_icon_padding',
				),
            ),
            'dnxte_font_icon' 		  => array(
				'label'               => esc_html__( 'Icon', 'dnxte-divi-essential' ),
				'type'                => 'select_icon',
				'option_category'     => 'basic_option',
				'class'               => array( 'et-pb-font-icon' ),
				'toggle_slug'         => 'dnxte_accordion',
				'description'         => esc_html__( 'Choose an icon to display with your blurb.', 'dnxte-divi-essential' ),
				'default'             => '$',
				'depends_show_if'     => 'on',
				'hover'               => 'tabs',
            ),
            'dnxte_use_icon_img' 	  => array(
				'label'               => esc_html__( 'Use Image', 'dnxte-divi-essential' ),
                'description' 	      => esc_html__( 'Here you can choose whether image set below should be used.', 'dnxte-divi-essential' ),
				'type'                => 'yes_no_button',
				'options'             => array(
					'off' 		      => esc_html__( 'No', 'dnxte-divi-essential' ),
					'on'  		      => esc_html__( 'Yes', 'dnxte-divi-essential' ),
				),
				'toggle_slug'         => 'dnxte_accordion',
				'default_on_front'    => 'on',
				'affects'             => array(
					'dnxte_icon_img',
					'dnxte_icon_alt',
					'dnxte_imga_img_margin',
					'dnxte_imga_img_padding',
				),
            ),
            'dnxte_icon_img' 			=> array(
                'label' 				=> esc_html__('Icon Image', 'dnxte-divi-essential'),
                'type' 					=> 'upload',
                'option_category' 		=> 'basic_option',
                'upload_button_text' 	=> esc_attr__('Upload an image', 'dnxte-divi-essential'),
                'choose_text' 			=> esc_attr__('Choose an Image', 'dnxte-divi-essential'),
                'update_text' 			=> esc_attr__('Set As Image', 'dnxte-divi-essential'),
                'description' 			=> esc_html__('Upload an image to display at the top of your team overlay.', 'dnxte-divi-essential'),
                'toggle_slug' 			=> 'dnxte_accordion',
                'dynamic_content' 		=> 'image',
                'depends_show_if'       => 'on',
                'mobile_options' 		=> true,
                'hover' 				=> 'tabs',
            ),
            'dnxte_icon_alt' 			=> array(
                'label'                 => esc_html__( 'Image Alt Text', 'dnxte-divi-essential' ),
				'description'           => esc_html__( 'Define the HTML ALT text for your image here.', 'dnxte-divi-essential' ),
                'depends_show_if'       => 'on',
                'type'                  => 'text',
				'option_category'       => 'basic_option',
				'toggle_slug'           => 'dnxte_accordion',
				'dynamic_content'       => 'text',
            ),
            'dnxte_btn_show_hide'       => array(
				'label'                 => esc_html__( 'Button Show Hide', 'dnxte-divi-essential' ),
				'type'                  => 'yes_no_button',
				'options'               => array(
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
				),
				'toggle_slug'           => 'dnxte_accordion',
				'affects'               => array(
					'button_text',
					'button_link',
					'button_link_new_window',
					'btn_one_show_hide',
					'dnxte_imga_btn_margin',
					'dnxte_imga_btn_padding',
				),
				'default_on_front'=> 'on',
            ),
            'button_text'         => array(
				'label'           => esc_html__( 'Button Text', 'dnxte-divi-essential' ),
				'type'            => 'text',
				'dynamic_content' => 'text',
                'default'         => 'Button Text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxte_accordion',
				'depends_show_if' => 'on',
            ),
            'button_link'         => array(
				'label'           => esc_html__( 'Button Link', 'dnxte-divi-essential' ),
				'description'     => esc_html__( 'When clicked the module will link to this URL.', 'dnxte-divi-essential' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'toggle_slug'     => 'dnxte_accordion',
				'dynamic_content' => 'url',
				'depends_show_if' => 'on',
            ),
            'button_link_new_window'=> array(
				'label'				=> esc_html__( 'Button Link Target', 'dnxte-divi-essential' ),
				'description'      	=> esc_html__( 'Here you can choose whether or not your link opens in a new window', 'dnxte-divi-essential' ),
				'type'             	=> 'select',
				'option_category'  	=> 'configuration',
				'options'         	=> array(
					'_self' => esc_html__( 'In The Same Window', 'dnxte-divi-essential' ),
					'_blank'  => esc_html__( 'In The New Tab', 'dnxte-divi-essential' ),
				),
				'toggle_slug'      => 'dnxte_accordion',
				'default_on_front' => 'off',
				'depends_show_if'  => 'on',
			),
            'dnxte_accordion_align_horizontal'=> array(
                'label'                 => esc_html__('Horizontal Align', 'dnxte-divi-essential'),
                'type'                  => 'select',
                'option_category'       => 'basic_option',
                'default'               => 'center',
                'options'               => array(
                    'left'   => esc_html__('Left', 'dnxte-divi-essential'),
                    'center' => esc_html__('Center', 'dnxte-divi-essential'),
                    'right'  => esc_html__('Right', 'dnxte-divi-essential'),
                ),
                'toggle_slug'           => 'dnxte_accordion'
            ),
            'dnxte_accordion_align_vertical'=> array(
                'label'                 => esc_html__('Vertical Align', 'dnxte-divi-essential'),
                'type'                  => 'select',
                'option_category'       => 'basic_option',
                'default'               => 'center',
                'options'               => array(
                    'top'      => esc_html__('Top', 'dnxte-divi-essential'),
                    'center'   => esc_html__('Center', 'dnxte-divi-essential'),
                    'bottom'   => esc_html__('Bottom', 'dnxte-divi-essential'),
                ),
                'toggle_slug'           => 'dnxte_accordion'
            ),
            'dnxte_imga_icon_alignment'   => array(
                'label'           => esc_html__('Alignment', 'dnxte-divi-essential'),
                'description'     => esc_html__('Align badge to the left, right or center.', 'dnxte-divi-essential'),
                'type'            => 'align',
                'tab_slug'        => 'advanced',
                'options'         => et_builder_get_text_orientation_options(array('justified')),
                'toggle_slug'     => 'dnxte_icon',
                'mobile_options'  => true,
            ),
            'dnxte_imga_img_alignment'    => array(
                'label'           => esc_html__('Alignment', 'dnxte-divi-essential'),
                'description'     => esc_html__('Align badge to the left, right or center.', 'dnxte-divi-essential'),
                'type'            => 'align',
                'tab_slug'        => 'advanced',
                'options'         => et_builder_get_text_orientation_options(array('justified')),
                'toggle_slug'     => 'dnxte_imga_img',
                'mobile_options'  => true,
            ),
            'dnxte_imga_icon_margin'	  => array(
				'label'           => esc_html__('Icon Margin', 'dnxte-divi-essential'),
                'type'            => 'custom_margin',
                'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'margin_padding',
			),
			'dnxte_imga_icon_padding'	  => array(
				'label'           => esc_html__('Icon Padding', 'dnxte-divi-essential'),
				'type'            => 'custom_padding',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'margin_padding',
			),
            'dnxte_imga_img_margin'	      => array(
				'label'           => esc_html__('Image Margin', 'dnxte-divi-essential'),
                'type'            => 'custom_margin',
                'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'margin_padding',
			),
			'dnxte_imga_img_padding'	  => array(
				'label'           => esc_html__('Image Padding', 'dnxte-divi-essential'),
				'type'            => 'custom_padding',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'margin_padding',
			),
            'dnxte_imga_title_margin'	  => array(
				'label'           => esc_html__('Title Margin', 'dnxte-divi-essential'),
                'type'            => 'custom_margin',
                'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'margin_padding',
			),
			'dnxte_imga_title_padding'	  => array(
				'label'           => esc_html__('Title Padding', 'dnxte-divi-essential'),
				'type'            => 'custom_padding',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'margin_padding',
			),
            'dnxte_imga_desc_margin'	  => array(
				'label'           => esc_html__('Description Margin', 'dnxte-divi-essential'),
                'type'            => 'custom_margin',
                'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'margin_padding',
			),
			'dnxte_imga_desc_padding'	  => array(
				'label'           => esc_html__('Description Padding', 'dnxte-divi-essential'),
				'type'            => 'custom_padding',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'margin_padding',
			),
            'dnxte_imga_btn_margin'	      => array(
				'label'           => esc_html__('Button Margin', 'dnxte-divi-essential'),
                'type'            => 'custom_margin',
                'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'margin_padding',
                'depends_show_if' => 'on',
			),
			'dnxte_imga_btn_padding'	  => array(
				'label'           => esc_html__('Button Padding', 'dnxte-divi-essential'),
				'type'            => 'custom_padding',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'margin_padding',
                'depends_show_if' => 'on',
            ),
            'dnxte_icon_size'       => array(
				'label'             => esc_html__( 'Icon Size', 'dnxte-divi-essential' ),
				'type'              => 'range',
				'option_category'   => 'layout',
				'depends_show_if'   => 'on',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'dnxte_icon',
				'default_unit'      => 'px',
				'range_settings'    => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'default'           => '16px',
				'mobile_options'    => true,
				'hover'             => 'tabs',
            ),
            'dnxte_imga_icon_color' => array(
				'label'           => esc_html__( 'Icon Color', 'dnxte-divi-essential' ),
				'type'            => 'color-alpha',
				'description'     => esc_html__( 'This will adjust the icon color', 'dnxte-divi-essential' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxte_icon',
				'default'         => et_builder_accent_color(),
				'default'		  => '#8056ee',
				'mobile_options'  => true,
                'hover'           => 'tabs',
            ),
            'dnxte_imga_img_size'   => array(
                'label'             => esc_html__( 'Image  Size', 'dnxte-divi-essential' ),
                'type'              => 'range',
                'option_category'   => 'layout',
                'depends_show_if'   => 'on',
                'tab_slug'          => 'advanced',
                'toggle_slug'       => 'dnxte_imga_img',
                'default_unit'      => 'px',
                'range_settings'   => array(
                    'min'  => 0,
                    'max'  => 100,
                    'step' => 1,
                ),
                'default'           => '16px',
                'mobile_options'  => true,
                'hover'           => 'tabs',
            ),
		);
		$additional_options = array();
		$additional_options = array(
            'btn_bg_color' => array(
                'label'             => esc_html__('Button Background', 'dnxte-divi-essential'),
                'type'              => 'background-field',
                'base_name'         => "btn_bg",
                'context'           => "btn_bg",
                'option_category'   => 'layout',
                'custom_color'      => true,
				'default'           => ET_Global_Settings::get_value('all_buttons_bg_color'),
				'option_category' 	=> 'basic_option',
                'toggle_slug'       => "dnxte_btn_bg",
                'hover'             => 'tabs',
				'mobile_options'    => true,
                'background_fields' => array_merge(
                    ET_Builder_Element::generate_background_options(
                        'btn_bg',
                        'gradient',
                        "advanced",
                        "dnxte_btn_bg",
                        "btn_bg_gradient"
                    ),
                    ET_Builder_Element::generate_background_options(
                        "btn_bg",
                        "color",
                        "advanced",
                        "dnxte_btn_bg",
                        "btn_bg_color"
                    )
                ),
            ),
            'icon_bg_color' => array(
                'label'             => esc_html__('Icon Background', 'dnxte-divi-essential'),
                'type'              => 'background-field',
                'base_name'         => "icon_bg",
                'context'           => "icon_bg",
                'option_category'   => 'layout',
                'custom_color'      => true,
				'default'           => ET_Global_Settings::get_value('all_buttons_bg_color'),
				'option_category' 	=> 'basic_option',
                'toggle_slug'       => "dnxte_icon_bg",
                'hover'             => 'tabs',
				'mobile_options'    => true,
                'background_fields' => array_merge(
                    ET_Builder_Element::generate_background_options(
                        'icon_bg',
                        'gradient',
                        "advanced",
                        "dnxte_icon_bg",
                        "icon_bg_gradient"
                    ),
                    ET_Builder_Element::generate_background_options(
                        "icon_bg",
                        "color",
                        "advanced",
                        "dnxte_icon_bg",
                        "icon_bg_color"
                    )
                ),
            )
        );

        $additional_options = array_merge(
            $additional_options,
            $this->generate_background_options(
                "btn_bg",
                'skip',
                "advanced",
                "dnxte_btn_bg",
                "btn_bg_gradient"
			),
            $this->generate_background_options(
                "icon_bg",
                'skip',
                "advanced",
                "dnxte_icon_bg",
                "icon_bg_gradient"
			)
        );

        $additional_options = array_merge(
            $additional_options,
            $this->generate_background_options(
                "btn_bg",
                'skip',
                "advanced",
                "dnxte_btn_bg",
                "btn_bg_color"
			),
            $this->generate_background_options(
                "icon_bg",
                'skip',
                "advanced",
                "dnxte_icon_bg",
                "icon_bg_color"
			)
        );
		
        return array_merge($fields, $additional_options);
	}
	
	public function render( $attrs, $content = null, $render_slug ) {

        $multi_view 	                = et_pb_multi_view_options($this);
        $button_text 	                = $this->props['button_text'];
        $button_link 	                = $this->props['button_link'];
        $button_link_new_window 	    = $this->props['button_link_new_window'];
        $dnxte_font_icon 	            = $this->props['dnxte_font_icon'];
        $dnxte_icon_img 	            = $this->props['dnxte_icon_img'];
        $dnxte_icon_alt 	            = $this->props['dnxte_icon_alt'];

        $dnxte_accordion_align_horizontal = $this->props['dnxte_accordion_align_horizontal'];
        $dnxte_accordion_align_vertical   = $this->props['dnxte_accordion_align_vertical'];

		// Icon Alignment.
        $imga_icon_alignment_class   = Common::get_alignment("dnxte_imga_icon_alignment", $this);

		// Image Alignment.
        $imga_img_alignment_classes = Common::get_alignment("dnxte_imga_img_alignment", $this);

        // Icon Font Size
		$dnxte_icon_size             = $this->props['dnxte_icon_size'];
		$dnxte_icon_size_hover       = $this->get_hover_value('dnxte_icon_size');
		$dnxte_icon_size_tablet      = $this->props['dnxte_icon_size_tablet'];
		$dnxte_icon_size_phone       = $this->props['dnxte_icon_size_phone'];
		$dnxte_icon_size_last_edited = $this->props['dnxte_icon_size_last_edited'];

		if ( '' !== $this->props['dnxte_icon_size'] ) {
			$dnxte_icon_size_responsive_active = et_pb_get_responsive_status($dnxte_icon_size_last_edited);

			$dnxte_icon_size_values = array(
				'desktop' => $dnxte_icon_size,
				'tablet'  => $dnxte_icon_size_responsive_active ? $dnxte_icon_size_tablet : '',
				'phone'   => $dnxte_icon_size_responsive_active ? $dnxte_icon_size_phone : '',
			);
			$dnxte_icon_size_selector = "%%order_class%% .dnxte-accordion-image-icon .dnxte-imageacdion-social";
			et_pb_responsive_options()->generate_responsive_css($dnxte_icon_size_values, $dnxte_icon_size_selector, 'font-size', $render_slug);
        }

        // Image Size
		$dnxte_imga_img_size             = $this->props['dnxte_imga_img_size'];
		$dnxte_imga_img_size_hover       = $this->get_hover_value('dnxte_imga_img_size');
		$dnxte_imga_img_size_tablet      = $this->props['dnxte_imga_img_size_tablet'];
		$dnxte_imga_img_size_phone       = $this->props['dnxte_imga_img_size_phone'];
		$dnxte_imga_img_size_last_edited = $this->props['dnxte_imga_img_size_last_edited'];

		if ( '' !== $this->props['dnxte_imga_img_size'] ) {
			$dnxte_imga_img_size_responsive_active = et_pb_get_responsive_status($dnxte_imga_img_size_last_edited);

			$dnxte_imga_img_size_values = array(
				'desktop' => $dnxte_imga_img_size,
				'tablet'  => $dnxte_imga_img_size_responsive_active ? $dnxte_imga_img_size_tablet : '',
				'phone'   => $dnxte_imga_img_size_responsive_active ? $dnxte_imga_img_size_phone : '',
			);
			$dnxte_imga_img_size_selector = "%%order_class%% .dnxte-accordion-image-image .dnxte-icon-image";
			et_pb_responsive_options()->generate_responsive_css($dnxte_imga_img_size_values, $dnxte_imga_img_size_selector, 'width', $render_slug);
        }
        
        // Icon Color
		$dnxte_circle_color_values = et_pb_responsive_options()->get_property_values($this->props, 'dnxte_imga_icon_color');
		et_pb_responsive_options()->generate_responsive_css($dnxte_circle_color_values, '%%order_class%% .dnxte-accordion-image-icon .dnxte-imageacdion-social', 'color', $render_slug, '', 'color');

         

		//Icon BG
		$btn_bg_color = array(
            'color_slug' => 'icon_bg_color',
        );
		$use_color_gradient = $this->props['icon_bg_use_color_gradient'];
		
		$gradient = array(
            "gradient_type"           => 'icon_bg_color_gradient_type',
            "gradient_direction"      => 'icon_bg_color_gradient_direction',
            "radial"                  => 'icon_bg_color_gradient_direction_radial',
            "gradient_start"          => 'icon_bg_color_gradient_start',
            "gradient_end"            => 'icon_bg_color_gradient_end',
            "gradient_start_position" => 'icon_bg_color_gradient_start_position',
            "gradient_end_position"   => 'icon_bg_color_gradient_end_position',
            "gradient_overlays_image" => 'icon_bg_color_gradient_overlays_image',
		);
		
		$css_property = array(
            "desktop" => "%%order_class%% .dnxte-imageacdion-social",
            "hover"   => "%%order_class%% .dnxte-imageacdion-social:hover",
		);
		Common::apply_bg_css($render_slug, $this, $btn_bg_color, $use_color_gradient, $gradient, $css_property);
		$dnxte_font_icon 	        = $this->props['dnxte_font_icon'];
        $dnxte_icon_img 	        = $this->props['dnxte_icon_img'];
        $dnxte_icon_alt 	        = $this->props['dnxte_icon_alt'];

		//Title
		$dnxte_imga_title = $multi_view->render_element(array(
			'tag'     => et_pb_process_header_level($this->props['header_level'], 'h2'),
			'content' => '{{dnxte_imga_title}}',
			'attrs' => array(
				'class' => 'dnxte-accordion-title',
			),
		));

		//Description
		$dnxte_imga_des = $multi_view->render_element(array(
			'tag'     => 'p',
			'content' => '{{dnxte_imga_des}}',
			'attrs' => array(
				'class' => 'dnxte-imageacdion-pra',
			),
		) );

		$icon = "off" !== $this->props['dnxte_use_icon'] ? sprintf(
            '<div class="dnxte-accordion-image-icon %2$s"><span class="et-waypoint et_pb_animation_top et-pb-icon et-animated social_twitter dnxte-imageacdion-social">%1$s</span></div>',
            esc_attr( et_pb_process_font_icon( $dnxte_font_icon )),
            esc_attr( $imga_icon_alignment_class )
		) : '';
		
		$icon_image = "off" !== $this->props['dnxte_use_icon_img'] ? sprintf(
            '<div class="dnxte-icon-image-wrapper dnxte-accordion-image-image %3$s"><img src="%1$s" class="dnxte-icon-image" alt="%2$s" /></div>',
            et_core_esc_previously( $dnxte_icon_img ),
            et_core_esc_previously( $dnxte_icon_alt ),
            esc_attr( $imga_img_alignment_classes )
        ) : '';
        
        $button = 'off' !== $this->props['dnxte_btn_show_hide'] 
        ? sprintf(
            '<div class="dnxte-accordion-button-wrap"><a href="%2$s" class="dnxte_accordion_button" target="%3$s">%1$s</a></div>',
            et_core_esc_previously( $button_text ),
            et_core_esc_previously( $button_link ),
            et_core_esc_previously( $button_link_new_window )
        ) : '';
		
        $this->dnxte_apply_css($render_slug);
        
        return sprintf( 
			'<div class="dnxte_image_accordion_bg"></div>
				<div class="dnxte_image_accordion_bg_hover"></div>
				<div class="dnxte_image_accordion_child_content_wrapper dnxte-align-horizontal-%7$s dnxte-align-vertical-%8$s">
                    <div class="dnxte-accordion-content" data-active-on-load="%5$s">
                        %3$s
                        %4$s
                        %1$s
                        <div class="dnxte-accordion-description">
                        %2$s
                        </div>
                        %6$s
                    </div>
				</div>',
			et_core_esc_previously( $dnxte_imga_title ),
			wpautop( et_core_esc_previously($dnxte_imga_des) ),
			$icon,
            $icon_image,
            ('on' === $this->props['dnxte_use_onload_active']), // #5
            $button,
            $dnxte_accordion_align_horizontal,
            $dnxte_accordion_align_vertical
		);
	}

	public function dnxte_apply_css($render_slug) {

        /**
         * Custom Padding Margin Output
         *
         */

        Common::dnxt_set_style($render_slug, $this->props, "dnxte_imga_icon_margin", "%%order_class%% .dnxte-imageacdion-social", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_imga_icon_padding", "%%order_class%% .dnxte-imageacdion-social", "padding");
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_imga_img_margin", "%%order_class%% .dnxte-accordion-image-image ", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_imga_img_padding", "%%order_class%% .dnxte-accordion-image-image ", "padding");
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_imga_title_margin", "%%order_class%% .dnxte-accordion-title", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_imga_title_padding", "%%order_class%% .dnxte-accordion-title", "padding");
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_imga_desc_margin", "%%order_class%% .dnxte-accordion-description", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_imga_desc_padding", "%%order_class%% .dnxte-accordion-description", "padding");
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_imga_btn_margin", "%%order_class%% .dnxte-accordion-button-wrap", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_imga_btn_padding", "%%order_class%% .dnxte_accordion_button", "padding");

		ET_Builder_Element::set_style($render_slug, array(
            'selector'    => '%%order_class%%',
            'declaration' => "background-image: url({$this->props['dnxte_bg_img']});"
        ) );
	}
}

new Next_ImageAccordionItem;
