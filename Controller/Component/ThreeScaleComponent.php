<?php
Configure::load('ThreeScale.three_scale');

/**
 * ThreeScaleComponent
 *
 * Provides an entry point into the Amazon SDK.
 */
class ThreeScaleComponent extends Component {

/**
* Holds an array of valid service "names" and the class that corresponds
* to each one.
*
* @var array
* @access private
*/
	private $__services = array(
		'Client' => 'ThreeScaleClient',
		//'Response' => 'ThreeScaleResponse',
		//'AuthResponse' => 'ThreeScaleAuthorizeResponse'
	);

/**
* Constructor
* saves the controller reference for later use
* @param ComponentCollection $collection A ComponentCollection this component can use to lazy load its components
* @param array $settings Array of configuration settings.
*/
	public function __construct(ComponentCollection $collection, $settings = array()) {
		$this->_controller = $collection->getController();
		parent::__construct($collection, $settings);
	}
	
/**
* Initialization method. Triggered before the controller's `beforeFilfer`
* method but after the model instantiation.
*
* @param Controller $controller
* @param array $settings
* @return null
* @access public
*/
	public function initialize(Controller $controller) {
		// Handle loading our library firstly...
		App::build(array('Vendor' => array(
			APP.'Plugin'.DS.'ThreeScale'.DS .'Vendor'.DS)
		));	
		App::import('Vendor', 'ThreeScale', array(
			'file' => '3scale_ws_api'.DS.'lib'.DS.'ThreeScaleClient.php'
		));
	}

/**
* A helper method that reports a single hit
* @param string app_id The user's app id. The hits will be applied to this account
* @param int hits The total number of hits to track
* @return 
*/
	public function report($app_id, $hits = 1){
		$client = $this->__createService('ThreeScaleClient');
		return $client->report(array(
			array(
				'app_id' => $app_id,
				'timestamp' => strtotime('now'),
				'usage'	=> array('hits' => $hits)
			)
		));
	}

/**
* PHP magic method for satisfying requests for undefined variables. We
* will attempt to determine the service that the user is requesting and
* start it up for them.
*
* @var string $variable
* @return mixed
* @access public
*/
	public function __get($variable) {
		if (in_array($variable, array_keys($this->__services))) {

			// Store away the requested class for future usage.
			$this->$variable = $this->__createService(
			$this->__services[$variable]
			);
			// Return the class back to the caller
			return $this->$variable;
		}
	}

/**
* Instantiates and returns a new instance of the requested `$class`
* object.
*
* @param string $class
* @return object
* @access private
*/
	private function __createService($class) {
		return new $class(Configure::read('ThreeScale.provider_key'));
	}

}