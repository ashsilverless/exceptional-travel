<?php get_header(); ?>

<main id="main" class="camp-single-post-page <?php the_field('type'); ?>" tabindex="-1">

	<div class="hello-section background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center parallax-window" data-parallax="scroll" data-bleed="100" data-image-src="<?php echo get_the_post_thumbnail_url() ?>">
	</div><!-- /.hello-section background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center -->

	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<?php bcn_display(); ?>
				</div><!-- /.col-12 text-center -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.breadcrumbs -->

	<article class="single-camp element-padding-top">
		<div class="container">
			<div class="row">
				<div class="col-md-10 mx-auto">
					<h1 class="single-camp__title underline--dark text-center"><?php the_title(); ?></h1><!-- /.single-camp__title underline--dark text-center -->
					<div class="single-camp__lead content element-small-margin-top">
						<span class="lead">
							<p>
								<?php the_field('camp_lead'); ?>
							</p>
						</span>
					</div><!-- /.single-camp__lead content element-small-margin-top -->
					<div class="single-camp__content content element-small-margin-top">
						<?php the_content(); ?>
					</div><!-- /.single-camp__content content element-small-margin-top -->
				</div><!-- /.col-md-10 mx-auto -->
				<div class="col-12">

					<div class="single-camp__gallery owl-carousel element-margin-top expert-led-gallery">

						<?php if ( have_rows( 'gallery_section' ) ) : ?>

							<?php while ( have_rows( 'gallery_section' ) ) : the_row(); ?>

								<?php $image = get_sub_field('gallery_image'); ?>
								<?php if( $image ): ?>

                                    <?php
                                    $the_overlay = get_sub_field('day_marker');
                                    ?>

									<a href="<?php echo $image['url']; ?>" class="single-camp__gallery__single-image-link fancybox" rel="gallery" title="<?php echo $the_overlay; ?>">
										<img src="<?php echo $image['sizes']['post-gallery-image']; ?>" alt="<?php echo $image['alt']; ?>" class="single-camp__gallery__single-image-link__image" />
										 <?php the_sub_field('day_marker');?>
									</a>

								<?php endif; ?>

								<?php $image = get_sub_field('video_placeholder'); ?>
								<?php if( $image ): ?>

									<a href="<?php the_sub_field('video_url', false, false); ?>&autoplay=1" class="single-camp__gallery__single-video-link" rel="gallery">
										 <img src="<?php echo $image['sizes']['post-gallery-image']; ?>" alt="<?php echo $image['alt']; ?>" class="single-camp__gallery__single-video-link__image" />
									</a>

								<?php endif; ?>
							<?php endwhile; ?>

						<?php endif; ?>

					</div><!-- /.single-camp__gallery owl-carousel element-margin-top -->

				</div><!-- /.col-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</article><!-- /.single-camp element-padding-top -->

<?php
  if(get_field('type') == "expert"): ?>

<?php else:?>

	<section class="location element-padding-top">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h3 class="location__title d-block text-center">Location</h3><!-- /.location__title d-block text-center -->
					</div><!-- /.col-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		<div class="container-fluid">
			<?php $location = get_field('location'); ?>

			<?php if( !empty($location) ): ?>

				<div id="acf-colour-map" class="acf-map">
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
				</div>

			<?php endif; ?>

		</div><!-- /.container-fluid -->
	</section><!-- /.location element-padding-top -->

<? endif;?>




	<?php $post_objects = get_field('combines_well_with'); ?>

		<?php if( $post_objects ): ?>

			<section class="combines element-paddings">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<h3 class="combines__title d-block text-center">Combines well with</h3><!-- /.combines__title d-block text-center -->
						</div><!-- /.col-12 -->

					    <?php foreach( $post_objects as $post): ?>
					        <?php setup_postdata($post); ?>

					        <div class="col-md-4">
					        	<div class="single-box-post mix <?php foreach( $terms as $term)  echo ' '.$term->slug;  ?>">

					        		<?php if ( has_post_thumbnail() ): ?>

					        			<a href="<?php the_permalink(); ?>" class="single-box-post__image-wrapper background-cover lazy" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>');"></a>

					        		<?php endif; ?>

					        		<div class="single-box-post__content-wrapper">
					        			<a href="<?php the_permalink(); ?>" class="single-box-post__content-wrapper__title-link" data-mh="single-box-post-title-match-height">
					        				<h3 class="single-box-post__content-wrapper__title-link__title underline--dark"><?php the_title(); ?></h3><!-- /.single-box-post__content-wrapper__title-link__title underline--dark -->
					        			</a>

					        			<div class="single-box-post__content-wrapper__content content">

					        				<?php the_excerpt(); ?>

					        			</div><!-- /.single-box-post__content-wrapper__content content -->

					        			<a href="<?php the_permalink(); ?>" class="exceptional-travel-button exceptional-travel-button__bordered exceptional-travel-button__bordered--gray">take me to <b><?php the_title(); ?></b></a>

					        		</div><!-- /.single-box-post__content-wrapper -->
					        	</div><!-- /.single-box-post mix -->
					        </div><!-- /.col-md-4 -->

					    <?php endforeach; ?>

					</div><!-- /.row -->
				</div><!-- /.container -->
			</section><!-- /.combines element-paddings -->

		<?php endif; ?>

	<?php get_template_part( 'partials/in-touch' ); ?>

</main><!-- /#main.camp-single-post-page -->

<?php get_footer('google-map'); ?>
