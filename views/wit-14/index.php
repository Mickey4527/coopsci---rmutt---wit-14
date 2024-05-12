<?php
/*config page*/
include "../../config.php";
include ROOT . "/conn.php";
include ROOT . "/views/header.php";
include ROOT . "/views/body.php";
include ROOT . "/views/nav.php";
include ROOT . "/views/wit-14/wit-14_service.php";

/*-------------------------*/


getHeader("WIT-14");
getBody();
?>
<div class="container">
    <h1 class="mb-3">รายการแบบประเมินผลนักศึกษา</h1>
    <div class="row px-3 mt-4">
        <a class="text-decoration-none" href="form.php">
            <div class="col-12 border bg-body p-4 rounded">
                <span class="fw-medium">นาย สมชาย ใจดี</span>
            </div>
        </a>
    </div>
</div>

<?php
getFooter();
?>