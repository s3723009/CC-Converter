<?php
 session_start();
   $_SESSION[''] = "batman";

require __DIR__ . '/vendor/autoload.php';

use google\appengine\api\cloud_storage\CloudStorageTools;

    $options = ['gs_bucket_name' => cc-converter-s3723009.appspot.com];
    $upload_url = CloudStorageTools::createUploadUrl('/upload', $options);

?>


<head>
    <link type="text/css" rel="stylesheet" href="/stylesheets/style.css">
</head>

<body>
    <h1>Cloud Converter</h1>
    <h3>Created by: <br> Ming s3723009 <br> Ty s3668469</h3>
    <h4>Simple tool to convert jpeg to png and vice-versa!</h4>
    <div class='userUpload'>
        <form action="upload" enctype="multipart/form-data" method="post">
            <h2>File to upload: <br></h2>
            <input type="file" name="userfile" accept=".jpg, .png" size="40" required= "required">
            <input type="submit" value="Convert">
        </form>
    </div>
</body>