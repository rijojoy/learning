<?php
/** 
 * Call this function when plugin deactivation
 **/
namespace Inc;

Class Deactivate {

	static function deactivate(){
		flush_rewrite_rules();
	}
}