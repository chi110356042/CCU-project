<?php	
	session_start();
	DEFINE('DB_USERNAME', 'root');
	DEFINE('DB_PASSWORD', 'root');
	DEFINE('DB_HOST', 'localhost');
	DEFINE('DB_DATABASE', 'users');
	$link = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	mysqli_query($link, 'SET CHARACTER SET utf8');
	mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");

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

 			#nav{
	width: 100%;
	height: 50px;
	background-color: #f8f8f8;
	position: relative;
}

#nav #title{
	width: 150px;
	height: 45px;
	float: left;
	/*background-color: #FFC0CB;*/
	font-size: 30px;
	line-height: 45px;
	padding-left: 30px;
}
#nav #title a{
	text-decoration: none;
	color: #5a5959;
}

#search{
	width: 400px;
	height: 40px;
	margin: auto;
	background-color: #d5d5d5;
	/*background-color: #f1f1f1;*/
	position: absolute;
	top: 5px;
	left: 350px;
	float: left;
}
#search .schtext{
	width: 350px;
	height: 38px;
	float: left;
	border: none;
	padding-left: 10px;
	background-color: #d5d5d5;
	/*background-color: white;*/
}
#search .bt{
    height: 38px;
    width: 38px;
    float: right;
    background-color: #d5d5d5;
    /*background: #f1f1f1;*/
    background-image: url(img/searchbt.png);
    background-repeat: no-repeat;
    background-position: left center;
    border: none;
} 

#nav .mem{
	width: 35px;
	height: 35px;
	position: absolute;
	top: 7px;
	right: 20px;
}
#nav .favo{
	width: 25px;
	height: 25px;
	position: absolute;
	top: 12px;
	right: 70px;
}

#nav .sort{
	text-decoration: none;
	color: #808080;
	font-size: 15px;
}

#nav .box{
	z-index:1;
	width: 105px;
	height: 155px;
	/*border: 1px solid black;*/
	position:absolute;
	left: 180px;
}

#nav .box .main-menu{
	width: 100px;
	height: 50px;
	display: block;
	/*background-color: #D5D5D5;*/
	
	text-align: center;
	line-height: 45px;
}
#nav .dropdownbox{
	display: none;
}
#nav .dropdownbox a{
		width: 100px;
		height: 50px;
		background: #D5D5D5;
		border-bottom: 1px solid gainsboro;
		display: block;
		font-size: 15px;
		line-height: 50px;
		color:#808080;
		text-decoration: none;
		text-align: center;
}
#nav .dropdownbox a:hover{
	background: #c3acac;
}
#nav .box:hover .dropdownbox{
	z-index:1;
	display: block;
		
}

#nav .about{
	width: 90px;
	height: 15px;
	text-decoration: none;
	color: #808080;
	font-size: 15px;
	line-height: 15px;
	position: absolute;
	top: 17px;
	right: 250px;
	/*background-color: #FFC0CB;*/
	border-right: 1px solid gray;
}
#nav .todo{
	width: 90px;
	height: 15px;
	text-decoration: none;
	color: #808080;
	font-size: 15px;
	line-height: 15px;
	position: absolute;
	top: 17px;
	right: 150px;
	/*background-color: #FFC0CB;*/
	
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

   <!--border-bottom: 1px solid #8b8b8b;-->
  }

  #main .content .smallbox a {
   display: inline-block;
   height: 80px;
   color: black;
   text-decoration: none;
   font-size: 20px;
  }
  
  #main .content h3{
	  display: inline-block;
	  width: 200px;
	  height: 80px;
	  background-color: yellow;
	  font-size: 20px;
	  line-height:80px;
	  
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
			<div id="title">
				<a href="mainpage.php">TATZE</a>
			</div>
			
			<div id="search">
				<form>
        			<input type="text" placeholder="SEARCH" name="search" class="schtext" value="<?php echo $_GET['search']; ?>"/>
        			<input type="submit" value="" class="bt" />
      			</form>
			</div>
			
			<a href="mainpage.php"><img src="img/memb.png" class="mem"/></a>
			<a href="mainfavo.php"><img src="img/favor.png" class="favo"/></a>
			
			<!--<div class="box">
				<p class="main-menu"><a href="#" class="sort">排序</a>
					<div class="dropdownbox">
	          			<a href="sort.php?c=price">價格由低到高</a>
	          			<a href="sort.php?c=person">購買數多到少</a>
	        		</div>
				</p>
			</div>
			-->
			<a href="introduction.php" class="about">關於TATZE</a>
			<a href="career.php" class="todo">職涯規劃</a>
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
		  
		  <div class="content">
			<h3>已添加到我的最愛 !!</h3>
		  <center>
			
			<?php
			//$sql = "INSERT INTO favorite ('vid','vname','price') SELECT 'vid','vname','price' FROM videos where vid={$_GET['vid']}";
			$sql = "SELECT * FROM video where vid={$_GET['vid']}";
			$result = mysqli_query($link,$sql);
			
			if(empty($result) || mysqli_num_rows($result)==0){
				//die("沒有找到訊息!");
				die(mysql_error());
			}
			else{
				$shop = mysqli_fetch_assoc($result);
				//$shop = mysqli_fetch_array($result);
				
				//$vid=$shop["vid"];
				//$vname=$shop["vname"];
				//$price=$shop["price"];
				//$sql = "INSERT INTO favorite('vid','vname','price') VALUES (’$vid’,’$vname’,’$price’)";
				//$result = mysqli_query($sql) or die(mysql_error());
				//$iresult = mysqli_query($link,$sql);
				//if(empty($iresult)){
					//die("無法插入!");
				//}
				
			}
			$shop["num"]=1;
			
			$_SESSION["shoplist"][$shop['vid']]=$shop
			
			//header("Location: mainfavo.php");
			
			?>
		</center>
		 </div>
	</body>
</html>