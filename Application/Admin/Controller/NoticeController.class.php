<?php
namespace Admin\Controller;
use Think\Controller;
class NoticeController extends Controller {
   public function _initialize(){ 
      $uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : null;
        if (!$uid) {
            $this->redirect('login/index');
        }
        if ($_SESSION['type']!=1) {
            $this->error('你没有权限哦！');
        }
    }
    public function index(){
        if (I('is_get')) {
            $notice_count = M('notice')->where($where)->count();
            $Page       = new \Think\Page($notice_count,I('nums'));// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $notice_select = M('notice')->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
            foreach ($notice_select as $key => $value) {
                $notice_select[$key]['create_date'] = $value['create_time'] ? date('Y-m-d H:i',$value['create_time']) : '';
            }
            $return = array(
                'status'=>1,
                'info'=>'成功',
                'count'=>$notice_count,
                'data'=>$notice_select
            );
            $this->ajaxReturn($return);
        } else {
            $this->display();
        }
    }
    public function add(){
    if ($_POST) {
      $model = M('notice');
      $data['notice'] = $_POST['notice']; 
      $data['create_time'] = time();     
      $result = $model->add($data);
        if($result) {
            $this->success('公告发布成功！');
        }else{
            $this->error('公告发布错误！');
        }
    }
    $this->display();
    }

     public function edit($id=0){
       $Form   =   M('notice');
       $this->assign('vo',$Form->find($id));
       $this->display();
    }
    public function update(){
       $Form   =   D('notice');
       if($Form->create()) {
           $result =   $Form->save();
           if($result) {
               $this->success('操作成功！');
           }else{
               $this->error('写入错误！');
           }
       }else{
           $this->error($Form->getError());
       }
    }
     public function delete($id=0){
        $Form = M('notice');
        $result = $Form->delete($id);
        if ($result) {
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
}