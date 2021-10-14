<?php 
	include("login.php");
	session_start();
	include("connection.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>整合式自學平台</title>
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="indexcss.css" />
  <!--<link rel="stylesheet" href="signup.css">-->
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
   <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
  <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="jqueryui/style.css">
  
  <style type="text/css">
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
#nav .welcome{
	display: block;
	width: 110px;
	height: 40px;
	left: 160px;
	margin-top: 5px;
	margin-left: 30px;
	float: left;
	font-size: 20px;
	line-height: 40px;
	text-align: center;
	background-color: #FFC0CB;
	color: #808080;
	font-family: "PingFang TC","微軟正黑體",sans-serif;
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

#nav .box
{
		z-index:1;
		width: 105px;
		height: 155px;
		/*border: 1px solid black;*/
		position:absolute;
		top: 2px;
		right: 150px;
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
	border-right: 1px solid #808080;
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

/*新的*/ 
  .header {
  background-color:#AAAAAA;
  padding: 30px 40px;
  color: white;
  text-align: center;
}

.header:after {
  content: "";
  display: table;
  clear: both;
}

  #myInput {
  margin: 0;
  border: none;
  border-radius: 0;
  width: 30%;
  padding: 10px;
  float: center;
  font-size: 14px;
 
}

.addBtn {
  padding: 9px;
  width: 5%;
  background: #d9d9d9;
  color: #555;
  float: center;
  text-align: center;
  font-size: 14px;
  cursor: pointer;
  transition: 0.3s;
  border-radius: 0;
 
}

.addBtn:hover {
  background-color: #bbb;

}
/*到這*/
  /*todo的整個model*/
.todolist {
  display: none; 
  position: fixed; 
  z-index: 1; 
  padding-top: 100px; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0,0.4); 
}

.todo-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}


.closee {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.closee:hover,
.closee:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

#trytodo{
  cursor: pointer;
}

#thing{
  cursor: pointer;
  position: relative;
  padding: 12px 8px 12px 40px;
  list-style-type: none;
  font-size: 18px;
  transition: 0.2s;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
</style>
</head>

<body>

  <!--1.導航-->
 <div id="nav">
			<div id="title">
				<a href="mainpage.php">TATZE</a>
			</div>
			
			<p class="welcome">歡迎回來 ~</p>
			
			<div id="search">
				<form>
        			<input type="text" placeholder="SEARCH" name="search" class="schtext" value="<?php echo $_GET['search']; ?>"/>
        			<input type="submit" value="" class="bt" />
					<?php
						if ($_POST['button']==""){
							
							if($_GET['search']!=''){
								$search=$_GET['search'];
								header("Location:sort.php?search=$search");
							}
							
						}	
							
					?>
      			</form>
			</div>
			
			<a href="index.php"><img src="img/memb.png" class="mem"/></a>
			<a href="mainfavo.php"><img src="img/favor.png" class="favo"/></a>
			
			<!--<div class="box">
				<p class="main-menu"><a href="#" class="sort">排序</a>
					<div class="dropdownbox">
	          			<a href="sort.php?c=price">價格由低到高</a>
	          			<a href="sort.php?c=person">購買數多到少</a>
	        		</div>
				</p>
			</div>
			-->`
			<a href="introduction.php" class="about">關於TATZE</a>
			<div class="box">
				<p class="main-menu"><a href="#" style="text-decoration: none; color: #808080; font-size: 15px;">職涯規劃</a>
					<div class="dropdownbox">
						<a href="career1.php">職涯顧問</a>
						<a href="career2.php">職人專訪</a>
					</div>
				</p>
			</div>
	</div>


  <!--2.橫幅-->
  <!--<div id="banner">-->
  
  <div class="slideshow-container">

	<div class="mySlides fade">
	 
	  <img src="img/banner.png" style="width:100%; height:450px;" >
	  <div class="t">Welcome to TATZE</div>
	</div>

	<div class="mySlides fade">
	 
	  <img src="img/p1.jpg" style="width:100%; height:450px;" >
	  <div class="t">Let's learn together</div>
	</div>

	<div class="mySlides fade">
	 
	  <img src="img/p3.jpg" style="width:100%; height:450px;" >
	  <div class="t"> If you believe in yourself, all your dreams will come true.</div>
	</div>

	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>

	</div>
	<br>

	<div style="text-align:center">
	  <span class="dot" onclick="currentSlide(1)"></span> 
	  <span class="dot" onclick="currentSlide(2)"></span> 
	  <span class="dot" onclick="currentSlide(3)"></span> 
	</div>

	<script>
	var slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) {
	  showSlides(slideIndex += n);
	}

	function currentSlide(n) {
	  showSlides(slideIndex = n);
	}

	function showSlides(n) {
	  var i;
	  var slides = document.getElementsByClassName("mySlides");
	  var dots = document.getElementsByClassName("dot");
	  if (n > slides.length) {slideIndex = 1}    
	  if (n < 1) {slideIndex = slides.length}
	  for (i = 0; i < slides.length; i++) {
		  slides[i].style.display = "none";  
	  }
	  for (i = 0; i < dots.length; i++) {
		  dots[i].className = dots[i].className.replace(" active", "");
	  }
	  slides[slideIndex-1].style.display = "block";  
	  dots[slideIndex-1].className += " active";
	}
	</script>

  <!--</div>-->

  <!--3.主體-->
  <script type="text/javascript">
	var time;
	$(function(){
	time=setInterval("showAd()",5000);
	});
	function showAd(){
	$("#img1").fadeIn(5000);
	clearInterval(time);
	time=setInterval("hidAd()",8000);
	}
	function hidAd(){
	$("#img1").hide();
	clearInterval(time);
	}

	</script>
	<img src="img/33.png" width="25%" style="position:absolute; top:540px; right:10px; display:none" id="img1"/>	
  
  
  <div id="main">
    <div class="left">
      <ul>
        <li class="main-menu"><a href="#">語言</a>
			<div class="dropdown">
				<a href="sort.php?q=英文">英文</a>
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
            <a href="sort.php?q=React">React</a>
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
      <div class="smallbox">
        <img src="img/python.PNG" />
        <a href="sort.php?q=python"><b>Python</b></a>
      </div>

      <div class="smallbox">
        <img src="img/java.PNG" />
        <a href="sort.php?q=java"><b>Java</b></a>
      </div>

      <div class="smallbox">
        <img src="img/Linux.PNG" />
        <a href="#"><b>Linux</b></a>
      </div>

      <div class="smallbox" style="margin-right: 0;">
        <img src="img/英文.PNG" />
        <a href="sort.php?q=英文"><b>English</b></a>
      </div>
    </div>

    <br />

    <!--第二排-->
    <div class="content">
      <div class="smallbox">
        <img src="img/攝影.PNG" />
        <a href="#"><b>攝影大師</b></a>
      </div>
      <div class="smallbox">
        <img src="img/JavaScript.PNG" />
        <a href="#"><b>JavaScript</b></a>
      </div>

      <div class="smallbox">
        <img src="img/Excel.PNG" />
        <a href="#"><b>Excel</b></a>
      </div>

      <div class="smallbox" style="margin-right: 0;">
        <img src="img/git.PNG" />
        <a href="#"><b>Git</b></a>
      </div>
    </div>

    <br />

    <!--第三排-->
    <div class="content">
      <div class="smallbox">
        <img src="img/N3.PNG" />
        <a href="#">日文N3</a>
      </div>

      <div class="smallbox">
        <img src="img/N4.PNG" />
        <a href="#">日文N4</a>
      </div>

      <div class="smallbox">
        <img src="img/投資.PNG" />
        <a href="#">投資</a>
      </div>

      <div class="smallbox" style="margin-right: 0;">
        <img src="img/房地產.PNG" />
        <a href="#">房地產投資</a>
      </div>
    </div>

    <br />

    <!--第四排-->
    <div class="content">
      <div class="smallbox">
        <img src="img/財管.PNG" />
        <a href="#">財務管理</a>
      </div>

      <div class="smallbox">
        <img src="img/Net.PNG" />
        <a href="#">.Net</a>
      </div>

      <div class="smallbox">
        <img src="img/記憶.PNG" />
        <a href="#">提升記憶力</a>
      </div>

      <div class="smallbox" style="margin-right: 0;">
        <img src="img/NodeJs.PNG" />
        <a href="#">Node.js</a>
      </div>
    </div>
  </div>
  <!--todo button 之後要改成老鼠圖片-->
  <img src="img/m.png" id="trytodo" style="width:80px; height:100px; position:absolute; top:425px; right:40px;  ">
  <div id="mytodo" class="todolist">

  <!-- todo的內容 -->
  <div class="todo-content">
    <span class="closee">&times;</span>
    <div id="myDIV" class="header">
                <h2 style="margin:5px">I Need To Do</h2>            
                <input type="text" id="myInput" placeholder="請輸入待辦事項">  
                <button class="addBtn" >Add</button>   
              <!--  <div class="toDoList";></div>  -->
</div>
           
<script>

$(document).ready(function(){
      $(".addBtn").click(function(){
        var inputValue = $("#myInput").val();
        if(inputValue==""){alert("請輸入待辦事項");}
        else{document.getElementById("myInput").value = "";
          $(".todo-content").append(
      `<div  class="toDos">
        <input type="checkbox" class="status">
        <p id="thing" style="display:inline-block; font-size:18px;  color:black;">${inputValue}&nbsp&nbsp&nbsp
        <input type="text" placeholder="預計完成的時間" class="datepicker"></p>
        <img src="img/bad.png" style="width:10px; height:10px;" class="delete">
       </div>`
		);
        //日期
	$(function() {
		$( ".datepicker" ).datepicker();
	  });

		$(".status").each(function(){
		  $(this).click(function(){
			var status = $(this).prop("checked");
			if(status == true){
			  $(this).parent().children("p").css({"text-decoration": "line-through","font-style":"italic","color":"red"});
			}
			else {
			   $(this).parent().children("p");
			  }
			});
		  });
		  $(".delete").each(function(){
		  $(this).click(function(){
		   $(this).closest("div").remove(); 
		  })
		})}
	   });
	  });
    


</script>
    <!--到這裡-->

  </div>
</div>
<script>
  //todolistmodel的東東
var modall = document.getElementById("mytodo");

var btn = document.getElementById("trytodo");

var span = document.getElementsByClassName("closee")[0];

btn.onclick = function() {
  modall.style.display = "block";
}
span.onclick = function() {
  modall.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modall) {
    modall.style.display = "none";
  }
}
//todo老鼠隨捲軸移動
$().ready(function() {  
  var $scrollingDiv = $("#trytodo"); 
 
  $(window).scroll(function(){ 
   $scrollingDiv
    .stop()
    .animate({"marginTop": ($(window).scrollTop() + 30) + "px"}, "slow" );   
  });
 });
</script>


      
</body>

</html>