<?php

namespace Home\Model;
use Think\Model\ViewModel;
class AdminsModel extends ViewModel {
	public function IsExist($name) {
		$isName = M('admin')->where("name='".$name."'")->select();
		if($isName)
			return "账户已存在";
		else
			return "1";
	}
	public function IsRepeat($id,$name) {
		$nameMap["id"]=array("neq",$id);
		$namaMap["name"]=array("eq",$name);
		$isName = M('admin')->where($nameMap)->select();
		if($isName)
			return "账户已存在";
		else
			return "1";
	}
}
?>