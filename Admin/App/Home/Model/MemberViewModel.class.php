<?php
/**
 * Created by PhpStorm.
 * User: Waydrow
 * Date: 2016/9/16
 * Time: 20:21
 */

namespace Home\Model;
use Think\Model\ViewModel;


//成员视图模型, 用于全方面的返回事件的信息

class MemberViewModel extends ViewModel {

    public $viewFields = array (
        'member' => array('id','name','identity','image','power'),
    );

    public function addMember ($memberData) {
        $member = M('member')->where('name=%s',$memberData['name'])->select();
        $member = count($member);
        if($member == 0) {
            $member = M('member');
            $result = $member->add($memberData);
            if($result) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function updateMember ($memberId, $data) {
        $member = M('member');
        $member->title = $data['name'];
        $member->place = $data['identity'];

        $result = $member->where('id=%d', $memberId)->save($data);
        if($result) {
            return true;
        } else {
            return false;
        }
    }

    public function delMember ($memberId) {
        $result = M('member')->where('id=%d', $memberId)->delete();
        if($result) {
            return true;
        } else {
            return false;
        }
    }


}