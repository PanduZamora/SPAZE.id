<?php
include_once(WP_PLUGIN_DIR.'/divi-essential/includes/modules/base/Common.php');

class DiviNextTooltipChild extends ET_Builder_Module {

	public $slug       = 'dnxte_tooltip_child';
	public $vb_support = 'on';
	public $type = 'child';
    public $child_title_var = 'title';
    public $child_title_fallback_var = 'tooltip_image_alt';

	protected $module_credits = array(
		'module_uri' => 'https://www.diviessential.com/divi-hotspot/',
		'author'     => 'Divi Next',
		'author_uri' => 'www.divinext.com',
	);

	public function init() {
		$this->name = esc_html__( 'Hotspot Item', 'dnxte-divi-essential' );

		$this->settings_modal_toggles = array(
			'general' => array(
				'toggles' => array(
					'dnxte_hotspot_elements' => esc_html__('Hotspot', 'dnxte-divi-essential'),
					'dnxte_tooltip_elements' => esc_html__('Tooltip', 'dnxte-divi-essential')
				)
                ),
            'advanced' => array(
                'toggles' => array(
                    'dnxte_hotspot_settings' => esc_html__('Hotspot Settings', 'dnxte-divi-essential'),
                    'dnxte_tooltip_settings' => esc_html__('Tooltip Settings', 'dnxte-divi-essential'),
                    'dnxte_tooltip_text' => esc_html__('Tooltip Text', 'dnxte-divi-essential'),
                    'dnxte_tooltip_desc' => esc_html__('Tooltip Description', 'dnxte-divi-essential'),
                    'dnxte_tooltip_image' => esc_html__('Tooltip Image', 'dnxte-divi-essential')
                )
            )
        );
        
        $this->custom_css_fields = array(
            'hotspot_text' => array(
                'label' => esc_html__('Hotspot Text', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-hostpot-hotspot__text',
            ),
            'hotspot_icon' => array(
                'label' => esc_html__('Hotspot Icon', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-hotspot_icon',
            ),
            'tooltip_text' => array(
                'label' => esc_html__('Tooltip Text', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte_tooltip_text',
            ),
            'tooltip_desc' => array(
                'label' => esc_html__('Tooltip Description', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-tooltip-content',
            ),
            'tooltip_image' => array(
                'label' => esc_html__('Tooltip Image', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-tooltip-image-container',
            ),
        );
    }
    
    public function get_advanced_fields_config(){
        return array(
            'text' => false,
            'max_width' => false,
            'fonts' => array(
                'hotspot_text' => array(
                    'label' => esc_html__('Hotspot', 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => "%%order_class%% .dnxte-hostpot-hotspot__text",
                        'important' => 'plugin-only',
                    ),
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_hotspot_settings',
                ),
                'tooltip_text' => array(
                    'label' => esc_html__('Tooltip', 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => "%%order_class%% .dnxte-hostpot-tooltip-text .dnxte_tooltip_text",
                        'important' => 'plugin-only',
                    ),
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_tooltip_text',
                ),
                'tooltip_desc' => array(
                    'label' => esc_html__('Description', 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => "%%order_class%% .dnxte-hostpot-tooltip-text .dnxte-tooltip-content",
                        'important' => 'plugin-only',
                    ),
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_tooltip_desc',
                ),
            ),
            'borders' => array(
                'hotspot' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% .dnxte-hostpot-hotspots__wrapper,%%order_class%% .dnxte-hostpot-hotspots__wrapper:before",
                            'border_styles' => "%%order_class%% .dnxte-hostpot-hotspots__wrapper",
                        ),
                        'important' => 'all'
                    ),
                    'defaults'    => array(
                        'border_radii'  => 'on|50%|50%|50%|50%',
                    ),
                    'label_prefix' => esc_html__('Hotspot', 'dnxte-divi-essential'),
                    'toggle_slug' => 'dnxte_hotspot_settings',
                ),
                'tooltip_text' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% .dnxte-hostpot-tooltip-text .dnxte_tooltip_text",
                            'border_styles' => "%%order_class%% .dnxte-hostpot-tooltip-text .dnxte_tooltip_text",
                        ),
                        'important' => 'all'
                    ),
                    'label_prefix' => esc_html__('Text', 'dnxte-divi-essential'),
                    'toggle_slug' => 'dnxte_tooltip_text',
                ),
                'tooltip_desc' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% .dnxte-hostpot-tooltip-text .dnxte-tooltip-content",
                            'border_styles' => "%%order_class%% .dnxte-hostpot-tooltip-text .dnxte-tooltip-content",
                        ),
                        'important' => 'all'
                    ),
                    'toggle_slug' => 'dnxte_tooltip_desc',
                ),
                'tooltip_img' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% .dnxte-hostpot-tooltip-text img",
                            'border_styles' => "%%order_class%% .dnxte-hostpot-tooltip-text img",
                        ),
                        'important' => 'all'
                    ),
                    'toggle_slug' => 'dnxte_tooltip_image',
                ),
            ),
            'box_shadow' => array(
                'hotspot' => array(
                    'label' => esc_html__('Hotspot Box Shadow', 'dnxte-divi-essential'),
                    'option_category' => 'layout',
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_hotspot_settings',
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-hostpot-hotspots__wrapper',
                        'custom_style' => true,
                        'important' => 'all'
                    ),
                    'default_on_fronts' => array(
                        'color' => '',
                        'position' => '',
                    ),
                ),
                'tooltip_text' => array(
                    'label' => esc_html__('Text Box Shadow', 'dnxte-divi-essential'),
                    'option_category' => 'layout',
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_tooltip_text',
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-hostpot-tooltip-text .dnxte_tooltip_text',
                        'custom_style' => true,
                        'important' => 'all'
                    ),
                    'default_on_fronts' => array(
                        'color' => '',
                        'position' => '',
                    ),
                ),
                'tooltip_desc' => array(
                    'label' => esc_html__('Box Shadow', 'dnxte-divi-essential'),
                    'option_category' => 'layout',
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_tooltip_desc',
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-hostpot-tooltip-text .dnxte-tooltip-content',
                        'custom_style' => true,
                        'important' => 'all'
                    ),
                    'default_on_fronts' => array(
                        'color' => '',
                        'position' => '',
                    ),
                ),
                'tooltip_img' => array(
                    'label' => esc_html__('Box Shadow', 'dnxte-divi-essential'),
                    'option_category' => 'layout',
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_tooltip_image',
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-hostpot-tooltip-text img',
                        'custom_style' => true,
                        'important' => 'all'
                    ),
                    'default_on_fronts' => array(
                        'color' => '',
                        'position' => '',
                    ),
                ),
            )
        );
    }

	public function get_fields() {
		return array(
			'tooltip_hotspot_text' => array(
                'label' => esc_html__('Hotspot Text', 'dnxte-divi-essential'),
                'type' => 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Input Hotspot text', 'dnxte-divi-essential'),
                'toggle_slug' => 'dnxte_hotspot_elements',
                'dynamic_content' => 'text',
            ),
            'tooltip_use_hotspot_icon' => array(
                'label' => esc_html__('Use Icon', 'dnxte-divi-essential'),
                'type' => 'yes_no_button',
                'toggle_slug' => 'dnxte_hotspot_elements',
                'options' => array(
                    'on' => esc_html__('Yes', 'dnxte-divi-essential'),
                    'off' => esc_html__('No', 'dnxte-divi-essential'),
                ),
                'affects' => array(
                    'tooltip_hotspot_icon',
                    'hotspot_icon_color',
                    'hotspot_icon_size'
                ),
                'default_on_front' => 'on',
            ),
            'tooltip_hotspot_icon' => array(
                'label' => esc_html__('Icon', 'dnxte-divi-essential'),
                'type' => 'select_icon',
                'class' => array('et-pb-font-icon'),
                'default' => 'N',
                'toggle_slug' => 'dnxte_hotspot_elements',
                'option_category' => 'basic_option',
            ),
            'tooltip_bg' => array(
                'label' => esc_html__('Background Color', 'dnxte-divi-essential'),
                'type' => 'color-alpha',
                'custom_color' => true,
                'default' => '',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_tooltip_settings',
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'tooltip_position' => array(
                'label' => esc_html__('Tooltip Position', 'dnxte-divi-essential'),
                'type' => 'select',
                'description' => esc_html__('Select the position of the tooltip', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'tab_slug'  => 'advanced',
                'toggle_slug' => 'dnxte_tooltip_settings',
                'options' => array(
                    'top' => esc_html__('Top', 'dnxte-divi-essential'),
                    'right' => esc_html__('Right', 'dnxte-divi-essential'),
                    'bottom' => esc_html__('Bottom', 'dnxte-divi-essential'),
                    'left' => esc_html__('Left', 'dnxte-divi-essential'),
                ),
                'default' => 'top',
            ),
            'tooltip_layout' => array(
                'label' => esc_html__('Tooltip Layout', 'dnxte-divi-essential'),
                'type' => 'select',
                'description' => esc_html__('Select the layout of the tooltip', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'tab_slug'  => 'advanced',
                'toggle_slug' => 'dnxte_tooltip_settings',
                'options' => array(
                    'column' => esc_html__('Top Image, Bottom Content', 'dnxte-divi-essential'),
                    'column-reverse' => esc_html__('Top Content, Bottom Image', 'dnxte-divi-essential'),
                    'row' => esc_html__('Left Image, Right Content', 'dnxte-divi-essential'),
                    'row-reverse' => esc_html__('Left Content, Right Image', 'dnxte-divi-essential'),
                ),
                'default' => 'column',
            ),
            'tooltip_text' => array(
                'label' => esc_html__('Tooltip Text', 'dnxte-divi-essential'),
                'type' => 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Input Tooltip text', 'dnxte-divi-essential'),
                'toggle_slug' => 'dnxte_tooltip_elements',
                'dynamic_content' => 'text',
            ),
            'tooltip_content' => array(
                'label' => esc_html__('Tooltip Content', 'dnxte-divi-essential'),
                'type'  => 'tiny_mce',
                'option_category' => 'basic_option',
                'description' => esc_html__('Tooltip Description goes here', 'dnxte-divi-essential'),
                'toggle_slug' => 'dnxte_tooltip_elements',
                'dynamic_content' => 'text'
            ),
			'tooltip_use_image' => array(
                'label' => esc_html__('Use Image', 'dnxte-divi-essential'),
                'type' => 'yes_no_button',
                'toggle_slug' => 'dnxte_tooltip_elements',
                'options' => array(
                    'on' => esc_html__('Yes', 'dnxte-divi-essential'),
                    'off' => esc_html__('No', 'dnxte-divi-essential'),
                ),
                'affects' => array(
					'tooltip_image',
					'tooltip_image_alt'
                ),
                'default_on_front' => 'off',
			),
			'tooltip_image' => array(
                'label' => esc_html__('Image', 'dnxte-divi-essential'),
                'type' => 'upload',
                'option_category' => 'basic_option',
                'upload_button_text' => esc_attr__('Upload an image', 'dnxte-divi-essential'),
                'choose_text' => esc_attr__('Choose an Image', 'dnxte-divi-essential'),
                'update_text' => esc_attr__('Set As Image', 'dnxte-divi-essential'),
                'description' => esc_html__('Upload an image to display at the top of your team person.', 'dnxte-divi-essential'),
                'toggle_slug' => 'dnxte_tooltip_elements',
                'dynamic_content' => 'image',
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'tooltip_image_alt' => array(
                'label' => esc_html__('Image Alt', 'dnxte-divi-essential'),
				'type' => 'text',
				'default' => 'tooltip text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Input image alt text', 'dnxte-divi-essential'),
                'toggle_slug' => 'dnxte_tooltip_elements',
                'dynamic_content' => 'text',
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'hotspot_horizontal' => array(
                'label' => esc_html__('Horizontal Position', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the position of hotspot.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_hotspot_settings',
                'allowed_units' => array('%','em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'default' => '50%',
                'default_unit' => '%',
                'default_on_front' => '50%',
                'allow_empty' => true,
                'range_settings' => array(
                    'min' => '0',
                    'max' => '100',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'hotspot_vertical' => array(
                'label' => esc_html__('Vertical Position', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the position of hotspot.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_hotspot_settings',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'default' => '20%',
                'default_unit' => '%',
                'default_on_front' => '20%',
                'allow_empty' => true,
                'range_settings' => array(
                    'min' => '0',
                    'max' => '100',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'hotspot_bg' => array(
                'label' => esc_html__('Background Color', 'dnxte-divi-essential'),
                'type' => 'color-alpha',
                'custom_color' => true,
                'default' => '',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_hotspot_settings',
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'hotspot_wave_color' => array(
                'label' => esc_html__('Wave Color', 'dnxte-divi-essential'),
                'type' => 'color-alpha',
                'custom_color' => true,
                'default' => '',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_hotspot_settings',
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'hotspot_icon_color' => array(
                'label' => esc_html__('Icon Color', 'dnxte-divi-essential'),
                'type' => 'color-alpha',
                'custom_color' => true,
                'default' => '#fff',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_hotspot_settings',
                'mobile_options' => true,
                'hover' => 'tabs',
                'show_if' => array(
                    'tooltip_use_hotspot_icon' => 'on',
                ),
            ),
            'hotspot_icon_size' => array(
                'label' => esc_html__('Icon Size', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the size of the icon.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_hotspot_settings',
                'allowed_units' => array('em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'default' => '22px',
                'default_unit' => 'px',
                'default_on_front' => '',
                'allow_empty' => true,
                'range_settings' => array(
                    'min' => '0',
                    'max' => '100',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'hover' => 'tabs',
                'show_if' => array(
                    'tooltip_use_hotspot_icon' => 'on',
                ),
            ),
            'tooltip_width' => array(
                'label' => esc_html__('Tooltip Width', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the width of tooltip.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_tooltip_settings',
                'allowed_units' => array('%','em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'default' => '200px',
                'default_unit' => 'px',
                'default_on_front' => '200px',
                'allow_empty' => true,
                'range_settings' => array(
                    'min' => '0',
                    'max' => '1000',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'tooltip_image_width' => array(
                'label' => esc_html__('Image Width', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the width of image.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_tooltip_image',
                'allowed_units' => array('%','em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'default' => '100%',
                'default_unit' => '%',
                'default_on_front' => '100%',
                'allow_empty' => true,
                'range_settings' => array(
                    'min' => '0',
                    'max' => '100',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'tooltip_image_vertical' => array(
                'label' => esc_html__('Image Position', 'dnxte-divi-essential'),
                'type' => 'select',
                'description' => esc_html__('Select the position of the Image', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_tooltip_image',
                'options' => array(
                    'flex-start' => esc_html__('Top/Left', 'dnxte-divi-essential'),
                    'center' => esc_html__('Center', 'dnxte-divi-essential'),
                    'flex-end' => esc_html__('Bottom/Right', 'dnxte-divi-essential'),
                ),
                'default' => 'center',
            ),
            'hotspot_padding' => array(
                'label' => esc_html__('Hotspot', 'dnxte-divi-essential'),
                'type' => 'custom_padding',
                'mobile_options' => true,
                'default' => '',
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'tooltip_padding' => array(
                'label' => esc_html__('Tooltip', 'dnxte-divi-essential'),
                'type' => 'custom_padding',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'tooltip_text_margin' => array(
                'label' => esc_html__('Tooltip Text Margin', 'dnxte-divi-essential'),
                'type' => 'custom_margin',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'tooltip_text_padding' => array(
                'label' => esc_html__('Tooltip Text Padding', 'dnxte-divi-essential'),
                'type' => 'custom_padding',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'tooltip_desc_margin' => array(
                'label' => esc_html__('Description Margin', 'dnxte-divi-essential'),
                'type' => 'custom_margin',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'tooltip_desc_padding' => array(
                'label' => esc_html__('Description Padding', 'dnxte-divi-essential'),
                'type' => 'custom_padding',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'tooltip_image_margin' => array(
                'label' => esc_html__('Tooltip Image Margin', 'dnxte-divi-essential'),
                'type' => 'custom_margin',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'tooltip_image_padding' => array(
                'label' => esc_html__('Tooltip Image Padding', 'dnxte-divi-essential'),
                'type' => 'custom_padding',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
        
        $multi_view = et_pb_multi_view_options($this);
        $tooltip_position = esc_attr__( $this->props['tooltip_position'], 'dnxte-divi-essential');
        $hotspot_text = "";
        if($multi_view->has_value('tooltip_hotspot_text')) {
            $hotspot_text = $multi_view->render_element(array(
                'tag' => 'span',
                'content' => '{{tooltip_hotspot_text}}',
                'attrs' => array(
                    'class' => 'dnxte-hostpot-hotspot__text'
                )
            ));
        }

        $hotspot_icon = "";
        if($this->props['tooltip_use_hotspot_icon'] === "on" && $multi_view->has_value('tooltip_hotspot_icon')) {
            $hotspot_icon = $multi_view->render_element(array(
                'tag' => 'span',
                'content' => esc_attr__(et_pb_process_font_icon($this->props['tooltip_hotspot_icon'])),
                'attrs' => array(
                    'class' => 'dnxte-hotspot_icon'
                )
            ));
        }

        $tooltip_text = "";
        if($multi_view->has_value('tooltip_text')) {
            $tooltip_text = $multi_view->render_element(array(
                'tag' => 'p',
                'content' => '{{tooltip_text}}',
                'attrs' => array(
                    'class' => 'dnxte_tooltip_text'
                ) 
            ));
        }

        $image = "";
        if($this->props['tooltip_use_image'] === 'on' && $multi_view->has_value('tooltip_image')) {
            $image = $multi_view->render_element(array(
                'tag' => 'img',
                'attrs' => array(
                    'src' => '{{tooltip_image}}',
                    'alt' => '{{tooltip_image_alt}}'
                ),
            ));

            $image = sprintf('<div class="dnxte-tooltip-image-container">%1$s</div>', $image);
        }

        $tooltip_content = "";
        if($multi_view->has_value('tooltip_content')) {
            $tooltip_content = $multi_view->render_element(array(
                'tag' => 'div',
                'content' => '{{tooltip_content}}',
                'attrs'   => array(
                    'class' => 'dnxte-tooltip-content'
                )
            ));
        }


        // Hotspot Position
        $hotspot_horizontal = $this->props['hotspot_horizontal'];
        $hotspot_horizontal_values = et_pb_responsive_options()->get_property_values($this->props, 'hotspot_horizontal');
        $hotspot_horizontal_tablet = isset($hotspot_horizontal_values['tablet']) ? $hotspot_horizontal_values['tablet'] : '';
        $hotspot_horizontal_phone = isset($hotspot_horizontal_values['phone']) ? $hotspot_horizontal_values['phone'] : '';
        $hotspot_horizontal_hover = $this->get_hover_value('hotspot_horizontal');

        $hotspot_vertical = $this->props['hotspot_vertical'];
        $hotspot_vertical_values = et_pb_responsive_options()->get_property_values($this->props, 'hotspot_vertical');
        $hotspot_vertical_tablet = isset($hotspot_vertical_values['tablet']) ? $hotspot_vertical_values['tablet'] : '';
        $hotspot_vertical_phone = isset($hotspot_vertical_values['phone']) ? $hotspot_vertical_values['phone'] : '';
        $hotspot_vertical_hover = $this->get_hover_value('hotspot_vertical');

        if ("" !== $hotspot_horizontal || "" !== $hotspot_vertical) {
            $hotspot_position_style = sprintf('left: %1$s;top: %2$s;', $hotspot_horizontal, $hotspot_vertical);
            $hotspot_position_style_tablet = sprintf('left: %1$s;top: %2$s;', esc_attr($hotspot_horizontal_tablet), $hotspot_vertical_tablet);

            $hotspot_position_style_phone = sprintf('left: %1$s;top: %2$s;', $hotspot_horizontal_phone, $hotspot_vertical_phone);
            $hotspot_position_style_hover = "";

            if (et_builder_is_hover_enabled('hotspot_horizontal', $this->props) || et_builder_is_hover_enabled('hotspot_vertical', $this->props)) {
                $hotspot_position_style_hover = sprintf('left: %1$s;top: %2$s;', $hotspot_horizontal_hover, $hotspot_vertical_hover);
            }

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%%.et_pb_module",
                'declaration' => $hotspot_position_style,
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%%.et_pb_module",
                'declaration' => $hotspot_position_style_tablet,
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%%.et_pb_module",
                'declaration' => $hotspot_position_style_phone,
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ));

            if ("" !== $hotspot_position_style_hover) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector' => $this->add_hover_to_order_class("%%order_class%%.et_pb_module:hover"),
                    'declaration' => $hotspot_position_style_hover,
                ));
            }
        }
        // Hotspot position end
         // Icon Settings
        $icon_color = $this->props['hotspot_icon_color'];
        $icon_color_values = et_pb_responsive_options()->get_property_values($this->props, 'hotspot_icon_color');
        $icon_color_tablet = isset($icon_color_values['tablet']) ? $icon_color_values['tablet'] : '';
        $icon_color_phone = isset($icon_color_values['phone']) ? $icon_color_values['phone'] : '';
        $icon_color_hover = $this->get_hover_value('hotspot_icon_color');
        
        $icon_size = $this->props['hotspot_icon_size'];
        $icon_size_values = et_pb_responsive_options()->get_property_values($this->props, 'hotspot_icon_size');
        $icon_size_tablet = isset($icon_size_values['tablet']) ? $icon_size_values['tablet'] : '';
        $icon_size_phone = isset($icon_size_values['phone']) ? $icon_size_values['phone'] : '';
        $icon_size_hover = $this->get_hover_value('hotspot_icon_size');

        if ("" !== $icon_color || "" !== $icon_size) {
            $icon_style = sprintf('color: %1$s !important;font-size:%2$s !important;', $icon_color, $icon_size);
            $icon_style_tablet = sprintf('color: %1$s !important;font-size: %2$s !important;', $icon_color_tablet, $icon_size_tablet);
            $icon_style_phone = sprintf('color: %1$s !important;font-size: %2$s !important;', $icon_color_phone, $icon_size_phone);
            $icon_style_hover = "";

            if (et_builder_is_hover_enabled('hotspot_icon_color', $this->props)) {
                $icon_style_hover = sprintf('color: %1$s !important;font-size: %2$s !important;', $icon_color_hover, $icon_size_hover);
            }

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-hotspot_icon",
                'declaration' => $icon_style,
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-hotspot_icon",
                'declaration' => $icon_style_tablet,
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-hotspot_icon",
                'declaration' => $icon_style_phone,
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ));

            if ("" !== $icon_style_hover) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector' => $this->add_hover_to_order_class("%%order_class%% .dnxte-hotspot_icon:hover"),
                    'declaration' => $icon_style_hover,
                ));
            }
        }
        // Icon Settings

        // Hotspot background color
        $hotspot_bg = $this->props['hotspot_bg'];
        $hotspot_bg_values = et_pb_responsive_options()->get_property_values($this->props, 'hotspot_bg');
        $hotspot_bg_tablet = isset($hotspot_bg_values['tablet']) ? $hotspot_bg_values['tablet'] : '';
        $hotspot_bg_phone = isset($hotspot_bg_values['phone']) ? $hotspot_bg_values['phone'] : '';
        $hotspot_bg_hover = $this->get_hover_value('hotspot_bg');

        if ("" !== $hotspot_bg) {
            $hotspot_bg_style = sprintf('background-color: %1$s !important;', esc_attr__($hotspot_bg, 'dnxte-divi-essential'));
            $hotspot_bg_style_tablet = sprintf('background-color: %1$s !important;', esc_attr__($hotspot_bg_tablet, 'dnxte-divi-essential'));
            $hotspot_bg_style_phone = sprintf('background-color: %1$s !important;', esc_attr__($hotspot_bg_phone, 'dnxte-divi-essential'));
            $hotspot_bg_style_hover = "";

            if (et_builder_is_hover_enabled('hotspot_bg', $this->props)) {
                $hotspot_bg_style_hover = sprintf('background-color: %1$s !important;', esc_attr__($hotspot_bg_hover, 'dnxte-divi-essential'));
            }

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-hostpot-hotspots__wrapper",
                'declaration' => $hotspot_bg_style,
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-hostpot-hotspots__wrapper",
                'declaration' => $hotspot_bg_style_tablet,
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-hostpot-hotspots__wrapper",
                'declaration' => $hotspot_bg_style_phone,
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ));

            if ("" !== $hotspot_bg_style_hover) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector' => $this->add_hover_to_order_class("%%order_class%% .dnxte-hostpot-hotspots__wrapper:hover"),
                    'declaration' => $hotspot_bg_style_hover,
                ));
            }
        }
        // Hotspot background color end

        // Hotspot background color
        $hotspot_wave_color = $this->props['hotspot_wave_color'];
        $hotspot_wave_color_values = et_pb_responsive_options()->get_property_values($this->props, 'hotspot_wave_color');
        $hotspot_wave_color_tablet = isset($hotspot_wave_color_values['tablet']) ? $hotspot_wave_color_values['tablet'] : '';
        $hotspot_wave_color_phone = isset($hotspot_wave_color_values['phone']) ? $hotspot_wave_color_values['phone'] : '';
        $hotspot_wave_color_hover = $this->get_hover_value('hotspot_wave_color');

        if ("" !== $hotspot_wave_color) {
            $hotspot_wave_color_style = sprintf('background-color: %1$s !important;', esc_attr__($hotspot_wave_color, 'dnxte-divi-essential'));
            $hotspot_wave_color_style_tablet = sprintf('background-color: %1$s !important;', esc_attr__($hotspot_wave_color_tablet, 'dnxte-divi-essential'));
            $hotspot_wave_color_style_phone = sprintf('background-color: %1$s !important;', esc_attr__($hotspot_wave_color_phone, 'dnxte-divi-essential'));
            $hotspot_wave_color_style_hover = "";

            if (et_builder_is_hover_enabled('hotspot_wave_color', $this->props)) {
                $hotspot_wave_color_style_hover = sprintf('background-color: %1$s !important;', esc_attr__($hotspot_wave_color_hover, 'dnxte-divi-essential'));
            }

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-hostpot-hotspots__wrapper:before",
                'declaration' => $hotspot_wave_color_style,
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-hostpot-hotspots__wrapper:before",
                'declaration' => $hotspot_wave_color_style_tablet,
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-hostpot-hotspots__wrapper:before",
                'declaration' => $hotspot_wave_color_style_phone,
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ));

            if ("" !== $hotspot_wave_color_style_hover) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector' => $this->add_hover_to_order_class("%%order_class%% .dnxte-hostpot-hotspots__wrapper:hover::before"),
                    'declaration' => $hotspot_wave_color_style_hover,
                ));
            }
        }
        // Hotspot background color end

        // Tooltip background color
        $tooltip_bg = $this->props['tooltip_bg'];
        $tooltip_bg_values = et_pb_responsive_options()->get_property_values($this->props, 'tooltip_bg');
        $tooltip_bg_tablet = isset($tooltip_bg_values['tablet']) ? $tooltip_bg_values['tablet'] : '';
        $tooltip_bg_phone = isset($tooltip_bg_values['phone']) ? $tooltip_bg_values['phone'] : '';
        $tooltip_bg_hover = $this->get_hover_value('tooltip_bg');

        if ("" !== $tooltip_bg) {
            $tooltip_bg_style = sprintf('background-color: %1$s !important;', esc_attr__($tooltip_bg, 'dnxte-divi-essential'));
            $tooltip_bg_style_tablet = sprintf('background-color: %1$s !important;', esc_attr__($tooltip_bg_tablet, 'dnxte-divi-essential'));
            $tooltip_bg_style_phone = sprintf('background-color: %1$s !important;', esc_attr__($tooltip_bg_phone, 'dnxte-divi-essential'));
            $tooltip_bg_style_hover = "";

            if (et_builder_is_hover_enabled('tooltip_bg', $this->props)) {
                $tooltip_bg_style_hover = sprintf('background-color: %1$s !important;', esc_attr__($tooltip_bg_hover, 'dnxte-divi-essential'));
            }

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-hostpot-tooltip-text",
                'declaration' => $tooltip_bg_style,
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-hostpot-tooltip-text",
                'declaration' => $tooltip_bg_style_tablet,
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-hostpot-tooltip-text",
                'declaration' => $tooltip_bg_style_phone,
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ));

            if ("" !== $tooltip_bg_style_hover) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector' => $this->add_hover_to_order_class("%%order_class%% .dnxte-hostpot-tooltip-text:hover"),
                    'declaration' => $tooltip_bg_style_hover,
                ));
            }
        }
        // Tooltip background color end

        // Tooltip triangle background color
        $tooltip_triangle_bg = $this->props['tooltip_bg'];
        $tooltip_triangle_bg_values = et_pb_responsive_options()->get_property_values($this->props, 'tooltip_bg');
        $tooltip_triangle_bg_tablet = isset($tooltip_triangle_bg_values['tablet']) ? $tooltip_triangle_bg_values['tablet'] : '';
        $tooltip_triangle_bg_phone = isset($tooltip_triangle_bg_values['phone']) ? $tooltip_triangle_bg_values['phone'] : '';
        $tooltip_triangle_bg_hover = $this->get_hover_value('tooltip_bg');

        if ("" !== $tooltip_triangle_bg) {
            $tooltip_triangle_bg_style = sprintf('border-color: %1$s transparent transparent transparent !important;', esc_attr__($tooltip_triangle_bg, 'dnxte-divi-essential'));
            $tooltip_triangle_bg_style_tablet = sprintf('border-color: %1$s transparent transparent transparent !important;', esc_attr__($tooltip_triangle_bg_tablet, 'dnxte-divi-essential'));
            $tooltip_triangle_bg_style_phone = sprintf('border-color: %1$s transparent transparent transparent !important;', esc_attr__($tooltip_triangle_bg_phone, 'dnxte-divi-essential'));
            $tooltip_triangle_bg_style_hover = "";

            if (et_builder_is_hover_enabled('tooltip_triangle_bg', $this->props)) {
                $tooltip_triangle_bg_style_hover = sprintf('border-color: %1$s transparent transparent transparent !important;', esc_attr__($tooltip_triangle_bg_hover, 'dnxte-divi-essential'));
            }

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-hostpot-tooltip-text:after",
                'declaration' => $tooltip_triangle_bg_style,
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-hostpot-tooltip-text:after",
                'declaration' => $tooltip_triangle_bg_style_tablet,
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-hostpot-tooltip-text:after",
                'declaration' => $tooltip_triangle_bg_style_phone,
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ));

            if ("" !== $tooltip_triangle_bg_style_hover) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector' => $this->add_hover_to_order_class("%%order_class%% .dnxte-hostpot-tooltip-text:hover::after"),
                    'declaration' => $tooltip_triangle_bg_style_hover,
                ));
            }
        }
        // Tooltip triangle background color end

        // Tooltip Width
        $tooltip_width = $this->props['tooltip_width'];
        $tooltip_width_values = et_pb_responsive_options()->get_property_values($this->props, 'tooltip_width');
        $tooltip_width_tablet = isset($tooltip_width_values['tablet']) ? $tooltip_width_values['tablet'] : '';
        $tooltip_width_phone = isset($tooltip_width_values['phone']) ? $tooltip_width_values['phone'] : '';
        $tooltip_width_hover = $this->get_hover_value('tooltip_width');

        if ("" !== $tooltip_width) {
            $tooltip_width_style = sprintf('width: %1$s;', esc_attr__($tooltip_width, 'dnxte-divi-essential'));
            $tooltip_width_style_tablet = sprintf('width: %1$s;', esc_attr__($tooltip_width_tablet, 'dnxte-divi-essential'));

            $tooltip_width_style_phone = sprintf('width: %1$s;', esc_attr__($tooltip_width_phone, 'dnxte-divi-essential'));
            $tooltip_width_style_hover = "";

            if (et_builder_is_hover_enabled('tooltip_width', $this->props)) {
                $tooltip_width_style_hover = sprintf('width: %1$s;', esc_attr__($tooltip_width_hover, 'dnxte-divi-essential'));
            }

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-hostpot-tooltip-text",
                'declaration' => $tooltip_width_style,
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-hostpot-tooltip-text",
                'declaration' => $tooltip_width_style_tablet,
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-hostpot-tooltip-text",
                'declaration' => $tooltip_width_style_phone,
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ));

            if ("" !== $tooltip_width_style_hover) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector' => $this->add_hover_to_order_class("%%order_class%% .dnxte-hostpot-tooltip-text:hover"),
                    'declaration' => $tooltip_width_style_hover,
                ));
            }
        }
        // Tooltip width end

        // Tooltip Layout
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => "%%order_class%% .dnxte-hostpot-tooltip-text",
            'declaration' => sprintf('flex-direction: %1$s;', $this->props['tooltip_layout']),
        ));
        // Tooltip Layout end

        // Image Position
        if(in_array($this->props['tooltip_layout'], array("row", "row-reverse"))) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-tooltip-image-container",
                'declaration' => sprintf('align-self: %1$s;', $this->props['tooltip_image_vertical']),
            ));
        }else{
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-tooltip-image-container",
                'declaration' => sprintf('justify-content: %1$s;', $this->props['tooltip_image_vertical']),
            ));
        }
        // Image Position end

        // Image Width
        $tooltip_image_width = $this->props['tooltip_image_width'];
        $tooltip_image_width_hover = $this->get_hover_value('tooltip_image_width');
        $tooltip_image_width_tablet = $this->props['tooltip_image_width_tablet'];
        $tooltip_image_width_phone = $this->props['tooltip_image_width_phone'];
        $tooltip_image_width_last_edited = $this->props['tooltip_image_width_last_edited'];

        if ('' !== $tooltip_image_width) {
            $tooltip_image_width_responsive_active = et_pb_get_responsive_status($tooltip_image_width_last_edited);

            $tooltip_image_width_values = array(
                'desktop' => $tooltip_image_width,
                'tablet' => $tooltip_image_width_responsive_active ? $tooltip_image_width_tablet : '',
                'phone' => $tooltip_image_width_responsive_active ? $tooltip_image_width_phone : '',
            );
            $tooltip_image_width_selector = "%%order_class%% .dnxte-tooltip-image-container";
            et_pb_responsive_options()->generate_responsive_css($tooltip_image_width_values, $tooltip_image_width_selector, 'width', $render_slug);

            if (et_builder_is_hover_enabled('tooltip_image_width', $this->props)) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector' => $this->add_hover_to_order_class('%%order_class%% .dnxte-tooltip-image-container'),
                    'declaration' => sprintf(
                        'width: %1$s;',
                        esc_html__($tooltip_image_width_hover, 'dnxte-divi-essential')
                    ),
                ));
            }
        }
        // Image width end

        // Tooltip Position
        if($this->props['tooltip_position'] === "bottom") {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-hostpot-tooltip-text",
                'declaration' => sprintf('position: relative !important;'),
            ));
        }

        if($this->props['tooltip_position'] !== "bottom") {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-hostpot-tooltip-text",
                'declaration' => sprintf('position: absolute !important;'),
            ));
        }


        $this->apply_css( $render_slug );
        return sprintf('
            <div class="dnxte-hostpot-hotspot">
                <div class="dnxte-hostpot-tooltip">
                <div class="dnxte-hostpot-tooltip-item tooltip-%5$s">
                    <div class="dnxte-hostpot-tooltip-content">
                    <div class="dnxte-hostpot-hotspots__wrapper">
                        %1$s
                        %4$s
                    </div>
                    </div>
                    <div class="dnxte-hostpot-tooltip-text">
                    %2$s
                    <div class="dnxte-tooltip-content-container">
                        %3$s
                        %6$s
                    </div>
                    </div>
                </div>
                </div>
            </div>
        ', 
        $hotspot_text,
        $image,
        $tooltip_text,
        $hotspot_icon,
        $tooltip_position,
        $tooltip_content
    );
    }
    
    public function apply_css( $render_slug ) {
        Common::dnxt_set_style($render_slug, $this->props, "hotspot_padding", "%%order_class%% .dnxte-hostpot-hotspots__wrapper", "padding", true);
        Common::dnxt_set_style($render_slug, $this->props, "tooltip_padding", "%%order_class%% .dnxte-hostpot-tooltip-text", "padding", true);

        Common::dnxt_set_style($render_slug, $this->props, "tooltip_text_margin", "%%order_class%% .dnxte_tooltip_text", "margin", true);
        Common::dnxt_set_style($render_slug, $this->props, "tooltip_text_padding", "%%order_class%% .dnxte_tooltip_text", "padding", true);

        Common::dnxt_set_style($render_slug, $this->props, "tooltip_desc_margin", "%%order_class%% .dnxte-tooltip-content", "margin", true);
        Common::dnxt_set_style($render_slug, $this->props, "tooltip_desc_padding", "%%order_class%% .dnxte-tooltip-content", "padding", true);

        Common::dnxt_set_style($render_slug, $this->props, "tooltip_image_margin", "%%order_class%% .dnxte-tooltip-image-container", "margin", true);
        Common::dnxt_set_style($render_slug, $this->props, "tooltip_image_padding", "%%order_class%% .dnxte-tooltip-image-container", "padding", true);
        
    }
}

new DiviNextTooltipChild;
