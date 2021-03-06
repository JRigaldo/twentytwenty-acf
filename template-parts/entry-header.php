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

if ( is_front_page() ) {
	$value = get_sub_field('slides', 'option');
}

?>

<?php if ( is_front_page() ) : ?>
		<figure class="slider-header template-image">
			<?php if(have_rows('slider_header', 'option')) : ?>
			<div class="slides">
				<?php while(have_rows('slider_header', 'option')) : the_row(); ?>
				<div class="slide-item">
					<figcaption class="overlay has-larg-font-size has-text-align-center">
						<?php  the_sub_field('figcaption', 'option'); ?>
					</figcaption>
					<img src="<?php the_sub_field('slides', 'option'); ?>" alt="">
					<button class="banner-toggle">
						<a href="<?php the_sub_field('link', 'option'); ?>">
							<span class="toggle-inner">
								<span class="button-text">
									<?php  the_sub_field('button', 'option') ?>
								</span>
								<span class="toggle-icon">
									<?php twentytwenty_the_theme_svg( 'arrow-right' ); ?>
								</span>
							</span>
						</a>
					</button>
				</div>
				<?php endwhile; ?>
			</div>
			<?php endif; ?>
		</figure>
		<div class="container">
			<div class="row">
				<div class="col-dm-12 contact-admin">
					<span class="profile-avatar">
						<img src="<?php the_field('tsm_local_avatar', 'option'); ?>">
					</span>
					<span class="profile-text">
						<?php the_field('avatar_text', 'option'); ?>
					</span>
				</div>
			</div>
		</div>
	<?php endif; ?>



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