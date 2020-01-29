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
$id = 'slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slider';
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

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> block-link">
	<?php  if(have_rows('slides')) : ?>
	<div class="slides template-image">
		<?php while(have_rows('slides')) : the_row(); ?>
		<?php $image = get_sub_field('image'); ?>
		<!-- <div class="banner-image"> -->
		<?php if($image): ?>
		<?php echo wp_get_attachment_image($image['id'], 'full'); ?>
		<figcaption class="overlay has-larg-font-size has-text-align-left"><?php the_sub_field('figcaption'); ?>
		</figcaption>
		<?php endif; ?>
		<!-- </div> -->
	</div>
	<?php endwhile; ?>
	<?php endif; ?>
</section>