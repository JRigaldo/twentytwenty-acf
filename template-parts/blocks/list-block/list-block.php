<?php

/**
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'list-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'list-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

if( $is_preview ) {
    $className .= ' is-admin';
}
?>

<aside id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 list-block-container">
                <h3>
                    <?php the_field('list_block_title'); ?>
                </h3>

                <?php  if(have_rows('list_block_repeater')) : ?>
                <?php while(have_rows('list_block_repeater')) : the_row() ?>
                <h5 class="heading-size-5">
                    <?php the_sub_field('list_block_subtitle'); ?>
                </h5>
                <p>
                    <?php the_sub_field('list_block_text'); ?>
                </p>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</aside>