<?php
session_start();
if(isset($_SESSION['loaded'])){
 $_SESSION['loaded']++;
} else {
 $_SESSION['loaded'] = 0;
}
echo " this page loaded ".$_SESSION['loaded'] . "tiem .<br/>";
?>
<!doctype htmle> 
<html>
 <head>
 <meta charset="utf-8">
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
 
 <title>
 Test Ajax 
 </title>
 <script type="text/javascript">
 function getajaxdata(){
 var data = ${"#box"}.val();
 $.ajax({
 type : "post",
 url : "ajax_search.php",
 data : "term" + data ,
 success : function(result){
 ${"#result"}.html(result);
 }
 });
 }
 </script>
 </head>
 <body>
 <input type="text" id="box"/> 
 <br/>
 <button id="bin" onclick="getajaxdata()"> search </button>
 <br>
 
 <div id="result">
 here come result 
 </div>
 
 
 
 </body>
</html>