<?php get_header(); ?>
<?php $term = get_queried_object(); ?>

<main id="main" class="taxonomy-months-page" tabindex="-1">

	<?php $image = get_field('months_background', $term); ?>

	<section class="hello-section background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center parallax-window" data-parallax="scroll" data-bleed="100" data-image-src="<?php echo $image['url']; ?>">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="hello-section__title"><?php echo $term->name; ?></h1><!-- /.hello-section__title -->
				</div><!-- /.col-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section><!-- /.hello-section background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center -->

	<?php get_template_part( 'partials/month-thumbs' ); ?>

	<div class="hello-section__countries d-flex align-items-center">
		<div class="container">
			<div class="row justify-content-around align-items-center">
				<div class="col-lg-4">
					<img src="<?php echo get_template_directory_uri(); ?>/images/world-map-mobile.svg" alt="Africa map" class="hello-section__countries__map svg" />
				</div><!-- /.col-lg-4 -->

				<div class="col-lg-8">
					<?php $terms = get_field('taxonomy_destiantions', $term); ?>
					<?php if( $terms ): ?>
						<ul class="hello-section__countries__list list-unstyled element-padding-top">
							<?php
								sort($terms);
								foreach ( $terms as $term ): ?>

								<li class="hello-section__countries__list__single-country">
									<a href="<?php echo get_term_link( $term ); ?>" class="hello-section__countries__list__single-country__link country-<?php echo $term->slug; ?><?php if($term->slug == get_queried_object()->slug) { echo ' active'; } ?>">
										<?php echo $term->name; ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul><!-- /.hello-section__countries__list list-unstyled element-padding-top -->
					<?php endif; ?>
				</div><!-- /.col-lg-8 -->
			</div><!-- /.row justify-content-around align-items-center -->
		</div><!-- /.container -->
		<div class="hello-section__scroll-down text-center">
			<a href="#months-wrapper" class="d-inline-block scroll">
			    <span class="hello-section__scroll-down__arrow">
			        <i class="fa fa-angle-down" aria-hidden="true"></i>
			    </span>
			</a>
		</div><!-- /.hello-section__scroll-down text-center -->
	</div><!-- /.hello-section__countries d-flex align-items-center -->

	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<span property="itemListElement" class="archive" typeof="ListItem">
						<a property="item" typeof="WebPage" href="<?php echo esc_url( home_url( '/' ) ); ?>when" class="post post-months-archive">
							<span property="name">Months</span>
						</a><meta property="position" content="1">
					</span>

					<?php bcn_display(); ?>
				</div>
			</div>
		</div>
	</div>
	<?php $term = get_queried_object(); ?>
	<div id="months-wrapper" class="month element-paddings text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-6 col-xxl-5 mx-auto">
					<h2 class="month__title underline--dark"><?php echo $term->name; ?></h2><!-- /.month__title -->
					<div class="month__content content">
						<?php the_field('months_description', $term); ?>
					</div><!-- /.month__content content -->

					<p class="exceptional-travel-button exceptional-travel-button__text-only open-trigger">Read More</p>

					<div class="sl-collapse element-small-margin-top" id="collapseCaption-<?php echo $term->slug; ?>">
						<div class="month__content content">
							<?php the_field('months_collapsed_description', $term); ?>

							<p class="exceptional-travel-button exceptional-travel-button__text-only close-trigger">Read Less</p>

						</div><!-- /.month__content content -->
					</div>

				</div><!-- /.col-md-8 col-lg-6 col-xxl-5 mx-auto -->
			</div><!-- /.row -->
		</div><!-- /.container -->

		<div id="where-go" class="destination__countries element-padding-top text-left">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h3 class="destination__countries__title underline--dark text-center">Our Picks for <?php echo $term->name; ?></h3><!-- /.destination__countries__title underline--dark text-center -->
					</div><!-- /.col-12 -->

					<?php $terms = get_field('taxonomy_destiantions', $term); ?>

					<?php if( $terms ): ?>

						<?php $loopCounter = 1; ?>
						<?php foreach ( $terms as $term ): ?>

							<div class="col-sm-6 col-md-4">
								<div class="single-box-post<?php if( $loopCounter==1 ) { echo ' single-box-post--first';} elseif( $loopCounter == 2 ) { echo ' single-box-post--second'; } elseif( $loopCounter == 3 ) { echo ' single-box-post--third';} ?>">

									<?php $image = get_field('destinations_thumbnails', $term); ?>

									<a href="<?php echo get_term_link( $term ); ?>" class="single-box-post__image-wrapper background-cover lazy" style="background-image: url('<?php echo $image['url']; ?>');"></a>

									<div class="single-box-post__content-wrapper"  data-mh="single-box-content-post-match-height">
										<a href="<?php echo get_term_link( $term ); ?>" class="single-box-post__content-wrapper__title-link">
											<h3 class="single-box-post__content-wrapper__title-link__title underline--dark"><?php echo $term->name; ?></h3><!-- /.single-box-post__content-wrapper__title-link__title underline--dark -->
										</a>

										<div class="single-box-post__content-wrapper__content content" data-mh="single-box-post-content-match-height">
											<p>
											<?php $excerpt = wp_trim_words( get_field('destinations_description', $term ), $num_words = 200, $more = '...' ); ?>

											<?php echo $excerpt; ?>
											</p>
										</div><!-- /.single-box-post__content-wrapper__content content -->

										<a href="<?php echo get_term_link( $term ); ?>" class="exceptional-travel-button exceptional-travel-button__bordered exceptional-travel-button__bordered--gray">take me to <b><?php echo $term->name; ?></b></a>
									</div><!-- /.single-box-post__content-wrapper -->
								</div><!-- /.single-box-post -->
							</div><!-- /.col-sm-6 col-md-4 -->

							<?php $loopCounter++; ?>
						<?php endforeach; ?>

					<?php endif; ?>

				</div><!-- /.row -->
				<div class="row">
					<div class="col-12 text-center">
						<button id="loadMore" class="exceptional-travel-button exceptional-travel-button__text-only visible">Load more</button>
					</div><!-- /.col-12 text-center -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.destination__countries element-padding-top text-left -->

		<?php $term = get_queried_object(); ?>
		<?php if( have_rows('offers', $term) ):  ?>
			<?php while( have_rows('offers', $term) ): the_row(); ?>

				<?php $image = get_sub_field('image'); ?>

				<div class="container">
					<div class="row">
						<div class="col-12">
							<section class="offers element-margin-top <?php the_sub_field('hide_box'); ?>">
								<div class="offers__title-wrapper d-flex align-items-center justify-content-center text-center lazy background-cover" data-src="<?php echo $image['url']; ?>">
									<div class="row w-100 no-gutters">
										<div class="col-md-6 mx-auto">
											<h2 class="offers__title-wrapper__title"><?php the_sub_field('title'); ?></h2><!-- /.offers__title-wrapper__title -->
										</div><!-- /.col-md-6 mx-auto -->
									</div><!-- /.row w-100 no-gutters -->
								</div><!-- /.offers__title-wrapper d-flex align-items-center justify-content-center text-center lazy background-cover -->
								<div class="offers__content-wrapper text-center">
									<div class="row w-100 no-gutters">
										<div class="col-md-7 mx-auto">
											<h3 class="offers__content-wrapper__title underline--white"><?php the_sub_field('subtitle'); ?></h3><!-- /.offers__content-wrapper__title underline--white -->
											<div class="offers__content-wrapper__content content">
												<?php the_sub_field('content'); ?>
											</div><!-- /.offers__content-wrapper__content content -->
										</div><!-- /.col-md-7 mx-auto -->
										<div class="col-md-6 mx-auto">
											<a href="tel:<?php echo filter_var(get_sub_field('phone'), FILTER_SANITIZE_NUMBER_INT); ?>" class="offers__content-wrapper__link element-small-margin-top">call <b><?php the_sub_field('phone'); ?></b></a>
										</div><!-- /.col-md-6 mx-auto -->
									</div><!-- /.row w-100 no-gutters -->
								</div><!-- /.offers__content-wrapper text-center -->
							</section><!-- /.offers element-margin-top -->
						</div><!-- /.col-12 -->
					</div><!-- /.row -->
				</div><!-- /.container -->

			<?php endwhile; ?>
		<?php endif; ?>

	</div><!-- /.month element-paddings text-center -->

	<?php get_template_part( 'partials/in-touch' ); ?>

</main><!-- /#main.taxonomy-months-page -->

<?php get_footer(); ?>
