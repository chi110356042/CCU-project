<?php
	DEFINE('DB_USERNAME', 'root');
	DEFINE('DB_PASSWORD', 'root');
	DEFINE('DB_HOST', 'localhost');
	DEFINE('DB_DATABASE', 'users');
	$link = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	mysqli_query($link, 'SET CHARACTER SET utf8');
	mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
	$sql = "SELECT * FROM videos";
	$result = mysqli_query($link,$sql);
	$total_fields=mysqli_num_fields($result); // 取得欄位數
	$total_records=mysqli_num_rows($result);  // 取得記錄數	
	
	
?>

<!DOCTYPE html>
<html>

<head>
 <meta charset="UTF-8">
 <title>整合式自學平台</title>
 <script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>

 <style type="text/css">
  * {
   margin: 0;
   padding: 0;
  }

  #nav {
   width: 100%;
   height: 50px;
   background: black;
   margin: 0 auto;
  }

  #nav .main-menu ul {
   display: none;
  }

  #nav .main-menu li:hover>ul {
   display: block;
  }

  #nav .main-menu ul .dropdown {
   background: black;
   border-bottom: 1px solid #494949;
  }

  #nav ul li {
   float: left;
   list-style: none;
   width: 100px;
   height: 50px;
   text-align: center;
   border-right: 1px solid #494949;
   line-height: 50px;
   font-size: 15px;
  }

  #nav ul li a {
   color: white;
   text-decoration: none;
  }

  #nav ul li:hover {
   height: 50px;
   background: #c3acac;
   color: black;
  }

  #nav ul .first {
   border-left: 1px solid #494949;
  }

  #nav .search {
   width: 230px;
   /*height: 31px*/
   ;
   height: 29px;
   background: #f1f1f1;
   float: right;
   margin: 10px 10px 10px 0;
   border: 1px solid gray;
  }

  #nav .search .text {
   /*width: 214px*/
   width: 188px;
   height: 29px;
   border: none;
   float: left;
   padding-left: 16px;
   font-size: 10px;
   background: #f1f1f1;

  }

  #nav .search .bt {
   height: 29px;
   width: 26px;
   float: left;
   background: #f1f1f1;
   background-image: url(img/search.png);
   background-repeat: no-repeat;
   background-position: left center;
   border: none;
  }




  #main {
   width: 100%;
   height: 2000px;
   margin: 0 auto;
   background: #dddbdb;
  }

  #main .left {
   width: 120px;
   height: 2000px;
   float: left;
   background: #5a5959;
  }

  #main .left ul li {
   list-style: none;
   width: 120px;
   height: 50px;
   text-align: center;
   line-height: 50px;
   font-size: 17px;
  }

  #main .left ul li a {
   color: white;
   text-decoration: none;
  }

  #main .content {
   width: 1100px;
   height: 1000px;
   padding-top: 20px;
   margin-left: 150px;
  }

  #main .content .smallbox {
   width: 1000px;
   height: 80px;
   border-bottom: 1px solid #8b8b8b;
  }

  #main .content .smallbox p {
   display: block;
   height: 25px;

   font-size: 25px;
   float: right;
   text-align: center;
  }

  #main .content .title {
   display: inline-block;
   width: 1000px;
   height: 60px;
   font-size: 25px;

   border-bottom: 1px solid #8b8b8b;
  }

  #main .content .smallbox a {
   display: inline-block;
   height: 80px;
   color: black;
   text-decoration: none;
   font-size: 20px;
  }

  .imgclick {
   cursor: pointer;
   height: 20px;
   width: 20px;
  }
 </style>
</head>

<body>
 <!--1.導航-->
 <div id="nav">
  <ul class="main-menu">
   <li class="first"><a href="#">登入</a></li>
   <li><a href="#">介紹</a></li>
   <li><a href="mainfavo.php">我的最愛</a></li>
   <li><a href="#">排序方式</a>
    <ul>
      <li class="dropdown"><a href='decend.php?sortperson=由低到高'>由低到高</a></li>
      <li class="dropdown"><a href='decend.php?sortperson=由低到高'>購買數多到少</a></li>
    </ul>
     </li>
   <li><a href="#">論壇</a>
   <li><a href="index.html">回首頁</a>
  </ul>

  <div class="search">
   <form>
    <input type="text" placeholder="SEARCH" name="search" class="text" value="<?php echo $_GET['search']; ?>"/>
    <input type="submit" value="" name="button" class="bt" />
   </form>
  </div>
 </div>



 <!--3.主體-->
 <div id="main">
  <div class="left">
   <ul>
    <li><a href="#">語言</a></li>
    <li><class="main-menu"><a href="#">程式</a>
		<div class="dropdown">
            <a href="python.html">python</a>
            <a href="#">java</a>
            <a href="#">C#</a>
            <a href="#">javaScript</a>
            <a href="#">React</a>
            <a href="#">C++</a>
        </div>
	</li>
    <li><a href="#">人文</a></li>
    <li><a href="#">攝影</a></li>
    <li><a href="#">藝術</a></li>
    <li><a href="#">設計</a></li>
    <li><a href="#">行銷</a></li>
    <li><a href="#">投資理財</a></li>
    <li><a href="#">手作</a></li>
    <li><a href="#">生活品味</a></li>
    <li><a href="#">電子商務</a></li>
   </ul>
  </div>

  <!--第一排-->
  <div class="content">
   <p class="title"><b>關於Python...</b>
   <!--<a href="showfavorite.php">瀏覽</a></p>-->
   
	<table width="1050" height="600" border="0" cellspacing="0">

<?php
	if($_GET['search']!=''){
		
		$search=$_GET['search'];
		$ssql = "select * from `videos` where vname like '%$search%'";
		$srhresult = mysqli_query($link,$ssql);
		$stotal_fields=mysqli_num_fields($srhresult); // 取得欄位數
		$stotal_records=mysqli_num_rows($srhresult);  // 取得記錄數
		//$data=mysqli_query("select * from videos where vname like '%$search%'");	
		for ($i=0;$i<$stotal_records;$i++) 
		{	
			$srow = mysqli_fetch_assoc($srhresult);
			
			echo"<tr>";
			echo "<td></td>";
			echo "<td><font style=\"font-size: 20px\">" .$srow["vname"] ."</font></td>";
			echo "<td>" ."<img src=\"img/172626-24.png\">" .$srow["person"] ."</td>";
			echo "<td><p>$</p>" ."<font style=\"font-size: 18px\">" .$srow["price"]."</font>"
				   ."<a href='addfavorite.php?vid={$srow["vid"]}'>加入</a>
				  </td>";
			//echo "<td><input type="submit" name="button" id="button" value="加入" /></td>";
				
			echo"</tr>";
			
		}
		
	}
	else{	
		for ($i=0;$i<$total_records;$i++) 
		{	
			$row = mysqli_fetch_assoc($result);
			
			echo"<tr>";
			echo "<td></td>";
			echo "<td><font style=\"font-size: 20px\">" .$row["vname"] ."</font></td>";
			echo "<td>" ."<img src=\"img/172626-24.png\">" .$row["person"] ."</td>";
			echo "<td><p>$</p>" ."<font style=\"font-size: 18px\">" .$row["price"]."</font>"
				   ."<a href='addfavorite.php?vid={$row["vid"]}'>加入</a>
				  </td>";
			//echo "<td><input type="submit" name="button" id="button" value="加入" /></td>";
				
			echo"</tr>";
			
		}
	}
	?>
	
	</table>    
   
  
 </div>
 <script>
  $(".imgclick").toggle(function () {
   $(this).attr("src", "img/blackheart.png");
  }, function () {
   $(this).attr("src", "img/redheart.png");
  }).attr("src", "img/blackheart.png");
 </script>
  <script src="https://unpkg.com/vue/dist/vue.js"></script>
  <script src="a.js"></script>