<?php get_header(); ?>

<main id="main" class="error-page-template" tabindex="-1">

    <div class="hello-section background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center parallax-window" data-parallax="scroll" data-bleed="100" data-image-src="<?php echo get_template_directory_uri(); ?>/images/page-not-found.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="hello-section__title">Page Not Found</h1><!-- /.hello-section__title -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.hello-section background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center -->

    <article class="error-page element-paddings">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="error-page__content content text-center">
                        <h2>Sorry, but the page you were trying to view does not exist.</h2>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="exceptional-travel-button exceptional-travel-button__bordered exceptional-travel-button__bordered--gray" style="border: 3px solid hsl(36, 60%, 65%);">Head back to the home page</a>                        
                    </div><!-- /.error-page__content content text-center -->
                </div><!-- /.col-md-10 mx-auto -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </article><!-- /.error-page element-paddings -->

</main><!-- /#main.error-page-template -->

<?php get_footer(); ?>