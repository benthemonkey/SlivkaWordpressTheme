<?php get_header(); ?>
<?php get_template_part('scripts/breadcrumb'); ?>
<div class="row">
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2><?php the_title();?></h2>
			</div>
			<div class="panel-body">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<div class="post">
					<div class="post_meta">
						<span class="category"><?php the_category(' ') ?></span>
						<span class="date">Published <?php the_time(get_option('date_format')); ?> at <?php the_time(get_option('time_format'));?></span>
						<!--<span class="comment_meta"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>-->
						<span class="social">

							<?php

							if(!empty($wpcx_cxOptions["social_fb_like"])) {
								if($wpcx_cxOptions["social_fb_like"] == "yes") {
								?>
									<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=button_count&amp;show_faces=false&amp;width=75&amp;action=like&amp;font&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:130px; height:21px;" allowTransparency="true"></iframe>
								<?php
								}
							}
							?>

							<?php
							if(!empty($wpcx_cxOptions["social_google_like"])) {
								if($wpcx_cxOptions["social_google_like"] == "yes") {
								?>
									<span class="google"><g:plusone size="medium"></g:plusone></span>
								<?php
								}
							}
							?>

						</span>
					</div>
					<div class="text-center" style="margin: 10px;"><?php echo get_the_post_thumbnail($page->ID, array(558,558)); ?></div>
					<?php the_content();?>
					<?php the_tags( '<p class="meta">Tags: ', ', ', '</p>'); ?>
				</div>
				<?php wp_link_pages(array('before' => '<div class="wp-pagenavi">Pages: ', 'after' => '</div>')); ?>
				<?php edit_post_link('Edit Post'); ?>

				<div class="post_nav">
					<div class="nav-previous pull-left"><?php previous_post_link('%link', '<span class="meta-nav">&laquo;</span> %title') ?></div>
					<div class="nav-next pull-right"><?php next_post_link('%link', '%title <span class="meta-nav">&raquo;</span>') ?></div>
				</div>

				<?php endwhile; endif;?>

				<div id="comment-wrap">
					<?php comments_template(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
