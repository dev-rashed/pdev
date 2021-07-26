<?php
class Pdev_Activator {

	public static function activate() {
		$saved_page_args 	= array (
			'post_title' 	=> __('My Page', 'pdev'),
			'post_content'	=> ( '[pdev-content]'),
			'post_status' 	=> ( 'publish'),
			'post_type' 	=> ( 'page')
		);

		$saved_page_id = wp_insert_post($saved_page_args);
		add_option('pdev_saved_page_id', $saved_page_id);
	}

}
