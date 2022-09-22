<?php
include_once(WP_PLUGIN_DIR.'/divi-essential/includes/modules/base/Common.php');

class Divi_NxteCoverflowSlider extends ET_Builder_Module {
	public $slug       = 'dnxte_coverflowslider_parent';
	public $vb_support = 'on';
	public $child_slug = 'dnxte_coverflowslider_child';

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-coverflow-slider/',
        'author' => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );
    
	public function init() {
        $this->name = esc_html__( 'Next Coverflow Slider', 'dnxte-divi-essential' );
        $this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';

		$this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'dnxte_coverflow_carousel_settings' => esc_html__( 'Carousel Settings', 'dnxte-divi-essential'),
                    'dnxte_coverflow_carousel_navigation' => esc_html__( 'Navigation Settings', 'dnxte-divi-essential'),
                    'dnxte_coverflow_carousel_effect'    => esc_html__( 'Effect Settings', 'dnxte-divi-essential'),
                )
            ),
            'advanced' => array(
                'toggles' => array(
                    'dnxte_coverflow_carousel_text_settings' => esc_html__( 'Text Settings', 'dnxte-divi-essential'),
                    'dnxte_coverflow_carousel_content_settings' => esc_html__( 'Content Settings', 'dnxte-divi-essential'),
                    'dnxte_coverflow_carousel_image_settings' => array(
                        'title' => esc_html__( 'Image Settings', 'dnxte-divi-essential'),
                    ),
                    'dnxte_coverflow_carousel_color_settings' => array(
                        'title' => esc_html__( 'Color Settings', 'dnxte-divi-essential')
                    ),
                    'dnxte_coverflow_carousel_arrow_settings' => array(
                        'title' => esc_html__( 'Arrow Settings', 'dnxte-divi-essential')
                    ),
                )
            )
        );

        $this->custom_css_fields =  array(
            'image'              => array(
                'label'          => esc_html__( 'Image', 'dnxte-divi-essential'),
                'selector'       => '%%order_class%% .img-fluid'
            ),
            'text'              => array(
                'label'          => esc_html__( 'Heading', 'dnxte-divi-essential'),
                'selector'       => '%%order_class%% .dnxte-coverflow-heading'
            ),
            'content'              => array(
                'label'          => esc_html__( 'Content', 'dnxte-divi-essential'),
                'selector'       => '%%order_class%% .dnxte-coverflow-pra'
            ),
        );
    }
    
    public function get_advanced_fields_config() {
        return array(
            'text'  => false,
            'fonts' => array(
                'text' => array(
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-coverflow-heading'
                    ),
                    'toggle_slug' => 'dnxte_coverflow_carousel_text_settings'
                ),
                'content' => array(
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-coverflow-pra'
                    ),
                    'toggle_slug' => 'dnxte_coverflow_carousel_content_settings'
                )
            ),
            'background'            => array(
                'settings' => array(
                    'color' => 'alpha',
                ),
                'css'   => array(
                    'main' => "%%order_class%% .swiper-container",
                    'important' => true,
                ),
            ),
            'max_width' => false,
            'borders' => array(
                'default' => array(
                    'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .swiper-container',
							'border_styles' => '%%order_class%% .swiper-container',
                        ),
                    ),
                ),
                'image_border'   => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .img-fluid',
							'border_styles' => '%%order_class%% .img-fluid',
                        ),
                    ),
					'label_prefix' => esc_html__( 'Image', 'dnxte-divi-essential' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dnxte_coverflow_carousel_image_settings',
                ),
                'text_border'   => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dnxte-coverflow-heading',
							'border_styles' => '%%order_class%% .dnxte-coverflow-heading',
                        ),
                    ),
					'label_prefix' => esc_html__( 'Text', 'dnxte-divi-essential' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dnxte_coverflow_carousel_text_settings',
                ),
                'content_border'   => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dnxte-coverflow-pra',
							'border_styles' => '%%order_class%% .dnxte-coverflow-pra',
                        ),
                    ),
					'label_prefix' => esc_html__( 'Content', 'dnxte-divi-essential' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dnxte_coverflow_carousel_content_settings',
				),
            ),
            'box_shadow' => array(
                'default' => array(),
                'image_box_shadow' => array(
                    'css'          => array(
                        'main' => '%%order_class%% .img-fluid',
                        'important' => 'all'
                    ),
					'label_prefix' => esc_html__( 'Image', 'dnxte-divi-essential' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dnxte_coverflow_carousel_image_settings',
                ),
                'text_box_shadow' => array(
                    'css'          => array(
                        'main' => '%%order_class%% .dnxte-coverflow-heading',
                        'important' => 'all'
                    ),
					'label_prefix' => esc_html__( 'Text', 'dnxte-divi-essential' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dnxte_coverflow_carousel_text_settings',
                ),
                'content_box_shadow' => array(
                    'css'          => array(
                        'main' => '%%order_class%% .dnxte-coverflow-pra',
                        'important' => 'all'
                    ),
					'label_prefix' => esc_html__( 'Conent', 'dnxte-divi-essential' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dnxte_coverflow_carousel_content_settings',
                ),
            ),
            'filters' => array(
                'css' => array(
                    'main' => '%%order_class%%',
                ),
                'child_filters_target' => array(
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_coverflow_carousel_image_settings',
                ),
                'image' => array(
                    'css' => array(
                        'main' => '%%order_class%% .img-fluid',
                    ),
                ),
            )
        );
    }

	public function get_fields() {
		return array(
			'dnxte_coverflow_autoplay_show_hide' => array(
                'label'           => esc_html__( 'Autoplay', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
                    'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
                ),
                'affects'         => array(
                    'dnxte_coverflow_autoplay_delay',
                ),
                'default'          => 'on',
                'default_on_front' => 'on',
                'toggle_slug'      => 'dnxte_coverflow_carousel_settings'
            ),
            'dnxte_coverflow_autoplay_delay' => array(
                'label'           => esc_html__('Autoplay Delay', 'dnxte-divi-essential'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),                
                'default'         =>'2000',
                'depends_show_if' => 'on',
                'toggle_slug'      => 'dnxte_coverflow_carousel_settings'
            ),
            'dnxte_coverflow_loop' => array(
                'label'           => esc_html__( 'Loop', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
                    'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
                ),
                'default'          => 'off',
                'default_on_front' => 'off',
                'toggle_slug'      => 'dnxte_coverflow_carousel_settings'
            ),
            'dnxte_coverflow_centered_slides' => array(
                'label'           => esc_html__( 'Center slide', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
                    'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
                ),
                'default'          => 'off',
                'toggle_slug'      => 'dnxte_coverflow_carousel_settings'
            ),
            'dnxte_coverflow_auto_height' => array(
                'label'           => esc_html__( 'Auto Height', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
                    'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
                ),
                'default'          => 'on',
                'default_on_front' => 'on',
                'toggle_slug'      => 'dnxte_coverflow_carousel_settings'
            ),
            'dnxte_coverflow_grab' => array(
                'label'           => esc_html__( 'Use Grab Cursor', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Select on or off to control grab cursor', 'dnxte-divi-essential' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
                    'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
                ),
                'default'          => 'off',
                'default_on_front' => 'off',
                'toggle_slug'      => 'dnxte_coverflow_carousel_navigation'
            ),
            'dnxte_coverflow_keyboard_enable' => array(
                'label'           => esc_html__( 'Keyboard Navigation', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Select on or off to control keyboard navigation.', 'dnxte-divi-essential' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
                    'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
                ),
                'default'          => 'on',
                'default_on_front' => 'on',
                'toggle_slug'      => 'dnxte_coverflow_carousel_navigation'
            ),
            'dnxte_coverflow_mousewheel_enable' => array(
                'label'           => esc_html__( 'Mousewheel Navigation', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Select on or off to control slide using mousewheel.', 'dnxte-divi-essential' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
                    'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
                ),
                'default'          => 'on',
                'default_on_front' => 'on',
                'toggle_slug'      => 'dnxte_coverflow_carousel_navigation'
            ),
            'dnxte_coverflow_speed'   => array(
                'label'           => esc_html__( 'Speed', 'dnxte-divi-essential' ),
                'type'            => 'range',
                'option_category'=> 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 1000,
                ),
                'default'         => '400',
                'fixed_unit'      => '',
                'validate_unit'   => false,
                'unitless'        => true,
                'toggle_slug'      => 'dnxte_coverflow_carousel_settings'
            ),
            'dnxte_coverflow_spacebetween'   => array(
                'label'           => esc_html__( 'Space Between', 'dnxte-divi-essential' ),
                'type'            => 'range',
                'option_category'=> 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 300,
                ),
                'default'         => '15',
                'fixed_unit'      => '',
                'validate_unit'   => false,
                'unitless'        => true,
                'toggle_slug'      => 'dnxte_coverflow_carousel_settings'
            ),
            'dnxte_coverflow_arrows' => array(
                'label'           => esc_html__( 'Use Arrow Navigation', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
                    'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
                ),
                'default'          => 'off',
                'default_on_front' => 'off',
                'toggle_slug'      => 'dnxte_coverflow_carousel_navigation',
            ),
            'dnxte_coverflow_pagination_type'    => array(
                'label'          => esc_html__('Type', 'dnxte-divi-essential'),
                'type'           => 'select',
                'option_category'=> 'basic_option',
                'options'        => array(
                    "none"    => esc_html__( 'None',  'dnxte-divi-essential' ),
                    'bullets' => esc_html__( 'Bullets',  'dnxte-divi-essential' ),
                    'fraction'   => esc_html__( 'Fraction', 'dnxte-divi-essential' ),
                    'progressbar'   => esc_html__( 'Progress Bar', 'dnxte-divi-essential' ),
                ),
                'default'        => 'bullets',
                'toggle_slug'      => 'dnxte_coverflow_carousel_navigation'
            ),
            'dnxte_coverflow_pagination_bullets' => array(
                'label'           => esc_html__( 'Dynamic Bullets', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
                    'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
                ),
                'default_on_front' => 'on',
                'toggle_slug'      => 'dnxte_coverflow_carousel_navigation',
                'show_if'          => array(
                    'dnxte_coverflow_pagination_type' => 'bullets'
                ),
            ),
            'dnxte_coverflow_breakpoint_desktop' => array(
                'label'           => esc_html__('Slides Per View', 'dnxte-divi-essential'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),
                'default'         => '3',
                'default_on_front' => '3',
                'mobile_options'   => true,
				'responsive'       => true,
                'toggle_slug'      => 'dnxte_coverflow_carousel_settings'
            ),
            'dnxte_coverflow_pause_on_hover' => array(
                'label'           => esc_html__( 'Pause On Hover', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Select on or off to control pause on hover function.', 'dnxte-divi-essential' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
                    'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
                ),
                'default'          => 'on',
                'default_on_front' => 'on',
                'toggle_slug'      => 'dnxte_coverflow_carousel_settings'
            ),
            'dnxte_coverflow_slide_shadows' => array(
                'label'           => esc_html__( 'Use Slide Shadows', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
                    'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
                ),
                'default'         => 'off',
                'default_on_front' => 'off',
                'toggle_slug'      => 'dnxte_coverflow_carousel_effect',
            ),
            'dnxte_coverflow_slide_rotate'   => array(
                'label'           => esc_html__( 'Slide Rotate', 'dnxte-divi-essential' ),
                'type'            => 'range',
                'option_category'=> 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 1000,
                ),
                'default'         => '0',
                'fixed_unit'      => '',
                'validate_unit'   => false,
                'unitless'        => true,
                'toggle_slug'      => 'dnxte_coverflow_carousel_effect'
            ),
            'dnxte_coverflow_slide_stretch'   => array(
                'label'           => esc_html__( 'Slide Stretch', 'dnxte-divi-essential' ),
                'type'            => 'range',
                'option_category'=> 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 1000,
                ),
                'default'         => '50',
                'fixed_unit'      => '',
                'validate_unit'   => false,
                'unitless'        => true,
                'toggle_slug'      => 'dnxte_coverflow_carousel_effect'
            ),
            'dnxte_coverflow_slide_depth'   => array(
                'label'           => esc_html__( 'Slide Depth', 'dnxte-divi-essential' ),
                'type'            => 'range',
                'option_category'=> 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 1000,
                ),
                'default'         => '300',
                'fixed_unit'      => '',
                'validate_unit'   => false,
                'unitless'        => true,
                'toggle_slug'      => 'dnxte_coverflow_carousel_effect'
            ),
            'dnxte_coverflow_image_background' => array(
                'label'        => esc_html__( 'Background', 'dnxte-divi-essential' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => '#fff',
                'toggle_slug'  => 'dnxte_coverflow_carousel_image_background',
                'sub_toggle'   => 'sub_toggle_color',
                'responsive'   => true,
                'mobile_options' => true
            ),
            'dnxte_coverflow_image_background_gradient_show_hide' => array(
                'label'           => esc_html__( 'Image Background Gradient', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',
				'toggle_slug'     => 'dnxte_coverflow_carousel_image_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'dnxte_coverflow_image_background_gradient_color_one',
					'dnxte_coverflow_image_background_gradient_color_two',
					'dnxte_coverflow_image_background_gradient_type',
					'dnxte_coverflow_image_background_gradient_start_position',
					'dnxte_coverflow_image_background_gradient_end_position'
				),
				'default_on_front' => 'off',
            ),
            'dnxte_coverflow_image_background_gradient_color_one'	=> array(
				'label'          => esc_html__('Select Color One', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxte_coverflow_carousel_image_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#2b87da',
				'depends_show_if'=> 'on',
				'show_if'        => array(
					'dnxte_coverflow_image_background_gradient_show_hide' => 'on',
				)
			),
			'dnxte_coverflow_image_background_gradient_color_two'	=> array(
				'label'          => esc_html__('Select Color Two', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxte_coverflow_carousel_image_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#29c4a9',
				'depends_show_if'=> 'on',
				'show_if'        => array(
					'dnxte_coverflow_image_background_gradient_show_hide' => 'on',
				)
			),
			'dnxte_coverflow_image_background_gradient_type'		=> array(
				'label'           => esc_html__( 'Select Gradient Type', 'dnxte-divi-essential' ),
				'type'            => 'select',
				'description'     => esc_html__( 'Select the types of gradient', 'dnxte-divi-essential' ),
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxte_coverflow_carousel_image_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'         => array(
					'linear-gradient' => esc_html__( 'Linear', 'dnxte-divi-essential' ),
					'radial-gradient' => esc_html__( 'Radial', 'dnxte-divi-essential' ),
				),
				'default'         => 'linear-gradient',
				'depends_show_if'=> 'on',
				'show_if'        => array(
					'dnxte_coverflow_image_background_gradient_show_hide' => 'on',
				)
			),
			'dnxte_coverflow_image_background_gradient_type_linear_direction'   => array(
				'label'           => esc_html__( 'Linear direction', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category'=> 'basic_option',
				'toggle_slug'    => 'dnxte_coverflow_carousel_image_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 360,
				),
				'default'         => '180deg',
				'fixed_unit'      => 'deg',
				'show_if' => array(
					'dnxte_coverflow_image_background_gradient_show_hide' => 'on',
					'dnxte_coverflow_image_background_gradient_type' 		 => 'linear-gradient',
				),
			),
			'dnxte_coverflow_image_background_gradient_type_radial_direction'   => array(
				'label'           	=> esc_html__( 'Radial Direction', 'dnxte-divi-essential'),
				'type'            	=> 'select',
				'description'     	=> esc_html__( 'Select the types of gradient', 'dnxte-divi-essential'),                
				'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'dnxte_coverflow_carousel_image_background',
				'sub_toggle'	 	=> 'sub_toggle_gradient',
				'options'       	=> array(
					'circle at center'       => esc_html__(	'Center', 'dnxte-divi-essential' ),
					'circle at left'         => esc_html__(	'Top Left', 'dnxte-divi-essential' ),
					'circle at top'          => esc_html__(	'Top',	'dnxte-divi-essential' ),
					'circle at top right'    => esc_html__(	'Top Right', 'dnxte-divi-essential' ),
					'circle at right'        => esc_html__(	'Right', 'dnxte-divi-essential' ),
					'circle at bottom right' => esc_html__(	'Bottom Right', 'dnxte-divi-essential' ),
					'circle at bottom'       => esc_html__(	'Bottom', 'dnxte-divi-essential' ),
					'circle at bottom left'  => esc_html__(	'Bottom Left', 'dnxte-divi-essential' ),
					'circle at left'         => esc_html__(	'Left', 'dnxte-divi-essential' ),

				),
				'default'         => 'circle at center',
				'show_if'         => array(
					'dnxte_coverflow_image_background_gradient_show_hide' => 'on',
					'dnxte_coverflow_image_background_gradient_type'		=> 'radial-gradient',
				),
			),
			'dnxte_coverflow_image_background_gradient_start_position'           => array(
				'label'           => esc_html__( 'Start Position', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxte_coverflow_carousel_image_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 100,
				),
				'default'         => '0%',
				'fixed_unit'      => '%',
				'depends_show_if'=> 'on',
				'show_if'        => array(
					'dnxte_coverflow_image_background_gradient_show_hide' => 'on',
				)
			),
			'dnxte_coverflow_image_background_gradient_end_position'             => array(
				'label'           => esc_html__( 'End Position', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxte_coverflow_carousel_image_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 100,
				),
				'default'         => '100%',
				'depends_show_if'=> 'on',
				'fixed_unit'      => '%',
				'show_if'        => array(
					'dnxte_coverflow_image_background_gradient_show_hide' => 'on',
				)
            ),
            'dnxte_coverflow_arrow_color' => array(
                'label'        => esc_html__( 'Arrow Color', 'dnxte-divi-essential' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
                'default'      => '#0c71c3',
                'tab_slug'     => 'advanced',
                'toggle_slug'  => 'dnxte_coverflow_carousel_color_settings',
            ),
            'dnxte_coverflow_arrow_background_color' => array(
                'label'        => esc_html__( 'Arrow Background Color', 'dnxte-divi-essential' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
                'default'      => '#fff',
                'tab_slug'     => 'advanced',
                'toggle_slug'  => 'dnxte_coverflow_carousel_color_settings',
            ),
            'dnxte_coverflow_dots_color' => array(
                'label'        => esc_html__( 'Dots Color', 'dnxte-divi-essential' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
                'default'      => '#000',
                'tab_slug'     => 'advanced',
                'toggle_slug'  => 'dnxte_coverflow_carousel_color_settings',
                'show_if'      => array(
                    'dnxte_coverflow_pagination_type' => 'bullets'
                )
            ),
            'dnxte_coverflow_dots_active_color' => array(
                'label'        => esc_html__( 'Dots Active Color', 'dnxte-divi-essential' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
                'default'      => '#0c71c3',
                'tab_slug'     => 'advanced',
                'toggle_slug'  => 'dnxte_coverflow_carousel_color_settings',
                'show_if'      => array(
                    'dnxte_coverflow_pagination_type' => 'bullets'
                )
            ),
            'dnxte_coverflow_progressbar_fill_color' => array(
                'label'        => esc_html__( 'Progressbar Fill Color', 'dnxte-divi-essential' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
                'default'      => '#0c71c3',
                'tab_slug'     => 'advanced',
                'toggle_slug'  => 'dnxte_coverflow_carousel_color_settings',
                'show_if'      => array(
                    'dnxte_coverflow_pagination_type' => 'progressbar'
                )
            ),
            'dnxte_coverflow_arrow_size'   => array(
                'label'           => esc_html__( 'Font Size', 'dnxte-divi-essential' ),
                'type'            => 'range',
                'option_category'=> 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 100,
                ),
                'default'         => '60',
                'fixed_unit'      => '',
                'validate_unit'   => false,
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'dnxte_coverflow_carousel_arrow_settings'
            ),
            'dnxte_coverflow_arrow_position'   => array(
				'label'           	=> esc_html__( 'Arrow Position', 'dnxte-divi-essential'),
				'type'            	=> 'select',
				'description'     	=> esc_html__( 'Select the types of arrow position', 'dnxte-divi-essential'),                
                'option_category'	=> 'basic_option',
                'tab_slug'        => 'advanced',
				'toggle_slug'    	=> 'dnxte_coverflow_carousel_arrow_settings',
				'options'       	=> array(
                    'default'       => esc_html__(	'Default', 'dnxte-divi-essential' ),
					'inner'       => esc_html__(	'Inner', 'dnxte-divi-essential' ),
					'outer'         => esc_html__(	'Outer', 'dnxte-divi-essential' ),

				),
				'default'         => 'default',
            ),
            'dnxte_coverflow_arrow_margin'	=> array(
				'label'           		=> esc_html__('Arrow Margin', 'dnxte-divi-essential'),
                'type'            		=> 'custom_margin',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
				'toggle_slug'     		=> 'margin_padding', 
            ),
            'dnxte_coverflow_arrow_padding'	=> array(
				'label'           		=> esc_html__('Arrow Padding', 'dnxte-divi-essential'),
                'type'            		=> 'custom_padding',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
				'toggle_slug'     		=> 'margin_padding', 
            ),
		);
	}


	public function render( $attrs, $content = null, $render_slug ) {
        wp_enqueue_script( 'dnext_swiper_frontend' );
        wp_enqueue_style( 'dnext_swiper-min-css' );
        $content = $this->content;
        $dnxte_autoplay_show_hide = "on" === $this->props['dnxte_coverflow_autoplay_show_hide'];
        $dnxte_autoplay_delay = $this->props['dnxte_coverflow_autoplay_delay'];
        $dnxte_coverflow_loop = $this->props['dnxte_coverflow_loop'];
        $dnxte_coverflow_speed = $this->props['dnxte_coverflow_speed'];
        $dnxte_coverflow_slides_perview_desktop = $this->props['dnxte_coverflow_breakpoint_desktop'];
        $dnxte_coverflow_slides_perview_desktop_tablet = $this->props['dnxte_coverflow_breakpoint_desktop_tablet'];
        $dnxte_coverflow_slides_perview_desktop_phone = $this->props['dnxte_coverflow_breakpoint_desktop_phone'];
        $dnxte_coverflow_slides_perview_desktop_last_edited = $this->props['dnxte_coverflow_breakpoint_desktop_last_edited'];
        
        

        $dnxte_coverflow_direction = "horizontal";
        $dnxte_coverflow_pagination_type = $this->props['dnxte_coverflow_pagination_type'];
        $dnxte_coverflow_pagination_bullets = $dnxte_coverflow_pagination_type === 'bullets' ? $this->props['dnxte_coverflow_pagination_bullets'] : "off";
        $space_between = $this->props['dnxte_coverflow_spacebetween'];
        $grab_cursor = $this->props['dnxte_coverflow_grab'];
        $slides_center = "on" === $this->props['dnxte_coverflow_centered_slides'];
        $keyboard_nav = $this->props['dnxte_coverflow_keyboard_enable'];
        $mousewheel_nav = $this->props['dnxte_coverflow_mousewheel_enable'];
        $slide_shadow = $this->props['dnxte_coverflow_slide_shadows'];
        $slide_rotate = $this->props['dnxte_coverflow_slide_rotate'];
        $slide_stretch = $this->props['dnxte_coverflow_slide_stretch'];
        $slide_depth = $this->props['dnxte_coverflow_slide_depth'];
        $auto_height = $this->props['dnxte_coverflow_auto_height'];
        $pause_on_hover = "on" === $this->props['dnxte_coverflow_pause_on_hover'];


        // Image filter variables
        $child_hue_rotate = esc_attr__($this->props['child_filter_hue_rotate'], 'dnxte-divi-essential');
        $child_saturate = esc_attr__($this->props['child_filter_saturate'], 'dnxte-divi-essential');
        $child_brightness = esc_attr__($this->props['child_filter_brightness'], 'dnxte-divi-essential');
        $child_contrast = esc_attr__($this->props['child_filter_contrast'], 'dnxte-divi-essential');
        $child_invert = esc_attr__($this->props['child_filter_invert'], 'dnxte-divi-essential');
        $child_sepia = esc_attr__($this->props['child_filter_sepia'], 'dnxte-divi-essential');
        $child_opacity = esc_attr__($this->props['child_filter_opacity'], 'dnxte-divi-essential');
        $child_blur = esc_attr__($this->props['child_filter_blur'], 'dnxte-divi-essential');
        $child_mix_blend_mode = esc_attr__($this->props['child_mix_blend_mode'], 'dnxte-divi-essential');

        if ( '' !== $dnxte_coverflow_slides_perview_desktop_tablet || '' !== $dnxte_coverflow_slides_perview_desktop_phone || '' !== $dnxte_coverflow_slides_perview_desktop ) {
			$is_responsive = et_pb_get_responsive_status( $dnxte_coverflow_slides_perview_desktop_last_edited );

			$slide_to_show_values = array(
				'desktop' => $dnxte_coverflow_slides_perview_desktop,
				'tablet'  => $is_responsive ? $dnxte_coverflow_slides_perview_desktop_tablet : '',
				'phone'   => $is_responsive ? $dnxte_coverflow_slides_perview_desktop_phone : '',
			);
        }
        
        // USE ARROW CLASSES
        $arrowsClass = "";
        if("off" !== $this->props['dnxte_coverflow_arrows']) {
            if($this->props['dnxte_coverflow_arrow_position'] === 'inner'){
                $arrowsClass = sprintf(
                    '<div class="swiper-button-prev dnxte_coverflow_arrows_inner_left" data-icon="4"></div>
                    <div class="swiper-button-next dnxte_coverflow_arrows_inner_right" data-icon="5"></div>'
                ); 
            }else if($this->props['dnxte_coverflow_arrow_position'] === 'outer') {
                $arrowsClass = sprintf(
                    '<div class="swiper-button-prev dnxte_coverflow_arrows_outer_left" data-icon="4"></div>
                    <div class="swiper-button-next dnxte_coverflow_arrows_outer_right" data-icon="5"></div>'
                );
            }else{
                $arrowsClass = sprintf(
                  '<div class="swiper-button-prev dnxte_coverflow_arrows_default_left" data-icon="4"></div>
                  <div class="swiper-button-next dnxte_coverflow_arrows_default_right" data-icon="5"></div>'
              );
            }
        }

        // PAGINATION CLASSES
        $pagination_class = "swiper-pagination ";
        if( $dnxte_coverflow_pagination_type === "bullets" && $dnxte_coverflow_pagination_bullets === "on"){
            $pagination_class .= "swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-bullets-dynamic mt-10";
        }else if($dnxte_coverflow_pagination_type === "bullets") {
            $pagination_class .= "swiper-pagination-clickable swiper-pagination-bullets mt-10";
        }else if($dnxte_coverflow_pagination_type === "fraction") {
            $pagination_class .= "swiper-pagination-fraction";
        }else if($dnxte_coverflow_pagination_type === "progressbar") {
            $pagination_class .= "swiper-pagination-progressbar";
        }


        // IMAGE BACKGROUND COLOR START

        $dnxte_coverflow_bg = $this->props['dnxte_coverflow_image_background'];
        $dnxte_coverflow_bg_values = et_pb_responsive_options()->get_property_values( $this->props, 'dnxte_coverflow_image_background' );
        $dnxte_coverflow_bg_tablet = isset($dnxte_coverflow_bg_values['tablet']) ? $dnxte_coverflow_bg_values['tablet'] : '';
        $dnxte_coverflow_bg_phone = isset($dnxte_coverflow_bg_values['phone']) ? $dnxte_coverflow_bg_values['phone'] : '';


        $dnxte_coverflow_bg_style = sprintf('background: %1$s !important;', esc_attr__($dnxte_coverflow_bg));
        $dnxte_coverflow_bg_tablet_style = sprintf('background: %1$s !important;', esc_attr__($dnxte_coverflow_bg_tablet));
        $dnxte_coverflow_bg_phone_style = sprintf('background: %1$s !important;', esc_attr__($dnxte_coverflow_bg_phone));
        
        ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => "%%order_class%% .img-fluid",
            'declaration' => $dnxte_coverflow_bg_style,
        ) );
        ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => "%%order_class%% .img-fluid",
            'declaration' => $dnxte_coverflow_bg_tablet_style,
            'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
        ) );
        ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => "%%order_class%% .img-fluid",
            'declaration' => $dnxte_coverflow_bg_phone_style,
            'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
        ) );

        // IMAGE BACKGROUND COLOR END

        // IMAGE BACKGROUND  GRADIENT COLOR START 
		$dnxte_coverflow_image_bg_gradient_color_one = $this->props['dnxte_coverflow_image_background_gradient_color_one'];
		$dnxte_coverflow_image_bg_gradient_color_two = $this->props['dnxte_coverflow_image_background_gradient_color_two'];

		$dnxte_coverflow_image_bg_gradient_type      = $this->props['dnxte_coverflow_image_background_gradient_type'];
		$dnxte_coverflow_image_bg_gradient_start     = $this->props['dnxte_coverflow_image_background_gradient_start_position'];
		$dnxte_coverflow_image_bg_gradient_end     	= $this->props['dnxte_coverflow_image_background_gradient_end_position'];

		$dnxte_coverflow_image_bg_gradient_direction = $dnxte_coverflow_image_bg_gradient_type === 'linear-gradient' ? $this->props['dnxte_coverflow_image_background_gradient_type_linear_direction'] : $this->props['dnxte_coverflow_image_background_gradient_type_radial_direction'];

       if("off" !== $this->props['dnxte_coverflow_image_background_gradient_show_hide']){
        $dnxte_coverflow_image_bg_gradient = sprintf('background: %1$s(%2$s, %3$s %5$s, %4$s %6$s) !important;',$dnxte_coverflow_image_bg_gradient_type, $dnxte_coverflow_image_bg_gradient_direction, esc_attr($dnxte_coverflow_image_bg_gradient_color_one), esc_attr($dnxte_coverflow_image_bg_gradient_color_two), $dnxte_coverflow_image_bg_gradient_start, $dnxte_coverflow_image_bg_gradient_end);

        ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => "%%order_class%% .img-fluid",
            'declaration' => $dnxte_coverflow_image_bg_gradient,
        ) );
       } 
        
		// IMAGE BACKGROUND GRADIENT COLOR END

         // ARROW COLOR 

       $dnxte_coverflow_arrow_color = $this->props['dnxte_coverflow_arrow_color'];
       $dnxte_coverflow_arrow_background_color = $this->props['dnxte_coverflow_arrow_background_color'];

       $dnxte_coverflow_arrow_color_style = sprintf('color: %1$s !important; background-color: %2$s !important;', esc_attr($dnxte_coverflow_arrow_color), esc_attr($dnxte_coverflow_arrow_background_color));

       ET_Builder_Element::set_style( $render_slug, array(
        'selector'    => "%%order_class%% .swiper-button-prev,%%order_class%% .swiper-button-next",
        'declaration' => $dnxte_coverflow_arrow_color_style,
        ) );

        // ARROW COLOR END

        // ARROW SIZE START
        $dnxte_coverflow_arrow_size = (int) $this->props['dnxte_coverflow_arrow_size'];
        $arrow_width = $dnxte_coverflow_arrow_size-15;
        $dnxte_coverflow_arrow_size_style = sprintf('font-size: %1$spx', esc_attr($dnxte_coverflow_arrow_size));
        $dnxte_coverflow_arrow_background_width_height = sprintf('width: %1$spx !important;height:%1$spx !important', esc_attr($arrow_width));

        ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => "%%order_class%% .swiper-button-prev:after,%%order_class%%  .swiper-button-next:after",
            'declaration' => $dnxte_coverflow_arrow_size_style,
        ) );
        ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => "%%order_class%% .swiper-button-prev,%%order_class%% .swiper-button-next",
            'declaration' => $dnxte_coverflow_arrow_background_width_height,
        ) );
        // ARROW SIZE END

        // DOTS COLOR START

        $dnxte_coverflow_dots_color = $this->props['dnxte_coverflow_dots_color'];
        $dnxte_coverflow_dots_active_color = $this->props['dnxte_coverflow_dots_active_color'];

        $dnxte_coverflow_dots_color_style = sprintf('background-color: %1$s !important;', esc_attr($dnxte_coverflow_dots_color));
        $dnxte_coverflow_dots_active_color_style = sprintf('background-color: %1$s !important;', esc_attr($dnxte_coverflow_dots_active_color));


        ET_Builder_Element::set_style( $render_slug, array(
        'selector'    => "%%order_class%% .swiper-pagination .swiper-pagination-bullet",
        'declaration' => $dnxte_coverflow_dots_color_style,
        ) );
        
        ET_Builder_Element::set_style( $render_slug, array(
        'selector'    => "%%order_class%% .swiper-pagination .swiper-pagination-bullet-active",
        'declaration' => $dnxte_coverflow_dots_active_color_style,
        ) );

        // PROGRESSBAR FILL COLOR START
        
        $dnxte_coverflow_progressbar_color = $this->props['dnxte_coverflow_progressbar_fill_color'];
        $dnxte_coverflow_progressbar_color_style = sprintf('background-color: %1$s !important;', esc_attr($dnxte_coverflow_progressbar_color));
        ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => "%%order_class%% .swiper-pagination-progressbar .swiper-pagination-progressbar-fill",
            'declaration' => $dnxte_coverflow_progressbar_color_style,
        ) );

        // Progressbar fill color end

        // Image filter
        $image_filter_style = sprintf('filter: hue-rotate(%1$s) saturate(%2$s) brightness(%3$s) contrast(%4$s) invert(%5$s) sepia(%6$s) opacity(%7$s) blur(%8$s);mix-blend-mode: %9$s;', $child_hue_rotate, $child_saturate, $child_brightness, $child_contrast, $child_invert, $child_sepia, $child_opacity, $child_blur, $child_mix_blend_mode);

        ET_Builder_Element::set_style($render_slug, array(
            'selector' => "%%order_class%% .img-fluid",
            'declaration' => $image_filter_style,
        ));
        // Image filter end

        $output = sprintf(
            '<div class="swiper-container dnxte-coverflowslider-active swiper-container-initialized swiper-container-horizontal" data-autoplay="%2$s" data-delay="%3$s" data-direction="%9$s" data-speed="%5$s" data-loop="%4$s" data-pagination-type="%10$s" data-pagination-bullets="%11$s"   data-breakpoints="%6$s|%7$s|%8$s" data-spacing="%14$s" data-grab="%15$s" data-center="%16$s" data-keyboardenable="%17$s"  data-covershadow="%18$s" data-coverrotate="%19$s" data-coverstretch="%20$s" data-coverdepth="%21$s" data-autoheight="%22$s" data-pauseonhover="%23$s" data-mouse="%24$s">
                <div class="swiper-wrapper">
                    %1$s
                </div>
                <div class="%13$s"></div>
            </div>
            %12$s',
            $content,
            esc_attr( $dnxte_autoplay_show_hide ),
            esc_attr( $dnxte_autoplay_delay ),
            esc_attr( $dnxte_coverflow_loop ),
            esc_attr( $dnxte_coverflow_speed ), // #5
            esc_attr($dnxte_coverflow_slides_perview_desktop),
            '' !== $slide_to_show_values['tablet'] ? esc_attr( $slide_to_show_values['tablet'] ) : 1,
			'' !== $slide_to_show_values['phone'] ? esc_attr( $slide_to_show_values['phone'] ) : 1,
            esc_attr( $dnxte_coverflow_direction ),
            esc_attr( $dnxte_coverflow_pagination_type ), // #10
            esc_attr( $dnxte_coverflow_pagination_bullets ),
            $arrowsClass,
            esc_attr( $pagination_class ),
            esc_attr( $space_between ),
            esc_attr( $grab_cursor ), // #15
            esc_attr( $slides_center ),
            esc_attr( $keyboard_nav ),
            esc_attr( $slide_shadow ),
            esc_attr( $slide_rotate ),
            esc_attr( $slide_stretch ), // #20
            esc_attr( $slide_depth ),
            esc_attr( $auto_height ),
            esc_attr( $pause_on_hover ),
            esc_attr( $mousewheel_nav )
        );

        $this->apply_css($render_slug);
        return $this->_render_module_wrapper($output, $render_slug);
    }
    
    public function apply_css($render_slug){

        /**
         * Custom Padding Margin Output
         *
        */
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_coverflow_arrow_padding", "%%order_class%% .swiper-button-next,%%order_class%% .swiper-button-prev", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_coverflow_arrow_padding", "%%order_class%% .swiper-button-next, %%order_class%% .swiper-button-prev", "padding");
}

}

new Divi_NxteCoverflowSlider;
