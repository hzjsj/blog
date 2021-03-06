<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title></title>
		 <link rel="stylesheet" type="text/css" href="/Public/ht/layui/css/layui.css">
		<script src="/Public/jquery-3.3.1.min.js"></script>
		<script>
			$(document).ready(function() {
				
				$(".form").slideDown(500);
				
				$("#landing").addClass("border-btn");

				$("#registered").click(function() {
					$("#landing").removeClass("border-btn");
					$("#landing-content").hide(500);
					$(this).addClass("border-btn");
					$("#registered-content").show(500);
					
				})

				$("#landing").click(function() {
					$("#registered").removeClass("border-btn");
					$(this).addClass("border-btn");
					
					$("#landing-content").show(500);
					$("#registered-content").hide(500);
				})
			});
		</script>
		<style>
			* {
				margin: 0;
				padding: 0;
				font-family: "微软雅黑";
			}
			
			body {
				background: #F7F7F7;
			}
			
			.form {
				position: absolute;
				/*top: 50%;
				left: 50%;
				margin-left: -185px;
				margin-top: -210px;*/
				height: 420px;
				width: 340px;
				font-size: 18px;
				/*-webkit-box-shadow: 0px 0px 10px #A6A6A6;*/
				background: #fff;
			}
			
			.border-btn {
				border-bottom: 1px solid #ccc;
			}
			
			#landing,
			#registered {
				float: left;
				text-align: center;
				width: 170px;
				padding: 15px 0;
				color: #545454;
			}
			
			#landing-content {
				clear: both;
			}
			
			.inp {
				height: 30px;
				margin: 0 auto;
				margin-bottom: 30px;
				width: 200px;
			}
			
			.inp>input {
				text-align: center;
				height: 30px;
				width: 200px;
				margin: 0 auto;
				transition: all 0.3s ease-in-out;
			}
			
			.login {
				border: 1px solid #A6A6A6;
				color: #a6a6a6;
				height: 30px;
				width: 202px;
				text-align: center;
				font-size: 13.333333px;
				margin-left: 70px;
				line-height: 30px;
				margin-top: 30px;
				transition: all 0.3s ease-in-out;
			}
			
			.login:hover {
				background: #A6A6A6;
				color: #fff;
			}
			
			#bottom {
				margin-top: 30px;
				font-size: 13.333333px;
				color: #a6a6a6;
			}
			
			#registeredtxt {
				float: left;
				margin-left: 80px;
			}
			
			#forgotpassword {
				float: right;
				margin-right: 80px;
			}
			
			#photo {
				border-radius: 80px;
				border: 1px solid #ccc;
				height: 80px;
				width: 80px;
				margin: 0 auto;
				overflow: hidden;
				clear: both;
				margin-top: 30px;
				margin-bottom: 30px;
			}
			
			#photo>img:hover {
				-webkit-transform: rotateZ(360deg);
				-moz-transform: rotateZ(360deg);
				-o-transform: rotateZ(360deg);
				-ms-transform: rotateZ(360deg);
				transform: rotateZ(360deg);
			}
			
			#photo>img {
				height: 80px;
				width: 80px;
				-webkit-background-size: 220px 220px;
				border-radius: 60px;
				-webkit-transition: -webkit-transform 1s linear;
				-moz-transition: -moz-transform 1s linear;
				-o-transition: -o-transform 1s linear;
				-ms-transition: -ms-transform 1s linear;
			}
			
			
			#registered-content {
				margin-top: 40px;
				display: none;
			}
			
			.fix {
				clear: both;
			}
			.form{
				display: none;
			}
		</style>
	</head>

	<body>
		<div class="form">
			<div id="landing">登录</div>
			<div id="registered">注册</div>
			<div class="fix"></div>
			<form action="/index.php/Home/Login/login" method="post" class="layui-form">
			<div id="landing-content">
				<div id="photo"><img src="http://q4.qlogo.cn/headimg_dl?dst_uin=70106377&spec=100" /></div>
				<div class="inp"><input type="text" name='name' required  placeholder="用户名" /></div>
				<div class="inp"><input type="password" name='password' required placeholder="密码" /></div>
				<div class="inp">
				<button class="layui-btn layui-btn-normal" lay-submit lay-filter="formDemo" style="text-align: center; width: 204px;">登入</button>
				</div>
			
				<!-- <div class="login">登录</div> -->
				<div id="bottom"><span id="registeredtxt">立即注册</span><span id="forgotpassword">忘记密码</span></div>
			</div>
			</form>
			<form action="/index.php/Home/Login/insert" method="post"  class="layui-form">
			<div id="registered-content">
				<div class="inp"><input type="text" name="nickname"  required placeholder="请输入昵称" /></div>
				<div class="inp"><input type="text"  name="name" required placeholder="请输入用户名" /></div>
				
				<div class="inp"><input type="password" name="password" required placeholder="请输入密码" /></div>
				<div class="inp"><input type="text" name="qq" required placeholder="请输入QQ" /></div>
				<div class="inp">
				<button class="layui-btn layui-btn-normal" lay-submit lay-filter="formzc" style="text-align: center; width: 204px;">立即注册</button>
				</div>
				<!-- <div class="login">立即注册</div> -->
			</div>
			</form>
		</div>
		<div style="text-align:center;">
</div>
 <script type="text/javascript" src="/Public/ht/layui/layui.js"></script>
<script>
//Demo
layui.use('form', function(){
  var form = layui.form;
  
  //监听提交
  form.on('submit(formDemo)', function(data){
    var load = layer.load(2);
          $.ajax({
          url:'<?php echo U('login/login');?>',
          type:"post",
          data:data.field,
          dataType:"json",
          success:function(r){
              layer.close(load);
              if (r.status == 1) {
                  layer.msg(r.info, { icon: 1 }, function() {
                      // layer.close(index);
                      if (r.data.url) {
								window.top.location.href=r.data.url;
							}
							//parent.location.reload(); 
                  });
              } else {
                  layer.msg(r.info, { icon: 5 }); //错误提示
              }
          },
          error:function(){
            layer.close(load);
            layer.msg('网络错误！',{icon: 5});//错误提示
          }
        });
    return false;
  });
  form.on('submit(formzc)', function(data){
    var load = layer.load(2);
          $.ajax({
          url:'<?php echo U('login/insert');?>',
          type:"post",
          data:data.field,
          dataType:"json",
          success:function(r){
              layer.close(load);
              if (r.status == 1) {
                  layer.msg(r.info, { icon: 1 }, function() {
                      // layer.close(index);
                      if (r.data.url) {
								window.location.href=r.data.url;
							}
                  });
              } else {
                  layer.msg(r.info, { icon: 5 }); //错误提示
              }
          },
          error:function(){
            layer.close(load);
            layer.msg('网络错误！',{icon: 5});//错误提示
          }
        });
    return false;
  });
});
</script>
	</body>

</html>