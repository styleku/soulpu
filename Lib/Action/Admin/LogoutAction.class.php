<?php
class LogoutAction extends Action
{
	public function Index()
	{
		Session::clear();
		$this->redirect('./Login');
	}
}
?>