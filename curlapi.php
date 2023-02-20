<?php
echo '<meta charset="utf-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
// echo '<link rel="stylesheet" href="style.css">';
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">';
echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>';

$ch = curl_init();
$url = "http://img.adhi-info.com/api/api.php/records/customers";

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($ch);

if ($e = curl_error($ch)) {
	echo $e;
} else {
	$decoded = json_decode($resp, true);
	//print_r($decoded);
	//echo  $decoded[records][0][first_name];
	foreach ($decoded as $row) {
		echo '<h1 class="margin: 500px">Consume API</h1>';
		echo '<div class="container m-3">';
		echo '<table class="table table table-info table-striped">';
		echo '<thead>';
		echo '<tr>';
		echo '<th>ID</th>';
		echo '<th>First Name</th>';
		echo '<th>Last Name</th>';
		echo '<th>Email</th>';
		echo '<th>Job Title</th>';
		echo '<th>NO Bisnis</th>';
		echo '<th>Telp Rumah</th>';
		echo '<th>NO HP</th>';
		echo '<th>FAX</th>';
		echo '<th>Alamat</th>';
		echo '<th>Kota</th>';
		echo '<th>Provinsi</th>';
		echo '<th>Kode Pos</th>';
		echo '<th>Negara</th>';
		echo '<th>Web</th>';
		echo '<th>Note</th>';
		echo '<th>Attachmens</th>';
		echo '</tr>';
		echo '</thead>';
		foreach ($row as $key => $rows) {
			//echo $key;
			echo '<tr>';
			echo '<td>' . $row[$key]['id'] . '</td>';
			echo '<td>' . $row[$key]['first_name'] . '</td>';
			echo '<td>' . $row[$key]['last_name'] . '</td>';
			echo '<td>' . $row[$key]['email_address'] . '</td>';
			echo '<td>' . $row[$key]['job_title'] . '</td>';
			echo '<td>' . $row[$key]['business_phone'] . '</td>';
			echo '<td>' . $row[$key]['home_phone'] . '</td>';
			echo '<td>' . $row[$key]['mobile_phone'] . '</td>';
			echo '<td>' . $row[$key]['fax_number'] . '</td>';
			echo '<td>' . $row[$key]['address'] . '</td>';
			echo '<td>' . $row[$key]['city'] . '</td>';
			echo '<td>' . $row[$key]['state_province'] . '</td>';
			echo '<td>' . $row[$key]['zip_postal_code'] . '</td>';
			echo '<td>' . $row[$key]['country_region'] . '</td>';
			echo '<td>' . $row[$key]['web_page'] . '</td>';
			echo '<td>' . $row[$key]['notes'] . '</td>';
			echo '<td>' . $row[$key]['attachments'] . '</td>';
			echo '</tr>';
		}
	}
}

curl_close($ch);
