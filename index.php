<?php
    require_once 'header.html';
?>
<h1>Welcome</h1>
<form action="<?=htmlspecialchars($_SERVER['PHP_SELF']) ;?>" method="post" enctype="multipart/form-data">
    <input type="file" name="docc"/><br>
    <input type="submit" value="upload">
</form>
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $file = $_FILES['docc'];
        $storage = "storage/";
        $move = $storage . basename($file['name']);
        if(!in_array($file['type'], ['image/png'])){
            echo "<h1>File type not supported</h1>";
            echo "<h1>Choose another video</h1>";
        }else{
            if(move_uploaded_file($file['tmp_name'], $move)){
                echo "<h1>File Uploaded Successfully!</h1>";
            } else{
                echo "<h1>File Upload Failed!</h1>";
            }
        }
    }
?>
<?php
    require 'footer.html';
?>