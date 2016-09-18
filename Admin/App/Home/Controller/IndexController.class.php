<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
	// 自动运行方法,判断是否登录
	public function _initialize() {
		//当前为登录页时不执行该操作
		if (ACTION_NAME != "login") {
			//判断session['adminName']是否为空，是的话跳转到登陆界面
			if (!isset($_SESSION['adminName'])) {
				echo "<script>alert('用户未登录或登陆超时');</script>";
				$this->redirect("/Home/Index/login");
			} else {
				//显示登录的管理员帐号
				$adminName = $_SESSION['adminName'];
				$admin = M('admin')->where("name='" . $adminName . "'")->select();
				$name = $admin[0]['name'];
				$this->assign("name", $name);
			}
		}
	}
	//后台首页
	public function index() {
		//读取用户数据
        $vo = D('MemberView')->order('id desc')->select();
		$this->assign("list", $vo);
		//使用OrdersView模型读取订单有关数据
		$event = D('EventView')->order('id desc')->select();
		$this->assign("event", $event);
		$this->display();
	}


    //登录页
    public function login() {
        //不加载模板页
        C('LAYOUT_ON', FALSE);
        $this->display();
        if (IS_POST) {
            $admin = M('admin');
            $adminName = $_POST['adminName'];
            $password = $_POST['password'];
            //这里使用md5加密
            $password = md5($password);
            if ($adminName == "" || $password == "") {
                echo "<script>alert('请输入用户名和密码！');history.go(-1);</script>";
            } else {
                $result = $admin->where('name="%s" and password="%s"', $adminName, $password)->select();
                if ($result) {
                    //将用户账号存入session
                    $_SESSION['adminName'] = $adminName;
                    echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
                    echo "<script>alert('登陆成功');</script>";
                    $this->redirect("/Home/Index");
                } else {
                    echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
                    echo "<script>alert('登录失败');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
                }
            }
        }
    }

	public function event() {
		//读取事件数据
		$event = M('event');
		$vo = $event->select();
		$this->assign("list", $vo);
		$this->display();
	}

	public function eventEdit() {
		$id = I('request.id');
		if ($id) {
			$event = M('event');
			$vo = $event->where('id=' . $id)->select();
			$this->assign("list", $vo);
			$this->assign("id", $id);
			$this->display();
			//判断是否有表单提交
			if (IS_POST) {
				$event = M('event');
				$event->id = $id;
				$event->title = $_POST['title'];
				$event->time = $_POST['time'];
				$event->place = $_POST['place'];
				$event->content = $_POST['content'];
				$result = $event->save();
				if ($result) {
					echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
					echo "<script>alert('修改成功');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
                    $this->redirect("/Home/Index/event");
				} else {
					echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
					echo '<script type="text/javascript">alert("修改失败")</script>';
				}
			}
		} else {
            $this->display();
			if (IS_POST) {
				$event = M('event');
				$event->title = $_POST['title'];
				$event->content = $_POST['content'];
				$event->time = $_POST['time'];
				$event->place = $_POST['place'];
				$result = $event->add();
				if ($result) {
					echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
					echo '<script type="text/javascript">alert("新增成功")</script>';
                    $this->redirect("/Home/Index/event");

				} else {
					echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
					echo '<script type="text/javascript">alert("新增失败")</script>';
				}
			}
		}
//		$this->display();
	}

    //删除事件
    public function delEvent() {
        $id = I('request.id');
        $event = M('event');
        $result = $event->delete($id);
        if ($result) {
            echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
            echo "<script>alert('删除成功');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
        } else {
            echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
            echo "<script>alert('删除失败');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
        }
    }


	//管理员列表
	public function admins() {
		$admin = M('admin');
		$vo = $admin->select();
		$this->assign("list", $vo);
		$this->display();
	}
	//管理员信息
	public function admin() {
		$adminName = $_SESSION['adminName'];
		$admin = M('admin')->where("name='" . $adminName . "'")->select();

        $id = I('request.id');
        $admin = M('admin');
        $vo = $admin->where('id=' . $id)->select();
        $this->assign("list", $vo);
        $this->assign("id", $id);
        $this->display();
        if (IS_POST) {
            $admin = M('admin');
            $admin->id = $id;
            $admin->name = $_POST['name'];
            $password = $_POST['password'];
            //采用md5加密
            $admin->password = md5($password);
            $result = $admin->save();
            if ($result) {
                echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
                echo "<script>alert('修改成功');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
            } else {
                echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
                echo '<script type="text/javascript">alert("修改失败")</script>';
            }
        }
	}
	//添加管理员
	public function addAdmin() {
		$this->display();
		$adminName = $_SESSION['adminName'];
		$admin = M('admin')->where("name='" . $adminName . "'")->select();
        if (IS_POST) {
            $admin = M('admin');
            $admin->name = $_POST['name'];
            $password = $_POST['password'];
            //采用md5加密
            $admin->password = md5($password);
            //默认权限都为0，仅有唯一最高管理员
            $Admins = D("Admins");
            //判断用户名和账号是否重复
            $is = $Admins->IsExist($admin->name);
            //不重复则新增管理员
            if ($is == "1") {
                $result = $admin->add();
                if ($result) {
                    echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
                    echo '<script type="text/javascript">alert("新增成功")</script>';
                } else {
                    echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
                    echo '<script type="text/javascript">alert("新增失败")</script>';
                }
            }
            //输出重复信息
            else {
                echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
                echo '<script type="text/javascript">alert("' . $is . '")</script>';
            }
        }
	}


	//删除管理员
	public function delAdmin() {
//		$adminName = $_SESSION['adminName'];
//		$admin = M('admin')->where("name='" . $adminName . "'")->select();
        $admin = M('admin');
        $id = I('request.id');
        $result = $admin->delete($id);
        if ($result) {
            echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
            echo "<script>alert('删除成功');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
        } else {
            echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
            echo "<script>alert('删除失败');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
        }
	}









	//用户管理

    //用户列表
	public function members() {
		$members = M('member');
		$vo = $members->select();
		$this->assign('list', $vo);
		$this->display();
	}

    //查看 修改用户信息
	public function member () {
		$id = I('request.id');
		$members = M('member');
		$vo = $members->where('id=%d', $id)->select();
		$this->assign('list', $vo);
		$this->display();
		if(IS_POST) {
			if(isset($_POST['save'])) {
				$members = M('member');
				$members->id = $id;
				$members->name = $_POST['name'];
				$members->identity = $_POST['identity'];
				$members->power = $_POST['power'];
				$result = $members->save();
				if ($result) {
					echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
					echo "<script>alert('修改成功');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
				} else {
					echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
					echo '<script type="text/javascript">alert("修改失败")</script>';
				}
			}
		}
	}

    //用户检索
    public function memberSelect() {
        $this->display();
        if (IS_POST) {
            $name = $_POST['name'];
            $identity = $_POST['identity'];

			if($name) {

				$member = M('member');
				$data = $member->where("name='%s'",$name)->find();

				if($data!=NULL) {
					echo '姓名：'.$data['name'].'<br>'.'职务：'.$data['identity'];
				} else {
					echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
					echo "<script>alert('查无此人');</script>";
				}
			}

        }
    }

    //报名管理
    public function joiners() {
        $joiners = M('join');
        $vo = $joiners->select();
        $this->assign('list', $vo);
        $this->display();
    }

    public function delJoiner() {
        $id = I('id');
        $joiners = M('join');
        $result = $joiners->delete($id);
        if ($result) {
            echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
            echo "<script>alert('删除成功');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
        } else {
            echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
            echo "<script>alert('删除失败');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
        }
    }


	//删除用户
	public function delMember() {
		$id = I('request.id');
		$members = M('member');
		$result = $members->delete($id);
		if ($result) {
			echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
			echo "<script>alert('删除成功');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
		} else {
			echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
			echo "<script>alert('删除失败');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
		}
	}


}
