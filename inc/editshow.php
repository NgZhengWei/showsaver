<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = htmlspecialchars($_POST['title']);
    echo $id;

    if ($_FILES['image']['size'] !== 0) {
        print_r($_FILES['image']);
        $image = $_FILES['image'];
        $imageName = $_FILES['image']['name'];
        $imageType = $_FILES['image']['type'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageError = $_FILES['image']['error'];
        $imageSize = $_FILES['image']['size'];

        $allowedImgTypes = ['jpg', 'jpeg', 'png'];
        $splitImgName = explode('.', $imageName);
        $imageExt = strtolower(end($splitImgName));
    }
    
    $category = htmlspecialchars($_POST['category']);
    $chapter = htmlspecialchars($_POST['chapter']);
    $link = htmlspecialchars($_POST['link']);
    $summary = htmlspecialchars($_POST['summary']);

   

    if (isset($image)) {
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
                $sql = "UPDATE shows SET title='{$title}', category='{$category}', summary='{$summary}', chapter='{$chapter}', link='{$link}', image='{$savedDestination}'
                WHERE id={$id}";
      
                if ($conn->query($sql) === TRUE) {
                    header('Location: ../index.php?success=updated');
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
        require('db.php');
                $sql = "UPDATE shows SET title='{$title}', category='{$category}', summary='{$summary}', chapter='{$chapter}', link='{$link}'
                WHERE id={$id}";
      
                if ($conn->query($sql) === TRUE) {
                    header('Location: ../index.php?success=updated');
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }
    }
    
} else {
    header('Location: ../index.php');
}