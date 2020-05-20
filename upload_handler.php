<?php
require __DIR__ . '/vendor/autoload.php';

use google\appengine\api\cloud_storage\CloudStorageTools;

if (empty($_FILES['userfile'])){
header('Location: https://cc-converter-s3723009.ts.r.appspot.com/');
}  

// convert to png
if($_FILES['userfile']['type'] == 'image/jpeg') {
    $date = new DateTime();
    $timeStamp = $date->getTimestamp();
    $my_bucket = 'cc-converter-storage-png';
    $file_name = basename($_FILES['userfile']['name'],".jpg");
    $temp_name = $_FILES['userfile']['tmp_name'];
    move_uploaded_file($temp_name, "gs://${my_bucket}/${file_name}.$timeStamp");
    $public_url = "http://storage.googleapis.com/${my_bucket}/${file_name}.$timeStamp";

echo '<script type="text/javascript">  
    var timeleft = 60;
    var downloadTimer = setInterval(function(){
if(timeleft <= 0){
    clearInterval(downloadTimer);
    document.getElementById("countdown").innerHTML = "Your Download link is ready";
    document.getElementById("download").disabled = false;
} else {
    document.getElementById("countdown").innerHTML = timeleft + " seconds remaining";
}
  timeleft -= 1;
}, 1000);
   </script>';
}

// convert to jpeg
if($_FILES['userfile']['type'] == 'image/png') {
    $date = new DateTime();
    $timeStamp = $date->getTimestamp();
    $my_bucket = 'cc-converter-storage-jpeg';
    $file_name = basename($_FILES['userfile']['name'],".png");
    $temp_name = $_FILES['userfile']['tmp_name'];
    move_uploaded_file($temp_name, "gs://${my_bucket}/${file_name}.$timeStamp");
    $public_url = "http://storage.googleapis.com/${my_bucket}/${file_name}.$timeStamp";
    
echo '<script type="text/javascript">  
    var timeleft = 60;
    var downloadTimer = setInterval(function(){
if(timeleft <= 0){
    clearInterval(downloadTimer);
    document.getElementById("countdown").innerHTML = "Your Download link is ready";
    document.getElementById("download").disabled = false;
} else {
    document.getElementById("countdown").innerHTML = timeleft + " seconds remaining";
}
  timeleft -= 1;
}, 1000);
   </script>';
} 

// if unsupported
if($_FILES['userfile']['type'] != 'image/png' && $_FILES['userfile']['type'] != 'image/jpeg') {
    echo '<script type="text/JavaScript">  
     alert("This application only accepts jpg and png files. You will be redirected"); 
     </script>'; 
    echo "<script> location.replace('https://cc-converter-s3723009.ts.r.appspot.com/') </script>";
}

?>

<head>
    <link type="text/css" rel="stylesheet" href="/stylesheets/style.css">
</head>

<body>
    <h1>Cloud Converter</h1>
    <h3>Created by: <br> Ming s3723009 <br> Ty s3668469</h3>
    <h4>Converting your file:</h4>
    <div class='userUpload'>
        <h2> Your file: <?php echo $file_name; ?> will be ready soon: <br> <span id="countdown"></span></h2>
        <a href="<?php echo $public_url; ?>" download="image">
            <button type="button" id="download" disabled="disabled">Download</button>
        </a>
    </div>
    <div class="disclaimer">
        <h2>Disclaimer</h2>
        <p>All files will be deleted at the start of each week. We are not responsible for lost files.</p>
    </div>
</body>
