<?php
include_once("./models/Student.php");

$students = Student::index();

if(isset($_POST['submit'])) {
    $response = Student::create([
        'name' => $_POST['name'],
        'nis' => $_POST['nis'],
    ]);

    setcookie('message', $response, time() + 10);
    header("location: index.php");
}

if(isset($_POST['delete'])){
    $response = Student::delete($_POST['id']);

    setcookie('message', $response, time() + 10);
    header('location: index.php');
}

?>

<!-- alert -->
<?php include('./layout/alert.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind (latifaa)</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav>
        <!-- header -->
        <div class="bg-gray-700 p-8 sticky top-0">
            <div class="flex">
                <div class="basis-3/4">
                    <h1 class="text-5xl text-white">Welcome</h1>
                </div>
                <div class="basis-1/4 text-2xl flex flex-col sm:flex-row">
                    <button class="p-2 mr-3 text-white">home</button>
                    <button class="p-2 mr-3 text-white">info</button>
                    <button class="p-2 mr-3 text-white">contact</button>
                </div>
            </div>
        </nav>

        <!-- main -->
        <div class="flex">

            <!-- sidebar -->
            <div class="basis-1/4 bg-slate-400 p-4">
                <div class="bg-slate-300 rounded-xl p-4 ">
                    <h1 class="text-slate-800 text-2xl mb-2">Input Data Siswa</h1>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="name">Nama</label>
                            <input class="block w-full rounded-xl p-2" name="name" type="text" id="name" placeholder="Masukan Nama">
                        </div>
                        <div class="mb-3">
                            <label for="nis">Nis</label>
                            <input class="block w-full rounded-xl p-2" type="number" name="nis" id="nis" placeholder="Masukan Nis">
                        </div>
                        <div class="grid gap-2">
                            <button name="submit" class="bg-slate-500 hover:bg-slate-600 p-2 rounded-xl text-white" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- content -->
            <div class="basis-3/4 bg-slate-400 p-4">
                <div class="bg-slate-300 rounded-xl p-4 ">
                    <h1 class="text-slate-800 text-2xl mb-2">Table Data Siswa</h1>
                    <table class="w-full">
                        <thead class="text-center border border-black">
                            <tr class="bg-slate-600 text-white">
                                <td class="px-6 py-3">No</td>
                                <td class="px-6 py-3">Nama</td>
                                <td class="px-6 py-3">Nis</td>
                                <td class="px-6 py-3">Aksi</td>
                            </tr>
                        </thead>
                        <tbody class="text-center border border-black">
                            <?php foreach($students as $key => $student) : ?>
                                <tr class="bg-white border border-black">
                                    <td class="px-6 py-3"><?= $key + 1 ?></td>
                                    <td class="text-left px-6 py-3"><?= $student['name'] ?></td>
                                    <td class="px-6 py-3"><?= $student['nis'] ?></td>
                                    <td class="px-6 py-3">
                                        <!-- detail -->
                                        <a href="detail.php?id=<?= $student['id'] ?>" class="text-white hover:bg-sky-700 pt-2 pb-2 pl-3 pr-3 rounded-xl bg-sky-500">Detail</a>
                                        <!-- edit -->
                                        <a href="edit.php?id=<?= $student['id'] ?>" class="text-white hover:bg-teal-700 pt-2 pb-2 pl-3 pr-3 rounded-xl bg-teal-500">Edit</a>
                                        <form action="" method="POST" class="inline">
                                            <input type="hidden" name="id" value="<?= $student['id'] ?>"> 
                                            <button type="submit" class="bg-red-400 hover:bg-red-600 pt-2 pb-2 pl-3 pr-3 rounded-xl text-white" name="delete">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- footer -->
        <div class="bg-gray-600 text-white p-3 text-center">
            Copyright &copy; Latifaaa | 2023
        </div>
    </div>
</body>
</html>