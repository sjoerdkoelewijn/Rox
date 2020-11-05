
		<span class=footer_sepa></span>
		
		<div class="footer">

			<div class="footer_inner">
		
				<div class="left">
					
					<div class="logo">
						<?php echo file_get_contents(get_template_directory() . "/images/svg/logo-white.svg"); ?>
					</div>	
					
					<div class="text">
						<?php the_field('contact_data', 'option'); ?>
					</div>
				
				</div>

				<nav id="footer-services" class="footer_services">

					<?php
					wp_nav_menu(array(
						'theme_location'  => 'footer-services',
						'fallback_cb'     => false,
						'container'       => false,
						'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
					));
					?>

				</nav>

			</div>

			<div class="footer_under">

				<div class="left">
					
					<p class="text">
						&copy; 2020 ROXTAR Online Marketing 
					</p>
				
				</div>

				<nav id="footer-links" class="footer_links">

					<?php
					wp_nav_menu(array(
						'theme_location'  => 'footer-links',
						'fallback_cb'     => false,
						'container'       => false,
						'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
					));
					?>

				</nav>

			</div>

		</div>

		<?php include('parts/cookie-message.php'); ?>

		<?php wp_footer(); ?>

	</body>


</html>