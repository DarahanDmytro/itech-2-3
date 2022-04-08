$(document).ready(function() {
  $("#nurses").click(function(e){
    e.preventDefault();
    const ajax = new XMLHttpRequest();
    ajax.open("POST","nurses.php",true);
    ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    var department = $('#select_department option:selected').text();
    ajax.send("department="+department);
    ajax.onload = async function(){
        if(ajax.status===200){
            var out = "";
            var res = await ajax.responseXML;
            var rows = res.firstChild.children
            for (var i = 0; i < rows.length; i++) {
                alert(rows[i]);
                out += "<tr>";
                out += "<td>" + rows[i].children[0].firstChild.nodeValue + "</td>";
                out += "<td>" + rows[i].children[1].nodeValue + "</td>";
                out += "</tr>";
            }

            out = '<table id="myTable" class="table_dark"><caption><b>Відділення ' + department+'</b></caption>' + out + '</table>';
            $("#report").html(out);
            $("#report").show();
        }
    }
  });

  $("#shifts").click(function(e){
    e.preventDefault();
    var shift = $('#select_shift option:selected').val();
    $("#report").load(
        "shifts.php",
        {
            "shift": shift
        }
    );
    $("#report").show();
  });


  $("#wards").click(function(e){
    e.preventDefault();
    const ajax = new XMLHttpRequest();
    ajax.open("POST","wards.php",true);
    ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    var nurse = $('#select_nurse option:selected').text();
    ajax.send("nurse="+nurse);
    ajax.onload = async function(){
        if(ajax.status===200){
            var res = await ajax.response;
            res = JSON.parse(res);
            var out = "";
            for(i in res) {
               out += "<tr><td>Палата</td><td>" + res[i].name + "</td></tr>";
            }

            out = '<table id="myTable" class="table_dark"><caption><b>Медсестра '+ nurse + '</b></caption>' + out + '</table>';
            $("#report").html(out);
            $("#report").show();
        }
    }
  });
});