<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Shortner URL | Gapenting.xyz</title>
  </head>
  <body class="container">

    <center>
      <div class="card text-dark bg-light mb-3" style="max-width: 40rem; margin-top:130px">

        <h3 class="mt-5">Sukses!</h3>
        <input type="text" name="" value="<?php echo base_url().$url ?>" class="form-control" id="myInput" style="max-width:400px" readonly>
          <br>
          <button onclick="document.location='<?php echo base_url() ?>'" style="max-width:100px" class="btn btn-primary">Kembali</button>
          <br>
          <button onclick="myFunction()" class="btn btn-success" style="max-width:100px">Copy!</button>
        <br>
        <br>
        <br>

      </div>
    </center>

    <script type="text/javascript">
    function myFunction() {
  	  var salin = document.getElementById("myInput");
  	  salin.select();
  	  document.execCommand("copy");
  	  alert("Text Berhasil di Salin");
  	  var result = document.getElementById("result");
  	  result.innerText = salin.value

  	}
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
