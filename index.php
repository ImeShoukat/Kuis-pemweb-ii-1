<?php
include('database.php');

$stmt = $pdo->query("SELECT * FROM events");
$events = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
</head>
<body>
<div class="container my-5">
    <h2 class="text-center">Daftar Event</h2>
    <a href="tambahevent.php" class="btn btn-primary mb-3">Tambah Event</a>
    <table id="eventsTable" class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event): ?>
                <tr>
                    <td><?php echo $event['id']; ?></td>
                    <td><?php echo $event['name']; ?></td>
                    <td><?php echo $event['date']; ?></td>
                    <td><?php echo $event['location']; ?></td>
                    <td>
                        <a href="editevent.php?id=<?php echo $event['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapusevent.php?id=<?php echo $event['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>