<?php

?>

<head>
    <link type="text/css" rel="stylesheet" href="/stylesheets/style.css">
</head>

<body>
    <h1>Cloud Converter</h1>
    <h3>Created by: <br> Ming s3723009 <br> Ty s3668469</h3>
    <h4>Email the file to me</h4>
    <div class='userUpload'>
        <form action="/email_handler" enctype="multipart/form-data" method="post">
            <h2>Enter your email address: <br></h2>
            <input type="email" id="email" required="required">
            <input type="hidden" name="public_url" value="<?php echo $public_url; ?>">
            <input type="submit" value="Send">
        </form>
    </div>
</body>