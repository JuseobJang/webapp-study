<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>

		<!-- Ex 1: Number of Songs (Variables) -->
		<p>
			<?php $song_count=5678;?>
			I love music.
			I have <?= $song_count?> total songs,
			which is over <?= (int)($song_count/10)?> hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>
			<?php $page=5;
			if(isset($_GET["page"])){
				$page= $_GET["page"];
			}?>
			<ol>
				<?php for($i =0, $j=11 ; $i<$page ; $i++,$j--){
					if($j>=10){print "<li><a href='https://www.billboard.com/archive/article/2019".$j."'>2019-".$j."</a></li>";}
					else{print "<li><a href='https://www.billboard.com/archive/article/20190".$j."'>2019-0".$j."</a></li>";}
				}?>
			</ol>
		</div>

		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>

			<ol>
				<?php
					// Ex 4: Favorite Artists (Arrays)
					// $artists = array("Guns N","Green Day","Blink182","Queen");
					// foreach ($artists as $artist) {
					// 	print "<li>".$artist."</li>";
					// }
					//Ex 5: Favorite Artists from a File (Files)
					$artists = file('favorite.txt');
					foreach ($artists as $artist) {
						$under = str_replace(' ','_',$artist);
						$under = str_replace("'",'%27',$under);
						print "<li><a href='http://en.wikipedia.org/wiki/".$under
						."'>".$artist."</a></li>";
					}

				?>
				<!-- <li>Guns N' Roses</li>
				<li>Green Day</li>
				<li>Blink182</li> -->
			</ol>
		</div>

		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<?php
					$music = glob('lab5/musicPHP/songs/*.mp3');
					foreach ($music as $musicname) {
						$musicaddress = $musicname;
						$musicname = basename($musicname);
						$musicsize = (int)(filesize($musicaddress)/1024);
						print "<li class='mp3item'><a href='".$musicaddress."'>".$musicname."</a> (".$musicsize. "KB)</li>";					}
				?>

				<!-- <li class="mp3item">
					<a href="lab5/musicPHP/songs/paradise-city.mp3">paradise-city.mp3</a>
				</li>

				<li class="mp3item">
					<a href="lab5/musicPHP/songs/basket-case.mp3">basket-case.mp3</a>
				</li>

				<li class="mp3item">
					<a href="lab5/musicPHP/songs/all-the-small-things.mp3">all-the-small-things.mp3</a>
				</li> -->

				<!-- Exercise 8: Playlists (Files) -->
				<!-- <li class="playlistitem">
					326-13f-mix.m3u:
					<ul>
						<li>Basket Case.mp3</li>
						<li>All the Small Things.mp3</li>
						<li>Just the Way You Are.mp3</li>
						<li>Pradise City.mp3</li>
						<li>Dreams.mp3</li>
					</ul> -->
				<?php
					$m3ulists = glob('lab5/musicPHP/songs/*.m3u');
					rsort($m3ulists);
					foreach($m3ulists as $m3ulist){
						print "<li class='playlistitem'>".basename($m3ulist);
						print "<ul>";
						$m3ufile = file($m3ulist);
						shuffle($m3ufile);
						foreach($m3ufile as $m3u){
							if(strpos($m3u, "#") === false){
								print "<li>".$m3u."</li>";
							}

						}
						print "</ul>";
						print "</li>";
					}

				?>

			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>

	</body>
</html>
