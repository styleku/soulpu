<?php
class SettingsAction extends Action
{
	public function Index()
	{
		$this->display('information');
	}

	public function Edit()
	{
		$this->display('information_edit');
	}

	public function Payment()
	{
		$this->display('payment');
	}

	public function System()
	{
		$User = D('system_settings');
		if ($_POST) {
			
			//$User->save($_POST);
			
			$this->redirect('System');
		} else {
			$data = $User->select();
			foreach ($data as $value)
			{
				$datas[$value['sys_name']] = $value['sys_value'];
			}
			$this->assign('data',$datas);
		}
		
		$this->display('system');
	}
}
?>