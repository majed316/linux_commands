function getAjxaData(){
var data = $("#box").val();
if(data.length > 2){
        $.ajax({
        type : "post",
        url : "ajax_search.php",
        data : "term=" + data,
        success : function(result){
            $("#result").html(result);
            $("#result").css("display","block");
                }        
        });
        } else{
            $("#result").html("");
            $("#result").css("display","none");
        }
}
