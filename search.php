<?php get_header(); ?>

<main id="main" class="search-results-page" tabindex="-1">

    <div class="hello-section background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center parallax-window" data-parallax="scroll" data-bleed="100" data-image-src="<?php echo get_template_directory_uri(); ?>/images/search.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="hello-section__title">Search Results for '<?php echo get_search_query(); ?>'</h1><!-- /.hello-section__title -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.hello-section background-cover lazy element-paddings d-flex flex-wrap align-items-center text-center -->

    <section class="search-page element-paddings text-center">
        <div class="container">

            <?php if (have_posts()) :  ?>

                <div class="row">

                    <?php $loop_counter = 1; ?>
                    <?php while (have_posts()) : the_post();?>

                        <div class="col-sm-6 col-md-4">
                            <article class="search-result search-result--<?php if($loop_counter == 1) { echo 'first'; } elseif($loop_counter == 2) { echo 'second'; } elseif($loop_counter == 3) { echo 'third'; } ?>">

                                <h3 class="search-result__title" data-mh="title-match-height"><?php the_title(); ?></h3><!-- /.element-small-margin-top -->
                                <div class="search-result__content content element-small-margin-top" data-mh="content-match-height">
                                    <?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
                                </div><!-- /.search-result__content content element-small-margin-top -->
                                <a href="<?php the_permalink(); ?>" class="exceptional-travel-button exceptional-travel-button--with-arrow exceptional-travel-button__full-background exceptional-travel-button__full-background--white element-small-margin-top">Read More</a>
                            </article><!-- /.search-result element-small-margin-top -->
                        </div><!-- /.col-sm-6 col-md-4 -->

                        <?php $loop_counter++; ?>
                    <?php endwhile; ?>

                </div><!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="pagination-wrapper">
                            <?php echo custom_pagination(); ?>
                        </div><!-- /.pagination-wrapper -->
                    </div><!-- /.col-12 -->
                </div><!-- /.row -->

            <?php else: ?>

            <div class="row">
                <div class="col-12">
                    <div class="search-problem">
                        <h2 class="search-page__title title-with-underline text-center">We're really sorry!</h2><!-- /.search-page__title title-with-underline text-center -->
                        <p class="search-page__description element-margin-top">We couldn't find what you're looking for. "<strong><?php if(isset($_GET['s'])) echo $_GET['s']; ?></strong>" doesn't seem to be here.</p><!-- /.search-page__description element-margin-top -->
                    </div><!-- /.search-problem -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->

            <?php endif; ?>

        </div><!-- /.container -->
    </section><!-- /.search-page element-paddings text-center -->


</main><!-- /.search-results-page -->


<?php get_footer(); ?>
