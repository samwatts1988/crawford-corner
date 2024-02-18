<?php 
$link = get_field('brochure_pdf', 8);
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
    <p class="download font:bd text:md">
		<a class="flex" rel="noreferrer" target="<?php echo esc_attr( $link_target ); ?>" href="<?php echo esc_url( $link_url ); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.679 15.952"><g fill="#735d53" data-name="Group 9"><path d="m17.158 11.433-3.456 3.456 1.063 1.063 3.456-3.456 3.456-3.456-1.063-1.063Z" data-name="Path 23"/><path d="m14.766 0-1.063 1.063 3.456 3.457 3.456 3.456 1.063-1.063-3.456-3.456Z" data-name="Path 24"/><path d="M19.552 8.728v-1.5H9.776v1.5h9.776Z" data-name="Path 25"/><path d="M4.888 7.228H0v1.5h9.776v-1.5Z" data-name="Path 26"/></g></svg>
		<?php echo esc_html( $link_title ); ?></a>
	</p>
<?php endif; ?>
