<html>
  <body>
    Welcome <?=$_POST["name"]; ?> <br>
    Your email address is <?=$_POST["email"]; ?><br><br>
    <?php
      $sMail = $_POST["email"];
      echo $sMail . "<br>";

      $iPos = strpos($sMail, "@");
      echo $iPos . "<br>";
      
      echo "Name: " . substr($sMail, 0, $iPos) . "<br>";
      echo "Domain : " . substr($sMail, $iPos + 1) . "<br>";
      echo substr($sMail, -3, 3) . "<br>";

      $iToLen = strlen($sMail);
      echo $iToLen . "<br>";
      $iDomainLen = $iToLen - $iPos; # 17 - 7 = 10
      echo substr($sMail, -$iDomainLen + 1) . "<br>";
    ?>
  </body>
</html>