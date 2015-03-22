<?php
/**
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2014, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

return 
	array(
		//"base_url" => "http://localhost/hybridauth-git/hybridauth/", 
		"base_url" => "http://sattapatta.com/hybridauth/auth",

		"providers" => array ( 
			// openid providers
			"OpenID" => array (
				"enabled" => true
			),

			"Yahoo" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "", "secret" => "" ),
			),

			"AOL"  => array ( 
				"enabled" => true 
			),

			"Google" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "329003795106-pn45qd562keqjg4q4lrfkdsk2jv24aui.apps.googleusercontent.com", "secret" => "mO8xVp8C_5-lKDX-pUnTo9AD" ), 
			),

			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "826606800708243", "secret" => "e3b224c40f6a03722c4d1cbd2f825538" ),
				"trustForwarded" => false
			),

			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "gqc1pvDbKOPHdF9gpNPZUEyIt", "secret" => "cDh1CbOVuSw2OCP30nuJbR7C9vircW9cJOju2S0zeLvtY47fCH" ) 
			),

			// windows live
			"Live" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" ) 
			),

			"LinkedIn" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "", "secret" => "" ) 
			),

			"Foursquare" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" ) 
			),
		),

		// If you want to enable logging, set 'debug_mode' to true.
		// You can also set it to
		// - "error" To log only error messages. Useful in production
		// - "info" To log info and error messages (ignore debug messages) 
		"debug_mode" => false,

		// Path to file writable by the web server. Required if 'debug_mode' is not false
		"debug_file" => "",
	);
