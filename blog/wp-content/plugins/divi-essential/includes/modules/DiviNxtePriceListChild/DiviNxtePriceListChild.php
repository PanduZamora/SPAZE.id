<?php

class Divi_NxtePriceListChild extends ET_Builder_Module
{
    public $slug = 'dnxte_price_list_child';
    public $vb_support = 'on';
    public $type = 'child';
    public $child_title_var = 'dnxte_pricelist_image_alt';
    public $child_title_fallback_var = 'dnxte_pricelist_image_alt';

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-price-list/',
        'author' => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

    public function init()
    {
        $this->name = esc_html__('Price List Item', 'dnxte-divi-essential');
        $this->icon_path = plugin_dir_path(__FILE__) . 'icon.svg';

        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'dnxte_pricelist_image_settings' => array(
                        'title' => esc_html__('Image', 'dnxte-divi-essential'),
                        'priority' => 10,
                    ),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'dnxte_pricelist_img' => esc_html__('Image', 'dnxte-divi-essential'),
                ),
            ),
        );
    }

    public function get_advanced_fields_config()
    {
        return array(
            'text'  => false,
            'fonts' => false,
            'borders' => array(
                'default' => array(),
                'image' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% .dnxte-pricelist-image img",
                            'border_styles' => "%%order_class%% .dnxte-pricelist-image img",
                        ),
                    ),
                    'label_prefix' => esc_html__('Image', 'dnxte-divi-essential'),
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_pricelist_img',
                ),
            ),
            'box_shadow' => array(
                'default' => array(),
                'image' => array(
                    'label' => esc_html__('Image Box Shadow', 'dnxte-divi-essential'),
                    'option_category' => 'layout',
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_pricelist_img',
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-pricelist-image img',
                    ),
                    'default_on_fronts' => array(
                        'color' => '',
                        'position' => '',
                    ),
                ),
            ),
            'filters' => array(
                'css' => array(
                    'main' => '%%order_class%% .dnxte-pricelist-image img',
                ),
            ),
        );
    }

    public function get_fields()
    {
        return array(
            // Image
            'dnxte_pricelist_image' => array(
                'label' => esc_html__('Image', 'dnxte-divi-essential'),
                'type' => 'upload',
                'option_category' => 'basic_option',
                'upload_button_text' => esc_attr__(
                    'Upload an image',
                    'dnxte-divi-essential'
                ),
                'choose_text' => esc_attr__('Choose an Image', 'dnxte-divi-essential'),
                'update_text' => esc_attr__('Set As Image', 'dnxte-divi-essential'),
                'description' => esc_html__(
                    'Upload an image to display at the top of your blurb.',
                    'dnxte-divi-essential'
                ),
                'toggle_slug' => 'dnxte_pricelist_image_settings',
                'dynamic_content' => 'image',
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            // Image alt
            'dnxte_pricelist_image_alt' => array(
                'label' => esc_html__('Image Alt Text', 'dnxte-divi-essential'),
                'type' => 'text',
                'default' => 'Price List Item',
                'option_category' => 'basic_option',
                'description' => esc_html__(
                    'Define the HTML ALT text for your image here.',
                    'dnxte-divi-essential'
                ),
                'toggle_slug' => 'dnxte_pricelist_image_settings',
                'dynamic_content' => 'text',
            ),
            // Heading Text
            'dnxte_pricelist_heading_text' => array(
                'label' => esc_html__('Heading Text', 'dnxte-divi-essential'),
                'type' => 'text',
                'dynamic_content' => 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Heading Text entered here will appear inside the module.', 'dnxte-divi-essential'),
                'toggle_slug' => 'main_content',
            ),
            // Price
            'dnxte_pricelist_price' => array(
                'label'           => esc_html__( 'Price', 'dnxte-divi-essential' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Price of the item', 'dnxte-divi-essential' ),
				'toggle_slug'     => 'main_content',
				'default' => '0$',
				'default_on_front' => '0$',
            ),
            // Content
            'dnxte_pricelist_description' => array(
                'label' => esc_html__('Content', 'dnxte-divi-essential'),
                'type' => 'tiny_mce',
                'dynamic_content' => 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Content entered here will appear inside the module.', 'dnxte-divi-essential'),
                'toggle_slug' => 'main_content',
            ),
            'dnxte_pricelist_image_width' => array(
                'label' => esc_html__('Image Width', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_pricelist_img',
                'validate_unit' => true,
                'depends_show_if' => 'off',
                'default' => '50%',
                'default_unit' => '%',
                'default_on_front' => '',
                'allow_empty' => true,
                'range_settings' => array(
                    'min' => '0',
                    'max' => '50',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'responsive' => true,
                'hover' => 'tabs',
            ),
            'dnxte_pricelist_image_spacing' => array(
                'label' => esc_html__('Image Gap Spacing', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_pricelist_img',
                'validate_unit' => true,
                'default' => '25px',
                'default_unit' => 'px',
                'default_on_front' => '',
                'allow_empty' => true,
                'range_settings' => array(
                    'min' => '0',
                    'max' => '50',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'responsive' => true,
                'hover' => 'tabs',
            ),
        );
    }

    public function render($attrs, $content = null, $render_slug)
    {

        $multi_view = et_pb_multi_view_options($this);
        $dnext_image = $this->props['dnxte_pricelist_image'];
        $dnext_image_alt = $this->props['dnxte_pricelist_image_alt'];
        $dnext_title_text = $this->props['dnxte_pricelist_heading_text'];
        $dnext_price_text = $this->props['dnxte_pricelist_price'];
        $dnext_desc_text = $this->props['dnxte_pricelist_description'];

        $image_html = $multi_view->render_element(array(
            'tag' => 'img',
            'attrs' => array(
                'src' => '{{dnxte_pricelist_image}}',
                'alt' => '{{dnxte_pricelist_image_alt}}',
            ),
            'required' => 'dnxte_pricelist_image',
        ));

        // Image
        $dnext_img = sprintf(
            '%1$s',
            $image_html
        );

        // Title Text
        $dnext_title = '';
        if ('' !== $dnext_title_text) {
            $dnext_title = sprintf('<div class="dnxte-pricelist-title">%1$s</div>', et_core_esc_previously($dnext_title_text));
        }

        /* // Description Text
        $dnext_desc = "";
        if ('' !== $dnext_desc_text) {
            $dnext_desc = sprintf('<div class="dnxte-pricelist-description">%1$s</div>', wpautop($dnext_desc_text));
        } */

        $dnext_desc = $multi_view->render_element( array(
            'tag' => 'div',
            'content' => '{{dnxte_pricelist_description}}',
            'attrs' => array(
                'class' => 'dnxte-pricelist-description',
            )
            ));

        // Price Text
        $dnext_price = "";
        if ('' !== $dnext_price_text) {
            $dnext_price = sprintf('<div class="dnxte-pricelist-price">%1$s</div>', et_core_esc_previously($dnext_price_text));
        }

        // Image Width Style
        $image_style = sprintf('max-width: %1$s !important; margin-right: %2$s !important;', esc_attr($this->props['dnxte_pricelist_image_width']), esc_attr($this->props['dnxte_pricelist_image_spacing']));
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => "%%order_class%% .dnxte-pricelist-image",
            'declaration' => $image_style,
        ));

        return sprintf(
            '<div class="dnxte-pricelist-wrapper">
                <div class="dnxte-pricelist-image">
                %1$s
                </div>
                <div class="dnxte-pricelist-item-wrapper">
                <div class="dnxte-pricelist-header">
                %2$s
                    <div class="dnxte-pricelist-separator"></div>
                    %4$s
                </div>
                %3$s
                </div>
            </div>',
            $dnext_img,
            $dnext_title,
            $dnext_desc,
            $dnext_price
        );
    }
}

new Divi_NxtePriceListChild;
