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



	public static function get_instance() {
		if (is_null(static::$instance)) {
			static::$instance = new static();
		}

		return static::$instance;
	}



	protected function enqueue_block_editor_assets(): void {
		wp_enqueue_script(
			'cla-theme-editor-js',
			get_stylesheet_directory_uri() . '/assets/js/editor.js',
			array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
			filemtime(get_stylesheet_directory() . '/assets/js/editor.js'),
			true
		);
	}



	protected function enqueue_block_styles(): void {
		$prefix = $this->textdomain . '-block-styles-';

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
			'cla/header'
		);
		$styles = array(
			array(
				'is_default'	=> true,
				'name'			=> 'default',
				'label'			=> __('Default', $this->textdomain)
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
		add_filter('get_custom_logo', array($this, 'wp_hook_get_custom_logo'));
		add_action('init', array($this, 'wp_hook_init'));
	}



	public function wp_hook_get_custom_logo($html): string {
		$custom_logo_id = get_theme_mod('custom_logo');

		if (empty($custom_logo_id)) {
			$custom_logo_element = '<img src="' . get_stylesheet_directory_uri() . '/assets/images/logo.png" alt="Kaylor of Colorado" />';

			$html = sprintf('<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>', esc_url(home_url('/')), $custom_logo_element);
		}

		return $html;
	}



	public function wp_hook_init() {
		$this->register_block_pattern_categories();
		$this->register_block_types();
		$this->register_block_styles();
		$this->enqueue_block_styles();
		$this->enqueue_block_editor_assets();
	}
}
Theme::get_instance();