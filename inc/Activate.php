<?php
/** 
 * Call this function on plugin activation
 **/
namespace Inc;

class Activate {

	static function activate(){
		flush_rewrite_rules();
	}
}