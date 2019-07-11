<?php
  /* Template Name: Countries Template
  */
  get_header(); ?>

<div class="container">
	<div class="card text-center">
	  <div class="card-header">
	    <!-- Display Country Name -->
	                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	                <small class="text-muted">
	                <?php 
	                $getCurOff = explode("UTC",esc_html( get_post_meta( get_the_ID(), 'timezones', true )));
	                $getSymbol = $getCurOff[1][0];
	                $secs = explode(":",$getCurOff[1]);
	                $secsCalc = abs($secs[0])*3600+$secs[1]*60;
                    if($getSymbol == '+'){
                    	 $resultVal = get_post_time()+$secsCalc;
                    }
                    else{
                    	$resultVal = get_post_time()-$secsCalc;
                    }
                    echo "Post Published at : ".date('m/d/Y H:i:s', $resultVal);
	                ?></small>
	  </div>
	  <div class="card-body">
	    <p class="card-text">
	      <div class="container">
	        <div class="row">
	           <div class="col-sm-6">
	            <img src="<?php echo esc_html( get_post_meta( get_the_ID(), 'country_flag', true ) ); ?>"  class="rounded" />
	           </div>
	            <div class="col-sm-6">
	            <ul class="list-group">
			  <li class="list-group-item d-flex justify-content-between align-items-center">
			   Top Level Domain
			    <span class="badge badge-primary badge-pill"><?php echo esc_html( get_post_meta( get_the_ID(), 'top_level_domain', true ) ); ?></span>
			  </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center">
			    Alpha2 Code
			    <span class="badge badge-primary badge-pill"> <?php echo esc_html( get_post_meta( get_the_ID(), 'alpha2_code', true ) ); ?></span>
			  </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center">
			    Alpha3 Code
			    <span class="badge badge-primary badge-pill"> <?php echo esc_html( get_post_meta( get_the_ID(), 'alpha3_code', true ) ); ?></span>
			  </li>
			   <li class="list-group-item d-flex justify-content-between align-items-center">
			    Calling Codes
			    <span class="badge badge-primary badge-pill">  <?php echo esc_html( get_post_meta( get_the_ID(), 'calling_codes', true ) ); ?></span>
			  </li>
			    <li class="list-group-item d-flex justify-content-between align-items-center">
			    Timezones
			    <span class="badge badge-primary badge-pill"><?php echo esc_html( get_post_meta( get_the_ID(), 'timezones', true ) ); ?></span>
			  </li>
			   
			    <li class="list-group-item d-flex justify-content-between align-items-center">
			    Currencies
			    <span class="badge badge-primary badge-pill"> <?php echo esc_html( get_post_meta( get_the_ID(), 'currencies', true ) ); ?></span>
			  </li>
			</ul>
	    		   
	           </div>
	        </div>
	      </div>
			          

	    </p>
	      <div class="entry-content"><?php the_content(); ?></div>
	  </div>
	  <div class="card-footer text-muted">
	    Data Retrieved from https://restcountries.eu/
	  </div>
	</div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>