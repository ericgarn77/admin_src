<?php
	$h = getallheaders();
    $source = file_get_contents('php://input');
    file_put_contents('./img/'.$h['x-file-name'], $source);
?>