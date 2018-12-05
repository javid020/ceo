<?php
function getTotal() {
$balance = 240;
$days = 60;
for($i = 0; $i < $days; $i++) {
	$balance = $balance + ($balance * 0.03);
}
echo $balance . "\r\n";
}

getTotal();
 ?>