<?php
/*
Template Name: Page: Sidebar Left
*/
define('THEME_TEMPLATE', TRUE);
define('SIDEBAR_POS', 'left');
get_header();
global $smof_data, $us_shortcodes;

// Disabling Section shortcode
global $disable_section_shortcode;
$disable_section_shortcode = TRUE;
?>
<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
	<?php get_template_part( 'templates/pagehead' ); ?>
	<div class="l-submain">
		<div class="l-submain-h g-html i-cf">
			<div class="l-content">
				<?php the_content(__('Read More &raquo;', 'us')); ?>
				<?php
				$link_pages_args = array(
					'before'           => '<div class="w-blog-pagination"><nav class="navigation pagination" role="navigation">',
					'after'            => '</nav></div>',
					'next_or_number'   => 'next_and_number',
					'nextpagelink'     => '>',
					'previouspagelink' => '<',
					'link_before'      => '<span>',
					'link_after'       => '</span>',
					'echo'             => 1
				);
				if (function_exists('us_wp_link_pages')) {
					us_wp_link_pages($link_pages_args);
				} else {
					wp_link_pages();
				}
				?>
				<?php if (@$smof_data['page_comments'] == 1 AND (comments_open() || get_comments_number() != '0')) { comments_template(); } ?>
			</div>
			<div class="l-sidebar at_left">
				<?php generated_dynamic_sidebar(); ?>
			</div>

			<div class="l-sidebar at_right">
			</div>
		</div>
	</div>
<?php endwhile; else : ?>
	<?php _e('No posts were found.', 'us'); ?>
<?php endif; ?>
<?php get_footer(); ?>