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

<main id="main" class="taxonomy-types-page taxonomy-types-page--private-villas" tabindex="-1">

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
	<div class="hello-section__countries d-flex align-items-center">
		<div class="container">
			<div class="row justify-content-around align-items-center">
				<div class="col-lg-3 ml-lg-auto">
					<ul class="nav nav-tabs d-flex flex-wrap justify-content-center" id="myTab" role="tablist">
					  <li class="nav-item text-center">
					    <a class="nav-link" id="category-tab" data-toggle="tab" href="#category" role="tab" aria-controls="category" aria-selected="false">
					    	<img src="<?php echo get_template_directory_uri(); ?>/images/icon__category.svg" alt="icon" class="nav-link__icon mx-auto svg" />
							<span class="nav-link__subtitle">Category</span>
					   	</a>
					  </li>
					  <li class="nav-item nav-item--second text-center">
					    <a class="nav-link active" id="destination-tab" data-toggle="tab" href="#destination" role="tab" aria-controls="destination" aria-selected="true">
					    	<img src="<?php echo get_template_directory_uri(); ?>/images/icon__map.svg" alt="icon" class="nav-link__icon mx-auto svg" />
							<span class="nav-link__subtitle">Destination</span>
					    </a>
					  </li>
					</ul>
				</div><!-- /.col-lg-3 ml-lg-auto -->
				<div class="col-12 col-lg-auto mx-lg-auto">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade" id="category" role="tabpanel" aria-labelledby="category-tab">
							<span class="tab-pane__title d-block mx-auto element-margin-top">Filter by</span>

							<ul class="hello-section__countries__list list-unstyled">

								<li class="hello-section__countries__list__single-country">
									<a href="#mixitup-camps-villas" data-filter="all" class="hello-section__countries__list__single-country__link country-<?php echo $term->slug; ?><?php if($term->slug == get_queried_object()->slug) { echo ' active'; } ?> mixitup-control scroll">All</a>
								</li>

								<?php $termCategory = get_terms( array(
								    'taxonomy' => 'types',
								    'parent' => '26',
								) ); ?>


								<?php if ( ! empty( $termCategory ) && ! is_wp_error( $termCategory ) ): ?>
									<?php foreach ( $termCategory as $termCat ): ?>

										<li class="hello-section__countries__list__single-country">
											<a href="#mixitup-camps-villas" data-filter=".<?php echo $termCat->slug; ?>" class="hello-section__countries__list__single-country__link country-<?php echo $termCat->slug; ?><?php if($termCat->slug == get_queried_object()->slug) { echo ' active'; } ?> mixitup-control scroll"><?php echo $termCat->name; ?></a>
										</li>

									<?php endforeach; ?>
								<?php endif; ?>

							</ul>

						</div><!-- /.tab-pane fade -->

						<div class="tab-pane fade show active" id="destination" role="tabpanel" aria-labelledby="destination-tab">
							<span class="tab-pane__title d-block mx-auto element-margin-top">Filter by</span>

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

								<ul class="hello-section__countries__list list-unstyled">

									<li class="hello-section__countries__list__single-country">
										<a href="#mixitup-camps-villas" data-filter="all" class="hello-section__countries__list__single-country__link country-<?php echo $term->slug; ?><?php if($term->slug == get_queried_object()->slug) { echo ' active'; } ?> mixitup-control scroll">All</a>
									</li>

								<?php while ($loop->have_posts()) : $loop->the_post();?>

									<?php $terms = get_lowest_taxonomy_terms(get_the_terms( get_the_ID(), array(
									    'taxonomy' => 'destinations'
									)) ); ?>

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
											<a href="#mixitup-camps-villas" data-filter=".<?php echo $single_filter->slug; ?>" class="hello-section__countries__list__single-country__link country-<?php echo $single_filter->slug; ?><?php if($single_filter->slug == get_queried_object()->slug) { echo ' active'; } ?> mixitup-control scroll"><?php echo $single_filter->name; ?></a>
										</li>

									<?php endforeach; ?>
								<?php endif; ?>

								</ul><!-- /.hello-section__countries__list list-unstyled -->

							<?php endif; ?>

						</div><!-- /.tab-pane fade show active -->

					</div><!-- /.tab-content -->
				</div><!-- /.col-12 col-lg-auto mx-lg-auto -->
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

	<div id="types-wrapper" class="type element-paddings text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-6 col-xxl-5 mx-auto">
					<h2 class="type__title underline--dark"><?php echo $term->name; ?></h2><!-- /.type__title -->
					<div class="type__content content">
						<?php the_field('types_description', $term); ?>
					</div><!-- /.type__content content -->
					<div class="collapse element-small-margin-top" id="collapseCaption-<?php echo $term->slug; ?>">
						<div class="type__content content">
							<?php the_field('types_collapsed_description', $term); ?>
						</div><!-- /.type__content content -->
					</div>
					<a class="exceptional-travel-button exceptional-travel-button__text-only expanded-content-collapse-button" data-toggle="collapse" href="#collapseCaption-<?php echo $term->slug; ?>" aria-expanded="false" aria-controls="collapseCaption-<?php echo $term->slug; ?>">
					    Read More
					</a>
				</div><!-- /.col-md-8 col-lg-6 col-xxl-5 mx-auto -->
			</div><!-- /.row -->
		</div><!-- /.container -->

		<div id="where-go" class="camps text-left">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div id="mixitup-camps-villas" class="mixitup-camps d-flex flex-wrap">

							<?php if ($loop->have_posts()) :  ?>
								<?php while ($loop->have_posts()) : $loop->the_post();?>

									<?php $terms = get_the_terms( get_the_ID(), 'destinations' ); ?>
									<?php $termCategory = get_the_terms( get_the_ID(), 'types' ); ?>

									<div class="single-box-post mix <?php foreach( $terms as $term)  echo ' '.$term->slug;  ?><?php foreach( $termCategory as $termCat ) echo ' '.$termCat->slug; ?>">

										<?php if ( has_post_thumbnail() ): ?>

											<a href="<?php the_permalink(); ?>" class="single-box-post__image-wrapper background-cover lazy" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>');"></a>

										<?php endif; ?>

										<div class="single-box-post__content-wrapper">
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
		</div><!-- /.camps text-left -->

	</div><!-- /.type element-paddings text-center -->

	<?php get_template_part( 'partials/in-touch' ); ?>

</main><!-- /#main.taxonomy-types-page -->

<?php get_footer(); ?>

