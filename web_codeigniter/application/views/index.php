<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Short link | Gapenting.xyz</title>

        <!-- <style>
          .container {
            background: url() no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
          }
        </style> -->
  </head>
  <body class="container">

    <h1 class="text-center" style="margin-top:100px">Short link | Gapenting.xyz</h1>


      <center>
        <div class="card text-dark bg-light mb-3" style="max-width: 40rem;">

          <form class="form-group" action="<?php echo base_url() ?>" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
            <label class="mt-5" for="url_asli"><strong>Link/URL:</strong></label>
            <input type="url" name="url_asli" value="" placeholder="Masukan url(http/https)" id="url_asli" class="form-control <?php echo form_error("url_asli")?"is-invalid":"" ?>" style="max-width:300px">
            <div class="invalid-feedback">
              <?php echo form_error("url_asli") ?>
            </div>
            <br>
            <input type="submit" name="submit" value="submit" class="btn btn-primary" style="max-width:100px">
          </form>
          <br>
          <br>
          <br>

        </div>
      </center>

    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
