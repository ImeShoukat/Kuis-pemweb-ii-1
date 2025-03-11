<?php
include('database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM events WHERE id = ?");
    $stmt->execute([$id]);
    $event = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $location = $_POST['location'];

    $stmt = $pdo->prepare("UPDATE events SET name = ?, date = ?, location = ? WHERE id = ?");
    $stmt->execute([$name, $date, $location, $id]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container my-5">
    <h2 class="text-center">Edit Event</h2>
    <form method="POST">
        <div class="form-group">
            <label for="name">Nama Event</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $event['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="date">Tangga Event</label>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo $event['date']; ?>" required>
        </div>
        <div class="form-group">
            <label for="location">Lokasi Event</label>
            <input type="text" class="form-control" id="location" name="location" value="<?php echo $event['location']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
