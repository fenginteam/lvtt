<?php
//dezend by  QQ:2172298892
require 'include.php';
$mq = $c->notify();
$i = 0;

while (1) {
	$mq->pub('order.new', 'message hello world: ' . $i++);
	echo 'send ' . $i . " \n";
}

?>
