<?php

class Next_Team_Creative_Item extends ET_Builder_Module
{

    public $slug = 'dnxte_team_creative_item';
    public $vb_support = 'on';
    public $type = 'child';
    public $child_title_var = 'content';

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-creative-team/',
        'author' => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

    public function init()
    {
        $this->name = esc_html__('Social Network', 'dnxte-divi-essential');
        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'team_creativ_social' => array(
                        'title' => esc_html__('Social Network', 'dnxte-divi-essential'),
                    ),
                ),
            ),
            'advanced' => array(
                'toggles' => array(),
            ),
            'custom_css' => array(
                'toggles' => array(),
            ),
        );

        $this->advanced_setting_title_text = esc_html__('New Social Network', 'dnxte-divi-essential');
        $this->settings_text = esc_html__('Social Network Settings', 'dnxte-divi-essential');

        $this->advanced_fields = array(
            'background' => array(
                'css' => array(
                    'main' => '%%order_class%% .dnext-team-creative-sn a span::before',
                    'important' => 'all',
                ),
            ),
            'borders' => array(
                'default' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% li.dnext-team-creative-sn a span:before",
                            'border_styles' => "%%order_class%% li.dnext-team-creative-sn a span:before",
                        ),
                    ),
                    'defaults' => array(
                        'border_radii' => 'on|0px|0px|0px|0px',
                        'border_styles' => array(
                            'width' => '0px',
                            'color' => '#333333',
                            'style' => 'solid',
                        ),
                    ),
                ),
            ),
            'box_shadow' => array(
                'default' => array(
                    'css' => array(
                        'main' => '%%order_class%% .dnext-team-creative-sn a span:before',
                        'important' => true,
                    ),
                ),
            ),
            'margin_padding' => array(
                'css' => array(
                    'main' => '%%order_class%% .dnext-team-creative-sn a',
                    'important' => 'all',
                ),
            ),
            'fonts' => false,
            'text' => false,
            'max_width' => false,
            'height' => false,
            'link_options' => false,
        );
    }

    public function get_fields()
    {
        $fileds = array(
            'team_creative_social_network' => array(
                'label' => esc_html__('Select Social Item', 'dnxte-divi-essential'),
                'type' => 'select',
                'option_category' => 'basic_option',
                'description' => esc_html__('If you need more social icon Select Other Network', 'dnxte-divi-essential'),
                'toggle_slug' => 'team_creativ_social',
                'options' => array(
                    'facebook' => esc_html__('Facebook', 'dnxte-divi-essential'),
                    'twitter' => esc_html__('Twitter', 'dnxte-divi-essential'),
                    'pinterest' => esc_html__('Pinterest', 'dnxte-divi-essential'),
                    'linkedin' => esc_html__('Linkedin', 'dnxte-divi-essential'),
                    'tumblr' => esc_html__('tumblr', 'dnxte-divi-essential'),
                    'instagram' => esc_html__('Instagram', 'dnxte-divi-essential'),
                    'skype' => esc_html__('skype', 'dnxte-divi-essential'),
                    'flikr' => esc_html__('Flikr', 'dnxte-divi-essential'),
                    'dribbble' => esc_html__('dribbble', 'dnxte-divi-essential'),
                    'youtube' => esc_html__('Youtube', 'dnxte-divi-essential'),
                    'vimeo' => esc_html__('Vimeo', 'dnxte-divi-essential'),
                    'social-items' => esc_html__('Select Other Network', 'dnxte-divi-essential'),
                ),
                'default' => 'facebook',
            ),
            'team_creative_social_icon' => array(
                'label' => esc_html__('Social Icon', 'dnxte-divi-essential'),
                'type' => 'select_icon',
                'option_category' => 'basic_option',
                'class' => array('et-pb-font-icon'),
                'toggle_slug' => 'main_content',
                'description' => esc_html__('Select Social Icon.', 'dnxte-divi-essential'),
                'hover' => 'tabs',
                'mobile_options' => true,
                'show_if' => array(
                    'team_creative_social_network' => 'social-items',
                ),
            ),
            'url' => array(
                'label' => esc_html__('Account Link URL', 'dnxte-divi-essential'),
                'type' => 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('The URL for this social network link.', 'dnxte-divi-essential'),
                'depends_show_if_not' => 'skype',
                'depends_on' => array(
                    'team_creative_social_network',
                ),
                'toggle_slug' => 'link',
                'default_on_front' => '#',
            ),
            'skype_url' => array(
                'label' => esc_html__('Account Name', 'dnxte-divi-essential'),
                'type' => 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('The Skype account name.', 'dnxte-divi-essential'),
                'toggle_slug' => 'main_content',
                'show_if' => array(
                    'team_creative_social_network' => array('skype'),
                ),
            ),
            'skype_action' => array(
                'label' => esc_html__('Skype Button Action', 'dnxte-divi-essential'),
                'type' => 'select',
                'option_category' => 'basic_option',
                'options' => array(
                    'call' => esc_html__('Call', 'dnxte-divi-essential'),
                    'chat' => esc_html__('Chat', 'dnxte-divi-essential'),
                ),
                'show_if' => array(
                    'team_creative_social_network' => array('skype'),
                ),
                'description' => esc_html__('Here you can choose which action to execute on button click', 'dnxte-divi-essential'),
                'toggle_slug' => 'main_content',
                'default_on_front' => 'call',
            ),
            'team_creative_link_new_window' => array(
                'label' => esc_html__('Link Target', 'dnxte-divi-essential'),
                'type' => 'select',
                'option_category' => 'configuration',
                'options' => array(
                    'off' => esc_html__('In The Same Window', 'dnxte-divi-essential'),
                    'on' => esc_html__('In The New Tab', 'dnxte-divi-essential'),
                ),
                'toggle_slug' => 'link_window',
                'description' => esc_html__('Here you can choose whether or not your link opens in a new window', 'dnxte-divi-essential'),
            ),
            'team_creative_icon_color' => array(
                'label' => esc_html__('Icon Color', 'dnxte-divi-essential'),
                'description' => esc_html__('Here you can define a custom color for the social network icon.', 'dnxte-divi-essential'),
                'type' => 'color-alpha',
                'default' => '#ffffff',
                'custom_color' => true,
                'tab_slug' => 'advanced',
                'toggle_slug' => 'icon',
                'hover' => 'tabs',
                'mobile_options' => true,
            ),
            'team_creative_icon_font_size' => array(
                'label' => esc_html__('Icon Font Size', 'dnxte-divi-essential'),
                'description' => esc_html__('Control the size of the icon by increasing or decreasing the font size.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'font_option',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'icon',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'default' => '16px',
                'default_unit' => 'px',
                'default_on_front' => '',
                'range_settings' => array(
                    'min' => '1',
                    'max' => '120',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
        );

        return $fileds;
    }

    public function render($attrs, $content = null, $render_slug)
    {

        $multi_view = et_pb_multi_view_options($this);
        $team_creative_social_network = $this->props['team_creative_social_network'];
        $url = $this->props['url'];
        $skype_url = $this->props['skype_url'];
        $skype_action = $this->props['skype_action'];
        $team_creative_link_new_window = $this->props['team_creative_link_new_window'];

        // Social Icon Color
        $team_creative_icon_color_hover = $this->get_hover_value('team_creative_icon_color');
        $team_creative_icon_color_values = et_pb_responsive_options()->get_property_values($this->props, 'team_creative_icon_color');

        et_pb_responsive_options()->generate_responsive_css($team_creative_icon_color_values, '%%order_class%% .dnext-team-creative-sn a', 'color', $render_slug, '', 'color');

        if (et_builder_is_hover_enabled('team_creative_icon_color', $this->props)) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => '%%order_class%% .dnext-team-creative-sn a:hover',
                'declaration' => sprintf(
                    'color: %1$s;',
                    esc_html($team_creative_icon_color_hover)
                ),
            ));
        }

        // Social Icon Size
        $teamovl_card_icon_font_size_hover = $this->get_hover_value('team_creative_icon_font_size');
        $team_creative_icon_font_size_values = et_pb_responsive_options()->get_property_values($this->props, 'team_creative_icon_font_size');

        // Proccess for each devices.
        foreach ($team_creative_icon_font_size_values as $team_creative_icon_font_size_key => $team_creative_icon_font_size_value) {
            if ('' === $team_creative_icon_font_size_value) {
                continue;
            }

            $media_query = 'general';
            if ('tablet' === $team_creative_icon_font_size_key) {
                $media_query = ET_Builder_Element::get_media_query('max_width_980');
            } elseif ('phone' === $team_creative_icon_font_size_key) {
                $media_query = ET_Builder_Element::get_media_query('max_width_767');
            }

            $team_creative_icon_font_size_value_int = (int) $team_creative_icon_font_size_value;
            $team_creative_icon_font_size_value_unit = str_replace($team_creative_icon_font_size_value_int, '', $team_creative_icon_font_size_value);
            $team_creative_icon_font_size_value_double = 0 < $team_creative_icon_font_size_value_int ? $team_creative_icon_font_size_value_int * 2 : 0;
            $team_creative_icon_font_size_value_double = (string) $team_creative_icon_font_size_value_double . $team_creative_icon_font_size_value_unit;

            // Icon.
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => '%%order_class%% .dnext-team-creative-sn a span::before',
                'declaration' => sprintf(
                    'font-size:%1$s; line-height:%2$s; height:%2$s; width:%2$s; border-radius:%2$s;',
                    esc_html($team_creative_icon_font_size_value),
                    esc_html($team_creative_icon_font_size_value_double)
                ),
                'media_query' => $media_query,
            ));

            // Icon hover styles.
            if (et_builder_is_hover_enabled('team_creative_icon_font_size', $this->props) && !empty($team_creative_icon_font_size_hover)) {
                $team_creative_icon_font_size_hover_int = (int) $team_creative_icon_font_size_hover;
                $team_creative_icon_font_size_hover_unit = str_replace($team_creative_icon_font_size_hover_int, '', $team_creative_icon_font_size_hover);

                $team_creative_icon_font_size_hover_double = 0 < $team_creative_icon_font_size_hover_int ? $team_creative_icon_font_size_hover_int * 2 : 0;
                $team_creative_icon_font_size_hover_double = (string) $team_creative_icon_font_size_hover_double . $team_creative_icon_font_size_hover_unit;

                // Icon Hover
                ET_Builder_Element::set_style($render_slug, array(
                    'selector' => '%%order_class%% .dnext-team-creative-sn a span:hover::before',
                    'declaration' => sprintf(
                        'font-size:%1$s; line-height:%2$s; height:%2$s; width:%2$s;border-radius:%2$s;',
                        esc_html($team_creative_icon_font_size_hover),
                        esc_html($team_creative_icon_font_size_hover_double)
                    ),
                ));
            }
        }

        $team_creative_social_icon = $this->props['team_creative_social_icon'];
        $social_icon = '<span class="" data-icon="' . esc_attr(et_pb_process_font_icon($team_creative_social_icon)) . '"></span>';

        if ('skype' === $team_creative_social_network) {
            $skype_url = sprintf(
                'skype:%1$s?%2$s',
                sanitize_text_field($skype_url),
                sanitize_text_field($skype_action)
            );
        }

        $team_creative_url = 'skype' === $team_creative_social_network ? $skype_url : esc_url($url);

        $team_creative_target = 'on' === $team_creative_link_new_window ? '_blank' : '';

        $social_bg_color = array(
            "facebook",
            "twitter",
            "pinterest",
            "linkedin",
            "tumblr",
            "instagram",
            "skype",
            "flikr",
            "dribbble",
            "youtube",
            "vimeo",
        );

        if (in_array($team_creative_social_network, $social_bg_color, true)) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% {$team_creative_social_network} span::before",
                'declaration' => "background: {$this->props['background_color']} !important",
            ));
        }

        $output = "<li class='dnext-team-creative-sn'>
						<a href='{$team_creative_url}' target='{$team_creative_target}' class='dnext-team-creative-{$team_creative_social_network}'>
							{$social_icon}
						</a>
					</li>";

        return $output;
    }
}

new Next_Team_Creative_Item;
