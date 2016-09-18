<?php
namespace Home\Controller;

use Think\Controller;
header('Content-Type:text/html; charset=utf-8');

class IndexController extends Controller {
	public function index() {
		$this->display();
	}

    public function introduction() {
        $event = M('event');
        $vo = $event->select();
        $this->assign('list', $vo);
        $this->display();

    }

    public function member() {
        $members = M('member');
        //部门--决策委员会
        $vo1 = $members->where('power=1')->select();
        $this->assign('list1', $vo1);

        //部门--产品系统
        //第一行
        $vo2_1 = $members->where('power=2')->limit(0,4)->select();
        //第二行
        $vo2_2 = $members->where('power=2')->limit(4,4)->select();
        $this->assign('list2_1', $vo2_1);
        $this->assign('list2_2', $vo2_2);

        //部门--职能系统
        $vo3 = $members->where('power=3')->select();
        $this->assign('list3', $vo3);

        //部门--研发系统
        $vo4 = $members->where('power=4')->select();
        $this->assign('list4', $vo4);

        $this->display();
    }


    public function joinAjax() {
        $name = I('post.name');
        $sex = I('post.sex');
        $tel = I('post.tel');
        $mail = I('post.mail');
        $intro = I('post.intro');
        $department = I('post.department');

        $joiner = M('join');
        if($joiner->where('name="%s" AND tel=%s', $name,$tel)->find()!=NULL) {
            return $this->ajaxReturn("您已经报过名啦!", json);
        }
        $joiner->name = $name;
        $joiner->sex = $sex;
        $joiner->tel = $tel;
        $joiner->mail = $mail;
        $joiner->intro = $intro;
        $joiner->department = $department;

        $result = $joiner->add();
        if($result) {
            $data = "您已成功报名!";
            return $this->ajaxReturn($data, json);
        } else {
            $data = "报名失败, 请稍候再试!";
            return $this->ajaxReturn($data, json);
        }


    }

}

?>