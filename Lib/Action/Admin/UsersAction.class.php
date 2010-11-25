<?php
class UsersAction extends Action
{
	public function Index()
	{
		$User = D('admin');
		$data = $User->select();
		$this->assign('data',$data);
		$this->display('userlist');
	}
	
	public function CreateAdmin()
	{
		if ($_POST) {
			$User = D('admin');
			$User->admin_name = $_POST['username'];
			$User->admin_password = md5($_POST['admin_password']);
			$User->admin_email = $_POST['email'];
			$User->access_permissions = serialize($_POST['permissions']);
			
			$User->add();
			$this->redirect('/');
		} else {
			$User = D('permissions');
			$permissions = $User->select();
			$this->assign('permissions',$permissions);
			$this->display('createadmin');
		}
	}
	
	public function EditAdmin()
	{
		if ($_POST) {
			$User = D('admin');
			$User->admin_id = $_POST['admin_id'];
			$User->admin_name = $_POST['username'];
			$User->admin_email = $_POST['email'];
			if ($_POST['password'] != '') {
				$User->admin_password = md5($_POST['password']);
			}
			$User->access_permissions = serialize($_POST['permissions']);
			$User->save();
			$this->redirect('/');
		} else {
			$admin = D('admin');
			$admin_info = $admin->where("admin_id = $_GET[id]")->find();
			$admin_permission = unserialize($admin_info['access_permissions']);
			
			$User = D('permissions');
			$permissions = $User->select();
			for ($i=0;$i<count($permissions);$i++)
			{
				$per_list[$i] = $permissions[$i];
				if (in_array($permissions[$i]['per_value'],$admin_permission)) {
					$per_list[$i]['check'] = 1;
				}
			}
			$this->assign('permissions',$per_list);
			$this->assign('data',$admin_info);
			$this->display('editadmin');
		}
	}
	
	public function Permissions()
	{
		if ($_POST) {
			
		}
		$User = D('permissions');
		$data = $User->select();
		$this->assign('data',$data);
		$this->display('permissions');
	}
	
	public function CreatePermissions()
	{
		if ($_POST) {
			$User = D('permissions');
			$User->per_name = $_POST['per_name'];
			$User->per_value = $_POST['per_value'];
			$User->add();
			$this->redirect('Permissions');
		} else {
			$this->display('createpermission');
		}
	}
	
	public function EditPermission()
	{
		$id = $_GET['id'];
		$name = $_POST['name'];
		$value = $_POST['value'];
		
		$User = M('permissions');
		//$data = serialize($_POST);
		//$data = '123';
		//$datas['per_name'] = $data;
		//$User->add($datas);
		
		$User->per_id = $id;
		$User->$name = $value;
		
		$User->save();
		
	}
}
?>