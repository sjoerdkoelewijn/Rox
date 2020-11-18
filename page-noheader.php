<?php /* Template Name: No Header */ ?>

<?php get_header(); ?>

	<?php while ( have_posts() ) : ?>

		<article class="content page">
		
			<?php the_post(); ?>

			<?php the_content(); ?>

		</article>

	<?php endwhile; ?>

<?php get_footer();

