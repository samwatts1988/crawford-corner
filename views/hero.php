<?php 

$type = get_field( 'hero_type' );

?>

	<section class="hero">
		<h1 class="screen-reader-text"><?php echo get_bloginfo( 'name' ); ?></h1>
		
		<?php if( $type === 'gallery' ) : ?>
			<?php if( have_rows( 'hero_images' ) ) : ?>
				<div class="swiper-container swiper-hero">
					<div class="swiper-wrapper">
						<?php while( have_rows( 'hero_images' ) ) : the_row(); ?>
							<div class="swiper-slide">
								<figure class="ar ar:hero">
									<?php if( get_sub_field( 'desktop' )[ 'url' ] ) : ?>
										<img 
											class="swiper-lazy cover desktop" 
											data-src="<?php echo get_sub_field( 'desktop' )[ 'url' ]; ?>" 
											alt="<?php echo get_bloginfo( 'name' ); ?>">
									<?php endif; ?>
						
									<?php if( get_sub_field( 'mobile' )[ 'url' ] ) : ?>
										<img 
											class="swiper-lazy cover mobile" 
											data-src="<?php echo get_sub_field( 'mobile' )[ 'url' ]; ?>" 
											alt="<?php echo get_bloginfo( 'name' ); ?>">
									<?php endif; ?>
								</figure>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php if( $type === 'video' ) : ?>
			<video class="hero-video" muted playsinline loop>
				<source src="<?php echo get_field( 'hero_video' ); ?>">
			</video>
		<?php endif; ?>


		<article class="hero__standfirst grid">
			<div data-reveal class="font:bd text:sf">
				<?php echo get_field( 'lead_standfirst' ); ?>
				<?php cc\view( 'download' ); ?>
			</div>
		</article>
	</section>


