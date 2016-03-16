<?php
/**
 * Template Name: Template: Payment Success
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>


<?php
//$encoded_data consists of userid_wpnonce_amount
$encoded_data = trim(decodePaymentProcessingData($_REQUEST['wpnoncevalue']));
//remove =,0 at the end
$encoded_data_removeextracharacter = explode('=', $encoded_data);
$encoded_data = $encoded_data_removeextracharacter[0];
$encoded_data_array = explode('_', $encoded_data);


//user prestored order:
$prestored_order = trim(get_user_meta(esc_attr($encoded_data_array[0]), 'sponsoring_request_wpnonce', true));
//remove =,0 at the end
$prestored_order_removeextracharacter = explode('=', $prestored_order);
$prestored_order = $prestored_order_removeextracharacter[0];
$prestored_order_array = explode('_', $prestored_order);

//if verified wpnonce
if (isset( $_REQUEST["r"] ) && $_REQUEST["r"] == $encoded_data_array[0] && $encoded_data == $prestored_order && wp_verify_nonce($encoded_data_array[1], 'sponsorme_'.$encoded_data_array[0])) {	
	$user_id = esc_attr($_REQUEST["r"]);
	
	//update pledged value
  $exchange_rate = $redux_demo[strtolower($encoded_data_array[3]).'-to-usd'];
	$pledged_amount = $encoded_data_array[2];
	$pledged_amount_in_usd = $pledged_amount * $exchange_rate;
	$runner_pledged = get_user_meta($user_id, 'runner_pledged', true) + $pledged_amount_in_usd;
	update_user_meta($user_id, 'runner_pledged', $runner_pledged);
	
	//add comment
	$comment_content = get_user_meta($user_id, 'sponsored_comment', true);
	$comment_content = stripslashes(nl2br($comment_content));
	$sponsor_name = get_user_meta($user_id, 'sponsor_name', true);
	$sponsor_email = get_user_meta($user_id, 'sponsor_email', true);
	addCommentBySponsor($user_id, $comment_content, $sponsor_name, $sponsor_email);
	
	//send mail
	$user_info = get_userdata($user_id);
	wp_mail( $user_info->user_email, 'Received Payment | ALEH Ascend', 'You have received '.$encoded_data_array[3].$encoded_data_array[2].' by '.$sponsor_name );
	
	//delete wpnonce	
	delete_user_meta($user_id, 'sponsoring_request_wpnonce');


	//update pledged history
	$pledged_history_field_key = "donation_history";
	$pledged_history_post_id = "user_".$user_id;
	$pledged_history_value = get_field($pledged_history_field_key, $pledged_history_post_id);
	$pledged_history_value[] = array(
									"donation_history_donated_by" => $sponsor_name,
									"donation_history_donated_amount_usd" => $pledged_amount_in_usd,
									"donation_history_donated_currency" => $encoded_data_array[3],
									"donation_history_donated_amount_in_currency" => $encoded_data_array[2]
							);
	update_field( $pledged_history_field_key, $pledged_history_value, $pledged_history_post_id );
		
		
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
