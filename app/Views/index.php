<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="pt-5 pb-5" style="background: radial-gradient(circle at top right, rgba(0, 209, 255, 0.1), transparent);">  
<div class="container pt-5">

    <h1 class="text-center display-4 font-weight-bold mb-4">
        LEVEL UP YOUR <span class="text-gradient text-glow">GAMING EXPERIENCE</span>
    </h1>
    
    <p class="text-center text-muted mb-5 mx-auto" style="max-width: 700px; font-size: 1.1rem; line-height: 1.8;">
        Rasakan sensasi bermain PlayStation dengan fasilitas premium, <br>
        ruangan nyaman, dan game terbaru. Booking sekarang tanpa antre!
    </p>

    <div class="row align-items-center">
        
        <!-- KIRI (GAMBAR) -->
         <div class="mx-auto" style="max-width: 1000px;">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8 mb-7">
            <div class="position-relative">
                <img src="https://api.duniagames.co.id/optimize-image?url=https%3A%2F%2Fapi.duniagames.co.id%2Fapi%2Fcontent%2Fupload%2Ffile%2F12353308381742883417.jpg&format=webp&width=736&signature=9efe227f324c770113b152205eecf717e81453de8daa0be9dad392720db81d8c" 
                     class="img-fluid rounded shadow w-100" 
                     alt="Tempat PS">

                <!-- alamat kiri bawah -->
                <div style="
                    position: absolute;
                    bottom: 20px;
                    left: 20px;
                    background: rgba(0,0,0,0.6);
                    padding: 15px 20px;
                    border-radius: 10px;
                    max-width: 250px;
                ">
                
                    <p class="text-light small mb-0">
                        Jl. Kedung Mundu Raya No. 20
                        Semarang Selatan
                    </p>
                </div>
            </div>
        </div>

<!--KANAN (PROMO) -->
<div class="col-md-4">
    <div class="p-4 shadow" style="background: rgba(0,0,0,0.4); border-radius: 20px; border: 2px solid rgb(242, 209, 75);">
        
        <h2 class="text-warning font-weight-bold mb-3">SPECIAL PROMO</h2>
        <h1 class="text-danger font-weight-bold mb-3">DISKON 10%</h1>

        <h4 class="text-white mb-4">REGULER / VIP 1</h4>

        <hr style="border-color: rgba(255,255,255,0.2);">

        <!-- Syarat -->
        <div class="text-muted small mb-3">
            <p class="mb-1">Syarat & Ketentuan:</p>
            <ul class="pl-3 mb-0">
                <li>Berlaku bulan Mei</li>
                <li>Minimal booking 5 jam</li>
                <li>Tidak berlaku di hari libur</li>
            </ul>
        </div>

        <a href="/layanan" class="btn btn-warning btn-block">Booking Sekarang</a>
    </div>
</div>

</div>
        

</section>


<div class="container pb-5 mt-5">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100 p-4">
                <div class="card-body text-center">
                    <i class="fas fa-bolt text-primary mb-3 fa-2x"></i>
                    <h5 class="font-weight-bold text-white">Booking Instan</h5>
                    <p class="text-muted small">Pesan room pilihanmu dalam hitungan detik tanpa antre.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 p-4" style="border: 1px solid var(--primary);">
                <div class="card-body text-center">
                    <i class="fas fa-utensils  text-primary mb-3 fa-2x"></i>
                    <h5 class="font-weight-bold text-white">Snacks & Drinks</h5>
                    <p class="text-muted small">Nikmati sesi gaming kamu dengan makanan dan minuman favorit.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 p-4">
                <div class="card-body text-center">
                    <i class="fas fa-qrcode text-primary mb-3 fa-2x"></i>
                    <h5 class="font-weight-bold text-white">QRIS Payment</h5>
                    <p class="text-muted small">Pembayaran otomatis dan aman menggunakan QRIS.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>