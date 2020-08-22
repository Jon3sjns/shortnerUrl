<?php
include 'fungsi.php';
 ?>
 <!doctype html>
 <html lang="en">
   <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

     <title>Shortner url | Gapenting.xyz</title>
   </head>
   <body class="container">
     <h1 class="text-center" style="margin-top:100px">Short link | Gapenting.xyz</h1>
       <center>
         <div class="card text-dark bg-light mb-3" style="max-width: 40rem;">
           <form class="form-group" action="" method="post">
             <label class="mt-5" for="url_asli"><strong>Link/URL:</strong></label>
             <input type="url" name="url_asli" value="" placeholder="Masukan url(http/https)" id="url_asli" class="form-control" style="max-width:300px">
             <br>
             <input type="submit" name="submit" value="submit" class="btn btn-primary" style="max-width:100px">
           </form>
           <br>
           <br>
         </div>
       </center>
       <?php
       if ($_POST) {
         if(post("url_asli")){
           $url=post("url_asli");
           $tanggal=date("Y-m-d H:i:s");
           $inpot=input_db($url,$tanggal);
           if($inpot){
             ?>
             <center>
               <input type="text" name="" value="<?php echo $host."/".$inpot ?>" class="form-control" style="max-width:300px" onclick="this.select()" id="myInput" readonly>
               <br>
               <a href="index.php" class="btn btn-primary">Kembali!</a>
               <button type="button" name="button" onclick="myFunction()" class="btn btn-success">Copy!</button>
             </center>
             <?php
           }else {
             echo "gagal";
           }
         }else {
           echo "<div class='alert alert-danger'>Url harus di(isi)</div>";
         }
       }
        ?>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
     <script>
     	function myFunction() {
     	  var salin = document.getElementById("myInput");
     	  salin.select();
     	  document.execCommand("copy");
     	  alert("Text Berhasil di Salin");
     	  var result = document.getElementById("result");
     	  result.innerText = salin.value

     	}
   	</script>
   </body>
 </html>
