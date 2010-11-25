<?php
class FileManagerAction extends Action
{
	public function Index()
	{
		$dir = $this->Directory("/usr/local/apache/htdocs/soulpu/images/");
		//print_r($dir);
		$this->assign('data',$dir);
		$this->display('directory');
	}

	public function AddFile()
	{
		$this->display('addfile');
	}

	public function ViewFile()
	{
		$get = $_GET['Dir'];
		$handle = opendir('/usr/local/apache/htdocs/soulpu/images/'.$get);
		while (($file = readdir($handle)) !== false)
		{
			if ($file == "." || $file == "..") continue;
			$files[] = $file;
		}
		closedir($handle);
		$count = count($files);
		for ($i=0;$i<$count;$i++)
		{
			$file_list[$i]['name'] = $files[$i];
			$file_list[$i]['size'] = number_format(filesize("/usr/local/apache/htdocs/soulpu/images/$get/".$files[$i])/1024,2).".kb";
		}
		//print_r($file_list);
		$this->assign('count',$count);
		$this->assign('data',$file_list);
		$this->display('viewfile');
	}

	public function Directory($dir,$show)
	{
		if (is_dir($dir) && $handle = opendir($dir)) {
			while (false !== ($file = readdir($handle))) {
				if ($file == "." || $file == "..") {
					continue;
				}
				if (is_dir($dir.$file."/")) {
					$directory[] = $file;
					//$this->Directory($dir.$file.'/');
				}
			}
			closedir($handle);
		}
		return $directory;
	}
	/*
	function Directory($dir) {
		//$space="";
		if(is_dir($dir) && $handle = opendir($dir)){
			//$space .= "&nbsp;&nbsp;&nbsp;&nbsp;";
			while(false!== ($file = readdir($handle))){
				if($file=="." || $file=="..") continue;
				if(is_dir($dir.$file.'/')){
					echo $file;
					$this->Directory($dir.$file.'/');
				}else
				echo "======|-$file<br>";
			}
			closedir($handle);
		}else{
			echo "This have a error!";
		}
	}
	*/
}
?>