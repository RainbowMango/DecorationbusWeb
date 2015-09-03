<?php
function getResult($result) {
	$ret=array();
  $ret["code"] = $result->getCode();
  $ret["msg"] = $result->getMsg();
	return $ret;
}

// output
$str = json_encode(getResult($result));
if ($callback == "") {
  print("\n$str");
} else {
  print("\n$callback=$str");
}

?>
