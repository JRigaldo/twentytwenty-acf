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
$id = 'list-icon-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'list-icon';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
// if( $is_preview ) {
//     $className .= ' is-admin';
// }

//  
?>

<aside id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <?php  if(have_rows('list_icon')) : ?>
            <?php while(have_rows('list_icon')) : the_row(); ?>
            <div class="list-content">
                <span class="list-icon">
                    <?php twentytwenty_the_theme_svg( 'clipboard' ); ?>
                </span>
                <h4 class="heading-size-4"><?php the_sub_field('list_item'); ?></h4>
            </div>

            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</aside>