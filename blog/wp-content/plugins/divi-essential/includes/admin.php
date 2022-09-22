<?php

namespace Divi_Essential\Includes;

defined( 'ABSPATH' ) || die();

class Admin {

	const MODULES_NONCE = 'dnxte_save_admin';
	

	public function __construct() {
		add_action( 'admin_menu', array( __CLASS__, 'add_menu' ), 21 );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_scripts' ), 21 );
		add_action( 'wp_ajax_' . self::MODULES_NONCE, array( __CLASS__, 'save_data' ) );
		add_action( 'dnxte_save_admin_data', array( __CLASS__, 'save_modules_data') );

	/**
	 * 
	 * 3. the required plugin license action_hook start
	 */
		add_action('admin_init', array( __CLASS__, 'dnext_essential_register_option'));
		add_action('admin_init', array( __CLASS__, 'dnext_essential_activate_license'));
		add_action('admin_init', array( __CLASS__, 'dnext_essential_deactivate_license'));
		add_action('admin_init', array( __CLASS__, 'dnext_essential_admin_notices'));
		add_action('admin_init', array( __CLASS__, 'dnext_essential_plugin_updater'), 0);
	/**
	 * 
	 * 3. the required plugin license action_hook end
	 */
	}
	
    public static function add_menu() {
		
		add_menu_page(
			__( 'Divi Essential', 'dnxte-divi-essential' ),
			__( 'Divi Essential', 'dnxte-divi-essential' ),
			'manage_options',
			'dnxte-essential',
			array( __CLASS__, 'render_main'),
			dnxte_svg_icon(),
			111
		);
		

	/**
	 * 
	 * 4. The required plugin license submenu start
	 */
		add_submenu_page(
			'dnxte-essential',
			__( 'Divi Essential License', 'dnxte-divi-essential' ),
			__( 'Divi Essential License', 'dnxte-divi-essential' ),
			'manage_options',
			DNEXT_ESSENTIAL_PLUGIN_LICENSE_PAGE,
			array( __CLASS__, 'render_license_page')
		);

	/**
	 * 
	 * 4. The required plugin license submenu END
	 */
	}

	public static function enqueue_scripts() {
		if ( ! current_user_can( 'manage_options' )) {
			return;
		}

		wp_enqueue_style(
			'dnxte-admin',
			DIVI_ESSENTIAL_ASSETS . 'admin/css/admin.css'
		);

		wp_enqueue_style(
			'google-nunito-font',
			DIVI_ESSENTIAL_ASSETS . 'fonts/nunito/stylesheet.css'
		);

		wp_enqueue_script(
			'dnxte-admin-js',
			DIVI_ESSENTIAL_ASSETS . 'admin/js/admin.js',
			array( 'jquery' ),
			DIVI_ESSENTIAL_VERSION,
			true
		);

		wp_localize_script( 
			'dnxte-admin-js', 
			'Dnxte_Essential', 
			array(
				'ajaxurl'	=>	admin_url( 'admin-ajax.php' ),
				'nonce'   	=>	wp_create_nonce( self::MODULES_NONCE ),
				'action'  	=>	self::MODULES_NONCE,
			) 
		);
	}

	public static function save_data() {

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		if ( ! check_ajax_referer( self::MODULES_NONCE, 'nonce' ) ) {
			wp_send_json_error();
		}


		$posted_data = isset( $_POST['data'] ) ? filter_var( wp_unslash($_POST['data'] ), FILTER_SANITIZE_STRING ) : '';
		
		$data = array();

		parse_str( $posted_data, $data );

		do_action( 'dnxte_save_admin_data', $data );

		wp_send_json_success();
	}

	public static function save_modules_data( $data ) {

		$modules = ! empty( $data['modules'] ) ? $data['modules'] : array();

		$inactive_modules = array_values( array_diff( array_keys( self::get_modules_map() ), $modules ) );

		self::save_inactive_modules($inactive_modules);
	}

	public static function get_inactive_modules() {
		return get_option( 'dnxte_inactive_modules', array() );
	}

	public static function save_inactive_modules( $modules = array() ) {
		update_option( 'dnxte_inactive_modules', $modules );
	}

	private static function get_free_modules_map() {
		return array(
			'dnxte-divider'      => array(
				'title'  => __( 'Next Divider', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-next-divider/',
				'icon'   => DIVI_ESSENTIAL_ICON . "DiviNextDivider/icon.svg",
			),
			'dnxte-image-magnifier'      => array(
				'title'  => __( 'Image Magnifier', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-image-magnifier/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'DiviNextImageMagnifier/icon.svg',
			),
			'dnxte-image-reveal'     => array(
				'title'  => __( 'Image Reveal', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-image-reveal/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'DiviNextImageReveal/icon.svg',
			),
			'dnxte-lottie'     => array(
				'title'  => __( 'Lottie', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-lottie/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'DiviNextLottie/icon.svg',
			),
			'dnxte-gallery-slider'     => array(
				'title'  => __( 'Gallery Slider', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-gallery-slider/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'DiviNextThumbsGallery/icon.svg',
			),
			'dnxte-image-hotspot'     => array(
				'title'  => __( 'Image Hotspot', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-hotspot/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'DiviNextTooltip/icon.svg',
			),
			'dnxte-3d-cube-slider'     => array(
				'title'  => __( '3d Cube Slider', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-3d-cube-slider/',
				'icon'   => DIVI_ESSENTIAL_ICON .'DiviNxte3dCubeSlider/icon.svg',
			),
			'dnxte-business-hour'     => array(
				'title'  => __( 'Business Hour', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-business-hour/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'DiviNxteBusinessHour/icon.svg',
			),
			'dnxte-coverflow-slider'     => array(
				'title'  => __( 'Coverflow Slider', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-coverflow-slider/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'DiviNxteCoverflowSlider/icon.svg',
			),
			'dnxte-feature-list'     => array(
				'title'  => __( 'Feature List', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-feature-list/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'DiviNxteFeatureList/icon.svg',
			),
			'dnxte-floating-element'     => array(
				'title'  => __( 'Floating Element', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-floating-elements/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'DiviNxteFloatingElement/icon.svg',
			),
			'dnxte-price-list'     => array(
				'title'  => __( 'Price List', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-price-list/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'DiviNxtePriceList/icon.svg',
			),
			'dnxte-promo-box'     => array(
				'title'  => __( 'Promo Box', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/next-promo-box/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'DiviNxtePromobox/icon.svg',
			),
			'dnxte-testimonial-slider'     => array(
				'title'  => __( 'Testimonial Slider', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-testimonial-carousel/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'DiviNxteTestimonial/icon.svg',
			),
			'dnxte-flip-box'      => array(
				'title'  => __( 'Flip Box', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-flip-box/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'DiviNxtFlipbox/icon.svg',
			),
			'dnxte-logo-carousel'     => array(
				'title'  => __( 'Logo Carousel', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-logo-carousel/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'DiviNxtLogoCarousel/icon.svg',
			),
			'dnxte-person'     => array(
				'title'  => __( 'Person', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-next-person/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'DiviNxtPerson/icon.svg',
			),
			'dnxte-3D-flip-box'     => array(
				'title'  => __( '3D Flip Box', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/3d-flip-box/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'Next3dFlipbox/icon.svg',
			),
			'dnxte-before-after'     => array(
				'title'  => __( 'Before After', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-before-after-module/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextBeforeAfter/icon.svg',
			),
			'dnxte-blurb'     => array(
				'title'  => __( 'Blurb', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-next-blurb/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextBlurb/icon.svg',
			),
			'dnxte-button'     => array(
				'title'  => __( 'Button', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-next-button/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextButton/icon.svg',
			),
			'dnxte-circular-image-hover'     => array(
				'title'  => __( 'Circular Image Hover', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-circular-image-effect/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextCircularImageHover/icon.svg',
			),
			'dnxte-facbook-comment'     => array(
				'title'  => __( 'Facbook Comment', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-facebook-comment/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextComment/icon.svg',
			),
			'dnxte-dual-button'     => array(
				'title'  => __( 'Dual Button', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-dual-button/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextDualButton/icon.svg',
			),
			'dnxte-facebook-embedded-comment'     => array(
				'title'  => __( 'Facebook Embedded Comment', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-embedded-comment/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextEmbeddedComment/icon.svg',
			),
			'dnxte-facebook-embedded-post'     => array(
				'title'  => __( 'Facebook Embedded Post', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-facebook-embedded-post/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextEmbeddedPost/icon.svg',
			),
			'dnxte-facebook-embedded-Video'     => array(
				'title'  => __( 'Facebook Embedded Video', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-facebook-embedded-video/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextEmbeddedVideo/icon.svg',
			),
			'dnxte-facebook-page'     => array(
				'title'  => __( 'Facebook Page', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-facebook-page/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextFBPage/icon.svg',
			),
			'dnxte-facebook-share-button'     => array(
				'title'  => __( 'Facebook Share Button', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-facebook-share/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextFBShareButton/icon.svg',
			),
			'dnxte-text-gradient'     => array(
				'title'  => __( 'Text Gradient', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-gradient-text/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextGradientText/icon.svg',
			),
			'dnxte-image-accordion'     => array(
				'title'  => __( 'Image Accordion', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-image-accordion/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextImageAccordion/icon.svg',
			),
			'dnxte-image-hover-box'     => array(
				'title'  => __( 'Image Hover Box', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-image-hover-box-effect/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextImageHoverBox/icon.svg',
			),
			'dnxte-image-icon-effect'     => array(
				'title'  => __( 'Image Icon Effect', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-image-icon-effect/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextImageIcon/icon.svg',
			),
			'dnxte-image-scroll'     => array(
				'title'  => __( 'Image Scroll', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-image-scroll-effect/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextImageScroll/icon.svg',
			),
			'dnxte-facebook-like-button'     => array(
				'title'  => __( 'Facebook Like Button', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-facebook-like/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextLikeButton/icon.svg',
			),
			'dnxte-masonry-gallery'     => array(
				'title'  => __( 'Masonry Gallery', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-masonry-gallery/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextMasonary/icon.svg',
			),
			'dnxte-mega-image-effect'     => array(
				'title'  => __( 'Mega Image Effect', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-mega-image-effect/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextMegaImageEffect/icon.svg',
			),
			'dnxte-minimal-image'     => array(
				'title'  => __( 'Minimal Image', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-minimal-image-hover-effect/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextMinimalImageHover/icon.svg',
			),
			'dnxte-text-multi-heading'     => array(
				'title'  => __( 'Text Multi Heading', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-multi-heading/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextMultiHeading/icon.svg',
			),
			'dnxte-rating'     => array(
				'title'  => __( 'Divi Rating', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-rating/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextRating/icon.svg',
			),
			'dnxte-divi-review'     => array(
				'title'  => __( 'Divi Review', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-review/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextReview/icon.svg',
			),
			'dnxte-step-flow'     => array(
				'title'  => __( 'Step Flow', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/step-flow/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextStepFlow/icon.svg',
			),
			'dnxte-team-creative'     => array(
				'title'  => __( 'Divi Creative Team', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-creative-team/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextTeamCreative/icon.svg',
			),
			'dnxte-team-member-overlay'     => array(
				'title'  => __( 'Team Member Overlay', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-team-member-overlay/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextTeamOverlay/icon.svg',
			),
			'dnxte-team-overlay-card'     => array(
				'title'  => __( 'Divi Team Overlay Card', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-team-overlay-card/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextTeamOverlayCard/icon.svg',
			),
			'dnxte-team-social-reveal'     => array(
				'title'  => __( 'Team Social Reveal', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-team-social-reveal/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextTeamSocialReveal/icon.svg',
			),
			'dnxte-text-animation'     => array(
				'title'  => __( 'Text Animation', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-text-animation/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextTextAnimation/icon.svg',
			),
			'dnxte-text-color-motion'     => array(
				'title'  => __( 'Text Color Motion', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-text-color-motion/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextTextColorMotion/icon.svg',
			),
			'dnxte-text-divider'     => array(
				'title'  => __( 'Text Divider', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-text-divider/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextTextDivider/icon.svg',
			),
			'dnxte-text-glitch'     => array(
				'title'  => __( 'Text Glitch', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-glitch-text/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextTextGlitch/icon.svg',
			),
			'dnxte-text-highlight'     => array(
				'title'  => __( 'Text Highlight', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-text-highlight/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextTextHighlight/icon.svg',
			),
			'dnxte-text-hover-highlight'  => array(
				'title'  => __( 'Text Hover Highlight', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-text-hover-highlight/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextTextHoverHighlight/icon.svg',
			),
			'dnxte-text-mask'  => array(
				'title'  => __( 'Text Mask', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-text-mask/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextTextMask/icon.svg',
			),
			'dnxte-text-stroke'  => array(
				'title'  => __( 'Text Stroke', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-text-stroke/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextTextStroke/icon.svg',
			),
			'dnxte-text-stroke-motion'  => array(
				'title'  => __( 'Text Stroke Motion', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-text-stroke-motion/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextTextStrokeMotion/icon.svg',
			),
			'dnxte-text-tilt'  => array(
				'title'  => __( 'Text Tilt', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-text-tilt/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextTextTilt/icon.svg',
			),
			'dnxte-timeline'  => array(
				'title'  => __( 'Timeline', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-timeline/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextTimeline/icon.svg',
			),
			'dnxte-twitter-follow'  => array(
				'title'  => __( 'Twitter Follow Button', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-twitter-follow/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextTwitterFollow/icon.svg',
			),
			'dnxte-twitter-share'  => array(
				'title'  => __( 'Twitter Tweet Button', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-twitter-button/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextTwitterShare/icon.svg',
			),
			'dnxte-twitter-timeline'  => array(
				'title'  => __( 'Twitter Timeline', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-twitter-timeline/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextTwitterTimeline/icon.svg',
			),
			'dnxte-twitter-tweet'  => array(
				'title'  => __( 'Twitter Tweet', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-twitter-tweet/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextTwitterTweet/icon.svg',
			),
			'dnxte-ultimate-image-hover'  => array(
				'title'  => __( 'Ultimate Image Hover', 'dnxte-divi-essential' ),
				'demo'   => 'https://www.diviessential.com/divi-ultimate-image-effect/',
				'icon'   => DIVI_ESSENTIAL_ICON . 'NextUltimateImageHover/icon.svg',
			),
		);
	}

	private static function get_pro_modules_map() {
		return array();
	}

	public static function get_modules_map() {
		
		$free_modules_map 	= self::get_free_modules_map();
		$modules_map 		= array_merge( $free_modules_map, self::get_pro_modules_map() );

		uksort( $modules_map, array( __CLASS__, 'sort_widgets') );

		return $modules_map;
	}

	public static function sort_widgets($k1, $k2) {
		return strcasecmp( $k1, $k2 );
	}

	public static function get_tabs() {

		$icon_url = DIVI_ESSENTIAL_ASSETS . 'images/admin/';

		$tabs = array(
			'modules'      => array(
				'title'    => esc_html__( 'Modules', 'dnxte-divi-essential' ),
				'icon'     => '',
				'renderer' => array( __CLASS__, 'render_modules' ),
			),
		);

		return $tabs;
	}

	private static function load_template( $template ) {
		$file = DIVI_ESSENTIAL_DIR . 'includes/admin/view/admin-' . $template . '.php';
		if ( is_readable( $file ) ) {
			include $file;
		}
	}

	public static function render_main() {
		self::load_template( 'main' );
	}

	public static function render_modules() {
		self::load_template( 'modules' );
	}


	/**
	 * 
	 * 5. the required plugin license function start
	 */
	public static function dnext_essential_plugin_updater() {

		// retrieve our license key from the DB
		$license_key = trim(get_option('dnext_essential_license_key'));
	
		// setup the updater
		$edd_updater = new \DNEXT_Essential_Plugin_Updater_Class(DNEXT_ESSENTIAL_STORE_URL, __FILE__,
			array(
				'version' => '4.1.1', // current version number
				'license' => $license_key, // license key (used get_option above to retrieve from DB)
				'item_id' => DNEXT_ESSENTIAL_ITEM_ID, // ID of the product
				'author'  => 'Divi Next', // author of this plugin
				'beta'    => false,
			)
		);
	}

	public static function render_license_page() {
		$license = get_option('dnext_essential_license_key');
		$status = get_option('dnext_essential_license_status');
		?>
		<div class="wrap">
			<h2><?php esc_html_e('Divi Essential License Options', 'dnxte-divi-essential');?></h2>
			<form method="post" action="options.php">
				<?php settings_fields('dnext_essential_license');?>
				<table class="form-table">
					<tbody>
						<tr valign="top">
							<th scope="row" valign="top">
								<?php esc_html_e('License Key', 'dnxte-divi-essential');?>
							</th>
							<td>
								<input id="dnext_essential_license_key" name="dnext_essential_license_key" type="password" class="regular-text" value="<?php esc_attr_e($license);?>" />
								<label class="description" for="dnext_essential_license_key"><?php esc_html_e('Enter your license key', 'dnxte-divi-essential');?></label>
							</td>
						</tr>
						<?php if (false !== $license) {?>
							<tr valign="top">
								<th scope="row" valign="top">
									<?php esc_html_e('Activate License', 'dnxte-divi-essential');?>
								</th>
								<td>
									<?php if (false !== $status && 'valid' == $status) {?>
										<span style="color:green;"><?php esc_html_e('active', 'dnxte-divi-essential');?></span>
										<?php wp_nonce_field('dnext_essential_nonce', 'dnext_essential_nonce');?>
										<input type="submit" class="button-secondary" name="dnext_essential_plugin_license_deactivate" value="<?php esc_attr_e('Deactivate License', 'dnxte-divi-essential');?>"/>
									<?php } else {
			wp_nonce_field('dnext_essential_nonce', 'dnext_essential_nonce');?>
										<input type="submit" class="button-secondary" name="dnext_essential_plugin_license_activate" value="<?php esc_attr_e('Activate License', 'dnxte-divi-essential');?>"/>
									<?php }?>
								</td>
							</tr>
						<?php }?>
					</tbody>
				</table>
				<?php submit_button();?>
			</form>
		<?php
	}

	public static function dnext_essential_register_option() {
		// creates our settings in the options table
		register_setting('dnext_essential_license', 'dnext_essential_license_key', 'dnext_essential_sanitize_license');
	}
	
	public static function dnext_essential_sanitize_license($new) {
		$old = get_option('dnext_essential_license_key');
		if ($old && $old != $new) {
			delete_option('dnext_essential_license_status'); // new license has been entered, so must reactivate
		}
		return $new;
	}

	public static function dnext_essential_activate_license() {

		// listen for our activate button to be clicked
		if (isset($_POST['dnext_essential_plugin_license_activate'])) {
	
			// run a quick security check
			if (!check_admin_referer('dnext_essential_nonce', 'dnext_essential_nonce')) {
				return;
			}
			// get out if we didn't click the Activate button
	
			// retrieve the license from the database
			$license = trim(get_option('dnext_essential_license_key'));
	
			// data to send in our API request
			$api_params = array(
				'edd_action' => 'activate_license',
				'license'    => $license,
				'item_name'  => rawurlencode(DNEXT_ESSENTIAL_ITEM_NAME), // the name of our product in EDD
				'url'        => home_url(),
			);
	
			// Call the custom API.
			$response = wp_remote_post(DNEXT_ESSENTIAL_STORE_URL, array('timeout' => 15, 'sslverify' => false, 'body' => $api_params));
	
			// make sure the response came back okay
			if (is_wp_error($response) || 200 !== wp_remote_retrieve_response_code($response)) {
	
				if (is_wp_error($response)) {
					$message = $response->get_error_message();
				} else {
					$message = __('An error occurred, please try again.', 'dnxte-divi-essential');
				}
	
			} else {
	
				$license_data = json_decode(wp_remote_retrieve_body($response));
	
				if (false === $license_data->success) {
	
					switch ($license_data->error) {
	
					case 'expired':
	
						$message = sprintf(
							__('Your license key expired on %s.', 'dnxte-divi-essential'),
							date_i18n(get_option('date_format'), strtotime($license_data->expires, current_time('mysql')))
						);
						break;
	
					case 'disabled':
					case 'revoked':
	
						$message = __('Your license key has been disabled.', 'dnxte-divi-essential');
						break;
	
					case 'missing':
	
						$message = __('Invalid license.', 'dnxte-divi-essential');
						break;
	
					case 'invalid':
					case 'site_inactive':
	
						$message = __('Your license is not active for this URL.', 'dnxte-divi-essential');
						break;
	
					case 'item_name_mismatch':
	
						$message = sprintf(__('This appears to be an invalid license key for %s.', 'dnxte-divi-essential'), DNEXT_ESSENTIAL_ITEM_NAME);
						break;
	
					case 'no_activations_left':
	
						$message = __('Your license key has reached its activation limit.', 'dnxte-divi-essential');
						break;
	
					default:
	
						$message = __('An error occurred, please try again.', 'dnxte-divi-essential');
						break;
					}
	
				}
	
			}
	
			// Check if anything passed on a message constituting a failure
			if (!empty($message)) {
				$base_url = admin_url('admin.php?page=' . DNEXT_ESSENTIAL_PLUGIN_LICENSE_PAGE);
				$redirect = add_query_arg(array('sl_activation' => 'false', 'message' => rawurlencode($message)), $base_url);
	
				wp_safe_redirect($redirect);
				exit();
			}
	
			// $license_data->license will be either "valid" or "invalid"
	
			update_option('dnext_essential_license_status', $license_data->license);
			wp_safe_redirect(admin_url('admin.php?page=' . DNEXT_ESSENTIAL_PLUGIN_LICENSE_PAGE));
			exit();
		}
	}

	public static function dnext_essential_deactivate_license() {

		// listen for our activate button to be clicked
		if (isset($_POST['dnext_essential_plugin_license_deactivate'])) {
	
			// run a quick security check
			if (!check_admin_referer('dnext_essential_nonce', 'dnext_essential_nonce')) {
				return;
			}
			// get out if we didn't click the Activate button
	
			// retrieve the license from the database
			$license = trim(get_option('dnext_essential_license_key'));
	
			// data to send in our API request
			$api_params = array(
				'edd_action' => 'deactivate_license',
				'license'    => $license,
				'item_name'  => rawurlencode(DNEXT_ESSENTIAL_ITEM_NAME), // the name of our product in EDD
				'url'        => home_url(),
			);
	
			// Call the custom API.
			$response = wp_remote_post(DNEXT_ESSENTIAL_STORE_URL, array('timeout' => 15, 'sslverify' => false, 'body' => $api_params));
	
			// make sure the response came back okay
			if (is_wp_error($response) || 200 !== wp_remote_retrieve_response_code($response)) {
	
				if (is_wp_error($response)) {
					$message = $response->get_error_message();
				} else {
					$message = __('An error occurred, please try again.', 'dnxte-divi-essential');
				}
	
				$base_url = admin_url('admin.php?page=' . DNEXT_ESSENTIAL_PLUGIN_LICENSE_PAGE);
				$redirect = add_query_arg(array('sl_activation' => 'false', 'message' => rawurlencode($message)), $base_url);
	
				wp_safe_redirect($redirect);
				exit();
			}
	
			// decode the license data
			$license_data = json_decode(wp_remote_retrieve_body($response));
	
			// $license_data->license will be either "deactivated" or "failed"
			if ('deactivated' == $license_data->license) {
				delete_option('dnext_essential_license_status');
			}
	
			wp_safe_redirect(admin_url('admin.php?page=' . DNEXT_ESSENTIAL_PLUGIN_LICENSE_PAGE));
			exit();
	
		}
	}

	public static function dnext_essential_check_license() {

		global $wp_version;
	
		$license = trim(get_option('dnext_essential_license_key'));
	
		$api_params = array(
			'edd_action' => 'check_license',
			'license'    => $license,
			'item_name'  => rawurlencode(DNEXT_ESSENTIAL_ITEM_NAME),
			'url'        => home_url(),
		);
	
		// Call the custom API.
		$response = wp_remote_post(DNEXT_ESSENTIAL_STORE_URL, array('timeout' => 15, 'sslverify' => false, 'body' => $api_params));
	
		if (is_wp_error($response)) {
			return false;
		}
	
		$license_data = json_decode(wp_remote_retrieve_body($response));
	
		if ('valid' == $license_data->license) {
			echo 'valid';exit;
			// this license is still valid
		} else {
			echo 'invalid';exit;
			// this license is no longer valid
		}
	}

	public static function dnext_essential_admin_notices() {
		wp_verify_nonce( "dnxte_license" );

		if (isset($_GET['sl_activation']) && !empty($_GET['message'])) {
	
			switch ($_GET['sl_activation']) {
	
			case 'false':
				$message = urldecode(sanitize_text_field($_GET['message']));
				?>
					<div class="error">
						<p><?php echo esc_html_e($message); ?></p>
					</div>
					<?php
			break;
	
			case 'true':
			default:
				// Developers can put a custom success message here for when activation is successful if they way.
				break;
	
			}
		}
	}

	/**
	 * 
	 * 5. the required plugin license function END
	 */
}