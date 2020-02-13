<nav id="mobile-navigation">
    <?php
        wp_nav_menu(
            array(
                'container' => false,
                'menu_id' => false,
                'menu_class' => 'navigation single-item-wrapper reset-list',
                'menu' => 'Main navigation',
                'theme_location'  => 'main_navigation'
            )
        );
    ?>
</nav><!-- /#mobile-navigation -->

<div id="search-overlay">
    <div class="vertical-center">
        <div class="clearfix"></div><!-- /.clearfix -->
        <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="searchform" id="searchform" method="get" role="search">
            <input type="text" id="s" name="s" value="" placeholder="Search">
            <button type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
        </form>
    </div><!-- /.vertical-center -->
    <button id="close-search-overlay"><i class="fa fa-times d-block"></i></button>
</div><!-- /#search-overlay -->

<div id="newsletter-overlay" class="newsletter-overlay">
    <div class="vertical-center">
        <div class="clearfix"></div><!-- /.clearfix -->
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <h2 class="newsletter-overlay__title"><?php the_field('newsletter_overlay_title', 'option'); ?></h2><!-- /.newsletter-overlay__title -->
                    <div class="newsletter-overlay__forms">
                        <?php echo do_shortcode( '[gravityform id="2" title="false" description="true" ajax="true"]' ); ?>
                    </div><!-- /.newsletter-overlay__forms -->
                </div><!-- /.col-md-10 mx-auto -->
                <div class="col-md-9 mx-auto">
                    <div class="newsletter-overlay__description">
                        <?php the_field('newsletter_overlay_description', 'option'); ?>
                    </div><!-- /.newsletter-overlay__description -->
                </div><!-- /.col-md-9 mx-auto -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.vertical-center -->
    <button id="close-newsletter-overlay">
        <img src="<?php echo get_template_directory_uri(); ?>/images/icon__close.svg" alt="Icon close" class="svg" />
    </button>
</div><!-- /#newsletter-overlay.newsletter-overlay -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129296168-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-129296168-1');
</script>
