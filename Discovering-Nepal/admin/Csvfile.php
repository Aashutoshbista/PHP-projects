<?php
include("authentication.php");
include("include/header.php");
include("include/topbar.php");
include("include/sidebar.php");
include("config/dbcon.php");
?>

<div class="container">
<div class="content-wrapper ">
    <form action="code.php" method="POST" enctype="multipart/form-data">
        <div class="card card-body shadow">
            <div class="row">
                <div class="col-md-2 my-auto">
                    <h5>Select File</h5>
                </div>
                <div class="col-md-4">
                    <input type="file" name="import_file" class="form-control"/>

                </div>
                <div class="col-md-4">
                    <button type="submit" name="import_file_btn" class="btn btn-primary">Upload / Import </button>
                </div>
            </div>
        </div>
    </form>
            
                

                </div>
            </div>

<?php            include("include/script.php");
?>