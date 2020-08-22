<?php
include "config.php";

function post($data){
  return @$_POST[$data];
}

function get($data){
  return @$_GET[$data];
}

function pendek_url(){
  $panjang=2;
  $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
  $string = '';
  for ($i = 0; $i < $panjang; $i++) {
  $pos = rand(0, strlen($karakter)-1);
  $string .= $karakter{$pos};
  }
  return $string.substr(uniqid(),6,5);
}

function input_db($url_asli,$tanggal){
  global $conn;
  $url_pendek=pendek_url();
  $url_asli=mysqli_real_escape_string($conn,$url_asli);
  $q="INSERT INTO url(url_pendek,url_asli,visitor,tanggal) values('$url_pendek','$url_asli',0,'$tanggal')";
  if (mysqli_query($conn,$q)) {
    return $url_pendek;
    exit;
  }else{
    return false;
    exit;
  }
}

//update visitor
function update_visitor($data){
  global $conn;
  $url=mysqli_real_escape_string($conn,$data);
  $visit=mysqli_query($conn,"SELECT * FROM url where url_pendek='$url'");
  $tambah_visitor=mysqli_fetch_array($visit)['visitor']+1;
  $q="UPDATE url SET visitor='$tambah_visitor' where url_pendek='$url'";

  if (mysqli_query($conn,$q)) {
    return true;
    exit;
  }else {
    return false;
    exit;
  }
}

function template_404(){
  return '
  <!doctype html>
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

      <title>404 Page not found</title>
    </head>
    <body>
  		<div style="margin-top:300px" class="text-center">
  			<h1>404</h1>
  			<h5>Page Not Found</h5>
  		</div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
  </html>
  ';
}

//redirect
function redirect($url){
  global $conn;
  $urlPendek_redirect=mysqli_real_escape_string($conn,$url);
  $query=mysqli_query($conn,"SELECT * FROM url where BINARY url_pendek='$urlPendek_redirect'");
  $var=mysqli_fetch_array($query);
  if(mysqli_num_rows($query)<1){
    echo template_404();
  }else{
    if (update_visitor($urlPendek_redirect)) {
      header("location:".$var['url_asli']);
    }else {
      return false;
    }
  }
}

 ?>
