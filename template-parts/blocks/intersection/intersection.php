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
$id = 'intersection-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'intersection';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if(have_rows('intersection')) : ?>
    <?php while(have_rows('intersection')) : the_row(); ?>
    <aside class="inter-section">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <h3 class="heading-size-3"><?php the_sub_field('intersection_title');  ?></h3>
                    <h5 class="heading-size-5"><?php the_sub_field('intersection_text'); ?></h5>
                </div>
            </div>
        </div>
    </aside>
    <?php endwhile; ?>
    <?php endif; ?>
</div>