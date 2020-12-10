<?php
/* Block Name: Hero */

// create id attribute for specific styling
$id = 'hero-' . $block['id'];

?>
    <div class="related_posts">

        <?php 

        if( have_rows('postrepeater') ):

            while( have_rows('postrepeater') ) : the_row(); ?> 

                <?php $post = get_sub_field('post'); ?>  
                
                <?php if( $post ): ?>
                    
                    <a class="related_post" title="<?php echo get_the_title( $post->ID ); ?>" href="<?php echo get_permalink( $post->ID ); ?>">

                        <?php $image = get_the_post_thumbnail_url($post->ID, 'thumbnail');
                        if( $image ): ?> 
                            <img class="featured_image" alt="<?php echo get_the_title( $post->ID ) ?>" src="<?php echo $image; ?>" >
                        <?php endif; ?>   

                        <span class="text">
                            <?php echo get_the_title( $post->ID ); ?>
                        </span>
                    </a>

                <?php endif; ?>

            <?php endwhile;

        else : ?>

            <p> 
               Geen post gevonden
            </p>

        <?php endif;

        ?>

    </div>