<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
       $this->display();
    }
    public function login(){
        if (!IS_POST) $this->redirect('login/index');

        $Yonghu = M('user');
        $yonghu = $Yonghu->where(array('name'=>I('name')))->find();
         if (!$yonghu) {
            $this->error('用户名不存在');
        }elseif ( $yonghu['password']!= md5(I('password').$yonghu['create_time'])) {
             $this->error('密码错误');
        }
        else{
            session('uid',$yonghu['id']);
            session('nickname',$yonghu['nickname']);
            session('qq',$yonghu['qq']);
            session('type',$yonghu['type']);
              if ($yonghu['type']==1) {
                   $return = array('status'=>1,'info'=>'登录成功，跳转中。。。','data'=>array('url'=>'/index.php/admin/index'));
             $this->ajaxReturn($return);
              }else{

            $return = array('status'=>1,'info'=>'登录成功，跳转中。。。','data'=>array('url'=>U('index/index')));
             $this->ajaxReturn($return);
             }
             }   
    }
    public function logout(){
        session_unset();
        session_destroy();
        $this->redirect('index/index');
    }
   
}