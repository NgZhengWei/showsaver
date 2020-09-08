<?php
if (isset($_POST['submit'])) {
    $title = htmlspecialchars($_POST['title']);
    $image = $_FILES['image'];
    $imageName = $_FILES['image']['name'];
    $imageType = $_FILES['image']['type'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $imageError = $_FILES['image']['error'];
    $imageSize = $_FILES['image']['size'];
    $category = htmlspecialchars($_POST['category']);
    $chapter = htmlspecialchars($_POST['chapter']);
    $link = htmlspecialchars($_POST['link']);
    $summary = htmlspecialchars($_POST['summary']);

    $allowedImgTypes = ['jpg', 'jpeg', 'png'];
    $splitImgName = explode('.', $imageName);
    $imageExt = strtolower(end($splitImgName));

    if (in_array($imageExt, $allowedImgTypes)) {
      //upload
      if ($imageError === 0){
        if ($imageSize > 1000000) {
          header('Location: ../index.php?error=filesize');
        }else {
          $newImgName = uniqid('', true). "." . $imageName;
          $imageDestination = '../uploadimages/' . $newImgName;
          move_uploaded_file($imageTmp, $imageDestination);
          $savedDestination = 'uploadimages/' . $newImgName;

          require('db.php');
          $sql = "INSERT INTO shows (title,category,image,summary,chapter,link)
          VALUES ('$title','$category','$savedDestination','$summary','$chapter','$link')";

          if ($conn->query($sql) === TRUE) {
              header('Location: ../index.php?success=created');
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
      } else {
        header('Location: ../index.php?error=uploaderror');
      }
      
    }else {
      header('Location: ../index.php?error=filetype');
    }

} else {
    header('Location: ../index.php');
}