<?php
include 'includes/db.php';
session_start();

// 1. Ambil ID dari URL
if(isset($_GET['id'])) {
    $id_booking = $_GET['id'];
} else {
    header("Location: booking.php");
    exit;
}

// 2. Ambil data dari database
$query = "SELECT b.*, r.nama_room, r.harga_per_jam 
          FROM bookings b 
          JOIN rooms r ON b.id_room = r.id_room 
          WHERE b.id_booking = '$id_booking'"; 

$result = mysqli_query($conn, $query);
$booking = mysqli_fetch_assoc($result);

if(!$booking) {
    echo "Data booking tidak ditemukan!";
    exit;
}

// 3. Hitung F&B
$total_sewa_ps = $booking['harga_per_jam'] * $booking['durasi'];
$total_fnb = $booking['total_harga'] - $total_sewa_ps;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - RafOzone</title>
    <link rel="stylesheet" href="assets/style.css?v=<?php echo time(); ?>">
    <style>
        /* Sedikit tambahan agar teks rapi di dalam kotak */
        .invoice-details p {
            font-size: 1.1rem;
            margin: 10px 0;
            color: #fff;
        }
        .invoice-details b {
            color: #00ffff; /* Warna cyan neon */
        }
        .total-price {
            font-size: 1.8rem;
            color: #00ffff;
            margin: 20px 0;
            border-top: 1px dashed rgba(255, 255, 255, 0.2);
            padding-top: 20px;
                justify-content: center;
        }
        .qris-box {
            background: #fff; /* QRIS harus berlatar putih agar mudah discan */
            padding: 10px;
            border-radius: 10px;
            display: inline-block;
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <div class="container" style="max-width: 500px; margin-top: 50px; text-align: center;">
        
        <div class="glass-card invoice-details">
            <h1 style="color: #00ffff; margin-bottom: 20px;">INVOICE #<?= $booking['id_booking'] ?></h1>
            
            <p>Unit: <b><?= $booking['nama_room'] ?></b></p>
            <p>Durasi: <b><?= $booking['durasi'] ?> Jam</b></p>
            
            <?php if($total_fnb > 0): ?>
                <p>Snacks & Drinks: <b>Rp <?= number_format($total_fnb, 0, ',', '.') ?></b></p>
            <?php endif; ?>
            
            <h2 class="total-price">Total: Rp <?= number_format($booking['total_harga'], 0, ',', '.') ?></h2>
            
            <p style="font-size: 0.9rem; color: #ccc;">Bayar via QRIS di bawah ini:</p>
            
            <div class="qris-box">
                <img src="assets/barcode.png" alt="Scan QRIS" width="200">
            </div>
            
        </div>

        <br>
        <a href="index.php" style="color: #fff; text-decoration: none; padding: 10px 20px; border: 1px solid #00ffff; border-radius: 5px; display: inline-block; transition: 0.3s;">
            &larr; KEMBALI KE HOME
        </a>

    </div>

</body>
</html>