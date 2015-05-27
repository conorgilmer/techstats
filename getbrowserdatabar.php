<?php
//   $q=$_GET["q"];
  $dbuser="root";
  $dbname="test";
  $dbpass="";
  $dbserver="localhost";

  $sql_query = "SELECT date, sum(chrome) as c, sum(firefox) as f, sum(safari) as s,sum(opera) as o, sum(ie) as i, sum(tor) as t from techused;";
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
      echo "{\"c\":[{\"v\":\"" . 'Chrome' . "\",\"f\":null},{\"v\":" . $row['c'] . ",\"f\":null},{\"v\":\"#006400\",\"f\":null}  ]},";
      echo "{\"c\":[{\"v\":\"" . 'Firefox' . "\",\"f\":null},{\"v\":" . $row['f'] . ",\"f\":null},{\"v\":\"#0000FF\",\"f\":null}]},";
      echo "{\"c\":[{\"v\":\"" . 'Safari' . "\",\"f\":null},{\"v\":" . $row['s'] . ",\"f\":null},{\"v\":\"#FF0000\",\"f\":null}]},";
      echo "{\"c\":[{\"v\":\"" . 'IE' . "\",\"f\":null},{\"v\":" . $row['i'] . ",\"f\":null},{\"v\":\"#008000\",\"f\":null}]},";
      echo "{\"c\":[{\"v\":\"" . 'Tor' . "\",\"f\":null},{\"v\":" . $row['t'] . ",\"f\":null},{\"v\":\"#00FF00\",\"f\":null}]},";
      echo "{\"c\":[{\"v\":\"" . 'Opera' . "\",\"f\":null},{\"v\":" . $row['o'] . ",\"f\":null},{\"v\":\"#800000\",\"f\":null}]} ";
    } else {
      echo "{\"c\":[{\"v\":\"" . 'opera' . "\",\"f\":null},{\"v\":" . $row['o'] . ",\"f\":null},{\"v\":\"#B12179\",\"f\":null}]}, ";
    }
  }
  echo " ] }";
  mysql_close($con);
?>
