<?php
//   $q=$_GET["q"];
  $dbuser="root";
  $dbname="test";
  $dbpass="";
  $dbserver="localhost";

  $sql_query = "SELECT date, sum(mac) as m, sum(linux) as l, sum(windows) as w  from techused;";
  $con = mysql_connect($dbserver,$dbuser,$dbpass);
  if (!$con){ die('Could not connect: ' . mysql_error()); }
  mysql_select_db($dbname, $con);
  $result = mysql_query($sql_query);
  echo "{ \"cols\": [ {\"id\":\"\",\"label\":\"Party\",\"pattern\":\"\",\"type\":\"string\"}, {\"id\":\"\",\"label\":\"Percentage\",\"pattern\":\"\",\"type\":\"number\"}, {\"id\":\"\",\"role\":\"style\",\"type\":\"string\"} ], \"rows\": [ ";
  $total_rows = mysql_num_rows($result);
  $row_num = 0;
  while($row = mysql_fetch_array($result)){
    $row_num++;
    if ($row_num == $total_rows){
      echo "{\"c\":[{\"v\":\"" . 'Mac' . "\",\"f\":null},{\"v\":" . $row['m'] . ",\"f\":null},{\"v\":\"#006400\",\"f\":null}  ]},";
      echo "{\"c\":[{\"v\":\"" . 'Windows' . "\",\"f\":null},{\"v\":" . $row['w'] . ",\"f\":null},{\"v\":\"#0000FF\",\"f\":null}]},";
      echo "{\"c\":[{\"v\":\"" . 'Linux' . "\",\"f\":null},{\"v\":" . $row['l'] . ",\"f\":null},{\"v\":\"#FF0000\",\"f\":null}]},";
    } else {
      echo "{\"c\":[{\"v\":\"" . 'mac' . "\",\"f\":null},{\"v\":" . $row['m'] . ",\"f\":null},{\"v\":\"#B12179\",\"f\":null}]}, ";
    }
  }
  echo " ] }";
  mysql_close($con);
?>
