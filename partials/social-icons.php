<ul class="social-icons list-unstyled d-flex justify-content-center">

  	<?php if ( get_field( 'social_icons_twitter', 'options' ) ): ?>

	  	<li class="social-icons__item">
			<a href="<?php the_field( 'social_icons_twitter', 'options' ); ?>" class="social-icons__item__social-icon-link d-flex align-items-center justify-content-center" target="_blank" rel="nofollow" aria-label="Social Link">
				<i class="fa fa-twitter">
<span style="display:none">Twitter</span>
                </i>
			</a>
	    </li><!-- .social-icons__item -->

    <?php endif; ?>

    <?php if ( get_field( 'social_icons_youtube', 'options' ) ): ?>

	  	<li class="social-icons__item">
			<a href="<?php the_field( 'social_icons_youtube', 'options' ); ?>" class="social-icons__item__social-icon-link d-flex align-items-center justify-content-center" target="_blank" rel="nofollow" aria-label="Social Link">
				<i class="fa fa-youtube"><span style="display:none">You Tube</span></i>
			</a>
	    </li><!-- .social-icons__item -->

    <?php endif; ?>

    <?php if ( get_field( 'social_icons_pinterest', 'options' ) ): ?>

	  	<li class="social-icons__item">
			<a href="<?php the_field( 'social_icons_pinterest', 'options' ); ?>" class="social-icons__item__social-icon-link d-flex align-items-center justify-content-center" target="_blank" rel="nofollow" aria-label="Social Link">
				<i class="fa fa-pinterest"><span style="display:none">Pinterest</span></i>
			</a>
	    </li><!-- .social-icons__item -->

    <?php endif; ?>

    <?php if ( get_field( 'social_icons_facebook', 'options' ) ): ?>

	  	<li class="social-icons__item">
			<a href="<?php the_field( 'social_icons_facebook', 'options' ); ?>" class="social-icons__item__social-icon-link d-flex align-items-center justify-content-center" target="_blank" rel="nofollow" aria-label="Social Link">
				<i class="fa fa-facebook"><span style="display:none">Facebook</span></i>
			</a>
	    </li><!-- .social-icons__item -->

    <?php endif; ?>

    <?php if ( get_field( 'social_icons_instagram', 'options' ) ): ?>

	  	<li class="social-icons__item">
			<a href="<?php the_field( 'social_icons_instagram', 'options' ); ?>" class="social-icons__item__social-icon-link d-flex align-items-center justify-content-center" target="_blank" rel="nofollow" aria-label="Social Link">
				<i class="fa fa-instagram"><span style="display:none">Instagram</span></i>
			</a>
	    </li><!-- .social-icons__item -->

    <?php endif; ?>

    <?php if ( get_field( 'social_icons_google', 'options' ) ): ?>

	  	<li class="social-icons__item">
			<a href="<?php the_field( 'social_icons_google', 'options' ); ?>" class="social-icons__item__social-icon-link d-flex align-items-center justify-content-center" target="_blank" rel="nofollow" aria-label="Social Link">
				<i class="fa fa-google"><span style="display:none">Google+</span></i>
			</a>
	    </li><!-- .social-icons__item -->

    <?php endif; ?>

    <?php if ( get_field( 'social_icons_linkedin', 'options' ) ): ?>

	  	<li class="social-icons__item">
			<a href="<?php the_field( 'social_icons_linkedin', 'options' ); ?>" class="social-icons__item__social-icon-link d-flex align-items-center justify-content-center" target="_blank" rel="nofollow" aria-label="Social Link">
				<i class="fa fa-linkedin"><span style="display:none">LinkedIn</span></i>
			</a>
	    </li><!-- .social-icons__item -->

    <?php endif; ?>

    <?php if ( get_field( 'social_icons_rss', 'options' ) ): ?>

	  	<li class="social-icons__item">
			<a href="<?php the_field( 'social_icons_rss', 'options' ); ?>" class="social-icons__item__social-icon-link d-flex align-items-center justify-content-center" target="_blank" rel="nofollow" aria-label="Social Link">
				<i class="fa fa-rss"><span style="display:none">RSS</span></i>
			</a>
	    </li><!-- .social-icons__item -->

    <?php endif; ?>

</ul><!-- .social-icons list-unstyled d-flex justify-content-center -->
