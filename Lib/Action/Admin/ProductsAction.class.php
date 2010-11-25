<?php
class ProductsAction extends Action
{
	public function Index()
	{
		$this->display('product_list');
	}
	
	public function AddProduct()
	{
		//$categories = new CategorieModel();
		//$catres = $categories->Categorie();
		//print_r($catres);
		$User = D('categories');
		$data = $User->where("cat_is_show = 1")->select();
		$list = new TreeModel();
		foreach ($data as $value) {
			$list->setNode($value['cat_id'], $value['cat_pid'], $value['cat_name'], $value['cat_value'],$value['cat_sort']);
		}
		$getdata = $list->getChilds();
		foreach ($getdata as $key => $id)
		{
			$cat_data[] = $list->getList($id);
		}
		//print_r($cat_data);
		$this->assign('cat_list',$cat_data);
		$this->display('add_product');
	}
	
	public function Categories()
	{
		$User = D('categories');
		$data = $User->where("cat_is_show = 1")->select();
		
		$list = new TreeModel();
		//print_r($data);
		foreach ($data as $value) {
			$list->setNode($value['cat_id'], $value['cat_pid'], $value['cat_name'], $value['cat_value'],$value['cat_sort']);
		}
		$getdata = $list->getChilds();
		foreach ($getdata as $key => $id)
		{
			$datas[] = $list->getList($id);
		}
		//print_r($datas);
		$this->assign('data',$datas);
		$this->display('categorie_list');
	}
	
	public function AddCategorie()
	{
		if ($_POST) {
			$User = D('categories');
			$User->cat_name = $_POST['cat_name'];
			$User->cat_value = $_POST['cat_value'];
			$User->cat_keywords = $_POST['cat_keywords'];
			$User->cat_description = $_POST['cat_description'];
			$User->cat_list_skin = $_POST['cat_list_skin'];
			$User->cat_details_skin = $_POST['cat_details_skin'];
			$User->cat_is_show = $_POST['cat_is_show'];
			
			$User->add();
			$this->redirect('Categories');
		} else {
			$this->display('add_categorie');
		}
	}
}
?>