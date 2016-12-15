<?php get_header(); ?>
<?php
$sidebar_position = get_post_meta( get_queried_object_id(), 'vw_page_sidebar_position', true );
$sidebar_position_class = '';
if ( 'left' == $sidebar_position ) {
	$sidebar_position_class = 'sidebar-left';
} else if( 'right' == $sidebar_position ) {
	$sidebar_position_class = 'sidebar-right';
} else {
	$sidebar_position_class = 'sidebar-hidden';
}
?>
<div id="page-wrapper" class="container <?php echo $sidebar_position_class; ?>">
	<div class="row">
		<div id="page-content" class="col-sm-7 col-md-8">
			<?php if (have_posts()) : ?>
				<?php $id = '1'; ?>
				<?php while ( have_posts() ) : the_post(); ?>
					 <?php (!$id) ?: include WP_PLUGIN_DIR."/biblioteca/view/includeItemsLibrary.php"; ?>
					<?php $id = ''; ?>
				<?php endwhile; ?>

				<?php comments_template(); ?>

			<?php else : ?>

				<h2><?php _e('Not Found', 'envirra') ?></h2>

			<?php endif; ?>
		</div>

		<?php if ( 'left' == $sidebar_position || 'right' == $sidebar_position ) : ?>
		<aside id="page-sidebar" class="sidebar-wrapper col-sm-5 col-md-4">
			<?php get_sidebar(); ?>
		</aside>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
