<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style>
			*{
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
	right: 200px;
	/*background-color: #FFC0CB;*/
	
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
			
			#main{
				width:100%;
				height: 600px;
				margin: 0 auto;
			}
			#main .up{
				width: 100%;
				height: 150px;
				margin: 0 auto;
				background: #747578;
				position: relative;
			}
			#main .up .coursenum{
				font-size: 20px;
				color: white;
				position: absolute;
				right: 350px;
				
			}
			
			#main .up h3{
				font-size: 40px;
				color: white;
				padding-left: 150px;
				padding-top: 50px;
				font-family: "Comic Sans MS";
			}
			
			#main .down{
				width: 100%;
				height: 400px;
				margin: 0 auto;
				background: #e6e7eb;
			}
			#main .down .pic{
				width: 150px;
				height: 150px;
				background-image: url(img/love.png);
				background-size: 150px 150px;
				background-repeat: no-repeat;
				margin: 0 auto;
			}
			#main .down p{
				font-size: 22px;
				padding-left: 500px;
				display: inline-block;
			}
			#main .down input{
				margin: 0 auto;
			}
		</style>
	</head>
	<body>
		<!--1.導航-->
		<div id="nav">
			<div id="title">
				<a href="index.php">TATZE</a>
			</div>
			
			<div id="search">
				<form>
        			<input type="text" placeholder="SEARCH" name="search" class="schtext" value="<?php echo $_GET['search']; ?>"/>
        			<input type="submit" value="" class="bt" />
					
					<?php
						if ($_POST['button']==""){
							
							if($_GET['search']!=''){
								$search=$_GET['search'];
								header("Location:badpython.php?search=$search");
							}
							
						}	
							
					?>
      			</form>
			</div>
			
			<a href="index.php"><img src="img/memb.png" class="mem"/></a>
			<a href="favorite.php"><img src="img/favor.png" class="favo"/></a>
			
			<!--<div class="box">
				<p class="main-menu"><a href="#" class="sort">排序</a>
					<div class="dropdownbox">
	          			<a href="sort.php?c=price">價格由低到高</a>
	          			<a href="sort.php?c=person">購買數多到少</a>
	        		</div>
				</p>
			</div>
			-->
			<a href="badintro.php" class="about">關於TATZE</a>
			<!--<a href="todo.php" class="todo">My ToDolist</a>-->
	</div>
		
		<div id="main">
			<div class="up">
				<h3>MY Course</h3>
				<p class="coursenum">目前所選的課程有「0」個</p>
			</div>
			
			<div class="down">
				<div class="pic"></div>
				<p style="font-family: Microsoft JhengHei;">目前沒有收藏的課程</p>
				<p style="font-family: Microsoft JhengHei;">請註冊啟用我的最愛功能</p>
				<br />
				<input type="button" value="立即瀏覽課程"
				onClick= "window.open('index.php')"
				style="width: 120px; height: 50px; 
					background: orangered; color: white;
					margin-left: 550px;"></input>
			</div>
		</div>
		
		
	</body>
</html>