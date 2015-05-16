<?php
error_reporting(E_ALL);
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
	$uploads_dir = './uploads';
	$name = $_FILES['USER_upload']['name'];
	
	$taget_file = $uploads_dir."/".$name;
	
	$byte_size = $_FILES['USER_upload']['size']/1000;
	$data['size'] = (int)$byte_size;
	
	$explode = explode('.', $name);
    $data['ext'] = $extension = end($explode);
    
    if(isset($_POST['upload'])) {
    	
		if(validate($data)){
					
	        $tmp_name = $_FILES["USER_upload"]["tmp_name"];
	        move_uploaded_file($tmp_name, $taget_file);
			echo 'success!!';		    
		}else{
			echo "failed!!";
		}
	}
}
?>