<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>


  </div>
  <!-- end main-content --> 
  
  <!-- Footer -->
  <footer class="footer mt-30 pt-10 pb-10" data-bg-color="#1b1b1b">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4">
          <p class="font-11 copy-right pt-20">2015 ALEH   |  Website powered by <a href="#"></a> <a href="http://staiman.com/">Staiman Media</a>.</p>
        </div>
        <div class="col-md-5">
          <ul class="social-icons list-inline text-center m-0">
              <li><a target="_blank" href="https://www.facebook.com/alehisrael?fref=ts"><i class="fa fa-facebook"></i></a> </li>
              <li><a target="_blank" href="https://twitter.com/ALEHinfo"><i class="fa fa-twitter"></i></a> </li>
              <li><a target="_blank" href="https://instagram.com/aleh_israel/"><i class="fa fa-instagram"></i></a> </li>
              <li><a target="_blank" href="https://www.youtube.com/user/alehisrael"><i class="fa fa-youtube"></i></a> </li>
            </ul>
        </div>
        <div class="col-md-3">
          <p class="font-11 text-left pt-20 text-white">Team powered by Saucony.<br><img src="<?php echo get_template_directory_uri(); ?>/images/logo-saucony.png" width="150" alt=""></p>
        </div>
      </div>
    </div>
  </footer>
</div>
<!-- end wrapper -->

<script src="<?php echo get_template_directory_uri(); ?>/js/lightbox.js"></script>
<script>
		lightbox.option({
			'resizeDuration': 200,
			'wrapAround': true
		})
</script>
<!-- JS | Custom script for all pages --> 
<script src="<?php echo get_template_directory_uri(); ?>/custom.js?v=3"></script>
	<?php wp_footer(); ?>
</body>
</html>