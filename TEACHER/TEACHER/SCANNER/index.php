<?php

// Including the autoload file
require('vendor/autoload.php');

use Zxing\QrReader;

$msg = "";
if (isset($_POST['upload'])) {
  $filename = $_FILES["qrCode"]["name"];
  $filetype = $_FILES["qrCode"]["type"];
  $filetemp = $_FILES["qrCode"]["tmp_name"];
  $filesize = $_FILES["qrCode"]["size"];

  $filetype = explode("/", $filetype);
  if ($filetype[0] !== "image") {
    $msg = "File type is invalid: " . $filetype[1];
  } elseif ($filesize > 5242880) {
    $msg = "File size is too big. Maximum size is 5 MB.";
  } else {
    $newfilename = md5(rand() . time()) . $filename;
    move_uploaded_file($filetemp, "uploads/" . $newfilename);

    //IF YOU WANT LINK 
    $qrScan = new QrReader("uploads/" . $newfilename);

   //TRIMMED VERSION
     $url = $qrScan->text(); 
            $parts = parse_url($url);
            $output = [];

            parse_str($parts['query'], $output);
            $email = $output['email'];
            // $stud_lrn = $output['stud_lrn'];
            $actual = trim($email,"/");  
            // $lrn  = trim($stud_lrn,"/");
   
    $msg = "<br><center><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal'>" .$actual. "</button></center>";
   
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <title>QR SEARCH</title>
</head>

<body class="bg-light">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-5 mx-auto">
        
        <div class="card card-body p-5 rounded border bg-white">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="qrCode" class="form-label">Upload your QR Code Image</label>
              <input class="form-control" type="file" accept="image/*" name="qrCode" id="qrCode" required>
            </div>
            <button type="submit" name="upload" class="btn btn-primary" style="width:100%;">
              Convert it
            </button>
          </form>
        <p><?= $msg; ?></p>
        </div>

      </div>
    </div>
  </div>


    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
          <?php

            // $url = $qrScan->text();   
            // $parts = parse_url($url);
            // $output = [];
            // parse_str($parts['query'], $output);
            // var_dump($output);

            $url = $qrScan->text(); 
            $parts = parse_url($url);
            $output = [];
            parse_str($parts['query'], $output);
            $email = $output['email'];
            $actual = trim($email,"/");  
           ?>
           <iframe src="profile/?student_name=<?php echo $actual; ?>" style="width:100%; height:700px;"></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>