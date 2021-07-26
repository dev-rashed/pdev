<?php

class Pdev_Deactivator {

	public static function deactivate() {
		$saved_page_id = get_option( 'pdev_saved_page_id' );
		if ( $saved_page_id ) {
			wp_delete_post( $saved_page_id, true );
			delete_option( 'saved_page_id' );
		}
	}

}
