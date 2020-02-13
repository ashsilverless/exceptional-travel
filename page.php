<?php get_header(); ?>

<main id="main" class="standard-page-template" tabindex="-1">

	<div class="hello-section background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center parallax-window" data-parallax="scroll" data-bleed="100" data-image-src="<?php if ( has_post_thumbnail() ) { echo get_the_post_thumbnail_url(); } else { echo get_template_directory_uri().'/images/bgd__testimonials.jpg';}?>">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="hello-section__title"><?php the_title(); ?></h1><!-- /.hello-section__title -->
				</div><!-- /.col-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.hello-section background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center -->

	<article class="standard-page element-paddings">
		<div class="container">
			<div class="row">
				<div class="col-md-10 mx-auto">
					<div class="standard-page__content content">
						<?php the_content(); ?>
					</div><!-- /.standard-page__content content -->
				</div><!-- /.col-md-10 mx-auto -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</article><!-- /.standard-page element-paddings -->

</main><!-- /#main.standard-page-template -->

<?php get_footer(); ?>