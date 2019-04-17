<html>
<head>
  <title>Color Thing</title>

  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css?family=Poppins|Prata" rel="stylesheet">

</head>
<body>
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Color Thing</a>
<ul class="navbar-nav">
    <li class="nav-item">
      <a href="colorgen.php" class="nav-link">Make a Scheme</a>
  </li>
  <li class="nav-item">
      <a href="viewcolors.php" class="nav-link">View Schemes</a>

  </li>
</ul>
    </div>
    <br>
<div class="container" style="width: 700px;">
  <button class="btn btn-1" id="monobutton">Monochromatic</button>
  <button class="btn btn-2" id="anabutton">Analogic</button>
  <button class="btn btn-3" id="compbutton">Complementary</button>
  <div class="col" id="loadingCol">
    <!-- loading wheel -->
    <div class="d-flex justify-content-center">
      <div class="spinner-border text-dark m-5" role="status" id="loading">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
  </div>
  <div id="color-box">
  </div>
  <div id="color-box2">
  </div>
  <div id="color-box3">
  </div>
  <div id="color-box4">
  </div>
  <div id="color-box5">
  </div>
  <form id="colorsaver" method="post" action="save.php">
    <input id="finalcolor1" name="finalcolor1" type="text" style="display: none;" value=""></input>
    <input id="finalcolor2" name="finalcolor2" type="text" style="display: none;" value=""></input>
    <input id="finalcolor3" name="finalcolor3" type="text" style="display: none;" value=""></input>
    <input id="finalcolor4" name="finalcolor4" type="text" style="display: none;" value=""></input>
    <input id="finalcolor5" name="finalcolor5" type="text" style="display: none;" value=""></input>
    <input type="submit" value="Save" id="whatt"></input>
  </form>
</div>
  <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<script>
$(document).ready(function () {
  //--------------------------------------------Hid and show loading Gif on Ajax calls
    $('#loading').css('display','none');

    $( "#monobutton" ).click(function() {
      $('#loading').css('display','block');
    });
    $( "#anabutton" ).click(function() {
      $('#loading').css('display','block');
    });
    $( "#compbutton" ).click(function() {
      $('#loading').css('display','block');
    });

    function HideProgress(){
       $('#loading').css('display','none');
     }

    function ShowProgress() {
      if($('#loading').css('display') == "none"){
          $("#loading").show();
        }
    }
  //--------------------------------------------Hid and show loading Gif on Ajax calls

      var api_url;
      function getRandomHex() {
        var letters = '0123456789ABCDEF'.split('');
        var color = '#';
        for (var i=0; i<6; i++) {
          color += letters[Math.floor(Math.random() * 16)];
        }
      return color;
      //document.getElementById("color-box").style.backgroundColor = color;
    }

      $('#compbutton').on('click', function () {
        gotColor();
        function gotColor(position) {

          var letters = '0123456789ABCDEF'.split('');
          var color = '#';
          var hex = '';
          for (var i=0; i<6; i++) {
            hex += letters[Math.floor(Math.random() * 16)];
          }
          color += hex;

          api_url = 'http://thecolorapi.com/scheme?hex=' + hex + '&mode=analogic-complement';

          $.ajax({
            url : api_url,
            method : 'GET',
            dataType: "jsonp",
            beforesend: function(){
              ShowProgress();
            },
            complete: function(){
              HideProgress();
            },
            success : function (data) {
              var color1 = data.colors[0].hex.value;
              var name1 = data.colors[0].name.value;
              var color2 = data.colors[1].hex.value;
              var name2 = data.colors[1].name.value;
              var color3 = data.colors[2].hex.value;
              var name3 = data.colors[2].name.value;
              var color4 = data.colors[3].hex.value;
              var name4 = data.colors[3].name.value;
              var color5 = data.colors[4].hex.value;
              var name5 = data.colors[4].name.value;
              $('#color-box').css("background-color", color1);
              $('#color-box2').css("background-color", color2);
              $('#color-box3').css("background-color", color3);
              $('#color-box4').css("background-color", color4);
              $('#color-box5').css("background-color", color5);
              $('#whatt').css("display", "inline");
              $('#color-box').text(name1);
              $('#color-box2').text(name2);
              $('#color-box3').text(name3);
              $('#color-box4').text(name4);
              $('#color-box5').text(name5);
              $('#finalcolor1').val(color1);
              $('#finalcolor2').val(color2);
              $('#finalcolor3').val(color3);
              $('#finalcolor4').val(color4);
              $('#finalcolor5').val(color5);
              HideProgress();
            },
            error: function(){
              alert("Im sorry we have encountered an issue with our servers");
            }
      });
      //  document.getElementById("color-box").style.backgroundColor = color1;
   }
  });
$('#monobutton').on('click', function () {
        gotColor();
        function gotColor(position) {

          var letters = '0123456789ABCDEF'.split('');
          var color = '#';
          var hex = '';
          for (var i=0; i<6; i++) {
            hex += letters[Math.floor(Math.random() * 16)];
          }
          color += hex;

          api_url = 'http://thecolorapi.com/scheme?hex=' + hex;

          $.ajax({
            url : api_url,
            method : 'GET',
            dataType: "jsonp",
            beforesend: function(){
              ShowProgress();
            },
            complete: function(){
              HideProgress();
            },
            success : function (data) {
              var color1 = data.colors[0].hex.value;
              var name1 = data.colors[0].name.value;
              var color2 = data.colors[1].hex.value;
              var name2 = data.colors[1].name.value;
              var color3 = data.colors[2].hex.value;
              var name3 = data.colors[2].name.value;
              var color4 = data.colors[3].hex.value;
              var name4 = data.colors[3].name.value;
              var color5 = data.colors[4].hex.value;
              var name5 = data.colors[4].name.value;
              $('#color-box').css("background-color", color1);
              $('#color-box2').css("background-color", color2);
              $('#color-box3').css("background-color", color3);
              $('#color-box4').css("background-color", color4);
              $('#color-box5').css("background-color", color5);
              $('#whatt').css("display", "inline");
              $('#color-box').text(name1);
              $('#color-box2').text(name2);
              $('#color-box3').text(name3);
              $('#color-box4').text(name4);
              $('#color-box5').text(name5);
              $('#finalcolor1').val(color1);
              $('#finalcolor2').val(color2);
              $('#finalcolor3').val(color3);
              $('#finalcolor4').val(color4);
              $('#finalcolor5').val(color5);
              HideProgress();
            },
            error: function(){
              alert("Im sorry we have encountered an issue with our servers");
            }
      });
      //  document.getElementById("color-box").style.backgroundColor = color1;
   }
  });

  $('#anabutton').on('click', function () {
    gotColor();
    function gotColor(position) {

      var letters = '0123456789ABCDEF'.split('');
      var color = '#';
      var hex = '';
      for (var i=0; i<6; i++) {
        hex += letters[Math.floor(Math.random() * 16)];
      }
      color += hex;

      api_url = 'http://thecolorapi.com/scheme?hex=' + hex + '&mode=analogic';

      $.ajax({
        url : api_url,
        method : 'GET',
        dataType: "jsonp",
        beforesend: function(){
          ShowProgress();
        },
        complete: function(){
          HideProgress();
        },
        success : function (data) {
          var color1 = data.colors[0].hex.value;
          var name1 = data.colors[0].name.value;
          var color2 = data.colors[1].hex.value;
          var name2 = data.colors[1].name.value;
          var color3 = data.colors[2].hex.value;
          var name3 = data.colors[2].name.value;
          var color4 = data.colors[3].hex.value;
          var name4 = data.colors[3].name.value;
          var color5 = data.colors[4].hex.value;
          var name5 = data.colors[4].name.value;
          $('#color-box').css("background-color", color1);
          $('#color-box2').css("background-color", color2);
          $('#color-box3').css("background-color", color3);
          $('#color-box4').css("background-color", color4);
          $('#color-box5').css("background-color", color5);
          $('#whatt').css("display", "inline");
          $('#color-box').text(name1);
          $('#color-box2').text(name2);
          $('#color-box3').text(name3);
          $('#color-box4').text(name4);
          $('#color-box5').text(name5);
          $('#finalcolor1').val(color1);
              $('#finalcolor2').val(color2);
              $('#finalcolor3').val(color3);
              $('#finalcolor4').val(color4);
              $('#finalcolor5').val(color5);
              HideProgress();
        },
        error: function(){
          alert("Im sorry we have encountered an issue with our servers");
        }
  });
  //  document.getElementById("color-box").style.backgroundColor = color1;
}
});
});
</script>
<script>
  function getColor() {
    var bgcolor1 = document.getElementById("color-box").style.backgroundColor;
    console.log(bgcolor1);
  }
</script>
</body>
</html>
