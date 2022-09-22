<?php

class DNXTE_DiviEssential extends DiviExtension {

    /**
     * The gettext domain for the extension's translations.
     *
     * @since 1.0.0
     *
     * @var string
     */
    public $gettext_domain = 'dnxte-divi-essential';

    /**
     * The extension's WP Plugin name.
     *
     * @since 1.0.0
     *
     * @var string
     */
    public $name = 'divi-essential';

    /**
     * The extension's version
     *
     * @since 1.0.0
     *
     * @var string
     */
    public $version = DIVI_ESSENTIAL_VERSION;

    /**
     * DNXTE_DiviEssential constructor.
     *
     * @param string $name
     * @param array  $args
     */
    public function __construct($name = 'divi-essential', $args = array()) {
        $this->plugin_dir = plugin_dir_path(__FILE__);
        $this->plugin_dir_url = plugin_dir_url($this->plugin_dir);

        parent::__construct($name, $args);

        add_action('wp_enqueue_scripts', array($this, 'dnxt_divinext_enqueue_assets'));
        add_action('admin_enqueue_scripts', array($this, 'divinext_admin_enqueue_assets'));
        add_action('plugins_loaded', array($this, 'i18n'));
    }

    public function dnxt_divinext_enqueue_assets() {

        $src = plugin_dir_url(__FILE__) . '../styles/admin-module.css';
        wp_enqueue_style('dnext_module_css', $src, array(), null, 'all');

        $src = plugin_dir_url(__FILE__) . '../styles/hover-common.css';
        wp_register_style('dnext_hvr_common_css', $src, array(), null, 'all');

        $src = plugin_dir_url(__FILE__) . '../styles/twentytwenty.css';
        wp_register_style('dnext_twentytwenty_css', $src, array(), null, 'all');

        $src = plugin_dir_url(__FILE__) . '../styles/animate.min.css';
        wp_enqueue_style('dnext_wow_css', $src, array(), null, 'all');

        $src = plugin_dir_url(__FILE__) . '../styles/swiper.min.css';
        wp_register_style('dnext_swiper-min-css', $src, array(), null, 'all');

        $src = plugin_dir_url(__FILE__) . '../styles/magnify.min.css';
        wp_register_style('dnext_magnify_css', $src, array(), null, 'all');

        $src = plugin_dir_url(__FILE__) . '../styles/magnific-popup.css';
        wp_register_style('dnext_magnific_popup', $src, array(), null, 'all');

        $src = plugin_dir_url(__FILE__) . '../styles/style.css';
        wp_enqueue_style('dnext_style_css', $src, array(), null, 'all');

        $src = plugin_dir_url(__FILE__) . '../scripts/wow.min.js';
        wp_enqueue_script('dnext_wow-public', $src, array('jquery'), null, false);

        $src = plugin_dir_url(__FILE__) . '../scripts/shape.js';
        wp_register_script('dnext_svg_shape_frontend', $src, array('jquery'), null, true);

        $src = plugin_dir_url(__FILE__) . '../scripts/swiper.min.js';
        wp_register_script('dnext_swiper_frontend', $src, array('jquery'), null, true);

        $src = plugin_dir_url(__FILE__) . 'modules/NextTextAnimation/dnxt-text-animation.js';
        wp_register_script('dnxt_divinexttexts-public', $src, array('jquery'), null, false);

        $src = plugin_dir_url(__FILE__) . '.././scripts/vanilla-tilt.min.js';
        wp_register_script('dnxtblrb_divinextblurb-public', $src, array('jquery'), null, true);

        $src = plugin_dir_url(__FILE__) . '../scripts/default-value.js';
        wp_enqueue_script('dnext_default_value', $src, array('jquery'), null, true);

        $src = plugin_dir_url(__FILE__) . '../scripts/bodymovin.js';
        wp_register_script('dnext_bodymovin', $src, array('jquery'), null, true);

        $src = plugin_dir_url(__FILE__) . '../scripts/magnific-popup.min.js';
        wp_enqueue_script('dnext_magnific_popup', $src, array('jquery'), null, true);

        $src = plugin_dir_url(__FILE__) . '../scripts/imagesloaded.min.js';
        wp_enqueue_script('dnext_imagesloaded', $src, array('jquery'), null, true);

        $src = plugin_dir_url(__FILE__) . '../scripts/masonry.js';
        wp_register_script('dnext_masonry', $src, array('jquery'), null, true);

        $src = plugin_dir_url(__FILE__) . '../scripts/magnify.min.js';
        wp_register_script('dnext_magnifier', $src, array('jquery'), null, true);

        $src = "https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0";
        wp_register_script('dnext_facebook_sdk', $src, array(), null, true);

        $src = "https://platform.twitter.com/widgets.js";
        wp_register_script('dnext_twitter_widgets', $src, array(), null, true);

        $src = plugin_dir_url(__FILE__) . '../scripts/event-move.js';
        wp_register_script('dnext_event_move', $src, array('jquery'), null, true);

        $src = plugin_dir_url(__FILE__) . '../scripts/twentytwenty.js';
        wp_register_script('dnext_twentytwenty_js', $src, array('jquery'), null, true);
        
        $src = plugin_dir_url(__FILE__) . '../scripts/scripts.js';
        wp_enqueue_script('dnext_scripts-public', $src, array('jquery'), null, true);

    }

    public function divinext_admin_enqueue_assets() {
        wp_verify_nonce('dnext_admin_module_css');
        global $pagenow;
        if (("admin.php" === $pagenow) && (isset($_GET['page']) && 'et_theme_builder' === $_GET['page'])) {
            $src = plugin_dir_url(__FILE__) . '../styles/admin-module.css';
            wp_enqueue_style('dnext_admin_module_css', $src, array(), null, 'all');
        }
    }

    public function i18n(){
        load_plugin_textdomain( 'dnxte-divi-essential',false ,plugin_dir_path(__FILE__) . '/languages/');
    }
}

new DNXTE_DiviEssential;
