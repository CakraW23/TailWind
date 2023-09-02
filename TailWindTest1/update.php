<?php
 include_once "crud.php";

 $student = student::show($_GET['id']);
 
 if(isset($_POST['id'])){
    $response = student::update([
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'class' => $_POST['class']
    ]);

    header ("Location : main.php");
 }
?>

<?php
include 'layout/navbar.php';
?>

<div class="container mx-auto p-6">
    <h2 class="text-center text-2xl font-semibold mb-4">Edit Data</h2>
    <form action="" method="POST" class="max-w-md mx-auto">
        <input type="hidden" name = "id" value="<?=$student['id']?>">
        <div class="mb-4">
            <label for="username" class="block text-gray-600">Nama</label>
            <input type="text" autocomplete="off" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-400" 
                name="name" id="name" placeholder="Masukkan nama">
        </div>
        <div class="mb-4">
            <label for="Kelas" class="block text-gray-600">Kelas</label>
            <input type="text" autocomplete="off" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-400" 
                name="class" id="class" placeholder="Masukkan kelas">
        </div>
        <div class="text-center">
            <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600"
            name="submit" value="kirim">update</button>
        </div>
    </form>
</div>

<?php 
include 'layout/footer'; 
?>