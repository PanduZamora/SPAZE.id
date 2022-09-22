<?php
include_once(WP_PLUGIN_DIR.'/divi-essential/includes/modules/base/Common.php');

class Next_Step_Flow extends ET_Builder_Module {

	public $slug       = 'dnxte_step_flow';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://www.diviessential.com/step-flow/',
		'author'     => 'Divi Next',
		'author_uri' => 'www.divinext.com',
	);

	public function init() {
		$this->name 		= esc_html__( 'Next Step Flow', 'dnxte-divi-essential' );
		$this->icon_path    = plugin_dir_path( __FILE__ ) . 'icon.svg';
		
		$this->settings_modal_toggles = array(
            'general'    => array(
                'toggles' => array(
                    'badge'    => array(
                        'title' => esc_html__( 'Step Flow', 'dnxte-divi-essential' ),
					),
					'stepflow_image_mask' => esc_html__('Image Mask', 'dnxte-divi-essential')
                ),
            ),
            'advanced'   => array(
                'toggles' => array(
					'dnxte_direction'	=> esc_html__( 'Direction', 'dnxte-divi-essential' ),
					'dnxte_circle_style'=> esc_html__( 'Circle Style', 'dnxte-divi-essential' ),
					'badge_style'		=> esc_html__( 'Badge Style', 'dnxte-divi-essential' ),
				),
            ),
            'custom_css' => array(
                'toggles' => array(),
            ),
		);

		$this->advanced_fields = array(
            'fonts'          => array(
                'header'   => array(
                    'label'        => esc_html__('Title', 'dnxte-divi-essential' ),
                    'css'          => array(
                        'main'      => "%%order_class%% h4.dnxte-stepflow-title, %%order_class%% h1.dnxte-stepflow-title, %%order_class%% h2.dnxte-stepflow-title, %%order_class%% h3.dnxte-stepflow-title, %%order_class%% h5.dnxte-stepflow-title, %%order_class%% h6.dnxte-stepflow-title",
                        'important' => 'plugin_only',
                    ),
                    'header_level' => array(
                        'default' => 'h3',
                    ),
				),
				'body'     => array(
					'label'          => esc_html__('Body', 'dnxte-divi-essential' ),
					'css'            => array(
						'main' => "%%order_class%% .dnxte-stepflow-content-wrapper p",
					),
					'block_elements' => array(
						'tabbed_subtoggles' => true,
						'bb_icons_support'  => true,
					),
				),
				'Badge' => array(
					'label'          => esc_html__( 'Badge', 'dnxte-divi-essential' ),
					'css'            => array(
						'main' => "%%order_class%% .dnxte-stepflow-badge",
					),
					'line_height'    => array(
						'default' => '1.7em',
					),
					'font_size'      => array(
						'default' => absint(et_get_option('body_font_size', '14')) . 'px',
					),
					'letter_spacing' => array(
						'default' => '0px',
					),
				),
			),
			'background'     => array(
                'settings' => array(
                    'color' => 'alpha',
                ),
                'css'      => array(
                    'main'      => "%%order_class%% .dnxte-stepflow-wrapper",
                    'important' => true,
                ),
            ),
			'borders'        => array(
                'default'        => array(
                    'css' => array(
                        'main' => array(
                            'border_radii'  => "%%order_class%% .dnxte-stepflow-wrapper",
                            'border_styles' => "%%order_class%% .dnxte-stepflow-wrapper",
                        ),
                    ),
                ),
                'badge_style'  => array(
                    'css'      => array(
                        'main' => array(
                            'border_radii'  => "%%order_class%% .dnxte-stepflow-badge",
                            'border_styles' => "%%order_class%% .dnxte-stepflow-badge",
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
                    'toggle_slug'  => 'badge_style',
                ),
                'circle_style' => array(
                    'css'      => array(
                        'main' => array(
                            'border_radii'  => "%%order_class%% .dnxte-stepflow-icon-wrap",
                            'border_styles' => "%%order_class%% .dnxte-stepflow-icon-wrap",
                        ),
                    ),
                    'defaults'    => array(
                        'border_radii'  => 'on|0px|0px|0px|0px',
                        'border_styles' => array(
                            'width' => '0px',
                            'color' => '#8056ee',
                            'style' => 'solid',
                        ),
                    ),
                    'label_prefix' => esc_html__( '', 'dnxte-divi-essential' ),
                    'tab_slug'     => 'advanced',
                    'toggle_slug'  => 'dnxte_circle_style',
                ),

			),
			'box_shadow'     => array(
                'default' => array(
                    'css' => array(
                        'main'    => "%%order_class%% .dnxte-stepflow-wrapper",
                        'hover'   => '%%order_class%%:hover .dnxte-stepflow-wrapper',
                        'overlay' => 'inset',
                    ),
				),
				'dnxte_badge_style'   => array(
					'label'           => esc_html__( 'Bagde Shadow', 'dnxte-divi-essential' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'badge_style',
					'css'             => array(
						'main'        => '%%order_class%% .dnxte-stepflow-icon-wrap .dnxte-stepflow-badge',
						'hover'       => '%%order_class%%:hover .dnxte-stepflow-icon-wrap .dnxte-stepflow-badge',
						'overlay'     => 'inset',
					),
					'default_on_fronts'  => array(
						'color'    => '',
						'position' => '',
					),
				),
				'dnxte_circle_style'  => array(
					'label'           => esc_html__( 'Circle Shadow', 'dnxte-divi-essential' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'dnxte_circle_style',
					'css'             => array(
						'main'        => '%%order_class%% .dnxte-stepflow-icon-wrap',
						'hover'       => '%%order_class%%:hover .dnxte-stepflow-icon-wrap',
						'overlay'     => 'inset',
					),
					'default_on_fronts'  => array(
						'color'    => '',
						'position' => '',
					),
				),
			),
			'margin_padding' => array(
                'css' => array(
                    'important' => 'all',
                ),
            ),
            'max_width'      => array(
                'css' => array(
                    'module_alignment' => '%%order_class%%.dnxte_step_flow',
                ),
			),
			'filters'        => array(
                'css'                  => array(
                    'main' => '%%order_class%%',
                ),
                'child_filters_target' => array(
                    'tab_slug'    => 'advanced',
                    'toggle_slug' => 'image',
                ),
            ),
            'button'         => false,
            'text'           => false,
		);

		// Custom CSS Field
		$this->custom_css_fields = array(
			'dnxte_circle_wrapper'    => array(
				'label'    => esc_html__('Circle', 'dnxte-divi-essential'),
				'selector' => '%%order_class%% .dnxte-stepflow-icon-wrap',
			),
			'dnxte_badge_wrapper'    => array(
				'label'    => esc_html__('Badge', 'dnxte-divi-essential'),
				'selector' => '%%order_class%% .dnxte-stepflow-icon-wrap .dnxte-stepflow-badge',
			),
			'dnxte_stepflow_title_wrapper' => array(
				'label'    => esc_html__('Title', 'dnxte-divi-essential'),
				'selector' => '%%order_class%% .dnxte-stepflow-title',
			),
			'dnxte_stepflow_des_wrapper'     => array(
				'label'    => esc_html__('Description', 'dnxte-divi-essential'),
				'selector' => '%%order_class%% .dnxte-stepflow-content-wrapper p',
			),
		);
	}

	public function get_fields() {
		$fields = array(
			'dnxte_use_image' 	  => array(
				'label'           => esc_html__( 'Use Image', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',
				'options'         => array(
					'off' 		  => esc_html__( 'No', 'dnxte-divi-essential' ),
					'on'  		  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
				),
				'toggle_slug'     => 'badge',
				'description' 	  => esc_html__( 'Here you can choose whether image set below should be used.', 'dnxte-divi-essential' ),
				'default_on_front'=> 'off',
				'affects'         => array(
					'dnxte_badge_icon',
					'dnxte_badge_image',
					'dnxte_badge_image_alt'
				)
			),
			'dnxte_badge_icon'		  => array(
				'label'               => esc_html__( 'Icon', 'dnxte-divi-essential' ),
				'type'                => 'select_icon',
				'option_category'     => 'basic_option',
				'class'               => array( 'et-pb-font-icon' ),
				'toggle_slug'         => 'badge',
				'description'         => esc_html__( 'Choose an icon to display with your step flow.', 'dnxte-divi-essential' ),
				'default'             => '',
				'depends_show_if'     => 'off',
				'mobile_options'      => true,
				'hover'               => 'tabs',
			),
			'dnxte_badge_image' 	 =>	array(
				'label'              => esc_html__( 'Image', 'dnxte-divi-essential' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'dnxte-divi-essential' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dnxte-divi-essential' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dnxte-divi-essential' ),
				'description'        => esc_html__( 'Upload an image to display at the top of your blurb.', 'dnxte-divi-essential' ),
				'toggle_slug'        => 'badge',
				'dynamic_content'    => 'image',
				'depends_show_if'    => 'on',
				'hover'              => 'tabs',
				'mobile_options'	 => true,
			),
			'dnxte_badge_image_alt' => array(
				'label'           => esc_html__( 'Image Alt Text', 'dnxte-divi-essential' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Define the HTML ALT text for your image here.', 'dnxte-divi-essential' ),
				'depends_show_if' => 'on',
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
				'dynamic_content' => 'text',
			),
			'badge_title'         => array(
                'label'           => esc_html__( 'Badge Title', 'dnxte-divi-essential' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input the badge title', 'dnxte-divi-essential' ),
				'toggle_slug'     => 'badge',
                'dynamic_content' => 'text',
                'mobile_options'  => true,
                'hover'           => 'tabs',
			),
			'dnxte_stepflow_alignment'    => array(
                'label'           => esc_html__('Alignment', 'dnxte-divi-essential'),
                'description'     => esc_html__('Align badge to the left, right or center.', 'dnxte-divi-essential'),
                'type'            => 'align',
                'option_category' => 'basic_option',
                'options'         => et_builder_get_text_orientation_options(array('justified')),
                'toggle_slug'     => 'badge',
                'mobile_options'  => true,
            ),
			'dnxte_stepflow_title'=> array(
                'label'           => esc_html__('Title', 'dnxte-divi-essential'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Input the Title', 'dnxte-divi-essential'),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'text',
                'mobile_options'  => true,
                'hover'           => 'tabs',
			),
			'dnxte_stepflow_description'=> array(
                'label'           => esc_html__('Description', 'dnxte-divi-essential'),
                'type'            => 'tiny_mce',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Input the description for your module here.', 'dnxte-divi-essential'),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'text',
                'mobile_options'  => true,
                'hover'           => 'tabs',
			),
			'dnxte_use_direction' => array(
				'label'           => esc_html__( 'Use Direction', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',
				'options'         => array(
					'off' 		  => esc_html__( 'No', 'dnxte-divi-essential' ),
					'on'  		  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
				),
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxte_direction',
				'description' 	  => esc_html__( 'Here you can choose whether image set below should be used.', 'dnxte-divi-essential' ),
				'default_on_front'=> 'on',
				'affects'         => array(
					'dnxte_direction_style',
					'dnxte_direction_color',
					'dnxte_direction_width',
					'dnxte_direction_angle',
					'dnxte_direction_offsettop',
					'dnxte_direction_offsetleft'
				)
			),
			'dnxte_direction_style' => array(
				'label'             => esc_html__( 'Style', 'dnxte-divi-essential' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'description' 		=> esc_html__( 'Direction support various different styles, each of which will change the shape of the divider element.', 'dnxte-divi-essential' ),
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'dnxte_direction',
				'options'           => et_builder_get_border_styles(),
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'depends_show_if'   => 'on',
			),
			'dnxte_direction_color'  => array(
				'label'           => esc_html__( 'Color', 'dnxte-divi-essential' ),
				'type'            => 'color-alpha',
				'description'     => esc_html__( 'This will adjust the color of the 1px divider line.', 'dnxte-divi-essential' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxte_direction',
				'default'         => et_builder_accent_color(),
				'default'		  => '#0077FF',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'depends_show_if' => 'on',
			),			
			'dnxte_direction_width' 	=> array(
				'label'             => esc_html__( 'Width', 'dnxte-divi-essential' ),
				'type'              => 'range',
				'option_category'   => 'layout',
				'depends_show_if'   => 'on',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'dnxte_direction',
				'default_unit'      => 'px',
				'range_settings'   => array(
					'min'  => 0,
					'max'  => 150,
					'step' => 1,
				),
				'default'           => '100px',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'depends_show_if'   => 'on',
			),
			'dnxte_direction_angle' => array(
				'label'             => esc_html__( 'Angle', 'dnxte-divi-essential' ),
				'type'              => 'range',
				'option_category'   => 'layout',
				'depends_show_if'   => 'on',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'dnxte_direction',
				'default_unit'      => '',
				'unitless'			=> true,	
				'range_settings'   => array(
					'min'  => 0,
					'max'  => 360,
					'step' => 1,
				),
				'default'           => '0',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'depends_show_if'   => 'on',
			),
			'dnxte_direction_offsettop' => array(
				'label'             => esc_html__( 'Offset Top', 'dnxte-divi-essential' ),
				'type'              => 'range',
				'option_category'   => 'layout',
				'depends_show_if'   => 'on',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'dnxte_direction',
				'default_unit'      => 'px',	
				'range_settings'   => array(
					'min'  => 0,
					'max'  => 1000,
					'step' => 1,
				),
				'default'           => '49px',
				'mobile_options'  => true,
                'hover'           => 'tabs',
				'depends_show_if'   => 'on',
			),
			'dnxte_direction_offsetleft' => array(
				'label'             => esc_html__( 'Offset Left', 'dnxte-divi-essential' ),
				'type'              => 'range',
				'option_category'   => 'layout',
				'depends_show_if'   => 'on',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'dnxte_direction',
				'default_unit'      => 'px',	
				'range_settings'   => array(
					'min'  => 0,
					'max'  => 1000,
					'step' => 1,
				),
				'default'           => '20px',
				'mobile_options'  => true,
                'hover'           => 'tabs',
				'depends_show_if'   => 'on',
			),
			'dnxte_badge_bg_color'  => array(
				'label'           => esc_html__( 'Background Color', 'dnxte-divi-essential' ),
				'type'            => 'color-alpha',
				'description'     => esc_html__( 'This will adjust the background color of the 1px divider line.', 'dnxte-divi-essential' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'badge_style',
				'default'         => et_builder_accent_color(),
				'default'		  => '#0077FF',
				'mobile_options'  => true,
                'hover'           => 'tabs',
			),
			'dnxte_circle_size' => array(
				'label'             => esc_html__( 'Size', 'dnxte-divi-essential' ),
				'type'              => 'range',
				'option_category'   => 'layout',
				'depends_show_if'   => 'on',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'dnxte_circle_style',
				'default_unit'      => 'px',	
				'range_settings'   => array(
					'min'  => 0,
					'max'  => 300,
					'step' => 1,
				),
				'default'           => '46px',
				'mobile_options'  => true,
                'hover'           => 'tabs',
				'depends_show_if'   => 'on',
			),
			'dnxte_circle_bg_color'  => array(
				'label'           => esc_html__( 'Background Color', 'dnxte-divi-essential' ),
				'type'            => 'color-alpha',
				'description'     => esc_html__( 'This will adjust the background color of the 1px divider line.', 'dnxte-divi-essential' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxte_circle_style',
				'default'         => et_builder_accent_color(),
				'default'		  => '#e9ecf0',
				'mobile_options'  => true,
                'hover'           => 'tabs',
			),
			'dnxte_circle_color'  => array(
				'label'           => esc_html__( 'Color', 'dnxte-divi-essential' ),
				'type'            => 'color-alpha',
				'description'     => esc_html__( 'This will adjust the background color of the 1px divider line.', 'dnxte-divi-essential' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxte_circle_style',
				'default'         => et_builder_accent_color(),
				'default'		  => '#8056ee',
				'mobile_options'  => true,
                'hover'           => 'tabs',
			),
			'dnxte_badge_padding'=> array(
                'label'           => esc_html__('Badge Padding', 'dnxte-divi-essential'),
                'type'            => 'custom_padding',
                'mobile_options'  => true,
                'hover'           => 'tabs',
                'allowed_units'   => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'badge_style',
			),
			'dnxte_badge_margin'=> array(
                'label'           => esc_html__('Badge Margin', 'dnxte-divi-essential'),
                'type'            => 'custom_padding',
                'mobile_options'  => true,
                'hover'           => 'tabs',
                'allowed_units'   => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'badge_style',
			),
			'dnxte_circle_margin' => array(
                'label'           => esc_html__('Circle Margin', 'dnxte-divi-essential'),
                'type'            => 'custom_margin',
                'mobile_options'  => true,
                'hover'           => 'tabs',
                'allowed_units'   => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'margin_padding',
            ),
            'dnxte_circle_padding'=> array(
                'label'           => esc_html__('Circle Padding', 'dnxte-divi-essential'),
                'type'            => 'custom_padding',
                'mobile_options'  => true,
                'hover'           => 'tabs',
                'allowed_units'   => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'margin_padding',
			),
			'dnxte_title_margin' => array(
                'label'           => esc_html__('Title Margin', 'dnxte-divi-essential'),
                'type'            => 'custom_margin',
                'mobile_options'  => true,
                'hover'           => 'tabs',
                'allowed_units'   => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'margin_padding',
            ),
            'dnxte_title_padding'=> array(
                'label'           => esc_html__('Title Padding', 'dnxte-divi-essential'),
                'type'            => 'custom_padding',
                'mobile_options'  => true,
                'hover'           => 'tabs',
                'allowed_units'   => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'margin_padding',
			),
			'dnxte_des_margin' => array(
                'label'           => esc_html__('Description Margin', 'dnxte-divi-essential'),
                'type'            => 'custom_margin',
                'mobile_options'  => true,
                'hover'           => 'tabs',
                'allowed_units'   => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'margin_padding',
            ),
            'dnxte_des_padding'=> array(
                'label'           => esc_html__('Description Padding', 'dnxte-divi-essential'),
                'type'            => 'custom_padding',
                'mobile_options'  => true,
                'hover'           => 'tabs',
                'allowed_units'   => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'margin_padding',
			),
			'stepflow_use_mask' => array(
                'label' => esc_html__('Use Image Mask', 'dnxte-divi-essential'),
                'type' => 'yes_no_button',
                'toggle_slug' => 'stepflow_image_mask',
                'options' => array(
                    'on' => esc_html__('Yes', 'dnxte-divi-essential'),
                    'off' => esc_html__('No', 'dnxte-divi-essential'),
                ),
                'affects' => array(
                    'stepflow_mask_shape',
                    'stepflow_mask_size',
                    'stepflow_image_horizontal',
                    'stepflow_image_vertical'
                ),
                'default_on_front' => 'off',
            ),
            'stepflow_mask_shape' => array(
                'label' => esc_html__('Select Shape', 'dnxte-divi-essential'),
                'type' => 'select',
                'description' => esc_html__('Select the shape.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'toggle_slug' => 'stepflow_image_mask',
                'options' => array(
                    'none' => esc_html__('None', 'dnxte-divi-essential'),
                    'shape1' => esc_html__('Shape 1', 'dnxte-divi-essential'),
                    'shape2' => esc_html__('Shape 2', 'dnxte-divi-essential'),
                    'shape3' => esc_html__('Shape 3', 'dnxte-divi-essential'),
                    'shape4' => esc_html__('Shape 4', 'dnxte-divi-essential'),
                    'shape5' => esc_html__('Shape 5', 'dnxte-divi-essential'),
                    'shape6' => esc_html__('Shape 6', 'dnxte-divi-essential'),
                    'shape7' => esc_html__('Shape 7', 'dnxte-divi-essential'),
                    'shape8' => esc_html__('Shape 8', 'dnxte-divi-essential'),
                    'shape9' => esc_html__('Shape 9', 'dnxte-divi-essential'),
                    'shape10' => esc_html__('Shape 10', 'dnxte-divi-essential'),
                    'shape11' => esc_html__('Shape 11', 'dnxte-divi-essential'),
                    'shape12' => esc_html__('Shape 12', 'dnxte-divi-essential'),
                    'shape13' => esc_html__('Shape 13', 'dnxte-divi-essential'),
                    'shape14' => esc_html__('Shape 14', 'dnxte-divi-essential'),
                    'shape15' => esc_html__('Shape 15', 'dnxte-divi-essential'),
                ),
                'default' => 'none',
                'depends_show_if' => 'on'
            ),
            'stepflow_use_mask_upload' => array(
                'label' => esc_html__('Use Upload Mask', 'dnxte-divi-essential'),
                'type' => 'yes_no_button',
                'toggle_slug' => 'stepflow_image_mask',
                'options' => array(
                    'on' => esc_html__('Yes', 'dnxte-divi-essential'),
                    'off' => esc_html__('No', 'dnxte-divi-essential'),
                ),
                'affects' => array(
                    'stepflow_upload_mask',
                    'stepflow_mask_size',
                    'stepflow_image_horizontal',
                    'stepflow_image_vertical'
                ),
                'default_on_front' => 'off',
                'show_if' => array(
                    'stepflow_use_mask' => 'off'
                )
            ),
            'stepflow_upload_mask' => array(
                'label' => esc_html__("Upload Mask", 'dnxte-divi-essential'),
                'type' => 'upload',
                'toggle_slug' => 'stepflow_image_mask',
                'option_category' => 'basic_option',
                'upload_button_text' => esc_html__('Upload a file', 'dnxte-divi-essential'),
                'choose_text' => esc_attr__('Choose a file', 'dnxte-divi-essential'),
                'update_text' => esc_attr__('Update file', 'dnxte-divi-essential'),
                'depends_show_if' => 'on'
            ),
            'stepflow_mask_size' => array(
                'label' => esc_html__('Select Mask Size', 'dnxte-divi-essential'),
                'type' => 'select',
                'description' => esc_html__('Select the mask size.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'toggle_slug' => 'stepflow_image_mask',
                'options' => array(
                    'contain' => esc_html__('Contain', 'dnxte-divi-essential'),
                    'cover' => esc_html__('Cover', 'dnxte-divi-essential'),
                ),
                'default' => 'contain',
                'depends_show_if' => 'on',
            ),
            'stepflow_image_horizontal' => array(
                'label' => esc_html__('Image Horizontal Position', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the position of the image.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'toggle_slug' => 'stepflow_image_mask',
                'default' => '0',
                'default_on_front' => '0',
                'validate_unit' => false,
                'unitless'  => true,
                'allow_empty' => true,
                'range_settings' => array(
                    'min' => '-50',
                    'max' => '100',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'hover' => 'tabs',
                'depends_show_if' => 'on'
            ),
            'stepflow_image_vertical' => array(
                'label' => esc_html__('Image Vertical Position', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the position of the image.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'toggle_slug' => 'stepflow_image_mask',
                'default' => '0',
                'default_on_front' => '0',
                'allow_empty' => true,
                'validate_unit' => false,
                'unitless' => true,
                'range_settings' => array(
                    'min' => '-50',
                    'max' => '100',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'hover' => 'tabs',
                'depends_show_if' => 'on'
            ),
		);

		return $fields;
	}

    /**
     * Get stepflow alignment.
     *
     * @since 3.23 Add responsive support by adding device parameter.
     *
     * @param  string $device Current device name.
     * @return string Alignment value, rtl or not.
     */

    public function get_stepflow_alignment($device = 'desktop') {
        $suffix = 'desktop' !== $device ? "_{$device}" : '';
        $text_orientation = isset($this->props["dnxte_stepflow_alignment{$suffix}"]) ? $this->props["dnxte_stepflow_alignment{$suffix}"] : '';

        return et_pb_get_alignment($text_orientation);
    }


	public function render( $attrs, $content = null, $render_slug ) {
		wp_enqueue_script( 'dnext_svg_shape_frontend' );
		$multi_view 					  = et_pb_multi_view_options( $this );
        // Stepflow Alignment.
        $stepflow_alignment               = $this->get_stepflow_alignment();
        $is_stepflow_alignment_responsive = et_pb_responsive_options()->is_responsive_enabled($this->props, 'dnxte_stepflow_alignment');
        $stepflow_alignment_tablet        = $is_stepflow_alignment_responsive ? $this->get_stepflow_alignment('tablet') : '';
        $stepflow_alignment_phone         = $is_stepflow_alignment_responsive ? $this->get_stepflow_alignment('phone') : '';
		
		$use_shape = $this->props['stepflow_use_mask'];
        $use_mask_upload = $this->props['stepflow_use_mask_upload'];
        
        $shape_name = "on" == $use_shape && "none" != $this->props['stepflow_mask_shape'] ? $this->props['stepflow_mask_shape'] : "";
        $shape_size = $this->props['stepflow_mask_size'];
        $uploaded_mask = "on" == $use_mask_upload ? $this->props['stepflow_upload_mask'] : "";

        $stepflow_alignments = array();
        if (!empty($stepflow_alignment)) {
            array_push($stepflow_alignments, sprintf('dnxte_stepflow_alignment_%1$s', esc_attr($stepflow_alignment)));
        }

        if (!empty($stepflow_alignment_tablet)) {
            array_push($stepflow_alignments, sprintf('dnxte_stepflow_alignment_tablet_%1$s', esc_attr($stepflow_alignment_tablet)));
        }

        if (!empty($stepflow_alignment_phone)) {
            array_push($stepflow_alignments, sprintf('dnxte_stepflow_alignment_phone_%1$s', esc_attr($stepflow_alignment_phone)));
        }

		$stepflow_alignment_classes = join(' ', $stepflow_alignments);
		
		$dnxte_badge_icon 			= esc_attr( et_pb_process_font_icon($this->props['dnxte_badge_icon']));
		$dnxte_badge_icon_hover 	= esc_attr( et_pb_process_font_icon($this->get_hover_value( 'dnxte_badge_icon' )));
		$dnxte_badge_icon_values	= et_pb_responsive_options()->get_property_values( $this->props, 'dnxte_badge_icon' );
		$dnxte_badge_icon_tablet	= isset( $dnxte_badge_icon_values['tablet'] ) ? $dnxte_badge_icon_values['tablet'] : '';
		$dnxte_badge_icon_phone		= isset( $dnxte_badge_icon_values['phone'] ) ? $dnxte_badge_icon_values['phone'] : '';

		$badge_image		 		= $this->props['dnxte_badge_image'];
		$badgetitle		 			= $this->props['badge_title'];

		// Badge Icon
		if ( 'off' !== $this->props['dnxte_use_image'] ) {

			$badge = $multi_view->render_element( array(
				'tag'   => 'img',
				'attrs' => array(
					'src'   => '{{dnxte_badge_image}}',
					'alt'   => '{{dnxte_badge_image_alt}}',
					'class'	=> 'dnxte-badge-img et-waypoint et_pb_animation_top et-animated',
				),
				'required' => 'dnxte_badge_image',
			) );

			$badge = sprintf('<div class="dnxte-stepflow-image-wrap" data-svg-shape="%2$s" data-shape-size="%3$s" data-use-upload="%4$s" data-uploaded-mask="%5$s">%1$s</div>', $badge, $shape_name,$shape_size,$use_mask_upload,$uploaded_mask);

		} else {

			$badge 				= sprintf( '<span class="et-waypoint et_pb_animation_top et-animated dnxte-stepflow-icons dnxte-badge-icon" data-icon="%1$s"></span>', esc_attr( $dnxte_badge_icon ));
			$badge_tablet_style = '' !== $dnxte_badge_icon_tablet ? sprintf( '<span class="et-waypoint et_pb_animation_top et-animated dnxte-stepflow-icons dnxte-badge-icon" data-icon="%1$s"></span>', esc_attr( $dnxte_badge_icon_tablet ) ) : '';
			$badge_phone_style  = '' !== $dnxte_badge_icon_phone ? sprintf( '<span class="et-waypoint et_pb_animation_top et-animated dnxte-stepflow-icons dnxte-badge-icon" data-icon="%1$s"></span>', esc_attr( $dnxte_badge_icon_phone ) ) : '';
			
			if ( et_builder_is_hover_enabled( 'dnxte_badge_icon', $this->props ) ) {
				$badge_icon_hover = sprintf( '<span class="dnxte-stepflow-icon-hover">%1$s</span>', esc_attr( $dnxte_badge_icon_hover ) );
			}
		}

		// Direction Width
		$dnxte_direction_width             = $this->props['dnxte_direction_width'];
		$dnxte_direction_width_hover       = $this->get_hover_value('dnxte_direction_width');
		$dnxte_direction_width_tablet      = $this->props['dnxte_direction_width_tablet'];
		$dnxte_direction_width_phone       = $this->props['dnxte_direction_width_phone'];
		$dnxte_direction_width_last_edited = $this->props['dnxte_direction_width_last_edited'];

		if ( 'off' !== $this->props['dnxte_use_direction'] ) {
			$dnxte_direction_width_responsive_active = et_pb_get_responsive_status($dnxte_direction_width_last_edited);

			$dnxte_direction_width_values = array(
				'desktop' => $dnxte_direction_width,
				'tablet'  => $dnxte_direction_width_responsive_active ? $dnxte_direction_width_tablet : '',
				'phone'   => $dnxte_direction_width_responsive_active ? $dnxte_direction_width_phone : '',
			);
			$dnxte_direction_width_selector = "%%order_class%% .dnxte-stepflow-arrow";
			et_pb_responsive_options()->generate_responsive_css($dnxte_direction_width_values, $dnxte_direction_width_selector, 'max-width', $render_slug);

			if (et_builder_is_hover_enabled('dnxte_direction_width', $this->props)) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => $this->add_hover_to_order_class('%%order_class%% .dnxte-stepflow-arrow'),
					'declaration' => sprintf(
						'max-width: %1$s;',
						esc_html($dnxte_direction_width_hover)
					),
				));
			}
		}

		// Direction Angle
		$dnxte_direction_angle			= $this->props['dnxte_direction_angle'];
		$dnxte_direction_angle_hover 	= $this->get_hover_value( 'dnxte_direction_angle' );
		$dnxte_direction_angle_values	= et_pb_responsive_options()->get_property_values( $this->props, 'dnxte_direction_angle' );
		$dnxte_direction_angle_tablet	= isset( $dnxte_direction_angle_values['tablet'] ) ? $dnxte_direction_angle_values['tablet'] : '';
		$dnxte_direction_angle_phone	= isset( $dnxte_direction_angle_values['phone'] ) ? $dnxte_direction_angle_values['phone'] : '';

		if ( 'off' !== $this->props['dnxte_use_direction'] ) {
			$dnxte_direction_angle_style 		= sprintf( 'transform: rotate(%1$sdeg);', esc_attr( $dnxte_direction_angle ) );
			$dnxte_direction_angle_tablet_style = '' !== $dnxte_direction_angle_tablet ? sprintf( 'transform: rotate(%1$sdeg);', esc_attr( $dnxte_direction_angle_tablet ) ) : '';
			$dnxte_direction_angle_phone_style  = '' !== $dnxte_direction_angle_phone ? sprintf( 'transform: rotate(%1$sdeg);', esc_attr( $dnxte_direction_angle_phone ) ) : '';
			
			$dnxte_direction_angle_style_hover  = '';

			if ( et_builder_is_hover_enabled( 'dnxte_direction_angle', $this->props ) ) {
				$dnxte_direction_angle_style_hover = sprintf( 'transform: rotate(%1$sdeg);', esc_attr( $dnxte_direction_angle_hover ) );
			}

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxte-stepflow-arrow",
				'declaration' => $dnxte_direction_angle_style,
			) );
			
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxte-stepflow-arrow",
				'declaration' => $dnxte_direction_angle_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxte-stepflow-arrow",
				'declaration' => $dnxte_direction_angle_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );

			if ( "" !== $dnxte_direction_angle_style_hover ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => $this->add_hover_to_order_class( "%%order_class%% .dnxte-stepflow-arrow" ),
					'declaration' => $dnxte_direction_angle_style_hover,
				) );
			}
		}

		// Direction Offset Top
		$dnxte_direction_offsettop             = $this->props['dnxte_direction_offsettop'];
		$dnxte_direction_offsettop_hover       = $this->get_hover_value('dnxte_direction_offsettop');
		$dnxte_direction_offsettop_tablet      = $this->props['dnxte_direction_offsettop_tablet'];
		$dnxte_direction_offsettop_phone       = $this->props['dnxte_direction_offsettop_phone'];
		$dnxte_direction_offsettop_last_edited = $this->props['dnxte_direction_offsettop_last_edited'];

		if ( 'off' !== $this->props['dnxte_use_direction'] ) {
			$dnxte_direction_offsettop_responsive_active = et_pb_get_responsive_status($dnxte_direction_offsettop_last_edited);

			$dnxte_direction_offsettop_values = array(
				'desktop' => $dnxte_direction_offsettop,
				'tablet'  => $dnxte_direction_offsettop_responsive_active ? $dnxte_direction_offsettop_tablet : '',
				'phone'   => $dnxte_direction_offsettop_responsive_active ? $dnxte_direction_offsettop_phone : '',
			);
			$dnxte_direction_offsettop_selector = "%%order_class%% .dnxte-stepflow-arrow";
			et_pb_responsive_options()->generate_responsive_css($dnxte_direction_offsettop_values, $dnxte_direction_offsettop_selector, 'top', $render_slug);

			if (et_builder_is_hover_enabled('dnxte_direction_offsettop', $this->props)) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => $this->add_hover_to_order_class('%%order_class%% .dnxte-stepflow-arrow'),
					'declaration' => sprintf(
						'top: %1$s;',
						esc_html($dnxte_direction_offsettop_hover)
					),
				));
			}
		}

		// Direction Offset Left
		$dnxte_direction_offsetleft			= $this->props['dnxte_direction_offsetleft'];
		$dnxte_direction_offsetleft_hover 	= $this->get_hover_value( 'dnxte_direction_offsetleft' );
		$dnxte_direction_offsetleft_values	= et_pb_responsive_options()->get_property_values( $this->props, 'dnxte_direction_offsetleft' );
		$dnxte_direction_offsetleft_tablet	= isset( $dnxte_direction_offsetleft_values['tablet'] ) ? $dnxte_direction_offsetleft_values['tablet'] : '';
		$dnxte_direction_offsetleft_phone	= isset( $dnxte_direction_offsetleft_values['phone'] ) ? $dnxte_direction_offsetleft_values['phone'] : '';

		if ( 'off' !== $this->props['dnxte_use_direction'] ) {
			$dnxte_direction_offsetleft_style 			= "left: calc(100% + {$dnxte_direction_offsetleft});" ;
			$dnxte_direction_offsetleft_tablet_style 	= '' !== $dnxte_direction_offsetleft_tablet ? sprintf( 'left: calc(100% + %1$s);', esc_attr( $dnxte_direction_offsetleft_tablet ) ) : '';
			$dnxte_direction_offsetleft_phone_style  	= '' !== $dnxte_direction_offsetleft_phone ? sprintf( 'left: calc(100% + %1$s);', esc_attr( $dnxte_direction_offsetleft_phone ) ) : '';
			
			$dnxte_direction_offsetleft_style_hover  = '';

			if ( et_builder_is_hover_enabled( 'dnxte_direction_offsetleft', $this->props ) ) {
				$dnxte_direction_offsetleft_style_hover = "left: calc(100px + {$dnxte_direction_offsetleft_hover});";
			}

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxte-stepflow-arrow",
				'declaration' => $dnxte_direction_offsetleft_style,
			) );
			
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxte-stepflow-arrow",
				'declaration' => $dnxte_direction_offsetleft_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxte-stepflow-arrow",
				'declaration' => $dnxte_direction_offsetleft_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );

			if ( "" !== $dnxte_direction_offsetleft_style_hover ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => $this->add_hover_to_order_class( "%%order_class%% .dnxte-stepflow-arrow" ),
					'declaration' => $dnxte_direction_offsetleft_style_hover,
				) );
			}
		}

		// Circle Size
		$dnxte_circle_size             = $this->props['dnxte_circle_size'];
		$dnxte_circle_size_hover       = $this->get_hover_value('dnxte_circle_size');
		$dnxte_circle_size_tablet      = $this->props['dnxte_circle_size_tablet'];
		$dnxte_circle_size_phone       = $this->props['dnxte_circle_size_phone'];
		$dnxte_circle_size_last_edited = $this->props['dnxte_circle_size_last_edited'];

		if ( '' !== $this->props['dnxte_circle_size'] ) {
			$dnxte_circle_size_responsive_active = et_pb_get_responsive_status($dnxte_circle_size_last_edited);

			$dnxte_circle_size_values = array(
				'desktop' => $dnxte_circle_size,
				'tablet'  => $dnxte_circle_size_responsive_active ? $dnxte_circle_size_tablet : '',
				'phone'   => $dnxte_circle_size_responsive_active ? $dnxte_circle_size_phone : '',
			);
			$dnxte_circle_size_selector = "%%order_class%% .dnxte-stepflow-icon-wrap";
			et_pb_responsive_options()->generate_responsive_css($dnxte_circle_size_values, $dnxte_circle_size_selector, 'font-size', $render_slug);

			if (et_builder_is_hover_enabled('dnxte_circle_size', $this->props)) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => $this->add_hover_to_order_class('%%order_class%% .dnxte-stepflow-icon-wrap'),
					'declaration' => sprintf(
						'font-size: %1$s',
						esc_html($dnxte_circle_size_hover)
					),
				));
			}
		}

		// Direction Style
		$dnxte_direction_style             = $this->props['dnxte_direction_style'];
		$dnxte_direction_style_hover       = $this->get_hover_value('dnxte_direction_style');
		$dnxte_direction_style_tablet      = $this->props['dnxte_direction_style_tablet'];
		$dnxte_direction_style_phone       = $this->props['dnxte_direction_style_phone'];
		$dnxte_direction_style_last_edited = $this->props['dnxte_direction_style_last_edited'];

		if ( 'off' !== $this->props['dnxte_use_direction'] ) {
			$dnxte_direction_style_responsive_active = et_pb_get_responsive_status($dnxte_direction_style_last_edited);

			$dnxte_direction_style_values = array(
				'desktop' => $dnxte_direction_style,
				'tablet'  => $dnxte_direction_style_responsive_active ? $dnxte_direction_style_tablet : '',
				'phone'   => $dnxte_direction_style_responsive_active ? $dnxte_direction_style_phone : '',
			);
			$dnxte_direction_style_selector = "%%order_class%% .dnxte-stepflow-arrow";
			et_pb_responsive_options()->generate_responsive_css($dnxte_direction_style_values, $dnxte_direction_style_selector, 'border-style', $render_slug);

			if (et_builder_is_hover_enabled('dnxte_direction_style', $this->props)) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => $this->add_hover_to_order_class('%%order_class%% .dnxte-stepflow-arrow'),
					'declaration' => sprintf(
						'border-style: %1$s;',
						esc_html($dnxte_direction_style_hover)
					),
				));
			}
		}

		// Badge Title
		if ( '' !== $badgetitle ){
			$badgetitle = sprintf(
				'<span class="dnxte-stepflow-badge">%1$s</span>',
				et_core_esc_previously( $badgetitle )
			);
		}else {
			$badgetitle = '';
		}

		//Step-Flow Title
		$stepflow_title = $multi_view->render_element(array(
			'tag'     => et_pb_process_header_level($this->props['header_level'], 'h3'),
			'content' => '{{dnxte_stepflow_title}}',
			'attrs'   => array(
				'class' => 'dnxte-stepflow-title',
			),
		) );

		// Step-Flow Description
		$stepflow_description = $multi_view->render_element(array(
			'tag'     => 'p',
			'content' => '{{dnxte_stepflow_description}}'
		) );

		// Badge Background Color
		$dnxte_badge_bg_color_values = et_pb_responsive_options()->get_property_values($this->props, 'dnxte_badge_bg_color');
		et_pb_responsive_options()->generate_responsive_css($dnxte_badge_bg_color_values, '%%order_class%% .dnxte-stepflow-badge', 'background-color', $render_slug, '', 'background-color');
		
		// Circle Background Color
		$dnxte_circle_bg_color_values = et_pb_responsive_options()->get_property_values($this->props, 'dnxte_circle_bg_color');
		et_pb_responsive_options()->generate_responsive_css($dnxte_circle_bg_color_values, '%%order_class%% .dnxte-stepflow-icon-wrap', 'background-color', $render_slug, '', 'background-color');
		
		// Circle Color
		$dnxte_circle_color_values = et_pb_responsive_options()->get_property_values($this->props, 'dnxte_circle_color');
		et_pb_responsive_options()->generate_responsive_css($dnxte_circle_color_values, '%%order_class%% .dnxte-stepflow-icon-wrap', 'color', $render_slug, '', 'color');
		
		// Direction Color
		if ( 'off' !== $this->props['dnxte_use_direction'] ) {
			$dnxte_direction_color_values = et_pb_responsive_options()->get_property_values($this->props, 'dnxte_direction_color');
			et_pb_responsive_options()->generate_responsive_css($dnxte_direction_color_values, '%%order_class%% .dnxte-stepflow-arrow, %%order_class%% .dnxte-stepflow-arrow::after', 'border-color', $render_slug, '', 'border-color');
		}	
		
		if ( 'off' !== $this->props['dnxte_use_direction'] ) {
			$stepflow_arrow = '<span class="dnxte-stepflow-arrow"></span>';
		}else {
			$stepflow_arrow = '';
		}
		

		$this->apply_css( $render_slug );

		return sprintf( 
			'<div class="dnxte-stepflow-wrapper dnxte-step-direction-pad %6$s">
				<div class="dnxte-stepflow-icon-wrap">
					%5$s
					%1$s
					%2$s
				</div>
				<div class="dnxte-stepflow-content-wrapper">
					%3$s
					%4$s
				</div>
			</div>',
			$badge,
			et_core_esc_previously( $badgetitle ),
			et_core_esc_previously( $stepflow_title ),
			wpautop( $stepflow_description ),
			$stepflow_arrow, // #5
			esc_attr( $stepflow_alignment_classes )
		);
	}

	public function apply_css( $render_slug ) {

		/**
         * Custom Padding Margin Output
         *
         */
		Common::dnxt_set_style($render_slug, $this->props, "dnxte_badge_padding", "%%order_class%% .dnxte-stepflow-badge", "padding");
		Common::dnxt_set_style($render_slug, $this->props, "dnxte_badge_margin", "%%order_class%% .dnxte-stepflow-badge", "margin");

		Common::dnxt_set_style($render_slug, $this->props, "dnxte_circle_padding", "%%order_class%% .dnxte-stepflow-icon-wrap", "padding");
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_circle_margin", "%%order_class%% .dnxte-stepflow-icon-wrap", "margin");
		
		Common::dnxt_set_style($render_slug, $this->props, "dnxte_title_padding", "%%order_class%% .dnxte-stepflow-title", "padding");
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_title_margin", "%%order_class%% .dnxte-stepflow-title", "margin");
		
		Common::dnxt_set_style($render_slug, $this->props, "dnxte_des_padding", "%%order_class%% .dnxte-stepflow-content-wrapper p", "padding");
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_des_margin", "%%order_class%% .dnxte-stepflow-content-wrapper p", "margin");
		
	}
}

new Next_Step_Flow;
