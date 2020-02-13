			<?php get_template_part('partials/footer/main-footer'); ?>

		</div><!-- /.main-content -->
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
        <?php get_template_part('partials/footer/additionals'); ?>
		<?php get_template_part('partials/footer/scripts'); ?>

 	</body>
</html>