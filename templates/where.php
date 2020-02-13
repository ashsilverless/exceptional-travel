<?php
    /*
        Template Name: Where
    */
?>

<?php get_header(); ?>

	<main id="main" class="where-template" tabindex="-1">

		<section class="hello-section hello-section--big element-paddings d-flex flex-wrap align-items-center text-center">

			<?php $images = get_field('backgrounds_slides'); ?>
			<?php if( $images ): ?>

				<div class="hello-section__background-carousel owl-carousel">

					<?php foreach( $images as $image ): ?>

						<div class="hello-section__background-carousel__single-image w-100 background-cover" style="background-image: url('<?php echo $image['url']; ?>');"></div><!-- /.hello-section__background-carousel__single-image w-100 background-cover -->

					<?php endforeach; ?>

				</div><!-- /.hello-section__background-carousel owl-carousel -->

			<?php endif; ?>

			<div class="container">
				<div class="row">
					<div class="col-12">
						<h1 class="hello-section__title"><?php the_title(); ?></h1><!-- /.hello-section__title -->
						<span class="hello-section__subtitle"><?php the_field('hello_section_subtitle'); ?></span>
						<div class="hello-section__icons element-margin-top">
							<ul class="d-flex align-items-center justify-content-center list-unstyled">
								<li>
									<a href="#destinations-wrapper" class="scroll">
										<img src="<?php echo get_template_directory_uri(); ?>/images/icon__image.svg" alt="Icon" class="hello-section__icons__single-icon svg" />
										<span class="hello-section__icons__label d-block">Choose by <b>Image</b></span>
									</a>
								</li>
								<li>
									<a href="#destinations-map" class="scroll">
										<img src="<?php echo get_template_directory_uri(); ?>/images/icon__map.svg" alt="Icon" class="hello-section__icons__single-icon svg" />
										<span class="hello-section__icons__label d-block">Choose by <b>map</b></span>
									</a>
								</li>
							</ul><!-- /.d-flex align-items-center justify-content-center list-unstyled -->
						</div><!-- /.hello-section__icons element-margin-top -->
					</div><!-- /.col-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->

			<div class="hello-section__scroll-down text-center">
				<a href="#destinations-wrapper" class="d-inline-block scroll">
				    <span class="hello-section__scroll-down__arrow">
				        <i class="fa fa-angle-down" aria-hidden="true"></i>
				    </span>
				</a>
			</div><!-- /.hello-section__scroll-down text-center -->
		</section><!-- /.hello-section hello-section-big background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center -->

		<div class="container-fluid">
			<div class="row">
				<div class="col-12">

					<?php $terms = get_terms( array(
					    'taxonomy' => 'destinations',
					    'parent'   => 0,
					    'hide_empty' => false,           
					    'orderby' => 'slug',
					    'order' => 'ASC' 
					) ); ?>

					<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>
						<?php $layout = get_field( 'tiles_layout' ); ?>

						<div id="destinations-wrapper" class="destinations-wrapper<?php if($layout=='ver-1') {} elseif($layout=='ver-2') {echo ' destinations-wrapper--version-two';} elseif($layout=='ver-3') {echo ' destinations-wrapper--version-tree';} elseif($layout=='ver-4') {echo ' destinations-wrapper--version-four';} ?> d-flex flex-wrap justify-content-between">

							<?php foreach ( $terms as $term ): ?>
								<?php $width = get_field('width', $term); ?>
								<?php $image = get_field('destinations_thumbnails', $term); ?>

								<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="single-destination d-flex flex-wrap align-items-end justify-content-center text-center background-cover lazy <?php echo $width;?>" style="background-image:url(<?php echo $image['url']; ?>);">
									<span class="single-destination__content-wrapper">
										<img src="<?php echo get_template_directory_uri(); ?>/images/icon__underline--white.svg" alt="underline" class="single-destination__content-wrapper__underline svg" />
										<span class="single-destination__content-wrapper__name d-block"><?php echo $term->name; ?></span>
										<span class="single-destination__content-wrapper__more block">Find out more</span>
									</span>
								</a>

							<?php endforeach; ?>

						</div><!-- /.destinations-wrapper d-flex justify-content-between -->

					<?php endif; ?>

				</div><!-- /.col-12 -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->

		<div id="destinations-map" class="destinations-map text-center element-paddings">
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
										<img src="<?php echo get_template_directory_uri(); ?>/images/icon__underline--white.svg" alt="underline" class="destinations-map__underline svg" />
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
		</div><!-- /.destinations-map text-center element-paddings -->

		<?php get_template_part( 'partials/in-touch' ); ?>

	</main><!-- /#main.where-template -->

<?php get_footer(); ?>


