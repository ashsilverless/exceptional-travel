<section class="follow-us element-paddings text-center">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="follow-us__title underline--white">Follow Us</h2><!-- /.follow-us__title -->

				<ul class="social-icons list-unstyled d-flex flex-wrap justify-content-center element-small-margin-top element-padding-bottom">
					  	<li class="social-icons__item text-right text-sm-center">
					  		<a href="<?php echo get_post_type_archive_link( 'post' ); ?>" class="social-icons__item__social-icon-link d-inline-block d-sm-block">
								<i class="fa fa-newspaper-o mx-auto"></i>
								<span class="social-icons__item__social-icon-link__label d-block">News</span>
							</a>
					    </li><!-- .social-icons__item -->

				    <?php if ( get_field( 'social_icons_facebook', 'options' ) ): ?>

					  	<li class="social-icons__item text-left text-sm-center">
							<a href="<?php the_field( 'social_icons_facebook', 'options' ); ?>" class="social-icons__item__social-icon-link d-inline-block d-sm-block" target="_blank" rel="nofollow">
								<i class="fa fa-facebook mx-auto"></i>
								<span class="social-icons__item__social-icon-link__label d-block">Facebook</span>
							</a>
					    </li><!-- .social-icons__item -->

				    <?php endif; ?>

				  	<?php if ( get_field( 'social_icons_twitter', 'options' ) ): ?>

					  	<li class="social-icons__item text-right text-sm-center">
							<a href="<?php the_field( 'social_icons_twitter', 'options' ); ?>" class="social-icons__item__social-icon-link d-inline-block d-sm-block" target="_blank" rel="nofollow">
								<i class="fa fa-twitter mx-auto"></i>
								<span class="social-icons__item__social-icon-link__label d-block">Twitter</span>
							</a>
					    </li><!-- .social-icons__item -->

				    <?php endif; ?>

				    <?php if ( get_field( 'social_icons_instagram', 'options' ) ): ?>

					  	<li class="social-icons__item text-left text-sm-center">
							<a href="<?php the_field( 'social_icons_instagram', 'options' ); ?>" class="social-icons__item__social-icon-link d-inline-block d-sm-block" target="_blank" rel="nofollow">
								<i class="fa fa-instagram mx-auto"></i>
								<span class="social-icons__item__social-icon-link__label d-block">Instagram</span>
							</a>
					    </li><!-- .social-icons__item -->

				    <?php endif; ?>

				</ul><!-- .social-icons list-unstyled d-flex flex-wrap justify-content-center element-small-margin-top element-padding-bottom -->

				</div><!-- /.col-12 -->

				<div class="col-12">

				<?php if( have_rows('associated', 'option') ): ?>

					<div class="partners">
						<h3 class="partners__title">Proudly ASSOCIATED WITH</h3><!-- /.partners__title -->
						<div class="row w-100 no-gutters">
							<div class="col-md-12 mx-auto">
								<div class="partners__carousel_revised d-flex justify-content-between align-items-center element-small-margin-top owl-carousel owl-theme">

									<?php while ( have_rows('associated', 'option') ) : the_row(); ?>

										<?php $image = get_sub_field('logo'); ?>

										<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="partners__carousel__logo" />

									<?php endwhile; ?>

								</div><!-- /.partners__carousel d-flex justify-content-between align-items-center element-small-margin-top owl-carousel owl-theme -->
							</div><!-- /.col-md-10 mx-auto -->
						</div><!-- /.row w-100 no-gutters -->
					</div><!-- /.partners -->

				<?php endif; ?>

			</div><!-- /.col-12 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.follow-us element-paddings text-center -->

<script>

$(document).ready(function(){
	$('.partners__carousel_revised.owl-carousel').owlCarousel({
	    autoplay: false,
	    loop:false,
	    margin:10,
	    nav:false,
	    dots: false,
	    responsive:{
	        0:{
	            items:3
	        },
	        600:{
	            items:3
	        },
	        1000:{
	            items:6
	        }
	    }
	})
});

</script>


<div id="newsletter-bar" class="newsletter text-center">
    <div class="container">
        <div class="row">
            <div class="col col-12 mx-auto">
                <a href="javascript:" class="newsletter__button d-flex">

                    <?php $icon = get_field('newsletter_icon', 'option'); ?>

                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" class="newsletter__button__icon svg" />

                    <span class="newsletter__button__text-wrapper">
                        <h2 class="newsletter__button__title d-block"><?php the_field('newsletter_title', 'option'); ?></h2><!-- /.newsletter__button__title -->
                        <span class="newsletter__button__subtitle d-block"><?php the_field('newsletter_subtitle', 'option'); ?></span>
                    </span>
                </a>
            </div><!-- /.col col-auto mx-auto -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    <!--<button id="popup-close"><i class="fa fa-times d-block"></i></button>-->
</div><!-- /.newsletter text-center -->

<div class="footer-wrapper">
	<footer class="main-footer">
		<div class="container">
			<div class="row">
				<div class="col col-auto mx-auto">
					<div class="main-footer__nav d-md-flex">
						<span>© <?php echo get_bloginfo('name'); ?> Ltd. <?php echo date('Y'); ?></span>
						<?php
						    wp_nav_menu([
						        'menu'            => 'Main Footer Navigation',
						        'theme_location'  => 'main_footer_navigation',
						        'menu_class'      => 'text-center main-footer__navigation__menu d-md-flex list-unstyled',
						        'items_wrap' 	  => '<ul id="%1$s" class="%2$s">%3$s</ul>'
						    ]);
						?>
					</div><!-- /.main-footer__nav d-md-flex -->
				</div><!-- /.col col-auto mx-auto -->
				<div class="col-12 col-md-auto ml-md-auto text-center d-md-none">
					<span class="main-footer__website">Created by <a target="_blank" href="https://www.silverless.co.uk/">Silverless</a></span>
				</div><!-- /.col-12 col-md-auto ml-md-auto text-center d-md-none -->

				<span class="main-footer__website d-none d-md-block">Created by <a target="_blank" href="http://www.silverless.co.uk/">Silverless</a></span>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</footer><!-- /.main-footer -->
</div><!-- /.footer-wrapper -->
