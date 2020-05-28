<?php 
require_once 'stripe/vendor/autoload.php';

function handle_payment(WP_REST_Request $request) {
	\Stripe\Stripe::setApiKey('sk_test_6ANjLssL6ovwkoGOviV7tTFM001LbbN3TZ');
	$amount = 495;
	$parameters = $request->get_params();

	$token = $parameters['token'];
	$email = $parameters['email'];

	$customer = \Stripe\Customer::create(array(
		'email' => $email,
		'source' => $token
	));

	$charge = \Stripe\Charge::create([
	  'amount' => $amount * 100,
	  'currency' => 'usd',
	  'description' => 'Test charge',
	  'customer' => $customer->id,
	]);
	
	return [$customer, $charge];
}

add_action('rest_api_init', function() {
	register_rest_route(
		'v1', '/handle_payment', 
		array(
			'methods' => 'POST',
			'callback' => 'handle_payment', 
		));
});