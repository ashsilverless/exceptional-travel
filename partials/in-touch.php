<?php wp_reset_postdata(); ?>
<?php $term = get_queried_object(); ?>
<?php $image = get_field('get_in_touch_background', $term); ?>

<div class="in-touch text-center parallax-window" data-parallax="scroll" data-bleed="100" data-image-src="<?php echo $image['url']; ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
				<h2 class="in-touch__title underline--dark"><?php the_field('get_in_touch_highlight_text', $term); ?></h2><!-- /.in-touch__title -->
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