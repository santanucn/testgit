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

upload();
function upload(){

	$data = array();
	$uploads_dir = '/uploads';
	$name = $_FILES["user_upload"]["name"];
	$data['size'] = getimagesize($name);	
    $data['ext'] = pathinfo($name, PATHINFO_EXTENSION);
    if(isset($_POST["submit"])) {
		if(validate($data)){
					
	        $tmp_name = $_FILES["user_upload"]["tmp_name"];
	        move_uploaded_file($tmp_name, "$uploads_dir/$name");		    
		}
	}
}
?>