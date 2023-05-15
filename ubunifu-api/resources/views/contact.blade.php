<!DOCTYPE html>
<head>
  <title> Sample API Page</title>
</head>

<body>
<button id = "btn"> Click on this button to fetch data from our API </button>
<div id = "message" style = "display:none">
<h1> Sample API Test </h1>

<div id="databaseresponse" style="width:200px;height:50px;background:red;"></div>
</div>

<script src = "https://ajax.aspnetCDN.com/ajax/jQuery/jQuery-1.9.0.min.js"></script>

<script>
(window.jQuery || document.write('<script src = "https://cdn.educba.com/scripts/jQuery-1.9.0.min.js"><\/script>'));
</script>
<script>
function domReady () {
$('#btn').click( showMessage );
}

function showMessage () {
    
    $.get("api/fetch-menu",function(data){

        var mydbmenus = data.menus;

        mydbmenus.forEach(function(mn){

            $('#databaseresponse').append(mn.menu_name); 
            
        });      
        

    },"json");

$('#message').fadeIn ('slow');
}
//to do.
//post values in your database using the api built.




$(domReady);
</script>
</body>
</html>