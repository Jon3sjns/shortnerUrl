<?php
include 'fungsi.php';
$url=get("url");
if ($url) {
  redirect($url);
}else {
  echo "cek config!";
}
 ?>
