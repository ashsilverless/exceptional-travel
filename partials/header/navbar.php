<nav class="navbar">
    <h2 class="hide">Main navigtaion</h2>
    <div class="container">
        <div class="row w-100 no-gutters justify-content-center">
            <div class="col-12 col-lg-auto">
                <div class="row no-gutters align-items-center justify-content-between">
                    <div class="col col-auto">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/logo__exceptional-travel.svg" alt="<?php echo get_bloginfo('name'); ?>" class="navbar-brand__logo" />
                        </a>
                    </div><!-- /.col col-auto -->
                    <div class="col col-auto">
                        <?php
                            wp_nav_menu([
                                'menu'            => 'Main Navigation',
                                'theme_location'  => 'main_navigation',
                                'container'       => false,
                                'menu_id'         => false,
                                'menu_class'      => 'navbar-nav',
                                'depth'           => 2,
                                'fallback_cb'     => 'bs4navwalker::fallback',
                                'walker'          => new bs4navwalker()
                            ]);
                        ?>
                        <div class="d-flex align-items-center">
                            <a href="#0" class="d-block d-lg-none search-overlay-trigger search" aria-label="Search Trigger"><i class="fa fa-search d-block" aria-hidden="true"></i></a>
                            <button id="mmenu-triger" class="hamburger hamburger--squeeze" type="button" aria-label="Menu">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div><!-- /.d-flex align-items-center -->

                    </div><!-- /.col col-auto -->
                    <div class="col col-auto d-none d-lg-flex">
                        <a href="javascript:" class="search-overlay-trigger search"><i class="fa fa-search d-block" aria-hidden="true"></i></a>
                    </div><!-- /.col col-auto d-none d-lg-flex -->
                    <div class="col col-auto d-none d-lg-flex">
                        <ul class="navbar__contact list-unstyled">
                            <li class="navbar__contact__phone">
                                <a href="tel:<?php echo filter_var(get_field('phone', 'option'), FILTER_SANITIZE_NUMBER_INT); ?>"><?php the_field('phone', 'option'); ?></a>
                            </li><!-- /.navbar__contact__phone -->
                            <li class="navbar__contact__email">
                                <a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a>
                            </li><!-- /.navbar__contact__email -->
                        </ul><!-- /.navbar__contact list-unstyled -->
                    </div><!-- /.col col-auto d-none d-lg-flex -->
                </div><!-- /.row align-items-center justify-content-between -->
            </div><!-- /.col col-auto -->
        </div><!-- /.row w-100 no-gutters justify-content-center -->

    </div><!-- /.container -->
</nav><!-- /.navbar -->
