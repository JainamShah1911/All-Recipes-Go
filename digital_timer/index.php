<!DOCTYPE html>
<html class="alarm-mode">
<head lang="en">
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<title>Material Design Digital Timer</title>

    <link type="text/css" rel="stylesheet" href="assets/materialize/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/styles.css">
	<link type="text/css" rel="stylesheet" href="assets/jonthornton-jquery-timepicker/jquery.timepicker.css">

</head>
<body>

<div class="wrapper">

	<header class="switch-clocks z-depth-1">
		<a class="timer waves-effect">Allrecipes Digtal Timer</a>
	</header>

	<div class="app">

		<div class="container timer hidden">
			<form>
				<div class="control input-field">
				<?php
				$timer_value = $_GET["time"];
				echo '
					<input id="timer-input" type="number" value="'.$timer_value.'">
					<label for="timer-input" style="left: 1.75rem;">Minutes</label>
				</div>

				<a class="timer-btn start waves-effect"><i class="mdi-av-play-arrow"></i></a>
				<a class="timer-btn pause waves-effect"><i class="mdi-av-pause"></i></a>
				<a class="timer-btn reset waves-effect"><i class="mdi-av-replay"></i></a>

			</form>

			<div class="clock z-depth-1 waves-effect">'.$timer_value.'</div>
			
			';
			?>
		</div>


	</div>

	<div id="times-up-modal" class="modal">
		<div class="modal-content">
			<h3>Time's Up!</h3>
		</div>
		<div class="modal-footer">
			<a href="#!" class="dismiss-alarm-sounds modal-action waves-effect waves-red btn-flat">Dismiss Alarm</a>
		</div>
	</div>

</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="assets/materialize/js/materialize.min.js"></script>
<script src="assets/jonthornton-jquery-timepicker/jquery.timepicker.min.js"></script>
<script src="assets/js/hammer.js"></script>
<script src="assets/js/timer.js"></script>

</body>
</html>
