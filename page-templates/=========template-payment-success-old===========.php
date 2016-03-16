<?php

get_header(); ?>


<?php
//$encoded_data consists of userid_wpnonce_amount
$encoded_data = trim(decodePaymentProcessingData($_REQUEST['wpnoncevalue']));
$encoded_data_array = explode('_', $encoded_data);


//user prestored order:
$prestored_order = trim(get_user_meta(esc_attr($encoded_data_array[0]), 'sponsoring_request_wpnonce', true));
$prestored_order_array = explode('_', $prestored_order);

//if verified wpnonce
if (isset( $_REQUEST["r"] ) && $_REQUEST["r"] == $encoded_data_array[0] && $encoded_data == $prestored_order && wp_verify_nonce($encoded_data_array[1], 'sponsorme_'.$encoded_data_array[0])) {	
	$user_id = esc_attr($_REQUEST["r"]);
	delete_user_meta($user_id, 'sponsoring_request_wpnonce');
	echo $runner_pledged = get_user_meta($user_id, 'runner_pledged', true) + $encoded_data_array[2];
	update_user_meta($user_id, 'runner_pledged', $runner_pledged);
}
?>
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

				endwhile;
			?>

<?php
get_footer();
