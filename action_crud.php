<?php

//koneksi databse
include "koneksi.php";

//uji jika tombol simpan diklik
if (isset($_POST['save'])) {
    //persiapan simpan data baru
    $simpan = mysqli_query($koneksi, "INSERT INTO
    tb_pegawai (id_pegawai,nama_pegawai,job_title)
                VALUES ('$_POST[id_pegawai]',
                        '$_POST[nama_pegawai]',
                        '$_POST[job_title]')");
    //jika simpan sukses
    if ($simpan) {
        echo "<script>
        alert('Add data Success!');
        document.location='data_pegawai.php';
        </script>";
    } else {
        echo "<script>
        alert('Add data Fail!');
        document.location='data_pegawai.php';
        </script>";
    }
}

//uji jika tombol update diklik
if (isset($_POST['update'])) {
    //persiapan update data
    $update = mysqli_query($koneksi, "UPDATE tb_pegawai SET 
            id_pegawai ='$_POST[id_pegawai]',
            nama_pegawai ='$_POST[nama_pegawai]',
            job_title ='$_POST[job_title]'
            WHERE id = '$_POST[id]'
    ");
    //jika update sukses
    if ($update) {
        echo "<script>
        alert('Update data Success!');
        document.location='data_pegawai.php';
        </script>";
    } else {
        echo "<script>
        alert('Update data Fail!');
        document.location='data_pegawai.php';
        </script>";
    }
}

//uji jika tombol delete diklik
if (isset($_POST['delete'])) {
    //persiapan delete data
    $delete = mysqli_query($koneksi, "DELETE FROM tb_pegawai WHERE id ='$_POST[id]' ");
    //jika delete sukses
    if ($delete) {
        echo "<script>
        alert('Delete data Success!');
        document.location='data_pegawai.php';
        </script>";
    } else {
        echo "<script>
        alert('Delete data Fail!');
        document.location='data_pegawai.php';
        </script>";
    }
}
