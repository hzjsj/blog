<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width" />
   
    <meta name="robots" content="all" />
    <title>首页</title>
    <link rel="stylesheet" href="/Public/qd/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="/Public/ht/layui/css/layui.css">
    <link rel="stylesheet" href="/Public/qd/css/master.css" />
    <link rel="stylesheet" href="/Public/qd/css/gloable.css" />
    <link rel="stylesheet" href="/Public/qd/css/nprogress.css" />
    <link rel="stylesheet" href="/Public/qd/css/blog.css" />
</head>
<body>
    <div class="header">
    </div>
    <header class="gird-header">
        <div class="header-fixed">
            <div class="header-inner">
                <a href="javascript:;" class="header-logo" id="logo">Mr.Wxl</a>
                <nav class="nav" id="nav">
                    <ul>
                        <li><a href="<?php echo U('index/index');?>">首页</a></li>
						<li><a href="<?php echo U('index/message');?>">留言</a></li>
                        <li><a href="<?php echo U('index/diary');?>">日记</a></li>
                        <li><a href="<?php echo U('index/about');?>">关于</a></li>
                     	<?php if(empty($_SESSION['uid'])): else: ?>
						<li><a href="javascript:;" class="add">博客</a></li><?php endif; ?>
                    </ul>
                </nav>
                 <?php if(empty($_SESSION['uid'])): ?><a href="javascript:；" class="blog-user dr">
               
                    <i class="fa fa-qq"></i>
                    <?php else: ?>
                    <a href="<?php echo U('login/logout');?>" class="blog-user">
                        <img src="//q4.qlogo.cn/headimg_dl?dst_uin=<?php echo session('qq');?>&spec=100" alt="<?php echo session('nickname');?>" title="<?php echo session('nickname');?>">
                    </a><?php endif; ?>
                
                <a class="phone-menu">
                    <i></i>
                    <i></i>
                    <i></i>
                </a>
            </div>
        </div>
    </header>
    <div class="doc-container" id="doc-container">
        <div class="container-fixed">
		    <div class="col-content">
		        <div class="inner">
		            <article class="article-list bloglist" id="LAY_bloglist" >
 <div id="layer-photos-demo" class="layer-photos-demo">
		            <?php if(is_array($blog)): $i = 0; $__LIST__ = $blog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><section class="article-item zoomIn article">       
							<div class="fc-flag">置顶</div>   
							<h5 class="title">       
								<span class="fc-blue">【原创】</span>       
								<a href="/index.php/home/index/read/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></a>   
							</h5>   
							<div class="time">       
								<span class="day"><?php echo ($vo["day"]); ?></span>       
								<span class="month fs-18"><?php echo ($vo["month"]); ?><span class="fs-14">月</span></span>       
								<span class="year fs-18 ml10"><?php echo ($vo["year"]); ?></span>   
							</div>   
							<div class="content"> 
							<?php if(empty($vo["photo"])): else: ?>
							<!-- <a href="/index.php/home/index/read/id/<?php echo ($vo["id"]); ?>" class="cover img-light"> -->           <div class="cover img-light">
									<img src="<?php echo ($vo["photo"]); ?>">  
									</div>     
								<!-- </a> --><?php endif; ?>      
								
								<pre><?php echo ($vo["text"]); ?></pre>  
							</div>   
							<div class="read-more">       
								<a href="/index.php/home/index/read/id/<?php echo ($vo["id"]); ?>" class="fc-black f-fwb">继续阅读</a>   
							</div>    
							<aside class="f-oh footer">       
								<div class="f-fl tags">           
									<span class="fa fa-tags fs-16"></span>           
									<a class="tag"><?php echo ($vo["name"]); ?></a>       
								</div>       
								<div class="f-fr">           
									<span class="read">               
										<i class="fa fa-eye fs-16"></i>               
										<i class="num">57</i>           
									</span>           
									<span class="ml20">               
										<i class="fa fa-comments fs-16"></i>               
										<a href="javascript:void(0)" class="num fc-grey">1</a>           
									</span>       
								</div>   
							</aside>
						</section><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
					<div style="text-align: center;margin-top:10px;"><h2><?php echo ($page); ?></h2></div>	
		            </article>
		        </div>
		    </div>
		    <div class="col-other">
		        <div class="inner">
					<div class="other-item" id="categoryandsearch">
			    		<div class="search">
			    		<form action="" method="post">
					        <label class="search-wrap">
					            <input type="text" name="title" autocomplete="off" placeholder="输入关键字搜索" />
					            <span class="search-icon">
					                <i class="fa fa-search"></i>
					            </span>
					        </label>
					    </form>
			        		<ul class="search-result"></ul>
			    		</div>
			    		<ul class="category mt20" id="category">
				        	<li data-index="0" class="slider"></li>
				        	<!-- <li data-index="1"><a href="">最新文章</a></li> -->
				        	<?php if(is_array($blog)): $i = 0; $__LIST__ = $blog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-index="<?php echo ($i); ?>"><a href="/index.php/home/index/read/id/<?php echo ($vo["id"]); ?>""><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			    		</ul>
					</div>
					<!--右边悬浮 平板或手机设备显示-->
					<!-- <div class="category-toggle"><i class="layui-icon">&#xe603;</i></div>
					<div class="article-category">
					    <div class="article-category-title">分类导航</div>
					            <a href="/Blog/Article/1/">个人日记</a>
					            <a href="/Blog/Article/2/">HTML5&amp;CSS3</a>
					            <a href="/Blog/Article/3/">JavaScript</a>
					            <a href="/Blog/Article/4/">ASP.NET MVC</a>
					            <a href="/Blog/Article/5/">其它</a>
					    <div class="f-cb"></div>
					</div> -->
					<!--遮罩-->
					<div class="blog-mask animated layui-hide"></div>
					<div class="other-item">
					    <h5 class="other-item-title">经典语录</h5>
					    <div class="inner">
					        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($notice["notice"]); ?>
					    </div>
					</div>
					<div class="other-item">
					    <h5 class="other-item-title">置顶推荐</h5>
					    <div class="inner">
					        <ul class="hot-list-article">
					                <?php if(is_array($blog)): $i = 0; $__LIST__ = $blog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li> <a href="/index.php/home/read/index/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					        </ul>
					    </div>
					</div>
					<div class="other-item">
					    <h5 class="other-item-title">最近访客</h5>
					    <div class="inner">
					        <dl class="vistor">
					          
			                <?php if(is_array($vistor)): $i = 0; $__LIST__ = $vistor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd style="margin-right:5px;"><a href="javasript:;">
			                <img src="//q4.qlogo.cn/headimg_dl?dst_uin=<?php echo ($vo["qq"]); ?>&spec=100"><cite><?php echo ($vo["name"]); ?></cite></a></dd><?php endforeach; endif; else: echo "" ;endif; ?> 
					         
					        </dl>
					    </div>
					</div>
		        </div>
		    </div>
		</div>
    </div>
    <footer class="grid-footer">
        <div class="footer-fixed">
            <div class="copyright">
                <div class="info">
                    <div class="contact">
                        <a href="javascript:void(0)" class="github" target="_blank"><i class="fa fa-github"></i></a>
                        <a href="http://wpa.qq.com/msgrd?v=3&uin=1665009812&site=qq&menu=yes" class="qq" target="_blank" title="1665009812"><i class="fa fa-qq"></i></a>
                        <a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=CGByYntiSHl5JmtnZQ" class="email" target="_blank" title="1665009812@qq.com"><i class="fa fa-envelope"></i></a>
                        <a href="javascript；" class="weixin"><i class="fa fa-weixin"></i></a>
                    </div>
                    <p class="mt05">
                        Copyright &copy; 2019-2019 王秀龙 All Rights Reserved V.2.0.0 皖ICP备19005551号
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="/Public/ht/layui/layui.js"></script>
    <script src="/Public/qd/js/yss/gloable.js"></script>
    <script src="/Public/qd/js/plugins/nprogress.js"></script>
    <script>NProgress.start();</script>
 	<script src="/Public/qd/js/yss/article.js"></script>
 	<script src="/Public/jquery-3.3.1.min.js"></script>
    <script> 
        window.onload = function () {
            NProgress.done();
        };
    </script>
    <script>
//一般直接写在一个js文件中
layui.use(['layer', 'form'], function(){
  var layer = layui.layer
  ,form = layui.form;
  layer.photos({
  photos: '#layer-photos-demo'
  ,anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
}); 
 $('.dr').on('click', function(){
		 layer.open({
		  type: 2,
		  title: '标题',
		  shadeClose: true,
		  shade: 0.8,
		  area: ['340px','463px'],
		  content: '<?php echo U('login/index');?>' //iframe的url
		}); 
		});
 $('.add').on('click', function(){
		 layer.open({
		  type: 2,
		  title: '添加博客',
		  shadeClose: true,
		  shade: 0.8,
		  area: ['50%', '80%'],
		  content: '<?php echo U('index/addblog');?>', //iframe的url
		  end: function () {
	            window.location.reload();
	        }
		}); 
		});
});
</script> 
</body>
</html>