<?php get_header(); ?>
<?php $term = get_queried_object(); ?>


<main id="main" class="taxonomy-destinations-page" tabindex="-1">

	<?php $image = get_field('destinations_background', $term); ?>

	<section class="hello-section background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center parallax-window" data-parallax="scroll" data-bleed="100" data-image-src="<?php echo $image['url']; ?>">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="hello-section__title"><?php echo $term->name; ?></h1><!-- /.hello-section__title -->
				</div><!-- /.col-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section><!-- /.hello-section background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center -->
	<div class="hello-section__countries d-flex align-items-center">
		<div class="container">
			<div class="row justify-content-around align-items-center">
				<div class="col-lg-4">
					<img src="<?php echo get_template_directory_uri(); ?>/images/map__australia.svg" alt="Australia map" class="hello-section__countries__map svg" />
				</div><!-- /.col-lg-4 -->
				<div class="col-lg-8">


					<?php $terms = get_terms( array(
					    'taxonomy' => 'destinations',
					    'parent'   => $term->term_id,
					    'hide_empty' => false,
					) ); ?>


					<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>

						<ul class="hello-section__countries__list list-unstyled element-padding-top">

							<?php $i = 1; ?>
							<?php foreach ( $terms as $term ): ?>

								<li class="hello-section__countries__list__single-country text-center<?php if( ($i + 2) % 3 == 0 ) { echo ' 3';} ?>">
									<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="hello-section__countries__list__single-country__link country-<?php echo $term->slug; ?><?php if($term->slug == get_queried_object()->slug) { echo ' active'; } ?>">
										<?php echo $term->name; ?>
									</a>
								</li>

								<?php $i++; ?>
							<?php endforeach; ?>

						</ul><!-- /.hello-section__countries__list list-unstyled element-padding-top -->

					<?php endif; ?>

				</div><!-- /.col-lg-8 -->
			</div><!-- /.row justify-content-around align-items-center -->
		</div><!-- /.container -->

		<div class="hello-section__scroll-down text-center">
			<a href="#destinations-wrapper" class="d-inline-block scroll">
			    <span class="hello-section__scroll-down__arrow">
			        <i class="fa fa-angle-down" aria-hidden="true"></i>
			    </span>
			</a>
		</div><!-- /.hello-section__scroll-down text-center -->
	</div><!-- /.hello-section__countries d-flex align-items-center -->

	<?php $term = get_queried_object(); ?>

	<div id="destinations-wrapper" class="destination element-paddings text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-6 col-xxl-5 mx-auto">
					<h2 class="destination__title underline--dark"><?php echo $term->name; ?></h2><!-- /.destination__title -->
					<div class="destination__content content">
						<?php the_field('destinations_description', $term); ?>
					</div><!-- /.destination__content content -->
					<div class="collapse element-small-margin-top" id="collapseCaption-<?php echo $term->slug; ?>">
						<div class="destination__content content">
							<?php the_field('destinations_collapsed_description', $term); ?>
						</div><!-- /.destination__content content -->
					</div>
					<a class="exceptional-travel-button exceptional-travel-button__text-only expanded-content-collapse-button" data-toggle="collapse" href="#collapseCaption-<?php echo $term->slug; ?>" aria-expanded="false" aria-controls="collapseCaption-<?php echo $term->slug; ?>">
					    Read More
					</a>
				</div><!-- /.col-md-8 col-lg-6 col-xxl-5 mx-auto -->
			</div><!-- /.row -->
		</div><!-- /.container -->

		<?php if( $term->parent == 0 ) : ?>

			<div class="destination__countries element-padding-top text-left">
				<div class="container">
					<div class="row">

						<?php $terms = get_terms( array(
						    'taxonomy' => 'destinations',
						    'parent'   => $term->term_id,
						    'hide_empty' => false,
						) ); ?>

						<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>

							<?php $loopCounter = 1; ?>
							<?php foreach ( $terms as $term ): ?>

								<?php $image = get_field('destinations_thumbnails', $term); ?>
								<div class="col-sm-6 col-md-4">
									<div class="single-box-post<?php if( $loopCounter==1 ) { echo ' single-box-post--first';} elseif( $loopCounter == 2 ) { echo ' single-box-post--second'; } elseif( $loopCounter == 3 ) { echo ' single-box-post--third';} ?>">

										<?php $image = get_field('destinations_thumbnails', $term); ?>

										<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="single-box-post__image-wrapper background-cover lazy" style="background-image: url('<?php echo $image['url']; ?>');"></a>

										<div class="single-box-post__content-wrapper"  data-mh="single-box-content-post-match-height">
											<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="single-box-post__content-wrapper__title-link">
												<h3 class="single-box-post__content-wrapper__title-link__title underline--dark"><?php echo $term->name; ?></h3><!-- /.single-box-post__content-wrapper__title-link__title underline--dark -->
											</a>

											<div class="single-box-post__content-wrapper__content content" data-mh="single-box-post-content-wrapper-match-height">

												<?php if(get_field( 'destination_box', $term )): ?>

													<?php the_field( 'destination_box', $term ); ?>

												<?php else: ?>

													<?php $excerpt = wp_trim_words( get_field('destinations_description', $term ), $num_words = 20, $more = '...' ); ?>

													<?php echo $excerpt; ?>

												<?php endif; ?>

											</div><!-- /.single-box-post__content-wrapper__content content -->

											<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="exceptional-travel-button exceptional-travel-button__bordered exceptional-travel-button__bordered--gray">take me to <b><?php echo $term->name; ?></b></a>
										</div><!-- /.single-box-post__content-wrapper -->
									</div><!-- /.single-box-post -->
								</div><!-- /.col-sm-6 col-md-4 -->

								<?php $loopCounter++; ?>
							<?php endforeach; ?>

						<?php endif; ?>

					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.destination__countries element-padding-top text-left -->

		<?php endif; ?>

	</div><!-- /.destination element-paddings text-center -->

	<?php $term = get_queried_object(); ?>

	<?php if( !$term->parent == 0 ) : ?>

		<section class="facts element-paddings">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2 class="facts__title underline--dark text-center">Quick Facts</h2><!-- /.facts__title underline--dark text-center -->
					</div><!-- /.col-12 -->
				</div><!-- /.row -->
				<div class="row">
					<div class="col-md-6 col-lg-5 col-xl-4 ml-auto">

						<?php $image = get_field('destinations_map_icon', $term); ?>

						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="facts__icon-map element-small-margin-top svg mx-auto" />

					</div><!-- /.col-md-6 col-lg-5 col-xl-4 ml-auto -->
					<div class="col-md-3">
						<div class="facts__content content element-small-margin-top text-center text-md-left">
							<?php the_field('destinations_quick_facts', $term); ?>
						</div><!-- /.facts__content content -->
					</div><!-- /.col-md-3 -->
					<div class="col-md-3 mr-auto">

						<?php if( have_rows('destinations_when_to_go', $term) ): ?>
							<?php while( have_rows('destinations_when_to_go', $term) ): the_row(); ?>

								<?php $countWord = str_word_count( get_sub_field('content') ); ?>

								<?php if($countWord < 150): ?>

									<div class="facts__content content element-small-margin-top text-center text-md-left">

										<?php the_sub_field('content'); ?>

									</div><!-- /.facts__content content -->

								<?php else: ?>

									<div class="facts__content facts__content--excerpt content element-small-margin-top text-center text-md-left">

										<?php the_sub_field('content'); ?>

									</div><!-- /.facts__content content -->

									<div class="text-center text-md-left">
										<div class="collapse" id="collapseCaption-more">
											<div class="facts__content content element-small-margin-top text-center text-md-left">
												<?php the_sub_field('content'); ?>
											</div><!-- /.facts__content content text-center text-md-left -->
										</div>
										<a id="more-facts" class="exceptional-travel-button exceptional-travel-button__text-only expanded-content-collapse-button" data-toggle="collapse" href="#collapseCaption-more" aria-expanded="false" aria-controls="collapseCaption-more">
										    Read More
										</a>
									</div><!-- /.text-center text-md-left -->

								<?php endif; ?>

							<?php endwhile; ?>
						<?php endif; ?>

					</div><!-- /.col-md-3 mr-auto -->
				</div><!-- /.row -->

				<?php if( have_rows('destinations_when_to_go', $term) ): ?>
					<?php while( have_rows('destinations_when_to_go', $term) ): the_row(); ?>

						<div class="row">
							<div class="col-md-10 col-lg-8 mx-auto">
								<ul class="facts__months-list list-unstyled w-100 d-flex justify-content-between element-margin-top">
									<li class="facts__months-list__single-month<?php if( get_sub_field('january') == 'best' ) { echo ' best'; } elseif( get_sub_field('january') == 'good' ) { echo ' good'; } else { echo ' okay'; } ?>">J</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('february') == 'best' ) { echo ' best'; } elseif( get_sub_field('february') == 'good' ) { echo ' good'; } else { echo ' okay'; } ?>">F</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('march') == 'best' ) { echo ' best'; } elseif( get_sub_field('march') == 'good' ) { echo ' good'; } else { echo ' okay'; } ?>">M</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('april') == 'best' ) { echo ' best'; } elseif( get_sub_field('april') == 'good' ) { echo ' good'; } else { echo ' okay'; } ?>">A</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('may') == 'best' ) { echo ' best'; } elseif( get_sub_field('may') == 'good' ) { echo ' good'; } else { echo ' okay'; } ?>">M</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('june') == 'best' ) { echo ' best'; } elseif( get_sub_field('june') == 'good' ) { echo ' good'; } else { echo ' okay'; } ?>">J</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('july') == 'best' ) { echo ' best'; } elseif( get_sub_field('july') == 'good' ) { echo ' good'; } else { echo ' okay'; } ?>">J</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('august') == 'best' ) { echo ' best'; } elseif( get_sub_field('august') == 'good' ) { echo ' good'; } else { echo ' okay'; } ?>">A</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('september') == 'best' ) { echo ' best'; } elseif( get_sub_field('september') == 'good' ) { echo ' good'; } else { echo ' okay'; } ?>">S</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('october') == 'best' ) { echo ' best'; } elseif( get_sub_field('october') == 'good' ) { echo ' good'; } else { echo ' okay'; } ?>">O</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('november') == 'best' ) { echo ' best'; } elseif( get_sub_field('november') == 'good' ) { echo ' good'; } else { echo ' okay'; } ?>">N</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('december') == 'best' ) { echo ' best'; } elseif( get_sub_field('december') == 'good' ) { echo ' good'; } else { echo ' okay'; } ?>">D</li><!-- /.facts__months-list__single-month -->
								</ul><!-- /.facts__months-list list-unstyled w-100 d-flex justify-content-between element-margin-top -->

								<ul class="facts__legend list-unstyled w-100 d-flex flex-wrap justify-content-around element-small-margin-top">
									<li class="best">Best time to visit</li>
									<li class="good">Good time to visit</li>
									<li class="okay">Okay time to visit</li>
								</ul><!-- /.facts__legend list-unstyled w-100 d-flex flex-wrap justify-content-around element-small-margin-top -->
							</div><!-- /.col-md-10 col-lg-8 mx-auto -->
						</div><!-- /.row -->

					<?php endwhile; ?>
				<?php endif; ?>

				<?php if( have_rows('highlights', $term) ): ?>

					<div class="row">
						<div class="col-12">
							<h2 class="facts__title underline--dark text-center element-margin-top"><?php the_field('highlights_title', $term); ?></h2><!-- /.facts__title underline--dark text-center element-margin-top -->

							<div class="facts__regions">
								<div class="d-block d-md-none">
									<div id="accordion" role="tablist" class="element-padding-top">

										<?php $loopCounter = 1; ?>
										<?php while( have_rows('highlights', $term) ): the_row(); ?>

											<div class="card">
												<div class="card-header" role="tab" id="heading-<?php echo $loopCounter; ?>">

													<?php $image = get_sub_field('highlight_thumbnail'); ?>

													<a class="card-header__link" data-toggle="collapse" href="#collapse-<?php echo $loopCounter; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $loopCounter; ?>">
											        	<h3 class="card-header__link__title"><?php the_sub_field('highlight_title'); ?></h3>
											        	<img data-src="<?php echo $image['url']; ?>" src="<?php echo get_template_directory_uri(); ?>/images/img__empty.png" alt="<?php echo $image['alt']; ?>" class="card-header__link__image lazy" />
											        </a>
												</div><!-- /.card-header -->
												<div id="collapse-<?php echo $loopCounter; ?>" class="collapse" role="tabpanel" aria-labelledby="heading-<?php echo $loopCounter; ?>" data-parent="#accordion">
													<div class="card-body">

														<?php $images = get_sub_field('highlight_gallery'); ?>

														<?php if( $images ): ?>

															<div class="card-body__gallery country-gallery owl-carousel">

																<?php foreach( $images as $image ): ?>

																	<img src="<?php echo $image['sizes']['gallery-image-mobile']; ?>" alt="<?php echo $image['alt']; ?>" class="card-body__gallery__single-image" />

																<?php endforeach; ?>

															</div><!-- /.card-body__gallery owl-carousel -->

														<?php endif; ?>

														<h3 class="card-body__title element-small-margin-top"><?php the_sub_field('highlight_title'); ?></h3>
														<div class="card-body__content content element-small-margin-top">
															<?php the_sub_field('highlight_content'); ?>
														</div><!-- /.card-body__content content element-small-margin-top -->
													</div><!-- /.card-body -->
												</div><!-- /#collapeOne.collapse show -->
											</div><!-- /.card -->

											<?php $loopCounter++; ?>
										<?php endwhile; ?>

									</div><!-- /#accordion.element-padding-top -->
								</div><!-- /.d-block d-md-none -->

								<div class="d-none d-md-block">
									<ul id="myTab" class="nav nav-tabs d-flex justify-content-center owl-carousel owl-theme" role="tablist">

										<?php $loopCounter = 1; ?>
										<?php while( have_rows('highlights', $term) ): the_row(); ?>

											<?php $image = get_sub_field('highlight_thumbnail'); ?>

											<li class="nav-item text-center">
												<a class="nav-link element-paddings lazy background-cover" data-src="<?php echo $image['url']; ?>" id="tab-<?php echo $loopCounter; ?>" data-toggle="tab" href="#country-tab-<?php echo $loopCounter; ?>" role="tab" aria-controls="country-tab-<?php echo $loopCounter; ?>" aria-selected="false">
													<h3 class="nav-link__title"><?php the_sub_field('highlight_title'); ?></h3>
												</a>
											</li>

											<?php $loopCounter++; ?>
										<?php endwhile; ?>

									</ul>
									<div class="tab-content">

										<?php $loopCounter = 1; ?>
										<?php while( have_rows('highlights', $term) ): the_row(); ?>

											<div id="country-tab-<?php echo $loopCounter; ?>" class="tab-pane fade" role="tabpanel" aria-labelledby="tab-<?php echo $loopCounter; ?>">

												<?php $images = get_sub_field('highlight_gallery'); ?>

												<?php if( $images ): ?>

													<div class="tab-pane__gallery country-gallery owl-carousel">

														<?php foreach( $images as $image ): ?>

															<img src="<?php echo $image['sizes']['gallery-image']; ?>" alt="<?php echo $image['alt']; ?>" class="tab-pane__gallery__single-image" />

														<?php endforeach; ?>

													</div><!-- /.tab-pane__gallery owl-carousel -->

												<?php endif; ?>

												<h3 class="tab-pane__title element-small-margin-top"><?php the_sub_field('highlight_title'); ?></h3>
												<div class="tab-pane__content content element-small-margin-top">
													<?php the_sub_field('highlight_content'); ?>
												</div><!-- /.tab-pane__content content element-small-margin-top -->

											</div><!-- /.tab-pane fade element-paddings -->

											<?php $loopCounter++; ?>
										<?php endwhile; ?>

									</div><!-- /.tab-content -->
								</div><!-- /.d-none d-md-block -->
							</div><!-- /.facts__regions -->
						</div><!-- /.col-12 -->
					</div><!-- /.row -->

				<?php endif; ?>

			</div><!-- /.container -->
		</section><!-- /.facts element-paddings -->

	<?php endif; ?>

	<?php $term = get_queried_object(); ?>

	<div class="destination element-padding-bottom text-center">
		<div class="destination__countries element-padding-top text-left">
			<div class="container">
				<div class="row">

					<?php $terms = get_terms( array(
					    'taxonomy' => 'destinations',
					    'parent'   => $term->term_id,
					    'hide_empty' => false,
					) ); ?>

					<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>

						<?php $loopCounter = 1; ?>
						<?php foreach ( $terms as $term ): ?>

							<?php $image = get_field('destinations_thumbnails', $term); ?>
							<div class="col-sm-6 col-md-4">
								<div class="single-box-post<?php if( $loopCounter==1 ) { echo ' single-box-post--first';} elseif( $loopCounter == 2 ) { echo ' single-box-post--second'; } elseif( $loopCounter == 3 ) { echo ' single-box-post--third';} ?>">

									<?php $image = get_field('destinations_thumbnails', $term); ?>

									<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="single-box-post__image-wrapper background-cover lazy" style="background-image: url('<?php echo $image['url']; ?>');"></a>

									<div class="single-box-post__content-wrapper"  data-mh="single-box-content-post-match-height">
										<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="single-box-post__content-wrapper__title-link">
											<h3 class="single-box-post__content-wrapper__title-link__title underline--dark"><?php echo $term->name; ?></h3><!-- /.single-box-post__content-wrapper__title-link__title underline--dark -->
										</a>

										<div class="single-box-post__content-wrapper__content content" data-mh="single-box-post-content-wrapper-match-height">

											<?php if(get_field( 'destination_box', $term )): ?>

												<?php the_field( 'destination_box', $term ); ?>

											<?php else: ?>

												<?php $excerpt = wp_trim_words( get_field('destinations_description', $term ), $num_words = 20, $more = '...' ); ?>

												<?php echo $excerpt; ?>

											<?php endif; ?>

										</div><!-- /.single-box-post__content-wrapper__content content -->

										<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="exceptional-travel-button exceptional-travel-button__bordered exceptional-travel-button__bordered--gray">take me to <b><?php echo $term->name; ?></b></a>
									</div><!-- /.single-box-post__content-wrapper -->
								</div><!-- /.single-box-post -->
							</div><!-- /.col-sm-6 col-md-4 -->

							<?php $loopCounter++; ?>
						<?php endforeach; ?>

					<?php endif; ?>

				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.destination__countries element-padding-top text-left -->
	</div><!-- /.destination element-padding-bottom text-center -->

	<?php get_template_part( 'partials/in-touch' ); ?>

</main><!-- /#main.taxonomy-destinations-page -->

<?php get_footer(); ?>