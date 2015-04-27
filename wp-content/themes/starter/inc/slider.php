			<script type="text/javascript">
					jQuery(function() {
						jQuery('#ei-slider').eislideshow({
							animation			: 'center',
							autoplay			: true,
							slideshow_interval	: 3000,
							titlesFactor		: 0
						});
					});
		</script>

	<?php //echo $opject[title];?>

	<div class="home-slider">
		<div id="ei-slider" class="ei-slider">
		<?php
			$opject_slider = ot_get_option('slidershow');
			if($opject_slider):
		?>
			 <ul class="ei-slider-large">
					<?php
						foreach($opject_slider as $opject ):
					?>
					<li>
						<div class="main_background_image">
							<a href="<?php echo $opject[link_post]; ?>" title="<?php echo $opject[title1]; ?>" target="_blank">
								<img src="<?php echo $opject[demo_list_item_content]; ?>" alt="">
							</a>
						</div>
									
					</li>
					<?php endforeach; ?>
			</ul>
			<ul class="ei-slider-thumbs">
				<li class="ei-slider-element">Current</li>
						<?php
							foreach($opject_slider as $opject ):
						?>			   
					<li>
							<div class="cms-texts">
								<span class="text1"><?php echo $opject[title1]; ?></span><br/>
								<span class="text2"><?php echo $opject[title2]; ?></span>
							</div>
							<img src="<?php echo $opject[demo_list_item_content]; ?>" alt="<?php echo $opject[link_post]; ?>" />
					</li>
						<?php endforeach; ?>
							
			</ul><!-- ei-slider-thumbs -->	
			<?php endif; ?>
		</div>
	</div>
