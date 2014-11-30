function getAjxaData(){
var data = $("#box").val();
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