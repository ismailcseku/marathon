<?php
/**
 * Template Name: Template - Upload Song
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>


<?php

$user_id = get_current_user_id();

if( $_POST['song_title'] ) {
	
	// Create post object
	$new_post = array(
		'post_title'    => $_POST['song_title'],
		'post_status'   => 'publish', 
		'post_type'     => 'track',
		'post_author'   => $user_id
	);
	
	$new_post_id = wp_insert_post( $new_post );
	wp_set_object_terms($new_post_id, 'uploaded-by-runners' , 'dt_playlist', true);
	
	
	
	// Directory for uploaded mp3 
	$uploaddir = ABSPATH . 'wp-content/uploads/fwap-mp3';  
	// Allowed mimes
	$allowed_ext = "mp3";  	
	// Default is 40MB
	$max_size=40000000;
	// Check mime types are allowed  
	$extension = pathinfo($_FILES['song_file']['name']);  
	
	$extension = $extension[extension];  
	$allowed_paths = explode(", ", $allowed_ext);  
	for($i = 0; $i < count($allowed_paths); $i++) {  
		if ($allowed_paths[$i] == "$extension") {  
				$ok = "1";
		}  
	}  
	$image_name=time().$_FILES['song_file']['name'];
	$image_name = str_replace(' ', '_', $image_name);


	// Check File Size  
	if ($ok == "1") {
		// Rename file and move to folder
		$newname="$uploaddir/".$image_name;  
		$upload_dir = wp_upload_dir(); 
		$new_uploaded_image_url = $upload_dir['baseurl'].'/fwap-mp3/'.$image_name;
		update_post_meta($new_post_id, 'fap_track_url', $new_uploaded_image_url);
		
		if(is_uploaded_file($_FILES['song_file']['tmp_name']))  
		{ 
				move_uploaded_file($_FILES['song_file']['tmp_name'], $newname);  
				chmod($newname, 0777);
		}
		//print "Your image has been uploaded successfully!";  
	}
	
	if($new_post_id) {
		echo '<div class="container text-center"><div class="alert alert-success mt-30" role="alert">Your file has been sent to admin. It will be reviewed and available in the playlist soon.</div></div>';
	}
}
?>
<section>
  <div class="container">
    <div class="section-content">
      <div class="row">
        <div class="col-md-7">
          <form enctype="multipart/form-data" method="post" id="upload-song-form" class="form-horizontal" role="form">
            <div class="form-group">
              <div class="control-label col-sm-5" for="email"> Song Title:</div>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="song_title" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-5 text-right">
                <div class="" for="MARATHON"> File:</div>
              </div>
              <div class="col-sm-6">
                <input type="file" class="" id="song_file" name="song_file" placeholder="">
                <small style="color: red;" class="font-10">Only mp3 is allowed</small>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-5 text-right">
                <div class="" for="MARATHON"> </div>
              </div>
              <div class="col-sm-6">
                <button type="submit" class="btn btn-default text-white" data-bg-color="#1f9b22">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
get_footer();

