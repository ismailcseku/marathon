<?php
/**
 * Template Name: Template: Donation Processing
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>


<?php
//print_r($_POST);

	
	//$value consists of userid_wpnonce_amount, here i have added extra = at the end because i am facing problem extra 0 at the end of the decoded string.
	$value = esc_attr($_POST['RID']).'_'.esc_attr($_POST['_wpnonce']).'_'.esc_attr($_POST['Amount']).'_'.esc_attr($_POST['currency_code']).'=';
	//add to database
	delete_user_meta(esc_attr($_POST['RID']), 'sponsoring_request_wpnonce');
	add_user_meta(esc_attr($_POST['RID']), 'sponsoring_request_wpnonce', $value);
	//sponsored comment
	$comment = $_POST['Comments'];
	delete_user_meta(esc_attr($_POST['RID']), 'sponsored_comment');
	add_user_meta(esc_attr($_POST['RID']), 'sponsored_comment', $comment);
	//sponsored comment
	$sponsor_name = $_POST['FirstName'].' '.$_POST['LastName'];
	delete_user_meta(esc_attr($_POST['RID']), 'sponsor_name');
	add_user_meta(esc_attr($_POST['RID']), 'sponsor_name', $sponsor_name);
	//sponsored comment
	$sponsor_email = $_POST['email'];
	delete_user_meta(esc_attr($_POST['RID']), 'sponsor_email');
	add_user_meta(esc_attr($_POST['RID']), 'sponsor_email', $sponsor_email);
	
	$new_wpnonce = encodePaymentProcessingData($value);
?>



      <form id="sponsor-me-payment-form-after-processing" action="https://donate.aleh.org/includes/Donation_Process.asp" method="POST" name="DonationForm">
      	<input type="hidden" name="_wpnonce" value="<?php echo $new_wpnonce;?>" />
      	<input type="hidden" name="RID" value="<?php echo $_POST['RID'];?>" />
      	<input type="hidden" name="CEV" value="<?php echo $_POST['CEV'];?>" />
      	<input type="hidden" name="FORMTYPE" value="<?php echo $_POST['FORMTYPE'];?>" />
      	<input type="hidden" name="Description" value="<?php echo $_POST['Description'];?>" />

      	<input type="hidden" name="CampaignCode" value="<?php echo $_POST['CampaignCode'];?>" />
      	<input type="hidden" name="currency_code" value="<?php echo $_POST['currency_code'];?>" />
      	<input type="hidden" name="Amount" value="<?php echo $_POST['Amount'];?>" />
      	<input type="hidden" name="FirstName" value="<?php echo $_POST['FirstName'];?>" />
      	<input type="hidden" name="LastName" value="<?php echo $_POST['LastName'];?>" />

      	<input type="hidden" name="Address" value="<?php echo $_POST['Address'];?>" />
      	<input type="hidden" name="City" value="<?php echo $_POST['City'];?>" />
      	<input type="hidden" name="State" value="<?php echo $_POST['State'];?>" />
      	<input type="hidden" name="ZIP" value="<?php echo $_POST['ZIP'];?>" />
      	<input type="hidden" name="country" value="<?php echo $_POST['country'];?>" />

      	<input type="hidden" name="email" value="<?php echo $_POST['email'];?>" />
      	<input type="hidden" name="Telephone" value="<?php echo $_POST['Telephone'];?>" />
      	<input type="hidden" name="CreditCardType" value="<?php echo $_POST['CreditCardType'];?>" />
      	<input type="hidden" name="CardNum" value="<?php echo $_POST['CardNum'];?>" />
      	<input type="hidden" name="NameOnCard" value="<?php echo $_POST['NameOnCard'];?>" />

        <input type="hidden" name="CVV" value="<?php echo $_POST['CVV'];?>" />
        <input type="hidden" name="ValidMonth" value="<?php echo $_POST['ValidMonth'];?>" />
        <input type="hidden" name="validYear" value="<?php echo $_POST['validYear'];?>" />
      	<input type="hidden" name="Comments" value="<?php echo $_POST['Comments'];?>" />
      	<input type="hidden" name="sendme_information" value="<?php echo $_POST['sendme_information'];?>" />
      </form>


<script>
jQuery(document).ready(function(e) {
  jQuery('#sponsor-me-payment-form-after-processing').submit();
});
</script>
<?php
get_footer();
