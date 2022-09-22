<?php
include_once(WP_PLUGIN_DIR.'/divi-essential/includes/modules/base/Common.php');

class Divi_NxteFeatureList extends ET_Builder_Module
{

    public $slug = 'dnxte_feature_list_parent';
    public $vb_support = 'on';
    public $child_slug = 'dnxte_feature_list_child';

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-feature-list/',
        'author' => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

    public function init()
    {
        $this->name = esc_html__('Next Feature List', 'dnxte-divi-essential');
        $this->icon_path = plugin_dir_path(__FILE__) . 'icon.svg';

        $this->settings_modal_toggles = array(
            'advanced' => array(
                'toggles' => array(
                    'dnxte_feature_list_icon_settings' => esc_html__('Icon Settings', 'dnxte-divi-essential'),
                    'dnxte_feature_list_title_settings' => esc_html__('Title Settings', 'dnxte-divi-essential'),
                    'dnxte_feature_list_image_settings' => esc_html__('Image Settings', 'dnxte-divi-essential'),
                ),
            ),
        );

        $this->custom_css_fields = array(
            'feature_list_icon' => array(
                'label' => esc_html__('Icon/Number', 'dnxte-divi-essential'),
                'selector' => "%%order_class%% .dnxte-feature-list-img i, %%order_class%% .dnxte-feature-list-img .dnxte-feature-list-numb",
            ),
            'feature_list_image' => array(
                'label' => esc_html__('Image', 'dnxte-divi-essential'),
                'selector' => "%%order_class%% .dnxte-feature-list-img img",
            ),
            'feature_list_title' => array(
                'label' => esc_html__('Title', 'dnxte-divi-essential'),
                'selector' => "%%order_class%% .dnxte-feature-list-content",
            ),
        );
    }

    public function get_advanced_fields_config()
    {
        return array(
            'text' => false,
            'fonts' => array(
                'title' => array(
                    'label' => esc_html__('Title', 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-feature-list-content',
                    ),
                    'toggle_slug' => 'dnxte_feature_list_title_settings',
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
                'icon' => array(
                    'label_prefix' => esc_html__('Icon', 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% .dnxte-feature-list-img i, %%order_class%% .dnxte-feature-list-img .dnxte-feature-list-numb",
                            'border_styles' => "%%order_class%% .dnxte-feature-list-img i, %%order_class%% .dnxte-feature-list-img .dnxte-feature-list-numb",
                        ),
                    ),
                    'toggle_slug' => 'dnxte_feature_list_icon_settings',
                ),
                'title' => array(
                    'label_prefix' => esc_html__('Title', 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% .dnxte-feature-list-content",
                            'border_styles' => "%%order_class%% .dnxte-feature-list-content",
                        ),
                    ),
                    'toggle_slug' => 'dnxte_feature_list_title_settings',
                ),
                'image' => array(
                    'label_prefix' => esc_html__('Image', 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% .dnxte-feature-list-img img",
                            'border_styles' => "%%order_class%% .dnxte-feature-list-img img",
                        ),
                    ),
                    'toggle_slug' => 'dnxte_feature_list_image_settings',
                ),
            ),
            'box_shadow' => array(
                'icon' => array(
                    'label' => esc_html__('Icon Box Shadow', 'dnxte-divi-essential'),
                    'option_category' => 'layout',
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_feature_list_icon_settings',
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-feature-list-img i, %%order_class%% .dnxte-feature-list-img .dnxte-feature-list-numb',
                        'custom_style' => true,
                    ),
                    'default_on_fronts' => array(
                        'color' => '',
                        'position' => '',
                    ),
                ),
                'title' => array(
                    'label' => esc_html__('Title Box Shadow', 'dnxte-divi-essential'),
                    'option_category' => 'layout',
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_feature_list_title_settings',
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-feature-list-content',
                        'custom_style' => true,
                    ),
                    'default_on_fronts' => array(
                        'color' => '',
                        'position' => '',
                    ),
                ),
                'image' => array(
                    'label' => esc_html__('Image Box Shadow', 'dnxte-divi-essential'),
                    'option_category' => 'layout',
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_feature_list_image_settings',
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-feature-list-img img',
                        'custom_style' => true,
                    ),
                    'default_on_fronts' => array(
                        'color' => '',
                        'position' => '',
                    ),
                ),
            ),
            'filters' => array(
                'css' => array(
                    'main' => '%%order_class%%',
                ),
                'child_filters_target' => array(
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_feature_list_image_settings',
                ),
                'image' => array(
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-feature-list-img',
                    ),
                ),
            ),
        );
    }

    public function get_fields()
    {
        return array(
            'dnxte_feature_list_icon_position' => array(
                'label' => esc_html__('Position', 'dnxte-divi-essential'),
                'type' => 'select',
                'option_category' => 'configuration',
                'options' => array(
                    'dnxte-feature-list-top-img' => esc_html__('Top', 'dnxte-divi-essential'),
                    'dnxte-feature-list-bttom-img' => esc_html__('Bottom', 'dnxte-divi-essential'),
                    'left' => esc_html__('Left', 'dnxte-divi-essential'),
                    'dnxte-feature-list-right-img' => esc_html__('Right', 'dnxte-divi-essential'),
                ),
                'default' => 'left',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_feature_list_icon_settings',
            ),
            'dnxte_feature_list_icon_color' => array(
                'label' => esc_html__('Icon Color', 'dnxte-divi-essential'),
                'description' => esc_html__('Select the color of the icon.', 'dnxte-divi-essential'),
                'type' => 'color-alpha',
                'custom_color' => true,
                'default' => '#e2498a',
                'default_on_front' => '#e2498a',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_feature_list_icon_settings',
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'dnxte_feature_list_icon_bg_color' => array(
                'label' => esc_html__('Icon Background Color', 'dnxte-divi-essential'),
                'description' => esc_html__('Select the background color of the icon.', 'dnxte-divi-essential'),
                'type' => 'color-alpha',
                'custom_color' => true,
                'default' => 'transparent',
                'default_on_front' => '',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_feature_list_icon_settings',
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'dnxte_feature_list_image_bg_color' => array(
                'label' => esc_html__('Image Background Color', 'dnxte-divi-essential'),
                'description' => esc_html__('Select the background color of the image.', 'dnxte-divi-essential'),
                'type' => 'color-alpha',
                'custom_color' => true,
                'default' => 'transparent',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_feature_list_image_settings',
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'dnxte_feature_list_image_size' => array(
                'label' => esc_html__('Image Width', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the width of the image.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_feature_list_image_settings',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'default' => '20px',
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
            ),
            'dnxte_feature_list_icon_size' => array(
                'label' => esc_html__('Icon Size', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the size of the icon.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_feature_list_icon_settings',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'default' => '12px',
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
            ),
            'dnxte_feature_list_item_margin' => array(
                'label' => esc_html__('Item Margin', 'dnxte-divi-essential'),
                'type' => 'custom_margin',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'dnxte_feature_list_item_padding' => array(
                'label' => esc_html__('Item Padding', 'dnxte-divi-essential'),
                'type' => 'custom_padding',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'dnxte_feature_list_icon_padding' => array(
                'label' => esc_html__('Icon Padding', 'dnxte-divi-essential'),
                'type' => 'custom_padding',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'dnxte_feature_list_image_padding' => array(
                'label' => esc_html__('Image Padding', 'dnxte-divi-essential'),
                'type' => 'custom_padding',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'dnxte_feature_list_title_padding' => array(
                'label' => esc_html__('Title Padding', 'dnxte-divi-essential'),
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

    public function render($attrs, $content = null, $render_slug)
    {
        $content = $this->content;

        
        $child_hue_rotate = esc_attr__($this->props['child_filter_hue_rotate'], 'dnxte-divi-essential');
        $child_saturate = esc_attr__($this->props['child_filter_saturate'], 'dnxte-divi-essential');
        $child_brightness = esc_attr__($this->props['child_filter_brightness'], 'dnxte-divi-essential');
        $child_contrast = esc_attr__($this->props['child_filter_contrast'], 'dnxte-divi-essential');
        $child_invert = esc_attr__($this->props['child_filter_invert'], 'dnxte-divi-essential');
        $child_sepia = esc_attr__($this->props['child_filter_sepia'], 'dnxte-divi-essential');
        $child_opacity = esc_attr__($this->props['child_filter_opacity'], 'dnxte-divi-essential');
        $child_blur = esc_attr__($this->props['child_filter_blur'], 'dnxte-divi-essential');
        $child_mix_blend_mode = esc_attr__($this->props['child_mix_blend_mode'], 'dnxte-divi-essential');

        $icon_color_css_property = 'color: %1$s;';
        $icon_color_css_selector = array(
            'desktop' => "%%order_class%% .dnxte-feature-list-img i, %%order_class%% .dnxte-feature-list-img .dnxte-feature-list-numb",
            'hover'   => "%%order_class%% .dnxte-feature-list-img i:hover, %%order_class%% .dnxte-feature-list-img .dnxte-feature-list-numb:hover"
        );
        Common::set_css("dnxte_feature_list_icon_color", $icon_color_css_property, $icon_color_css_selector, $render_slug, $this);

        $icon_bg_css_property = 'background-color: %1$s;';
        $icon_bg_css_selector = array(
            'desktop' => "%%order_class%% .dnxte-feature-list-img i, %%order_class%% .dnxte-feature-list-img .dnxte-feature-list-numb",
            'hover'   => "%%order_class%% .dnxte-feature-list-img i:hover, %%order_class%% .dnxte-feature-list-img .dnxte-feature-list-numb:hover"
        );
        Common::set_css("dnxte_feature_list_icon_bg_color", $icon_bg_css_property, $icon_bg_css_selector, $render_slug, $this);


        $icon_size_css_property = 'font-size: %1$s !important;';
        $icon_size_css_selector = array(
            'desktop' => "%%order_class%% .dnxte-feature-list-img i",
            'hover'   => "%%order_class%% .dnxte-feature-list-img i:hover"
        );
        Common::set_css("dnxte_feature_list_icon_size", $icon_size_css_property, $icon_size_css_selector, $render_slug, $this);

        // Image filter
        $image_filter_style = sprintf('filter: hue-rotate(%1$s) saturate(%2$s) brightness(%3$s) contrast(%4$s) invert(%5$s) sepia(%6$s) opacity(%7$s) blur(%8$s);mix-blend-mode: %9$s;', $child_hue_rotate, $child_saturate, $child_brightness, $child_contrast, $child_invert, $child_sepia, $child_opacity, $child_blur, $child_mix_blend_mode);

        ET_Builder_Element::set_style($render_slug, array(
            'selector' => "%%order_class%% .dnxte-feature-list-img img",
            'declaration' => $image_filter_style,
        ));
        // Image filter end

        $image_bg_css_property = 'background-color: %1$s !important;';
        $image_bg_css_selector = array(
            'desktop' => "%%order_class%% .dnxte-feature-list-img img",
            'hover'   => "%%order_class%% .dnxte-feature-list-img img:hover"
        );
        Common::set_css("dnxte_feature_list_image_bg_color", $image_bg_css_property, $image_bg_css_selector, $render_slug, $this);

        $image_size_css_property = 'width: %1$s !important;';
        $image_size_css_selector = array(
            'desktop' => "%%order_class%% .dnxte-feature-list-img img",
            'hover'   => "%%order_class%% .dnxte-feature-list-img img:hover"
        );
        Common::set_css("dnxte_feature_list_image_size", $image_size_css_property, $image_size_css_selector, $render_slug, $this);

        $icon_position = esc_attr__($this->props['dnxte_feature_list_icon_position'], 'dnxte-divi-essential');
        $final_content = str_replace("dnxte-feature-list-left-img", $icon_position, $content);

        $this->apply_css($render_slug);
        return sprintf('%1$s', $final_content);
    }

    public function apply_css($render_slug)
    {

        /**
         * Custom Padding Margin Output
         *
         */
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_feature_list_item_margin", "%%order_class%% .dnxte_feature_list_child", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_feature_list_item_padding", "%%order_class%% .dnxte_feature_list_child", "padding");
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_feature_list_icon_padding", "%%order_class%% .dnxte-feature-list-img i, %%order_class%% .dnxte-feature-list-img .dnxte-feature-list-numb", "padding");
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_feature_list_title_padding", "%%order_class%% .dnxte-feature-list-content", "padding");
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_feature_list_image_padding", "%%order_class%% .dnxte-feature-list-img img", "padding");

    }
}

new Divi_NxteFeatureList;
