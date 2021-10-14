<?php include("login.php"); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>整合式自學平台</title>
  
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="indexcss.css">
  <link rel="stylesheet" href="signup.css">
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
	height: 35px;
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

#main #recbottom{
	width: 100%;
	height: 140px;
	background-color: black;
	opacity:0.8;
	position: fixed;
	bottom: 0;
	left: 0;
}
#main #recbottom .func1{
	display: block;
	width: 500px;
	height: 50px;
	font-size: 25px;
	text-align: center;
	color: white;
	margin: 0 auto;
	padding-top: 30px;
}
#main #recbottom .func2{
	display: block;
	width: 500px;
	height: 50px;
	font-size: 20px;
	text-align: center;
	color: white;
	margin: 0 auto;
	padding-top: 25px;
}
#main .but{
	display: block;
	width: 100px;
	height: 40px;
	background-color: gainsboro;
	text-decoration: none;
	text-align: center;
	color: black;
	line-height: 40px;
	opacity:1;
	margin: 0 auto;

}


/* The Close Button (x) */
.recclose {
    position: absolute;
    right: 35px;
    top: 15px;
    font-size: 40px;
    font-weight: bold;
    color: #f1f1f1;
}

.recclose:hover,
.recclose:focus {
    color: #f44336;
    cursor: pointer;
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
			
			<a href="#" id="myBtn" class="first"><img src="img/memb.png" class="mem"/></a>
			<a href="favorite.php"><img src="img/favor.png" class="favo"/></a>
			
			<!--<div class="box">
				<p class="main-menu"><a href="#" class="sort">排序</a>
					<div class="dropdownbox">
	          			<a href="badpython.php?c=price">價格由低到高</a>
	          			<a href="badpython.php?c=person">購買數多到少</a>
	        		</div>
				</p>
			</div>-->
			
			<a href="badintro.php" class="about">關於TATZE</a>
			<!--<a href="todo.php" class="todo">職涯規劃</a>-->
	</div>
  
 <!-- 
  <div id="nav">
    <ul class="main-menu">
      <li class="first"><a href="#" id="myBtn">登入</a></li>
       
      <li><a href="badintro.php" >介紹</a></li>
      <li><a href="favorite.php">我的最愛</a></li>
      <!--<li><a href="#">排序方式</a>
        <ul>
          <li class="dropdown"><a href="badpython.php?c=price">價格由低到高</a></li>
          <li class="dropdown"><a href="badpython.php?c=person">購買數多到少</a></li>
        </ul>
      </li>
	  -->
	  
      <!--<li><a href="#">ToDo</a></li>
      <li><a href="index.php">回首頁</a></li>
	  
	  
    </ul>

    <div class="search">
      <form>
        <input type="text" placeholder="SEARCH" name="search" class="text" value=""/>
        <input type="submit" value="" name="button" class="bt" />
		
		
      </form>
    </div>
  </div>
  
 -->  

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
  <div id="main">
    <div class="left">
      <ul>
        <li class="main-menu"><a href="#">語言</a>
			<div class="dropdown">
				<a href="badpython.php?q=英文">英文</a>
				<a href="#">日文</a>
				<a href="#">韓文</a>
				<a href="#">西班牙文</a>
			</div>
		</li>
        <li class="main-menu"><a href="#">程式</a>
          <div class="dropdown">
            <!--<a href="sort.php?c=python&amp;s=3">python</a>-->
			<a href="badpython.php?q=python">python</a>
            <a href="badpython.php?q=java">java</a>
            <a href="#">C#</a>
            <a href="#">javaScript</a>
            <a href="badpython.php?q=React">React</a>
            <a href="#">C++</a>
          </div>
        </li>
        <li class="main-menu"><a href="#">人文</a>
			<div class="dropdown">
				<a href="#">文學</a>
				<a href="#">社會科學</a>
				<a href="#">更多人文</a>
			</div>
		</li>
        <li class="main-menu"><a href="#">攝影</a>
			<div class="dropdown">
				<a href="#">影像創作</a>
				<a href="#">商業攝影</a>
				<a href="#">後製剪輯</a>
			</div>
		</li>
        <li><a href="#">藝術</a></li>
        <li><a href="#">設計</a></li>
        <li><a href="#">行銷</a></li>
        <li><a href="#">投資理財</a></li>
        <li><a href="#">手作</a></li>
        <li><a href="#">生活品味</a></li>
        <li class="main-menu"><a href="#">電子商務</a>
			<div class="dropdown">
				<a href="#">網頁開發</a>
				<a href="#">資料科學</a>
				<a href="#">行動應用</a>
				<a href="#">程式語言</a>
				<a href="#">遊戲開發</a>
				<a href="#">軟體工程</a>
			</div>
		</li>
      </ul>
    </div>
    <!--第一排-->
    <div class="content">
      <div class="smallbox">
        <img src="img/python.PNG" />
		<a href="badpython.php?q=python"><b>Python</b></a>
        <!--<a href="sort.php?c=python&amp;s=3"><b>Python</b></a>-->
      </div>

      <div class="smallbox">
        <img src="img/java.PNG" />
        <a href="badpython.php?q=java"><b>Java</b></a>
      </div>

      <div class="smallbox">
        <img src="img/Linux.PNG" />
        <a href="#"><b>Linux</b></a>
      </div>

      <div class="smallbox" style="margin-right: 0;">
        <img src="img/英文.PNG" />
        <a href="badpython.php?q=英文"><b>English</b></a>
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
	
	   <div id="recbottom" class="recmodal">
    	<span onclick="document.getElementById('recbottom').style.display='none'" class="recclose"
      title="Close Modal">&times;</span>
    	<p class="func1">註冊成為TATZE會員享更多 &nbsp;!</p>
    	<!--<a href="#" id="myBtn" class="first but">點我註冊</a>-->
    	<p class="func2">成為會員即可擁有我的最愛、ToDoList、職涯規劃等功能(點擊右上角註冊)</p>
    	
		</div>
  </div>
  
   <script type = "text/javascript" language="javascript">
   var span = document.getElementsByClassName("recclose")[0];
   // When the user clicks on <span> (x), close the modal
		span.onclick = function () {
		    recbottom.style.display = "none";
		}
  </script>
	
  </div>
  
  
  <!-- Trigger/Open The Modal -->

  <!--<a href="cantpass.html" id="myBtn" >登入</a>-->
  <!-- The Modal -->
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      
      <p class="tatze">TATZE</p>
	  
      <form method="post">
      	<br>
        <img src="img/mail.png" class="mailpng">
		<?php
			if($error2){
				echo '<div class="alert">' .addslashes($error2). '</div>';
			}
		?>
			
        <input type="text" name="loginemail" class="mail" placeholder="輸入帳號" v-model="mail"
		value="<?php echo addslashes($_POST['loginemail']); ?>" />
      	<br>
        <img src="img/key.png" class="keypng">
        <input type="password" id="myInput" name="loginpassword" class="password" placeholder="輸入密碼" v-model="pasd"
		value="<?php echo addslashes($_POST['loginpassword']); ?>" />
      	<br><img src ="img/eye.png" class="eye" onclick="myFunction()">
      
        <input type="submit" value="登入" name="submit" class="login" v-on:click="clickme(mail,pasd)">
        <br><br>

      </form>
	  
      <div class="line1"></div>
      

        <!--<p> <a href="register.html" class="registerAccount" target="_blank"
          onclick="location.href='register.html'">還沒有帳號嗎？點我註冊！</a></p>-->
        <button class="sign" onclick="document.getElementById('id01').style.display='block'">註冊</button>
    </div>

  </div>

  <!--<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button>-->

  <div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'" class="close"
      title="Close Modal">&times;</span>
    <form method="post" class="modal-content">
      <div class="container">
        <h1>註冊TATZE</h1>
        <!--<p>Please fill in this form to create an account.</p>-->
        <hr>
		
		<?php
		
			if($error){
				echo '<div class="alert">' .addslashes($error). '</div>';
			}
			
			if($message){
				echo '<div class="alert">' .addslashes($message). '</div>';
			}
		?>
		
        <label for="email"><b>Account</b></label>
        <input type="text" placeholder="Enter Email" name="email" 
		value="<?php echo addslashes($_POST['email']); ?>" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="psw"
			pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
			value="<?php echo addslashes($_POST['password']); ?>" required>
		
		<div id="message">
		<p id="length" class="ivalid" >最少需<b>8個字元<b></p>
		</div>
		  
		<label for="psw-repeat"><br><b>Repeat Password</b></label>
        <input type="password" id="repsw"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Repeat Password" name="psw-repeat" required>
		<div id="message2">
		<p id="same" class="ivalid2" >需與<b>password相同<b></p>
		</div>
		
		<script type = "text/javascript" language="javascript">
          var myInput = document.getElementById("psw");
          var length = document.getElementById("length");

          // When the user clicks on the password field, show the message box
          myInput.onfocus = function () {
            document.getElementById("message").style.display = "block";
          }
          // When the user clicks outside of the password field, hide the message box
          myInput.onblur = function () {
            document.getElementById("message").style.display = "none";
          }
          // When the user starts to type something inside the password field
          myInput.onkeyup = function () {
            if (myInput.value.length >= 8) {
              length.classList.remove("invalid");
              length.classList.add("valid");
            } else {
              length.classList.remove("valid");
              length.classList.add("invalid");
            }
          }
          var myInput2 = document.getElementById("repsw");
          var same = document.getElementById("same");

          // When the user clicks on the password field, show the message box
          myInput2.onfocus = function () {
            document.getElementById("message2").style.display = "block";
          }
          // When the user clicks outside of the password field, hide the message box
          myInput2.onblur = function () {
            document.getElementById("message2").style.display = "none";
          }
          // When the user starts to type something inside the password field
          myInput2.onkeyup = function () {
            if (myInput2.value == myInput.value) {
              same.classList.remove("invalid2");
              same.classList.add("valid2");
            } else {
              same.classList.remove("valid2");
              same.classList.add("invalid2");
            }
          }
        </script>
		
        <p>註冊後，即表示我接受 TATZE 的<a href="#" style="color:dodgerblue">使用者聲明</a>，並認可<a href="#"
            style="color:dodgerblue">隱私權政策</a>。 </p>

        <div class="clearfix">
          <button type="button" onclick="document.getElementById('id01').style.display='none'"
            class="cancelbtn">Cancel</button>
          <input type="submit" name="submit" class="signup" value="Sign Up"></input>
        </div>
		
      </div>
    </form>
  </div>

  <script type = "text/javascript" language="javascript">
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
	<script type = "text/javascript" language="javascript">
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
	</script>
  <script src="https://unpkg.com/vue/dist/vue.js"></script>
  <script src="a.js"></script>
</body>

</html>