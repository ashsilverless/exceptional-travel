<?php
    /*
        Template Name: Homepage
    */
?>

<?php get_header(); ?>

<main id="main" class="homepage-template" tabindex="-1">

	<div class="intro">
		<div class="hello-section__scroll-down text-center">
					<a href="#cta-home" class="d-inline-block scroll" aria-label="scroll trigger">
					    <span class="hello-section__scroll-down__arrow">
					        <i class="fa fa-angle-down" aria-hidden="true"></i>
					    </span>
					</a>
				</div><!-- /.hello-section__scroll-down text-center -->
		<div class='silverless-slider'>
			<h1 style="color: #eeeeee;">Bespoke, Luxury Holidays</h1>
			<?php if( have_rows('slider') ):
			while ( have_rows('slider') ) : the_row();?>



		  <div class='silverless-slider__item'>
		    <div class="background" style="background:url(<?php the_sub_field('image');?>)"></div>
		    <div class='content'>
		      <img src="https://exceptional-travel.com/wp-content/themes/exceptional-travel/images/logo__exceptional-travel.svg"
		        class="logo" alt="Exceptional Travel - Bespoke Luxury Holidays"/>
		      <h2 class='heading'>
		        <span>Explore.</span>
		        <span>Dream.</span>
		        <span>Discover.</span>
		      </h2>
		    </div>
		  </div>


	  	<?php endwhile; endif;?>

		</div>




	</div><!-- /.intro -->

	<div id="cta-home" class="cta-home">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-lg-8 col-xl-7 col-xxl-6 mx-auto text-center">

					<?php get_template_part( 'partials/social-icons' ); ?>

					<div class="cta-home__content content element-small-margin-top">
						<?php the_field('cta_home_content'); ?>
						<p class="exceptional-travel-button exceptional-travel-button__text-only open-trigger">Read More</p>
					</div><!-- /.cta-home__content content element-small-margin-top -->

					<?php if( get_field('cta_home_collapsed_content') ) : ?>

						<div class="sl-collapse element-small-margin-top" id="collapseCTA-home">
							<div class="cta-home__content content">
								<?php the_field('cta_home_collapsed_content'); ?>
								<p class="exceptional-travel-button exceptional-travel-button__text-only close-trigger">Read Less</p>
							</div><!-- /.cta-home__content content -->
						</div>

					<?php endif; ?>

				</div><!-- /.col-md-10 col-lg-8 col-xl-7 col-xxl-6 mx-auto text-center -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /#cta-home.cta-home -->

	<div class="page-links">
		<div class="d-block d-md-none">
			<div id="accordion" role="tablist" class="element-padding-top">
			  <div class="card text-center">
			    <div class="card-header element-padding-bottom" role="tab" id="headingOne">
			        <a class="card-header__link" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			        	<img src="<?php echo get_template_directory_uri(); ?>/images/icon__map.svg" alt="icon" class="card-header__link__icon mx-auto svg" />
			          	<h3 class="card-header__link__title">Where?</h3>
			          	<span class="card-header__link__subtitle">Do you want to go?</span>
			        </a>
			    </div>

			    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
			      <div class="card-body card-body--where">
<?php
// Written By Adam Khoury @ developphp.com - March 26, 2010
// PHP swapping CSS style sheets for target device layouts
// Make your index page of your site a .php file instead of .html
 $styleSheet = "default.css";
$agent = $_SERVER['HTTP_USER_AGENT']; // Put browser name into local variable

if (preg_match("/iPhone/", $agent)) { // Apple iPhone Device
// Set style sheet variable value to target your iPhone style sheet
    get_template_part('partials/map');

} else if (preg_match("/android/", $agent)) { // Google Device using Android OS
// Set style sheet variable value to target your Android style sheet
    get_template_part('partials/map');

}
?>
			      </div>
			    </div>
			  </div>
			<div class="card text-center">
				<div class="card-header element-padding-bottom" role="tab" id="headingTwo">

				    <a class="card-header__link collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				    	<img src="<?php echo get_template_directory_uri(); ?>/images/icon__calendar.svg" alt="icon" class="card-header__link__icon mx-auto svg" />
				      	<h3 class="card-header__link__title">When?</h3>
				      	<span class="card-header__link__subtitle">Do you WANT TO GO?</span>
				    </a>

				</div>
				<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
					<div class="card-body card-body--when">

						<?php $terms = get_terms( array(
						    'taxonomy' => 'months',
						    'hide_empty' => false,
						) ); ?>

						<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>

							<div class="months-wrapper element-paddings d-flex flex-wrap justify-content-between">

								<?php foreach ( $terms as $term ): ?>

									<?php $image = get_field('months_thumbnails', $term); ?>

									<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="single-month d-flex flex-wrap align-items-end justify-content-center text-center background-cover lazy" data-src="<?php echo $image['url']; ?>">
										<span class="single-month__content-wrapper">
											<?php get_template_part('assets/images/icon__underline--white');?>
											<span class="single-month__content-wrapper__name d-block"><?php echo $term->name; ?></span>
											<span class="single-month__content-wrapper__more block">Find out more</span>
										</span>
									</a>

								<?php endforeach; ?>

							</div><!-- /.months-wrapper element-paddings d-flex justify-content-between -->

						<?php endif; ?>

					</div><!-- /.card-body card-body-when -->
				</div><!-- /#collapseTwo.collapse -->
			</div><!-- /.card text-center -->

			  <div class="card text-center">
			    <div class="card-header element-padding-bottom" role="tab" id="headingThree">

			        <a class="card-header__link collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			        	<img src="<?php echo get_template_directory_uri(); ?>/images/icon__balloon.svg" alt="icon" class="card-header__link__icon mx-auto svg" />
			         	<h3 class="card-header__link__title">What?</h3>
			          	<span class="card-header__link__subtitle">Do you WANT TO DO?</span>
			        </a>

			    </div>
			    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
			        <div class="card-body card-body--what">

						<?php $terms = get_terms( array(
						    'taxonomy' => 'types',
						    'hide_empty' => false,
						    'parent' => 0,
						) ); ?>

						<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>

							<div class="types-wrapper d-flex flex-wrap justify-content-between element-paddings">

								<?php foreach ( $terms as $term ): ?>

									<?php $image = get_field('types_thumbnails', $term); ?>

									<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="single-type d-flex flex-wrap align-items-end justify-content-center text-center background-cover lazy" data-src="<?php echo $image['url']; ?>">
										<span class="single-type__content-wrapper">
											<?php get_template_part('assets/images/icon__underline--white');?>
											<span class="single-type__content-wrapper__name d-block"><?php echo $term->name; ?></span>
											<span class="single-type__content-wrapper__more block">Find out more</span>
										</span>
									</a>

								<?php endforeach; ?>

							</div><!-- /.types-wrapper d-flex justify-content-between -->

						<?php endif; ?>

			      </div>
			    </div>
			  </div>
			</div>
		</div><!-- /.d-block d-md-none -->
		<div class="d-none d-md-block">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<ul class="nav nav-tabs d-flex justify-content-center" id="myTab" role="tablist">
						  <li class="nav-item text-center">
						    <a class="nav-link nav-link--where element-paddings active" id="where-tab" data-toggle="tab" href="#where" role="tab" aria-controls="where" aria-selected="true" data-mh="nav-link-match-height">
						    	<img src="<?php echo get_template_directory_uri(); ?>/images/icon__map.svg" alt="icon" class="nav-link__icon mx-auto svg" />
								<h3 class="nav-link__title">Where?</h3>
								<span class="nav-link__subtitle">Do you WANT TO GO?</span>
						   	</a>
						  </li>
						  <li class="nav-item text-center">
						    <a class="nav-link element-paddings" id="when-tab" data-toggle="tab" href="#when" role="tab" aria-controls="when" aria-selected="false" data-mh="nav-link-match-height">
						    	<img src="<?php echo get_template_directory_uri(); ?>/images/icon__calendar.svg" alt="icon" class="nav-link__icon mx-auto svg" />
								<h3 class="nav-link__title">When?</h3>
								<span class="nav-link__subtitle">Do you WANT TO GO?</span>
						    </a>
						  </li>
						  <li class="nav-item text-center">
						    <a class="nav-link element-paddings" id="what-tab" data-toggle="tab" href="#what" role="tab" aria-controls="what" aria-selected="false" data-mh="nav-link-match-height">
						    	<img src="<?php echo get_template_directory_uri(); ?>/images/icon__balloon.svg" alt="icon" class="nav-link__icon mx-auto svg" />
								<h3 class="nav-link__title">What?</h3>
								<span class="nav-link__subtitle">Do you WANT TO DO?</span>
						    </a>
						  </li>
						</ul>
					</div><!-- /.col-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->

			<div class="page-links-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-11 mx-auto">
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane tab-pane--where fade show active element-padding-top" id="where" role="tabpanel" aria-labelledby="where-tab">

			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-12 d-flex map-container">

						<img src="<?php echo get_template_directory_uri(); ?>/images/world-map-desktop.svg" alt="icon" class="destinations-map__image w-100 mx-auto svg" />

						<?php $terms = get_terms( array(
						    'taxonomy' => 'destinations',
						    'parent'   => 0,
						    'hide_empty' => false,
						) ); ?>

						<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>
							<?php $loopCounter = 1; ?>

								<ul class="nav nav-tabs d-none" id="myMapTab" role="tablist">

									<?php foreach ( $terms as $term ): ?>

										<li class="nav-item">
											<a class="nav-link<?php if( $loopCounter == 1 ) { echo ' active';} ?>" id="<?php echo $term->slug; ?>-tab" data-toggle="tab" href="#map-<?php echo $term->slug; ?>-desktop" role="tab" aria-controls="collapseCaption-<?php echo $term->slug; ?>" aria-selected="<?php if( $loopCounter == 1 ) { echo 'true';} else { echo 'false';} ?>"><?php echo $term->name; ?></a>
										</li>

										<?php $loopCounter++; ?>
									<?php endforeach; ?>
								</ul>

						<?php endif; ?>
					</div><!-- /.col-8 -->
					<div class="col-lg-4 col-md-12 mx-auto">

						<?php $terms = get_terms( array(
						    'taxonomy' => 'destinations',
						    'parent'   => 0,
						    'hide_empty' => false,
						) ); ?>

						<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>
							<?php $loopCounter = 1; ?>

							<div class="tab-content element-small-margin-top">

								<?php foreach ( $terms as $term ): ?>

									<div id="map-<?php echo $term->slug; ?>-desktop" class="tab-pane fade<?php if( $loopCounter == 1 ) { echo ' show active';} ?>"  role="tabpanel" aria-labelledby="<?php echo $term->slug; ?>-tab">
										<h2 class="destinations-map__title"><?php echo $term->name; ?></h2><!-- /.destinations-map__title -->
										<?php get_template_part('assets/images/icon__underline--yellow');?>
										<div class="destinations-map__content content">
											<?php the_field('destinations_description', $term); ?>
										</div><!-- /.destinations-map__content content -->

				 						<?php $icon = get_field('destinations_map_icon', $term); ?>

				 						<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="exceptional-travel-button exceptional-travel-button--with-icon exceptional-travel-button--big exceptional-travel-button__full-background exceptional-travel-button__full-background--white">
											<!--<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" class="svg" />-->
											<span>Explore <b><?php echo $term->name; ?></b></span>
										</a>

									</div><!-- /.tab-pane -->

									<?php $loopCounter++; ?>
								<?php endforeach; ?>

							</div><!-- /.tab-content element-small-margin-top -->

						<?php endif; ?>

					</div><!-- /.col-4 -->
				</div><!-- /.row -->
			</div><!-- /.container -->

								</div>
								<div class="tab-pane tab-pane--when fade" id="when" role="tabpanel" aria-labelledby="when-tab">

									<?php $terms = get_terms( array(
									    'taxonomy' => 'months',
									    'hide_empty' => false,
									) ); ?>

									<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>

										<div class="months-wrapper element-paddings d-flex flex-wrap justify-content-between">

											<?php foreach ( $terms as $term ): ?>

												<?php $image = get_field('months_thumbnails', $term); ?>

												<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="single-month d-flex flex-wrap align-items-end justify-content-center text-center background-cover lazy" data-src="<?php echo $image['url']; ?>">
													<span class="single-month__content-wrapper">

														<?php get_template_part('assets/images/icon__underline--white');?>

														<span class="single-month__content-wrapper__name d-block"><?php echo $term->name; ?></span>
														<span class="single-month__content-wrapper__more block">Find out more</span>
													</span>
												</a>

											<?php endforeach; ?>

										</div><!-- /.months-wrapper element-paddings d-flex justify-content-between -->

									<?php endif; ?>

								</div><!-- /.tab-pane tab-pane-when fade -->

								<div class="tab-pane tab-pane--what fade" id="what" role="tabpanel" aria-labelledby="what-tab">
									<?php $terms = get_terms( array(
									    'taxonomy' => 'types',
									    'hide_empty' => false,
									    'parent' => 0,
									) ); ?>

									<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>

										<div id="types-wrapper" class="types-wrapper d-flex flex-wrap justify-content-between element-paddings">

											<?php foreach ( $terms as $term ): ?>

												<?php $image = get_field('types_thumbnails', $term); ?>

												<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="single-type d-flex flex-wrap align-items-end justify-content-center text-center background-cover lazy" data-src="<?php echo $image['url']; ?>">
													<span class="single-type__content-wrapper">
														<?php get_template_part('assets/images/icon__underline--white');?>
														<span class="single-type__content-wrapper__name d-block"><?php echo $term->name; ?></span>
														<span class="single-type__content-wrapper__more block">Find out more</span>
													</span>
												</a>

											<?php endforeach; ?>

										</div><!-- /.types-wrapper d-flex justify-content-between -->

									<?php endif; ?>
								</div>
							</div>
						</div><!-- /.col-12 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.page-links-content -->

		</div><!-- /.d-none d-md-block -->
	</div><!-- /.page-links -->

	<div class="why-us">
		<div class="why-us__title-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2 class="why-us__title-wrapper__title underline--dark text-center"><?php the_field('why_us_title'); ?></h2><!-- /.why-us__title-wrapper__title underline-white text-center -->
					</div><!-- /.col-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.why-us__title-wrapper -->


		<div class="why-us__testimonials element-paddings">

			<?php $image = get_field('testimonials_background'); ?>

			<div class="why-us__testimonials__background background-cover lazy parallax-window" data-parallax="scroll" data-bleed="100" data-image-src="<?php echo $image['url']; ?>">
				<div class="container">
					<div class="row">
						<div class="col-md-9 col-lg-8 col-xl-6 col-xxl-5 mx-auto text-center">



<?php if( have_rows('testimonial', 7463) ) : ?>
	<div class="owl-carousel owl-theme testi">

		<?php while( have_rows('testimonial', 7463) ) : the_row(); ?>
		<div class="item">
				<p><?php  the_sub_field('testimonial');?>
				<span><?php  the_sub_field('individual');?></span></p>
		</div>
		<?php endwhile; ?>

	</div>
<?php endif; ?>


<!--<?php $post_objects = get_field('why_us_testimonials'); ?>

							<?php if( $post_objects ): ?>

								<div class="why-us__testimonials__slider owl-carousel">

									<?php foreach( $post_objects as $post): ?>
									    <?php setup_postdata($post); ?>

										<div class="single-testimonial">
											<blockquote class="single-testimonial__blockquote"><?php the_content(); ?></blockquote>
											<cite class="single-testimonial__cite"><?php the_title(); ?></cite>
										</div><!-- /.single-testimonial

									<?php endforeach; ?>

								</div><!-- /.why-us__testimonials__slider owl-carousel

							<?php endif; ?>
							<?php wp_reset_query(); ?>-->



						</div><!-- /.col-md-9 col-lg-8 col-xl-6 col-xxl-5 mx-auto text-center -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.why-us__testimonials__background -->
		</div><!-- /.why-us__testimonials element-paddings -->

		<?php if( have_rows('why_us_features') ): ?>

			<div class="why-us__features element-padding-bottom">
				<div class="container">
					<div class="row">

						<?php $loopCounter = 1; ?>

						<?php while ( have_rows('why_us_features') ) : the_row(); ?>

							<div class="col-md-4 col-xl-3 mx-auto">
								<div class="single-feature text-center<?php if( $loopCounter > 1 ) { echo ' element-small-margin-top'; } ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/images/icon__maker.svg" alt="icon" class="single-feature__icon mx-auto svg" />
									<h3 class="single-feature__title"><?php the_sub_field('title'); ?></h3><!-- /.single-feature__title -->
									<div class="single-feature__content content">
										<?php the_sub_field('content'); ?>
									</div><!-- /.single-feature__content content -->
								</div><!-- /.single-feature text-center -->
							</div><!-- /.col-md-4 col-xl-3 mx-auto -->

							<?php $loopCounter++; ?>
						<?php endwhile; ?>

					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.why-us__features element-padding-bottom -->

		<?php endif; ?>

	</div><!-- /.why-us -->

	<?php $image = get_field('get_in_touch_background'); ?>

	<div class="in-touch text-center parallax-window" data-parallax="scroll" data-bleed="100" data-image-src="<?php echo $image['url']; ?>">
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
					<h2 class="in-touch__title underline--dark"><?php the_field('get_in_touch_highlight_text'); ?></h2><!-- /.in-touch__title -->
				</div><!-- /.col-md-7 col-lg-6 col-xl-5 col-xxl-4 mx-auto -->
			</div><!-- /.row -->
			<div class="row">
				<div class="col-md-11 col-lg-10 col-xl-9 col-xxl-7 mx-auto">
					<div class="in-touch__buttons d-flex flex-wrap justify-content-between element-small-margin-top">
						<a href="tel:<?php echo filter_var(get_field('phone', 'option'), FILTER_SANITIZE_NUMBER_INT); ?>" class="exceptional-travel-button exceptional-travel-button--with-icon exceptional-travel-button--big exceptional-travel-button__full-background exceptional-travel-button__full-background--white">
						<img src="<?php echo get_template_directory_uri(); ?>/images/icon__phone.svg" alt="" class="svg" />
						<?php the_field('phone', 'option'); ?></a>
						<a href="<?php the_permalink('199'); ?>" class="exceptional-travel-button exceptional-travel-button--with-icon exceptional-travel-button--big exceptional-travel-button__full-background exceptional-travel-button__full-background--white">
						<img src="<?php echo get_template_directory_uri(); ?>/images/icon__screen.svg" alt="" class="svg" />
						Get in touch</a>
					</div><!-- /.in-touch__buttons d-flex flex-wrap justify-content-between element-small-margin-top -->
				</div><!-- /.col-md-11 col-lg-10 col-xl-9 col-xxl-7 mx-auto -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.in-touch text-center -->

</main><!-- /#main.homepage-template -->

<script type="text/javascript">



</script>

<script>
$(document).ready(function(){
	$('.owl-carousel.testi').owlCarousel({
	    autoplay: true,
	    loop:false,
	    margin:10,
	    nav:false,
	    dots: false,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:1
	        },
	        1000:{
	            items:1
	        }
	    }
	})
});
</script>
<?php get_footer(); ?>
