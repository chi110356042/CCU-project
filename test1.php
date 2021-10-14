<?php
	DEFINE('DB_USERNAME', 'root');
	DEFINE('DB_PASSWORD', 'root');
	DEFINE('DB_HOST', 'localhost');
	DEFINE('DB_DATABASE', 'users');
	$link = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	mysqli_query($link, 'SET CHARACTER SET utf8');
	mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
	
	$search=$_GET['search'];
	$q=$_GET['q'];
	$c=$_GET['c'];
	if($c==''&& $q==''){
	 $data= "select * from videos";
	}
	if(!empty($search)){
	  $data= "select * from `videos` where vname like '%$search%'";
	}
	if($q){
		$data= "select * from videos where vname like '%$q%'";
	}
	
	if(strcmp($c,"price")==0){
	 $data= "select * from videos order by $c asc";
	}
	if(strcmp($c,"person")==0){
	 $data= "select * from videos order by $c desc";
	}
	
	//else if(!empty($search) && $c=='')
	/*else if($search!=''&&$c==''){
	  $data= "select * from videos where vname like '%$search%'";
	}else{
	 $data= "select * from videos order by $c desc";
	}
	*/
	$result = mysqli_query($link,$data);
	$total_fields=mysqli_num_fields($result); // 取得欄位數
	$total_records=mysqli_num_rows($result);  // 取得記錄數
	
?>

<!DOCTYPE html>
<html>

<head>
 <meta charset="UTF-8">
 <title>整合式自學平台</title>
 <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="indexcss.css" />
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

	#main .content{
			width: 1100px;
			height: 1000px;
			padding-top: 10px;
			margin-left: 150px;
		}
	#main .content .smallbox{
			width: 800px;
			height: 150px;
			background-color: ghostwhite;
			box-shadow: 3px 3px 3px #888888;
			border: 1px solid gainsboro;
			margin-left: -5px;
			margin-bottom: -10px;
		}
	#main .content .simg{
			width: 250px;
			height: 150px;
			float: left;
			background-color: yellow;
		}
	#main .content .word{
			/*width: 600px;*/
			width: 520px;
			/*height: 150px;*/
			height: 120px;
			float: left;
			background-color: ghostwhite;
			padding: 15px;
	}
	#main .content img{
			float: left;
		}
	#main .content .smallbox p{
			display: block;
			height: 15px;
			
			font-size: 15px;
			float: left;
			text-align: center;
		}
	#main .content .smallbox .price{
			display: block;
			width: 100px;
			height: 120px;
			
			font-size: 20px;
			float: right;
			text-align: right;
		}
	#main .content .smallbox .vname{
			display: inline-block;
			width: 500px;
			height: 20px;
			color: black;
			text-decoration: none;
			font-size: 20px;
			line-height: 20px;
			text-align: left;
			float :left;
		}
		
		
		
		/*推薦*/
		#main .reccom{
			width: 280px;
			height: 700px;
			/*background-color: yellow;*/
			position: absolute;
			right: 0;
			padding-top: 10px;
			position: fixed;
		}
		#main .reccom .smallr{
			width: 270px;
			height: 150px;
			background-color: white;
			margin-bottom: 5px;
			border: 1px solid grey;
		}
		
		#main .reccom .rimg{
			width: 70px;
			height: 148px;
			background-image: url(img/python.PNG);
			border: none;
			float: left;
		}
		#main .reccom .word2{
			width: 200px;
			height: 150px;
			float: right;
		}
		#main .reccom .smallr .rectitle{
			display: block;
			width: 180px;
			height: 15px;
			font-size: 13px;
			padding-left: 10px;
			padding-top: 10px;
			color: grey;
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
		<li class="dropdown"><a href="sort.php?c=price">由低到高</a></li>
		<li class="dropdown"><a href="sort.php?c=person">購買數多到少</a></li>
    </ul>
     </li>
   <li><a href="#">論壇</a>
   <li><a href="index.php">回首頁</a>
  </ul>

  <div class="search">
   <form>
    <input type="text" placeholder="SEARCH" name="search" class="text" value="<?php echo $_GET['search']; ?>"/>
    <input type="submit" value="" class="bt" />
   </form>
  </div>
 </div>



 <!--3.主體-->
 <div id="main">
  <div class="left">
   <ul>
    <li><a href="#">語言</a>
		<div class="dropdown">
            <a href="#">英文</a>
            <a href="#">日文</a>
            <a href="#">韓文</a>
            <a href="#">西班牙文</a>
        </div>
	</li>
    <li class="main-menu"><a href="#">程式</a>
		<div class="dropdown">
            <a href="sort.php?q=python">python</a>
            <a href="sort.php?q=java">java</a>
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
   <!--<p class="title"><b>關於Python</b>-->

	<?php	
		
		for ($i=0;$i<$total_records;$i++) 
		{	
			$row = mysqli_fetch_assoc($result);
			
			echo "<div class=\"smallbox\">";
				echo "<img src=\"img/python.PNG\" style=\"width:250px; height:150px;\" class=\"simg\" />";
				echo "<div class=\"word\">";
				echo "<a herf=\"#\" class=\"vname\">" .$row["vname"] ."</a><br /><br />";
				echo "<p>" ."王曉明" ."</p><br /><br />";
				echo "<img src=\"img/172626-24.png\" style=\"width:15px; height:15px;\"><p>" .$row["person"] ."</p><br />";		
				echo "<p style=\"font-size: 12px; color: gray;\">" ."11.5小時" ."</p>";		
				echo "<p class=\"price\">" ."$" .$row["price"] .
					"&nbsp;<a href='addfavorite.php?vid={$row["vid"]}' style=\"width: 18px; height: 120px; float: right\">
				     <img src=\"img/redheart.png\" style=\"width:18px; height:18px;\">
				     </a></p>";	
				echo "</div>";
			echo "</div>";
		}
		
		
	
	?>
	
	<div class="reccom">
	<?php
		$out= "select * from videos order by person desc";
		$result2 = mysqli_query($link,$out);
		
		for ($i=0;$i<3;$i++) 
		{	
			$row2 = mysqli_fetch_assoc($result2);
			
			echo "<div class=\"smallr\">";
				echo "<img class=\"rimg\" />";
				echo "<div class=\"word2\">";
				echo "<a herf=\"#\" class=\"rectitle\">" .$row2["vname"] ."</a>";
				echo "<p class=\"rectitle\">" ."王曉明" ."</p><br /><br />";
				echo "<img src=\"img/172626-24.png\" style=\"width:15px; height:15px; padding-left: 10px;\"><p>" .$row2["person"] ."</p>";		
				echo "<p style=\"font-size: 12px; color: gray; padding-left: 10px;\">" ."11.5小時" ."</p>";		
				//echo "<p class=\"price\">" ."$" .$row["price"] .
					//"&nbsp;<a href='addfavorite.php?vid={$row["vid"]}' style=\"width: 18px; height: 120px; float: right\">
				     //<img src=\"img/redheart.png\" style=\"width:18px; height:18px;\">
				     //</a></p>";	
				echo "</div>";
			echo "</div>";
		}
	
	
	?>
    </div>	
 
 
	<!--</table>  -->


	
<!--<p align="center">
    <?php/*
   for($i=1;$i<=$pages;$i++){
	   echo "<a href='sort.php?p=$i'>$i</a>";
   }
   */?>
   
   
   <p>
  <p align="center">共有<?php echo $pages?>頁<p>
  -->

 
 <script>
  function bad(){
	alert("請先登入會員，才能使用我的最愛功能");
        }
 </script>
 <script>
  $(".imgclick").toggle(function () {
   $(this).attr("src", "img/blackheart.png");
  }, function () {
   $(this).attr("src", "img/redheart.png");
  }).attr("src", "img/blackheart.png");
 </script>
  <script src="https://unpkg.com/vue/dist/vue.js"></script>
  <script src="a.js"></script>