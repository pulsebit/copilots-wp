<?php
// wp_coach_members
require 'auth/vendor/autoload.php';

function register(WP_REST_Request $req) {
	$param = $req->get_body_params();

	$response = array(
		'firstName' => $params['firstName'],
		'lastName' => $params['lastName'],
		'mobileNumber' => $params['mobileNumber'],
		'email' => $params['email'],
		'username' => $params['username'],
		'password' => $params['password'],
	);

	return $response;
}


function auth_jwt_facebook(WP_REST_Request $request) {
	return 'test';
}

add_action('rest_api_init', function() {
	register_rest_route(
		'v1', '/api/user/facebook-auth/', 
		array(
			'methods' => 'POST',
			'callback' => 'auth_jwt_facebook', 
		));
});

add_action('rest_api_init', function() {
	register_rest_route(
		'v1', '/api/user/register/', 
		array(
			'methods' => 'POST',
			'callback' => 'register', 
		));
});