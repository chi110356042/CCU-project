<!DOCTYPE html>
<html>
<head>
<title>整合式自學平台</title>
  <link rel="stylesheet" href="style1.css">
  <!--<link rel="stylesheet" href="indexcss.css" />
  <link rel="stylesheet" href="signup.css">-->
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
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

body {
  margin: 0;
  min-width: 250px;
  background:#F5F5F5;
}

* {
  box-sizing: border-box;
}

#myUL {
  margin: 0;
  padding: 0;
}

 ul#myUL li {
  cursor: pointer;
  position: relative;
  padding: 12px 8px 12px 40px;
  list-style-type: none;
  background: #eee;
  font-size: 18px;
  transition: 0.2s;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

 ul#myUL li:nth-child(odd) {
  background: #f9f9f9;
}

 ul#myUL li:hover {
  background: #ddd;
}

 ul#myUL li.checked {
  background: #888;
  color: #fff;
  text-decoration: line-through;
}

 ul#myUL li.checked::before {
  content: '';
  position: absolute;
  border-color: #fff;
  border-style: solid;
  border-width: 0 2px 2px 0;
  top: 10px;
  left: 16px;
  transform: rotate(45deg);
  height: 15px;
  width: 7px;
}

.close {
  position: absolute;
  right: 0;
  top: 0;
  padding: 12px 16px 12px 16px;
}

.close:hover {
  background-color: #f44336;
  color: white;
}

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
  padding: 10px;
  width: 10%;
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
</style>
</head>
<body >
  <!--1.導航-->
  <div id="nav">
			<div id="title">
				<a href="mainpage.php">TATZE</p>
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
			<a href="todo.php" class="todo">My ToDolist</a>
	</div>

  <!--3.主體-->
 <!-- <div id="main">
    <div class="left">
      <ul>
        <li><a href="#">語言</a></li>
        <li class="main-menu"><a href="#">程式</a>
          <div class="dropdown">
            <a href="python.php">python</a>
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
-->
<div id="myDIV" class="header">
  <h2 style="margin:5px">My To Do List</h2>
  <input type="text" id="myInput" placeholder="請輸入待辦事項">
  <span onclick="newElement()" class="addBtn">Add</span>
</div>

<ul id="myUL"></ul>

<script>
// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('#myUL');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}
</script>

</body>
</html>