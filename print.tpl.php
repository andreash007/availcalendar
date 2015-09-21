<?php

/**
 * @file
 * Default print module template
 *
 * @ingroup print
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $print['language']; ?>" xml:lang="<?php print $print['language']; ?>">
  <head>
    <?php print $print['head']; ?>
    <?php print $print['base_href']; ?>
    <title><?php print $print['title']; ?></title>
    <?php print $print['scripts']; ?>
    <?php print $print['sendtoprinter']; ?>
    <?php print $print['robots_meta']; ?>
    <?php print $print['favicon']; ?>
    <?php print $print['css']; ?>
  <!--[if lte IE 7]>
    <link href="/sites/all/themes/touch/ie7.css" rel="stylesheet" type="text/css" media="screen" />
  <![endif]--> 
 
  </head>

  <?php 
	if(isset($_GET['mode'])) {
		$mode = ($_GET['mode']);
	};
  ?> 
  
  <body class="<?php if(isset($_GET['mode'])) {print "mode-$mode ";};?>print-page">

    <div class="print-content">
		<?php print $print['content']; ?>
					
	</div>

    <div class="print-source_url"><?php print $print['source_url']; ?></div>
    <div class="print-links"><?php print $print['pfp_links']; ?></div>
    <?php print $print['footer_scripts']; ?>
		
	<?php 
	if(!isset($_GET['mode'])) {
	?>
		<script>
		jQuery(document).ready(function($) {
			function CalendarVievport() {
				var CountClick = 0;
				var MaxCount = 3;
				var Scroll = 2;
				var MonthHeight = 219;
				var Top = 0;
				var width = $(window).width();
				ScrollHeight = MonthHeight * Scroll;
				
				// Set MaxCount
				if (width < 380) {
					MaxCount = 11;
					Scroll = 2;
					$(".cal-viewport").css("width", "210px");
				}
				else if (width < 480) {
					MaxCount = 5;
					Scroll = 2;
					$(".cal-viewport").css("width", "418px");
				}
				else if (width > 680) {
					MaxCount = 3;
					Scroll = 2;
					$(".cal-viewport").css("width", "626px");
				}
				// Max Forward Click
				$('.cal-buttons a.cal-forward').click(function () {
					CountClick += 1;
					Top = Top + ScrollHeight;
					$(".cal-viewport-inner").animate({top: "-" + Top}, 500);
			
					if (CountClick < MaxCount) {
						$(this).removeAttr( "disabled" );
					}
					else {
						$(this).attr( "disabled", "disabled" );
					}
				});
				
				// Max Backward Click
				$('.cal-buttons a.cal-backward').click(function () {
					if (CountClick > 0) {
						CountClick -= 1;
						Top = Top - ScrollHeight;
						$(".cal-viewport-inner").animate({top: "-" + Top}, 500);
						
						$(this).removeAttr( "disabled" );
						
						if (CountClick == 0) {
							$(this).attr( "disabled", "disabled" );			
						}
					}
				});
			}
			CalendarVievport();
			$(window).resize( CalendarVievport );
		});
		</script>
	<?php 
	}
	?>
  </body>
</html>
