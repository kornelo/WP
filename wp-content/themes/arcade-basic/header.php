<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main>
 * and the left sidebar conditional
 *
 * @since 1.0.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if IE]><script src="<?php echo BAVOTASAN_THEME_URL; ?>/library/js/html5.js"></script><![endif]-->
<?php wp_head(); ?>
</head>
<?php
$bavotasan_theme_options = bavotasan_theme_options();
$space_class = '';
$idstrony = get_the_ID();
?>
<body <?php body_class(); ?>>

	<div id="page">

		<header id="header">
			<nav id="site-navigation" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<h3 class="sr-only"><?php _e( 'Main menu', 'arcade' ); ?></h3>
				<a class="sr-only" href="#primary" title="<?php esc_attr_e( 'Skip to content', 'arcade' ); ?>"><?php _e( 'Skip to content', 'arcade' ); ?></a>

				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				    </button>
				</div>

				<div class="collapse navbar-collapse">
					<?php
					$menu_class = ( is_rtl() ) ? ' navbar-right' : '';
					wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_class' => 'nav navbar-nav' . $menu_class, 'fallback_cb' => 'bavotasan_default_menu', 'depth' => 2 ) );
					?>
			
			
			<!-------- p layer body -->
			
			<?//php if ($idstrony == "8"){ echo '
			?>
			<span style="position: absolute; right: 120px;"><span style="color: white;">Teraz grane:</span>
			<span style="color: #FFFF00;" id="npTitle"></span>
            <audio style="position: relative; top: 10px;" id="audio1" controls="controls" width="300">
                Your browser does not support the HTML5 Audio Tag.
            </audio>
			</span>
			<?//';} ?>
			<!--- end of player body -->
				</div>
			</nav><!-- #site-navigation -->
			
			
			
			
			
			

			 <div class="title-card-wrapper">
                <div class="title-card">
    				<div id="site-meta">
    					<h1 id="site-title">
    						<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="mettet_logo.png" width="250" height="250"></a>
    					</h1>

    					<?php if ( $bavotasan_theme_options['header_icon'] ) { ?>
    					<i class="fa <?php echo $bavotasan_theme_options['header_icon']; ?>"></i>
    					<?php } else {
    						$space_class = ' class="margin-top"';
    					} ?>

    					<h2 id="site-description"<?php echo $space_class; ?>>
    						<?php bloginfo( 'description' ); ?>
    					</h2>

    					<a href="#" id="more-site" class="btn btn-default btn-lg"><?php _e( 'Zobacz więcej', 'arcade' ); ?></a>
    				</div>

    				<?php
    				// Header image section
    				bavotasan_header_images();
    				?>
				</div>
			</div>

		</header>

		<main>
		
		
				<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="/js/libs/jquery-1.8.0.min.js"><\/script>')</script>
		<script type="text/javascript">
			jQuery(function($) {
				var supportsAudio = !!document.createElement('audio').canPlayType;
				var x = Math.floor((Math.random() * 8) + 1);
				if(supportsAudio) {
					var index = x,
					playing = false;
					mediaPath = '/wpmettet/media/audio/',
					extension = '',
					tracks = [
						{"track":1,"name":"Alarm","length":"03:36","file":"met_tet_alarm"},
						{"track":2,"name":"PSY!","length":"04:05","file":"met_tet_psy"},
						{"track":3,"name":"Ja to My","length":"04:46","file":"met_tet_ja_to_my"},
						{"track":4,"name":"Kanibale","length":"05:38","file":"met_tet_kanibale"},
						{"track":5,"name":"Alarm","length":"03:36","file":"met_tet_alarm"},
						{"track":6,"name":"PSY!","length":"04:05","file":"met_tet_psy"},
						{"track":7,"name":"Ja to My","length":"04:46","file":"met_tet_ja_to_my"},
						{"track":8,"name":"Kanibale","length":"05:38","file":"met_tet_kanibale"}
					],
					trackCount = tracks.length,
					npAction = $('#npAction'),
					npTitle = $('#npTitle'),
					audio = $('#audio1').bind('play', function() {
						playing = true;
						npAction.text('Now Playing:');
					}).bind('pause', function() {
						playing = false;
						npAction.text('Paused:');
					}).bind('ended', function() {
						npAction.text('Paused:');
						if((index + 1) < trackCount) {
							index++;
							loadTrack(index);
							audio.play();
						} else {
							audio.pause();
							index = 0;
							loadTrack(index);
						}
					}).get(0),
					btnPrev = $('#btnPrev').click(function() {
						if((index - 1) > -1) {
							index--;
							loadTrack(index);
							if(playing) {
								audio.play();
							}
						} else {
							audio.pause();
							index = 0;
							loadTrack(index);
						}
					}),
					btnNext = $('#btnNext').click(function() {
						if((index + 1) < trackCount) {
							index++;
							loadTrack(index);
							if(playing) {
								audio.play();
							}
						} else {
							audio.pause();
							index = 0;
							loadTrack(index);
						}
					}),
					li = $('#plUL li').click(function() {
						var id = parseInt($(this).index());
						if(id !== index) {
							playTrack(id);
						}
					}),
					loadTrack = function(id) {
						$('.plSel').removeClass('plSel');
						$('#plUL li:eq(' + id + ')').addClass('plSel');
						npTitle.text(tracks[id].name);
						index = id;
						audio.src = mediaPath + tracks[id].file + extension;
					},
					playTrack = function(id) {
						loadTrack(id);
						audio.play();
					};
					
					extension = audio.canPlayType('audio/mpeg') ? '.mp3' : audio.canPlayType('audio/ogg') ? '.ogg' : '';

					loadTrack(index);
				}

				$('#useLegend').click(function(e) {
					e.preventDefault();
					$('#use').slideToggle(300, function() {
						$('#useSpanSpan').text(($('#use').css('display') == 'none' ? 'show' : 'hide'));
					});
				});
			});
		</script>