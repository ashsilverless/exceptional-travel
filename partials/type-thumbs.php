<section class="shortcut-thumbs type">	
	
	<p class="shortcut-trigger">All Types<span></span></p>
		<div class="container-fluid">
			<div class="row no-gutter">

				<?php if( have_rows('type_thumbnails', 'option') ): ?>
				
				    <?php while( have_rows('type_thumbnails', 'option') ): the_row(); 
					    
					    
				    ?>
								<div class="col">
									<a href="/types/<?php the_sub_field('type_link'); ?>/">
										<div class="shortcut-wrapper" style="background-image: url(<?php the_sub_field('thumbnail'); ?>);">
											<p><?php the_sub_field('type_label'); ?></p>
										</div>
									</a>
								</div>
				    <?php endwhile; ?>
				
				<?php endif; ?>
									
			</div><!--row-->
		</div>	<!--container-->
</section>