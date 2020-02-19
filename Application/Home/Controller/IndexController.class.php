<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function fabu(){
      if ($_POST) {
        $model = M('blog');
        $data['uid'] = $_POST['uid']; 
        $data['name'] = $_POST['name'];
        $data['text'] = $_POST['text']; 
        $data['photo'] = $_POST['photo'];    
        $result = $model->add($data);
          if($result) {
              $this->success('发布成功！');
          }else{
              $this->error('发布失败！');
          }
      }
      $this->display();
    }
      public function boke(){
      header("Access-Control-Allow-Origin:*");
        if (I('is_get')) {
            $blog_count = M('blog')->where($where)->count();
            $Page       = new \Think\Page($blog_count,I('nums'));// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $blog_select = M('blog')->alias('a')->join('__USER__ b on a.uid=b.id','left')->field('a.*,b.qq,b.nickname')->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
          foreach ($blog_select as $key => $value) {
            $blog_select[$key]['avatar']=$value['qq'] ? 'http://q4.qlogo.cn/headimg_dl?dst_uin='.$value['qq'].'&spec=100' : 'http://q4.qlogo.cn/headimg_dl?dst_uin=70106377&spec=100' ;
            $blog_select[$key]['photo']=$value['photo'] ? 'http://'.$_SERVER['SERVER_NAME'].$value['photo'] : 0 ;
          }
            $return = array(
                'status'=>1,
                'info'=>'成功',
                'count'=>$blog_count,
                'data'=>$blog_select
            );
            $this->ajaxReturn($return);
        } else {
            $this->ajaxReturn('ok');
        }
    }

    public function webupload(){
      header("Access-Control-Allow-Origin:*");
      $upload = new \Think\Upload();// 实例化上传类
      $upload->maxSize   =     3145728 ;// 设置附件上传大小
      $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
      $upload->rootPath  =      './Uploads/'; // 设置附件上传根目录
      // 上传单个文件 
      $info   =   $upload->uploadOne($_FILES['file']);
      if(!$info) {// 上传错误提示错误信息
          $this->error($upload->getError());
      }else{// 上传成功 获取上传文件信息
           $url= '/Uploads/'.$info['savepath'].$info['savename'];
           $data=['status'=>1,'url'=>$url,'msg'=>'上传成功！'];
           $this->ajaxReturn($data);
      }
    }
    public function appupload(){
      header("Access-Control-Allow-Origin:*");
      $upload = new \Think\Upload();// 实例化上传类
      $upload->maxSize   =     3145728 ;// 设置附件上传大小
      $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
      $upload->rootPath  =      './Uploads/'; // 设置附件上传根目录
      // 上传单个文件 
      $info   =   $upload->uploadOne($_FILES['file']);
      if(!$info) {// 上传错误提示错误信息
          $this->error($upload->getError());
      }else{// 上传成功 获取上传文件信息
           echo '/Uploads/'.$info['savepath'].$info['savename'];
      }
    }
    public function tianjia(){
      header("Access-Control-Allow-Origin:*");
      $Form=M('blog')->add($_POST);
      if ($Form) {
        $this->ajaxReturn('发布成功！');
      }else{
        $this->ajaxReturn('发布失败！');
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
        } 
    }

    public function boke1(){
       header("Access-Control-Allow-Origin:*");
        $data = M('blog')->order('id desc')->select();
        $this->ajaxReturn($data);
    }

    public function index(){
        $wd = $_POST['title'];
        if ($wd) {
            $map['name|text'] = array('like','%'.$wd.'%');
            $blog = M('blog');
            $data = $blog->where($map)->select();
            
            foreach ($data as $key => $value) {
                $data[$key]['year']=substr($value['create_time'], 0,4);
            	$data[$key]['month']=substr($value['create_time'], 5,2);
               	$data[$key]['day']=substr($value['create_time'], 8,2);
               }

              $this->assign('blog',$data);
        }else{
        $uid=session('uid');
        
        if ($uid) {
          $where['uid']=$uid;
        }
        $m = M('blog');      
        $count = $m->where($where)->count();
        $p = getpage($count,5);
        $list = $m->field(true)->where($where)->order('id desc')->limit($p->firstRow, $p->listRows)->select();
         foreach ($list as $key => $value) {
             	$list[$key]['year']=substr($value['create_time'], 0,4);
            	$list[$key]['month']=substr($value['create_time'], 5,2);
               	$list[$key]['day']=substr($value['create_time'], 8,2);
         }    


              
        $this->assign('blog', $list); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出
      }
      $this->vistor=M('message')->limit(12)->order('id desc')->select();
      $xc['id']=substr(time(), 9);
      $this->notice=M('notice')->order('id desc')->where($xc)->find();
       $this->display();
    }
    public function diary(){
        $diary=M('notice')->where('id>10')->order('id desc')->select();
    	  foreach ($diary as $key => $value) {
         $diary[$key]['create_time'] =date('Y-m-d H:i:s', $value['create_time']);
         $diary[$key]['date']=substr($diary[$key]['create_time'] ,5,2).'月'.substr($diary[$key]['create_time'] ,8,2).'日';
        }
        $this->assign('diary',$diary);
        //dump($diary);die;
            $this->display();
        }
        // public function message(){
        // 	$this->message=M('message')->order('id desc')->select();
        // 	$this->display();
        // }
        public function message(){
          $User = M('message'); // 实例化User对象
          // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
          $list = $User->order('id desc')->page($_GET['p'].',25')->select();
          $this->assign('message',$list);// 赋值数据集
          $count      = $User->count();// 查询满足要求的总记录数
          $Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
          $show       = $Page->show();// 分页显示输出
          $this->assign('page',$show);// 赋值分页输出
          $this->assign(['count'=>$count,'curr'=>$_GET['p']]);
          $this->display(); // 输出模板
        }
        public function addly(){
        	if ($_POST) {
		      $model = M('message');
		      $data['name'] = $_POST['name'];
		      $data['qq'] = $_POST['qq'];
		      $data['message'] = $_POST['message'];    
		      $result = $model->add($data);
		        if($result) {
		            $this->success('留言发布成功！');
		        }else{
		            $this->error('留言发布错误！');
		        }
		    }
        }

        public function read($id=0){
	       $Form   =   M('blog')->find($id);
	       $Form['year']=substr($Form['create_time'], 0,4);
           $Form['month']=substr($Form['create_time'], 5,2);
           $Form['day']=substr($Form['create_time'], 8,2);
	       $this->assign('vo',$Form);
	       $this->display();
	    }
    public function addblog(){
      $this->display();
    }

    public function upload(){
    $upload = new \Think\Upload();// 实例化上传类
    $upload->maxSize   =     3145728 ;// 设置附件上传大小
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','zip');// 设置附件上传类型
    $upload->rootPath  =     './public/Uploads/'; // 设置附件上传根目录
    $upload->savePath  =     ''; // 设置附件上传（子）目录
    // 上传文件 
    $info   =   $upload->upload();
    if(!$info) {// 上传错误提示错误信息
        $Form=D('blog');
        if($Form->create()) {
            $result =   $Form->add();
            if($result) {
                $this->success('发布成功！');
            }else{
                $this->error('发布失败！');
            }
        }
    }else{// 上传成功
      $model = M('blog');
      $data['photo'] = '/Public/uploads/'.$info[photo ]['savepath'].$info[photo ]['savename'];
      $data['name'] = $_POST['name']; 
      $data['text'] = $_POST['text'];
      $data['uid'] = $_POST['uid']; 
   
      $model->add($data);
      $this->success('图文发布成功！');
    }
  }
    
}