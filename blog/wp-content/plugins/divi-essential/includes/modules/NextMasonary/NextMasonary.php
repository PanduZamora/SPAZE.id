<?php

class Next_Masonary extends ET_Builder_Module {

    public $slug = 'dnxte_masonary';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-masonry-gallery/',
        'author'     => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

    public function init() {
        $this->name = esc_html__('Next Masonry Gallery', 'dnxte-divi-essential');
        $this->icon_path = plugin_dir_path(__FILE__) . 'icon.svg';

        $this->settings_modal_toggles = array(
            'general'    => array(
                'toggles' => array(
                    'main_content' => esc_html__('Images', 'dnxte-divi-essential'),
                    'dnxte_caption' => esc_html__('Caption', 'dnxte-divi-essential'),
                ),
            ),
            'advanced'   => array(
                'toggles' => array(
                    'dnxte_grid'             => esc_html__('Grid', 'dnxte-divi-essential'),
                    'dnxte_grid_items'       => esc_html__('Image', 'dnxte-divi-essential'),
                    'dnxte_overlay'          => esc_html__('Overlay', 'dnxte-divi-essential'),
                    'dnxte_title_caption' => array(
                        'title' => esc_html__('Caption Text', 'dnxte-divi-essential'),
                        'sub_toggles' => array(
                            'title' => array(
                                'name' => esc_html__('Title', 'dnxte-divi-essential'),
							),
                            'caption' => array(
                                'name' => esc_html__('Caption', 'dnxte-divi-essential'),
							),
                        ),
                        'tabbed_subtoggles'    => true,
                        'priority' => 49,
                    ),
                ),
            )
        );

        $this->advanced_fields = array(
            'fonts'                 => array(
				'title'   => array(
					'label'    => esc_html__( 'Title', 'dnxte-divi-essential' ),
					'css'      => array(
						'main'  => "%%order_class%% .dnxte-msnary-details .dnxte-msnary-heading",
						'hover' => "%%order_class%% .dnxte-msnary-details .dnxte-msnary-heading:hover",
                    ),
                    'tab_slug'     => 'advanced',
                    'toggle_slug'  => 'dnxte_title_caption',
                    'sub_toggle'   => 'title',
					'header_level' => array(
						'default' => 'h3',
					),
				),
				'caption' => array(
					'label'    => esc_html__( 'Caption', 'dnxte-divi-essential' ),
					'use_all_caps' => true,
					'css'      => array(
						'main'  => "%%order_class%% .dnxte-msnary-details .dnxte-msnary-pra",
						'hover' => "%%order_class%% .dnxte-msnary-details .dnxte-msnary-pra:hover",
                    ),
                    'tab_slug'     => 'advanced',
                    'toggle_slug'  => 'dnxte_title_caption',
                    'sub_toggle'   => 'caption',
					'line_height' => array(
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
					),
                ),
			),
            'background'     => array(
                'settings' => array(
                    'color' => 'alpha',
                ),
                'css'      => array(
                    'main'      => "%%order_class%% .dnxte-msnary-grid",
                    'important' => true,
                ),
            ),
            'borders'        => array(
                'default' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii'  => "%%order_class%% .dnxte-grid",
                            'border_styles' => "%%order_class%% .dnxte-grid",
                        ),
                    ),
                ),
                'image'   => array(
                    'css'          => array(
                        'main' => array(
                            'border_radii'  => "%%order_class%% .dnxte-msnary-item.et_pb_gallery_image",
                            'border_styles' => "%%order_class%% .dnxte-msnary-item.et_pb_gallery_image",
                        ),
                    ),
                    'label_prefix' => esc_html__('Image'),
                    'tab_slug'     => 'advanced',
                    'toggle_slug'  => 'dnxte_grid_items',
                ),
            ),
            'box_shadow'     => array(
                'default' => array(

                ),
                'image'   => array(
                    'css'             => array(
                        'main' => "%%order_class%% .dnxte-msnary-grid .dnxte-msnary-item.et_pb_gallery_image",
                    ),
                    'label'           => esc_html__('Image Box Shadow', 'dnxte-divi-essential'),
                    'option_category' => 'layout',
                    'tab_slug'        => 'advanced',
                    'toggle_slug'     => 'dnxte_grid_items',
                ),
            ),
            'margin_padding' => array(
                'css' => array(
                    'important' => 'all',
                ),
            ),
            'max_width'      => array(
                'css' => array(
                    'module_alignment' => '%%order_class%%.et_pb_module.dnxte_masonary',
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
            'image'          => array(
                'css' => array(
                    'main' => '%%order_class%% .et_pb_gallery_image img',
                ),
            ),
            'scroll_effects' => array(
                'grid_support' => 'yes',
            ),
            'button'         => false,
            'text'           => false,
        );
        
        // $this->css_fields = array(
        // );

        $this->custom_css_fields = array(
            'gallery_item' => array(
                'label'    => esc_html__('Gallery Item', 'dnxte-divi-essential'),
                'selector' => '.dnxte-msnary-item',
            ),
            'overlay'      => array(
                'label'    => esc_html__('Overlay', 'dnxte-divi-essential'),
                'selector' => '.et_overlay',
            ),
            'overlay_icon' => array(
                'label'    => esc_html__('Overlay Icon', 'dnxte-divi-essential'),
                'selector' => '.et_overlay:before',
            ),
        );
    }

    public function get_fields() {
        $fields = array(
            'gallery_ids'         => array(
                'label'            => esc_html__('Images', 'dnxte-divi-essential'),
                'description'      => esc_html__('Choose the images that you would like to appear in the image gallery.', 'dnxte-divi-essential'),
                'type'             => 'upload-gallery',
                'computed_affects' => array(
                    '__gallery',
                ),
                'option_category'  => 'basic_option',
                'toggle_slug'      => 'main_content',
            ),
            'gallery_orderby'     => array(
                'label'       => esc_html__('Image Order', 'dnxte-divi-essential'),
                'description' => esc_html__('Select an ordering method for the gallery. This controls which gallery items appear first in the list.', 'dnxte-divi-essential'),
                'type'        => $this->is_loading_bb_data() ? 'hidden' : 'select',
                'options'     => array(
                    ''     => esc_html__('Default'),
                    'rand' => esc_html__('Random', 'dnxte-divi-essential'),
                ),
                'default'     => 'off',
                'class'       => array('et-pb-gallery-ids-field'),
                'toggle_slug' => 'main_content',
            ),
            'dnxte_columns'       => array(
                'label'            => esc_html__('Columns', 'dnxte-divi-essential'),
                'type'             => 'range',
                'option_category'  => 'basic_option',
                'toggle_slug'      => 'dnxte_grid',
                'tab_slug'         => 'advanced',
                'default'          => '4',
                'range_settings'   => array(
                    'min'  => '1',
                    'max'  => '10',
                    'step' => '1',
                ),
                'mobile_options'   => true,
                'responsive'       => true,
                'unitless'         => true,
                'computed_affects' => array(
                    '__gallery',
                ),
            ),
            'dnxte_gutter'        => array(
                'label'            => esc_html__('Gutter', 'dnxte-divi-essential'),
                'type'             => 'range',
                'option_category'  => 'layout',
                'toggle_slug'      => 'dnxte_grid',
                'tab_slug'         => 'advanced',
                'default'          => '10',
                'range_settings'   => array(
                    'min'  => '0',
                    'max'  => '100',
                    'step' => '1',
                ),
                'mobile_options'   => true,
                'responsive'       => true,
                'unitless'         => true,
                'computed_affects' => array(
                    '__gallery',
                ),
            ),
            'use_overlay'         => array(
                'label'           => esc_html__('Use Overlay', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'option_category' => 'basic_option',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'dnxte_overlay',
                'options'         => array(
                    'off' => esc_html__('Off', 'dnxte-divi-essential'),
                    'on'  => esc_html__('On', 'dnxte-divi-essential'),
                ),
            ),
            'hover_overlay_color' => array(
                'label'          => esc_html__('Overlay Color', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
                'default'        => 'rgba(0, 0, 0, 0.5)',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'dnxte_overlay',
                'mobile_options' => true,
                'responsive'     => true,
                'show_if'        => array(
                    'use_overlay' => 'on',
                ),
            ),
            'overlay_icon_color'  => array(
                'label'          => esc_html__(' Overlay Icon Color', 'dnxte-divi-essential'),
                'description'    => esc_html__('Color of the overlay icon. The overlay icon is centered horizontally and vertically over the image.', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
                'toggle_slug'    => 'dnxte_overlay',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'default'        => '#FFFFFF',
                'mobile_options' => true,
                'responsive'     => true,
                'show_if'        => array(
                    'use_overlay' => 'on',
                ),
            ),
            'hover_icon'          => array(
                'label'           => esc_html__('Hover Icon', 'dnxte-divi-essential'),
                'type'            => 'select_icon',
                'option_category' => 'configuration',
                'class'           => array('et-pb-font-icon'),
                'option_category' => 'configuration',
                'default'         => 'L',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'dnxte_overlay',
                'mobile_options'  => true,
                'responsive'      => true,
                'show_if'         => array(
                    'use_overlay' => 'on',
                ),
            ),
            'icon_bg'             => array(
                'label'           => esc_html__('Icon Background', 'dnxte-divi-essential'),
                'type'            => 'color-alpha',
                'default'         => '#266de8',
                'option_category' => 'configuration',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'dnxte_overlay',
                'mobile_options'  => true,
                'responsive'      => true,
                'show_if'         => array(
                    'use_overlay' => 'on',
                ),
            ),
            'icon_border_color'   => array(
                'label'           => esc_html__('Icon Border Color', 'dnxte-divi-essential'),
                'type'            => 'color-alpha',
                'default'         => '#FFFFFF',
                'option_category' => 'configuration',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'dnxte_overlay',
                'mobile_options'  => true,
                'responsive'      => true,
                'show_if'         => array(
                    'use_overlay' => 'on',
                ),
            ),
            'dnxte_show_title_and_caption' => array(
				'label'              => esc_html__( 'Show Title and Caption', 'dnxte-divi-essential' ),
				'type'               => 'yes_no_button',
				'option_category'    => 'basic_option',
				'options'            => array(
					'on'  => 'Yes',
					'off' => 'No' ,
                ),
				'default_on_front'   => 'on',
				'description'        => esc_html__( 'Whether or not to show the title and caption for images (if available).', 'dnxte-divi-essential' ),
				'toggle_slug'        => 'dnxte_caption',
				'mobile_options'     => true,
				'hover'              => 'tabs',
			),
            '__gallery'           => array(
                'type'                => 'computed',
                'computed_callback'   => array('Next_Masonary', 'get_gallery'),
                'computed_depends_on' => array(
                    'gallery_ids',
                ),
            ),
        );

        return $fields;
    }

    static function get_gallery($args = array(), $orderby) {
        $attachments = array();

        $defaults = array(
            'gallery_ids'     => array(),
            'gallery_orderby' => '',
        );

        $args = wp_parse_args($args, $defaults);

        if ($orderby == 'rand') {
            $gallery_random = explode(",", $args['gallery_ids']);
            $random = shuffle($gallery_random);
            $gallery_random = implode(",", $gallery_random);
        } else {
            $gallery_random = $args['gallery_ids'];
        }

        $attachments_args = array(
            'include'        => $gallery_random,
            'post_status'    => 'inherit',
            'post_type'      => 'attachment',
            'post_mime_type' => 'image',
            'order'          => 'ASC',
            'orderby'        => 'post__in',
        );

        $width = 800;
        $height = 484;

        $_attachments = get_posts($attachments_args);

        foreach ($_attachments as $key => $val) {
            $attachments[$key] = $_attachments[$key];
            $attachments[$key]->image_alt_text = get_post_meta($val->ID, '_wp_attachment_image_alt', true);
            $attachments[$key]->image_src_full = wp_get_attachment_image_src($val->ID, 'full');
            $attachments[$key]->image_src_thumb = wp_get_attachment_image_src($val->ID, array($width, $height));
        }

        return $attachments;

    }

    public function render($attrs, $content = null, $render_slug) {
        wp_enqueue_script( 'dnext_masonry' );
        wp_enqueue_style( 'dnext_magnific_popup' );
        $multi_view                       = et_pb_multi_view_options($this);
        $dnxte_show_title_and_caption     = $this->props['dnxte_show_title_and_caption'];
        $gallery_ids                      = $this->props['gallery_ids'];
        $gallery_orderby                  = $this->props['gallery_orderby'];
        $header_level                     = $this->props['title_level'];

        $hover_icon = $this->props['hover_icon'];
        $hover_icon_values = et_pb_responsive_options()->get_property_values($this->props, 'hover_icon');
        $hover_icon_tablet = isset($hover_icon_values['tablet']) ? $hover_icon_values['tablet'] : '';
        $hover_icon_phone = isset($hover_icon_values['phone']) ? $hover_icon_values['phone'] : '';

        // Overlay Settings.
        if ("off" !== $this->props['use_overlay']) {
            $hover_overlay_color_values = et_pb_responsive_options()->get_property_values($this->props, 'hover_overlay_color');
            et_pb_responsive_options()->generate_responsive_css($hover_overlay_color_values, '%%order_class%% .dnxte_ovl.et_overlay', 'background-color', $render_slug, '', 'color');

            $overlay_icon_color_values = et_pb_responsive_options()->get_property_values($this->props, 'overlay_icon_color');
            et_pb_responsive_options()->generate_responsive_css($overlay_icon_color_values, '%%order_class%% .dnxte_ovl.et_overlay:before', 'color', $render_slug, '', 'color');

            $icon_bg_values = et_pb_responsive_options()->get_property_values($this->props, 'icon_bg');
            et_pb_responsive_options()->generate_responsive_css($icon_bg_values, '%%order_class%% .dnxte_ovl.et_overlay:before', 'background', $render_slug, '', 'color');

            $icon_border_color_values = et_pb_responsive_options()->get_property_values($this->props, 'icon_border_color');
            et_pb_responsive_options()->generate_responsive_css($icon_border_color_values, '%%order_class%% .dnxte_ovl.et_overlay:before', 'border-color', $render_slug, '', 'color');
        }

        $this->dnxte_apply_css($render_slug);

        // Get gallery item data
        $attachments = $this->get_gallery(array(
            'gallery_ids'     => $gallery_ids,
            'gallery_orderby' => $gallery_orderby,

        ), $gallery_orderby);

        
        if (empty($attachments)) {
            return '';
        }

        $output = '<div class="dnxte-grid"><div class="dnxte-msnary-grid"><div class="grid-sizer"></div><div class="gutter-sizer"></div>';

        
        $overlay_output = '';
        if ('off' !== $this->props['use_overlay']) {
            $data_icon = '' !== $hover_icon
            ? sprintf(
                ' data-icon="%1$s"',
                esc_attr(et_pb_process_font_icon($hover_icon))
            )
            : '';

            $data_icon_tablet = '' !== $hover_icon_tablet
            ? sprintf(
                ' data-icon-tablet="%1$s"',
                esc_attr(et_pb_process_font_icon($hover_icon_tablet))
            )
            : '';

            $data_icon_phone = '' !== $hover_icon_phone
            ? sprintf(
                ' data-icon-phone="%1$s"',
                esc_attr(et_pb_process_font_icon($hover_icon_phone))
            )
            : '';

            $overlay_output = sprintf(
                '<span class="dnxte_ovl et_overlay%1$s%3$s%5$s"%2$s%4$s%6$s ></span>',
                ('' !== $hover_icon ? ' et_pb_inline_icon' : ''),
                $data_icon,
                ('' !== $hover_icon_tablet ? ' et_pb_inline_icon_tablet' : ''),
                $data_icon_tablet,
                ('' !== $hover_icon_phone ? ' et_pb_inline_icon_phone' : ''),
                $data_icon_phone
            );
        }

        $images_count = 0;
        
        foreach ($attachments as $id => $attachment) {

            $image_attrs = array(
                'alt' => $attachment->image_alt_text,
            );

            $title = sprintf('<div class='.'dnxte-mfe-title'.'>%1$s</div>', wptexturize( $attachment->post_title ));
            $caption = sprintf('<small class='.'dnxte-mfe-caption'.'>%1$s</small>', wptexturize( $attachment->post_excerpt ));

            $image_output = sprintf(
                '<a class="image-link" href="%1$s" data-title="%3$s" data-caption="%4$s">
					%2$s
				</a>',
                esc_url($attachment->image_src_full[0]),
                $this->render_image($attachment->image_src_thumb[0], $image_attrs, false),
                $title,
                $caption
            );

            $images_count++;

            $output .= "
			<div class='dnxte-msnary-item et_pb_gallery_image'>
				$image_output
                $overlay_output
            ";

            $output .= "<div class='dnxte-msnary-details'>";
            if ( $multi_view->has_value( 'dnxte_show_title_and_caption', 'on' ) ) {
                if ( trim( $attachment->post_title ) ) {
                    $output .= $multi_view->render_element( array(
                        'tag'     => et_pb_process_header_level( $header_level, 'h3' ),
                        'content' => wptexturize( $attachment->post_title ),
                        'attrs'   => array(
                            'class' => 'dnxte-msnary-heading',
                        ),
                        'visibility' => array(
                            'dnxte_show_title_and_caption' => 'on',
                        ),
                    ) );
                }
                if ( trim( $attachment->post_excerpt ) ) {
                    $output .= $multi_view->render_element( array(
                        'tag'     => 'p',
                        'content' => wptexturize( $attachment->post_excerpt ),
                        'attrs'   => array(
                            'class' => 'dnxte-msnary-pra',
                        ),
                        'visibility' => array(
                            'dnxte_show_title_and_caption' => 'on',
                        ),
                    ) );
                }
            }
            $output .= "</div></div><!-- .dnxte-msnary-details -->";
        }

        $output .= "</div></div><!-- .dnxte-msnary-grid -->";

        return $output;
    }

    public function dnxte_apply_css($render_slug) {
        $dnxte_columns = $this->props["dnxte_columns"];
        $dnxte_columns_responsive_active = isset($this->props["dnxte_columns_last_edited"]) && et_pb_get_responsive_status($this->props["dnxte_columns_last_edited"]);
        $dnxte_columns_tablet = $dnxte_columns_responsive_active && $this->props["dnxte_columns_tablet"] ? $this->props["dnxte_columns_tablet"] : $dnxte_columns;
        $dnxte_columns_phone = $dnxte_columns_responsive_active && $this->props["dnxte_columns_phone"] ? $this->props["dnxte_columns_phone"] : $dnxte_columns_tablet;

        $dnxte_gutter = $this->props["dnxte_gutter"];
        $dnxte_gutter_responsive_active = isset($this->props["dnxte_gutter_last_edited"]) && et_pb_get_responsive_status($this->props["dnxte_gutter_last_edited"]);
        $dnxte_gutter_tablet = $dnxte_gutter_responsive_active && $this->props["dnxte_gutter_tablet"] ? $this->props["dnxte_gutter_tablet"] : $dnxte_gutter;
        $dnxte_gutter_phone = $dnxte_gutter_responsive_active && $this->props["dnxte_gutter_phone"] ? $this->props["dnxte_gutter_phone"] : $dnxte_gutter_tablet;

        //Width of grid items
        if ('' !== $dnxte_columns || '' !== $dnxte_gutter) {
            ET_Builder_Element::set_style($render_slug, [
                'selector'    => '%%order_class%% .grid-sizer, %%order_class%% .dnxte-msnary-item',
                'declaration' => "width: calc((100% - ({$dnxte_columns} - 1) * {$dnxte_gutter}px) / {$dnxte_columns});",
            ]);

            ET_Builder_Element::set_style($render_slug, [
                'selector'    => '%%order_class%% .grid-sizer, %%order_class%% .dnxte-msnary-item',
                'declaration' => "width: calc((100% - ({$dnxte_columns_tablet} - 1) * {$dnxte_gutter_tablet}px) / {$dnxte_columns_tablet});",
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ]);

            ET_Builder_Element::set_style($render_slug, [
                'selector'    => '%%order_class%% .grid-sizer, %%order_class%% .dnxte-msnary-item',
                'declaration' => "width: calc((100% - ({$dnxte_columns_phone} - 1) * {$dnxte_gutter_phone}px) / {$dnxte_columns_phone});",
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ]);
        }

        //Gutter of grid items
        if ("" !== $dnxte_gutter) {
            ET_Builder_Element::set_style($render_slug, [
                'selector'    => '%%order_class%% .dnxte-msnary-item',
                'declaration' => "margin-bottom: {$dnxte_gutter}px;",
            ]);

            ET_Builder_Element::set_style($render_slug, [
                'selector'    => '%%order_class%% .dnxte-msnary-item',
                'declaration' => "margin-bottom: {$dnxte_gutter_tablet}px;",
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ]);

            ET_Builder_Element::set_style($render_slug, [
                'selector'    => '%%order_class%% .dnxte-msnary-item',
                'declaration' => "margin-bottom: {$dnxte_gutter_phone}px;",
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ]);

            ET_Builder_Element::set_style($render_slug, [
                'selector'    => '%%order_class%% .gutter-sizer',
                'declaration' => "width: {$dnxte_gutter}px;",
            ]);

            ET_Builder_Element::set_style($render_slug, [
                'selector'    => '%%order_class%% .gutter-sizer',
                'declaration' => "width: {$dnxte_gutter_tablet}px;",
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ]);

            ET_Builder_Element::set_style($render_slug, [
                'selector'    => '%%order_class%% .gutter-sizer',
                'declaration' => "width: {$dnxte_gutter_phone}px;",
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ]);
        }

    }

}

new Next_Masonary;
