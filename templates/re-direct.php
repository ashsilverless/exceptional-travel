<?php
    /*
        Template Name: Re-Direct
    */
?>

<?php get_header(); ?>

<main id="main" class="homepage-template re-direct-template" tabindex="-1">

	<div class="intro">
		<?php echo do_shortcode( '[rev_slider alias="home-hero"]' ); ?>
<div class="redirect-overlay">
	<img src="<?php the_field('logo');?>"/>
<h1><?php the_field('heading');?></h1>
<?php the_field('copy');?>

<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="exceptional-travel-button"><span>Continue to the <b>Exceptional Travel</b> Website</span></a>

</div>
		<div class="hello-section__scroll-down text-center">
			<a href="#cta-home" class="d-inline-block scroll">
			    <span class="hello-section__scroll-down__arrow">
			        <i class="fa fa-angle-down" aria-hidden="true"></i>
			    </span>
			</a>
		</div><!-- /.hello-section__scroll-down text-center -->
		
	</div><!-- /.intro -->

	<div id="cta-home" class="cta-home"></div><!-- /#cta-home.cta-home -->

	

</main><!-- /#main.homepage-template -->

<?php get_footer(); ?>