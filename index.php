<?php get_header(); ?>

<main id="main" class="blog-page-template" tabindex="-1">

	<div class="hello-section background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center parallax-window" data-parallax="scroll" data-bleed="100" data-image-src="<?php if ( has_post_thumbnail(259) ) { echo get_the_post_thumbnail_url(259); } else { echo get_template_directory_uri().'/images/bgd__news.jpg';}?>">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="hello-section__title">News</h1><!-- /.hello-section__title -->
				</div><!-- /.col-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.hello-section background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center -->

	<?php
	    $loop = new WP_Query(
	        array(
	        	'post_type'  => 'post',
	        	'posts_per_page' => 3,
	        )
	    );
	?>

	<?php if ($loop->have_posts()) :  ?>

		<section class="latest-news element-paddings">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 mx-auto">
						<h2 class="latest-news__title underline--dark text-center">Latest News</h2><!-- /.latest-news__title underline--dark text-center -->
						<div class="latest-news__carousel owl-carousel">

							<?php while ($loop->have_posts()) : $loop->the_post();?>

								<div class="single-latest-news">
									<div class="row">
										<div class="col-md-6">

											<?php if ( has_post_thumbnail() ): ?>

												<a href="<?php the_permalink(); ?>" class="single-latest-news__image-wrapper d-block">
													<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="single-latest-news__image-wrapper__image d-block w-100" alt="<?php the_title(); ?>" />
												</a>

											<?php endif; ?>

										</div><!-- /.col-md-6 -->
										<div class="col-md-6">
											<div class="single-latest-news__title"><?php the_title(); ?></div><!-- /.single-latest-news__title -->
											<div class="single-latest-news__excerpt">
												<?php the_excerpt(); ?>
											</div><!-- /.single-latest-news__excerpt -->
											<a href="<?php the_permalink(); ?>" class="exceptional-travel-button exceptional-travel-button__text-only">Read More</a>
											<ul class="single-latest-news__details d-flex list-unstyled">
												<li class="single-latest-news__details__author"><?php the_author(); ?></li><!-- /.single-latest-news__details__author -->
												<li class="single-latest-news__details__time"><?php the_time('dS F Y'); ?></li><!-- /.single-latest-news__details__time -->
											</ul><!-- /.single-latest-news__details d-flex list-unstyled -->
											<div class="single-latest-news__share">
												<span class="single-latest-news__share__title">Share this article</span>
												<ul class="social-icons list-unstyled d-flex">
												  	<li class="social-icons__item">
														<a href="<?php the_field( 'social_icons_facebook', 'options' ); ?>" class="social-icons__item__social-icon-link d-flex align-items-center justify-content-center" target="_blank" rel="nofollow">
															<i class="fa fa-facebook"></i>
														</a>
												    </li><!-- .social-icons__item -->
												  	<li class="social-icons__item">
														<a href="<?php the_field( 'social_icons_twitter', 'options' ); ?>" class="social-icons__item__social-icon-link d-flex align-items-center justify-content-center" target="_blank" rel="nofollow">
															<i class="fa fa-twitter"></i>
														</a>
												    </li><!-- .social-icons__item -->
												</ul>
											</div><!-- /.single-latest-news__share -->
										</div><!-- /.col-md-6 -->
									</div><!-- /.row -->
								</div><!-- /.single-latest-news -->

							<?php endwhile; ?>

						</div><!-- /.latest-news__carousel owl-carousel -->
					</div><!-- /.col-lg-10 mx-auto -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.latest-news element-paddings -->

	<?php endif; ?>

	<section id="posts-from-past" class="posts-from-past element-paddings">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="posts-from-past__title text-center underline--dark">Posts from the past</h2><!-- /.post-from-past__title text-center underline--dark -->

					<?php $terms = get_terms( array(
					    'taxonomy' => 'category'
					) ); ?>

					<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>

						<ul class="posts-from-past__category-list list-unstyled d-flex justify-content-center">
							<li class="posts-from-past__category-list__single-item">
								<button type="button" data-filter="all" class="mixitup-control">All</button>
							</li>

							<?php foreach ( $terms as $term ): ?>

								<li class="posts-from-past__category-list__single-item">
									<button type="button" data-filter=".<?php echo $term->slug; ?>" class="mixitup-control"><?php echo $term->name; ?></button>
								</li>

							<?php endforeach; ?>

						</ul>

					<?php endif; ?>

					<div id="mixitup-posts-from-past" class="mixitup-posts-from-past d-flex flex-wrap">

						<?php if (have_posts()) :  ?>
							<?php $loopCounter = 0; ?>
							<?php while (have_posts()) : the_post();?>

								<?php $terms = get_the_terms( get_the_ID(), 'category' ); ?>

									<div class="single-box-post mix <?php foreach( $terms as $term)  echo ' '.$term->slug;  ?>">

										<?php if ( has_post_thumbnail() ): ?>

											<a href="<?php the_permalink(); ?>" class="single-box-post__image-wrapper background-cover lazy" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>');"></a>

										<?php endif; ?>

										<div class="single-box-post__content-wrapper" data-mh="single-box-post-wrapper-match-height">
											<a href="<?php the_permalink(); ?>" class="single-box-post__content-wrapper__title-link">
												<h3 class="single-box-post__content-wrapper__title-link__title underline--dark"><?php the_title(); ?></h3><!-- /.single-box-post__content-wrapper__title-link__title underline--dark -->
											</a>

											<div class="single-box-post__content-wrapper__content content" data-mh="single-box-post-content-wrapper-match-height">

												<?php echo excerpt(40); ?>

											</div><!-- /.single-box-post__content-wrapper__content content -->

											<a href="<?php the_permalink(); ?>" class="exceptional-travel-button exceptional-travel-button__bordered exceptional-travel-button__bordered--gray">Read more</a>

										</div><!-- /.single-box-post__content-wrapper -->
									</div><!-- /.single-box-post mix -->


								<?php $loopCounter++; ?>
							<?php endwhile; ?>

							<div class="mixitup-page-list w-100 justify-content-center d-flex align-items-center element-small-margin-top"></div><!-- /.mixitup-page-list w-100 justify-content-center d-flex align-items-center element-small-margin-top -->

						<?php endif; ?>

					</div><!-- /#mixitup-camps.mixitup-camps d-flex flex-wrap -->

				</div><!-- /.col-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section><!-- /.post-from-past element-paddings -->


	<?php $image = get_field('get_in_touch_background', 239); ?>

	<div class="in-touch text-center parallax-window" data-parallax="scroll" data-bleed="100" data-image-src="<?php echo $image['url']; ?>">
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
					<h2 class="in-touch__title underline--dark"><?php the_field('get_in_touch_highlight_text', 239); ?></h2><!-- /.in-touch__title -->
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

</main><!-- /#main.blog-page-template -->

<?php get_footer(); ?>
