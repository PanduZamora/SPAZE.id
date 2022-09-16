<?php 
    include "conn.php";

    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["is_plus"] == 1) {
                $hidden = "hidden";
            } else {
                $hidden = "";
            }
?>

<div class="col">
    <div class="product-container">
        <div class="d-flex product-header justify-content-between align-items-center">
            <span class="product-code"><?= $row["product_code"] ?></span>
            <!-- create badge for plus item -->
            <div class="d-flex flex-column">
                <a class="btn btn-primary rounded-circle" href="#"><i class="bi bi-cart3"></i></a>
                <a class="btn btn-outline-dark rounded-circle" href="#"><i class="bi bi-question-lg"></i></a>
            </div>
        </div>
        <div class="product-body text-start">
            <h3><?= $row["product_title"]; ?></h3>
            <hr>
            <p><?= $row["product_description"]; ?></p>
            <a href="#" class="btn btn-outline-primary d-block"><?= $row["product_price"]; ?></a>
            <a href="#" class="text-secondary d-block text-center">Lihat fitur paket ini</a>
        </div>
    </div>
</div>

<?php 
    } 
} else { 
    echo "No Data"; 
} 

$conn->close(); ?>