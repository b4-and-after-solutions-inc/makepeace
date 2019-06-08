<?php

/* For Highlighting Menu. $keyword must be found at current PHP File */
function menu($keyword) {

	if (strpos(basename($_SERVER['PHP_SELF']), $keyword) !== false) {
    echo "class=\"active\"";
	} else {
		echo "";
	}
}

function convertRole ($role) {
	switch ($role) {
		case "1": return "Administrator"; break;
		default: return "Void"; break;
	}
}

function updateSync ($ID, $Table) {
	date_default_timezone_set('Asia/Manila');
	$date = date("Y-m-d H:i:s");

	$insertedID = "0";
	if($ID == "0") {
		$insertedID = mysqli_insert_id($GLOBALS['connect']);
		$ID = $insertedID;
	}

	$query = "UPDATE $Table SET updateddate = '$date' WHERE id = $ID";
	$result = mysqli_query($GLOBALS['connect'], $query);

	return $result;

}

function validate ($data) {
	$data = htmlspecialchars($data);
	$data = mysqli_real_escape_string($GLOBALS['connect'], $data);

	return $data;
}

function showAlert ($alertStatus, $alertContent) {

	switch ($alertStatus) {
		case "fail":  $alertType = "alert-danger";  $alertIcon = "ban";     break;
		case "info":    $alertType = "alert-info";    $alertIcon = "info";    break;
		case "ewan":    $alertType = "alert-warning"; $alertIcon = "warning"; break;
		case "success": $alertType = "alert-success"; $alertIcon = "check";   break;
		default:
			$alertType = "bg-gray";
			$alertIcon = "warning";
			$alertContent = "Invalid Alert Content";
			break;
	}

	echo "
	<div class=\"row\">
		<div class=\"col-xs-12\">
			<div class=\"alert $alertType alert-dismissible\">
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
			<h4><i class=\"icon fa fa-$alertIcon\"></i> Alert!</h4>
			$alertContent
			</div>
		</div>
	</div>
	";
}

?>
