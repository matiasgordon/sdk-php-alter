<?php
require_once "lib/mercadopago.php";

$mp = new MP('CLIENT_ID', 'CLIENT_SECRET');

// Filtros
$filters = array (
	"status" => "approved",
	"sort" => "date_created",
	"criteria" => "desc"
);

$search_result  = $mp->search_payment ($filters, 0, 10);
$data = $search_result["response"]["results"];

// Titulos
echo "id,date_created,currency_id,transaction_amount"."\n";

// Datos
foreach($data as $row) {
	
	echo ($row["collection"]["id"].",");
	echo ($row["collection"]["date_created"].",");
	echo ($row["collection"]["currency_id"].",");
	echo ($row["collection"]["transaction_amount"]."\n");
}

// Archivo
$filename = "cobros.csv";
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: text/csv");

exit;
?>