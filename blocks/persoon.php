<?php
/* Block Name: Persoon */

// create id attribute for specific styling
$id = 'persoon-' . $block['id'];

?>
    <article class="persoon">

        <?php 
            $image = get_field('image');
            if( $image ) { ?>
                <div class="image">
                    <img loading="lazy"  src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $image['alt']; ?>" />
                    
                    <svg width="0" height="0">
                        <clipPath id="mask">
                            <path d="M54.3353 511.748C51.877 647.088 222.667 695.538 308.369 702.845C1129.05 779.097 836.182 328.111 617.958 160.77C443.379 26.8977 264.586 124.947 197.013 190.705C150.478 241.328 56.7936 376.408 54.3353 511.748Z" fill="#C4C4C4"/>
                        </clipPath>
                    </svg>
                </div>                
            <?php } ?>

            <div class="text">

                <h1 class="naam">
                    <?php the_field('naam'); ?>
                </h1>
                <h2 class="titel">
                    <?php the_field('titel'); ?>
                </h2>

                <a class="email" titel="email <?php the_field('email'); ?>" href="mailto:<?php the_field('email'); ?>">
                    <?php the_field('email'); ?>
                </a>

                <div class="telefoon">
                    <?php the_field('telefoon'); ?>
                </div>            
            
            </div>

    </article>