<?php
require('./inc/db.php');

$sql = "SELECT * FROM shows";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo '<div class="container"> <div class="row">';
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $title = $row['title'];
            $summary = $row['summary'];
            $category = $row['category'];
            $chapter = $row['chapter'];
            $link = $row['link'];
            $image = $row['image'];

            echo "<div class='col-md-4 col-sm-6'>
                    <div class='card'>
                        <img src='$image' class='card-img-top'>
                        <div class='card-body'>
                            <h5 class='card-title'>$title <span id='chapter'>( $chapter )</span></h5>
                            <p class='card-text font-italics txt-sm'> <a href='#'>$category</a> </p>
                            <p class='card-text txt-sm'>$summary</p>
                            <a href='$link' class='btn btn-primary' target='_blank'>Read</a>
                            <a href='edit.php?edit={$id}' class='btn btn-warning'>Update</a>
                            <a href='inc/deleteshow.php?delete={$id}' class='btn btn-danger'>Delete</a>
                        </div>
                    </div>
                </div>
            ";

        }
  echo '</div> </div>';
} else {
  echo "0 results";
}
$conn->close();
?>

