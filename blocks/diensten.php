<?php
/* Block Name: Diensten */

// create id attribute for specific styling
$id = 'diensten-' . $block['id'];

?>
    <article class="diensten">

        <?php if( have_rows('diensten') ): ?>

            <div class="diensten_inner">

                <?php while ( have_rows('diensten') ) : the_row(); ?>

                    <section class="dienst_block">

                        <h1 class="header">
                            <?php the_sub_field('header'); ?>
                        </h1>

                        <h2 class="subheader">
                            <?php the_sub_field('subheader'); ?>
                        </h2>

                        <div class="text">
                            <?php the_sub_field('text'); ?>
                        </div>

                        <a class="button" aria-label="Lees meer over <?php the_sub_field('subheader'); ?>" title="Lees meer over <?php the_sub_field('subheader'); ?><?php the_sub_field('cta'); ?>" href="<?php the_sub_field('url'); ?>">
                            <?php the_sub_field('cta'); ?>
                            <?php echo file_get_contents(get_template_directory() . "/images/svg/arrowRightIcon.svg"); ?>
                        </a>

                    </section>

                <?php endwhile; ?>

            </div>    
            
        <?php else : ?>

            <p>Geen Diensten toegevoegd</p>

        <?php endif; ?>
    

    </article>