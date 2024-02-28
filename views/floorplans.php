<?php $plans = get_field( 'floor' ); $reversed = array_reverse( $plans, false ); ?>
<section class="floorplans">
	<div class="grid">
		<aside data-reveal class="floorplans__details keyline content-wrap">
			<nav class="floorplan-nav">
				<?php if( $reversed[1][ 'floor' ] ) : ?>
					<p class="floorplan-nav__current font:bd text:md flex">
						<span><?php echo $reversed[1][ 'floor' ]; ?></span>
						<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="enable-background:new 0 0 73.58 36.79" viewBox="0 0 73.58 36.79"><path fill="#735D53" d="M4.91 0 0 4.91l15.94 15.94 15.95 15.94 4.9-4.9-15.94-15.95zM73.58 4.91 68.68 0 52.74 15.94 36.79 31.89l4.91 4.9 15.94-15.94z"/></svg>
					</p>
				<?php endif; ?>
				<ul class="bg:light">
					<?php foreach( $reversed as $plan ) : ?>
						<li data-floor="<?php echo $plan[ 'floor' ]; ?>"><?php echo $plan[ 'floor' ]; ?></li>
					<?php endforeach; ?>
				</ul>				
			</nav>

			<?php $counter = 0; foreach( array_slice( $reversed, 1 ) as $plan ) : $counter++; ?>
				<div<?php if( $counter === 1 ) : ?> class="active"<?php endif; ?> data-floor-info="<?php echo $plan[ 'floor' ]; ?>">
					<div class="floorplan__size">
						<p class="font:bd">Size</p>
						<p class="flex">
							<?php if( $plan[ 'sqft' ] ) : ?>
								<span><?php echo $plan[ 'sqft' ]; ?> sq ft</span>
							<?php endif; ?>

							<?php if( $plan[ 'sqm' ] ) : ?>
								<span> / <?php echo $plan[ 'sqm' ]; ?> sqm</span>
							<?php endif; ?>
						</p>
					</div>
					<?php if( $plan[ 'whats_included' ] ) : ?>
						<div class="floorplan__whats-included">
							<p class="font:bd">What's Included</p>
							<?php echo $plan[ 'whats_included' ]; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach;?>
		</aside>

		<div data-reveal class="floorplans__plan keyline content-wrap">
			<?php $counter = 0; foreach( array_slice( $reversed, 1 ) as $plan ) : $counter++; ?>
				<div<?php if( $counter === 1 ) : ?> class="active"<?php endif; ?> data-floor-plan="<?php echo $plan[ 'floor' ]; ?>">
						<figure>
							<?php if( $plan[ 'floorplan' ][ 'url' ] ) : ?>
								<img 
									src="<?php echo $plan[ 'floorplan' ][ 'url' ]; ?>" 
									alt="<?php echo $plan[ 'floor' ]; ?>">
							<?php endif; ?>
						</figure>
				</div>
			<?php endforeach; ?>
		</div>

		
	</div>
</section>