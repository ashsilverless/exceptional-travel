<?php
    /*
        Template Name: When
    */
?>

<?php get_header(); ?>

	<main id="main" class="when-template" tabindex="-1">

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
						<span class="hello-section__subtitle">Do you want to go?</span>

						<?php if( have_rows('repeater_iconssssss') ): ?><!-- Added 's' to stop pulling in rows(!)-->

							<div class="hello-section__icons element-margin-top">
								<ul class="d-flex align-items-center justify-content-center list-unstyled">

									<?php while ( have_rows('repeater_icons') ) : the_row(); ?>

										<?php $image = get_sub_field('icon'); ?>

										<li>
											<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="hello-section__icons__single-icon svg" />
										</li>

									<?php endwhile; ?>

								</ul><!-- /.d-flex align-items-center justify-content-center list-unstyled -->
								<span class="hello-section__icons__label d-inline-block">Scroll down to choose</span>
							</div><!-- /.hello-section__icons element-margin-top -->

						<?php endif; ?>

					</div><!-- /.col-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->

			<div class="hello-section__scroll-down text-center">
				<a href="#months-wrapper" class="d-inline-block scroll">
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
					    'taxonomy' => 'months',
					    'hide_empty' => false,           
					    'orderby' => 'id',
					    'order' => 'ASC' 
					) ); ?>

					<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>

						<div id="months-wrapper" class="months-wrapper d-flex flex-wrap justify-content-between">

							<?php foreach ( $terms as $term ): ?>

								<?php $image = get_field('months_thumbnails', $term); ?>

								<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="single-month d-flex flex-wrap align-items-end justify-content-center text-center background-cover lazy" data-src="<?php echo $image['url']; ?>">
									<span class="single-month__content-wrapper">
										<img src="<?php echo get_template_directory_uri(); ?>/images/icon__underline--white.svg" alt="underline" class="single-month__content-wrapper__underline svg" />
										<span class="single-month__content-wrapper__name d-block"><?php echo $term->name; ?></span>
										<span class="single-month__content-wrapper__more block">Find out more</span>
									</span>
								</a>

							<?php endforeach; ?>

						</div><!-- /.months-wrapper d-flex justify-content-between -->

					<?php endif; ?>

				</div><!-- /.col-12 -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->

		<?php get_template_part( 'partials/cta' ); ?>

	</main><!-- /#main.when-template -->

<?php get_footer(); ?>