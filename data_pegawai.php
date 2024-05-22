<?php
//panggil koneksi database

include "koneksi.php";

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <div class="container">

        <div class="card mt-5">
            <div class="card-header bg-primary text-white">
                Data Employee
            </div>
            <div class="card-body">
                <!-- Tombol trigger modal Tambah Data -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    Add New Data
                </button>
                <table class="table table-bordered table-striped table-hover text-center">
                    <tr>
                        <th>No.</th>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Job Title</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_pegawai");
                    while ($data = mysqli_fetch_array($tampil)) :

                    ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['id_pegawai']; ?></td>
                            <td><?= $data['nama_pegawai']; ?></td>
                            <td><?= $data['job_title']; ?></td>
                            <td>
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdate<?= $no ?>"> Edit</a>
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $no ?>">Delete</a>
                            </td>
                        </tr>
                        <!-- Awal Modal Update -->
                        <div class="modal fade" id="modalUpdate<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Employee</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="action_crud.php">
                                        <input type="hidden" name="id" value="<?= $data['id']; ?>">

                                        <div class="modal-body">

                                            <div class="mb-3">
                                                <label class="form-label">Employee ID </label>
                                                <input type="number" class="form-control" name="id_pegawai" value="<?= $data['id_pegawai'] ?>" placeholder="Insert Employee ID" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Employee Name</label>
                                                <input type="text" class="form-control" name="nama_pegawai" value="<?= $data['nama_pegawai'] ?>" placeholder="Insert Employee Name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Job Title</label>
                                                <input type="text" class="form-control" name="job_title" value="<?= $data['job_title'] ?>" placeholder="Insert Job Title" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" name="update">Update</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir modal Update -->


                        <!-- Awal Modal Delete -->
                        <div class="modal fade" id="modalDelete<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm Delete Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="action_crud.php">
                                        <input type="hidden" name="id" value="<?= $data['id']; ?>">

                                        <div class="modal-body">

                                            <h5 class="text-center">Are you sure to Delete this Data? <br>
                                                <span class="badge text-black bg-secondary mt-3">Employee ID : <?= $data['id_pegawai']; ?> <br> Employee Name : <?= $data['nama_pegawai']; ?>
                                                    <br> Job Title : <?= $data['job_title']; ?></span>
                                            </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" name="delete">Yes</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir modal Delete -->
                    <?php endwhile; ?>
                </table>

                <!-- Awal Modal Tambah -->
                <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Employee</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="action_crud.php">
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label class="form-label">Employee ID </label>
                                        <input type="number" class="form-control" name="id_pegawai" placeholder="Insert Employee ID" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Employee Name</label>
                                        <input type="text" class="form-control" name="nama_pegawai" placeholder="Insert Employee Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Job Title</label>
                                        <input type="text" class="form-control" name="job_title" placeholder="Insert Job Title" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" name="save">Save</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal -->
                <a href="index.php" class="btn btn-primary float-end">Home</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>