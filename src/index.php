<!-- Proud to be BOOTSTRAP FREE! -->
<!-- made by Marfprojects (marvin Ferwerda) rev 1 -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MarfHomePage</title>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/mff.min.js"></script>
    <link href="css/style.css" rel="stylesheet"/>
  </head>
  <body>
    <?php
    $lijst = array(
      array("youtube", "http://www.youtube.com", 'e52d27'),
      array("9gag", "http://www.9gag.com", 'ffffff'),
      array("sharepoint", "http://student.idcollege.nl/", '0072c6'),
      array("idc", "http://files.aomd.nl/", 'ffffff'),
      array("untis", "https://tritone.webuntis.com/WebUntis/?school=ID-Zoetermeer#Timetable?type=1&filter.departmentId=-1&formatId=1&id=3688", "ffffff"),
      array("dropbox", "http://www.dropbox.com", "007be1"),
      array("c9", "http://c9.io", "ffffff"),
      array("digitalocean", "https://www.digitalocean.com/", "2e85bb"),
      array("github", "http://www.github.com", "ffffff"),
      array("macfag", "http://tedvanriel.nl/Projects/macfag/", "E52A2A")
    );
    foreach($lijst as $val){
      echo("<button onclick='goUrl(\" " . $val[1] . "\");' style='background-color: #" . $val[2] . ";'><center><div id='image-container' style='background-image:url(img/" . $val[0] . ".png);'></div></center></button>");
    }
    ?>
    <!-- Yes i needed to do CENTER BECAUSE CSS IS A BITCH -->
    <button onclick="Google();" style="background-color: white;"> <center><div id='image-container' style='background-image:url(img/google.png);'></center> </button>
    <script>
    function Google(){
      var zoek = prompt("Wat wilt u googlen?");
      if (zoek == null || zoek == "")
      {

      }
      else {
        goUrl("https://www.google.nl/search?q=" + encodeURI(zoek));
      }
    }
    </script>
    <p id="disclaimer">Disclaimer: all the logos are trademarked and/or copyrighted by the respected owners. Marfprojects and Sweetnyancaft are not affiliated with them in anyway.<br>Site made by Marvin Ferwerda</p>
  </body>
</html>
