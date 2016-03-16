<?php
/**
 * Template Name: Template - Profile
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

if(!is_user_logged_in()){
	wp_redirect(home_url('/login/'));
}


get_header(); 
?>

<?php
global $current_user;
$user_id = $current_user->ID;

//if form submitted for runner_funding_goal
if( isset( $_POST['runner_funding_goal'] ) ) {
			$str = $_POST['runner_funding_goal'];
			$newStr = str_replace(',', '', $str); //If you want it to be "185345321"
			$runner_funding_goal = intval($newStr); //If you want it to be a number 185345321
			update_user_meta($user_id, 'runner_funding_goal', esc_attr($runner_funding_goal));
}
//if form submitted
if( isset( $_POST['runner_first_name'] ) ) {
		update_user_meta($user_id, 'first_name', esc_attr($_POST['runner_first_name']));
		update_user_meta($user_id, 'last_name', esc_attr($_POST['runner_last_name']));
		update_user_meta($user_id, 'description', esc_attr($_POST['runner_description']));
		
		
			//other user meta
			update_user_meta($user_id, 'runner_address1', esc_attr($_POST['runner_address1']));
			update_user_meta($user_id, 'runner_address2', esc_attr($_POST['runner_address2']));
			update_user_meta($user_id, 'runner_city', esc_attr($_POST['runner_city']));
			update_user_meta($user_id, 'runner_zipcode', esc_attr($_POST['runner_zipcode']));
			update_user_meta($user_id, 'runner_phonenumber', esc_attr($_POST['runner_phonenumber']));
			update_user_meta($user_id, 'runner_country', esc_attr($_POST['runner_country']));
			
			update_user_meta($user_id, 'runner_gender', esc_attr($_POST['runner_gender']));
			update_user_meta($user_id, 'passport_or_israeli_id', esc_attr($_POST['passport_or_israeli_id']));
			update_user_meta($user_id, 'date_of_birth', esc_attr($_POST['birth_year']).''.esc_attr($_POST['birth_month']).''.esc_attr($_POST['birth_day']));
			
			update_user_meta($user_id, 'emergency_contact_name', esc_attr($_POST['emergency_contact_name']));
			update_user_meta($user_id, 'emergency_contact_phone_number', esc_attr($_POST['emergency_contact_phone_number']));
			update_user_meta($user_id, 'emergency_contact_relationship', esc_attr($_POST['emergency_contact_relationship']));
			
			
			update_user_meta($user_id, 'what_marathon_like_to_participate', esc_attr($_POST['what_marathon_like_to_participate']));
			update_user_meta($user_id, 'are_you_participating_in_range', esc_attr($_POST['are_you_participating_in_range']));
			update_user_meta($user_id, 'what_is_your_average_race_time', esc_attr($_POST['what_is_your_average_race_time']));
			update_user_meta($user_id, 'tshirt_order_your_size', esc_attr($_POST['tshirt_order_your_size']));
			update_user_meta($user_id, 'tshirt_order_gender', esc_attr($_POST['tshirt_order_gender']));
			update_user_meta($user_id, 'tshirt_order_sleeves', esc_attr($_POST['tshirt_order_sleeves']));
			
			//update_user_meta($user_id, 'what_friends_haveto_say', esc_attr($_POST['what_friends_haveto_say']));
			
			//update_user_meta($user_id, 'runner_funding_goal', esc_attr($_POST['runner_funding_goal']));
			//update_user_meta($user_id, 'runner_fundraising_end_date', esc_attr($_POST['runner_fundraising_end_date']));
}
?>

<?php
$username = $current_user->user_login;
$first_name = $current_user->user_firstname;
$last_name = $current_user->user_lastname;
$user_email = $current_user->user_email;
$user_description = $current_user->user_description;

			
			$runner_funding_goal = get_user_meta($user_id, 'runner_funding_goal', true);
			$runner_pledged = get_user_meta($user_id, 'runner_pledged', true);
			$runner_fundraising_end_date = get_user_meta($user_id, 'runner_fundraising_end_date', true);
			$fundraising_end_date_formated = date("m/d/Y", strtotime($runner_fundraising_end_date));
						
			$runner_profile_photo = get_user_meta($user_id, 'runner_profile_photo', true);
			if($runner_profile_photo=="") {
				$runner_profile_photo = get_template_directory_uri()."/images/no-photo.jpg";
			}



			//user meta
			$runner_description = get_user_meta($user_id, 'description', true);
			$runner_address1 = get_user_meta($user_id, 'runner_address1', true);
			$runner_address2 = get_user_meta($user_id, 'runner_address2', true);
			$runner_city = get_user_meta($user_id, 'runner_city', true);
			$runner_zipcode = get_user_meta($user_id, 'runner_zipcode', true);
			$runner_phonenumber = get_user_meta($user_id, 'runner_phonenumber', true);
			$runner_country = get_user_meta($user_id, 'runner_country', true);
			
			$runner_gender = get_user_meta($user_id, 'runner_gender', true);
			$passport_or_israeli_id = get_user_meta($user_id, 'passport_or_israeli_id', true);
			$date_of_birth = get_user_meta($user_id, 'date_of_birth', true);
			
			$emergency_contact_name = get_user_meta($user_id, 'emergency_contact_name', true);
			$emergency_contact_phone_number = get_user_meta($user_id, 'emergency_contact_phone_number', true);
			$emergency_contact_relationship = get_user_meta($user_id, 'emergency_contact_relationship', true);
			
			
			$what_marathon_like_to_participate = get_user_meta($user_id, 'what_marathon_like_to_participate', true);
			$are_you_participating_in_range = get_user_meta($user_id, 'are_you_participating_in_range', true);
			$what_is_your_average_race_time = get_user_meta($user_id, 'what_is_your_average_race_time', true);
			$tshirt_order_your_size = get_user_meta($user_id, 'tshirt_order_your_size', true);
			$tshirt_order_gender = get_user_meta($user_id, 'tshirt_order_gender', true);
			$tshirt_order_sleeves = get_user_meta($user_id, 'tshirt_order_sleeves', true);
		
			//$what_friends_haveto_say = get_user_meta($user_id, 'what_friends_haveto_say', true);
?>
<section data-bg-color="#e8eae8">
  <div class="container">
    <div class="section-content">
      <div class="row">
      	<div class="col-sm-4">
          <ul class="nav nav-pills nav-stacked">
            <li role="presentation" class="active"><a href="<?php echo add_query_arg('type', 'profile'); ?>" ><?php _e('Profile', ''); ?></a></li>
          </ul>
          <ul class="list-group">
            <li class="list-group-item"><strong>Name:</strong> <?php echo $first_name?> <?php echo $last_name?></li>
            <li class="list-group-item"><strong>Email:</strong> <?php echo $user_email?></li>
            <li class="list-group-item">
            <form action="" method="POST">
            <label>Funding Goal ($)</label>
    					<input type="number" class="form-control" name="runner_funding_goal" placeholder="$0" value="<?php echo $runner_funding_goal?>">
      				<button type="submit" class="btn btn-colored">Update Funding Goal</button>
            </form>
            </li>
            <!--<li class="list-group-item"><strong>Fundraising End Date:</strong> <?php echo $fundraising_end_date_formated?></li>-->
            <li class="list-group-item"><strong>Profile Photo:</strong> <br> <img width="100" class="mt-10" src="<?php echo $runner_profile_photo?>?<?php echo time();?>" alt="">
            
          		<?php echo do_shortcode("[wp-author-logofull]");?>
            </li>
            <li class="list-group-item"><strong>The link to your page:</strong> 
            <p>Below is the link to your page. To share this with your friends and to fundraise, copy the link and spread the word in your emails and social media.</p>
            <textarea name="" id="" cols="23" rows="3"><?php echo esc_url( home_url('/runner-page/?r='.$user_id) ); ?></textarea>
            <a href="<?php echo esc_url( home_url('/runner-page/?r='.$user_id) ); ?>" class="btn btn-default">View your page</a></li>
          </ul>
        </div>
      	<div class="col-sm-8">
        	<h3>Edit Profile</h3>
          <?php
          	if( isset( $_POST['runner_first_name'] ) ) {
					?>
          <div class="alert alert-success" role="alert">Your profile updated successfully!</div>
          <?php
						}
					?>
          
<form id="marathon_registration_form" class="registration_form" action="" method="POST">
  
  <!--form fields here-->
  <div class="row">
    <div class="col-sm-12 mb-30">
      <h3 data-text-color="#219b48"><strong>Basic Information</strong></h3>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label for="f_name">First Name <span class="red-star">*</span></label>
        <input type="text" class="form-control" required="" name="runner_first_name" id="runner_first_name" placeholder="John" value="<?php echo $first_name?>">
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label for="l_name">Last Name <span class="red-star">*</span></label>
        <input type="text" class="form-control" required="" name="runner_last_name" id="runner_last_name" placeholder="Smith" value="<?php echo $last_name?>">
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="runner_description">Biographical Info</label>
    <textarea name="runner_description" class="form-control" id="runner_description" cols="20" rows="5"><?php echo $runner_description?></textarea>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="address">Address <span class="red-star">*</span></label>
        <input type="text" class="form-control" required="" name="runner_address1" id="runner_address1" placeholder="9009 Woodwerd Way" value="<?php echo $runner_address1?>">
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label for="address"></label>
        <input type="text" class="form-control" name="runner_address2" id="runner_address2" placeholder="Address Line #2" value="<?php echo $runner_address2?>">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="city">City <span class="red-star">*</span></label>
        <input type="tel" class="form-control" required="" name="runner_city" id="runner_city" placeholder="" value="<?php echo $runner_city?>">
        <!--<select name="runner_city" class="form-control" id="runner_city">
          <option value="Please Select">Please Select Your City</option>
          <option value="">city 1</option>
          <option value="">city 2</option>
        </select>-->
      </div>
    </div>
    <div class="col-sm-3 col-md-offset-3">
      <div class="form-group">
        <label for="zipcode">Zipcode <span class="red-star">*</span></label>
        <input type="text" class="form-control" required="" name="runner_zipcode" id="runner_zipcode" placeholder="33483" value="<?php echo $runner_zipcode?>">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="p_number">Phone Number <span class="red-star">*</span></label>
        <input type="tel" class="form-control" required="" name="runner_phonenumber" id="runner_phonenumber" placeholder="(770 493-3934)" value="<?php echo $runner_phonenumber?>">
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label for="city">Country <span class="red-star">*</span></label>
        <select name="runner_country" class="form-control" id="runner_country">
          <option value="Please Select">Select Your Country</option>
          <?php
						$runner_country_select = runner_add_country_select();
						foreach($runner_country_select as $each_country){
							$selected = ($runner_country == $each_country) ? 'selected="selected"' : '';
							echo '<option '.$selected.' value="'.$each_country.'">'.$each_country.'</option>';
						}
					?>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4">
      <div class="form-group">
        <label for="p_number">Gender <span class="red-star">*</span></label>
        <div>
          <label class="radio-inline">
            <input type="radio" value="Male" name="runner_gender" <?php echo ($runner_gender == 'Male') ? 'checked' : '';?>>
            Male </label>
          <label class="radio-inline">
            <input type="radio" value="Female" name="runner_gender" <?php echo ($runner_gender == 'Female') ? 'checked' : '';?>>
            Female </label>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="form-group">
        <label for="birthday">Birthday <span class="red-star">*</span></label>
        <div class="row">
          <div class="col-xs-4">
            <div class="form-group"> <?php $birth_day = substr($date_of_birth, -2); $birth_month = substr($date_of_birth, -4, 2); $birth_year = substr($date_of_birth, 0, 4); ?>
              <select name="birth_month" class="form-control">
                <option value="">Select Month</option>
                <?php
									// lowest year wanted
									$cutoff = 1910;						
									// current year
									$now = date('Y');
                  for ($m=1; $m<=12; $m++) {

											$selected = (ltrim($birth_month, '0') == $m) ? 'selected="selected"' : '';
											echo '  <option '.$selected.' value="' . date('m', mktime(0,0,0,$m,1)) . '">' . date('M', mktime(0,0,0,$m,1)) . '</option>' . PHP_EOL;
									}
								?>
              </select>
            </div>
          </div>
          <div class="col-xs-4">
            <div class="form-group">
              <select name="birth_day" class="form-control">
                <option value="">Select Date</option>
                <?php
									for ($d=1; $d<=31; $d++) {
											$selected = (ltrim($birth_day, '0') == $d) ? 'selected="selected"' : '';
											if($d<10) {
												echo '  <option '.$selected.' value="0' . $d . '">0' . $d . '</option>' . PHP_EOL;
											} else {
												echo '  <option '.$selected.' value="' . $d . '">' . $d . '</option>' . PHP_EOL;
											}
									}
								?>
              </select>
            </div>
          </div>
          <div class="col-xs-4">
            <div class="form-group">
              <select name="birth_year" class="form-control">
                <option value="">Select year</option>
                <?php
									for ($y=$now; $y>=$cutoff; $y--) {
											$selected = (ltrim($birth_year, '0') == $y) ? 'selected="selected"' : '';
											echo '  <option '.$selected.' value="' . $y . '">' . $y . '</option>' . PHP_EOL;
									}
								?>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="f_name"> Passport or Israeli ID (Teudat Zehut) number: <span class="red-star">*</span></label>
        <input type="text" class="form-control" required="" name="passport_or_israeli_id" id="passport_or_israeli_id" placeholder="" value="<?php echo $passport_or_israeli_id?>">
      </div>
    </div>
  </div>
    
  
  <div class="row">
    <div class="col-sm-12 mt-30 mb-30">
      <h3 data-text-color="#219b48"><strong>Emergency Contact Information</strong></h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="f_name">Full Name <span class="red-star">*</span></label>
        <input type="text" class="form-control" required="" name="emergency_contact_name" id="emergency_contact_name" placeholder="John" value="<?php echo $emergency_contact_name?>">
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label for="p_">Phone Number <span class="red-star">*</span></label>
        <input type="tel" class="form-control" required="" name="emergency_contact_phone_number" id="emergency_contact_phone_number" placeholder="(770) 493-3934" value="<?php echo $emergency_contact_phone_number?>">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="f_name">Relationship <span class="red-star">*</span></label>
        <input type="text" class="form-control" required="" name="emergency_contact_relationship" id="emergency_contact_relationship" placeholder="Type" value="<?php echo $emergency_contact_relationship?>">
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-sm-12 mt-30 mb-30">
      <h3 data-text-color="#219b48"><strong>General Marathon Information</strong></h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <h4><strong>What Marathon would you like to participate in:</strong> </h4>
      <div class="radio">
        <label>
          <input type="radio" name="what_marathon_like_to_participate" value="Berlin Marathon" <?php echo ($what_marathon_like_to_participate == 'Berlin Marathon') ? 'checked' : '';?>>
          Berlin Marathon</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="what_marathon_like_to_participate" value="Chicago Marathon" <?php echo ($what_marathon_like_to_participate == 'Chicago Marathon') ? 'checked' : '';?>>
          Chicago Marathon</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="what_marathon_like_to_participate" value="Jerusalem Marathon" <?php echo ($what_marathon_like_to_participate == 'Jerusalem Marathon') ? 'checked' : '';?>>
          Jerusalem Marathon</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="what_marathon_like_to_participate" value="NYC Marathon" <?php echo ($what_marathon_like_to_participate == 'NYC Marathon') ? 'checked' : '';?>>
          NYC Marathon</label>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <h4><strong>Are you participating in (choose one):</strong></h4>
      <div class="radio">
        <label>
          <input type="radio" name="are_you_participating_in_range" value="10k" <?php echo ($are_you_participating_in_range == '10k') ? 'checked' : '';?>>
          10k</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="are_you_participating_in_range" value="1/2 marathon" <?php echo ($are_you_participating_in_range == '1/2 marathon') ? 'checked' : '';?>>
          1/2 marathon</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="are_you_participating_in_range" value="Full Marathon" <?php echo ($are_you_participating_in_range == 'Full Marathon') ? 'checked' : '';?>>
          Full Marathon</label>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <h4><strong>What is your average race time?</strong></h4>
      <div class="radio">
        <label>
          <input type="radio" name="what_is_your_average_race_time" value="1-1.5 hours" <?php echo ($what_is_your_average_race_time == '1-1.5 hours') ? 'checked' : '';?>>
          1-1.5 hours</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="what_is_your_average_race_time" value="1.5-2 hours" <?php echo ($what_is_your_average_race_time == '1.5-2 hours') ? 'checked' : '';?>>
          1.5-2 hours</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="what_is_your_average_race_time" value="2-2.5 hours" <?php echo ($what_is_your_average_race_time == '2-2.5 hours') ? 'checked' : '';?>>
          2-2.5 hours</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="what_is_your_average_race_time" value="2.5-3 hours" <?php echo ($what_is_your_average_race_time == '2.5-3 hours') ? 'checked' : '';?>>
          2.5-3 hours</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="what_is_your_average_race_time" value="3-3.5 hours" <?php echo ($what_is_your_average_race_time == '3-3.5 hours') ? 'checked' : '';?>>
          3-3.5 hours</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="what_is_your_average_race_time" value="3.5-4 hours" <?php echo ($what_is_your_average_race_time == '3.5-4 hours') ? 'checked' : '';?>>
          3.5-4 hours</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="what_is_your_average_race_time" value="over 4 hours" <?php echo ($what_is_your_average_race_time == 'over 4 hours') ? 'checked' : '';?>>
          over 4 hours</label>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <h4><strong>ALEH Ascend T-shirt order:</strong></h4>
    </div>
    <div class="col-sm-4">
      <p>Your size <span class="red-star">*</span></p>
      <div class="radio">
        <label>
          <input type="radio" name="tshirt_order_your_size" value="XS" <?php echo ($tshirt_order_your_size == 'XS') ? 'checked' : '';?>>
          XS</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="tshirt_order_your_size" value="Small" <?php echo ($tshirt_order_your_size == 'Small') ? 'checked' : '';?>>
          Small</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="tshirt_order_your_size" value="Medium" <?php echo ($tshirt_order_your_size == 'Medium') ? 'checked' : '';?>>
          Medium</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="tshirt_order_your_size" value="Large" <?php echo ($tshirt_order_your_size == 'Large') ? 'checked' : '';?>>
          Large</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="tshirt_order_your_size" value="Xlarge" <?php echo ($tshirt_order_your_size == 'Xlarge') ? 'checked' : '';?>>
          Xlarge</label>
      </div>
    </div>
    <div class="col-sm-4">
      <p>Gender <span class="red-star">*</span></p>
      <div class="radio">
        <label>
          <input type="radio" name="tshirt_order_gender" value="Male" <?php echo ($tshirt_order_gender == 'Male') ? 'checked' : '';?>>
          Male</label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="tshirt_order_gender" value="Female" <?php echo ($tshirt_order_gender == 'Female') ? 'checked' : '';?>>
          Female</label>
      </div>
    </div>
    <div class="col-sm-4">
      <p>Sleeves <span class="red-star">*</span></p>
      <div class="radio">
        <label>
          <input type="radio" name="tshirt_order_sleeves" value="Short sleeve" <?php echo ($tshirt_order_sleeves == 'Short sleeve') ? 'checked' : '';?>>
          Short sleeve </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="tshirt_order_sleeves" value="Long sleeve" <?php echo ($tshirt_order_sleeves == 'Long sleeve') ? 'checked' : '';?>>
          Long sleeve </label>
      </div>
    </div>
  </div>
  
      <input type="hidden" name="pippin_register_nonce" value="<?php echo wp_create_nonce('pippin-register-nonce'); ?>"/>
      <button type="submit" class="btn btn-colored">Submit</button>
</form>


          <form style="display: none;" method="post" name="runner-edit-profile-form" action="">
            <div class="form-group">
              <label for="exampleInputEmail1">First Name</label>
              <input type="text" class="form-control" name="runner_first_name" placeholder="First Name" value="<?php echo $first_name?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Last Name</label>
              <input type="text" class="form-control" name="runner_last_name" placeholder="Last Name" value="<?php echo $last_name?>">
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>
</section>

<!--
  <div class="form-group">
    <label for="exampleInputEmail1">Fundraising End Date (MM/DD/YYYY)</label>
    <input type="text" class="form-control" id="runner_fundraising_datepicker" name="runner_fundraising_end_date" placeholder="Name" value="<?php echo $fundraising_end_date_formated?>">
  </div>
  -->
<style>

</style>
<script>
jQuery(function() {
	jQuery( "#runner_fundraising_datepicker" ).datepicker();
});
</script>
<?php
get_footer();

