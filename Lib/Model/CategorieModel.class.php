<?php
class CategorieModel extends Model
{
	public function Categorie()
	{
		$User = D('categories');
		return $User->where("cat_is_show = 1")->select();
	}
}
?>