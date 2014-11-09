/* 
 * Author : Majed Ali
 * TODO LIST:
 * 1- Grab table body DOM's and pass it to newRow().                                                            DONE
 * 2- Create newRow() function, which repeat "table body" multiple times.                                       DONE
 * 3- Create returnValidatedData(), which is responsiple about collecting data off form and validate it.        DONE
 * 4- If JavaScript enabled, then the post() function will pass the data array to addcommand.php file.          DONE
 * 5- If JavaScript disabled, then the form will be submitted as usual, without being javascript envolved.      DONE
 */

var text = document.getElementById("tblbdy").innerHTML;
function newRow() {
    var newRow = document.createElement("tr");
    var tblbdy = document.getElementById("tblbdy");
    newRow.innerHTML = text;
    tblbdy.appendChild(newRow);
}

function returnValidatedData() {
    var fields = document.getElementsByTagName("input");
    var catId = document.getElementById("cats").value;
    var text = '';
    for(var i = 0; i < fields.length-1; i++){
        if(fields[i].value !== "" && fields[i+1].value !== "" && fields[i+2].value !== ""){
            text += fields[i].value + "|||" + fields[i+1].value + "|||" + fields[i+2].value + "|||" + catId + "\n";
        }
        i += 2;
    }
    return text;
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