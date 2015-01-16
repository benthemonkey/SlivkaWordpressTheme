<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">

	<?php if (is_home()) { ?>
		<li><a href="<?php echo home_url(); ?>" title="home"><span>Home</span></a></li>
	<?php } ?>

	<?php if (is_tag() ) { ?>
		<li><a href="<?php echo home_url(); ?>" title="home"><span>Home</span></a></li>
		<li><a href="#" rel="bookmark" title="Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;">Posts Tagged &#8216; <?php single_tag_title(); ?> &#8217;</a></li>
	<?php } ?>

	<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

	if($term) { ?>

		<li><a href="<?php echo home_url(); ?>" title="home"><span>Home</span></a></li>
		<li><a href="#" rel="bookmark" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></a></li>

	<?php } ?>

	<?php if (is_category()) { ?>
		<li><a href="<?php echo home_url(); ?>" title="home"><span>Home</span></a></li>
		<li><a href="#" title="<?php single_cat_title(); ?>"><?php single_cat_title(); ?></a></li>
	<?php } ?>

	<?php if (is_page()) { ?>
		<li><a href="<?php echo home_url(); ?>" title="home"><span>Home</span></a></li>
		<?php
		global $wp_query;
		if (empty($wp_query->post->post_parent) ) {
			$parent = $wp_query->post->ID;
			echo '';
		} else {
			$parent = $wp_query->post->post_parent;
			echo '<li><a href="'.get_permalink($parent).'">'.get_the_title($parent).'</a></li>';
		}
		?>
		<li><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
			<?php the_title(); ?>
		</a></li>
	<?php } ?>

	<?php if (is_single()) {

		global $post;

		if($post->post_type == "myportfolio") {

			$terms = get_terms('portfolio');

			if($terms) {

				$link = get_term_link($terms[0]->slug, 'portfolio');
				$name = $terms[0]->name;

			}

			?>

			<li><a href="<?php echo home_url(); ?>" title="home"><span>Home</span></a></li>
			<?php if($terms) { ?><li><a href="<?php echo $link;?>"><?php echo $name;?></a></li>
			<?php } ?><li><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
			<?php the_title(); ?>
			</a></li>

			<?php

		} elseif($post->post_type == "attachment") {

		?>
			<li><a href="<?php echo home_url(); ?>" title="home"><span>Home</span></a></li>
			<li><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
			<?php the_title(); ?>
			</a></li>

		<?php } else {

			$category = get_the_category();
			if(!empty($category)) {

				$cat_id = $category[0]->cat_ID;
			}
		?>
			<li><a href="<?php echo home_url(); ?>" title="home"><span>Home</span></a></li>
			<li><a href="<?php echo get_category_link($cat_id);?>"><?php echo $category[0]->cat_name;?></a></li>
			<li><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
			<?php the_title(); ?>
			</a></li>


		<?php } ?>

	<?php } ?>

	<?php if (is_search()) { ?>
		<li><a href="<?php echo home_url(); ?>" title="home"><span>Home</span></a></li>
		<li><a href="<?php echo home_url(); ?>" title="home"><span>home</span></a></li>
	<?php } ?>

	<?php if (is_404()) { ?>
		<li><a href="<?php echo home_url(); ?>" title="home"><span>Home</span></a></li>
		<li><a href="#" title="404 Error page">404 Error</a></li>
	<?php } ?>

	<?php if (is_year()) { ?>
		<li><a href="<?php echo home_url(); ?>" title="home"><span>Home</span></a></li>
		<li><a href="<?php echo home_url(); ?>/archives" title="archives"><span>archives</span></a></li>
		<li><a href="#" title="Year"><?php the_time('Y'); ?></a></li>
	<?php } ?>

	<?php if (is_month()) { ?>
		<li><a href="<?php echo home_url(); ?>" title="home"><span>Home</span></a></li>
		<li><a href="<?php echo home_url(); ?>/archives" title="archives"><span>archives</span></a></li>
		<li><a href="#" title="Month"><?php the_time('F, Y'); ?></a></li>
	<?php } ?>

	<?php if (is_day()) { ?>
		<li><a href="<?php echo home_url(); ?>" title="home"><span>Home</span></a></li>
		<li><a href="<?php echo home_url(); ?>/archives" title="archives"><span>archives</span></a></li>
		<li><a href="#" title="Month"><?php the_time('F jS, Y'); ?></a></li>
	<?php } ?>

		</ol>
	</div>
</div>
