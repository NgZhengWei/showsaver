<?php require('components/header.php'); ?>

<?php
if (isset($_GET['edit'])) {
    $id = htmlspecialchars($_GET['edit']);

    include('inc/db.php');
    
    $sql = "SELECT * FROM shows WHERE id={$id}";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // display the data obtained in the form
        $row = $result->fetch_assoc();

        $title = $row['title'];
        $summary = $row['summary'];
        $category = $row['category'];
        $chapter = $row['chapter'];
        $link = $row['link'];
    }
    $conn->close();
} else {
    header('Location: index.php');
}
?>

<div class="container">
    <form action="inc/editshow.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php if (isset($title)){echo $title;} ?>" required>
        </div>
        <div class="form-group">
            <label for="image">Display Image:</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" id="category" name="category" value="<?php if (isset($category)){echo $category;} ?>" required>
                <option>Manga</option>
                <option>Anime</option>
                <option>TV Series</option>
                <option>Movie</option>
            </select>
        </div>
        <div class="form-group">
            <label for="chapter">Chapter:</label>
            <input type="text" class="form-control" id="chapter" name="chapter" value="<?php if (isset($chapter)){echo $chapter;} ?>" required>
        </div>
        <div class="form-group">
            <label for="link">Link:</label>
            <input type="text" class="form-control" id="link" name="link" value="<?php if (isset($link)){echo $link;} ?>">
        </div>
        <label for="summary">Summary:</label>
        <textarea class="form-control" name="summary" rows="4" required><?php if (isset($summary)){echo $summary;} ?></textarea>
        <input type="submit" name="submit" class="btn btn-primary mt-2" value="Submit">
        <input type="hidden" value="<?php echo $id;?>" name="id">
    </form>
</div>

<?php require('components/footer.php'); ?>