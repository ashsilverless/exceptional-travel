<section class="shortcut-thumbs destination">	
	
	<p class="shortcut-trigger">All Destinations<span></span></p>
		<div class="container-fluid">
			<div class="row no-gutter">

				<?php if( have_rows('destination_thumbnails', 'option') ): ?>
				
				    <?php while( have_rows('destination_thumbnails', 'option') ): the_row(); 
					    
					    
				    ?>
								<div class="col">
									<a href="/destinations/<?php the_sub_field('destination_link'); ?>/">
										<div class="shortcut-wrapper" style="background-image: url(<?php the_sub_field('thumbnail'); ?>);">
											<p><?php the_sub_field('destination_label'); ?></p>
										</div>
									</a>
								</div>
				    <?php endwhile; ?>
				
				<?php endif; ?>
									
			</div><!--row-->
		</div>	<!--container-->
</section>