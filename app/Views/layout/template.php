<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?> | RafOzone</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
    :root {
        --primary: #00d1ff;
        --secondary: #007bff;
        --dark-bg: #0f172a;
        --card-bg: #1e293b;
        --input-bg: rgba(30, 41, 59, 0.7);
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--dark-bg);
        color: #ffffff;
        margin: 0;
        overflow-x: hidden;
    }

    /* --- NAVIGATION --- */
    .navbar {
        background-color: rgba(15, 23, 42, 0.9) !important;
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(255,255,255,0.1);
        z-index: 1050;
    }
    .navbar-brand {
        font-weight: 800;
        color: var(--primary) !important;
        text-shadow: 0 0 10px rgba(0, 209, 255, 0.5);
    }
    .nav-link { color: #cbd5e1 !important; transition: 0.3s; }
    .nav-link:hover { color: var(--primary) !important; }

    /* --- LAYOUT WRAPPERS --- */
    .content-wrapper {
        padding-top: 0 !important; /* Biar Home bisa mentok ke atas */
        min-height: 80vh;
    }

    /* Gunakan class ini di div pembungkus halaman selain Home */
    .layanan-wrapper {
        padding-top: 120px; 
        padding-bottom: 60px;
    }

    /* --- HERO SECTION (HOME) --- */
    .hero-top {
        padding-top: 140px; 
        padding-bottom: 80px;
        background: radial-gradient(circle at top right, rgba(0, 209, 255, 0.15), transparent);
    }

    /* --- COMPONENTS: CARDS --- */
    .card, .card-layanan {
        background: var(--card-bg) !important;
        border: 1px solid rgba(255,255,255,0.08) !important;
        border-radius: 20px !important;
        color: white;
        transition: all 0.3s ease;
        overflow: hidden;
    }
    .card:hover, .card-layanan:hover {
        transform: translateY(-8px);
        border-color: var(--primary) !important;
        box-shadow: 0 10px 30px rgba(0, 209, 255, 0.2);
    }

    /* --- COMPONENTS: BUTTONS --- */
    .btn-neon, .btn-booking {
        border: 2px solid var(--primary);
        background: transparent;
        color: var(--primary) !important;
        border-radius: 12px;
        padding: 12px 30px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        display: inline-block;
        text-align: center;
    }
    .btn-neon { width: 100%; max-width: 800px; display: block; margin: 0 auto; }
    .btn-booking { width: 100%; }

    .btn-neon:hover, .btn-booking:hover {
        background: var(--primary) !important;
        color: #0f172a !important;
        box-shadow: 0 0 20px rgba(0, 209, 255, 0.6);
        transform: scale(1.02);
        text-decoration: none;
    }

    /* Tombol Konfirmasi (Green Neon) */
    .btn-confirm {
        background: linear-gradient(90deg, #22c55e, #10b981);
        border: none;
        color: white;
        font-weight: 700;
        padding: 15px;
        border-radius: 12px;
        transition: 0.3s;
    }
    .btn-confirm:hover {
        box-shadow: 0 0 20px rgba(34, 197, 94, 0.4);
        transform: translateY(-2px);
    }

    /* --- FORMS (BOOKING PAGE) --- */
    .form-control, .custom-select {
        background-color: var(--input-bg) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        color: #ffffff !important;
        border-radius: 10px !important;
        padding: 12px !important;
        height: auto !important;
    }
    .form-control:focus, .custom-select:focus {
        border-color: var(--primary) !important;
        box-shadow: 0 0 10px rgba(0, 209, 255, 0.3) !important;
    }
    label { color: #cbd5e1; font-weight: 600; margin-bottom: 8px; }

    /* Mengubah warna ikon kalender di input date/datetime menjadi putih */
input[type="datetime-local"]::-webkit-calendar-picker-indicator,
input[type="date"]::-webkit-calendar-picker-indicator {
    filter: invert(1); /* Membalik warna dari hitam ke putih */
    cursor: pointer;
    opacity: 0.8;
}

input[type="datetime-local"]::-webkit-calendar-picker-indicator:hover,
input[type="date"]::-webkit-calendar-picker-indicator:hover {
    opacity: 1;
}

    /* --- UTILITIES --- */
    .text-gradient {
        background: linear-gradient(90deg, #00d1ff, #007bff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .text-glow { text-shadow: 0 0 15px rgba(0, 209, 255, 0.8); }
    .section-gap { margin: 60px 0; }
    
    .badge-ps { background: var(--primary); color: #0f172a; font-weight: 700; padding: 5px 12px; border-radius: 6px; }
    .badge-success { background: rgba(34, 197, 94, 0.2); color: #4ade80; border: 1px solid #22c55e; }
    .badge-danger { background: rgba(239, 68, 68, 0.2); color: #f87171; border: 1px solid #ef4444; }
    
    .menu-img { height: 180px; object-fit: cover; }
</style>
</head>
<body>

    <?= $this->include('layout/header'); ?>

    <div class="content-wrapper">
        <?= $this->renderSection('content'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>