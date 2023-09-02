<?php
include_once "koneksi.php";

class student extends DB {
    
    // forum untuk menginput item ke database
    public static function create($data){
        $nama = $data['name'];
        $class = $data['class'];

        $sql = "INSERT INTO students (name, class) VALUES ('$nama', '$kelas')";
        $result = DB::connect()->query($sql);

        if ($result){
            return "Item Berhasil ditambahkan";
        }
        else{
            return "Item Gagal ditambahkan";
        }
    }

    // forum untuk mengambil semua data dari database
    public static function index(){
        $sql = "SELECT * FROM students";
        $result = DB::connect()->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);
    }

    // forum untuk mengambil data dengan baris id
    public static function show($id){
        $sql = "SELECT * FROM students WHERE id='$id'";
        $result = DB::connect()->query($sql);
        $data = $result->fetch_assoc();

        return $data;
    }

    // forum untuk mengubah data dari
    public static function update($data){
        $id = $data['id'];
        $name = $data['name'];
        $class = $data['class'];

        $sql = "UPDATE students SET name = '$name', class = '$class' WHERE id = '$id'";
        $result = DB::connect()->query($sql);

        if ($result){
            return "Berhasil Mengubah Item";
        }else{
           return "Gagal Mengubah item"; 
        }
    }


    public static function delete($id){
        $sql = "DELETE FROM students WHERE id = '$id'";
        $result = DB::connect()->query($sql);

        if ($result){
            return "Berhasil Menghapus Item";
        }else{
            return "Gagsl Menghapus Item";
        }
    }
}

?>