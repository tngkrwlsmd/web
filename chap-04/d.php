<?php
  //for ($i = 0; $i < 10; $i++) {
  //  echo $i . "<br>";
  //  flush();
  //  ob_flush();
  //  sleep(1);
  //}
?>
<div id='divRst'></div>
<script>
  let rst = document.getElementById("divRst")
  for(let i = 0; i < 10; i++) {
    setTimeout(function() {
      rst.innerHTML += "<font color='red'>" + i + "</font>" + "<br>"
    }, 1000 * i)
  }
</script>