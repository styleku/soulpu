<?php
class FileManagerAction extends Action
{
	public function Index()
	{
		$this->display('directory');
	}
	
	public function AddFile()
	{
		$this->display('addfile');
	}
	
	public function ViewFile()
	{
		$this->display('viewfile');
	}
}
?>