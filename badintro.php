<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>整合式自學平台</title>
    <link rel="stylesheet" href="style1.css">
    <!--<link rel="stylesheet" href="indexcss.css" />
    <link rel="stylesheet" href="signup.css">-->
  
    <style>
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


        #main {
            width: 100%;
            height: 600px;
            margin: 0 auto;
        }

        #main .up {
            width: 100%;
            height: 200px;
            margin: 0 auto;
            background: #747578;
        }

        #main .up h3 {
            font-size: 30px;
            color: white;
            padding-left: 150px;
            padding-top: 75px;
        }

        #main .down {
            width: 100%;
            height: 400px;
            margin: 0 auto;
            background: #e6e7eb;
        }

        #main .down .pic {
            width: 150px;
            height: 150px;
            background-image: url(img/love.png);
            background-size: 150px 150px;
            background-repeat: no-repeat;
            margin: 0 auto;
        }

        #main .down p {
            font-size: 25px;
            padding-left: 500px;
            display: inline-block;
        }

        #main .down input {
            margin: 0 auto;
        }
        .favoritecourse{
          position:absolute;
          left:40px;
        }

        /*introduction*/
        body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 24.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
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



<div class="about-section">
  <h1 style="font-family:cursive">About Us</h1>
  <p>大家好，我們是TATZE整合式教學平台</p><br>
  <p>這裡集合了udemy、hahow、均一教育平台等豐富的線上課程資訊，歡迎大家一起使用與學習 </p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="img/chi.jpg"  style="display:flex; align-items:center; justify-content:center; width:90%">
      <div class="container">
        <h2>胡育騏</h2>
        <p class="title">developer</p>
        <p>網頁開發初學者，請大家多多指教</p>
        <p>v871202@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="img/shan.png"  style="display:flex; align-items:center; justify-content:center; width:90%">
      <div class="container">
        <h2>劉宜珊</h2>
        <p class="title">developer</p>
        <p>感謝各位蒞臨我們的網頁</p>
        <p>liu19981214@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="img/53.png"  style="display:flex; align-items:center; justify-content:center; width:90%">
      <div class="container">
        <h2>李妤柔</h2>
        <p class="title">developer</p>
        <p>使用上有任何問題或建議歡迎聯絡</p>
        <p>chulsoo1968@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="img/44.png"  style="display:flex; align-items:center; justify-content:center; width:90%">
      <div class="container">
        <h2>秦苡軒</h2>
        <p class="title">developer</p>
        <p>新手開發，很高興與大家一起學習</p>
        <p>bbb@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
</div>     
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="a.js"></script>
</body>

</html>