<?php
include 'includes/db.php';
session_start();

$id_user = 1; // Simulasi user

if(isset($_POST['submit_order'])) {
    $id_room = $_POST['id_room'];
    $durasi = $_POST['durasi'];
    $tanggal = $_POST['tanggal_main'];
    $waktu = $_POST['waktu_main'];
    
    // Gabungkan tanggal dan waktu untuk database
    $jam_mulai = $tanggal . ' ' . $waktu . ':00';
    
    // Ambil harga room dari database biar aman
    $res = mysqli_query($conn, "SELECT harga_per_jam FROM rooms WHERE id_room = '$id_room'");
    $room = mysqli_fetch_assoc($res);
    
    // 1. Hitung total dasar (Harga Room x Durasi)
    $total_room = $room['harga_per_jam'] * $durasi;

    // 2. Hitung total tambahan (Makanan & Minuman)
    $total_addons = 0;
    // Cek apakah ada makanan yang dicentang (name="addons[]")
    if(isset($_POST['addons']) && is_array($_POST['addons'])) {
        foreach($_POST['addons'] as $harga_addon) {
            $total_addons += (int)$harga_addon;
        }
    }

    // 3. Gabungkan semuanya jadi Total Akhir
    $total = $total_room + $total_addons;

    // Masukkan ke database
    $query = "INSERT INTO bookings (id_user, id_room, jam_mulai, durasi, total_harga, status) 
              VALUES ('$id_user', '$id_room', '$jam_mulai', '$durasi', '$total', 'pending')";
    
    if(mysqli_query($conn, $query)) {
        $last_id = mysqli_insert_id($conn);
        // Lempar ke halaman invoice
        header("Location: invoice.php?id=$last_id");
        exit; // Wajib pakai exit setelah memanggil header
    } else {
        // Tampilkan pesan error kalau gagal masuk database
        echo "<script>alert('Gagal melakukan booking: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Session - RafOzone</title>
    <link rel="stylesheet" href="assets/style.css?v=<?php echo time(); ?>">
</head>
<body>

    <div class="container">
        <div class="header">
            <img src="assets/logoo.png" alt="RafOzone Logo" width="220">
            <h1>RESERVE YOUR <span>SESSION</span></h1>
        </div>

        <form method="POST" class="booking-layout">
            
            <div class="glass-card">
                <h2>🎮 Pilih Unit Console</h2>
                
                <?php
                $rooms = mysqli_query($conn, "SELECT * FROM rooms");
                while($r = mysqli_fetch_assoc($rooms)):
                ?>
                <label class="unit-option">
                    <input type="radio" name="id_room" class="room-radio" value="<?= $r['id_room'] ?>" data-price="<?= $r['harga_per_jam'] ?>" required>
                    <div class="unit-card">
                        <div class="unit-info">
                <h4><?= $r['nama_room'] ?></h4>
                <?php
       
                $deskripsi = ""; 
        
                 if ($r['nama_room'] == 'Regular - PS4 Pro') {
                    $deskripsi = "Max 2 players | PS4 Pro 1TB | Open Space | 2 Controllers | Sofa ";

                } elseif ($r['nama_room'] == 'VIP 1 - PS4 Pro') {
                    $deskripsi = "Max 3 Players | PS4 PRO 1TB | 55 inch 4K QLED TV | 2 Controllers | Sofa | Netflix | Air Purifier | AC | Ruangan 5m2";

                } elseif ($r['nama_room'] == 'VIP 2 - PS5 Slim') {
                    $deskripsi = "Max 3 Players | PS5 Slim + Extra 1TB SSD NVME | 55 inch 4K QLED TV | 2 Controllers + 1 Pasang Joycon | Sofa | Netflix | Air Purifier | AC | Ruangan 5m2";
                
                } elseif ($r['nama_room'] == 'VIP 3 - PS4 Pro + Nintendo Switch') {
                    $deskripsi = "Max 5 Players | PS4 Pro 1TB + Nintendo Switch | 55 inch 4K QLED TV | 2 Controllers + 1 Pasang Joycon | Sofa | Netflix | Air Purifier | AC | Ruangan 8m2";
                }
                
                elseif ($r['nama_room'] == 'VIP 4 - PS5 Slim  + Nintendo Switch') {
                    $deskripsi = "Max 5 Players | PS5 Slim + Extra 1TB SSD NVME  + Nintendo Switch| 55 inch 4K QLED TV | 2 Controllers + 1 Pasang Joycon | Sofa | Netflix | Air Purifier | AC | Ruangan 8m2";

                } else {
                    $deskripsi = "Max 8 Players | PS5 Pro 2TB  + Nintendo Switch Oled 512GB | 65 inch 4K QLED TV | Sony Sound Bar + Subwoofer | 2 Controllers + 2 Pasang Joycon Switch| 2 Sofa | Netflix | Air Purifier | AC | Ruangan 13m2";
                }
                ?>
    <small><?= $deskripsi ?></small>
</div>
                        <div class="unit-price">
                            Rp <?= number_format($r['harga_per_jam'], 0, ',', '.') ?> <span style="font-size:0.8em; color:#9ba1a6;">/ hr</span>
                        </div>
                    </div>
                </label>
                <?php endwhile; ?>
            </div>

            <div class="glass-card">
                <h2>⏱️ Detail Waktu</h2>
                
                <div class="input-group">
                    <label>⏱️ Durasi Sewa</label>
                    <select name="durasi" id="durasi-select" required>
                        <option value="" disabled selected>Pilih durasi...</option>
                        <option value="1">1 Jam (60 Menit)</option>
                        <option value="2">2 Jam (120 Menit)</option>
                        <option value="3">3 Jam (180 Menit)</option>
                        <option value="4">4 Jam (240 Menit)</option>
                        <option value="5">5 Jam (300 Menit)</option>
                    </select>
                </div>

                <div class="date-time-row">
                    <div class="input-group">
                        <label>🗓️ Tanggal</label>
                        <input type="date" name="tanggal_main" required>
                    </div>
                    <div class="input-group">
                        <label>⏱️ Waktu Mulai</label>
                        <input type="time" name="waktu_main" required>
                    </div>
                </div>

                
                <div class="step-header">
    <span class="step-num"></span>
    <h4>PILIH TAMBAHAN (Optional)</h4>
</div>

<div class="addon-grid">
    <div class="addon-card">
        <input type="checkbox" name="addons[]" value="15000" id="food1" class="addon-check">
        <label for="food1" class="addon-label">
            <span class="addon-icon">🍟</span>
            <div class="addon-info">
                <span class="addon-name">French Fries</span>
                <span class="addon-price">+ Rp 15.000</span>
            </div>
        </label>
    </div>

    <div class="addon-card">
        <input type="checkbox" name="addons[]" value="12000" id="food2" class="addon-check">
        <label for="food2" class="addon-label">
            <span class="addon-icon">🍜</span>
            <div class="addon-info">
                <span class="addon-name">Mie Telur</span>
                <span class="addon-price">+ Rp 12.000</span>
            </div>
        </label>
    </div>

    <div class="addon-card">
        <input type="checkbox" name="addons[]" value="5000" id="drink1" class="addon-check">
        <label for="drink1" class="addon-label">
            <span class="addon-icon">🥤</span>
            <div class="addon-info">
                <span class="addon-name">Es Teh Manis</span>
                <span class="addon-price">+ Rp 5.000</span>
            </div>
        </label>
    </div>

        <div class="addon-card">
        <input type="checkbox" name="addons[]" value="5000" id="drink2" class="addon-check">
        <label for="drink2" class="addon-label">
            <span class="addon-icon">☕</span>
            <div class="addon-info">
                <span class="addon-name">Es Kopi</span>
                <span class="addon-price">+ Rp 5.000</span>
            </div>
        </label>
    </div>
</div>


                <div class="total-display">
                    <p>💰 Total Harga</p>
                    <h3 id="display-harga">Rp 0</h3>
                </div>

                <button type="submit" name="submit_order" class="btn-neon">
                    CONFIRM BOOKING
                </button>


                <div class="extra-info">
                <p class="info-title">Metode Pembayaran Tersedia:</p>
            <div class="payment-icons">
                <span class="badge">QRIS</span>
                <span class="badge">BCA</span>
                <span class="badge">GoPay</span>
                <span class="badge">DANA</span>
            </div>
    
    <div class="rules-box">
        <small>⚠️ <b>Catatan:</b> Harap datang 10 menit sebelum waktu bermain. Keterlambatan akibat dari penyewa tidak akan menambah durasi sewa.</small>
    </div>
            </div>

    <script>
        // 1. Ambil semua elemen penting dari HTML
        const roomRadios = document.querySelectorAll('.room-radio');
        const durasiSelect = document.getElementById('durasi-select');
        const addonChecks = document.querySelectorAll('.addon-check');
        const displayHarga = document.getElementById('display-harga');

        // 2. Fungsi Utama untuk Kalkulasi Semua Harga
        function hitungTotal() {
            let hargaPerJam = 0;
            let durasi = 0;
            let totalTambahan = 0;

            // A. Cek Harga Unit PS (Ambil dari data-price)
            roomRadios.forEach(radio => {
                if (radio.checked) {
                    hargaPerJam = parseInt(radio.getAttribute('data-price'));
                }
            });

            // B. Cek Durasi Sewa
            if (durasiSelect.value) {
                durasi = parseInt(durasiSelect.value);
            }

            // C. Hitung Total Harga Makanan & Minuman yang Dicentang
            addonChecks.forEach(checkbox => {
                if (checkbox.checked) {
                    totalTambahan += parseInt(checkbox.value);
                }
            });

            // D. Kalkulasi Total Akhir
            // Rumus: (Harga PS * Jam) + Makanan
            let totalAkhir = (hargaPerJam * durasi) + totalTambahan;

            // E. Tampilkan ke Layar (Ubah format ke Rupiah)
            if (totalAkhir > 0) {
                displayHarga.innerText = 'Rp ' + totalAkhir.toLocaleString('id-ID');
            } else {
                displayHarga.innerText = 'Rp 0';
            }
        }

        // 3. Pasang "Pendeteksi" ke semua tombol agar otomatis hitung saat diklik
        roomRadios.forEach(radio => radio.addEventListener('change', hitungTotal));
        durasiSelect.addEventListener('change', hitungTotal);
        addonChecks.forEach(checkbox => checkbox.addEventListener('change', hitungTotal));

    </script>
</body>
</html>




