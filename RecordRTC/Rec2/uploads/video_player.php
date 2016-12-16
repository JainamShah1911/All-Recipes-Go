<?php
$file_name = $_GET["video"];

echo '<video width="100%" controls>
  <source src="'.$file_name.'.webm" type="video/webm">
  <source src="'.$file_name.'.ogg" type="video/ogg">
  Your browser does not support HTML5 video.
</video>';
?>