<?php
function _get_user(WP_REST_Request $request) {
	$users = [];
	$data = get_users('role=coach');
	if (empty($data)) {
		return;
	}
	foreach ($data as $value) {
		array_push($users, [
			'ID' => $value->ID,
			'user_email' => $value->user_email, 
			'display_name' => $value->display_name, 
			'user_nicename' => $value->user_nicename, 
			'image' => get_avatar_url($value->ID),
			'calendly_link' => get_field('calendly_link', 'user_'.$value->ID),
			'facebook' => get_field('facebook', 'user_'.$value->ID),
			'twitter' => get_field('twitter', 'user_'.$value->ID),
			'linkedin' => get_field('linkedin', 'user_'.$value->ID),
			'user_meta' => get_user_meta( $value->ID ),
		]);
	}
	return $users;
}

function _get_user_by(WP_REST_Request $req) {
	$data = get_user_by('id', $req['id']);
	$user = [];

	array_push($user, [
		'ID' => $data->ID,
		'user_email' => $data->user_email, 
		'display_name' => $data->display_name, 
		'user_nicename' => $data->user_nicename, 
		'image' => get_avatar_url($data->ID),
		'calendly_link' => get_field('calendly_link', 'user_'.$data->ID),
		'facebook' => get_field('facebook', 'user_'.$data->ID),
		'twitter' => get_field('twitter', 'user_'.$data->ID),
		'linkedin' => get_field('linkedin', 'user_'.$data->ID),
		'user_meta' => get_user_meta( $data->ID ),
	]);
	return $user;
}

add_action('rest_api_init', function() {
	register_rest_route(
		'v1', '/api/coaches/', 
		array(
			'methods' => 'GET',
			'callback' => '_get_user', 
		));
});

add_action('rest_api_init', function() {
	register_rest_route(
		'v1', '/api/coach/(?P<id>\d+)', 
		array(
			'methods' => 'GET',
			'callback' => '_get_user_by', 
		));
});