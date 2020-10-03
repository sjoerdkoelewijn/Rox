<?php
/* Block Name: Hero */

// create id attribute for specific styling
$id = 'hero-' . $block['id'];

?>
    <article class="hero">

        <div class="text">
            <h1 class="header">
                <?php the_field('header'); ?>
            </h1>

            <button class="read_more_link" data-read-more-btn>
                <?php echo file_get_contents(get_template_directory() . "/images/svg/arrowDownIcon.svg"); ?>
                <?php the_field('CTA'); ?>
            </button>
        </div>

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

    </article>