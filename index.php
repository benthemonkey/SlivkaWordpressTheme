<?php get_header(); ?>
<style>
#myCarousel {
	border-radius: 4px;
	margin-bottom: 15px;
}

.carousel-inner, .item {
	height: 450px;
	border-radius: 4px;
}

/*.carousel img {
	position: absolute;
	top: 0;
	left: 0;
	min-height: 400px;
}*/

.item {
	background-size: cover;
	background-position: 50%;
}

.carousel-caption {
	background: rgba(0,0,0,0.8);
	/*border-radius: 4px;*/
	bottom: 0;
	left: 0;
	right: 0;
	height: auto;
	padding: 0 10px 20px;
}

.carousel-caption h3 {
	margin-top: 0;
}

.carousel-caption h3 a {
	color: white;
	text-decoration: underline;
}

.carousel-caption .btn {
	margin-bottom: 10px;
}

.carousel-control {
	opacity: 1;
}

.carousel-control.left {
	border-top-left-radius: 4px;
	border-bottom-left-radius: 4px;
}

.carousel-control.right {
	border-top-right-radius: 4px;
	border-bottom-right-radius: 4px;
}

.carousel-indicators {
	bottom: 0;
}

.panel-body {
	height: 420px;
}

.panel-body ul {
	padding-left: 20px;
}

@media (min-width: 992px) {
	.quick-links-panel-body {
		height: 410px;
	}
}

@media (max-width: 768px) {
	.carousel-inner, .item {
		height: 350px;
	}

	.quick-links-panel-body {
		height: auto;
	}
}

.fb-like-box,
.fb_iframe_widget span,
.fb_iframe_widget iframe {
		width:100% !important;
}
</style>
<div class="row">
	<?php
	global $post;

	if(!empty($wpcx_cxOptions["slide_max"])) {
		$wpcx_slide_max = $wpcx_cxOptions["slide_max"];
	} else {
		$wpcx_slide_max = 0;
	}

	if(!empty($wpcx_cxOptions["slide_sort"])) {
		$wpcx_slide_sort = $wpcx_cxOptions["slide_sort"];
	} else {
		$wpcx_slide_sort = "date";
	}

	if(!empty($wpcx_cxOptions["slide_order"])) {
		$wpcx_slide_order = $wpcx_cxOptions["slide_order"];
	} else {
		$wpcx_slide_order = "DESC";
	}

	if(!empty($wpcx_cxOptions["slide_show"])) {
		$wpcx_slide_show = $wpcx_cxOptions["slide_show"];
	} else {
		$wpcx_slide_show = "yes";
	}

	if(!empty($wpcx_cxOptions["slide_duration"])) {
		$wpcx_slide_duration = $wpcx_cxOptions["slide_duration"];
	} else {
		$wpcx_slide_duration = 5000;
	}

	if($wpcx_slide_show != "no") {
		$wpcx_args = array( 'meta_key' => 'feat_slideshow', 'meta_value'=> '1', 'suppress_filters' => 0, 'post_type' => array('post', 'page'), 'post_status' => 'publish', 'numberposts' => $wpcx_slide_max, 'orderby' => $wpcx_slide_sort, 'order' => $wpcx_slide_order);
		$wpcx_myposts = get_posts($wpcx_args);
		if(!$wpcx_myposts) {
			$wpcx_args = array('suppress_filters' => 0, 'post_type' => array('post', 'page'), 'post_status' => 'publish', 'numberposts' => $wpcx_slide_max, 'orderby' => $wpcx_slide_sort, 'order' => $wpcx_slide_order);
			$wpcx_myposts = get_posts($wpcx_args);
		}

		#sticky first article
		$wpcx_args = array('page_id' => 1544, 'post_type' => array('post', 'page'), 'post_status' => 'publish');

		$so_you_want_to_be_a_slivkan = get_posts($wpcx_args);

		if($so_you_want_to_be_a_slivkan){
			array_unshift($wpcx_myposts, $so_you_want_to_be_a_slivkan[0]);
		}

		if($wpcx_myposts) {
			$i = 0;
			$thumbHTML = '';
	?>
	<div class="col-lg-9 col-md-8">
		<div id="myCarousel" class="carousel slide" data-interval="<?= $wpcx_slide_duration ?>">
			<ol class="carousel-indicators">
				<?php foreach( $wpcx_myposts as $post ) :	setup_postdata($post); ?>
				<li data-target="#myCarousel" data-slide-to="<?=$i?>" <?= $i == 0 ? 'class="active"' : '' ?>></li>
				<?php $i++; endforeach; ?>
			</ol>
			<div class="carousel-inner">
				<?php
				$i = 0;
				foreach( $wpcx_myposts as $post ) :	setup_postdata($post);

					$wpcx_slideshow_title = get_the_title();

					// $wpcx_slideshow_text = explode(".", get_the_excerpt());/*wpcx_cut_text(get_the_excerpt(), 290);*/
					// if(count($wpcx_slideshow_text) > 1){
					// 	$wpcx_slideshow_text = $wpcx_slideshow_text[0] . ".";
					// }else{
					// 	$wpcx_slideshow_text = $wpcx_slideshow_text[0];
					// }

					$wpcx_thumb_big = wpcx_get_wp_generated_thumb(array(1024, 576));

					if(empty($wpcx_thumb_big)){
						$wpcx_thumb_big = get_template_directory_uri()."/images/default_slideshow.jpg";
					}

					// $wpcx_thumb_small = wpcx_get_wp_generated_thumb("slideshow_thumb");

					// if(empty($wpcx_thumb_small)){
					// 	$wpcx_thumb_small = get_template_directory_uri()."/images/default_slideshow_small.jpg";
					// }

					// $thumbHTML .= '
					// 	<li><a href="#myCarousel" data-slide-to="'.$i.'" class="slider-thumb">
					// 		<img src="'.$wpcx_thumb_small.'" alt="'.$wpcx_slideshow_title.'" class="img-responsive">
					// 	</a></li>';
				?>
				<div class="item <?= $i == 0 ? "active" : "" ?>" style="background-image: url(<?= $wpcx_thumb_big;?>);">
					<!--img src="<?= $wpcx_thumb_big;?>"-->
					<div class="container">
						<div class="carousel-caption">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<!--<span class="date">Published <?php the_time('F j, Y'); ?>
								 - <?php comments_number('No Comments','One Comment','% Comments'); ?>
							</span>-->
							<p><?= get_the_excerpt();//$wpcx_slideshow_text; ?></p>
							<!-- a class="btn btn-sm btn-default pull-right" href="<?php the_permalink();?>">Read more</a -->
						</div>
					</div>
				</div>
				<?php $i++; endforeach; ?>
			</div>
			<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
		<!-- <div class="col-md-12 hidden-sm hidden-xs" id="slider-thumbs">
			<ul class="list-inline">
				<?= $thumbHTML; ?>
			</ul>
		</div>-->
	</div>
	<?php
		}
	}
	?>
	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Quick Links</h3>
			</div>
			<div class="panel-body quick-links-panel-body">
				<ul>
					<li><a href="http://bit.ly/NURSmr" target="_blank">Maintenance Request</a></li>
					<li><a href="http://courses.northwestern.edu" target="_blank">Blackboard</a></li>
					<li><a href="http://northwestern.edu/caesar" target="_blank">Caesar</a></li>
					<li><a href="http://laundryview.com/laundry_room.php?lr=2025744" target="_blank">LaundryView</a></li>
					<li><a href="http://u.northwestern.edu" target="_blank">@u.northwestern.edu</a></li>
				</ul>
				<div>Other Links</div>
				<ul>
					<li><a href="http://www.wildcats.northwestern.edu/rcb/" target="_blank">Residential College Board</a></li>
					<li><a href="http://www.northwestern.edu/residentialcolleges/" target="_blank">Office of Residential Colleges</a></li>
					<li><a href="http://asg.northwestern.edu/wp" target="_blank">Associated Student Government</a></li>
					<li><a href="http://www.it.northwestern.edu" target="_blank">NUIT</a></li>
					<li><a href="http://www.northwestern.edu" target="_blank">Northwestern University</a></li>
					<li><a href="http://www.northwestern.edu/residentialcolleges" target="_blank">Office of Residential Academic Initiatives</a></li> 
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-4 col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Twitter</h3>
			</div>
			<div class="panel-body">
				<a class="twitter-timeline" href="https://twitter.com/SlivkaRC" data-widget-id="318901532642910208">Tweets by @SlivkaRC</a>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Upcoming Events</h3>
			</div>
			<div class="panel-body">
				<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=390&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=slivkait%40gmail.com&amp;color=%23060D5E&amp;ctz=America%2FChicago" style="border-width:0;" width="100%" height="390" frameborder="0" scrolling="no"></iframe>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Facebook</h3>
			</div>
			<div class="panel-body">
				<div class="fb-like-box" data-href="https://www.facebook.com/SlivkaRC" data-height="390" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
				<div style="position: absolute; bottom: 18px; right: 17px;" "><a href="http://slivka.northwestern.edu/whats-with-all-the-gnomes"><img width="24px" height="62.25px" src="http://slivka.northwestern.edu/wordpress/wp-content/uploads/2015/04/gnome.png"></img></a></div>
			</div>
		</div>
	</div>
</div>

<div style="position: absolute; bottom: 100px; right:10px"><a href="http://slivka.northwestern.edu/wordpress/wp-content/uploads/2015/04/octopusgif.gif">!!</a></div>

<?php get_footer(); ?>
