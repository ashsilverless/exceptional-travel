<?php get_header(); ?>
<?php $term = get_queried_object(); ?>

<?php function get_lowest_taxonomy_terms( $terms ) {
// if terms is not array or its empty don't proceed
if ( ! is_array( $terms ) || empty( $terms ) ) {
return false;
}
$filter = function($terms) use (&$filter) {
$return_terms = array();
$term_ids = array();
foreach ($terms as $t){
$term_ids[] = $t->term_id;
}
foreach ( $terms as $t ) {
if( $t->parent == false || !in_array($t->parent,$term_ids) )  {
//remove this term
}
else{
$return_terms[] = $t;
}
}
if( count($return_terms) ){
return $filter($return_terms);
}
else {
return $terms;
}
};
return $filter($terms);
} ?>

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

		<?php get_template_part( 'partials/destinations-thumbs' ); ?>

	<div class="hello-section__countries d-flex align-items-center">
		<div class="container">
			<div class="row justify-content-around align-items-center">
				<div class="col-lg-4">
					<?php $parentTax = $term->parent; ?>
					<?php $terme = get_term( $parentTax, 'destinations' );
							$sluged = $terme->slug; ?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/map__<?php if( $term->parent == 0 ) : ?><?= $term->slug; ?><?php else: ?><?= $sluged; ?><?php endif; ?>.svg" alt="<?= $term->name; ?> map" class="hello-section__countries__map svg" />
				</div><!-- /.col-lg-4 -->

				<div class="col-lg-8">

					<?php if( $term->parent == 0 ) : ?>

						<?php $terms = get_terms( array(
						    'taxonomy' => 'destinations',
						    'parent'   => $term->term_id,
						    'hide_empty' => false,
						) ); ?>

					<?php else: ?>

						<?php $parentTax = $term->parent; ?>

						<?php $terms = get_terms( array(
						    'taxonomy' => 'destinations',
						    'parent'   => $parentTax,
						    'hide_empty' => false,
						) ); ?>

					<?php endif; ?>

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

					<p class="exceptional-travel-button exceptional-travel-button__text-only open-trigger">Read More</p>

					<div class="sl-collapse element-small-margin-top" id="collapseCaption-<?php echo $term->slug; ?>">

						<div class="destination__content content">
							<?php the_field('destinations_collapsed_description', $term); ?>

							<p class="exceptional-travel-button exceptional-travel-button__text-only close-trigger">Read Less</p>

						</div><!-- /.destination__content content -->
					</div>

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

											<div class="single-box-post__content-wrapper__content content" data-mh="single-box-post-content-wrapper-match-height"><p>
												<?php if(get_field( 'destination_box', $term )): ?>
													<?php the_field( 'destination_box', $term ); ?>
												<?php else: ?>
													<?php $excerpt = wp_trim_words( get_field('destinations_description', $term ), $num_words = 20, $more = '...' ); ?>

													<?php echo $excerpt; ?>

												<?php endif; ?>
												</p>
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

									<div class="facts__content facts__content--excerpt content element-small-margin-top text-center text-md-left">

										<?php the_sub_field('content'); ?>
										<?php if( get_sub_field('additional_content') ): ?>
										<p class="exceptional-travel-button exceptional-travel-button__text-only open-trigger">Read More</p>
										<?php endif;?>
									</div><!-- /.facts__content content -->

									<div class="text-center text-md-left">
										<div class="sl-collapse" id="collapseCaption-more">
											<div class="facts__content content element-small-margin-top text-center text-md-left">
												<?php the_sub_field('additional_content'); ?>
												<p class="exceptional-travel-button exceptional-travel-button__text-only close-trigger">Read Less</p>
											</div><!-- /.facts__content content text-center text-md-left -->
										</div>

									</div><!-- /.text-center text-md-left -->

							<?php endwhile; ?>
						<?php endif; ?>

					</div><!-- /.col-md-3 mr-auto -->
				</div><!-- /.row -->

				<?php if( have_rows('destinations_when_to_go', $term) ): ?>
					<?php while( have_rows('destinations_when_to_go', $term) ): the_row(); ?>

						<div class="row">
							<div class="col-md-10 col-lg-8 mx-auto">
								<ul class="facts__months-list list-unstyled w-100 d-flex justify-content-between element-margin-top">
									<li class="facts__months-list__single-month<?php if( get_sub_field('january') == 'best' ) { echo ' best'; } elseif( get_sub_field('january') == 'good' ) { echo ' good'; } elseif( get_sub_field('january') == 'okay' ) { echo ' okay'; } else { echo ' off'; } ?>">J</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('february') == 'best' ) { echo ' best'; } elseif( get_sub_field('february') == 'good' ) { echo ' good'; } elseif( get_sub_field('february') == 'okay' ) { echo ' okay'; } else { echo ' off'; }  ?>">F</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('march') == 'best' ) { echo ' best'; } elseif( get_sub_field('march') == 'good' ) { echo ' good'; } elseif( get_sub_field('march') == 'okay' ) { echo ' okay'; } else { echo ' off'; }  ?>">M</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('april') == 'best' ) { echo ' best'; } elseif( get_sub_field('april') == 'good' ) { echo ' good'; } elseif( get_sub_field('april') == 'okay' ) { echo ' okay'; } else { echo ' off'; }  ?>">A</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('may') == 'best' ) { echo ' best'; } elseif( get_sub_field('may') == 'good' ) { echo ' good'; } elseif( get_sub_field('may') == 'okay' ) { echo ' okay'; } else { echo ' off'; }  ?>">M</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('june') == 'best' ) { echo ' best'; } elseif( get_sub_field('june') == 'good' ) { echo ' good'; } elseif( get_sub_field('june') == 'okay' ) { echo ' okay'; } else { echo ' off'; } ?>">J</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('july') == 'best' ) { echo ' best'; } elseif( get_sub_field('july') == 'good' ) { echo ' good'; } elseif( get_sub_field('july') == 'okay' ) { echo ' okay'; } else { echo ' off'; }  ?>">J</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('august') == 'best' ) { echo ' best'; } elseif( get_sub_field('august') == 'good' ) { echo ' good'; } elseif( get_sub_field('august') == 'okay' ) { echo ' okay'; } else { echo ' off'; }  ?>">A</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('september') == 'best' ) { echo ' best'; } elseif( get_sub_field('september') == 'good' ) { echo ' good'; } elseif( get_sub_field('september') == 'okay' ) { echo ' okay'; } else { echo ' off'; }  ?>">S</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('october') == 'best' ) { echo ' best'; } elseif( get_sub_field('october') == 'good' ) { echo ' good'; } elseif( get_sub_field('october') == 'okay' ) { echo ' okay'; } else { echo ' off'; }  ?>">O</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('november') == 'best' ) { echo ' best'; } elseif( get_sub_field('november') == 'good' ) { echo ' good'; } elseif( get_sub_field('november') == 'okay' ) { echo ' okay'; } else { echo ' off'; }  ?>">N</li><!-- /.facts__months-list__single-month -->
									<li class="facts__months-list__single-month<?php if( get_sub_field('december') == 'best' ) { echo ' best'; } elseif( get_sub_field('december') == 'good' ) { echo ' good'; } elseif( get_sub_field('december') == 'okay' ) { echo ' okay'; } else { echo ' off'; }  ?>">D</li><!-- /.facts__months-list__single-month -->
								</ul><!-- /.facts__months-list list-unstyled w-100 d-flex justify-content-between element-margin-top -->

								<ul class="facts__legend list-unstyled w-100 d-flex flex-wrap justify-content-around element-small-margin-top">
									<li class="best">High Season</li>
									<li class="good">Mid Season</li>
									<li class="okay">Shoulder Season</li>
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

							<?php $term = get_queried_object(); $parentTermId = $term->term_id; ?>
							<?php
							    $loop = new WP_Query(
							        array(
							        	'post_type' 	 => 'camp',
							        	'orderby' 		 => 'name',
									    'order'   		 => 'ASC',
									    'tax_query' => array(
								    		array(
								    			'taxonomy' => 'destinations',
								    			'field'    => 'slug',
							    				'terms'    => $term->slug,
								    		),
								    	)
							        )
							    );
							?>

<?php if ($loop->have_posts()) :

	//Add in clause to only show section if destination posts are present

?>

		<section class="camps element-paddings">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2 class="camps__title underline--dark text-center">
							<?php if( get_field('destinations_where_to_stay', $term) ):
								echo get_field('destinations_where_to_stay', $term);
							else:?>
								Where to stay
							<?php endif; ?>
						</h2><!-- /.camps__title underline--dark text-center -->
						<?php if( get_field('destinations_additional', $term) ): ?>
						<p class="where-additional"><?php echo get_field('destinations_additional', $term); ?></p>
						<?php endif; ?>
						<?php if( get_field('additional_text_-_destination_pages', 'option') ): ?>
						<p class="where-additional"><?php echo get_field('additional_text_-_destination_pages', 'option'); ?></p>
						<?php endif; ?>


						<ul class="camps__regions-list list-unstyled d-flex justify-content-center">

							<?php if ($loop->have_posts()) :  ?>
								<?php $filters = array(); ?>

								<?php while ($loop->have_posts()) : $loop->the_post();?>

									<?php $terms = get_lowest_taxonomy_terms(get_the_terms( get_the_ID(), array(
									    'taxonomy' => 'destinations'
									)) ); ?>

									<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>
										<?php foreach ( $terms as $term ): ?>

											<?php if (!in_array($term, $filters) && $term->term_id != $parentTermId) {
													array_push($filters, $term);
												} ?>

										<?php endforeach; ?>
									<?php endif; ?>
								<?php endwhile; ?>

								<?php if(sizeof($filters) > 0): ?>

									<li class="camps__regions-list__single-item">
										<button type="button" data-filter="all" class="mixitup-control">All</button>
									</li>

								<?php endif; ?>


								<?php if( $filters ): ?>
									<?php foreach( $filters as $single_filter ): ?>

										<li class="camps__regions-list__single-item">
											<button type="button" data-filter=".<?php echo $single_filter->slug; ?>" class="mixitup-control"><?php echo $single_filter->name; ?></button>
										</li>

									<?php endforeach; ?>
								<?php endif; ?>


							<?php endif; ?>

						</ul>

						<div id="mixitup-camps" class="mixitup-camps d-flex flex-wrap align-item-strech">

							<?php if ($loop->have_posts()) :  ?>
								<?php while ($loop->have_posts()) : $loop->the_post();?>

									<?php $terms = get_the_terms( get_the_ID(), 'destinations' ); ?>

									<div class="single-box-post mix flex-col<?php foreach( $terms as $term)  echo ' '.$term->slug;  ?>">

										<?php if ( has_post_thumbnail() ): ?>

											<a href="<?php the_permalink(); ?>" class="single-box-post__image-wrapper background-cover lazy" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>');"></a>

										<?php endif; ?>

										<div class="single-box-post__content-wrapper">
											<a href="<?php the_permalink(); ?>" class="single-box-post__content-wrapper__title-link d-block" data-mh="single-box-post-title-match-height">
												<h3 class="single-box-post__content-wrapper__title-link__title underline--dark"><?php the_title(); ?></h3><!-- /.single-box-post__content-wrapper__title-link__title underline--dark -->
											</a>

											<div class="single-box-post__content-wrapper__content content" data-mh="single-box-post-content-wrapper-match-height">

												<?php the_excerpt(); ?>

											</div><!-- /.single-box-post__content-wrapper__content content -->

											<a href="<?php the_permalink(); ?>" class="exceptional-travel-button exceptional-travel-button__bordered exceptional-travel-button__bordered--gray">take me to <b><?php the_title(); ?></b></a>

										</div><!-- /.single-box-post__content-wrapper -->
									</div><!-- /.single-box-post mix -->

								<?php endwhile; ?>

								<div class="mixitup-page-list w-100 justify-content-center d-flex align-items-center element-small-margin-top"></div><!-- /.mixitup-page-list w-100 justify-content-center d-flex align-items-center element-small-margin-top -->

							<?php endif; ?>

						</div><!-- /#mixitup-camps.mixitup-camps d-flex flex-wrap align-item-strech -->

					</div><!-- /.col-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.camps element-paddings -->

<?php endif; ?>

<?php endif;  //End if to show section only when destination posts are present ?>

	<?php get_template_part( 'partials/in-touch' ); ?>

</main><!-- /#main.taxonomy-destinations-page -->

<?php get_footer(); ?>
