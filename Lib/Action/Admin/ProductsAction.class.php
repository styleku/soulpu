<?php
class ProductsAction extends Action
{
	public function Index()
	{
		$this->display('product_list');
	}
	
	public function AddProduct()
	{
		$this->display('add_product');
	}
	
	public function Categories()
	{
		$this->display('categorie_list');
	}
	
	public function AddCategorie()
	{
		if ($_POST) {
			print_r($_POST);
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