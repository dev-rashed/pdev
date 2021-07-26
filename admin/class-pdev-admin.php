<?php
class Pdev_Admin {
	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pdev-admin.css', array(), $this->version, 'all' );

	}

	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/pdev-admin.js', array( 'jquery' ), $this->version, false );
	}
	
	public function register_settings_page(){
        add_submenu_page(
			'tools.php',                             // parent slug
			__( 'Page Title', 'pdev' ),      		// page title
			__( 'Pdev', 'pdev' ),      					// menu title
			'manage_options',                        // capability
			'pdev',                           // menu_slug
			array( $this, 'display_settings_page' )  // callable function
		);
    }

	public function display_settings_page() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/pdev-admin-display.php';
	}

	/**
	 * Register the settings for our settings page.
	 *
	 * @since    1.0.0
	 */
	public function register_settings() {

		// Here we are going to register our setting.
		register_setting(
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings',
			array( $this, 'sandbox_register_setting' )
		);

		// Here we are going to add a section for our setting.
		add_settings_section(
			$this->plugin_name . '-settings-section',
			__( 'Settings', 'pdev' ),
			array( $this, 'sandbox_add_settings_section' ),
			$this->plugin_name . '-settings'
		);

		// Here we are going to add fields to our section.
		add_settings_field(
			'post-types',
			__( 'Post Types', 'pdev' ),
			array( $this, 'sandbox_add_settings_field_multiple_checkbox' ),
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings-section',
			array(
				'label_for' => 'post-types',
				'description' => __( 'Save button will be added only to the checked post types.', 'pdev' )
			)
		);
		add_settings_field(
			'toggle-content-override',
			__( 'Append Button', 'pdev' ),
			array( $this, 'sandbox_add_settings_field_single_checkbox' ),
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings-section',
			array(
				'label_for' => 'toggle-content-override',
				'description' => __( 'If checked, it will append save button to the content.', 'pdev' )
			)
		);
		add_settings_field(
			'toggle-status-override',
			__( 'Membership', 'pdev' ),
			array( $this, 'sandbox_add_settings_field_single_checkbox' ),
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings-section',
			array(
				'label_for' => 'toggle-status-override',
				'description' => __( 'If checked, this feature will be available only to logged in users. ', 'pdev' )
			)
		);
		add_settings_field(
			'toggle-css-override',
			__( 'Our Styles', 'pdev' ),
			array( $this, 'sandbox_add_settings_field_single_checkbox' ),
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings-section',
			array(
				'label_for' => 'toggle-css-override',
				'description' => __( 'If checked, our style will be used.', 'pdev' )
			)
		);
		add_settings_field(
			'text-save',
			__( 'Save Item', 'pdev' ),
			array( $this, 'sandbox_add_settings_field_input_text' ),
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings-section',
			array(
				'label_for' => 'text-save',
				'default'   => __( 'Save Item', 'pdev' )
			)
		);
		add_settings_field(
			'text-unsave',
			__( 'Unsave Item', 'pdev' ),
			array( $this, 'sandbox_add_settings_field_input_text' ),
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings-section',
			array(
				'label_for' => 'text-unsave',
				'default'   => __( 'Unsave Item', 'pdev' )
			)
		);
		add_settings_field(
			'text-saved',
			__( 'Saved. See saved items.', 'pdev' ),
			array( $this, 'sandbox_add_settings_field_input_text' ),
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings-section',
			array(
				'label_for' => 'text-saved',
				'default'   => __( 'Saved. See saved items.', 'pdev' )
			)
		);
		add_settings_field(
			'text-no-saved',
			__( 'You don\'t have any saved items.', 'pdev' ),
			array( $this, 'sandbox_add_settings_field_input_text' ),
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings-section',
			array(
				'label_for' => 'text-no-saved',
				'default'   => __( 'You don\'t have any saved items.', 'pdev' )
			)
		);

	}

}