<?php

function validate($info){
	
	$fileallowed = array('jpg','png');
	$size = 500;
	if (!in_array($info['ext'], $fileallowed)) {
    	return false;
	}

	if($info['size'] > $size){
		return false;
	}

	return true;
}

?>