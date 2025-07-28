<?php
require_once __DIR__ . '/../../app/classes/VehicleManager.php';

$vehicleManager = new VehicleManager("", "", "", "");
$vehicles = $vehicleManager->getVehicles() ?? [];


$id = $_GET['id'] ?? null;


if ($id === null || !isset($vehicles[$id])) {
    header("Location: ../index.php");
    exit;
}

$vehicle = $vehicles[$id];

include __DIR__ . '/header.php';
?>

<div class="container my-4">
    <h1>Vehicle Details</h1>
    <div class="card" style="max-width: 500px;">
        <img src="<?= htmlspecialchars($vehicle['image']) ?>" class="card-img-top" style="height: 300px; object-fit: cover;">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($vehicle['name']) ?></h5>
            <p class="card-text">Type: <?= htmlspecialchars($vehicle['type']) ?></p>
            <p class="card-text">Price: $<?= htmlspecialchars($vehicle['price']) ?></p>
        </div>
    </div>
</div>

</body>

</html>