<section class="floorplans">
	<div class="grid">
		<aside class="floorplans__details keyline content-wrap">
			<nav class="floorplan-nav">
				<?php if( get_field( 'floor' )[0][ 'floor' ] ) : ?>
					<p class="floorplan-nav__current font:bd text:md flex">
						<span><?php echo get_field( 'floor' )[0][ 'floor' ]; ?></span>
						<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="enable-background:new 0 0 73.58 36.79" viewBox="0 0 73.58 36.79"><path fill="#735D53" d="M4.91 0 0 4.91l15.94 15.94 15.95 15.94 4.9-4.9-15.94-15.95zM73.58 4.91 68.68 0 52.74 15.94 36.79 31.89l4.91 4.9 15.94-15.94z"/></svg>
					</p>
				<?php endif; ?>
				<ul class="bg:light">
					<?php while( have_rows( 'floor' ) ) : the_row(); ?>
						<li data-floor="<?php echo get_sub_field( 'floor' ); ?>"><?php echo get_sub_field( 'floor' ); ?></li>
					<?php endwhile; ?>
				</ul>				
			</nav>

			<?php $counter = 0; while( have_rows( 'floor' ) ) : the_row(); $counter++; ?>
				<div<?php if( $counter === 1 ) : ?> class="active"<?php endif; ?> data-floor-info="<?php echo get_sub_field( 'floor' ); ?>">
					<div class="floorplan__size">
						<p class="font:bd">Size</p>
						<p class="flex">
							<?php if( get_sub_field( 'sqft' ) ) : ?>
								<span><?php echo get_sub_field( 'sqft' ); ?> sq ft</span>
							<?php endif; ?>

							<?php if( get_sub_field( 'sqm' ) ) : ?>
								<span> / <?php echo get_sub_field( 'sqm' ); ?> sqm</span>
							<?php endif; ?>
						</p>
					</div>
					<?php if( get_sub_field( 'whats_included' ) ) : ?>
						<div class="floorplan__whats-included">
							<p class="font:bd">What's Included</p>
							<?php echo get_sub_field( 'whats_included' ); ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
		</aside>

		<div class="floorplans__plan keyline content-wrap">
			<?php $counter = 0; while( have_rows( 'floor' ) ) : the_row(); $counter++; ?>
				<div<?php if( $counter === 1 ) : ?> class="active"<?php endif; ?> data-floor-plan="<?php echo get_sub_field( 'floor' ); ?>">
					<figure>
						<?php if( get_sub_field( 'floorplan' )[ 'url' ] ) : ?>
							<img 
								src="<?php echo get_sub_field( 'floorplan' )[ 'url' ]; ?>" 
								alt="<?php echo get_sub_field( 'floor' ); ?>">
						<?php endif; ?>
					</figure>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>