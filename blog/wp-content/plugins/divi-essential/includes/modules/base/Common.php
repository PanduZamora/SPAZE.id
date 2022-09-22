<?php

class Common {
    public static function dnxt_set_style($render_slug, $props, $property, $css_selector, $css_property, $important = true)
    {

        $responsive_active = !empty($props[$property . "_last_edited"]) && et_pb_get_responsive_status($props[$property . "_last_edited"]);

        $declaration_desktop = "";
        $declaration_tablet = "";
        $declaration_phone = "";

        $is_important = $important ? '!important' : '';

        switch ($css_property) {
            case "margin":
            case "padding":
                if (!empty($props[$property])) {
                    $values = explode("|", $props[$property]);
                    // if (empty($values[3])) {
                    //     return $values[3] = 0;
                    // }
                    $declaration_desktop = "{$css_property}-top: {$values[0]} {$is_important};
                                        {$css_property}-right: {$values[1]} {$is_important};
                                        {$css_property}-bottom: {$values[2]} {$is_important};
                                        {$css_property}-left: {$values[3]} {$is_important};";
                }

                if ($responsive_active && !empty($props[$property . "_tablet"])) {
                    $values = explode("|", $props[$property . "_tablet"]);
                    $declaration_tablet = "{$css_property}-top: {$values[0]};
                                        {$css_property}-right: {$values[1]};
                                        {$css_property}-bottom: {$values[2]};
                                        {$css_property}-left: {$values[3]};";
                }

                if ($responsive_active && !empty($props[$property . "_phone"])) {
                    $values = explode("|", $props[$property . "_phone"]);
                    $declaration_phone = "{$css_property}-top: {$values[0]};
                                        {$css_property}-right: {$values[1]};
                                        {$css_property}-bottom: {$values[2]};
                                        {$css_property}-left: {$values[3]};";
                }
                break;
            default: //Default is applied for values like height, color etc.
                if (!empty($props[$property])) {
                    $declaration_desktop = "{$css_property}: {$props[$property]};";
                }
                if ($responsive_active && !empty($props[$property . "_tablet"])) {
                    $declaration_tablet = "{$css_property}: {$props[$property . "_tablet"]};";
                }
                if ($responsive_active && !empty($props[$property . "_phone"])) {
                    $declaration_phone = "{$css_property}: {$props[$property . "_phone"]};";
                }
        }

        ET_Builder_Element::set_style($render_slug, array(
            'selector' => $css_selector,
            'declaration' => $declaration_desktop,
        ));

        if (!empty($props[$property . "_tablet"]) && $responsive_active) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => $css_selector,
                'declaration' => $declaration_tablet,
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ));
        }

        if (!empty($props[$property . "_phone"]) && $responsive_active) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => $css_selector,
                'declaration' => $declaration_phone,
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ));
        }
    }

    public static function apply_bg_css($render_slug, $context, $color, $use_color_gradient, $gradient, $css_property) {
        $bg_image = array();
        $bg_style = "";
        $bg_style_tablet = "";
        $bg_style_phone = "";
        $bg_style_hover = "";

        $bg_type = $context->props[$gradient["gradient_type"]];
        $bg_direction = $context->props[$gradient["gradient_direction"]];
        $bg_direction_radial = $context->props[$gradient["radial"]];
        $bg_start = $context->props[$gradient["gradient_start"]];
        $bg_start_tablet = $context->props[$gradient["gradient_start"]."_tablet"];
        $bg_start_phone = $context->props[$gradient["gradient_start"]."_phone"];
        $bg_start_hover = $use_color_gradient == "on" && isset($context->props[$gradient["gradient_start"]."__hover"]) && $context->props[$gradient["gradient_start"]."__hover"] !== "" ? $context->props[$gradient["gradient_start"]."__hover"] : "";
        $bg_end = $context->props[$gradient["gradient_end"]];
        $bg_end_tablet = $context->props[$gradient["gradient_end"]."_tablet"];
        $bg_end_phone = $context->props[$gradient["gradient_end"]."_phone"];
        $bg_end_hover = $use_color_gradient == "on" && isset($context->props[$gradient["gradient_end"]."__hover"]) &&  $context->props[$gradient["gradient_end"]."__hover"] !== "" ? $context->props[$gradient["gradient_end"]."__hover"] : "";
        $bg_start_position = $context->props[$gradient["gradient_start_position"]];
        $bg_end_position = $context->props[$gradient["gradient_end_position"]];
        $bg_overlays_image = $context->props[$gradient["gradient_overlays_image"]];

        
        if ('on' === $use_color_gradient) {
            $direction = $bg_type === 'linear' ? $bg_direction : "circle at ". $bg_direction_radial." ";
            $start_position = et_sanitize_input_unit($bg_start_position, false, '%');
            $end_position = et_sanitize_input_unit($bg_end_position, false, '%');

            $gradient_bg = "{$bg_type}-gradient( {$direction}, {$bg_start} {$start_position},{$bg_end} {$end_position} )";
            $gradient_bg_tablet = "{$bg_type}-gradient( {$direction}, {$bg_start_tablet} {$start_position},{$bg_end_tablet} {$end_position} )";
            $gradient_bg_phone = "{$bg_type}-gradient( {$direction}, {$bg_start_phone} {$start_position},{$bg_end_phone} {$end_position} )";
            $gradient_bg_hover = "{$bg_type}-gradient( {$direction}, {$bg_start_hover} {$start_position},{$bg_end_hover} {$end_position} )";
    
            if (!empty($gradient_bg) || !empty($gradient_bg_tablet) || !empty($gradient_bg_phone) || !empty($gradient_bg_hover)) {
                $bg_image[] = $gradient_bg;
                $bg_image_tablet[] = $gradient_bg_tablet;
                $bg_image_phone[] = $gradient_bg_phone;
                $bg_image_hover[] = $gradient_bg_hover;
            }
            $has_bg_gradient = true;
        } else {
            $has_bg_gradient = false;
        }
    
    
        if (!empty($bg_image)) {
            if ('on' !== $bg_overlays_image) {
                $bg_image = array_reverse($bg_image);
                $bg_image_tablet = array_reverse($bg_image_tablet);
                $bg_image_phone = array_reverse($bg_image_phone);
                $bg_image_hover = array_reverse($bg_image_hover);
            }
    
            $bg_style .= sprintf('background-image: %1$s !important;', esc_html(join(', ', $bg_image)));
            $bg_style_tablet .= sprintf('background-image: %1$s !important;', esc_html(join(', ', $bg_image_tablet)));
            $bg_style_phone .= sprintf('background-image: %1$s !important;', esc_html(join(', ', $bg_image_phone)));
            $bg_style_hover .= sprintf('background-image: %1$s !important;', esc_html(join(', ', $bg_image_hover)));

        }
        
        
        if (!$has_bg_gradient) {
            $bg_color = $context->props[$color['color_slug']];
            $bg_color_values = et_pb_responsive_options()->get_property_values($context->props, $color['color_slug']);


            $bg_color_tablet = isset($bg_color_values['tablet']) ? $bg_color_values['tablet'] : '';
            $bg_color_phone = isset($bg_color_values['phone']) ? $bg_color_values['phone'] : '';
            $bg_color_hover = isset($context->props[$color['color_slug']."__hover"]) && $context->props[$color['color_slug']."__hover"] !== "" ? $context->props[$color['color_slug']."__hover"] : "";
            
            
            if ('' !== $bg_color) {
                $bg_style .= sprintf('background-color: %1$s !important; ', esc_html($bg_color));
                $bg_style_tablet .= sprintf('background-color: %1$s !important; ', esc_html($bg_color_tablet));
                $bg_style_phone .= sprintf('background-color: %1$s !important; ', esc_html($bg_color_phone));


                if (et_builder_is_hover_enabled($color['color_slug'], $context->props)) {
                    $bg_style_hover = sprintf('background-color: %1$s !important;', $bg_color_hover);
                }

            }
        }
    
        if ('' !== $bg_style) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => $css_property['desktop'],
                'declaration' => rtrim($bg_style),
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => $css_property['desktop'],
                'declaration' => rtrim($bg_style_tablet),
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => $css_property['desktop'],
                'declaration' => rtrim($bg_style_phone),
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ));

            if ("" !== $bg_style_hover) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector' => $context->add_hover_to_order_class($css_property['hover']),
                    'declaration' => rtrim($bg_style_hover),
                ));
            }            
        }
    }

    public static function get_alignment( $slug, $context,$prefix="" ) {
        $is_button_alignment_responsive  = et_pb_responsive_options()->is_responsive_enabled( $context->props, $slug );

        $text_orientation = isset( $context->props[$slug] ) ? $context->props[$slug] : '';

        $alignment_array = array();

        if($is_button_alignment_responsive) {
            
            
            $text_orientation_tablet = isset( $context->props[$slug."_tablet"] ) ? $context->props[$slug."_tablet"] : '';
            $text_orientation_phone = isset( $context->props[$slug."_phone"] ) ? $context->props[$slug."_phone"] : '';
            

            if("" === $prefix) {
                if( !empty($text_orientation) ){
                    array_push($alignment_array, sprintf('%1$s_%2$s', $slug, et_pb_get_alignment($text_orientation)));
                }
    
                if( !empty($text_orientation_tablet) ) {    
                    array_push($alignment_array, sprintf('%1$s_tablet_%2$s', $slug, et_pb_get_alignment($text_orientation_tablet)));
                }
                
                if( !empty($text_orientation_phone) ) {    
                    array_push($alignment_array, sprintf('%1$s_phone_%2$s', $slug, et_pb_get_alignment($text_orientation_phone)));
                }
            }else{
                if( !empty($text_orientation) ){
                    array_push($alignment_array, sprintf('%3$s_%1$s_%2$s', $slug, et_pb_get_alignment($text_orientation), $prefix));
                }
    
                if( !empty($text_orientation_tablet) ) {    
                    array_push($alignment_array, sprintf('%3$s_%1$s_tablet_%2$s', $slug, et_pb_get_alignment($text_orientation_tablet), $prefix));
                }
                
                if( !empty($text_orientation_phone) ) {    
                    array_push($alignment_array, sprintf('%3$s_%1$s_phone_%2$s', $slug, et_pb_get_alignment($text_orientation_phone), $prefix));
                }
            }

            return join(' ', $alignment_array);
        }else{
            if( !empty($text_orientation) ){
                if("" === $prefix) {
                    array_push($alignment_array, sprintf('%1$s_%2$s', $slug, et_pb_get_alignment($text_orientation)));
                }else {
                    array_push($alignment_array, sprintf('%3$s_%1$s_%2$s', $slug, et_pb_get_alignment($text_orientation), $prefix));
                }
            };

            return join(' ', $alignment_array);
        }
    }
    
	/**
	 * Print the actual stars and calculate their filling.
	 *
	 * Rating type is float to allow stars-count to be a fraction.
	 * Floored-rating type is int, to represent the rounded-down stars count.
	 * In the `for` loop, the index type is float to allow comparing with the rating value.
	 *
	 */
	public static function render_stars($rating, $scale) {
		$rating 		= (float) $rating;
		$floored_rating = floor( $rating );
		$star_html 		= '';

			for ( $stars = 1.0; $stars <= $scale; $stars++ ) {
				if ( $stars <= $floored_rating ) {
					$star_html .= '<i class="divinext-star-full et-pb-icon"></i>';
				} else if ( $floored_rating + 1 === $stars && $rating !== $floored_rating ) {
					$star_html .= '<i class="divinext-star-' . ( $rating - $floored_rating ) * 10 . ' et-pb-icon"></i>';
				} else {
					$star_html .= '<i class="divinext-star-empty et-pb-icon"></i>';
				}
			}

		return $star_html;
    }

    public static function pagination($pagination_type, $is_bullet_on){
        if ($pagination_type === "none") {
            return "swiper-pagination swiper-pagination-none";
        }
        if ($pagination_type === "bullets" && $is_bullet_on === "on") {
            return "swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-bullets-dynamic mt-10";
        }

        if ($pagination_type === "bullets") {
            return "swiper-pagination swiper-pagination-clickable swiper-pagination-bullets mt-10";
        }

        if ($pagination_type === "fraction") {
            return "swiper-pagination swiper-pagination-fraction";
        }
        if ($pagination_type === "progressbar") {
            return "swiper-pagination swiper-pagination-progressbar";
        }
    }

    public static function set_css($slug, $css_property, $css_selector, $render_slug, $context) {
        $slug_css = $context->props[$slug];
        $slug_css_values = et_pb_responsive_options()->get_property_values($context->props, $slug);
        $slug_css_tablet = isset($slug_css_values['tablet']) ? $slug_css_values['tablet'] : '';
        $slug_css_phone = isset($slug_css_values['phone']) ? $slug_css_values['phone'] : '';
        $slug_css_hover = $context->get_hover_value($slug);

        if ("" !== $slug_css) {
            $slug_css_style = sprintf($css_property, esc_attr__($slug_css, 'dnxte-divi-essential'));
            $slug_css_style_tablet = sprintf($css_property, esc_attr__($slug_css_tablet, 'dnxte-divi-essential'));
            $slug_css_style_phone = sprintf($css_property, esc_attr__($slug_css_phone, 'dnxte-divi-essential'));
            $slug_css_style_hover = "";

            if (et_builder_is_hover_enabled($slug, $context->props)) {
                $slug_css_style_hover = sprintf($css_property, esc_attr__($slug_css_hover, 'dnxte-divi-essential'));
            }

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => $css_selector['desktop'],
                'declaration' => $slug_css_style,
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => $css_selector['desktop'],
                'declaration' => $slug_css_style_tablet,
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => $css_selector['desktop'],
                'declaration' => $slug_css_style_phone,
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ));

            if ("" !== $slug_css_style_hover) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector' => $context->add_hover_to_order_class($css_selector['hover']),
                    'declaration' => $slug_css_style_hover,
                ));
            }
        }
    }

    public static function shape_image_position($positionArr, $render_slug, $context) {
        $horizontal_slug = $positionArr['horizontal_slug'];
        $vertical_slug = $positionArr['vertical_slug'];
        $css_selector = $positionArr['css_selector'];
        $use_shape = $positionArr['use_shape'];
        $use_mask_upload = $positionArr['use_mask_upload'];
        // Position image start
        $image_horizontal = ("on" == $use_shape || "on" == $use_mask_upload) && isset($context->props[$horizontal_slug]) ? $context->props[$horizontal_slug] : '';

        $image_horizontal_values = et_pb_responsive_options()->get_property_values($context->props, $horizontal_slug);
        $image_horizontal_tablet = isset($image_horizontal_values['tablet']) && "" != $image_horizontal_values['tablet'] ? $image_horizontal_values['tablet'] : $image_horizontal_values['desktop'];
        $image_horizontal_phone =isset($image_horizontal_values['phone']) && "" != $image_horizontal_values['phone'] ? $image_horizontal_values['phone'] : $image_horizontal_values['desktop'];
        $image_horizontal_hover =("on" == $use_shape || "on" == $use_mask_upload) ? $context->get_hover_value($horizontal_slug) : ''; 

        $image_vertical = ("on" == $use_shape || "on" == $use_mask_upload) && isset($context->props[$vertical_slug]) ? $context->props[$vertical_slug] : '';

        $image_vertical_values = et_pb_responsive_options()->get_property_values($context->props, $vertical_slug);
        $image_vertical_tablet = isset($image_vertical_values['tablet']) && "" != $image_vertical_values['tablet'] ? $image_vertical_values['tablet'] : $image_vertical_values['desktop'];
        $image_vertical_phone =isset($image_vertical_values['phone']) && "" != $image_vertical_values['phone'] ? $image_vertical_values['phone'] : $image_vertical_values['tablet'];
        $image_vertical_hover =("on" == $use_shape || "on" == $use_mask_upload) ? $context->get_hover_value($vertical_slug) : '';


        if ("" !== $image_horizontal || "" !== $image_vertical) {
            $image_position_style = sprintf('transform: matrix(1, 0, 0, 1, %1$s, %2$s);', $image_horizontal, $image_vertical);
            $image_position_style_tablet = sprintf('transform: matrix(1, 0, 0, 1, %1$s, %2$s);', esc_attr($image_horizontal_tablet), $image_vertical_tablet);

            $image_position_style_phone = sprintf('transform: matrix(1, 0, 0, 1, %1$s, %2$s);', $image_horizontal_phone, $image_vertical_phone);
            $image_position_style_hover = "";

            if (et_builder_is_hover_enabled($horizontal_slug, $context->props) || et_builder_is_hover_enabled($vertical_slug, $context->props)) {
                $image_position_style_hover = sprintf('transform: matrix(1, 0, 0, 1, %1$s, %2$s);', $image_horizontal_hover, $image_vertical_hover);
            }

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => $css_selector['desktop'],
                'declaration' => $image_position_style,
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => $css_selector['desktop'],
                'declaration' => $image_position_style_tablet,
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => $css_selector['desktop'],
                'declaration' => $image_position_style_phone,
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ));

            if ("" !== $image_position_style_hover && isset($css_selector['hover'])) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector' => $context->add_hover_to_order_class($css_selector['hover']),
                    'declaration' => $image_position_style_hover,
                ));
            }
        }
        // Position image end
    }
}

new Common;