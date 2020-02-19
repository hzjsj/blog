-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-02-19 11:46:28
-- 服务器版本： 5.7.26
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `tp3_blog`
--

CREATE TABLE `tp3_blog` (
  `id` int(11) NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `text` text,
  `photo` varchar(255) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `uid` int(11) DEFAULT NULL COMMENT '用户ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `tp3_blog`
--

INSERT INTO `tp3_blog` (`id`, `name`, `text`, `photo`, `create_time`, `uid`) VALUES
(1, '博客', '2019年3月份，我上大一刚开学的时候，用thinkphp3.2.3开发了这个博客。', '', '2020-02-19 03:44:05', 1);

-- --------------------------------------------------------

--
-- 表的结构 `tp3_message`
--

CREATE TABLE `tp3_message` (
  `id` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `qq` bigint(20) DEFAULT NULL,
  `message` text,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp3_message`
--

INSERT INTO `tp3_message` (`id`, `name`, `qq`, `message`, `create_time`) VALUES
(1, '管理员', 70106377, '<p>博客2.0已上线，<span>欢迎大家提交bug</span></p>', '2019-05-02 14:05:47'),
(2, '染柒', 1665009812, '博客上分享了php相关知识，希望可以帮助大家学习', '2019-05-02 14:07:14'),
(3, '凉颜', 30402409, '有什么不懂得问题都可以留下来，看到会帮你们解决的', '2019-05-02 14:08:12'),
(4, '陌生人', 877033588, '2019年5月3日，博客2.0上传到虚拟主机', '2019-05-03 04:55:29'),
(5, '没有昵称', 630825117, '能否分享一下前端页面模板呢？谢谢', '2019-05-06 16:10:55'),
(6, 'No one', 462069352, '后端建议直接尝试TP5.0后的版本', '2019-05-07 06:32:36'),
(7, '爱我中华', 875798675, '20岁，黄金年龄，继续加油', '2019-05-07 10:40:01'),
(8, '没个性', 2019, '特喜欢这样的简约风，请问开源吗？<img src=\"http://hzjsj.top/Public/ht/layui/images/face/1.gif\" alt=\"[嘻嘻]\">', '2019-05-07 14:24:38'),
(9, '没个性', 179141850, '开源的代码？', '2019-05-07 15:44:25'),
(10, 'phper', 843611554, '843611554@qq.com&nbsp; &nbsp;能否借鉴一下源码', '2019-05-08 02:26:28'),
(11, '谢晓峰', 308144593, '                308144593@qq.com&nbsp; 前端源码有吗<br>', '2019-05-08 03:37:03'),
(12, '管理员', 1665009812, '前端代码开源，喜欢的可以联系我', '2019-05-08 03:42:35'),
(13, '天霸', 732128096, '范德萨发顺丰', '2019-05-08 03:44:15'),
(14, 'admin', 839650216, 'lihai', '2019-05-08 06:49:21'),
(15, '啊啊啊啊', 1746671042, '貌似看见了一个同样的博客，！！！那个比较牛逼点呢', '2019-05-08 10:13:50'),
(18, '管理员', 1665009812, '刚刚学做网站，厉害的人有很多', '2019-05-09 05:20:58'),
(19, '12', 12, '                12', '2019-05-09 08:25:09'),
(20, '欧巴蔡蔡', 2921959499, '<img src=\"http://hzjsj.top/Public/ht/layui/images/face/0.gif\" alt=\"[微笑]\">测测这个可以am', '2019-05-09 08:39:29'),
(21, '12312321321', 12321321, '12321321321', '2019-05-09 09:19:11'),
(22, 'sfsfsfas', 19953060, '<img src=\"http://hzjsj.top/Public/ht/layui/images/face/14.gif\" alt=\"[亲亲]\">                ', '2019-05-13 08:07:37'),
(23, '啊哈', 233516, '居然00后PHPer都出来咯。想当年，我开始学PHP的时候，就是2000年;D', '2019-05-14 18:15:25'),
(24, '213', 132, '                312', '2019-05-15 07:15:21'),
(25, '草帽', 1798359655, '首页搜索框下面的几个快捷文章标题文字长处长度后会与下一行重叠', '2019-05-15 09:31:59'),
(26, '呵呵', 732128096, '<img src=\"http://hzjsj.top/Public/ht/layui/images/face/52.gif\" alt=\"[ok]\">                ', '2019-05-16 03:27:44'),
(27, '12312313', 131231231231, '1231231231231', '2019-05-16 08:18:53'),
(28, '我的秀', 213324234, '秀儿                ', '2019-05-16 08:19:49'),
(29, '11', 732128096, '<img src=\"http://hzjsj.top/Public/ht/layui/images/face/26.gif\" alt=\"[怒]\">                ', '2019-05-16 09:10:42'),
(35, 'dd', 539688774, '<img src=\"http://hzjsj.top/Public/ht/layui/images/face/28.gif\" alt=\"[馋嘴]\"><img src=\"http://hzjsj.top/Public/ht/layui/images/face/63.gif\" alt=\"[给力]\">                ', '2019-05-24 08:24:03'),
(36, 'Colin', 811687790, '<img src=\"http://hzjsj.top/Public/ht/layui/images/face/2.gif\" alt=\"[哈哈]\">                ', '2019-05-28 00:30:21'),
(37, 'lll', 0, '                <img src=\"http://hzjsj.top/Public/ht/layui/images/face/53.gif\" alt=\"[耶]\">', '2019-05-28 11:50:07'),
(38, '筱笆', 1165173111, '　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　<img src=\"http://hzjsj.top/Public/ht/layui/images/face/54.gif\" alt=\"[good]\">', '2019-05-31 03:14:10'),
(39, '牧马人', 123123, '<img src=\"http://hzjsj.top/Public/ht/layui/images/face/16.gif\" alt=\"[太开心]\">                ', '2019-05-31 08:12:35'),
(40, 's\'s\'s', 0, 's\'b\'v', '2019-05-31 09:11:13'),
(41, '哈哈', 307495216, '<img src=\"http://hzjsj.top/Public/ht/layui/images/face/1.gif\" alt=\"[嘻嘻]\">                ', '2019-05-31 12:29:04'),
(42, '吃吃吃', 2428691764, '<img src=\"http://hzjsj.top/Public/ht/layui/images/face/47.gif\" alt=\"[心]\">                ', '2019-06-03 05:57:29'),
(43, 'wjy329', 739468852, 'bucuo', '2019-06-03 12:41:13'),
(44, 'test', 1655241471, '<p>文档用markdown写</p><p>代码支持高亮，这瞅着不咋好看</p>', '2019-06-04 09:01:58'),
(45, 'good', 12345, '<img src=\"https://hzjsj.top/Public/ht/layui/images/face/1.gif\" alt=\"[嘻嘻]\">                ', '2019-06-13 04:12:18'),
(46, 'ceshi', 1, '<img src=\"https://hzjsj.top/Public/ht/layui/images/face/63.gif\" alt=\"[给力]\">                ', '2019-06-14 09:47:48'),
(47, '仅有的回忆', 2500621077, '<p># 测试</p><p>``` java</p><p>Hello Word</p><p>```</p>', '2019-06-15 06:03:09'),
(48, 'fdsf', 0, '<img src=\"https://hzjsj.top/Public/ht/layui/images/face/53.gif\" alt=\"[耶]\">                ', '2019-06-15 07:46:25'),
(49, '123', 1111111, '你好                ', '2019-06-17 08:00:30'),
(50, 'c as ', 0, 'asd&nbsp;', '2019-06-19 09:44:29'),
(51, '殷乘风', 308144593, '                博主，你之前的聊天室模板不错，能分享一下吗', '2019-06-21 03:48:41'),
(52, '德玛西亚', 1234, '<p>德玛西亚</p>                ', '2019-06-26 07:39:17'),
(53, '接口', 70106377, '接口请求地址<a target=\"_blank\" href=\"http://jsonplaceholder.typicode.com/users\">http://jsonplaceholder.typicode.com/users</a>', '2019-06-29 09:45:47'),
(54, 'asd001', 1, '                <img src=\"https://hzjsj.top/Public/ht/layui/images/face/25.gif\" alt=\"[抱抱]\">', '2019-07-02 09:54:48'),
(55, '林阿三', 1603889221, '<img src=\"https://hzjsj.top/Public/ht/layui/images/face/28.gif\" alt=\"[馋嘴]\">和博主一样都是00后', '2019-07-03 22:43:35'),
(56, '林阿三', 1603889221, '<img src=\"https://hzjsj.top/Public/ht/layui/images/face/28.gif\" alt=\"[馋嘴]\">用一下路由把...', '2019-07-03 22:45:50'),
(57, 'res', 2863575610, '                这个效果很好', '2019-07-05 01:25:53'),
(58, 'res', 2863575610, '                这个留言板怎么实现的啊，能分享一下吗？', '2019-07-05 01:27:44'),
(59, '1', 12, '1                ', '2019-07-07 08:26:06'),
(60, 'ce', 1246814984, '<img src=\"https://hzjsj.top/Public/ht/layui/images/face/28.gif\" alt=\"[馋嘴]\">                ', '2019-07-07 08:26:31'),
(61, '管理员', 30402409, '<p><span>前端代码开源，喜欢的可以联系我</span></p>                ', '2019-07-09 09:11:03'),
(63, '管理员', 70106377, '博客重新整理了一下', '2019-07-30 08:30:40');

-- --------------------------------------------------------

--
-- 表的结构 `tp3_notice`
--

CREATE TABLE `tp3_notice` (
  `id` int(11) NOT NULL,
  `notice` varchar(255) DEFAULT NULL COMMENT '公告',
  `create_time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='公告' ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `tp3_notice`
--

INSERT INTO `tp3_notice` (`id`, `notice`, `create_time`) VALUES
(1, '曾经拥有的，不要忘记；已经得到的，更要珍惜；属于自己的，不要放弃；已经失去的，留着回忆；想要得到的，必须努力；但最重要的，是好好爱惜自己！', 1556806214),
(2, '失败并不可怕，可怕的是你还相信这句话', 1556806274),
(3, '女孩子自信一点才漂亮，但是漂亮的女孩子谁不自信啊！', 1556806294),
(4, '人生就是这样，有欢笑也有泪水。一部分人主要负责欢笑，另一部分人主要负责泪水。', 1556806394),
(5, '总有一天，你会遇到一个好姑娘，她不要你的房，也不要你的车，不要钻石，更不要你的钱，当然她也不要你。', 1556806442),
(6, '秋天是收获的季节。别人的收获是成功与快乐，你的收获是认识到并不是每个人都会成功与快乐。', 1556806467),
(7, '这个世界没有错，谁让你长得不好看又没钱。', 1556806498),
(8, '成功其实很简单，就是当你坚持不住的时候，再坚持一下。', 1556806553),
(9, '我追逐自己的梦想，别人说我幼稚可笑，但我坚持了下来。最后发现，原来还真是我以前幼稚可笑。', 1556806583),
(10, '经过十年不断的努力和奋斗，我终于从一个懵懂无知的少年变成了一个懵懂无知的青年。', 1556806604),
(16, '学会了git管理仓库，把代码都上传上去了。', 1582082573);

-- --------------------------------------------------------

--
-- 表的结构 `tp3_user`
--

CREATE TABLE `tp3_user` (
  `id` int(11) NOT NULL,
  `nickname` varchar(20) DEFAULT NULL COMMENT '昵称',
  `name` varchar(11) DEFAULT NULL COMMENT '账号',
  `password` char(32) DEFAULT NULL COMMENT '密码',
  `qq` bigint(20) DEFAULT NULL COMMENT 'QQ',
  `type` int(1) DEFAULT '0',
  `sex` tinyint(3) DEFAULT NULL COMMENT '男1，女2',
  `create_time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `tp3_user`
--

INSERT INTO `tp3_user` (`id`, `nickname`, `name`, `password`, `qq`, `type`, `sex`, `create_time`) VALUES
(1, '管理员', 'admin', 'ebd579590f9fe1f80e66af3e1a69f8f6', 1665009812, 1, 1, 1582082132);

--
-- 转储表的索引
--

--
-- 表的索引 `tp3_blog`
--
ALTER TABLE `tp3_blog`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tp3_message`
--
ALTER TABLE `tp3_message`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tp3_notice`
--
ALTER TABLE `tp3_notice`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tp3_user`
--
ALTER TABLE `tp3_user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `tp3_blog`
--
ALTER TABLE `tp3_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `tp3_message`
--
ALTER TABLE `tp3_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- 使用表AUTO_INCREMENT `tp3_notice`
--
ALTER TABLE `tp3_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用表AUTO_INCREMENT `tp3_user`
--
ALTER TABLE `tp3_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
