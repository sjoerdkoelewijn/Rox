<?php get_header(); ?>

    <div class="header_wrap">

        <div class="column left">

            <h2 class="archive_subheader">
                Online Marketing
            </h2>

            <h1 class="archive_header">
                Kennisbank
            </h1>

            <div class="archive_decription">
                <p>
                    Onze Online Marketing Kennisbank is dé digitale informatiebron voor het MKB. Wij delen graag onze kennis op het gebied van online marketing en helpen je met het optimaliseren van je website en zoveel mogelijk rendement halen uit je online marketing budget. 
                </p>
            </div>
        
        </div>    

        <div class="column groenbox">
            
            <p>

                <strong class="header">
                    Heb je vragen over online marketing?
                </strong>                

                Heb je een specifieke vraag of wil je kijken wat wij voor je kunnen betekenen? Wij staan je graag te woord.  Stuur een mailtje naar <a href="mailto:info@roxtar.nl">info@roxtar.nl</a> of bel ons op <a href="tel:0850600870">085 06 00 870</a>

            </p>
            
        </div>

    </div>

    <div class="content">  

    <?php
        $cat_terms = get_terms(
            array('kennisbank_categories'),
            array(
                    'hide_empty'    => true,
                    'orderby'       => 'name',
                    'order'         => 'ASC'
                )
        );

        if( $cat_terms ) :

            foreach( $cat_terms as $term ) : ?>                
                 
                <section class="kennisbank_category">

                    <h2 class="category_header">
                        <?php echo $term->name; ?>
                    </h2>

                    <p class="category_description">
                        <?php echo $term->description; ?>
                    </p>

                    <a class="category_link" href="/kennisbank/<?php echo $term->slug; ?>/">
                        Bekijk alle artikelen over <span class="category_link_name">&nbsp;<?php echo $term->name; ?></a>
                    </a>

                    <hr>

                    <?php 
                    
                        $args = array(
                        'post_type'         => 'kennisbank',
                        'posts_per_page'    => 3, 
                        'post_status'       => 'publish',
                        'tax_query'         => array(
                                                array(
                                                    'taxonomy' => 'kennisbank_categories',
                                                    'field'    => 'slug',
                                                    'terms'    => $term->slug,
                                                    ),
                                                ),
                        'ignore_sticky_posts'   => true 
                        );

                        $posts = new WP_Query( $args );

                        if( $posts->have_posts() ) :
                            
                            while( $posts->have_posts() ) : $posts->the_post(); ?>

                                <a class="post_link_wrap" title="<?php echo get_the_title(); ?>"  href="<?php echo the_permalink(); ?>">

                                    <?php if ( has_post_thumbnail() ) { ?>

                                        <?php $image = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>
                                        <div class="image" style="background-image:url('<?php echo $image ?>');"></div>

                                    <?php } else {?>

                                        <div class="image default"></div>

                                    <?php } ?>   
                                    
                                    <div class="text">
                                        <h3>
                                            <?php echo get_the_title(); ?>
                                        </h3>
                                        <?php echo apply_filters( 'the_content', wp_trim_words( strip_tags( $post->post_content ), 15 ) ); ?>
                                    </div> 

                                </a>
                          
                            <?php endwhile;

                        endif;
                        
                        wp_reset_postdata(); 
                        
                    ?>

                </section>    

            <?php endforeach; 

        endif; ?>

    </div>
 
<?php get_footer();




