<?php
/*
	[Office 515158] (C) 2009-2012 天生创想 Inc.
	$Id: word.class.php 1209087 2012-01-08 08:58:28Z baiwei.jiang $
*/
!defined('IN_TOA') && exit('Access Denied!');
class word{ 
	function start(){
		ob_start();
		print'<html xmlns:o="urn:schemas-microsoft-com:office:office"
		xmlns:w="urn:schemas-microsoft-com:office:word"
		xmlns="http://www.w3.org/TR/REC-html40">';
	}
	function save($path){
		print "</html>";
		$data = ob_get_contents();
		ob_end_clean();
		$this->wirtefile ($path,$data);
	}
	function wirtefile ($fn,$data){
		$fp=fopen($fn,"wb");
		fwrite($fp,$data);
		fclose($fp);
	}
}
?>