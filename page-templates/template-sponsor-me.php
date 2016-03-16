<?php
/**
 * Template Name: Template - Sponsor me
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<?php 
	$user_id = $_REQUEST['r'];
	$user_info = get_userdata($user_id);
	$username = $user_info->user_login;
	$first_name = $user_info->first_name;
	$last_name = $user_info->last_name;
	$runner_profile_photo = get_user_meta($user_id, 'runner_profile_photo', true);
	if($runner_profile_photo=="") {
		$runner_profile_photo = get_template_directory_uri()."/images/no-photo.jpg";
	}

?>

<section id="home" class="divider home-layer-overlay2 layer-overlay2" data-bg-img="http://runforaleh.org/wp-content/uploads/2015/09/our-runners.jpg" style="height: 390px;">
  <div class="reg-setion no-bg">
    <div class="container pt-0 pb-0 text-center">
      <div class="row">
        <div class="col-md-12">
            <h1 class="heading text-uppercase text-white font-nexaregular font-60">Sponsor <?php echo $first_name;?></h1>
       </div>
      </div>
    </div>
  </div>
</section>
        
<section>
  <div class="container pt-30">
    <div class="section-content">
      <form id="sponsor-me-payment-form" action="https://donate.aleh.org/includes/Donation_Process.asp" method="POST" name="DonationForm">
      	<input type="hidden" id="_wpnonce" name="_wpnonce" value="<?php echo $nonce = wp_create_nonce( 'sponsorme_'.$user_id );?>" />
        <input name="RID" id="RID" type="hidden" value="<?php echo $user_id; ?>"/>
        <input name="CEV" type="hidden" value="<?php echo $wpnoncevalue; ?>"/>
        <input name="FORMTYPE" type="hidden" value="ASCEND"/>
        <input name="Description" type="hidden" value="Sponsor <?php echo $first_name.' '.$last_name;?> (<?php echo $user_id; ?>)"/>
        <input name="CampaignCode" type="hidden" value="Ascend<?php echo $user_id; ?>"/>
        <div class="row">
          <div class="col-md-4">
            <div class="thumb"> <img alt="" class="img-responsive" src="<?php echo $runner_profile_photo?>">
              <h2><span data-text-color="#1f9b22">RUNNER:</span> <?php echo $first_name.' '.$last_name;?> </h2>
            </div>
          </div>
          <div class="col-md-7">
            <h3 class="font-24 text-uppercase" data-text-color="#1f9b22"> i would like to sponsor <?php echo $first_name;?></h3>
            <div class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-sm-3" for="phone"> Currency :</label>
                <div class="col-sm-6">
                  <select id="currency_code" name="currency_code" size="1" class="form-control">
                    <option value='ILS'>ILS</option>
                    <option value='USD'>USD</option>
                    <option value='EUR'>EUR</option>
                    <option value='GBP'>GBP</option>
                    <option value='CAD'>CAD</option>
                  </select>
                </div>
              </div>
              <div class="form-group mb-40 mt-20">
                <label class="control-label col-sm-3 font-24 text-right" for="usa-doller"> Amount:</label>
                <div class="col-sm-6">
                  <input id="Amount" class="form-control" placeholder="" type="text" name="Amount">
                  <div class="currency-response" style="font-size:14px;"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="name"> FIRST NAME :</label>
                <div class="col-sm-6">
                  <input id="sponsor_fname" class="form-control" name="FirstName" placeholder="" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="name"> LAST NAME :</label>
                <div class="col-sm-6">
                  <input id="sponsor_lname" class="form-control" name="LastName" placeholder="" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="email"> ADDRESS :</label>
                <div class="col-sm-6">
                  <input class="form-control" placeholder="" name="Address">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="email"> CITY :</label>
                <div class="col-sm-6">
                  <input class="form-control" placeholder="" name="City">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="email"> STATE :</label>
                <div class="col-sm-6">
                  <select name="State" size="1" class="form-control">
                    <option value="-- Please Select -- ">-- Please Select 
                    --</option>
                    <option value=" ">Non-US Address</option>
                    <option>Non-US</option>
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>American Samoa</option>
                    <option>Arizona</option>
                    <option>Arkansas</option>
                    <option>California</option>
                    <option>Colorado</option>
                    <option>Connecticut</option>
                    <option>Delaware</option>
                    <option>District Of Columbia</option>
                    <option>Federated States Of Micronesia</option>
                    <option>Florida</option>
                    <option>Georgia</option>
                    <option>Guam</option>
                    <option>Hawaii</option>
                    <option>Idaho</option>
                    <option>Illinois</option>
                    <option>Indiana</option>
                    <option>Iowa</option>
                    <option>Kansas</option>
                    <option>Kentucky</option>
                    <option>Louisiana</option>
                    <option>Maine</option>
                    <option>Marshall Islands</option>
                    <option>Maryland</option>
                    <option>Massachusetts</option>
                    <option>Michigan</option>
                    <option>Minnesota</option>
                    <option>Mississippi</option>
                    <option>Missouri</option>
                    <option>Montana</option>
                    <option>Nebraska</option>
                    <option>Nevada</option>
                    <option>New Hampshire</option>
                    <option>New Jersey</option>
                    <option>New Mexico</option>
                    <option>New York</option>
                    <option>North Carolina</option>
                    <option>North Dakota</option>
                    <option>Northern Mariana Islands</option>
                    <option>Ohio</option>
                    <option>Oklahoma</option>
                    <option>Oregon</option>
                    <option>Palau</option>
                    <option>Pennsylvania</option>
                    <option>Puerto Rico</option>
                    <option>Rhode Island</option>
                    <option>South Carolina</option>
                    <option>South Dakota</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Utah</option>
                    <option>Vermont</option>
                    <option>Virgin Islands</option>
                    <option>Virginia</option>
                    <option>Washington</option>
                    <option>West Virginia</option>
                    <option>Wisconsin</option>
                    <option>Wyoming</option>
                    <option>Alberta</option>
                    <option>British Columbia</option>
                    <option>Manitoba</option>
                    <option>New Brunswick</option>
                    <option>Newfoundland and Labrador</option>
                    <option>Northwest Territories</option>
                    <option>Nova Scotia</option>
                    <option>Nunavut</option>
                    <option>Ontario</option>
                    <option>Prince Edward Island</option>
                    <option>Quebec</option>
                    <option>Saskatchewan</option>
                    <option>Yukon</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="email"> ZIP :</label>
                <div class="col-sm-6">
                  <input  class="form-control" placeholder="" name="ZIP">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="email"> COUNTRY :</label>
                <div class="col-sm-6">
                  <select name="country" size="1" class="form-control">
                    <option>Afghanistan</option>
                    <option>Albania</option>
                    <option>Algeria</option>
                    <option>American Samoa</option>
                    <option>Andorra</option>
                    <option>Angola</option>
                    <option>Anguilla</option>
                    <option>Antarctica</option>
                    <option>Antigua And Barbuda</option>
                    <option>Argentina</option>
                    <option>Armenia</option>
                    <option>Aruba</option>
                    <option>Australia</option>
                    <option>Austria</option>
                    <option>Azerbaijan</option>
                    <option>Bahamas</option>
                    <option>Bahrain</option>
                    <option>Bangladesh</option>
                    <option>Barbados</option>
                    <option>Belarus</option>
                    <option>Belgium</option>
                    <option>Belize</option>
                    <option>Benin</option>
                    <option>Bermuda</option>
                    <option>Bhutan</option>
                    <option>Bolivia</option>
                    <option>Bosnia And Herzegowina</option>
                    <option>Botswana</option>
                    <option>Bouvet Island</option>
                    <option>Brazil</option>
                    <option>British Indian Ocean Territory</option>
                    <option>Brunei Darussalam</option>
                    <option>Bulgaria</option>
                    <option>Burkina Faso</option>
                    <option>Burundi</option>
                    <option>Cambodia</option>
                    <option>Cameroon</option>
                    <option>Canada</option>
                    <option>Cape Verde</option>
                    <option>Cayman Islands</option>
                    <option>Central African Republic</option>
                    <option>Chad</option>
                    <option>Chile</option>
                    <option>China</option>
                    <option>Christmas Island</option>
                    <option>Cocos (Keeling) Islands</option>
                    <option>Colombia</option>
                    <option>Comoros</option>
                    <option>Congo</option>
                    <option>Cook Islands</option>
                    <option>Costa Rica</option>
                    <option>Cote D'Ivoire</option>
                    <option>Croatia</option>
                    <option>Cuba</option>
                    <option>Cyprus</option>
                    <option>Czech Republic</option>
                    <option>Denmark</option>
                    <option>Djibouti</option>
                    <option>Dominica</option>
                    <option>Dominican Republic</option>
                    <option>East Timor</option>
                    <option>Ecuador</option>
                    <option>Egypt</option>
                    <option>El Salvador</option>
                    <option>Equatorial Guinea</option>
                    <option>Eritrea</option>
                    <option>Estonia</option>
                    <option>Ethiopia</option>
                    <option>Falkland Islands</option>
                    <option>Faroe Islands</option>
                    <option>Fiji</option>
                    <option>Finland</option>
                    <option>France</option>
                    <option>France, Metropolitan</option>
                    <option>French Guiana</option>
                    <option>French Polynesia</option>
                    <option>French Southern Territories</option>
                    <option>Gabon</option>
                    <option>Gambia</option>
                    <option>Georgia</option>
                    <option>Germany</option>
                    <option>Ghana</option>
                    <option>Gibraltar</option>
                    <option>Greece</option>
                    <option>Greenland</option>
                    <option>Grenada</option>
                    <option>Guadeloupe</option>
                    <option>Guam</option>
                    <option>Guatemala</option>
                    <option>Guinea</option>
                    <option>Guinea-Bissau</option>
                    <option>Guyana</option>
                    <option>Haiti</option>
                    <option>Heard And Mc Donald Islands</option>
                    <option>Honduras</option>
                    <option>Hong Kong</option>
                    <option>Hungary</option>
                    <option>Iceland</option>
                    <option>India</option>
                    <option>Indonesia</option>
                    <option>Iran</option>
                    <option>Iraq</option>
                    <option>Ireland</option>
                    <option>Israel</option>
                    <option>Italy</option>
                    <option>Jamaica</option>
                    <option>Japan</option>
                    <option>Jordan</option>
                    <option>Kazakhstan</option>
                    <option>Kenya</option>
                    <option>Kiribati</option>
                    <option>North Korea</option>
                    <option>South Korea</option>
                    <option>Kuwait</option>
                    <option>Kyrgyzstan</option>
                    <option>Lao People's Republic</option>
                    <option>Latvia</option>
                    <option>Lebanon</option>
                    <option>Lesotho</option>
                    <option>Liberia</option>
                    <option>Libyan Arab Jamahiriya</option>
                    <option>Liechtenstein</option>
                    <option>Lithuania</option>
                    <option>Luxembourg</option>
                    <option>Macau</option>
                    <option>Macedonia</option>
                    <option>Madagascar</option>
                    <option>Malawi</option>
                    <option>Malaysia</option>
                    <option>Maldives</option>
                    <option>Mali</option>
                    <option>Malta</option>
                    <option>Marshall Islands</option>
                    <option>Martinique</option>
                    <option>Mauritania</option>
                    <option>Mauritius</option>
                    <option>Mayotte</option>
                    <option>Mexico</option>
                    <option>Micronesia</option>
                    <option>Moldova</option>
                    <option>Monaco</option>
                    <option>Mongolia</option>
                    <option>Montserrat</option>
                    <option>Morocco</option>
                    <option>Mozambique</option>
                    <option>Myanmar</option>
                    <option>Namibia</option>
                    <option>Nauru</option>
                    <option>Nepal</option>
                    <option>Netherlands</option>
                    <option>Netherlands Antilles</option>
                    <option>New Caledonia</option>
                    <option>New Zealand</option>
                    <option>Nicaragua</option>
                    <option>Niger</option>
                    <option>Nigeria</option>
                    <option>Niue</option>
                    <option>Norfolk Island</option>
                    <option>Northern Mariana Islands</option>
                    <option>Norway</option>
                    <option>Oman</option>
                    <option>Pakistan</option>
                    <option>Palau</option>
                    <option>Panama</option>
                    <option>Papua New Guinea</option>
                    <option>Paraguay</option>
                    <option>Peru</option>
                    <option>Philippines</option>
                    <option>Pitcairn</option>
                    <option>Poland</option>
                    <option>Portugal</option>
                    <option>Puerto Rico</option>
                    <option>Qatar</option>
                    <option>Reunion</option>
                    <option>Romania</option>
                    <option>Russian Federation</option>
                    <option>Rwanda</option>
                    <option>Saint Kitts And Nevis</option>
                    <option>Saint Lucia</option>
                    <option>Saint Vincent And The Grenadines</option>
                    <option>Samoa</option>
                    <option>San Marino</option>
                    <option>Sao Tome And Principe</option>
                    <option>Saudi Arabia</option>
                    <option>Senegal</option>
                    <option>Seychelles</option>
                    <option>Sierra Leone</option>
                    <option>Singapore</option>
                    <option>Slovakia</option>
                    <option>Slovenia</option>
                    <option>Solomon Islands</option>
                    <option>Somalia</option>
                    <option>South Africa</option>
                    <option>South Georgia &amp; South Sandwich Islands </option>
                    <option>Spain</option>
                    <option>Sri Lanka</option>
                    <option>St Helena</option>
                    <option>St Pierre and Miquelon</option>
                    <option>Sudan</option>
                    <option>Suriname</option>
                    <option>Svalbard And Jan Mayen Islands</option>
                    <option>Swaziland</option>
                    <option>Sweden</option>
                    <option>Switzerland</option>
                    <option>Syrian Arab Republic</option>
                    <option>Taiwan</option>
                    <option>Tajikistan</option>
                    <option>Tanzania</option>
                    <option>Thailand</option>
                    <option>Togo</option>
                    <option>Tokelau</option>
                    <option>Tonga</option>
                    <option>Trinidad And Tobago</option>
                    <option>Tunisia</option>
                    <option>Turkey</option>
                    <option>Turkmenistan</option>
                    <option>Turks And Caicos Islands</option>
                    <option>Tuvalu</option>
                    <option>Uganda</option>
                    <option>Ukraine</option>
                    <option>United Arab Emirates</option>
                    <option>United Kingdom</option>
                    <option selected="">United States</option>
                    <option>United States Minor Outlying Islands </option>
                    <option>Uruguay</option>
                    <option>Uzbekistan</option>
                    <option>Vanuatu</option>
                    <option>Vatican City State</option>
                    <option>Venezuela</option>
                    <option>Viet Nam</option>
                    <option>Virgin Islands (British)</option>
                    <option>Virgin Islands (U.S.)</option>
                    <option>Wallis And Futuna Islands</option>
                    <option>Western Sahara</option>
                    <option>Yemen</option>
                    <option>Zaire</option>
                    <option>Zambia</option>
                    <option>Zimbabwe</option>
                    <option>Other-Not Shown</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="email"> EMAIL :</label>
                <div class="col-sm-6">
                  <input id="sponsor_email" class="form-control" placeholder="" type="email" name="email">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="phone"> PHONE :</label>
                <div class="col-sm-6">
                  <input id="tel" class="form-control" placeholder="" type="tel" name="Telephone">
                </div>
              </div>
              <hr>
              <div class="form-group">
                <label class="control-label col-sm-3" for="phone"> CREDIT CARD TYPE :</label>
                <div class="col-sm-6">
                  <select name="CreditCardType" size="1" class="form-control">
                    <option value="ISRA">Isracard</option>
                    <option selected="" value="VISA">Visa</option>
                    <option value="MC">Mastercard</option>
                    <option value="AMEX">American Express</option>
                    <option value="DINR">Diners</option>
                    <option value="DISC">Discover</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="phone"> CREDIT CARD NUMBER :</label>
                <div class="col-sm-6">
                  <input id="tel" class="form-control" placeholder="" type="tel" name="CardNum">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="phone"> NAME ON CARD :</label>
                <div class="col-sm-6">
                  <input id="tel" class="form-control" placeholder="" type="tel" name="NameOnCard">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="phone"> CVV (3 or 4 digit Code) :</label>
                <div class="col-sm-6">
                  <input id="tel" class="form-control" placeholder="" type="tel" name="CVV">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="phone"> EXPIRATION DATE :</label>
                <div class="col-sm-6">
                  <select id="ValidMonth" class="filed3" name="ValidMonth" size="1">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                  </select>
                  <select id="ValidYear" class="filed3" name="validYear" size="1">
                    <option value="15">2015</option>
                    <option value="16">2016</option>
                    <option value="17">2017</option>
                    <option value="18">2018</option>
                    <option value="19">2019</option>
                    <option value="20">2020</option>
                    <option value="21">2021</option>
                    <option value="21">2022</option>
                    <option value="21">2023</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="form-group">
                <label class="control-label col-sm-3" for="phone"> Comment : <br> <small style="font-weight: normal;">This comment will be posted on the runner page</small></label>
                <div class="col-sm-6">
                  <textarea id="sponsor_comment" aria-required="true" class="form-control" cols="45" name="Comments" required rows="8"></textarea>
                </div>
              </div>
              <div class="row text-left">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label class="" for="info">
                      <input name="sendme_information" type="radio" value="yes">
                      Please send me information about ALEH.</label>
                  </div>
                  <div class="form-group">
                    <label class="" for="info">
                      <input name="sendme_information" type="radio" value="no">
                      Please do not send me future emails.</label>
                  </div>
                </div>
              </div>
              <a id="paymen-form-submit" class="btn btn-default">Submit</a>
            </div>
            <div class="col-md-12 text-right mt-30"> <a data-text-color="#0251d4" href="<?php echo esc_url( home_url('/runner-page/?r='.$user_id) ); ?>"> <u>Back to <?php echo $first_name;?>'s Page</u></a> </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<script>
jQuery(document).ready(function(e) {
	jQuery('#paymen-form-submit').click(function(e){
				var rid = jQuery("#RID").val();
				var wn = jQuery("#_wpnonce").val();
				var a = jQuery("#Amount").val();
        var currency_code = jQuery("#currency_code").val();
				var sponsor_fname = jQuery("#sponsor_fname").val();
				var sponsor_lname = jQuery("#sponsor_lname").val();
				var sponsor_email = jQuery("#sponsor_email").val();
				var comment = jQuery("#sponsor_comment").val();
				var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' );?>";
				jQuery.ajax({ 
						 data: {action: 'runner_donation_form', rid:rid, wn:wn, a:a, currency_code:currency_code, sponsor_fname:sponsor_fname, sponsor_lname:sponsor_lname, sponsor_email:sponsor_email, comment:comment},
						 type: 'post',
						 url: ajaxurl,
						 success: function(data) {
								jQuery("#_wpnonce").val(data);
								jQuery('#sponsor-me-payment-form').submit();
						}
				});
				return false;
		});
});
</script>


<script>
jQuery(document).ready(function($) {

/*
	$('#currency_code===').on('change', function (e) {
			$('#CurrencyAmount').trigger('input');
	});
		

    $('#CurrencyAmount22222===').on('input', function() {
        // do something
				var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' );?>";
				var from_currency = jQuery("#currency_code").val();
				var to_currency = 'USD';
				var CurrencyAmount = jQuery(this).val();
				jQuery(".currency-response").html('<img src="<?php echo get_template_directory_uri(); ?>/images/loading.gif" alt="">');
				jQuery.ajax({ 
						 data: {action: 'ism_currency_converter', from_currency:from_currency, to_currency:to_currency},
						 type: 'post',
						 url: ajaxurl,
						 success: function(data) {
							 	console.log(CurrencyAmount);
								result_multiply = data*CurrencyAmount;
								resultAmount = result_multiply.toFixed(3);
							 	console.log(resultAmount);
								jQuery("#Amount").val(resultAmount);
								jQuery(".currency-response").html('You are going to pay <strong>USD ' + resultAmount + '</strong>');
						}
				});

    });
		
		*/
});
</script>

<?php
get_footer();






