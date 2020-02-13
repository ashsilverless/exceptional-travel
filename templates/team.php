<?php
    /*
        Template Name: Team
    */
?>

<?php get_header(); ?>
<?php $mainID = get_the_ID(); ?>

<main id="main" class="about-template about-template--team" tabindex="-1">

	<div class="hello-section background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center parallax-window" data-parallax="scroll" data-bleed="100" data-image-src="<?php if ( has_post_thumbnail(159) ) { echo get_the_post_thumbnail_url(159); } else { echo get_template_directory_uri().'/images/bgd__news.jpg';}?>">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="hello-section__title">About</h1><!-- /.hello-section__title -->
				</div><!-- /.col-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.hello-section background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center -->

	<section class="main-content element-paddings">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 mx-auto">
					<h2 class="main-content__title underline--dark text-center"><?php the_title(); ?></h2><!-- /.main-content__title underline--dark text-center -->
					<div class="main-content__wrapper">
						<div class="single-main-content">
							<div class="row align-items-center">
								<div class="col-md-6">

									<?php if ( has_post_thumbnail() ): ?>

										<div class="single-main-content__image-wrapper d-block">
											<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="single-main-content__image-wrapper__image d-block w-100" alt="<?php $alt = get_post(get_post_thumbnail_id())->post_title; echo $alt;?>"/>
										</div>

									<?php endif; ?>

								</div><!-- /.col-md-6 -->
								<div class="col-md-6">
									<div class="single-main-content__content content">
										<?php the_content(); ?>
									</div><!-- /.single-main-content__content content -->
								</div><!-- /.col-md-6 -->
								<div class="col-12">

									<?php if( have_rows('team') ): ?>

										<div class="main-content__team element-paddings">

											<?php $loopCounter = 1; ?>

											<?php while ( have_rows('team') ) : the_row(); ?>

												<?php $image = get_sub_field('image'); ?>

												<div class="single-member text-center text-md-left">
													<div class="row">
														<div class="col-12 col-md-auto">
															<img data-src="<?php echo $image['sizes']['thumbnail']; ?>" src="<?php echo get_template_directory_uri(); ?>/images/img__empty.png" alt="Exceptional Travel, Exceptional Team - <?php echo $image['alt']; ?>"  class="single-member__image mx-auto lazy"/>
														</div><!-- /.col-12 col-md-auto -->
														<div class="col">
															<h3 class="single-member__name element-small-margin-top"><?php the_sub_field('name'); ?></h3><!-- /.single-member__name element-small-margin-top -->
															<div class="single-member__content content">
																<?php the_sub_field('content'); ?>

																					<p class="exceptional-travel-button exceptional-travel-button__text-only open-trigger">Read More</p>

															</div><!-- /.single-member__content content -->

															<?php if( get_sub_field('collapsed_content') ): ?>

																<div class="sl-collapse" id="collapseTeam-<?php echo $loopCounter; ?>">
																	<div class="single-member__content content">
																		<?php the_sub_field('collapsed_content'); ?>

																					<p class="exceptional-travel-button exceptional-travel-button__text-only close-trigger">Read Less</p>

																	</div><!-- /.single-member__content content -->
																</div>

															<?php endif; ?>

														</div><!-- /.col -->
													</div><!-- /.row -->
												</div><!-- /.single-member text-center text-md-left -->

												<?php $loopCounter++; ?>
											<?php endwhile; ?>

										</div><!-- /.main-content__team -->

									<?php endif; ?>

								</div><!-- /.col-12 -->
							</div><!-- /.row align-items-center -->
						</div><!-- /.single-main-content -->
					</div><!-- /.main-content__wrapper -->
				</div><!-- /.col-lg-10 mx-auto -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section><!-- /.main-content element-paddings -->

	<section class="about-pages element-paddings">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="about-pages-wrapper d-flex flex-wrap">

						<?php
							$pages = get_pages(array(
								'sort_order' => 'asc',
								'sort_column' => 'menu_order',
					    		'parent' => 159
							));
						?>

						<?php if($pages): ?>
							<?php foreach($pages as $page): ?>

								<?php if($page->ID == $mainID) continue; ?>

								<?php $content = $page->post_content; ?>
								<?php if ( ! $content ) continue; ?>
								<?php $content = apply_filters( 'the_content', $content ); ?>

								<div class="single-box-post">

									<?php if ( has_post_thumbnail($page->ID) ): ?>

										<a href="<?php echo get_page_link($page->ID); ?>" class="single-box-post__image-wrapper background-cover lazy" style="background-image: url('<?php echo get_the_post_thumbnail_url($page->ID) ?>');"></a>

									<?php endif; ?>

									<div class="single-box-post__content-wrapper" data-mh="single-box-post-wrapper-match-height">
										<a href="<?php echo get_page_link($page->ID); ?>" class="single-box-post__content-wrapper__title-link">
											<h3 class="single-box-post__content-wrapper__title-link__title underline--dark"><?php echo get_the_title($page->ID); ?></h3><!-- /.single-box-post__content-wrapper__title-link__title underline--dark -->
										</a>

										<div class="single-box-post__content-wrapper__content content" data-mh="single-box-post-content-wrapper-match-height">

											<?php echo wp_trim_words( $content, 20, '...' ); ?>

										</div><!-- /.single-box-post__content-wrapper__content content -->

										<a href="<?php the_permalink($page->ID); ?>" class="exceptional-travel-button exceptional-travel-button__bordered exceptional-travel-button__bordered--gray">Read more</a>

									</div><!-- /.single-box-post__content-wrapper -->
								</div><!-- /.single-box-post mix -->

							<?php endforeach; ?>
						<?php endif; ?>

					</div><!-- /.about-pages-wrapper d-flex flex-wrap -->
				</div><!-- /.col-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section><!-- /.about-pages element-paddings -->

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

</main><!-- /#main.about-new-template -->

<?php get_footer(); ?>
