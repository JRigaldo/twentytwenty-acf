<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

$entry_header_classes = '';

if ( is_singular() ) {
	$entry_header_classes .= ' header-footer-group';
}

$value = get_sub_field('slides', 'option');

?>


<figure class="slider-header">
	<?php if(have_rows('slider_header', 'option')) : ?>
	<div class="slides">
		<?php while(have_rows('slider_header', 'option')) : the_row(); ?>
		<div><img src="<?php the_sub_field('slides', 'option'); ?>" alt=""></div>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>
</figure>


<header class="<?php echo esc_attr( $entry_header_classes ); ?>">


	<div class="entry-header has-text-align-center">
		<div class="entry-header-inner section-inner medium">

			<?php
				/**
				 * Allow child themes and plugins to filter the display of the categories in the entry header.
				 *
				 * @since 1.0.0
				 *
				 * @param bool   Whether to show the categories in header, Default true.
				 */
			$show_categories = apply_filters( 'twentytwenty_show_categories_in_entry_header', true );

			if ( true === $show_categories && has_category() ) {
				?>

			<div class="entry-categories">
				<span class="screen-reader-text"><?php _e( 'Categories', 'twentytwenty' ); ?></span>
				<div class="entry-categories-inner">
					<?php the_category( ' ' ); ?>
				</div><!-- .entry-categories-inner -->
			</div><!-- .entry-categories -->

			<?php
			}

			if ( is_singular() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
			}

			$intro_text_width = '';

			if ( is_singular() ) {
				$intro_text_width = ' small';
			} else {
				$intro_text_width = ' thin';
			}

			if ( has_excerpt() && is_singular() ) {
				?>

			<div
				class="intro-text section-inner max-percentage<?php echo $intro_text_width; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>">
				<?php the_excerpt(); ?>
			</div>

			<?php
			}

			// Default to displaying the post meta.
			twentytwenty_the_post_meta( get_the_ID(), 'single-top' );
			?>

		</div><!-- .entry-header-inner -->
	</div>

</header><!-- .entry-header -->