<?php
function how_many_frames(){
	for($a=1;$a<9999;$a++){			
		$input = "../temp/frame_temp/frame".$a.".jpg";        			
       	if(file_exists($input)==FALSE){
           	return $a;            	        
       	}
   	}
}
?>