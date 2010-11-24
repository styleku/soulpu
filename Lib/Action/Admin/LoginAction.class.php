<?php
class LoginAction extends Action
{
	public function Index()
	{
		if ($_POST)
		{
			Load('extend');
			$Username = remove_xss($_POST['username']);
			$Password = md5(remove_xss($_POST['password']));
			if ($Username != '' and $Password != '') {
				$User = D('admin');
				$data = $User->where("admin_name = '$Username' and admin_password = '$Password'")->count();
				if ($data == 1) {
					Session::set('admin_name',$Username);
					Session::set('admin_login',true);
					$this->redirect('./');
				} else {
					$this->error(L('ADMIN_LOGIN_ERROR'));
				}
			} else {
				$this->error(L('ADMIN_LOGIN_ERROR'));
			}
		} else {
			$this->display('index');
		}
	}
}
?>