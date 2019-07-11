<?php
/**
Plugin Name: REST Countries API
description: Display REST Countries using [short-code]
Version: 1.0
Author: Rijo J
License: GPLv2 or later
Text Domain: restcountries-api
*/

defined( 'ABSPATH' ) or die( 'No direct access allowed!!!' );

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
require_once dirname(__FILE__).'/vendor/autoload.php';
}

use Inc\Activate;
use Inc\Deactivate;
use Inc\AdminCustomFieldsAction;
use Templates\Admin\Index as AdminTemplate;
use Templates\Admin\CustomFields;
use Templates\Front\Form as FormTemplate;


register_activation_hook( __FILE__, array('Activate','activate'));
register_deactivation_hook( __FILE__, array('Deactivate','deactivate'));

class RestCountriesApi {
   function register(){
      
       // Enqueue Backend Scripts
   	   add_action( 'admin_enqueue_scripts', array($this, 'EnqueueBackend') );
   	   // Enqueue Frontend Scripts
   	   add_action( 'wp_enqueue_scripts', array($this, 'EnqueueFrontend') );
       // Add Custom Post Type 'Countries'
       add_action( 'init', array($this,'CreateCountriesType'));
       // Add Custom Fields
       add_action( 'admin_init', array($this,'AdminMeta'));
       // Save Fields
       add_action( 'save_post', array($this,'AddCountryFields'), 10, 2 );
       // Include Template function
       add_filter( 'template_include', array($this,'IncludeCountryTemplate'), 1);
   	   // Add admin page
   	  // add_action('admin_menu',array($this,'add_admin_pages'));
       // Add Short Code
       //add_shortcode( "display_restcountries", array($this,"display_restcountries_func") );
   }

   
   function EnqueueBackend() {
        wp_enqueue_style( 'Select2Style', plugins_url('/assets/select2/css/select2.min.css', __FILE__));
        wp_enqueue_script( 'Select2Script', plugins_url('/assets/select2/js/select2.full.min.js', __FILE__), array('jquery'));
        wp_enqueue_script( 'Custom', plugins_url('/assets/js/custom.js', __FILE__), array('jquery','Select2Script'));
        wp_enqueue_style( 'CustomStyleAdmin', plugins_url('/assets/css/admin_custom.css', __FILE__));
   }

    function EnqueueFrontend() {

   }

   function CreateCountriesType() {
   	register_post_type( 'countries', 

         [
            'labels' => [

                  'name' => 'Countries',
                  'singular_name' => 'Country',
                  'add_new' => 'Add New',
                  'add_new_item' => 'Add New Country',
                  'edit' => 'Edit',
                  'edit_item' => 'Edit Country',
                  'new_item' => 'New Country',
                  'view' => 'View',

            ],

            'public' => true,
            'menu_position' => 15,
            'supports' => [''],
            'taxonomies' => [],
            'has_archive' => true

         ]
   		);
   }
   

   function AdminMeta() {
        
        add_meta_box ( 'countries_meta_box', 
        	           'Countries', 
        	           array($this,'DisplayCountryMetaBox'), 
        	           'countries',
        	           'normal',
        	           'high'
        	          );
   }
   
   function DisplayCountryMetaBox($country) {
      CustomFields::getCountryMetaBox($country);
   }

   function AddCountryFields($country_id,$country){
   	remove_action( 'save_post', array($this,'AddCountryFields'), 10, 2 );
	   	if(isset( $_POST['country_name']) && $_POST['country_name'] != ''){
	   		  // check the slug and run an update if necessary 
   			 $new_slug = sanitize_title( $_POST['country_name'] );

    		// use this line if you have multiple posts with the same title
    		$new_slug = wp_unique_post_slug( $new_slug, $country_id, $country->post_status, $country->post_type, $country->post_parent );
	   		$updatePost = [ 
	   		                 "ID" => $country_id,
	   		                 "post_name" => $new_slug,
	   		                 "post_title" => $_POST['country_name']
	   		              ];
	   		wp_update_post( $updatePost );
	   	}
   	  add_action( 'save_post', array($this,'AddCountryFields'), 10, 2 );
   	  AdminCustomFieldsAction::save($country_id,$country);
   }

   function IncludeCountryTemplate( $template_path ) {

        if( get_post_type() == 'countries'){
        	if( is_single() ){
        		if( $theme_file = locate_template( array('single-countries.php') ) ){
        			$template_path = $theme_file;
        		}
        		else
        		{
        		    $template_path = plugin_dir_path( __FILE__ ).'/page_templates/single-countries.php';

        	    }
        	}
        }
        return $template_path;
   }

   function add_admin_pages() {
      add_menu_page('RestCountriesApi','RestCountriesApi','manage_options','restcountriesapi_plugin',array('admin_index'),'',110);
   }
   
   function display_restcountries_func() {
   	FormTemplate::getTemplate();
   }

   function activate(){
   	Activate::activate();
   }

   function deactivate(){
   	Deactivate::deactivate();
   }
}



if(class_exists('RestCountriesApi')){
	$RestCountriesApi = new RestCountriesApi();
	$RestCountriesApi->register();
	register_activation_hook( __FILE__, array($RestCountriesApi,'activate'));
	register_deactivation_hook( __FILE__, array($RestCountriesApi,'deactivate'));
}    