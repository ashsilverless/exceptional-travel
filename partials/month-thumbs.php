

<section class="shortcut-thumbs">	
	
	<p class="shortcut-trigger">All Months<span></span></p>
		<div class="container-fluid">
			<div class="row no-gutter">

				<?php if( have_rows('month_thumbnails', 'option') ): ?>
				
				    <?php while( have_rows('month_thumbnails', 'option') ): the_row(); 
					    
					    
				    ?>
								<div class="col-1">
									<a href="/months/<?php the_sub_field('month_link'); ?>/">
										<div class="shortcut-wrapper" style="background-image: url(<?php the_sub_field('thumbnail'); ?>);">
											<p><?php the_sub_field('month_label'); ?></p>
										</div>
									</a>
								</div>
				    <?php endwhile; ?>
				
				<?php endif; ?>
									
			</div><!--row-->
		</div>	<!--container-->
</section>