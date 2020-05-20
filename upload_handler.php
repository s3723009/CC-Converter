<?php
require __DIR__ . '/vendor/autoload.php';

use google\appengine\api\cloud_storage\CloudStorageTools;

if (empty($_FILES['userfile'])){
header('Location: https://cc-converter-s3723009.ts.r.appspot.com/');
}  

if($_FILES['userfile']['type'] != 'image/png') {
    $date = new DateTime();
    $timeStamp = $date->getTimestamp();
    $my_bucket = 'cc-converter-s3723009.appspot.com';
    $file_name = basename($_FILES['userfile']['name']);
    $temp_name = $_FILES['userfile']['tmp_name'].$timeStamp;
    move_uploaded_file($temp_name, "gs://${my_bucket}/${file_name}.$timeStamp");
    $public_url = "http://storage.googleapis.com/${my_bucket}/${file_name}.$timeStamp";
}

if($_FILES['userfile']['type'] != 'image/jpeg') {
    $date = new DateTime();
    $timeStamp = $date->getTimestamp();
    $my_bucket = 'cc-converter-s3723009.appspot.com';
    $file_name = basename($_FILES['userfile']['name']);
    $temp_name = $_FILES['userfile']['tmp_name'].$timeStamp;
    move_uploaded_file($temp_name, "gs://${my_bucket}/${file_name}.$timeStamp");
    $public_url = "http://storage.googleapis.com/${my_bucket}/${file_name}.$timeStamp";
}

?>

<head>
    <link type="text/css" rel="stylesheet" href="/stylesheets/style.css">
</head>

<body>
    <h1>Cloud Converter</h1>
    <h3>Created by: <br> Ming s3723009 <br> Ty s3668469</h3>
    <h4>Here is your converted file:</h4>
    <div class='userUpload'>
        <h2> <?php echo $file_name; ?> </h2>
        <form action="<?php echo $_url; ?>">
            <input type="submit" value="Download Link" />
        </form>
        <form action="/email">
            <input type="hidden" name="public_url" value="<?php echo $public_url; ?>">
            <input type="submit" value="Email me!" />
        </form>
    </div>
</body>
