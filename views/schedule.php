<?php 

$heading = get_field( 'schedule_heading' );

?>

<section class="schedule-of-areas">
	<article class="grid">
		<header data-reveal class="keyline content-wrap">
			<?php if( $heading ) : ?>
				<h2 class="font:bd text:md"><?php echo $heading; ?></h2>
			<?php endif; ?>
		</header>

		<table class="keyline content-wrap">
			<thead>
				<tr data-reveal>
					<th class="font:bd text:md">Floor</th>
					<th class="font:bd text:md">SQFT</th>
					<th class="font:bd text:md">SQM</th>
				</tr>
			</thead>
			<tbody>
				<?php while( have_rows( 'floor' ) ) : the_row(); ?>
					<tr data-reveal>
						<td class="keyline text:md">
							<?php if( get_sub_field( 'floor' ) ) : 
								echo get_sub_field( 'floor' );
							endif; ?>
						</td>
						<td class="keyline text:md">
							<?php if( get_sub_field( 'sqft' ) ) : 
								echo get_sub_field( 'sqft' );
							endif; ?>
						</td>
						<td class="keyline text:md">
							<?php if( get_sub_field( 'sqm' ) ) : 
								echo get_sub_field( 'sqm' );
							endif; ?>
						</td>
					</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	</article>
</section>