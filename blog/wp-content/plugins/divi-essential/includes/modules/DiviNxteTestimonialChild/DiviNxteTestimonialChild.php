<?php
include_once(WP_PLUGIN_DIR.'/divi-essential/includes/modules/base/Common.php');

class Divi_NxteTestimonialChild extends ET_Builder_Module
{
    public $slug = 'dnxte_testimonial_child';
    public $vb_support = 'on';
    public $type = 'child';
    public $child_title_var = 'dnxte_testimonial_logo_alt';
    public $child_title_fallback_var = 'dnxte_testimonial_logo_alt';

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-testimonial-carousel/',
        'author' => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

    public function init()
    {
        $this->name = esc_html__('Testimonial Slider Item', 'dnxte-divi-essential');

        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'dnxte_testimonial_logo_settings' => array(
                        'title' => esc_html__('Image', 'dnxte-divi-essential'),
                        'priority' => 10,
                    ),
                    'dnxte_testimonial_rating_settings' => array(
                        'title' => esc_html__('Rating', 'dnxte-divi-essential'),
                    ),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'dnxte_testimonial_name_settings' => esc_html__('Name Text', 'dnxte-divi-essential'),
                    'dnxte_testimonial_position_settings' => esc_html__('Position Text', 'dnxte-divi-essential'),
                    'dnxte_testimonial_description_settings' => esc_html__('Description Text', 'dnxte-divi-essential'),
                    'dnxte_testimonial_description_background' => esc_html__('Description Background', 'dnxte-divi-essential'),
                ),
            ),
        );

        // Custom CSS Field
        $this->custom_css_fields = array(
            'testimonialimage_wrapper' => array(
                'label' => esc_html__('Image', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-tstimonial-prfle-review img',
            ),
            'testimonialtitle_wrapper' => array(
                'label' => esc_html__('Title', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-tstprfle-nam',
            ),
            'testimonialposition_wrapper' => array(
                'label' => esc_html__('Position', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-tst-prfledeg-des',
            ),
            'testimonialrating_wrapper' => array(
                'label' => esc_html__('Rating', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnext-star-rating',
            ),
            'testimonialcontent_wrapper' => array(
                'label' => esc_html__('Content', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-itcont-des',
            ),
        );
    }

    public function get_advanced_fields_config()
    {
        return array(
            'text' => false,
            'fonts' => array(
                'header' => array(
                    'label_prefix' => esc_html__('Name', 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => "%%order_class%% h4.dnxte-tstprfle-nam, %%order_class%% h1.dnxte-tstprfle-nam, %%order_class%% h2.dnxte-tstprfle-nam, %%order_class%% h3.dnxte-tstprfle-nam, %%order_class%% h5.dnxte-tstprfle-nam, %%order_class%% h6.dnxte-tstprfle-nam",
                        'important' => 'plugin-only',
                    ),
                    'header_level' => array(
                        'default' => 'h4',
                    ),
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_testimonial_name_settings',
                ),
                'position' => array(
                    'css' => array(
                        'main' => "%%order_class%% .dnxte-tstimonial-prfledeg",
                    ),
                    'label_prefix' => esc_html__('Position', 'dnxte-divi-essential'),
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_testimonial_position_settings',
                ),
                'description' => array(
                    'label' => esc_html__('Description', 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => "%%order_class%% .dnxte-itcont-des",
                        'important' => 'all'
                    ),
                    'block_elements' => array(
                        'tabbed_subtoggles' => true,
                        'bb_icons_support' => true,
                    ),
                ),
            ),
            'borders' => array(
                'default' => array(),
                'desc' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% .dnxte-itcont-des",
                            'border_styles' => "%%order_class%% .dnxte-itcont-des",
                        ),
                        'important' => 'all'
                    ),
                    'label_prefix' => esc_html__('Description', 'dnxte-divi-essential'),
                    'toggle_slug' => 'dnxte_testimonial_description',
                ),
            ),
            'box_shadow' => array(
                'default' => array(),
                'name' => array(
                    'label' => esc_html__('Name Box Shadow', 'dnxte-divi-essential'),
                    'option_category' => 'layout',
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_testimonial_name_settings',
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-tstprfle-nam',
                    ),
                    'default_on_fronts' => array(
                        'color' => '',
                        'position' => '',
                    ),
                ),
                'position' => array(
                    'label' => esc_html__('Position Box Shadow', 'dnxte-divi-essential'),
                    'option_category' => 'layout',
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_testimonial_position_settings',
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-tstimonial-prfledeg',
                    ),
                    'default_on_fronts' => array(
                        'color' => '',
                        'position' => '',
                    ),
                ),
                'desc' => array(
                    'label' => esc_html__('Desc Box Shadow', 'dnxte-divi-essential'),
                    'option_category' => 'layout',
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_testimonial_description',
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-itcont-des',
                    ),
                    'default_on_fronts' => array(
                        'color' => '',
                        'position' => '',
                    ),
                ),
            ),
        );
    }

    public function get_fields()
    {
        $field = array();
        $field = array(
            // Title Text
            'dnxte_testimonial_name' => array(
                'label' => esc_html__('Name', 'dnxte-divi-essential'),
                'type' => 'text',
                'dynamic_content' => 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Title Text entered here will appear inside the module.', 'dnxte-divi-essential'),
                'toggle_slug' => 'main_content',
            ),
            'dnxte_testimonial_position' => array(
                'label' => esc_html__('Position', 'dnxte-divi-essential'),
                'type' => 'text',
                'dynamic_content' => 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Title Text entered here will appear inside the module.', 'dnxte-divi-essential'),
                'toggle_slug' => 'main_content',
            ),
            // Content
            'dnxte_testimonial_description' => array(
                'label' => esc_html__('Description', 'dnxte-divi-essential'),
                'type' => 'tiny_mce',
                'dynamic_content' => 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Content entered here will appear inside the module.', 'dnxte-divi-essential'),
                'toggle_slug' => 'main_content',
            ),
            // Image
            'dnxte_testimonial_logo' => array(
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
                'toggle_slug' => 'dnxte_testimonial_logo_settings',
            ),
            // Image alt
            'dnxte_testimonial_logo_alt' => array(
                'label' => esc_html__('Image Alt Text', 'dnxte-divi-essential'),
                'type' => 'text',
                'default' => 'Testimonial Item',
                'option_category' => 'basic_option',
                'description' => esc_html__(
                    'Define the HTML ALT text for your image here.',
                    'dnxte-divi-essential'
                ),
                'toggle_slug' => 'dnxte_testimonial_logo_settings',
            ),
            // Rating
            'dnxte_testimonial_rating_position' => array(
                'label' => esc_html__('Rating Position', 'dnxte-divi-essential'),
                'description' => esc_html__('Choose rating Style', 'dnxte-divi-essential'),
                'type' => 'select',
                'option_category' => 'layout',
                'toggle_slug' => 'dnxte_testimonial_rating_settings',
                'options' => array(
                    'none' => esc_html__('None', 'dnxte-divi-essential'),
                    'top' => esc_html__('Top of Description', 'dnxte-divi-essential'),
                    'bottom' => esc_html__('Bottom of Description', 'dnxte-divi-essential'),
                ),
                'default' => 'bottom',
                'default_on_front' => 'bottom',
            ),
            'dnxte_testimonial_star_rating' => array(
                'label' => esc_html__('Rating', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the rating of the review.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'basic_option',
                'toggle_slug' => 'dnxte_testimonial_rating_settings',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'default' => '5',
                'fixed_unit' => '',
                'validate_unit' => false,
                'unitless' => true,
                'default_on_front' => '5',
                'allow_empty' => true,
                'range_settings' => array(
                    'min' => '0',
                    'max' => '10',
                    'step' => '0.1',
                ),
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'dnxte_testimonial_star_scale' => array(
                'label' => esc_html__('Rating Scale', 'dnxte-divi-essential'),
                'description' => esc_html__('Choose your rating scale', 'dnxte-divi-essential'),
                'type' => 'select',
                'option_category' => 'layout',
                'toggle_slug' => 'dnxte_testimonial_rating_settings',
                'options' => array(
                    '5' => esc_html__('0 - 5', 'dnxte-divi-essential'),
                    '10' => esc_html__('0 - 10', 'dnxte-divi-essential'),
                ),
                'default' => '5',
            ),
            'dnxte_testimonial_description_padding' => array(
                'label' => esc_html__('Description Padding', 'dnxte-divi-essential'),
                'type' => 'custom_padding',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
        );

        $additional = array();


        $additional = array(
            'description_bg_color' => array(
                'label' => esc_html__('Description Background', 'dnxte-divi-essential'),
                'type' => 'background-field',
                'base_name' => "description_bg",
                'context' => "description_bg",
                'option_category' => 'layout',
                'custom_color' => true,
                'default' => ET_Global_Settings::get_value('all_buttons_bg_color'),
                'depends_show_if' => 'on',
                'tab_slug' => 'advanced',
                'toggle_slug' => "dnxte_testimonial_description_background",
                'background_fields' => array_merge(
                    ET_Builder_Element::generate_background_options(
                        'description_bg',
                        'gradient',
                        "advanced",
                        "dnxte_testimonial_description_background",
                        "description_bg_gradient"
                    ),
                    ET_Builder_Element::generate_background_options(
                        "description_bg",
                        "color",
                        "advanced",
                        "dnxte_testimonial_description_background",
                        "description_bg_color"
                    )
                    ),
                'mobile_options' => true,
                'hover' => 'tabs'
            )
        );

        $additional = array_merge(
            $additional,
            $this->generate_background_options(
                'description_bg',
                'skip',
                "advanced",
                "dnxte_testimonial_description_background",
                "description_bg_gradient"
            ),
            $this->generate_background_options(
                'description_bg',
                'skip',
                "advanced",
                "dnxte_testimonial_description_background",
                "description_bg_color"
            )
        );

        return array_merge($field, $additional);
    }

    public function render($attrs, $content = null, $render_slug)
    {
        $multi_view = et_pb_multi_view_options($this);
        $dnxt_logo = $this->props['dnxte_testimonial_logo'];
        $dnxt_logo_alt = $this->props['dnxte_testimonial_logo_alt'];
        $dnxt_name = $this->props['dnxte_testimonial_name'];
        $dnxt_position = $this->props['dnxte_testimonial_position'];
        $dnxt_description = $this->props['dnxte_testimonial_description'];
        // Rendering Star
        $rating_scale = (int) $this->props['dnxte_testimonial_star_scale'];
        $rating = (float) $this->props['dnxte_testimonial_star_rating'] > $rating_scale ? $rating_scale : $this->props['dnxte_testimonial_star_rating'];
        $render_stars = Common::render_stars($rating,$rating_scale);
        
        // Name
        $name = $multi_view->render_element(array(
            'tag' => et_pb_process_header_level($this->props['header_level'], 'h4'),
            'content' => '{{dnxte_testimonial_name}}',
            'attrs' => array(
                'class' => 'dnxte-tstprfle-nam',
            ),
        ));

        // Position
        $position = "";
        if ('' !== $dnxt_position) {
            $position = sprintf('<div class="dnxte-tstimonial-prfledeg">
            <span class="dnxte-tst-prfledeg-des">%1$s</span>
            </div>', esc_attr($dnxt_position));
        }


        $description = $multi_view->render_element( array(
            'tag' => 'div',
            'content' => '{{dnxte_testimonial_description}}',
            'attrs' => array(
            'class' => 'dnxte-itcont-des',
            )
            ));

        // Image
        $image = "";
        if ('' !== $dnxt_logo) {
            $image = sprintf('<div class="dnxte-tstimonial-prfle-review">
                    <img class="img-fluid" src="%1$s" alt="%2$s">
                 </div>', $dnxt_logo, esc_attr($dnxt_logo_alt));
        }

        $stars_output_top = "";
        $starts_output = "";
        if ($this->props['dnxte_testimonial_rating_position'] === "top") {
            $stars_output_top = sprintf('<div class="dnxte-rating-revstar dnext-star-rating">%1$s</div>', $render_stars);
        } elseif($this->props['dnxte_testimonial_rating_position'] === "bottom") {
            $starts_output = sprintf('<div class="dnxte-rating-revstar dnext-star-rating">%1$s</div>', $render_stars);
        }

        // Timeline background color
        $description_bg_color = array(
            'color_slug' => "description_bg_color"
        );
        $use_color_gradient = $this->props['description_bg_use_color_gradient'];
        $gradient = array(
            "gradient_type" => 'description_bg_color_gradient_type',
            "gradient_direction" => 'description_bg_color_gradient_direction',
            "radial" => 'description_bg_color_gradient_direction_radial',
            "gradient_start" => 'description_bg_color_gradient_start',
            "gradient_end" => 'description_bg_color_gradient_end',
            "gradient_start_position" => 'description_bg_color_gradient_start_position',
            "gradient_end_position" => 'description_bg_color_gradient_end_position',
            "gradient_overlays_image" => 'description_bg_color_gradient_overlays_image',
        );

        $css_property = array(
            "desktop" => "%%order_class%% .dnxte-itcont-des",
            "hover" => "%%order_class%% .dnxte-itcont-des:hover"
        );
        Common::apply_bg_css($render_slug, $this, $description_bg_color, $use_color_gradient, $gradient, $css_property);
        //Timeline background color end

        $this->apply_css($render_slug);
        $output = sprintf(
            '<div class="dnxte-tstimonial-item-con">
            <div class="dnxte-quote-icon2">
                <span aria-hidden="true" class="icon_quotations2"></span>
            </div>
            %6$s
            %1$s
            %5$s
            <div class="dnxte-tstimonial-item-prfle">
                %2$s
                <div class="dnxte-tstimonial-prfle-des">
                    <div class="dnxte-tstimonial-prfle-des-name">
                        %3$s
                    </div>
                    %4$s
                </div>
            </div>
        </div>',
            $description,
            $image,
            et_core_esc_previously($name),
            $position,
            $starts_output,
            $stars_output_top
        );
        return $output;
    }

    public function apply_css($render_slug)
    {

        /**
         * Custom Padding Margin Output
         *
         */
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_testimonial_description_padding", "%%order_class%% .dnxte-itcont-des", "padding");
    }
}

new Divi_NxteTestimonialChild;
