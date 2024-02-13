<?php if( have_rows( 'hero_images' ) ) : ?>
	<section class="hero">
		<h1 class="screen-reader-text"><?php echo get_bloginfo( 'name' ); ?></h1>

		<div class="swiper-container swiper-hero">
			<div class="swiper-wrapper">
				<?php while( have_rows( 'hero_images' ) ) : the_row(); ?>
					<div class="swiper-slide">
						<figure class="ar ar:hero">
							<?php if( get_sub_field( 'desktop' )[ 'url' ] ) : ?>
								<img 
									class="cover desktop" 
									src="<?php echo get_sub_field( 'desktop' )[ 'url' ]; ?>" 
									alt="<?php echo get_bloginfo( 'name' ); ?>
								">
							<?php endif; ?>
				
							<?php if( get_sub_field( 'mobile' )[ 'url' ] ) : ?>
								<img 
									class="cover mobile" 
									src="<?php echo get_sub_field( 'mobile' )[ 'url' ]; ?>" 
									alt="<?php echo get_bloginfo( 'name' ); ?>
								">
							<?php endif; ?>
						</figure>
					</div>
				<?php endwhile; ?>
			</div>
		</div>

		<article class="hero__standfirst grid">
			<div class="font:bd text:sf">
				<?php echo get_field( 'lead_standfirst' ); ?>
				<?php cc\view( 'download' ); ?>
			</div>
		</article>
	</section>
<?php endif; ?>


