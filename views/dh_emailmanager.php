<?php

#$dh_array=json_decode($_POST['csv']);

/*
$dh_array=array
(
    0 => array
        (
            'id' => '40',
            'time' => '2016-06-08 18:43:56',
            'email' => 'info@deinoberbayern.com',
            'name' => 'italo iano',
            'lang' => 'italiano'
        )
);
*/


function convertForExcel($str) {
  return mb_convert_encoding($str, "Windows-1252", mb_detect_encoding(
    $str,
    "UTF-8, ISO-8859-1, ISO-8859-15",
    true
  ));
}


function array2csv(array &$array)
{
	if (count($array) == 0) {
	 return null;
	}
	ob_start();
	$df = fopen("php://output", 'w');
	fputcsv($df, array_keys(reset($array)));
	fputcsv($df, array('Email', 'Name', 'Language', 'Time'), ';');
	
	foreach ($array as $row) {
	  fputcsv($df, array('email'=>convertForExcel($row->email), 'name'=>convertForExcel($row->name), 'lang'=>convertForExcel($row->lang), 'time'=>$row->time), ';');
	}
	fclose($df);
	return ob_get_clean();
}

function download_send_headers($filename) {
    // disable caching
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

    // force download  
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");

    // disposition / encoding on response body
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}

download_send_headers("data_export_" . date("Y-m-d") . ".csv");





$con1=convertForExcel('äää');
$con2=convertForExcel('äää');
$list = array (
    array($con1, $con2, 'ccc', 'dddd'),
    array('123', '456', '789'),
    array('"aaa"', '"bbb"')
);


#print_r(json_decode($_POST['csv']));

#foreach (json_decode($_POST['csv']) as $value) 
#    $array[] = $value->email;
	
#print_r($array)

$dh_array=json_decode($_POST['csv']);
#$dh_array = json_decode(json_encode($object), true);
echo array2csv($dh_array);
#echo array2csv($list);


/*
#echo array2csv($dh_array);
#die();
*/




/*
$list = array (
    array('aaa', 'bbb', 'ccc', 'dddd'),
    array('123', '456', '789'),
    array('"aaa"', '"bbb"')
);

$fp = fopen("php://output", 'w');

foreach ($list as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);
*/

?>

<?php
/*
<h1><?php echo $title; ?></h1>
*/
#print_r($dh_output);
?>
