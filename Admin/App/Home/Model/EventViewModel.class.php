<?php
/**
 * Created by PhpStorm.
 * User: Waydrow
 * Date: 2016/9/16
 * Time: 20:21
 */

namespace Home\Model;
use Think\Model\ViewModel;


//事件视图模型, 用于全方面的返回事件的信息

class EventViewModel extends ViewModel {

    public $viewFields = array (
        'event' => array('id','title','place','time','content'),
    );

    public function addEvent($eventData) {
        $event = M('event')->where('title=%s',$eventData['title'])->select();
        $event = count($event);
        if($event == 0) {
            $event = M('event');
            $result = $event->add($eventData);
            if($result) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function updateEvent($eventId, $data) {
        $event = M('event');
        $event->title = $data['title'];
        $event->place = $data['place'];
        $event->time = $data['time'];
        $event->content = $data['content'];

        $result = $event->where('id=%d', $eventId)->save($data);
        if($result) {
            return true;
        } else {
            return false;
        }
    }

    public function delEvent($eventId) {
        $result = M('event')->where('id=%d', $eventId)->delete();
        if($result) {
            return true;
        } else {
            return false;
        }
    }


}