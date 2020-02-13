<?php
    /*
        Template Name: Contact
    */
?>

<?php get_header(); ?>

<main id="main" class="contact-page-template" tabindex="-1">

	<section class="hello-section background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center parallax-window" data-parallax="scroll" data-bleed="100" data-image-src="<?php if ( has_post_thumbnail() ) { echo get_the_post_thumbnail_url(); } else { echo get_template_directory_uri().'/images/bgd__testimonials.jpg';}?>">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="hello-section__title"><?php the_title(); ?></h1><!-- /.hello-section__title -->
				</div><!-- /.col-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section><!-- /.hello-section background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center -->
	<div class="hello-section__submenu element-paddings d-flex align-items-center">
		<div class="container">
			<div class="row align-items-center justify-content-around">
				<div class="col-12 col-md-4">
					<a href="tel:<?php echo filter_var(get_field('phone', 'option'), FILTER_SANITIZE_NUMBER_INT); ?>" class="hello-section__submenu__link hello-section__submenu__link--first text-center">
						<img src="<?php echo get_template_directory_uri(); ?>/images/icon__phone.svg" alt="" class="hello-section__submenu__link__icon d-block mx-auto svg" />
						<span class="hello-section__submenu__link__label"><?php the_field('phone', 'option'); ?></span>
					</a>
				</div><!-- /.col-12 col-md-4 -->
				<div class="col-12 col-md-4">
					<a href="mailto:<?php the_field('email', 'option'); ?>" class="hello-section__submenu__link text-center">
						<img src="<?php echo get_template_directory_uri(); ?>/images/icon__screen.svg" alt="" class="hello-section__submenu__link__icon d-block mx-auto svg" />
						<span class="hello-section__submenu__link__label"><?php the_field('email', 'option'); ?></span>
					</a>
				</div><!-- /.col-12 col-md-4 -->
				<div class="col-12 col-md-4">
					<a href="skype:<?php the_field('skype', 'option'); ?>?call" class="hello-section__submenu__link text-center">
						<img src="<?php echo get_template_directory_uri(); ?>/images/icon__skype.svg" alt="" class="hello-section__submenu__link__icon d-block mx-auto svg" />
						<span class="hello-section__submenu__link__label"><?php the_field('skype', 'option'); ?></span>
					</a>
				</div><!-- /.col-12 col-md-4 -->
			</div><!-- /.row align-items-center justify-content-around -->
		</div><!-- /.container -->

		<div class="hello-section__scroll-down text-center">
			<a href="#contact" class="d-inline-block scroll">
			    <span class="hello-section__scroll-down__arrow">
			        <i class="fa fa-angle-down" aria-hidden="true"></i>
			    </span>
			</a>
		</div><!-- /.hello-section__scroll-down text-center -->
	</div><!-- /.hello-section__submenu element-paddings d-flex align-items-center -->

	<div id="contact" class="contact element-paddings text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-7 col-xl-6 mx-auto">
					<div class="contact__content content">
						<?php the_content(); ?>
					</div><!-- /.contact__content content -->
					<div class="contact__forms element-margin-top">
						<?php echo do_shortcode( '[gravityform id="1" title="false" description="false" ajax="true"]' ); ?>
					</div><!-- /.contact__forms element-margin-top -->
				</div><!-- /.col-md-8 col-lg-7 col-xl-6 mx-auto -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.contact element-paddings text-center -->

	<div class="visit text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-7 col-xl-6 mx-auto">
					<h2 class="visit__title underline--dark"><?php the_field('visit_us_title', 'option'); ?></h2><!-- /.visit__title underline--dark -->
					<div class="visit__content content">
						<?php the_field('visit_us_content', 'option'); ?>
					</div><!-- /.visit__content content -->
				</div><!-- /.col-md-8 col-lg-7 col-xl-6 mx-auto -->
			</div><!-- /.row -->
		</div><!-- /.container -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">

					<?php $location = get_field('visit_us_location', 'option'); ?>

					<?php if( !empty($location) ): ?>

						<div id="acf-gray-map" class="acf-map">
							<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
						</div>

					<?php endif; ?>

				</div><!-- /.col-12 -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div><!-- /.visit text-center -->

</main><!-- /#main.contact-page-template -->

<?php get_footer('google-map'); ?>