<?php

function coach_member_create_db() {

	global $wpdb;
	
	$table_name = $wpdb->prefix . 'coach_members';
	
	if ( $wpdb->get_var('SHOW TABLES LIKE ' . $table_name) != $table_name ) {
		$sql = 'CREATE TABLE '. $table_name . '(
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			user_id_subscriber INTEGER(10),
			user_id_coach INTEGER(10),
			PRIMARY KEY (id) 
		)';

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}

	add_option('coach_members_database_version', '1.0');
}

add_action( 'init', 'coach_member_create_db' );