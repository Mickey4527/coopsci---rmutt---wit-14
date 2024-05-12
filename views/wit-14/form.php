<?php
/*config page*/
include "../../config.php";
include ROOT . "/conn.php";
include ROOT . "/views/nav.php";
include ROOT . "/views/header.php";
include ROOT . "/views/body.php";
include ROOT . "/views/wit-14/wit-14_service.php";

/*-------------------------*/
getHeader("WIT-14");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
}

$table = getTableWIT14($scores, getContentTable(getQue($conn), $scores, $_POST));

getBody();
?>

<div class="container">
    <h1 class="mb-3">แบบประเมินผลนักศึกษา</h1>
    <div class="bg-body-tertiary radius-10 p-3 mb-3">
        <span class="fw-bold">คำชี้แจง:</span>
        <ul class="mt-3">
            <li>ผู้ให้ข้อมูลในแบบประเมินนี้ต้องเป็นผู้นิเทศงาน ของนักศึกษาหรือบุคคลที่ได้รับ มอบหมายให้ทำหน้าที่แทน</li>
            <li>แบบประเมินผลนี้มีทั้งหมด 6 ด้าน โปรดประเมินทุกข้อ เพื่อความสมบูรณ์ของการประเมินผล</li>
            <li>โปรดบันทึกหมายเลข 5, 4, 3, 2, 1 ตามความเห็นของท่าน และโปรดให้ความคิดเห็นเพิ่มเติม (ถ้ามี)</li>
            <p class="fw-bold">เกณฑ์การประเมินค่า สำหรับระดับความคิดเห็นดังนี้ 5 = มากที่สุด 4 = มาก 3 = ปานกลาง 2 = น้อย 1 = น้อยที่สุด</p>
        </ul>
    </div>
    <form method="POST">
        <div class="my-3">
            <h4>ข้อมูลผู้ประเมิน</h4>
            <div class="row ms-3 mt-3">
                <div class="form-check col-12">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label ps-2" for="flexCheckDefault">
                        ฉันคือ ...
                    </label>
                </div>
                <div class="form-check col-12">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                    <label class="form-check-label ps-2" for="flexCheckDefault">
                        เป็นผู้รับมอบหมายให้ประเมินผล
                    </label>
                </div>
            </div>
        </div>
        <h4>ข้อมูลนักศึกษา</h4>
        <h4>แบบประเมินผล</h4>
        <?php echo $table; ?>
        <div class="mb-3">
            <h4>ข้อคิดเห็นเกี่ยวกับนักศึกษา</h4>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>

<?php
getFooter();
?>