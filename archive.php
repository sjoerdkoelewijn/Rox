<?php get_header(); ?>

    <h1 class="archive_header">
        <?php the_archive_title(); ?>
    </h1>

    <div class="content">          

        <?php if ( have_posts() ) : ?>	
                        
            <?php while ( have_posts() ) : the_post(); ?>
            
                <article class="post">
                
                    <div class="text">
                
                        <a title="<?php the_title(); ?>" class="header" href="<?php the_permalink(); ?>">
                            <h2>
                                <?php the_title(); ?>
                            </h2>
                        </a>                    
                        
                        <?php echo apply_filters( 'the_content', wp_trim_words( strip_tags( $post->post_content ), 55 ) ); ?>
              
                        <a title="<?php the_title(); ?>" class="read_more_btn" href="<?php the_permalink(); ?>">
                            Verder lezen
                        </a>
                        
                    </div>

                    <a title="<?php the_title(); ?>" class="image" href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('large'); ?>
                    </a>

                </article>
                
            <?php endwhile; ?>

            <?php // the_posts_pagination(); ?>

            <div class="next_posts_btn_wrap">
                <?php next_posts_link('Volgende pagina'); ?>
            </div>

        <?php else : ?>

            <div class="content">   

                'No content'

            </div>
            
        <?php endif; ?>   
    
    </div>
 
<?php get_footer();




