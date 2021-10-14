<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title></title>
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
  <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="jqueryui/style.css">
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
   
   <div class="box">
    <!--<p class="main-menu"><a href="#" class="sort">排序</a>-->
     <div class="dropdownbox">
              <a href="sort.php?c=price">價格由低到高</a>
              <a href="sort.php?c=person">購買數多到少</a>
           </div>
    </p>
   </div>
   
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
  
  <div class="textbox">
      <h1 style="color:#008B8B; position:absolute; top:90px; left:100px;">職人專訪</h1>
      <div class="line"  style="position:absolute; top:175px; left:100px;
                    width:80%; height: 1px; border-top: solid #008B8B 1.5px;"></div>
  </div>
 <img src="img/one.png" style="position:absolute; width:440px; height:260px; top:240px; left:140px; cursor: grab;" >
  <div style="position:absolute; top:500px; left:140px; font-size:14pt;">人生指南針 職涯發展師助迷惘者覓方向<br>
 CTgoodjobs
  </div>

 <img src="img/two.png" style="position:absolute; width:440px; height:260px; top:240px; left:680px; cursor: grab;" >
 <div style="position:absolute; top:500px; left:680px; font-size:14pt;">勇敢投資自己，圓夢能量無限 台大電機系教授葉丙<br>成╳台大電信所研究生熊仔<br>
  快樂工作人Cheers TV
  </div>

  <img src="img/three.png" style="position:absolute; width:440px; height:260px; top:650px; left:140px; cursor: grab;" >
  <div style="position:absolute; top:920px; left:140px; font-size:14pt;">
    日本工作心得｜為什麼會選這間公司？
    我遇到什麼<br>樣的瓶頸？<br>
    Amber.L
  </div>

  <img src="img/four.png" style="position:absolute; width:440px; height:260px; top:650px; left:680px; cursor: grab;" >
  <div style="position:absolute; top:920px; left:680px; font-size:14pt;">概念設計師出國工作血淚心得分享<br>
    彼得佘 Peter Sheh
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
}</script>
  <script type="text/javascript">

//todo老鼠隨捲軸移動
$().ready(function() {  
  var $scrollingDiv = $("#trytodo"); 
 
  $(window).scroll(function(){ 
   $scrollingDiv
    .stop()
    .animate({"marginTop": ($(window).scrollTop() + 10) + "px"}, "slow" );   
  });
 });
 </script>
<script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="a.js"></script>
 </body>
</html>