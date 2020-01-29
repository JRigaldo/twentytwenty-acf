<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'pack-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'pack';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
// $title = get_sub_field('pack_title') ?: 'Pack title';
// $text = get_sub_field('pack_text') ?: 'Pack text';
// $link = get_sub_field('pack_link') ?: 'Pack link';
// $text_button = get_sub_field('button_text') ?: 'Pack button';

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <?php if(have_rows('packs')) : ?>
            <?php while(have_rows('packs')) : the_row(); ?>
            <div class="col-md-6">
                <figure class="template-image">
                <?php $image = get_sub_field('pack_image'); ?>
                <div class="banner-image">
                    <?php if($image): ?>
                    <?php echo wp_get_attachment_image($image['id'], 'full'); ?>
                    <figcaption class="overlay has-larg-font-size has-text-align-left">
                        <?php the_sub_field('pack_figcaption'); ?></figcaption>
                    <?php endif; ?>

                    <button class="banner-toggle">
                        <a href="<?php the_sub_field('pack_link'); ?>">
                            <span class="toggle-inner">
                                <span class="button-text">
                                    <?php the_sub_field('image_button_text') ?>
                                </span>
                                <span class="toggle-icon">
                                    <?php twentytwenty_the_theme_svg( 'arrow-right' ); ?>
                                </span>
                            </span>
                        </a>
                    </button>

                </div>
            </figure>
            <div class="container card-pack">
                <h5><?php the_sub_field('pack_title'); ?></h5>
                <p><?php the_sub_field('pack_text');?></p>

                <div class="button-center">
                    <button class="card-pack-toggle">
                        <a href="<?php the_sub_field('pack_link'); ?>">
                            <span class="toggle-inner">
                                <span class="button-text">
                                    <?php the_sub_field('button_text'); ?>
                                </span>
                                <span class="toggle-icon">
                                    <?php twentytwenty_the_theme_svg( 'arrow-right' ); ?>
                                </span>
                            </span>
                        </a>
                    </button>
                </div>
            </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

</div>