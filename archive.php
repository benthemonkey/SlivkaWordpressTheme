<?php get_header(); ?>
<?php get_template_part('scripts/breadcrumb'); ?>

<div class="row">
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php if (have_posts()) :
				echo"<h2>"; ?>

				<?php if (is_day()) { ?>
				Archive for <?php the_time(get_option('date_format')); ?>

				<?php } elseif (is_month()) { ?>
				Archive for <?php the_time('F, Y'); ?>

				<?php } elseif (is_category()) { ?>
				Archive for <?php echo single_cat_title(); ?>

				<?php } elseif (is_author()) { ?>
				Author Archive

				<?php } elseif (is_year()) { ?>
				Archive for <?php the_time('Y'); ?>

				<?php } elseif (is_search()) { ?>
				Search Results

				<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				Blog Archives
				<?php }
				echo"</h2>";
				?>
			</div>
			<div class="panel-body">
				<?php
				while (have_posts()) : the_post();
				$wpcx_thumb = wpcx_get_wp_generated_thumb("reference");
				?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h3><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
					<div class="post_meta">
						<span class="category">
							<?php
							$wpcx_category = get_the_category();
							$wpcx_name = $wpcx_category[0]->cat_name;
							$wpcx_id = $wpcx_category[0]->cat_ID;
							$wpcx_link = get_category_link($wpcx_id);
							echo "<a href='$wpcx_link' title='$wpcx_name'>$wpcx_name</a>";
							?>
						</span>
						<span class="date">Published <?php the_time(get_option('date_format')); ?> at <?php the_time(get_option('time_format'));?></span>
						<span class="comment_meta"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>
						<span class="social">
							<?php
							if(!empty($wpcx_cxOptions["social_fb_like"]) && $wpcx_cxOptions["social_fb_like"] == "yes") {
							?>
								<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=button_count&amp;show_faces=false&amp;width=75&amp;action=like&amp;font&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:130px; height:21px;" allowTransparency="true"></iframe>
							<?php
							}

							if(!empty($wpcx_cxOptions["social_google_like"]) && $wpcx_cxOptions["social_google_like"] == "yes") {
							?>
								<span class="google"><g:plusone size="medium"></g:plusone></span>
							<?php
							}
							?>
						</span>
					</div>
					<p></p>

					<?php
					if(!empty($wpcx_thumb)) {
					?>
					<div class="row">
						<div class="col-md-4">
							<img src="<?php echo $wpcx_thumb;?>" />
						</div>
						<div class="col-md-8">

					<?php
					} else {
						echo '<div class="row"><div class="col-md-12">';
					}
					?>

							<?php the_excerpt();?>
						</div>
					</div>
				</div>
				<hr>

			<?php endwhile; else: ?>

				<div class="post">
					<h1>Nothing found</h1>
					<p>Sorry, no posts matched your criteria.</p>
				</div>

			<?php endif; ?>

			<?php

			get_template_part('scripts/wp-pagenavi');

			if(function_exists('wp_pagenavi')) {
				wp_pagenavi();
			} else {
				wp_link_pages();
			}

			?>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>