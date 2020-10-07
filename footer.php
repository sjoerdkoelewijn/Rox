
		
		
		<article class="footer">
		
			<div class="left">			
				<?php the_field('contact_data', 'option'); ?>
			</div>

			<nav id="footer-links" class="footer_links" role="navigation">
				<?php
				wp_nav_menu(array(
					'theme_location'  => 'footer-links',
					'fallback_cb'     => false,
					'container'       => false,
					'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
				));
				?>
			</nav>

		</article>

		
		<?php wp_footer(); ?>

	</body>


</html>