<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en-us"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en-us"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en-us"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en-us"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>HTML5 Audio Playlist Example</title>
		<meta name="description" content="A working example of an html5 audio playlist. This has been tested in Internet Explorer - IE9, Firefox, Safari, and Google Chrome.">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="html5_audio_playlist_example.css" />
		<script src="/js/libs/modernizr-2.6.2.min.js"></script>
	</head>
	<body>
		<div id="container">
			<header>
				<h1>HTML5 Audio Playlist Example</h1>
				<div class="double">Return to - <a href="/how_to/create_a_playlist_for_html5_audio">How To: Create A Playlist For HTML5 Audio</a></div>
				<div class="double is-audio">
					This is a working example of an html5 audio playlist. It has been tested in Internet Explorer - IE9, Firefox, Safari, and Google Chrome.<br/>
					<br>
					<div id="useLegend">Instructions: <span id="useSpan">(click to <span id="useSpanSpan">show</span>)</span></div>
					<div id="use">
						<ul>
							<li>Click on the play button of the audio control to start playing the currently selected track.</li>
							<li>Click on either the <span class="simBtn">&nbsp;|&lt;&lt; Prev Track&nbsp;</span> or <span class="simBtn">&nbsp;Next Track &gt;&gt;|&nbsp;</span> button to select the previous or next track.</li>
							<li>If no other controls are clicked, tracks will be played one at a time in the order shown in the playlist.</li>
						</ul>
						<p class="plus10">&nbsp;- or - </p>
						<ul>
							<li>Click on a track in the playlist, except the currently selected track, to begin playing the track.</li>
							<li>Play will continue through the remaining tracks of the playlist if no other controls are clicked.</li>
						</ul>
					</div>
				</div>
			</header>
			<div id="content" role="main">
				<div id="cwrap">
					<div id="nowPlay" class="is-audio">
						<h3 id="npAction">Paused:</h3>
						<div id="npTitle"></div>
					</div>
					<div id="audiowrap">
						<div id="audio0">
							<audio id="audio1" controls="controls">
								Your browser does not support the HTML5 Audio Tag.
							</audio>
						</div>
						<noscript>Your browser does not support JavaScript or JavaScript has been disabled. You will need to enable JavaScript for this page.</noscript>
						<div id="extraControls" class="is-audio">
							<button id="btnPrev" class="ctrlbtn">|&lt;&lt; Prev Track</button> <button id="btnNext" class="ctrlbtn">Next Track &gt;&gt;|</button>
						</div>
					</div>
					<div id="plwrap" class="is-audio">
						<div class="plHead">
							<div class="plHeadNum">#</div>
							<div class="plHeadTitle">Title</div>
							<div class="plHeadLength">Length</div>
						</div>
						<div class="clear"></div>
						<ul id="plUL">
							<li class="plItem">
								<div class="plNum">1</div>
								<div class="plTitle">Happy Birthday Variation: In the style of Beethoven</div>
								<div class="plLength">0:55</div>
							</li>
							<li class="plItem">
								<div class="plNum">2</div>
								<div class="plTitle">Wedding March Variation 1</div>
								<div class="plLength">0:37</div>
							</li>
							<li class="plItem">
								<div class="plNum">3</div>
								<div class="plTitle">Happy Birthday Variation: In the style of Tango</div>
								<div class="plLength">1:05</div>
							</li>
							<li class="plItem">
								<div class="plNum">4</div>
								<div class="plTitle">Wedding March Variation 2</div>
								<div class="plLength">0:40</div>
							</li>
							<li class="plItem">
								<div class="plNum">5</div>
								<div class="plTitle">Random Classical</div>
								<div class="plLength">0:59</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<footer>&copy; 2015 jonhall.info, all rights reserved.</footer>
		</div>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="/js/libs/jquery-1.8.0.min.js"><\/script>')</script>
		<script type="text/javascript">
			jQuery(function($) {
				var supportsAudio = !!document.createElement('audio').canPlayType;
				if(supportsAudio) {
					var index = 0,
					playing = false;
					mediaPath = '/wpmettet/media/audio/',
					extension = '',
					tracks = [
						{"track":1,"name":"Alarm","length":"03:36","file":"met_tet_alarm"}
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
	</body>
</html>