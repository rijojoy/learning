<?php

namespace Inc;

class AdminCustomFieldsAction {

	static function save($country_id,$country){

		//Check Post Type
	    if($country->post_type == 'countries'){

	    	// Store Country Name
	    	if(isset( $_POST['country_name']) && $_POST['country_name'] != ''){

	    		update_post_meta( $country_id, 'country_name', $_POST['country_name']);    	
  				 
	    	}

            if(isset( $_POST['top_level_domain']) && $_POST['top_level_domain'] != ''){

	    		update_post_meta( $country_id, 'top_level_domain', $_POST['top_level_domain']);
	    	}

	    	if(isset( $_POST['alpha2_code']) && $_POST['alpha2_code'] != ''){

	    		update_post_meta( $country_id, 'alpha2_code', $_POST['alpha2_code']);
	    	}

	    	if(isset( $_POST['alpha3_code']) && $_POST['alpha3_code'] != ''){

	    		update_post_meta( $country_id, 'alpha3_code', $_POST['alpha3_code']);
	    	}

            if(isset( $_POST['calling_codes']) && $_POST['calling_codes'] != ''){

	    		update_post_meta( $country_id, 'calling_codes', $_POST['calling_codes']);
	    	}

	    	if(isset( $_POST['timezones']) && $_POST['timezones'] != ''){

	    		update_post_meta( $country_id, 'timezones', $_POST['timezones']);
	    	}

	    	if(isset( $_POST['currencies']) && $_POST['currencies'] != ''){

	    		update_post_meta( $country_id, 'currencies', $_POST['currencies']);
	    	}

	    	if(isset( $_POST['country_flag']) && $_POST['country_flag'] != ''){

	    		update_post_meta( $country_id, 'country_flag', $_POST['country_flag']);
	    	}
            

	    }

	}
}