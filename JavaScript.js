/* 
 * Author : Majed Ali
 * TODO LIST:
 * 1- 
 */

var text = document.getElementById("tblbdy").innerHTML;
function newRow() {
    var newRow = document.createElement("tr");
    var tblbdy = document.getElementById("tblbdy");
    newRow.innerHTML = text;
    tblbdy.appendChild(newRow);
}

function returnValue() {
    var fields = document.getElementsByTagName("input");
    var catId = document.getElementById("cats").value;
    var text = '';
    for(var i = 0; i < fields.length; i++){
        if(fields[i].type == "text" && fields[i].value != ""){
            if (fields[i].name != "syntax"){
                text += fields[i].value + "|||";
            }else{
                text += fields[i].value + "|||" + catId + "\n";
            }
        }
    }
    return text;
}

function showInner(){ // <-- for debugging purposes.
    var tbl = document.getElementById("tblbdy");
    alert(tbl.innerHTML);
}

function post(path, dataArray, method) {
    var button = document.getElementById("submit"); // those two lines to disable form default _
    button.setAttribute("disabled", "disabled");    // submiting and let javascript submit it.
    method = method || "post";
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "data");
    hiddenField.setAttribute("value", dataArray);

    form.appendChild(hiddenField);
    document.body.appendChild(form);
    form.submit();
}

function returnCat(){
    var selectedCat = document.getElementById("cats").value;
    alert(selectedCat);
}

function showValue(){
    alert(returnValue());
}