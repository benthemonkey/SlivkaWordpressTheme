<?php $wpcx_cxOptions = get_option('cxOptions'); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<!-- Stylesheets for Slivka Directory
<link rel="stylesheet" type="text/css" href="/points/bower_components/datatables/media/css/demo_page.css" />
<link rel="stylesheet" type="text/css" href="/points/bower_components/datatables/media/css/demo_table.css" />
<link rel="stylesheet" type="text/css" href="/points/bower_components/datatables/media/css/jquery.dataTables.css" />
<link rel="stylesheet" type="text/css" href="/points/bower_components/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/points/bower_components/bootstrap/dist/css/bootstrap-theme.min.css" />
<link rel="stylesheet" type="text/css" href="/points/css/pointsCenter.css" />-->
<link rel="stylesheet" type="text/css" href="/points/css/pointsCenter.built.min.css" />


<link rel="shortcut icon" href="/favicon.ico">
<link rel="icon" sizes="16x16 32x32 64x64" href="/favicon.ico">
<link rel="icon" type="image/png" sizes="196x196" href="/favicon-196.png">
<link rel="icon" type="image/png" sizes="160x160" href="/favicon-160.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96.png">
<link rel="icon" type="image/png" sizes="64x64" href="/favicon-64.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16.png">
<link rel="apple-touch-icon" sizes="152x152" href="/favicon-152.png">
<link rel="apple-touch-icon" sizes="144x144" href="/favicon-144.png">
<link rel="apple-touch-icon" sizes="120x120" href="/favicon-120.png">
<link rel="apple-touch-icon" sizes="114x114" href="/favicon-114.png">
<link rel="apple-touch-icon" sizes="76x76" href="/favicon-76.png">
<link rel="apple-touch-icon" sizes="72x72" href="/favicon-72.png">
<link rel="apple-touch-icon" href="/favicon-57.png">
<meta name="msapplication-TileColor" content="#FFFFFF">
<meta name="msapplication-TileImage" content="/favicon-144.png">
<meta name="msapplication-config" content="/browserconfig.xml">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
<style type="text/css">

.breadcrumb p, .panel-heading h2 {
	margin: 0;
}

.social-links-row {
	margin: 5px -15px;
	line-height: 0;
}

/*.social-links a {
	color: #f8f8f8;
}*/

.social-links a:hover {
	text-decoration: none;
}

@media (min-width: 992px) and (max-width: 1200px) {
	.navbar-nav > li > a, .navbar-collapse {
		padding-left: 10px;
		padding-right: 10px;
	}
}

@media (max-width: 768px) {
	.navbar-brand {
		padding-left: 10px;
		padding-right: 10px;
	}
}

@media (min-width: 768px) {
	.navbar-form {
		padding-right: 0;
	}

	.navbar-form > .input-group {
		padding-left: 15px;
	}
}

/* Post Styles */

.post img {
	max-width: 100%;
	height: auto;
}

/* Sidebar Styles */

.widgettitle {
	color: #8a8a8a;
	font-size: 18px;
	font-weight: normal;
	padding: 0;
	margin: 5px 0;
	list-style-type: none;
	display: block;
}

#sidebar {
	padding-left: 0;
	margin-bottom: 0;
}

li.widget{
	list-style-type: none;
}

li.widget ul {
	padding-left: 20px;
}

li.widget ul li {
	list-style-type: none;
}

.posted {
	color:#9d9c9c;
	font-size: 10px;
	font-style: italic;
	display: block;
	padding-left: 10px;
}
</style>
</head>

<body <?php body_class(); ?>>
<div class="container">
	<div class="content">
		<div class="row">
			<div class="col-md-3">
				<?php
				// hard coding this... bad!
				$wpcx_cxOptions["logo_file"] = "1402769900.png";
				if(!empty($wpcx_cxOptions["logo_name"])) {
					$wpcx_logo_name = $wpcx_cxOptions["logo_name"];
				} else {
					$wpcx_logo_name = "<div class='logo_text'>" . wpcx_cut_text(get_bloginfo('name'), 13, "") . "</div>";
				}

				if(!empty($wpcx_cxOptions["logo_file"])) {
					$wpcx_logo_name = '<img src="'.get_template_directory_uri().'/images/logos/'.$wpcx_cxOptions['logo_file'].'" height="84px"/>';
				}
				?>
				<a class="navbar-brand hidden-xs hidden-sm" href="<?php echo home_url();?>"><?php echo $wpcx_logo_name; ?></a>
			</div>
			<div class="col-md-9">
				<div class="row social-links-row">
					<div class="col-md-4 col-md-offset-8 text-right social-links">
						<a href="http://picasaweb.google.com/slivkait" title="picasaweb" target="_blank">
							<i class="icon-picasa-sign fa-2x fa-fw" style="margin-right:6px;"></i>
							<!--<img src="<?php echo get_template_directory_uri();?>/images/icon_picasa.png" width="32" height="32" />-->
						</a>
						<?php
							if(!empty($wpcx_cxOptions["social_facebook"])) {
						?>
						<a href="<?php echo $wpcx_cxOptions["social_facebook"];?>" title="facebook" target="_blank">
							<i class="fa fa-facebook-square fa-2x fa-fw"></i>
							<!--<img src="<?php echo get_template_directory_uri();?>/images/icon_facebook.png" width="32" height="32" />-->
						</a>
						<?php
							}
							if(!empty($wpcx_cxOptions["social_linkedin"])) {
						?>
						<a href="http://www.youtube.com/user/<?php echo $wpcx_cxOptions["social_linkedin"]; ?>" title="youtube" target="_blank">
							<i class="fa fa-youtube-square fa-2x fa-fw"></i>
							<!--<img src="<?php echo get_template_directory_uri();?>/images/icon_youtube.png" width="32" height="32" />-->
						</a>
						<?php
							}
							if(!empty($wpcx_cxOptions["social_twitter"])) {
						?>
						<a href="http://www.twitter.com/#!/<?php echo $wpcx_cxOptions["social_twitter"]; ?>" title="twitter" target="_blank">
							<i class="fa fa-twitter-square fa-2x fa-fw"></i>
							<!--<img src="<?php echo get_template_directory_uri();?>/images/icon_twitter.png" width="32" height="32" />-->
						</a>
						<?php
							}
							if(!empty($wpcx_cxOptions["social_rss"]) && $wpcx_cxOptions["social_rss"] == "yes") {
						?>
						<a href="<?php bloginfo('rss2_url'); ?>" title="rss" target="_blank">
							<i class="fa fa-rss-square fa-2x fa-fw"></i>
							<!--<img src="<?php echo get_template_directory_uri();?>/images/icon_rss.png" width="32" height="32" />-->
						</a>
						<?php
							}
						?>
					</div>
				</div>
				<!--<div class="row">
					<div class="col-lg-12">-->
						<nav class="navbar navbar-default" role="navigation">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar1-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand visible-xs visible-sm" href="<?php echo home_url();?>"><?= get_bloginfo('name') ?></a>
							</div>

							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse navbar1-collapse">
								<ul class="nav navbar-nav">
									<?php wp_nav_menu(array('theme_location' => 'nav_menu', 'container' => false, 'fallback_cb' => 'wpcx_default_menu', 'menu_class' => 'nav', 'walker' => new wp_bootstrap_navwalker())); ?>
								</ul>
								<form class="navbar-form" role="search" id="searchform" method="get" action="/">
									<div class="input-group">
										<input type="search" name="s" id="searchbox" class="form-control" value="" required="required" placeholder="Search">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-default" id="searchbutton"><i class="glyphicon glyphicon-search"></i>&nbsp;</button>
										</span>
									</div>
								</form>
							</div><!-- /.navbar-collapse -->
						</nav>
					<!--</div>
				</div>-->
			</div>
		</div>
