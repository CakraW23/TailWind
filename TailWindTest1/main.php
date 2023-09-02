<?php
include_once "crud.php";

$student =student::index();

if(isset($_POST['create'])){
  $response = student::create([
    $name = $data['name'],
    $class = $data['class']

  ]);

  header ("Location : main.php");

}

if(isset($_POST['delete'])){
  $response = student::delete($_POST['id']);

  header ("Location : main.php");
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div>
        <!-- header -->
        <nav class="bg-blue-500 p-4">
              <p class="text-center font-semibold text-xl">Ceban</p>         
        </nav>
        <!-- main -->
        <div class="flex">
        <!-- sidebar -->
      <form method="POST" action="" autocomplete="off">
        <div class="basis-4/12 p-5 border border-black mt-4 ml-4 rounded-2xl bg-white shadow-lg">
           
            <div class="p-1,5"> 
              <h3>Nama</h3>
              <input class="border bg-gray-100 rounded-2xl py-2 px-1 w-full transition duration-300 focus:outline-none focus:ring focus:border-blue-300 hover:bg-gray-200" 
              name="nama" type="text" placeholder="Masukkan Nama Anda">
            </div>
            
            <div class="p-2,5">
              <h3 class="mt-3">Kelas</h3>
              <input class="border bg-gray-100 rounded-2xl py-2 px-1 w-full transition duration-300 focus:outline-none focus:ring focus:border-blue-300 hover:bg-gray-200" 
              name="kelas" type="text" placeholder="Masukkan Kelas Anda">
            </div>
            
            <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 hover:shadow-md transform hover:scale-110 transition duration-300 mt-3" 
            name="create" type="submit">Submit</button>
        </div>
      </form>

        <!-- content -->
        <div class="basis-10/12 border border-black mt-4 ml-4 mr-4 rounded-2xl">
            <div class="max-w-4xl mx-auto mt-8">
                <table class="min-w-full bg-white">
                  <thead class="bg-gray-200">
                    <tr>
                      <th class="py-2 px-4 text-left">No</th>
                      <th class="py-2 px-4 text-left">Nama</th>
                      <th class="py-2 px-4 text-left">Kelas</th>
                      <th class="py-2 px-4 text-left">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-300">
                    <?php foreach ($student as $key => $d) : ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $d['name'] ?></td>
                      <td><?= $d['class'] ?></td>

                      <td>
                      <button type="button" class="bg-green-500 rounded-md text-white pr-1 pl-1">
                        <a href="details.php?id=<?=$student['id']?>">Details</a></button>
                      <button type="button" class="bg-blue-500 rounded-md text-white pr-1 pl-1">
                        <a href="edit.php?id=<?=$student['id']?>">Edit</a></button>
                      
                      <form action="" method="post" class="inline">
                        <input type="hidden" name="id" value="<?=$student['id']?>">
                        <button type="submit" class="bg-red-500 rounded-md text-white pr-1 pl-1" name="delete">Delete</button>
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
        <footer class="bg-red-500 text-center m-4 p-4">
            <p>Tugas Cakra</p>
          </footer>
    </div>
</body>
</html>