<?php
$ffmpegpath = 'ffmpeg.exe';
	function extract_frames($input, $output){
		$acum = 0;
		global $ffmpegpath;
		if(!file_exists($input)) return false;
		$command = "ffmpeg -i $input -r 1 ../temp/frame_temp/frame%d.jpg";
		@exec( $command, $ret );		
		if(!file_exists($output)) return false;
		if(filesize($output)==0) return false;
		return true;
	}	
?>