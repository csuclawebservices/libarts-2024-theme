<?php

namespace libarts_twenty_twenty_four_theme;

class Theme {
	/**
	 * Instance
	 * 
	 * @since 0.1.0
	 * @access protected
	 * @var Theme $instance
	 */
	protected static $instance = null;

	/**
	 * Parent Theme
	 * 
	 * @since 0.3.0
	 * @access protected
	 * @var Theme $parent_theme
	 */
	protected ?\infinitum\inc\Theme $parent_theme = null;

	/**
	 * Text Domain
	 * 
	 * @since 0.1.0
	 * @access public
	 * @var string $textdomain
	 */
	public readonly string $textdomain;

	protected function __construct() {
		$this->textdomain = 'cla';
		$this->set_hooks();
	}



	public static function get_instance($parent_theme = null) {
		if (is_null(static::$instance)) {
			static::$instance = new static($parent_theme);
		}

		return static::$instance;
	}



	protected function enqueue_block_assets(): void {
		wp_enqueue_style('cla-is-decoration', get_theme_file_uri('assets/css/is-decoration.css'));
		wp_enqueue_style('cla-is-responsive', get_theme_file_uri('assets/css/is-responsive.css'));
	}



	protected function enqueue_block_editor_assets(): void {
		$editor_asset = include get_stylesheet_directory() . '/assets/js/editor.asset.php';

		wp_enqueue_script('cla-theme-editor-js', get_stylesheet_directory_uri() . '/assets/js/editor.js', $editor_asset['dependencies'], $editor_asset['version'], true);
		wp_enqueue_style('cla-theme-editor-css', get_stylesheet_directory_uri() . '/assets/js/index.css', array(), $editor_asset['version']);
	}



	protected function enqueue_block_styles(): void {
		$prefix = $this->textdomain . '-block-styles-';

		wp_enqueue_block_style('cla-blocks/accordion-item', array(
			'handle'	=> $prefix . '-cla-blocks-accordion-item',
			'src'		=> get_theme_file_uri('assets/css/blocks/cla-blocks-accordion-item.css'),
			'path'		=> get_theme_file_path('assets/css/blocks/cla-blocks-accordion-item.css')
		));

		wp_enqueue_block_style('cla-blocks/call-to-action', array(
			'handle'	=> $prefix . '-cla-blocks-call-to-action',
			'src'		=> get_theme_file_uri('assets/css/blocks/cla-blocks-call-to-action.css'),
			'path'		=> get_theme_file_path('assets/css/blocks/cla-blocks-call-to-action.css')
		));

		wp_enqueue_block_style('cla-blocks/image-group', array(
			'handle'	=> $prefix . '-cla-blocks-image-group',
			'src'		=> get_theme_file_uri('assets/css/blocks/cla-blocks-image-group.css'),
			'path'		=> get_theme_file_path('assets/css/blocks/cla-blocks-image-group.css')
		));

		wp_enqueue_block_style('cla-blocks/image-group-item', array(
			'handle'	=> $prefix . '-cla-blocks-image-group-item',
			'src'		=> get_theme_file_uri('assets/css/blocks/cla-blocks-image-group-item.css'),
			'path'		=> get_theme_file_path('assets/css/blocks/cla-blocks-image-group-item.css')
		));

		wp_enqueue_block_style('cla-blocks/sequence', array(
			'handle'	=> $prefix . '-cla-blocks-sequence',
			'src'		=> get_theme_file_uri('assets/css/blocks/cla-blocks-sequence.css'),
			'path'		=> get_theme_file_path('assets/css/blocks/cla-blocks-sequence.css')
		));

		wp_enqueue_block_style('cla-blocks/sequence-item', array(
			'handle'	=> $prefix . '-cla-blocks-sequence-item',
			'src'		=> get_theme_file_uri('assets/css/blocks/cla-blocks-sequence-item.css'),
			'path'		=> get_theme_file_path('assets/css/blocks/cla-blocks-sequence-item.css')
		));

		wp_enqueue_block_style('core/button', array(
			'handle'	=> $prefix . '-core-button',
			'src'		=> get_theme_file_uri('assets/css/blocks/core-button.css'),
			'path'		=> get_theme_file_path('assets/css/blocks/core-button.css')
		));

		wp_enqueue_block_style('core/paragraph', array(
			'handle'	=> $prefix . '-core-paragraph',
			'src'		=> get_theme_file_uri('assets/css/blocks/core-paragraph.css'),
			'path'		=> get_theme_file_path('assets/css/blocks/core-paragraph.css')
		));

		wp_enqueue_block_style('core/site-logo', array(
			'handle'	=> $prefix . '-core-site-logo',
			'src'		=> get_theme_file_uri('assets/css/blocks/core-site-logo.css'),
			'path'		=> get_theme_file_path('assets/css/blocks/core-site-logo.css')
		));

		wp_enqueue_block_style('core/spacer', array(
			'handle'	=> $prefix . '-core-spacer',
			'src'		=> get_theme_file_uri('assets/css/blocks/core-spacer.css'),
			'path'		=> get_theme_file_path('assets/css/blocks/core-spacer.css')
		));

		wp_enqueue_block_style('infinitum/breadcrumbs', array(
			'handle' 	=> $prefix . '-infinitum-breadcrumbs',
			'src'		=> get_theme_file_uri('assets/css/blocks/infinitum-breadcrumbs.css'),
			'path'		=> get_theme_file_path('assets/css/blocks/infinitum-breadcrumbs.css')
		));
	}



	/**
	 * Maybe set the page template. This only happens if it's a page and when the page is being first created
	 * 	and not being updated.
	 * 
	 * @since 0.4.0
	 * 
	 * @see wp_hook_wp_insert_post
	 * 
	 * @param int		$post_id
	 * @param WP_Post	$post
	 * @param bool		$update
	 * @return void
	 */
	protected function maybe_set_page_template($post_id, $post, $update): void {
		// If the post type is 'page' and the current $update action is NOT update (meaning only new pages)
		if ($post->post_type === 'page' && !$update) {
			$this->parent_theme->set_page_template($post_id, 'blank', array(''));
		}
	}



	/**
	 * Register block pattern categories
	 * 
	 * @since 0.1.0
	 * 
	 * @return void
	 */
	protected function register_block_pattern_categories(): void {
		register_block_pattern_category('typography', array(
			'label' => __('Typography', $this->textdomain)
		));

		//unregister_block_pattern_category('infinitum');
	}



	/**
	 * Register block style: core/button
	 * 
	 * @since 0.1.0
	 * 
	 * @return void
	 */
	protected function register_block_style__core__button(): void {
		$block_name = 'core/button';
		$styles = array(
			array(
				'name'		=> 'with-texture',
				'label'		=> __('With Texture')
			),
			array(
				'name'		=> 'arrow-only',
				'label'		=> __('Arrow Only')
			)
			
		);

		foreach ($styles as $style_properties) {
			register_block_style($block_name, $style_properties);
		}
	}



	/**
	 * Register block style: core/site-logo
	 * 
	 * @since 0.2.0
	 * 
	 * @return void
	 */
	protected function register_block_style__core__site_logo(): void {
		$block_name = 'core/site-logo';
		$styles = array(
			array(
				'name'			=> 'stacked',
				'label'			=> __('Stacked', $this->textdomain)
			),
			array(
				'name'			=> 'acronym',
				'label'			=> __('Acronym', $this->textdomain)
			)
		);

		foreach ($styles as $style_properties) {
			register_block_style($block_name, $style_properties);
		}
	}



	/**
	 * Register block style: core/spacer
	 * 
	 * @since 0.1.0
	 * 
	 * @return void
	 */
	protected function register_block_style__core__spacer(): void {
		$block_name = 'core/spacer';
		$styles = array(
			array(
				'is_default'	=> true,
				'name'			=> 'default',
				'label'			=> __('Default', $this->textdomain)
			),
			array(
				'name'			=> 'responsive-large',
				'label'			=> __('Responsive Large', $this->textdomain)
			),
			array(
				'name'			=> 'responsive-small',
				'label'			=> __('Responsive Small', $this->textdomain)
			)
		);

		foreach ($styles as $style_properties) {
			register_block_style($block_name, $style_properties);
		}
	}



	/**
	 * Register block style: colors
	 * 
	 * @since 0.1.0
	 * 
	 * @return void
	 */
	protected function register_block_style_colors(): void {
		$supported_blocks = array(
			'cla-blocks/call-to-action',
			'cla-blocks/image-group',
			'cla-blocks/image-group-item',
			'cla-blocks/sequence',
			'cla-blocks/sequence-item',
			'cla/header',
			'core/group'
		);
		$styles = array(
			array(
				'name'			=> 'energy-green',
				'label'			=> 'Energy Green'
			),
			array(
				'name'			=> 'horsetooth-blue',
				'label'			=> 'Horsetooth Blue'
			),
			array(
				'name'			=> 'lovers-lane',
				'label'			=> 'Lovers Lane'
			),
			array(
				'name'			=> 'powered-purple',
				'label'			=> 'Powered Purple'
			)
		);

		foreach ($supported_blocks as $block_name) {
			foreach ($styles as $style_properties) {
				register_block_style($block_name, $style_properties);
			}
		}
	}



	protected function register_block_style_halftone(): void {
		$supported_blocks = array(
			'core/image'
		);
		$styles = array(
			array(
				'name'			=> 'halftone',
				'label'			=> 'Halftone'
			)
		);

		foreach ($supported_blocks as $block_name) {
			foreach ($styles as $style_properties) {
				register_block_style($block_name, $style_properties);
			}
		}
	}



	protected function register_block_style_typography(): void {
		$supported_blocks = array(
			'core/paragraph'
		);
		$styles = array(
			array(
				'name'			=> 'emphasis-headline-large',
				'label'			=> 'Emphasis Large'
			),
			array(
				'name'			=> 'emphasis-headline-small',
				'label'			=> 'Emphasis Small'
			),
			array(
				'name'			=> 'highlight-headline',
				'label'			=> 'Highlight'
			)
		);

		foreach ($supported_blocks as $block_name) {
			foreach ($styles as $style_properties) {
				register_block_style($block_name, $style_properties);
			}
		}
	}



	protected function register_block_styles() {
		$this->register_block_style__core__button();
		$this->register_block_style__core__site_logo();
		$this->register_block_style__core__spacer();
		$this->register_block_style_colors();
		$this->register_block_style_halftone();
		$this->register_block_style_typography();
	}



	protected function register_block_types() {
		register_block_type(get_stylesheet_directory() . '/blocks/header/');
	}



	protected function set_hooks() {
		add_action('after_setup_theme', array($this, 'wp_hook_after_setup_theme'), 1);
		add_filter('block_type_metadata_settings', array($this, 'wp_hook_block_type_metadata_settings'), 10, 2);
		add_action('enqueue_block_assets', array($this, 'wp_hook_enqueue_block_assets'), 10);
		add_action('init', array($this, 'wp_hook_init'));
		add_action('wp_insert_post', array($this, 'wp_hook_wp_insert_post'), 10, 3);
	}



	public function wp_hook_enqueue_block_assets(): void {
		$this->enqueue_block_assets();
	}



	/**
	 * WP Hook: after_setup_theme
	 * 
	 * @since 0.4.0
	 * @return void
	 */
	public function wp_hook_after_setup_theme(): void {
		// Set the parent_theme property immediately after the child theme and parent themes are loaded
		$this->parent_theme = \infinitum\inc\Theme::get_instance();
	}



	/**
	 * Filter block metadata settings
	 * 
	 * @since 0.3.0
	 * 
	 * @param array	$settings
	 * @param array $metadata
	 * @return array
	 */
	public function wp_hook_block_type_metadata_settings($settings, $metadata) {
		// core/spacer - set default height
		if ($settings['name'] === 'core/spacer') {
			$settings['attributes']['height']['default'] = 'var:preset|spacing|4';
		}

		return $settings;
	}



	public function wp_hook_init(): void {
		$this->register_block_pattern_categories();
		$this->register_block_types();
		$this->register_block_styles();
		$this->enqueue_block_styles();
		$this->enqueue_block_editor_assets();
	}



	/**
	 * WP Hook: wp_insert_post
	 * 
	 * @since 0.4.0
	 * 
	 * @see wp_hook_wp_insert_post
	 * 
	 * @param int		$post_id
	 * @param WP_Post	$post
	 * @param bool		$update
	 * @return void
	 */
	public function wp_hook_wp_insert_post($post_id, $post, $update): void {
		$this->maybe_set_page_template($post_id, $post, $update);
	}
}
Theme::get_instance();