<?php
/**
 * Changelog
 */

$clubstiftung = wp_get_theme( 'clubstiftung' );

?>
<div class="clubstiftung-tab-pane" id="changelog">

	<div class="clubstiftung-tab-pane-center">
	
		<h1>clubstiftung <?php if( !empty($clubstiftung['Version']) ): ?> <sup id="clubstiftung-theme-version"><?php echo esc_attr( $clubstiftung['Version'] ); ?> </sup><?php endif; ?></h1>

	</div>

	<?php
	WP_Filesystem();
	global $wp_filesystem;
	$clubstiftung_changelog = $wp_filesystem->get_contents( get_template_directory().'/CHANGELOG.txt' );
	$clubstiftung_changelog_lines = explode(PHP_EOL, $clubstiftung_changelog);
	foreach($clubstiftung_changelog_lines as $clubstiftung_changelog_line){
		if(substr( $clubstiftung_changelog_line, 0, 3 ) === "###"){
			echo '<hr /><h1>'.substr($clubstiftung_changelog_line,3).'</h1>';
		} else {
			echo $clubstiftung_changelog_line,'<br/>';
		}
	}

	?>
	
</div>