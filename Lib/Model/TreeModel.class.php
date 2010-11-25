<?php
class TreeModel extends Model
{
	public $data = array();
	public $cateArray = array();
	public $mark = array();
	public $sort = array();
    
	public function setNode($id, $parent, $value, $mark = '', $sort = 0)
	{
		$parent = $parent ? $parent : 0;
		$this->data[$id] = $value;
		$this->cateArray[$id] = $parent;
		$this->mark[$id] = $mark;
		$this->sort[$id] = $sort;
	}
	
	public function getChilds($id=0)
	{
		$childArray = array();
		$childs = $this->getChild($id);
		foreach ($childs as $child)
		{
			$childArray[] = $child;
			$childArray = array_merge($childArray, $this->getChilds($child));
		}
		return $childArray;
	}
	
	public function getChild($id)
	{
		$childs = array();
		foreach ($this->cateArray as $child=>$parent)
		{
			if ($parent == $id)
			{
				$childs[$child] = $child;
			}
		}
		return $childs;
    }
    
    public function getList($id)
    {
    	$info['id'] = $id;
    	$info['pid'] = $this->cateArray[$id];
    	$info['mark'] = $this->mark[$id];
    	$info['name'] = $this->data[$id];
    	$info['sort'] = $this->sort[$id];
    	
    	return $info;
    }
    
    public function getValue($id)
    {
    	if ($this->mark[$id] == '') {
    		$htmls = '<td bgcolor="#EEEEEE" colspan="2"><span class="editable" id="name_'.$id.'">'.$this->data[$id].'</span></td>
    		<td bgcolor="#EEEEEE"><div align="center"><a href="__URL__/Addson/id/'.$id.'" title="">增加子类</a> · <a href="###" onclick="isDelete('.$id.',0)">删除</a></div></td>';
    	} else {
    		$htmls = '<td bgcolor="#FFFFFF">&nbsp;&nbsp;&nbsp;&nbsp;<span class="editable" id="name_'.$id.'">'.$this->data[$id].'</span></td>
    		<td bgcolor="#FFFFFF">&nbsp;&nbsp;&nbsp;&nbsp;<span class="editable" id="mark_'.$id.'">'.$this->mark[$id].'</span></td>
    		<td bgcolor="#FFFFFF"><div align="center"><a href="###" onclick="isDelete('.$id.',1)">删除</a></div></td>';
    	}
    	return $htmls;
    }
}
?>