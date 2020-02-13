<?php wp_reset_postdata(); ?>
<?php $term = get_queried_object(); ?>
<?php $image = get_field('talk_to_us_background', $term); ?>

<div class="in-touch<?php if( get_field('talk_to_us_fonts_color', $term) == 'white' ) { echo ' in-touch--white-text';} ?> text-center element-padding-top parallax-window" data-parallax="scroll" data-bleed="100" data-image-src="<?php echo $image['url']; ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-lg-8 col-xl-6 col-xxl-5 mx-auto">

				<?php $post_object = get_field('talk_to_us_testimonial', $term); ?>

				<?php if( $post_object ): ?>
					<?php $post = $post_object; ?>
					<?php setup_postdata( $post ); ?>

					<div class="in-touch__quote">
						<blockquote>
							<?php the_content(); ?>
						</blockquote>
						<cite><?php the_title(); ?></cite>
						<img src="<?php echo get_template_directory_uri(); ?>/images/icon__underline--white.svg" alt="underline" class="in-touch__quote__underline svg" />
					</div><!-- /.in-touch__quote -->

					<?php wp_reset_postdata(); ?>
				<?php endif; ?>

			</div><!-- /.col-md-10 col-lg-8 col-xl-6 col-xxl-5 mx-auto -->
		</div><!-- /.row -->
		<div class="row">
			<div class="col-md-11 col-lg-10 col-xl-7 mx-auto">
				<div class="in-touch__buttons d-flex flex-wrap justify-content-center element-margin-top">

					<?php if( have_rows('talk_to_us_button', $term) ): ?>
						<?php while ( have_rows('talk_to_us_button', $term) ) : the_row(); ?>

							<?php $icon = get_sub_field('icon'); ?>

							<a href="<?php the_sub_field('link'); ?>" class="exceptional-travel-button exceptional-travel-button--with-icon exceptional-travel-button--big exceptional-travel-button__full-background exceptional-travel-button__full-background--white">
								<span><?php the_sub_field('label'); ?></span>
							<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" class="svg" />
							</a>

						<?php endwhile; ?>
					<?php endif; ?>

				</div><!-- /.in-touch__buttons d-flex flex-wrap justify-content-center element-margin-top -->
			</div><!-- /.col-md-11 col-lg-10 col-xl-7 mx-auto -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.in-touch text-center element-padding-top -->