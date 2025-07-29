<?php
require_once "../../app/classes/VehicleManager.php";

$vehicleManager = new VehicleManager("", "", "", "");

$id = $_GET['id'] ?? null;
//var_dump($id);
//exit;

if ($id === null) {
    header("Location: ../index.php");
    exit;
}

$vehicles = $vehicleManager->getVehicles();

$vehicle = $vehicles[$id] ?? null;
//var_dump($vehicle);
//exit;

if (!$vehicle) {
    header("Location: ../index.php");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;

    $vehicleManager->editVehicle($id, [
        'id' => $data['id'],
        'name' => $data['name'],
        'type' => $data['type'],
        'price' => $data['price'],
        'image' => $data['image']
    ]);

    header("Location: ../index.php");
    exit;
}

include './header.php';
?>

<div class="container my-4">
    <h1>Edit Vehicle</h1>
    <form method="POST">
        <!-- Hidden input for vehicle id -->
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

        <div class="mb-3">
            <label class="form-label">Vehicle Name</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($vehicle['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Vehicle Type</label>
            <input type="text" name="type" class="form-control" value="<?= htmlspecialchars($vehicle['type']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" value="<?= htmlspecialchars($vehicle['price']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Image URL</label>
            <input type="text" name="image" class="form-control" value="<?= htmlspecialchars($vehicle['image']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Vehicle</button>
    </form>
</div>

</body>

</html>