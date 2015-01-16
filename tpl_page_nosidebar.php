<?php
/*
Template Name: No Sidebar
*/
?>

<?php get_header(); ?>
<?php get_template_part('scripts/breadcrumb'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2><?php the_title();?></h2>
			</div>
			<div class="panel-body">
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>

				<div class="post">
					<?php the_content();?>
				</div>

				<?php endwhile; endif;?>

				<?php comments_template(); ?>

				<div class="wp-pagenavi"><?php wp_link_pages('before=Pages: &pagelink=<span>%</span>'); ?></div>

				<?php edit_post_link('Edit Post'); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
