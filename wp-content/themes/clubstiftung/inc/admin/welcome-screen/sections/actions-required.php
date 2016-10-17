<?php
/**
 * Actions required
 */
?>

<div id="actions_required" class="clubstiftung-tab-pane">

    <h1><?php esc_html_e( 'Actions recommend to make this theme look like in the demo.' ,'clubstiftung' ); ?></h1>

    <!-- NEWS -->
    <hr />

	<?php
	global $clubstiftung_required_actions;

	if( !empty($clubstiftung_required_actions) ):

		/* clubstiftung_show_required_actions is an array of true/false for each required action that was dismissed */
		$clubstiftung_show_required_actions = get_option("clubstiftung_show_required_actions");

		foreach( $clubstiftung_required_actions as $clubstiftung_required_action_key => $clubstiftung_required_action_value ):
			if(@$clubstiftung_show_required_actions[$clubstiftung_required_action_value['id']] === false) continue;
			if(@$clubstiftung_required_action_value['check']) continue;
			?>
			<div class="clubstiftung-action-required-box">
				<span class="dashicons dashicons-no-alt clubstiftung-dismiss-required-action" id="<?php echo $clubstiftung_required_action_value['id']; ?>"></span>
				<h4><?php echo $clubstiftung_required_action_key + 1; ?>. <?php if( !empty($clubstiftung_required_action_value['title']) ): echo $clubstiftung_required_action_value['title']; endif; ?></h4>
				<p><?php if( !empty($clubstiftung_required_action_value['description']) ): echo $clubstiftung_required_action_value['description']; endif; ?></p>
				<?php
					if( !empty($clubstiftung_required_action_value['plugin_slug']) ):
						?><p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='.$clubstiftung_required_action_value['plugin_slug'] ), 'install-plugin_'.$clubstiftung_required_action_value['plugin_slug'] ) ); ?>" class="button button-primary"><?php if( !empty($clubstiftung_required_action_value['title']) ): echo $clubstiftung_required_action_value['title']; endif; ?></a></p><?php
					endif;
				?>

				<hr />
			</div>
			<?php
		endforeach;
	endif;

	$nr_actions_required = 0;

	/* get number of required actions */
	if( get_option('clubstiftung_show_required_actions') ):
		$clubstiftung_show_required_actions = get_option('clubstiftung_show_required_actions');
	else:
		$clubstiftung_show_required_actions = array();
	endif;

	if( !empty($clubstiftung_required_actions) ):
		foreach( $clubstiftung_required_actions as $clubstiftung_required_action_value ):
			if(( !isset( $clubstiftung_required_action_value['check'] ) || ( isset( $clubstiftung_required_action_value['check'] ) && ( $clubstiftung_required_action_value['check'] == false ) ) ) && ((isset($clubstiftung_show_required_actions[$clubstiftung_required_action_value['id']]) && ($clubstiftung_show_required_actions[$clubstiftung_required_action_value['id']] == true)) || !isset($clubstiftung_show_required_actions[$clubstiftung_required_action_value['id']]) )) :
				$nr_actions_required++;
			endif;
		endforeach;
	endif;

	if( $nr_actions_required == 0 ):
		echo '<p>'.__( 'Hooray! There are no required actions for you right now.','clubstiftung' ).'</p>';
	endif;
	?>

</div>
