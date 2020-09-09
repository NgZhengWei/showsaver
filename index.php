<?php
require('components/header.php');

if (isset($_GET['success'])) {
    if ($_GET['success'] == 'created') {
        echo '<div class="container">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    New show has been successfully created!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              </div>';
    };
    if ($_GET['success'] == 'deleted') {
        echo '<div class="container">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    The show has been successfully deleted!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              </div>';
    };
    if ($_GET['success'] == 'updated') {
        echo '<div class="container">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    The show has been successfully updated!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              </div>';
    };
};

require('components/showcards.php');

require('components/footer.php');