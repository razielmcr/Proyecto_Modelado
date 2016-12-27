<?php
	$link = $_GET['video'];
	$linkEmb =  str_replace("watch?v=","embed/",$link);
	echo "<iframe width=\"420\" height=\"315\" src=$linkEmb> </iframe>";
?>