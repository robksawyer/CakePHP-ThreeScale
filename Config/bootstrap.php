<?php 
/**
 * API MANAGEMENT 3SCALE
 * Instructions: Be sure to run ThreeScale => array('bootstrap'=>true) on load of the Plugin
 * app_id = client_id
 * app_key = client_secret
 */
$threescale = array(
	'Threescale' => array(
		'provider_key' => getenv('THREE_SCALE_PROVIDER_KEY'),
		'app_id' => getenv('THREE_SCALE_APP_ID'),
		'app_key' => getenv('THREE_SCALE_APP_KEY'),
		'endpoint' => getenv('THREE_SCALE_ENDPOINT'),
		'account_id' => getenv('THREE_SCALE_ACCOUNT_ID')
	)
);

Configure::write('Threescale', $threescale);

?>