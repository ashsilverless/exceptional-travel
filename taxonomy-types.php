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
        	if( $t->parent == 0 ) {
        		$term_ids[] = $t->term_id;
        	}
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

<main id="main" class="taxonomy-types-page" tabindex="-1">

	<?php $image = get_field('types_background', $term); ?>

	<section class="hello-section background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center parallax-window" data-parallax="scroll" data-bleed="100" data-image-src="<?php echo $image['url']; ?>">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="hello-section__title"><?php echo $term->name; ?></h1><!-- /.hello-section__title -->
				</div><!-- /.col-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section><!-- /.hello-section background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center -->
	
			<?php get_template_part( 'partials/type-thumbs' ); ?>	
	
	<div class="hello-section__countries d-flex align-items-center">
		<div class="container">
			<div class="row justify-content-around align-items-center">
				<div class="col-lg-4">
					<img src="<?php echo get_template_directory_uri(); ?>/images/world-map-mobile.svg" alt="Africa map" class="hello-section__countries__map svg" />
				</div><!-- /.col-lg-4 -->
				<div class="col-lg-8">

					<?php
					    $loop = new WP_Query(
					        array(
					        	'post_type' 	 => 'camp',
					        	'orderby' 		 => 'name',
							    'order'   		 => 'ASC',
							    'tax_query' => array(
						    		array(
						    			'taxonomy' => 'types',
						    			'field'    => 'slug',
					    				'terms'    => $term->slug,
						    		),
						    	)
					        )
					    );
					?>

					<?php if ($loop->have_posts()) :  ?>

						<?php $filters = array(); ?>

						<ul class="hello-section__countries__list list-unstyled element-padding-top">

							<li class="hello-section__countries__list__single-country">
								<a href="#mixitup-camps" data-filter="all" class="hello-section__countries__list__single-country__link country-<?php echo $term->slug; ?><?php if($term->slug == get_queried_object()->slug) { echo ' active'; } ?> scroll mixitup-control">All</a>
							</li>

						<?php while ($loop->have_posts()) : $loop->the_post();?>

							<?php $terms = get_the_terms( get_the_ID(), 'destinations' );
											usort($terms,"so980_sort_terms_alphabetically");
											$terms = get_lowest_taxonomy_terms($terms); ?>

							<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>
								<?php foreach ( $terms as $term ): ?>

									<?php if (!in_array($term, $filters)) {
											array_push($filters, $term);
										} ?>

								<?php endforeach; ?>
							<?php endif; ?>

						<?php endwhile; ?>

						<?php if( $filters ): ?>
							<?php foreach( $filters as $single_filter ): ?>

								<li class="hello-section__countries__list__single-country">
									<a href="#mixitup-camps" data-filter=".<?php echo $single_filter->slug; ?>" class="hello-section__countries__list__single-country__link country-<?php echo $single_filter->slug; ?><?php if($single_filter->slug == get_queried_object()->slug) { echo ' active'; } ?> scroll mixitup-control"><?php echo $single_filter->name; ?></a>
								</li>

							<?php endforeach; ?>
						<?php endif; ?>

						</ul><!-- /.hello-section__countries__list list-unstyled element-padding-top -->

					<?php endif; ?>

				</div><!-- /.col-lg-8 -->
			</div><!-- /.row justify-content-around align-items-center -->
		</div><!-- /.container -->

		<div class="hello-section__scroll-down text-center">
			<a href="#types-wrapper" class="d-inline-block scroll">
			    <span class="hello-section__scroll-down__arrow">
			        <i class="fa fa-angle-down" aria-hidden="true"></i>
			    </span>
			</a>
		</div><!-- /.hello-section__scroll-down text-center -->
	</div><!-- /.hello-section__countries d-flex align-items-center -->

	<?php $term = get_queried_object(); ?>

	<div id="types-wrapper" class="type element-padding-top text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-6 col-xxl-5 mx-auto">
					<h2 class="type__title underline--dark"><?php echo $term->name; ?></h2><!-- /.type__title -->
					<div class="type__content content">
						<?php the_field('types_description', $term); ?>
					</div><!-- /.type__content content -->
					
					<p class="exceptional-travel-button exceptional-travel-button__text-only open-trigger">Read More</p>					
					
					<div class="sl-collapse collapse element-small-margin-top" id="collapseCaption-<?php echo $term->slug; ?>">
						<div class="type__content content">
							<?php the_field('types_collapsed_description', $term); ?>
							
							<p class="exceptional-travel-button exceptional-travel-button__text-only close-trigger">Read Less</p>
							
						</div><!-- /.type__content content -->
					</div>
				
				</div><!-- /.col-md-8 col-lg-6 col-xxl-5 mx-auto -->
			</div><!-- /.row -->
		</div><!-- /.container -->

		<div id="where-go" class="camps element-margin-top element-padding-bottom text-left">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h3 class="camps__title underline--dark text-center">
					
						<?php if( get_field('alternative_heading', $term) ): 
							echo get_field('alternative_heading', $term);
								
							 else:?>
							Where to stay for <?php echo $term->name;
							
							endif; ?>
							
						</h3><!-- /.camps__title underline--dark text-center -->

						<?php if( get_field('additional_copy', $term) ): ?>
							
							<p class="text-center element-padding-bottom"><?php the_field('additional_copy', $term);?></p>
						
						<?php endif;?>

						<ul class="camps__regions-list list-unstyled d-flex justify-content-center">
							<li class="camps__regions-list__single-item">
								<button type="button" data-filter="all" class="mixitup-control">All</button>
							</li>

							<?php wp_reset_query(); ?>
							<?php $term = get_queried_object(); ?>
							<?php
							    $loop = new WP_Query(
							        array(
							        	'post_type' 	 => 'camp',
							        	'orderby' 		 => 'name',
									    'order'   		 => 'ASC',
									    'tax_query' => array(
								    		array(
								    			'taxonomy' => 'types',
								    			'field'    => 'slug',
							    				'terms'    => $term->slug,
								    		),
								    	)
							        )
							    );
							?>

							<?php if ($loop->have_posts()) :  ?>

								<?php $filters = array(); ?>

								<?php while ($loop->have_posts()) : $loop->the_post();?>

									<?php $terms = get_lowest_taxonomy_terms( get_object_term_cache( $post->ID, 'destinations') ); ?>

									<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>
										<?php foreach ( $terms as $term ): ?>

											<?php if (!in_array($term, $filters)) {
													array_push($filters, $term);
												} ?>

										<?php endforeach; ?>
									<?php endif; ?>

								<?php endwhile; ?>

								<?php $termMain = get_the_terms( get_the_ID(), 'destinations' ); ?>
								<?php $terms = get_lowest_taxonomy_terms( $termMain ); ?>

								<?php if( $filters ): ?>
									<?php foreach( $filters as $single_filter ): ?>

										<li class="camps__regions-list__single-item <?php echo $single_filter->slug; ?>">
											<button type="button" data-filter=".<?php echo $single_filter->slug; ?>" class="mixitup-control"><?php echo $single_filter->name; ?></button>
										</li>

									<?php endforeach; ?>
								<?php endif; ?>
							<?php endif; ?>

						</ul>

						<div id="mixitup-camps" class="mixitup-camps d-flex flex-wrap row-eq-height">

							<?php if ($loop->have_posts()) :  ?>
								<?php while ($loop->have_posts()) : $loop->the_post();?>

									<?php $terms = get_the_terms( get_the_ID(), 'destinations' ); ?>

									<div class="single-box-post mix <?php foreach( $terms as $term)  echo ' '.$term->slug;  ?>">

										<?php if ( has_post_thumbnail() ): ?>

											<a href="<?php the_permalink(); ?>" class="single-box-post__image-wrapper background-cover lazy" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>');"></a>

										<?php endif; ?>

										<div class="single-box-post__content-wrapper match-height">
											<a href="<?php the_permalink(); ?>" class="single-box-post__content-wrapper__title-link" data-mh="single-box-post-title-match-height">
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

						</div><!-- /#mixitup-camps.mixitup-camps d-flex flex-wrap -->

					</div><!-- /.col-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.camps element-margin-top element-padding-bottom text-left -->

	</div><!-- /.type element-padding-top text-center -->

	<?php get_template_part( 'partials/in-touch' ); ?>

</main><!-- /#main.taxonomy-types-page -->

<?php get_footer(); ?>