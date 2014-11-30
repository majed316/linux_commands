   function getAjxaData(){
            var data = $("#box").val();
            $.ajax({
                type : "post",
                url : "Ajax_search.php",
                data : "term=" + data ,
               success: function(result){
                    $("#result").html(result);
                }
                compelete:function({
                	$("#result").css
                })
            });
        }