<?php
header('P3P:CP="CAO PSA OUR"');
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../favicon.ico"> 
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.jscrollpane.css" media="all" />
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Coustard:900' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css' />
<title></title>
</head>
<body>
		<div class="container">			
			游戏页面
			<hr>
			用户信息：<br>
			<?php

			require_once './class/RenrenRestApiService.class.php';
			$restApi = new RenrenRestApiService;
			$session_key=$_SESSION["session_key"];
			$params = array('fields'=>'uid,name,sex,birthday,mainurl,hometown_location,university_history,tinyurl,headurl','session_key'=>$session_key);
			$res = $restApi->rr_post_curl('users.getInfo', $params);//curl函数发送请求
			//$res = $restApi->rr_post_fopen('users.getInfo', $params);//如果你的环境无法支持curl函数，可以用基于fopen函数的该函数发送请求
			//print_r($res);//输出返回的结果

			$userId = $res[0]["uid"];
			$username = $res[0]["name"];
			$birthday = $res[0]["birthday"];
			$tinyurl = $res[0]["tinyurl"];
			$sex = $res[0]["sex"];
			$headurl = $res[0]["headurl"];
			$mainurl = $res[0]["mainurl"];
			echo "userId:".$userId.'<br>';
			echo "username:".$username.'<br>';
			echo "sex:".$sex.'<br>';
			echo "birthday:".$birthday.'<br>';
			echo "tinyurl:".$tinyurl.'<br>';
			echo "headurl:".$headurl.'<br>';
			echo "mainurl:".$mainurl.'<br>';
					if(true)//如果userId已经存在
					{
						//直接取出对应的app用户信息
					}
					else
					{
						//在app的系统中注册相关信息
					}
			
			$db = mysql_connect("localhost", "root");
			mysql_select_db("thubadge",$db);
			mysql_query("SET NAMES 'UTF8'");
			mysql_query("SET CHARACTER SET UTF8");
			mysql_query("SET CHARACTER_SET_RESULTS=UTF8'");
			?>
			
			<hr>
			<img src="<?=$tinyurl?>">
			<hr>
			人人API(基于APP)：<br>
			<a  href="./api/feed.php" >API同步新鲜事</a><br>
			<a  href="./api/photo.php" >上传照片</a><br>
			<hr>
			人人分享（不基于APP）：<br>
			<hr>
			<a  href="./share/share.html" >人人分享</a><br>
			人人喜欢（不基于APP）：<br>
			<a  href="./share/like.html" >人人喜欢</a><br>
			<hr>
			人人Dialog（基于APP）：<br>
			<a  href="./dialog/feedDialog.php" >弹出新鲜事弹层</a><br>
			<a  href="./dialog/requestDialog.php" >弹出邀请好友弹层</a>
			
			

			<h1>清华勋章<span>Tsinghua Badge</span></h1>
			<div id="ca-container" class="ca-container">
				<div class="ca-wrapper">
					<div class="ca-item ca-item-1">
						<div class="ca-item-main">
							<div class="ca-icon"></div>
							<h3>饮食吃货</h3>
							<h4>
								<span class="ca-quote">&ldquo;</span>
								<span>大清食府，麻辣香锅！</span>
							</h4>
								<a href="#" class="ca-more">更多...</a>
						</div>
						<div class="ca-content-wrapper">
							<div class="ca-content">
								<h6>民以食为天</h6>
								<a href="#" class="ca-close">关闭</a>
								<div class="ca-content-text">
									<?php
									$result = mysql_query("SELECT * FROM badge WHERE cate=\"food\"",$db);
									echo "<table border=1>\n";
									echo "<tr><td>名称</td><td>描述</td></tr>\n";
									while ($myrow = mysql_fetch_row($result)) {
										printf("<tr><td>%s</td><td>%s</td></tr>\n", $myrow[2], $myrow[3]);
										}
									echo "</table>\n";
									?>
								</div>
								<ul>
									<li><a href="#">更新</a></li>
									<li><a href="#">分享</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="ca-item ca-item-2">
						<div class="ca-item-main">
							<div class="ca-icon"></div>
							<h3>生活常识</h3>
							<h4>
								<span class="ca-quote">&ldquo;</span>
								<span>精彩生活，每天直播！</span>
							</h4>
								<a href="#" class="ca-more">更多...</a>
						</div>
						<div class="ca-content-wrapper">
							<div class="ca-content">
								<h6>自强不息 厚德载物</h6>
								<a href="#" class="ca-close">关闭</a>
								<div class="ca-content-text">
									<?php
									$result = mysql_query("SELECT * FROM badge WHERE cate=\"life\"",$db);
									echo "<table border=1>\n";
									echo "<tr><td>名称</td><td>描述</td></tr>\n";
									while ($myrow = mysql_fetch_row($result)) {
										printf("<tr><td>%s</td><td>%s</td></tr>\n", $myrow[2], $myrow[3]);
										}
									echo "</table>\n";
									?>
								</div>
								<ul>
									<li><a href="#">更新</a></li>
									<li><a href="#">分享</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="ca-item ca-item-3">
						<div class="ca-item-main">
							<div class="ca-icon"></div>
							<h3>军事训练</h3>
							<h4>
								<span class="ca-quote">&ldquo;</span>
								<span>I feel that spiritual progress does demand at some stage that we should cease to kill our fellow creatures for the satisfaction of our bodily wants.</span>
							</h4>
								<a href="#" class="ca-more">more...</a>
						</div>
						<div class="ca-content-wrapper">
							<div class="ca-content">
								<h6>You can change the world</h6>
								<a href="#" class="ca-close">close</a>
								<div class="ca-content-text">
									<p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
									<p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
									<p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
								</div>
								<ul>
									<li><a href="#">Read more</a></li>
									<li><a href="#">Share this</a></li>
									<li><a href="#">Become a member</a></li>
									<li><a href="#">Donate</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="ca-item ca-item-4">
						<div class="ca-item-main">
							<div class="ca-icon"></div>
							<h3>学习课业</h3>
							<h4>
								<span class="ca-quote">&ldquo;</span>
								<span>A man is but the product of his thoughts what he thinks, he becomes.</span>
							</h4>
								<a href="#" class="ca-more">more...</a>
						</div>
						<div class="ca-content-wrapper">
							<div class="ca-content">
								<h6>Think globally, act locally</h6>
								<a href="#" class="ca-close">close</a>
								<div class="ca-content-text">
									<p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
									<p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
									<p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
								</div>
								<ul>
									<li><a href="#">Read more</a></li>
									<li><a href="#">Share this</a></li>
									<li><a href="#">Become a member</a></li>
									<li><a href="#">Donate</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="ca-item ca-item-5">
						<div class="ca-item-main">
							<div class="ca-icon"></div>
							<h3>社工社团</h3>
							<h4>
								<span class="ca-quote">&ldquo;</span>
								<span>A weak man is just by accident. A strong but non-violent man is unjust by accident.</span>
							</h4>
								<a href="#" class="ca-more">more...</a>
						</div>
						<div class="ca-content-wrapper">
							<div class="ca-content">
								<h6>Animals have rights, too!</h6>
								<a href="#" class="ca-close">close</a>
								<div class="ca-content-text">
									<p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
									<p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
									<p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
								</div>
								<ul>
									<li><a href="#">Read more</a></li>
									<li><a href="#">Share this</a></li>
									<li><a href="#">Become a member</a></li>
									<li><a href="#">Donate</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="ca-item ca-item-6">
						<div class="ca-item-main">
							<div class="ca-icon"></div>
							<h3>毕业专属</h3>
							<h4>
								<span class="ca-quote">&ldquo;</span>
								<span>An error does not become truth by reason of multiplied propagation, nor does truth become error because nobody sees it.</span>
							</h4>
								<a href="#" class="ca-more">more...</a>
						</div>
						<div class="ca-content-wrapper">
							<div class="ca-content">
								<h6>How essential is meat?</h6>
								<a href="#" class="ca-close">close</a>
								<div class="ca-content-text">
									<p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
									<p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream;</p>
									<p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
								</div>
								<ul>
									<li><a href="#">Read more</a></li>
									<li><a href="#">Share this</a></li>
									<li><a href="#">Become a member</a></li>
									<li><a href="#">Donate</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<h5>Powered by hszcg, Tsinghua University.</h5>
		</div>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<!-- the jScrollPane script -->
		<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="js/jquery.contentcarousel.js"></script>
		<script type="text/javascript">
			$('#ca-container').contentcarousel();
		</script>
</body>
</html>