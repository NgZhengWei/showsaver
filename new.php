<?php require('components/header.php'); ?>

<div class="container">
    <form action="inc/addnew.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="image">Display Image:</label>
            <input type="file" class="form-control-file" id="image" name="image" required>
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" id="category" name="category" required>
                <option>Manga</option>
                <option>Anime</option>
                <option>TV Series</option>
                <option>Movie</option>
            </select>
        </div>
        <div class="form-group">
            <label for="chapter">Chapter:</label>
            <input type="text" class="form-control" id="chapter" name="chapter" required>
        </div>
        <div class="form-group">
            <label for="link">Link:</label>
            <input type="text" class="form-control" id="link" name="link">
        </div>
        <label for="summary">Summary:</label>
        <textarea class="form-control" name="summary" required></textarea>
        <input type="submit" name="submit" class="btn btn-primary mt-2" value="Submit">
    </form>
</div>

<?php require('components/footer.php'); ?>