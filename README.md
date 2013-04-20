CakePHP-ThreeScale
==================

A CakePHP Plugin for interacting with 3scale.net.


## Installation

Download the source code from github: https://github.com/robksawyer/CakePHP-ThreeScale.git and place it in the Plugins folder.

If you're using [Composer](http://getcomposer.org), run the following to install dependencies.
		
		composer install

Otherwise, you can download the api from https://github.com/3scale/3scale_ws_api_for_php.

Navigate to the newly created clone and create a bootstrap.php file within Config/[bootstrap.php]. The contents should look like:

		<?php 
			define("THREE_SCALE_PROVIDER_KEY","YOUR PROVIDER KEY");
			define("THREE_SCALE_APP_ID","YOUR APP ID");
			define("THREE_SCALE_APP_KEY","YOUR APP KEY");
		?>


## Usage

Add the ThreeScale component to any controller that you'd like to use it in. Afterwards, you should have access to all of the api methods via a command like: 

		$this-ThreeScale->Client->authorize('YOUR ID','YOUR KEY');


## Legal

Copyright (c) 2013 Rob Sawyer.

Licensed under [The MIT License](http://www.opensource.org/licenses/mit-license.php)<br/>
Redistributions of files must retain the above copyright notice.
