		<div id="destinations-map" class="destinations-map text-center element-paddings">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-12 d-flex map-container">

						<img src="<?php echo get_template_directory_uri(); ?>/images/world-map-desktop.svg" alt="icon" class="destinations-map__image w-100 mx-auto svg" />

						<?php $terms = get_terms( array(
						    'taxonomy' => 'destinations',
						    'parent'   => 0,
						    'hide_empty' => false,
						) ); ?>

						<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>
							<?php $loopCounter = 1; ?>

								<ul class="nav nav-tabs d-none" id="myMapTab" role="tablist">

									<?php foreach ( $terms as $term ): ?>

										<li class="nav-item">
											<a class="nav-link<?php if( $loopCounter == 1 ) { echo ' active';} ?>" id="<?php echo $term->slug; ?>-tab" data-toggle="tab" href="#map-<?php echo $term->slug; ?>-desktop" role="tab" aria-controls="collapseCaption-<?php echo $term->slug; ?>" aria-selected="<?php if( $loopCounter == 1 ) { echo 'true';} else { echo 'false';} ?>"><?php echo $term->name; ?></a>
										</li>

										<?php $loopCounter++; ?>
									<?php endforeach; ?>
								</ul>

						<?php endif; ?>
					</div><!-- /.col-8 -->
					<div class="col-lg-4 col-md-12 mx-auto">

						<?php $terms = get_terms( array(
						    'taxonomy' => 'destinations',
						    'parent'   => 0,
						    'hide_empty' => false,
						) ); ?>

						<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>
							<?php $loopCounter = 1; ?>

							<div class="tab-content element-small-margin-top">

								<?php foreach ( $terms as $term ): ?>

									<div id="map-<?php echo $term->slug; ?>-desktop" class="tab-pane fade<?php if( $loopCounter == 1 ) { echo ' show active';} ?>"  role="tabpanel" aria-labelledby="<?php echo $term->slug; ?>-tab">
										<h2 class="destinations-map__title"><?php echo $term->name; ?></h2><!-- /.destinations-map__title -->
										<img src="<?php echo get_template_directory_uri(); ?>/images/icon__underline--white.svg" alt="underline" class="destinations-map__underline svg" />
										<div class="destinations-map__content content">
											<?php the_field('destinations_description', $term); ?>
										</div><!-- /.destinations-map__content content -->

				 						<?php $icon = get_field('destinations_map_icon', $term); ?>

				 						<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="exceptional-travel-button exceptional-travel-button--with-icon exceptional-travel-button--big exceptional-travel-button__full-background exceptional-travel-button__full-background--white">
											<!--<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" class="svg" />-->
											<span>Explore <b><?php echo $term->name; ?></b></span>
										</a>

									</div><!-- /.tab-pane -->

									<?php $loopCounter++; ?>
								<?php endforeach; ?>

							</div><!-- /.tab-content element-small-margin-top -->

						<?php endif; ?>

					</div><!-- /.col-4 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.destinations-map text-center element-paddings -->