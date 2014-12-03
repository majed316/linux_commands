function getAjxaData(){
var data = $("#box").val();
var minlength = "2";
var value = $("#box").val();
if(value.length > minlength){
        $.ajax({
        type : "post",
        url : "ajax_search.php",
        data : "term=" + data,
        success : function(result){
            $("#result").html(result);
            $("#result").css("border","solid black 1px");
                }        
        
        });
        } 
}
