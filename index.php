<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<?php 
			include("./include/head.html"); 
		?>
	</head>

	<body>
		<div class="container-fluid height100 nopadding">
			<div class="row height100 nopadding">
				<div id="allpage" class="nopadding height100">
					<div class="col-md-2 col-sm-3 col-xs-12 height100desk nopadding" id="sidebar">
						<?php
							include("./include/sidebar.html");
						?>
					</div>
					<div class="col-md-10 col-sm-9 col-xs-12 height100 nopadding" id="main">
						<?php
							include("./include/main.html");
						?>
					</div>
				</div>
				<noscript>
				<div class="col-md-12 nopadding" id="noscriptalert">
					<p>Mon portfolio est conçu pour fonctionner de façon optimale avec Javascript activé</p>
				</div>
				</noscript>
				<div class="col-md-12 col-sm-12 col-xs-12 nopadding" id="popups">
					<?php
						include("./include/popups.html");
					?>
				</div>
			</div>
		</div>

	<!-- Jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="scripts/jquery.lazyload.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<!-- js -->
		<!-- <script src="scripts/particles.min.js"></script> -->
		<script src="scripts/script.min.js"></script>

	<!-- Analytics -->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
					(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-58943873-2', 'auto');
			ga('send', 'pageview');
		</script>
	</body>
</html>