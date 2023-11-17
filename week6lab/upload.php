<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $target_dir = "picture/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    echo $_FILES["fileToUpload"]["tmp_name"];
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "png" && $imageFileType != "gif" && $imageFileType != "jpg" && $imageFileType != "jpeg") {
        echo "Sorry, only PNG & GIF & JPG &JPEG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        // reset the pic
        // error handling for the file uploaded prior has error, empty the file name so that file exist check doesnt failed this time!!
        $target_file = "";
        

    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

            // Put your SQL UPDATE here
            include "db.php";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("UPDATE myguestbook SET picture=:picture WHERE id=:id");
                
                $pictureName = basename($_FILES["fileToUpload"]["name"]);
                $stmt->bindParam(':picture', $pictureName, PDO::PARAM_STR);
                $stmt->bindParam(':id', $_SESSION['new_id'], PDO::PARAM_INT);
                $stmt->execute();

                session_unset();
                header("Location:list.php");
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>