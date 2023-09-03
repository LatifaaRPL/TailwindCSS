<?php

include_once('./models/Student.php');

$id = $_GET['id'];
$student = Student::show($id);

?>

<?php include('./layout/top.php'); ?>
<?php include('./layout/header.php'); ?>
<!-- content -->
<div class="basis-1/4 bg-slate-400 p-4">
    <div class="flex bg-slate-200 rounded-xl p-4">
        <div class="basis-1/5">
            <p>Nama:</p>
            <p>Nis:</p>
        </div>
        <div class="basis-4/5">
            <p><?= $student['name']?></p>
            <p><?= $student['nis']?></p>
        </div>
    </div>
        <div class="grid gap-2">
            <a href="index.php" class=" hover:bg-slate-700 bg-slate-500 p-2 mt-3 rounded-xl text-white text-center">Kembali</a>
        </div>
</div>

<?php include("./layout/footer.php"); ?>
<?php include("./layout/bottom.php"); ?>