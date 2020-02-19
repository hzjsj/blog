<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
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
       	 // if (!empty(I('title'))) {
         //        $keywords = I('title');
         //        $where['name|nickname'] = ['like','%'.$keywords.'%'];
         //    }
            $user_count = M('user')->where($where)->count();
            $Page       = new \Think\Page($user_count,I('nums'));// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $user_select = M('user')->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
            foreach ($user_select as $key => $value) {
                $user_select[$key]['create_date'] = $value['create_time'] ? date('Y-m-d H:i',$value['create_time']) : '';
                switch ($value['sex']) {
                    case 0:
                        $user_select[$key]['sex_str'] = '未知';
                        break;
                    case 1:
                        $user_select[$key]['sex_str'] = '男';
                        break;
                    case 2:
                        $user_select[$key]['sex_str'] = '女';
                        break;
                    default:
                        $user_select[$key]['sex_str'] = '未知';
                        break;
                }
            }
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

     public function adduser(){ 
        if (I('name')) {
            $Info = M('user');
            $data['nickname'] = I('nickname');
            $data['name'] = I('name');
            $data['sex'] = I('sex');
            $data['password'] =md5(I('password').time());
            $data['qq'] =I('qq');
            $data['create_time'] = time();
           
            $result = $Info->add($data);
            if ($result) {
                $this->success('添加成功！');
            }else{
                $this->error('添加失败！');
            }
        }else{
            $this->display();
        }
    }

       public function edituser($id=0){
       $Form   =   M('user');
       $this->assign('vo',$Form->find($id));
       $this->display();
    }

    	public function update(){
    		$User = M("user"); // 实例化User对象
			// 要修改的数据对象属性赋值
			$data['id'] = I('id');
			$data['nickname'] = I('nickname');
            $data['name'] = I('name');
            $data['sex'] = I('sex');           
            $data['qq'] =I('qq');
           // if (!empty(I('password'))) {
           //   $data['password'] =md5(I('password').time());
           //   $data['create_time'] = time();
           // };
			$result =  $User->save($data); // 根据条件更新记录
			if($result) {
               $this->success('操作成功！');
            }else{
               $this->error('写入错误！');
            }
		}

     public function deluser(){
            $Info = M('user');
            $result = $Info->where(array('id'=>I('id')))->delete();
            if ($result) {
                $this->success('删除成功！');
            }else{
                $this->error('删除失败！');
            }
    } 
}