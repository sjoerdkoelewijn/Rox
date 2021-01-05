<?php get_header(); ?>

    <?php while ( have_posts() ) : ?>

        <?php 
            // ternary operator
            $title_length = strlen(get_the_title());

            $title_length_class =
            $title_length <= 20 ? 'large' :
            ($title_length <= 30 ? 'medium' :
            ($title_length <= 40 ? 'small' :

            'medium'));      
        
        ?>
        
        <article class="content kennisbank">

            <?php the_post_thumbnail('large', array('class' => 'hero_image')); ?>

            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>

            <h1 class="page_header <?php echo $title_length_class ?>">
                <?php the_title(); ?>
            </h1>

            <div class="content_inner_wrap">

                <?php the_post(); ?>

                <?php the_content(); ?>

            </div>           
            
        </article>		

	<?php endwhile; ?>


    <div class="related_posts">

<?php 
    
    $args = array(
    'post_type'         => 'kennisbank',
    'posts_per_page'    => 3, 
    'post_status'       => 'publish',
    'tax_query'         => array(
                            array(
                                'taxonomy' => 'kennisbank_categories',
                                'field'    => 'slug',
                                'terms'    => 'social-media',
                                ),
                            ),
    'ignore_sticky_posts'   => true 
    );

    $posts = new WP_Query( $args );

    if( $posts->have_posts() ) :
        
        while( $posts->have_posts() ) : $posts->the_post(); ?>

            <a class="post_link_wrap" title="<?php echo get_the_title(); ?>"  href="<?php echo the_permalink(); ?>">

                <?php if ( has_post_thumbnail() ) { ?>

                    <?php $image = get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>
                    <div class="image" style="background-image:url('<?php echo $image ?>');"></div>

                <?php } else {?>

                    <div class="image default"></div>

                <?php } ?>   
                
                <div class="text">
                    <h3>
                        <?php echo get_the_title(); ?>
                    </h3>

                    <?php echo apply_filters( 'the_content', wp_trim_words( strip_tags( $post->post_content ), 30 ) ); ?>

                    <strong>
                        Lees dit artikel
                    </strong>

                </div> 

            </a>
      
        <?php endwhile;

    endif;
    
    wp_reset_postdata(); 
    
?>

</div>

<?php get_footer();