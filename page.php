<?php get_header(); ?>

    <?php while ( have_posts() ) : ?>
        
        <article class="content page">

            <h1 class="page_header">
                <?php the_title(); ?>
            </h1>
            
            <?php the_post(); ?>

            <?php the_content(); ?>

        </article>
		

	<?php endwhile; ?>

<?php get_footer();