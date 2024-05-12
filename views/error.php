<?php
/*config page*/
include "../config.php";
include ROOT . "/views/header.php";
include ROOT . "/views/nav.php";
include ROOT . "/views/body.php";

/*-------------------------*/


getHeader("Error");
getBody(false);
?>
<div class="container">
    <h1 class="mb-3">Error</h1>
    <div class="row px-3 mt-4">
        <div class="col-12 border bg-body p-4 rounded">
            <span class="fw-medium">Error: <?php echo $_GET['error']; ?></span>
            <span class="fw-medium">Message: <?php echo $_GET['message']; ?></span>
        </div>
    </div>
</div>

<?php
getFooter();
?>