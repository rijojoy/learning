<?php
  /* Template Name: Countries Template
  */
  get_header(); ?>
<div id="primary">
    <div id="content" role="main">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
 
     
                <!-- Display Country Name -->
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                <img src="<?php echo esc_html( get_post_meta( get_the_ID(), 'country_flag', true ) ); ?>" />
                <strong>Top Level Domain: </strong>
                <?php echo esc_html( get_post_meta( get_the_ID(), 'top_level_domain', true ) ); ?>
                <br />
                <strong>Alpha2 Code: </strong>
                 <?php echo esc_html( get_post_meta( get_the_ID(), 'alpha2_code', true ) ); ?><br />
                <strong>Alpha3 Code: </strong>
                <?php echo esc_html( get_post_meta( get_the_ID(), 'alpha3_code', true ) ); ?>
                <br />
                <strong>Calling Codes: </strong>
                 <?php echo esc_html( get_post_meta( get_the_ID(), 'calling_codes', true ) ); ?><br />
                <strong>Timezones: </strong>
                <?php echo esc_html( get_post_meta( get_the_ID(), 'timezones', true ) ); ?>
                <br />
                <strong>Currencies: </strong> 
                <?php echo esc_html( get_post_meta( get_the_ID(), 'currencies', true ) ); ?><br />
             
            </header>
 
            <!-- Display movie review contents -->
            <div class="entry-content"><?php the_content(); ?></div>
        </article>
    </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>