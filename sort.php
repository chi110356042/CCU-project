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
	
	$urllist=array();
	
	$pagesize=15; 
    $p=isset($_GET['p'])?$_GET['p']:1;//当前页数，默认为1
    $offset = ($p-1)*$pagesize;
	
	if($c==''&& $q==''){
	 $data= "select * from video LIMIT  $offset , $pagesize";
	}
	if(!empty($search)){
	  $data= "select * from `video` where vname like '%$search%' LIMIT  $offset , $pagesize";
	  $urllist[]="search=".$_GET['search'];
	}
	if($q){
		$data= "select * from video where vname like '%$q%' LIMIT  $offset , $pagesize";
		$urllist[]="q=".$_GET['q'];
	}
	
	if(strcmp($c,"price")==0){
	 $data= "select * from video order by $c asc LIMIT  $offset , $pagesize";
	 $urllist[]="c=".$_GET['c'];
	}
	if(strcmp($c,"person")==0){
	 $data= "select * from video order by $c desc LIMIT  $offset , $pagesize";
	 $urllist[]="c=".$_GET['c'];
	}
	if(count($urllist)>0){
 	    $url='&'.implode('&',$urllist);					
 	}
	
	$result = mysqli_query($link,$data);
	$total_fields=mysqli_num_fields($result); // 取得欄位數
	$total_records=mysqli_num_rows($result);  // 取得記錄數
	
?>

<!DOCTYPE html>
<html>

<head>
 <meta charset="UTF-8">
 <title>整合式自學平台</title>
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
  <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="jqueryui/style.css">
 <!--<link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="indexcss.css" />
 <script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>-->

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




  #main {
   width: 100%;
   height: 2800px;
   margin: 0 auto;
   background: white;
   /*background: #dddbdb;*/
  }

  
  #main .left {
   width: 120px;
   height: 2800px;
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
  #main .left ul li:hover{
    height: 50px;
    background: #c3acac;
	}

	#main .left .main-menu{
		position:relative;
	}
	#main .left .dropdown{
		display: none;
	}
	#main .left .dropdown a{
		width: 120px;
		height: 50px;
		background: #5a5959;
		border-left: 1px solid #494949;
		display: block;
		font-size: 17px;
	}
	#main .left .dropdown a:hover{
		background: #c3acac;
	}
	#main .left .main-menu:hover .dropdown{
		position:absolute;
		z-index:1;
		display: block;
		left:120px;
		top:0px;
	}

  
	#main .content{
			width: 1120px;
			height: 2700px;
			padding-top: 10px;
			margin-left: 170px;
			/*background-color: blue;*/
			position: relative;
		}
	#main .content .smallbox{
			width: 700px;
			height: 150px;
			background-color: white;
			box-shadow: 3px 3px 3px #888888;
			border: 1px solid gainsboro;
			/*margin-left: -5px;*/
			margin-bottom: 10px;
		}
	#main .content .simg{
			width: 250px;
			height: 150px;
			float: left;
			background-color: yellow;
		}
	#main .content .word{
			/*width: 600px;*/
			width: 420px;
			/*height: 150px;*/
			height: 120px;
			float: left;
			background-color: white;
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
	#main .content .smallbox .reprice{
			width: 200px;
			height: 28px;
			background: #f3d1d6;
			position: relative;
			float: right;
		}
		#main .content .smallbox .delete{
			display: block;
			width: 100px;
			height: 40px;
			position:absolute;
			z-index:2;
			left: 0;
			font-size: 20px;
			color: red;
			text-align: left;
			/*background: #5599FF;*/
		}	
		
		
	#main .content .smallbox .price{
			display: block;
			width: 200px;
			height: 28px;
			background: #f3d1d6;
			position:absolute; 
			z-index:1;
			font-size: 20px;
			text-align: center;
		}	
		
		
	#main .content .smallbox .norprice{
			display: block;
			width: 120px;
			height: 28px;
			background: #f3d1d6;
			font-size: 20px;
			float: right;
			text-align: center;
		}
	#main .content .smallbox .vname{
			display: inline-block;
			width: 400px;
			height: 30px;
			color: black;
			text-decoration: none;
			font-size: 18px;
			line-height: 20px;
			text-align: left;
			float :left;
		}
		
		
		
		/*推薦*/
		#main .reccom{
			width: 300px;
			height: 800px;
			/*background-color: yellow;*/
			position: absolute;
			top: 45px;
			right: 40px;
			
			margin-top: 50px;
			position: fixed;
		}
		#main .reccom .smallr{
			width: 290px;
			height: 150px;
			background-color: white;
			margin-bottom: 5px;
			border: 1px solid grey;
		}
		
		#main .reccom .rimg{
			width: 90px;
			height: 150px;
			/*background-image: url(img/good.PNG);*/
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
			text-decoration: none;
			padding-left: 10px;
			padding-top: 10px;
			color: grey;
		}	

		.page{
			width: 20px;
			height: 20px;
			line-height: 27px;
			display: block;
			margin-right: 2px;
			text-align: center;
			text-decoration: none;
			color: white;
			float: left;
			background-color: gray;
			
		}
		.pagebox{
			width: 1000px;
			height: 80px;
			margin: 0 auto;
			/*background-color: yellow;*/
				
		}
		.pgtitle{
			display: block;
			width: 400px;
			height: 40px;
			font-size: 22px;
			font-family:Microsoft JhengHei;
			line-height: 40px;
			padding-left: 35px;
			
			/*background-color: yellow;*/
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
			
			<div id="search">
				<form>
        			<input type="text" placeholder="SEARCH" name="search" class="schtext" value="<?php echo $_GET['search']; ?>"/>
        			<input type="submit" value="" class="bt" />
      			</form>
			</div>
			
			<a href="mainpage.php"><img src="img/memb.png" class="mem"/></a>
			<a href="mainfavo.php"><img src="img/favor.png" class="favo"/></a>
			
			<div class="box">
				<p class="main-menu"><a href="#" class="sort">排序</a>
					<div class="dropdownbox">
	          			<a href="sort.php?c=price">價格由低到高</a>
	          			<a href="sort.php?c=person">購買數多到少</a>
	        		</div>
				</p>
			</div>
			
			<a href="introduction.php" class="about">關於TATZE</a>
			<a href="career.php" class="todo">職涯規劃</a>
	</div>



 <!--3.主體-->
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
            <a href="sort.php?q=c#">C#</a>
            <a href="sort.php?q=javaScript">javaScript</a>
            <a href="sort.php?q=React">React</a>
            <a href="sort.php?q=c++">C++</a>
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

	<?php	
		//分页
 		
	if($c==''&& $q==''){
	 $abs= "select count(*) nums from video";
	}
	if(!empty($search)){
	  $abs= "select count(*) nums from `video` where vname like '%$search%'";
	}
	if($q){
		$abs= "select count(*) nums from video where vname like '%$q%'";
	}
	
	if(strcmp($c,"price")==0){
	 $abs= "select count(*) nums from video order by $c asc";
	}
	if(strcmp($c,"person")==0){
	 $abs= "select count(*) nums from video order by $c desc";
	}
		
 		//$abs = "select  count(*) nums FROM message   $where";
 		$count_result = mysqli_query($link,$abs);
		$count_array = mysqli_fetch_array($count_result);
        $pagenum=ceil($count_array['nums']/$pagesize);
		
		$start = $offset+1;
		$last = $offset+$pagesize;
		echo "<p class=\"pgtitle\">" ."結果有「" .$count_array['nums'] ."」筆，" ."目前顯示 &nbsp" .$start ."~" .$last ."</p>";
		
		for ($i=0;$i<$total_records;$i++) 
		{	
			$row = mysqli_fetch_assoc($result);
			
			echo "<div class=\"smallbox\">";
				echo "<img src=\"img/" .$row["img"] ."\" style=\"width:250px; height:150px;\" class=\"simg\" />";
				echo "<div class=\"word\">";
				echo "<a href=\"" .$row["url"] ."\" class=\"vname\">" .$row["vname"] ." / " .$row["web"] ."</a><br /><br /><br />";
				echo "<p>" .$row["author"] ."</p><br /><br />";
				echo "<img src=\"img/172626-24.png\" style=\"width:15px; height:15px;\"><p>" .$row["person"] ."</p><br />";		
				
				if(strlen($row["price"])>10){
					echo "<div class=\"reprice\">";
						echo "<p class=\"delete\">" ."--------------" ."</p>";
						echo "<p class=\"price\">".$row["price"] .
							"&nbsp;<a href='addfavorite.php?vid={$row["vid"]}' style=\"width: 18px; height: 120px; float: right\">
							 <img src=\"img/redheart.png\" style=\"width:18px; height:18px;\">
							 </a></p>";	
					echo "</div>";
				}
				else{
					echo "<p class=\"norprice\">".$row["price"] .
						"&nbsp;<a href='addfavorite.php?vid={$row["vid"]}' style=\"width: 18px; height: 120px; float: right\">
						 <img src=\"img/redheart.png\" style=\"width:18px; height:18px;\">
						 </a></p>";	
				}
				echo "</div>";
			echo "</div>";
		}
		
		echo "<div class=\"reccom\">";
			$out= "select * from video order by person desc";
			$result2 = mysqli_query($link,$out);
			
			for ($i=0;$i<3;$i++) 
			{	
				$row2 = mysqli_fetch_assoc($result2);
				
				echo "<div class=\"smallr\" >";
					echo "<img src=\"img/good.png\" style=\"width:90px; height:150px;\">";
					//echo "<img class=\"rimg\" />";
					echo "<div class=\"word2\">";
					echo "<a href=\"" .$row2["url"]. "\" class=\"rectitle\">" .$row2["vname"] ."</a><br />";
					echo "<p class=\"rectitle\">" .$row2["author"] ."</p><br /><br />";
					echo "<img src=\"img/172626-24.png\" style=\"width:15px; height:15px; padding-left: 10px;\"><p>" .$row2["person"] ."</p>";		
					//echo "<p style=\"font-size: 12px; color: gray; padding-left: 10px;\">" ."11.5小時" ."</p>";		
					//echo "<p class=\"price\">" ."$" .$row["price"] .
						//"&nbsp;<a href='addfavorite.php?vid={$row["vid"]}' style=\"width: 18px; height: 120px; float: right\">
						 //<img src=\"img/redheart.png\" style=\"width:18px; height:18px;\">
						 //</a></p>";	
					echo "</div>";
				echo "</div>";
			}
		
		echo "</div>";
			
	echo "</div>";
	

 	echo "<div class=\"pagebox\">";
		//echo '<p>' , '总记录数：', $count_array['nums'] , '，','显示 &nbsp' , $offset+1 , '~' , $offset+$pagesize , '</p>';
 
		$prepage=$p-1;
                         
		if($p==1){
			$prepage=1;                         
 	    }
 
		$nextpage=$p+1;
 
		if($p==$pagenum){
			$nextpage=$pagenum;                
 	    }
 	
		if ($pagenum > 1) {
			//echo " <a class=\"page\" href='sort.php?p=1{$url}'>首页</a>"; // 第一页
			//echo "<a class=\"page\" href='sort.php?p={$prepage}{$url}'>"上一页</a>";
			echo "<a class=\"page\" href='sort.php?p={$prepage}{$url}'><img src=\"img/left.png\"></a>";
			
			for($i=1;$i<=$pagenum;$i++) {
				if($i==$p) {
					//echo ' [',$i,']';	
					echo "<p class=\"page\">" .$i ."</p>";
			}
			
			else{
				echo " <a class=\"page\" href='sort.php?p=$i{$url}'> $i </a>";
			} 		
		}
 
		//echo "<a class=\"page\" href='sort.php?p={$nextpage}{$url}'>下一页</a>";
		echo "<a class=\"page\" href='sort.php?p={$prepage}{$url}'><img src=\"img/right.png\"></a>";
		//echo "<a class=\"page\" href='sort.php?p=$pagenum{$url}'>尾页</a>"; // 最后一页
	
	echo "</div>";
 					
 					
 }
	?>
	
	
	
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