<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>管理端</title>
    
    <link rel="icon" href="/Public/images/favicon.ico" type="image/x-icon" /> 
    <link rel="stylesheet" type="text/css" href="/Public/ht/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="/Public/ht/css/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/Public/ht/css/app.css">
</head>

<body>
    <div class="layui-layout layui-layout-admin k-layout-admin">
        <div class="layui-header">
            <div class="layui-logo">管理端</div>
            <div class="layui-logo k-logo-mobile">管理端</div>
            <ul class="layui-nav layui-layout-left k-nav">
                <li class="layui-nav-item layui-this " k-onelevel><a href="javascript:;">用户管理</a></li>
                <li class="layui-nav-item" k-onelevel><a href="javascript:;">博客管理</a></li>
            </ul>
            <ul class="layui-nav layui-layout-right k-nav" style="margin-right: 30px;">
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <img src="//q4.qlogo.cn/headimg_dl?dst_uin=<?php echo session('qq');?>&amp;spec=100" class="layui-nav-img"><?php echo session('nickname');?> 
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="/index.php/home/index" target="_bank">首页</a></dd>
                        <dd><a href="/index.php/home/Login/logout">注销</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item" style="display: none;">
                    <a href="javascript:;">消息<span class="layui-badge">9</span></a>
                </li>
            </ul>
        </div>

        <div class="layui-side layui-bg-black k-side">
            <div class="layui-side-scroll">
                <div class="k-side-fold"><i class="fa fa-navicon" aria-hidden="true"></i></div>
                <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
                 <ul class="layui-nav layui-nav-tree nav-on"  k-navbar>
                    <li class="layui-nav-item">
                        <a href="javascript:;" k-target data-url="<?php echo U('user/index');?>" data-icon="&#xe628;" data-title="用户列表" k-target><i class="fa fa-user" aria-hidden="true"></i><span> 用户列表</span></a>
                    </li>
                </ul>
                <ul class="layui-nav layui-nav-tree " lay-filter="kNavbar" k-navbar>
                    <li class="layui-nav-item">
                        <a href="javascript:;" k-target data-url="<?php echo U('notice/index');?>" data-icon="&#xe628;" data-title="公告管理" k-target><i class="fa fa-plug" aria-hidden="true"></i><span> 公告列表</span></a>
                    </li>
                     <li class="layui-nav-item">
                        <a href="javascript:;" k-target data-url="<?php echo U('blog/blog');?>" data-icon="&#xe628;" data-title="文章列表" k-target><i class="fa fa-plug" aria-hidden="true"></i><span> 文章列表</span></a>
                    </li>
                     <li class="layui-nav-item">
                        <a href="javascript:;" k-target data-url="<?php echo U('blog/message');?>" data-icon="&#xe628;" data-title="留言管理" k-target><i class="fa fa-plug" aria-hidden="true"></i><span> 留言管理</span></a>
                    </li>
                </ul>
               
            </div>

        </div>
        <div class="layui-body" id="container">
            <!-- 内容主体区域 -->
            <div style="padding: 15px;">主体内容加载中,请稍等...</div>
        </div>

        <div class="layui-footer">
            <!-- 底部固定区域 -->
            2018 &copy;
            <a href="http://www.baidu.com/">www.baidu.com/</a> MIT license

        </div>
    </div>
    <script type="text/javascript" src="/Public/ht/layui/layui.js"></script>
    <script>
        //var _tools,message;
        layui.config({
            base: '/Public/ht/js/'
        }).use(['app', 'jquery','tab'], function() {
            var app = layui.app,
                // layer = layui.layer,
                $ = layui.jquery,
                tab = layui.tab;
            //将message设置为全局以便子页面调用
           // message = layui.message;
            //主入口
            app.set({
                mainUrl: '<?php echo U('welcome');?>',//首页定义
            }).init();
            _tools = {
                tabAdd:function(options){
                    tab.tabAdd({
                        title: options.title,
                        icon: options.icon,
                        url: options.url
                    })
                }
            }
        });
            
    </script>
</body>

</html>