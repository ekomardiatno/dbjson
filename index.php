<?php 
error_reporting(0);

mysql_connect('localhost', 'root', '');
mysql_select_db('desma');

$sql = "SELECT * FROM item";
$query = mysql_query($sql);
if(mysql_num_rows($query) > 0){
	$response = array();
	$response['data'] = array();
	while($r = mysql_fetch_array($query)){
		$h['id_item'] = $r['id_item'];
		$h['id_kriteria'] = $r['id_kriteria'];
		$h['nm_item'] = $r['nm_item'];
		$h['nilai'] = $r['nilai'];
		array_push($response["data"], $h);
	}
	$json = json_encode($response['data']);

	// print $json;

	if (file_put_contents("data.json", $json))
	    echo "File JSON sukses dibuat...";
	else 
	    echo "Oops! Terjadi error saat membuat file JSON...";
}else{
	$response['msg'] = 'Data tidak ditemukan';
	print json_encode($response);
}
?>