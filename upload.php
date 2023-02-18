<?php

// Todo:
//  - Instead of having disallowed $FileType, more secure to use allowed

$uploadOk = 0;
$password = isset($_POST["secureley"]) ? $_POST["secureley"] : null;
$correct_password = 'PASSWORD_GENERATED_FROM_BCRYPT_HERE';
$dir = isset($_POST["dir"]) ? $_POST["dir"] : null;

if ($password !== null && $password == $correct_password) {

    if (isset($_FILES["fileToUpload"])) {

        if ($dir == null) {
            $target_dir = "files/Unsorted/";
        } else {
            $target_dir = "files/".$dir."/";
        }

        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Make it lower to prevent upper filename bypass
        $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if(    $FileType == "php" 
            && $FileType == "js" 
            && $FileType == "jsp" 
            && $FileType == "htm" 
            && $FileType == "html" 
            && $FileType == "phtml" 
            && $FileType == "htaccess"
            && $FileType == None
        ) 
        {
            echo $FileType." is not supported for security reasons";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Something went wrong, she said.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo htmlspecialchars(basename($_FILES["fileToUpload"]["name"]))." has been uploaded.";
            } else {
                echo "Something went wrong, she said.";
            }
        }
    } else {
        echo "No file was uploaded.";
    }
} else {
    //  Give bots a 404 if no or wrong password POST was given
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
    die();
}
?>
