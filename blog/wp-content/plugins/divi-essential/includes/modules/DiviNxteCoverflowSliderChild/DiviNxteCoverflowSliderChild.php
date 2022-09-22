<?php
include_once(WP_PLUGIN_DIR.'/divi-essential/includes/modules/base/Common.php');

class Divi_NxteCoverflowSliderChild extends ET_Builder_Module
{
    public $slug = 'dnxte_coverflowslider_child';
    public $vb_support = 'on';
    public $type = 'child';
    public $child_title_var = 'title';
    public $child_title_fallback_var = 'coverflowslider_alt';

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-coverflow-slider/',
        'author' => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

    public function init()
    {
        $this->name = esc_html__('Coverflow slider item', 'dnxte-divi-essential');

        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'coverflowslider_content_toggle' => esc_html__('Slider Elements', 'dnxte-divi-essential'),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'coverflowslider_text_settings' => esc_html__('Heading Settings', 'dnxte-divi-essential'),
                    'coverflowslider_content_settings' => esc_html__('Content Settings', 'dnxte-divi-essential')
                )
            )
        );

        $this->custom_css_fields = array(
            'image' => array(
                'label' => esc_html__('Image', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .img-fluid',
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
    public function get_advanced_fields_config()
    {
        return array(
            'text' => false,
            'fonts' => array(
                'header' => array(
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-coverflow-heading',
                        'important' => 'all'
                    ),
                    'header_level' => array(
                        'default' => 'h3'
                    ),
                    'toggle_slug' => 'coverflowslider_text_settings',
                    'tab_slug' => 'advanced'
                ),
                'content' => array(
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-coverflow-pra',
                        'important' => 'all'
                    ),
                    'toggle_slug' => 'coverflowslider_content_settings',
                    'tab_slug' => 'advanced'
                )
            ),
            'max_width' => false,
            'borders' => array(
                'default' => array(
                    'css' => array(
                        'main' => array(
                            "border_radii" => "%%order_class%% .img-fluid",
                            'border_styles' => '%%order_class%% .img-fluid',
                        ),
                        'important' => 'all',
                    ),
                ),
                'text' => array(
                    'css' => array(
                        'main' => array(
                            "border_radii" => "%%order_class%% .dnxte-coverflow-heading",
                            'border_styles' => '%%order_class%% .dnxte-coverflow-heading',
                        ),
                        'important' => 'all',
                    ),
                    'toggle_slug' => 'coverflowslider_text_settings'
                ),
                'content' => array(
                    'css' => array(
                        'main' => array(
                            "border_radii" => "%%order_class%% .dnxte-coverflow-pra",
                            'border_styles' => '%%order_class%% .dnxte-coverflow-pra',
                        ),
                        'important' => 'all',
                    ),
                    'toggle_slug' => 'coverflowslider_content_settings'
                )
            ),
            'box_shadow' => array(
                'default' => array(
                    'css' => array(
                        'main' => '%%order_class%% .img-fluid',
                        'important' => 'all',
                    ),
                ),
                'text' => array(
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-coverflow-heading',
                        'important' => 'all',
                    ),
                    'toggle_slug' => 'coverflowslider_text_settings'
                ),
                'content' => array(
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-coverflow-pra',
                        'important' => 'all',
                    ),
                    'toggle_slug' => 'coverflowslider_content_settings'
                ),
            ),
            'margin_padding' => array(
                'css' => array(
                    'main' => '%%order_class%% .dnxte-coverflowslider-item',
                ),
                'important' => 'all',
            ),
            'background' => array(
                'settings' => array(
                    'color' => 'alpha',
                ),
                'css' => array(
                    'main' => "%%order_class%% .dnxte-coverflowslider-item",
                    'important' => 'all',
                ),
            ),
        );
    }

    public function get_fields()
    {
        return array(
            'coverflowslider_layouts' => array(
                'label' => esc_html__('Select Layout', 'dnxte-divi-essential'),
                'type' => 'select',
                'description' => esc_html__('Select the layouts', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'toggle_slug' => 'coverflowslider_content_toggle',
                'options' => array(
                    'image' => esc_html__('Image', 'dnxte-divi-essential'),
                    'text'  => esc_html__('Text', 'dnxte-divi-essential'),
                    'inside-image' => esc_html__('Text Inside The Image', 'dnxte-divi-essential'),
                    'below-image' => esc_html__('Text Below The Image', 'dnxte-divi-essential'),
                ),
                'default' => 'image',
            ),
            'coverflowslider_text' => array(
                'label' => esc_html__('Heading', 'dnxte-divi-essential'),
                'type' => 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Text entered here will appear as title.', 'dnxte-divi-essential'),
                'toggle_slug' => 'coverflowslider_content_toggle',
                'show_if_not'   => array(
                    'coverflowslider_layouts' => 'image'
                )
            ),
            'coverflowslider_content' => array(
                'label' => esc_html__('Content', 'dnxte-divi-essential'),
                'type' => 'tiny_mce',
                'option_category' => 'basic_option',
                'description' => esc_html__('Input the main text content for your module here.', 'dnxte-divi-essential'),
                'toggle_slug' => 'coverflowslider_content_toggle',
                'show_if_not'   => array(
                    'coverflowslider_layouts' => 'image'
                )
            ),
            'coverflowslider_image' => array(
                'label' => esc_html__('Image', 'dnxte-divi-essential'),
                'type' => 'upload',
                'option_category' => 'basic_option',
                'upload_button_text' => esc_attr__('Upload an image', 'dnxte-divi-essential'),
                'choose_text' => esc_attr__('Choose an Image', 'dnxte-divi-essential'),
                'update_text' => esc_attr__('Set As Image', 'dnxte-divi-essential'),
                'description' => esc_html__('Upload an image to display at the top of your blurb.', 'dnxte-divi-essential'),
                'toggle_slug' => 'coverflowslider_content_toggle',
                'data_type' => 'image',
                'mobile_options' => true,
            ),
            'coverflowslider_alt' => array(
                'label' => esc_html__('Image Alt', 'dnxte-divi-essential'),
                'type' => 'text',
                'default' => 'Image Item',
                'option_category' => 'basic_option',
                'description' => esc_html__('Text entered here will appear as title.', 'dnxte-divi-essential'),
                'toggle_slug' => 'coverflowslider_content_toggle',
            ),
            'coverflowslider_content_horizontal' => array(
                'label' => esc_html__('Horizontal Position', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the position of the offer.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'coverflowslider_content_settings',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'default' => '0%',
                'default_unit' => '%',
                'default_on_front' => '0%',
                'allow_empty' => true,
                'range_settings' => array(
                    'min' => '0',
                    'max' => '100',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'show_if' => array(
                    'coverflowslider_layouts' => 'inside-image'
                )
            ),
            'coverflowslider_content_vertical' => array(
                'label' => esc_html__('Vertical Position', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the position of the offer.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'coverflowslider_content_settings',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'default' => '0%',
                'default_unit' => '%',
                'default_on_front' => '0%',
                'allow_empty' => true,
                'range_settings' => array(
                    'min' => '0',
                    'max' => '100',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'show_if' => array(
                    'coverflowslider_layouts' => 'inside-image'
                )
            ),
            'coverflowslider_text_margin'	=> array(
				'label'           		=> esc_html__('Heading Margin', 'dnxte-divi-essential'),
                'type'            		=> 'custom_margin',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
				'toggle_slug'     		=> 'margin_padding', 
            ),
            'coverflowslider_text_padding'	=> array(
				'label'           		=> esc_html__('Heading Padding', 'dnxte-divi-essential'),
                'type'            		=> 'custom_padding',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
				'toggle_slug'     		=> 'margin_padding', 
            ),
            'coverflowslider_content_margin'	=> array(
				'label'           		=> esc_html__('Content Margin', 'dnxte-divi-essential'),
                'type'            		=> 'custom_margin',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
				'toggle_slug'     		=> 'margin_padding', 
            ),
            'coverflowslider_content_padding'	=> array(
				'label'           		=> esc_html__('Content Padding', 'dnxte-divi-essential'),
                'type'            		=> 'custom_padding',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
				'toggle_slug'     		=> 'margin_padding', 
            ),
            'coverflowslider_image_margin'	=> array(
				'label'           		=> esc_html__('Image Margin', 'dnxte-divi-essential'),
                'type'            		=> 'custom_margin',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
				'toggle_slug'     		=> 'margin_padding', 
            ),
            'coverflowslider_image_padding'	=> array(
				'label'           		=> esc_html__('Image Padding', 'dnxte-divi-essential'),
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

    public function render($attrs, $content = null, $render_slug)
    {   
        $multi_view = et_pb_multi_view_options($this);
        $coverflowslider_content = $this->props['coverflowslider_content'];

        $multitext_class ="";

        if($this->props['coverflowslider_layouts'] === "inside-image") {
            $multitext_class = "dnxte-coverflow-inside-image";
        }
        $title = "";
        if($multi_view->has_value('coverflowslider_text')) {
            $title = $multi_view->render_element(array(
                'tag' => et_pb_process_header_level($this->props['header_level'], 'h3'),
                'content' => '{{coverflowslider_text}}',
                'attrs' => array(
                    'class' => 'dnxte-coverflow-heading'
                )
            ));
        }

        $image = "";
        if($this->props['coverflowslider_image'] !== "" && $this->props['coverflowslider_layouts'] !== 'text') {
            $image = sprintf('<img src="%1$s" alt="%2$s" class="img-fluid"/>', $this->props['coverflowslider_image'], esc_attr($this->props['coverflowslider_alt']));
        }

        $description = $multi_view->render_element( array(
            'tag' => 'div',
            'content' => '{{coverflowslider_content}}',
            'attrs' => array(
            'class' => 'dnxte-coverflow-pra',
            )
            ));
    

        if($this->props['coverflowslider_layouts'] === 'inside-image' || $this->props['coverflowslider_layouts'] === 'text') {
            // Content Position
            $content_horizontal = $this->props['coverflowslider_content_horizontal'];
            $content_horizontal_values = et_pb_responsive_options()->get_property_values($this->props, 'coverflowslider_content_horizontal');
            $content_horizontal_tablet = isset($content_horizontal_values['tablet']) ? $content_horizontal_values['tablet'] : '';
            $content_horizontal_phone = isset($content_horizontal_values['phone']) ? $content_horizontal_values['phone'] : '';

            $content_vertical = $this->props['coverflowslider_content_vertical'];
            $content_vertical_values = et_pb_responsive_options()->get_property_values($this->props, 'coverflowslider_content_vertical');
            $content_vertical_tablet = isset($content_vertical_values['tablet']) ? $content_vertical_values['tablet'] : '';
            $content_vertical_phone = isset($content_vertical_values['phone']) ? $content_vertical_values['phone'] : '';

            if ("" !== $content_horizontal || "" !== $content_vertical) {
                $content_position_style = sprintf('left: %1$s;top: %2$s;', $content_horizontal, $content_vertical);
                $content_position_style_tablet = sprintf('left: %1$s;top: %2$s;', esc_attr($content_horizontal_tablet), $content_vertical_tablet);

                $content_position_style_phone = sprintf('left: %1$s;top: %2$s;', $content_horizontal_phone, $content_vertical_phone);
                $content_position_style_hover = "";

                ET_Builder_Element::set_style($render_slug, array(
                    'selector' => "%%order_class%% .dnxte-coverflow-inside-image",
                    'declaration' => $content_position_style,
                ));

                ET_Builder_Element::set_style($render_slug, array(
                    'selector' => "%%order_class%% .dnxte-coverflow-inside-image",
                    'declaration' => $content_position_style_tablet,
                    'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
                ));

                ET_Builder_Element::set_style($render_slug, array(
                    'selector' => "%%order_class%% .dnxte-coverflow-inside-image",
                    'declaration' => $content_position_style_phone,
                    'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
                ));
            }
            // Content position end
        }

        $output = sprintf(
            '%1$s
            <div class="dnxte-coverflow-multitext %4$s">
                %2$s
                %3$s
            </div>',
            $image,
            $title,
            $description,
            $multitext_class
        );

        $this->apply_css($render_slug);
        return $output;
    }

    public function apply_css($render_slug){

        /**
         * Custom Padding Margin Output
         *
        */
        Common::dnxt_set_style($render_slug, $this->props, "coverflowslider_text_margin", "%%order_class%% .dnxte-coverflow-heading", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "coverflowslider_text_padding", "%%order_class%% .dnxte-coverflow-heading", "padding");
        
        Common::dnxt_set_style($render_slug, $this->props, "coverflowslider_content_margin", "%%order_class%% .dnxte-coverflow-pra", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "coverflowslider_content_padding", "%%order_class%% .dnxte-coverflow-pra", "padding");

        Common::dnxt_set_style($render_slug, $this->props, "coverflowslider_image_margin", "%%order_class%% .img-fluid", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "coverflowslider_image_padding", "%%order_class%% .img-fluid", "padding");

    }
}

new Divi_NxteCoverflowSliderChild;
