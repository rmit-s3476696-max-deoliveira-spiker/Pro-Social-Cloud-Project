<?php 
    session_start();
   // require_once 'php/google-api-php-client/vendor/autoload.php';
    $file_name = preg_replace('/\s+/', '_', $_FILES['fileToUpload']['name']);
    $temp_name = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_size = $_FILES['fileToUpload']['size'];
    $store = $_SESSION['getUserByEmail'];
    //All file icons URL reference:http://kev-simpson.me/img/flat-files.png
    if (($file_type == "image/gif") || ($file_type == "image/png") || ($file_type == "image/jpeg"))
    {
      $img_type = "images/image.png";
    }
    else if (($file_type == "application/vnd.ms-excel") 
      ||($file_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"))
    {
      $img_type = "images/xls.png";
    }
    else if ($file_type == "text/plain")
    {
      $img_type = "images/text.png";
    }
    else if (($file_type == "application/vnd.ms-powerpoint") 
      || ($file_type == "application/vnd.openxmlformats-officedocument.presentationml.presentation"))
    {
      $img_type = "images/ppt.png";
    }
    else if ($file_type == "application/x-zip-compressed")
    {
      $img_type = "images/zip.png";
    }
    else if ($file_type == "application/pdf")
    {
      $img_type = "images/pdf.png";
    }
    else if (($file_type == "application/msword") 
      ||($file_type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"))
    {
      $img_type = "images/doc.png";
    }
    else if (($file_type == "audio/mp3") || ($file_type == "audio/wav"))
    {
      $img_type = "images/audio.png";
    }
    else if ($file_type == "video/mp4")
    {
      $img_type = "images/video.png";
    }
    //$user = $_SESSION["getUserByEmail"];
    //$destination = $_SESSION['userStore'] . "/" . $file_name;
    move_uploaded_file($temp_name, "gs://pro-soc.appspot.com/${store}/${file_name}");
    $fileRecord = "gs://prosoc-storage/UserFiles/". $_SESSION['getUserByEmail'] .".csv";
    $options = [
        'Content-Type' => 'binary/octet-stream',
    ];
    $context = stream_context_create(['gs' => $options]);
    $files = fopen($fileRecord,'w',0,$context) or die("Can't open file");
        
    $getFiles = explode("\n",file_get_contents($fileRecord));
    $arrlength=count($getFiles);
    //$fileURL = "https://storage.cloud.google.com/pro-soc.appspot.com/${store}/" . $file_name;
    //fwrite($files, "\n" . $file_name . "," . $file_type .",". $file_size .",". $fileURL;
    //$files = "\n{$file_name},{$fileURL}";

    //file_put_contents('gs://prosoc-storage/UserFiles/'. $_SESSION['getUserByEmail'] . '.csv', $file, 0, $context);

    fwrite($files, "Name" .",". "Type" .",". "Size" .",". "Link");
    //fwrite($files, "Name" .",". "Link");
    for($x=1;$x<$arrlength;$x++)
    {
        $msg = $getFiles[$x];
        fwrite($files, "\n" . $msg);
    }
    $fileURL = "https://storage.googleapis.com/pro-soc.appspot.com/${store}/" . $file_name;
    fwrite($files, "\n" . $file_name . "," . $img_type .",". $file_size .",". $fileURL);
    //fwrite($files, "\n{$file_name},{$fileURL};
    fclose($files);
    header('refresh:5;url=http://pro-soc-client.appspot.com/user.php');
?>
<!DOCTYPE html>
<html class="html" lang="en-US">
 <head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2015.0.2.310"/>
  <title>File Upload</title>
  <link rel="shortcut icon" href="images/titlePS.png">
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?4052507572"/>
  <link rel="stylesheet" type="text/css" href="css/log-in.css?4208358011" id="pagesheet"/>
   </head>
 <body>
     <p id="u701-2">Success!</p>
       <p>"<?php echo $file_name ?>" has been uploaded.</p>
   </body>
</html>
