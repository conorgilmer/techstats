<?php

$connect = mysql_connect('127.0.0.1','root','');

if (!$connect) {
	die('Could not connect to MySQL: ' . mysql_error());
}

$cid =mysql_select_db('test',$connect);
// supply your database name

define('CSV_PATH','C:/wamp/www/csvfile/');
// path where your CSV file is located

//$csv_file = CSV_PATH . "dadwalking.csv"; // Name of your CSV file
$csv_file = "techused.csv"; // Name of your CSV file
$csvfile = fopen($csv_file, 'r');
$theData = fgets($csvfile);
$i = 0;
while (!feof($csvfile)) {
$csv_data[] = fgets($csvfile, 1024);
$csv_array = explode(",", $csv_data[$i]);
$insert_csv = array();
$insert_csv['id']         = "";
$insert_csv['date']       = $csv_array[0];
$insert_csv['chrome']     = $csv_array[1];
$insert_csv['safari']     = $csv_array[2];
$insert_csv['firefox']    = $csv_array[3];
$insert_csv['tor']        = $csv_array[4];
$insert_csv['opera']      = $csv_array[5];
$insert_csv['ie']         = $csv_array[6];
$insert_csv['mac']        = $csv_array[7];
$insert_csv['linux']      = $csv_array[8];
$insert_csv['windows']    = $csv_array[9];
$insert_csv['vim']        = $csv_array[10];
$insert_csv['eclipse']    = $csv_array[11];
$insert_csv['netbeans']   = $csv_array[12];
$insert_csv['anaconda']   = $csv_array[13];
$insert_csv['sublime']    = $csv_array[14];
$insert_csv['php']        = $csv_array[15];
$insert_csv['perl']       = $csv_array[16];
$insert_csv['java']       = $csv_array[17];
$insert_csv['python']     = $csv_array[18];
$insert_csv['c']          = $csv_array[19];
$insert_csv['awk']        = $csv_array[20];
$insert_csv['latex']      = $csv_array[21];
$insert_csv['word']       = $csv_array[22];
$insert_csv['oo']         = $csv_array[23];
$insert_csv['excel']      = $csv_array[24];
$insert_csv['wp']      = $csv_array[25];
$insert_csv['htmlcss']    = $csv_array[26];
$dateadded = date("Y-m-d", strtotime($insert_csv['date']));
echo $dateadded . "<br>";
$query = "INSERT INTO techused (id,date, chrome, safari, firefox, tor, opera, ie, mac, linux, windows, vi, eclipse, netbeans, anaconda, sublime, php, perl, java, python, c, awk, latex, word, oo, excel,wordpress, htmlcss)
VALUES('','".$dateadded."' ,'".$insert_csv['chrome']."' ,'".$insert_csv['safari']."','".$insert_csv['firefox']."',  '".$insert_csv['tor']."' ,'".$insert_csv['opera']."' ,'".$insert_csv['ie']."' ,'".$insert_csv['mac']."' ,'".$insert_csv['linux']."'  ,'".$insert_csv['windows']."'  ,'".$insert_csv['vim']."'  ,'".$insert_csv['eclipse']."'  ,'".$insert_csv['netbeans']."'  ,'".$insert_csv['anaconda']."'  ,'".$insert_csv['sublime']."'  ,'".$insert_csv['php']."'  ,'".$insert_csv['perl']."'  ,'".$insert_csv['java']."'  ,'".$insert_csv['python']."'  ,'".$insert_csv['c']."'  ,'".$insert_csv['awk']."'  ,'".$insert_csv['latex']."'  ,'".$insert_csv['word']."' ,'".$insert_csv['oo']."' ,'".$insert_csv['excel']."'  ,'".$insert_csv['wp']."' ,'".$insert_csv['htmlcss']."')";
$n=mysql_query($query, $connect );
$i++;
print_r($insert_csv);
echo "<br>";
echo $query;
}
fclose($csvfile);

echo "File data successfully imported to database!!";
mysql_close($connect);
?>
