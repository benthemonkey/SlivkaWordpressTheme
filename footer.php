<div id="footer" class="row">
	<div class="col-lg-12">
		<div class="well text-muted" style="padding: 10px;">
			<div class="wordpress-icon pull-left">
				<a href="http://www.wordpress.org/">
					<img src="<?php echo get_template_directory_uri(); ?>/images/wp-icon.png" alt="wp-icon" width="20" height="20" />
				</a>
				<span>
					&nbsp;Copyright <a href="<?php echo home_url();?>" title=" <?php bloginfo('name'); ?>" target="_blank"><?php bloginfo('name'); ?></a>, 2332 Campus Drive, Evanston, IL, 60201
				</span>
			</div>
			<div class="pull-right">
				<a href="#top">Back to Top</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<!--<p class="tagline"><?php bloginfo('description');?></p>-->

</div>
</div>
</div>

<?php wp_footer(); ?>

<?php if(get_page_template_slug() == "points_center.php"){
	include($_SERVER["DOCUMENT_ROOT"] . "/points/footer.html");
}else{ ?>
<script type="text/javascript" src="/points/node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="/points/node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js"></script>
<script type="text/javascript" src="/points/js/iframeHeight.js"></script>
<script>
$(document).ready(function(){
        /*$('.menu-item').each(function(i, el){
                if ($(el).find('.dropdown-menu').length > 0) {
                        var link = $(el).addClass('dropdown').children('a').attr(
                        {
                                href: '#',
                                'data-toggle': 'dropdown'
                        });

                        $('<b class="caret"></b>').appendTo(link);
                }
        });*/

        $('.carousel').carousel('cycle');
})
</script>
<?php }

if(is_home()){ ?>

<!-- Twitter -->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<!-- Facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=140050132852482&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php } ?>

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-15815159-1', 'northwestern.edu');
  ga('send', 'pageview');
</script>
</body>
</html>
