<?php 
include_once('./models/Student.php');
    $student = Student::show($_GET['id']);

    if(isset($_POST['submit'])){
        $response = Student::update([
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'nis' => $_POST['nis'],
        ]);

        setcookie('message', $response, time() + 10);
        header("location: index.php");

    }

?>

<?php include('./layout/top.php'); ?>
<?php include('./layout/header.php'); ?>


<div class="basis-1/4 bg-slate-400 p-4">
    <div class="bg-slate-300 rounded-xl p-4 ">
        <h1 class="text-slate-800 text-2xl mb-2">Input Data Siswa</h1>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?=$student['id']?>">
            <div class="mb-3">
                <label for="name">Nama</label>
                <input class="block w-full rounded-xl p-2" name="name" type="text" id="name" placeholder="Masukan Nama" value="<?=$student['name']?>">
            </div>
            <div class="mb-3">
                <label for="nis">Nis</label>
                <input class="block w-full rounded-xl p-2" name="nis" type="number" id="nis" placeholder="Masukan Nis" value="<?=$student['nis']?>">
            </div>
            <div class="grid gap-2">
                <button name="submit" class="bg-slate-500 hover:bg-slate-600 p-2 rounded-xl text-white" type="submit">Submit</button>
            </div>
        </form>
</div>
</div>

<?php include("./layout/footer.php"); ?>
<?php include("./layout/bottom.php"); ?>