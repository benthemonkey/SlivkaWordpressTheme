<?php
/*
Template Name: Slivka Points Center
*/
get_header();
get_template_part('scripts/breadcrumb');
?>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2><?php the_title();?></h2>
			</div>
			<div class="panel-body">
				<?php
					$page = explode("/", $_SERVER["REQUEST_URI"]);

					include($_SERVER['DOCUMENT_ROOT'] . "/points/spc-" . $page[2] . ".php");
				?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
