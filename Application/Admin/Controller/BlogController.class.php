<?php
namespace Admin\Controller;
use Think\Controller;
class BlogController extends Controller {
   public function _initialize(){ 
      $uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : null;
        if (!$uid) {
            $this->redirect('login/index');
        }
        if ($_SESSION['type']!=1) {
            $this->error('你没有权限哦！');
        }
    }
     public function blog(){
        if (I('is_get')) {
            $user_count = M('blog')->where($where)->count();
            $Page       = new \Think\Page($user_count,I('nums'));// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $user_select = M('blog')->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
            $return = array(
                'status'=>1,
                'info'=>'成功',
                'count'=>$user_count,
                'data'=>$user_select
            );
            $this->ajaxReturn($return);
        } else {
            $this->display('');
        }
    }

        public function delblog(){
            $Info = M('blog');
            $result = $Info->where(array('id'=>I('id')))->delete();
            if ($result) {
                $this->success('删除成功！');
            }else{
                $this->error('删除失败！');
            }
    } 
    public function message(){
        if (I('is_get')) {
            $user_count = M('message')->where($where)->count();
            $Page       = new \Think\Page($user_count,I('nums'));// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $user_select = M('message')->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
            $return = array(
                'status'=>1,
                'info'=>'成功',
                'count'=>$user_count,
                'data'=>$user_select
            );
            $this->ajaxReturn($return);
        } else {
            $this->display();
        }
    }
       public function edit($id=0){
       $Form   =   M('message');
       $this->assign('vo',$Form->find($id));
       $this->display();
    }
    public function updately(){
       $Form   =   D('message');
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

     public function delly(){
            $Info = M('message');
            $result = $Info->where(array('id'=>I('id')))->delete();
            if ($result) {
                $this->success('删除成功！');
            }else{
                $this->error('删除失败！');
            }
    } 

}