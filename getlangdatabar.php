<?php
//   $q=$_GET["q"];
  $dbuser="root";
  $dbname="test";
  $dbpass="";
  $dbserver="localhost";

  $sql_query = "SELECT date, sum(java) as j, sum(php) as p, sum(python) as y,sum(awk) as a, sum(perl) as l, sum(c) as c from techused;";
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
      echo "{\"c\":[{\"v\":\"" . 'Java' . "\",\"f\":null},{\"v\":" . $row['j'] . ",\"f\":null},{\"v\":\"#006400\",\"f\":null}  ]},";
      echo "{\"c\":[{\"v\":\"" . 'Php' . "\",\"f\":null},{\"v\":" . $row['p'] . ",\"f\":null},{\"v\":\"#0000FF\",\"f\":null}]},";
      echo "{\"c\":[{\"v\":\"" . 'Python' . "\",\"f\":null},{\"v\":" . $row['y'] . ",\"f\":null},{\"v\":\"#FF0000\",\"f\":null}]},";
      echo "{\"c\":[{\"v\":\"" . 'Awk' . "\",\"f\":null},{\"v\":" . $row['a'] . ",\"f\":null},{\"v\":\"#008000\",\"f\":null}]},";
      echo "{\"c\":[{\"v\":\"" . 'Perl' . "\",\"f\":null},{\"v\":" . $row['l'] . ",\"f\":null},{\"v\":\"#00FF00\",\"f\":null}]},";
      echo "{\"c\":[{\"v\":\"" . 'c/cpp' . "\",\"f\":null},{\"v\":" . $row['c'] . ",\"f\":null},{\"v\":\"#800000\",\"f\":null}]} ";
    } else {
      echo "{\"c\":[{\"v\":\"" . 'opera' . "\",\"f\":null},{\"v\":" . $row['c'] . ",\"f\":null},{\"v\":\"#B12179\",\"f\":null}]}, ";
    }
  }
  echo " ] }";
  mysql_close($con);
?>
