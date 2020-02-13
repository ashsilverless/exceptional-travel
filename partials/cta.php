<section class="cta element-paddings text-center">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<img src="<?php echo get_template_directory_uri(); ?>/images/img__cta.svg" alt="Icons CTA" class="cta__image svg mx-auto" />
				<h2 class="cta__title element-margin-top"><?php the_field('cta_title', 'option'); ?></h2><!-- /.cta__title element-margin-top -->
				<div class="row">
					<div class="col-md-9 col-lg-8 col-xl-5 mx-auto">
						<div class="cta__content content">
							<?php the_field('cta_content', 'option'); ?>
						</div><!-- /.cta__content content -->
					</div><!-- /.col-md-9 col-lg-8 col-xl-5 mx-auto -->
				</div><!-- /.row -->
				<div class="row">
					<div class="col-md-11 col-lg-10 col-xl-8 col-xxl-7 mx-auto">
						<div class="cta__buttons d-flex flex-wrap justify-content-between element-small-margin-top">
							<a href="tel:<?php echo filter_var(get_field('phone', 'option'), FILTER_SANITIZE_NUMBER_INT); ?>" class="exceptional-travel-button exceptional-travel-button--with-icon exceptional-travel-button--big exceptional-travel-button__full-background exceptional-travel-button__full-background--white">
							<img src="<?php echo get_template_directory_uri(); ?>/images/icon__phone.svg" alt="" class="svg" />
							<?php the_field('phone', 'option'); ?></a>
							<a href="<?php the_permalink('199'); ?>" class="exceptional-travel-button exceptional-travel-button--with-icon exceptional-travel-button--big exceptional-travel-button__full-background exceptional-travel-button__full-background--white">
							<img src="<?php echo get_template_directory_uri(); ?>/images/icon__screen.svg" alt="" class="svg" />
							Get in touch</a>
						</div><!-- /.cta__buttons d-flex flex-wrap justify-content-between element-small-margin-top -->
					</div><!-- /.col-md-11 col-lg-10 col-xl-8 col-xxl-7 mx-auto -->
				</div><!-- /.row -->
			</div><!-- /.col-12 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.cta element-paddings text-center -->