<?php
class IndexAction extends Action
{
	public function Index()
	{
		if (Session::get('admin_login') == false) {
			$this->redirect("./Login");
		}
		$this->display('index');
	}
	
	public function Viewall()
	{
		$this->display('viewall');
	}
}
?>