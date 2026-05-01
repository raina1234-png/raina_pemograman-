<?php
session_start();

// 1. KONEKSI KE DATABASE (Sesuaikan dengan gambar: belajar_db)
$host = "localhost";
$user = "root";
$pass = "";
$db   = "belajar_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$pesan = "";

// 2. PROSES INPUT (INSERT ke tabel 'users')
if (isset($_POST['simpan'])) {
    $nama  = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if (!empty($nama) && !empty($email)) {
        // Query sesuai dengan struktur kolom di foto: id (auto), nama, email
        $query = "INSERT INTO users (nama, email) VALUES ('$nama', '$email')";
        
        if (mysqli_query($conn, $query)) {
            $_SESSION['info'] = "Data $nama berhasil disimpan!";
            header("Location: " . $_SERVER['PHP_SELF']); // Redirect agar tidak double input saat refresh
            exit();
        } else {
            $pesan = "Gagal Simpan: " . mysqli_error($conn);
        }
    } else {
        $pesan = "Nama dan Email tidak boleh kosong!";
    }
}

// 3. AMBIL DATA (SELECT dari tabel 'users')
$tampil = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul Web Programming - Aesthetic Pink Edition</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <style>
        :root {
            --pink-light: #fce4ec;
            --pink-medium: #f8bbd0;
            --pink-strong: #f06292;
            --pink-dark: #d81b60;
        }

        body {
            font-family: 'Quicksand', sans-serif;
            background-color: var(--pink-light);
            color: #444;
            margin: 0; padding: 0;
        }

        header {
            background: white;
            padding: 40px 20px;
            text-align: center;
            border-bottom: 4px solid var(--pink-medium);
        }

        h1 {
            font-family: 'Playfair Display', serif;
            color: var(--pink-dark);
            font-size: 2.5rem; margin: 0;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(216, 27, 96, 0.05);
            margin-bottom: 30px;
        }

        .badge {
            background: var(--pink-strong);
            color: white;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 15px;
        }

        h2 {
            color: var(--pink-dark);
            border-left: 5px solid var(--pink-strong);
            padding-left: 15px;
        }

        .aesthetic-profile-img {
            width: 100%;
            max-width: 250px;
            border-radius: 15px;
            margin: 20px 0;
            filter: sepia(20%) hue-rotate(320deg);
        }

        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            border-radius: 10px;
            overflow: hidden;
        }

        .styled-table thead tr {
            background-color: var(--pink-strong);
            color: #ffffff;
            text-align: left;
        }

        .styled-table th, .styled-table td { padding: 12px 15px; }

        .styled-table tbody tr { border-bottom: 1px solid var(--pink-light); }

        .alert {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            border: 1px solid #c8e6c9;
            text-align: center;
        }

        .form-container input {
            width: 100%; padding: 12px; margin: 10px 0;
            border: 2px solid var(--pink-medium);
            border-radius: 10px; outline: none;
            box-sizing: border-box;
        }

        .form-container button {
            background-color: var(--pink-strong);
            color: white; border: none; padding: 15px;
            border-radius: 10px; cursor: pointer;
            font-weight: bold; width: 100%; transition: 0.3s;
        }

        .form-container button:hover { background-color: var(--pink-dark); }
    </style>
</head>
<body>

    <header>
        <h1>Materi Pemrograman Web</h1>
        <p>Belajar HTML & CSS dengan Gaya yang Estetik</p>
    </header>

    <main class="container">
        
        <!-- Notifikasi Pesan -->
        <?php if (isset($_SESSION['info'])): ?>
            <div class="alert"><?= $_SESSION['info']; unset($_SESSION['info']); ?></div>
        <?php endif; ?>
        <?php if ($pesan != ""): ?>
            <div class="alert" style="background:#ffebee; color:#c62828; border-color:#ffcdd2;"><?= $pesan; ?></div>
        <?php endif; ?>

        <!-- Form Input -->
        <section class="card form-container">
            <div class="badge">Registrasi</div>
            <h2>Input Data Mahasiswa</h2>
            <form method="POST" action="">
                <input type="text" name="nama" placeholder="Nama Lengkap" required>
                <input type="email" name="email" placeholder="Email Aktif" required>
                <button type="submit" name="simpan">Simpan ke Database</button>
            </form>
        </section>

        <!-- Tabel Data -->
        <section class="card">
            <div class="badge">Database</div>
            <h2>Daftar Pengguna (Tabel: users)</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($tampil)): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['email']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>

        <!-- Konten Gambar Aesthetic -->
        <section class="card">
            <div class="badge">Part 1</div>
            <h2>HTML5: Pondasi Utama</h2>
            <img src="download.png" alt="Coding HTML" class="aesthetic-profile-img">
            <p>HTML adalah kerangka utama dari sebuah website.</p>
        </section>

        <section class="card">
            <div class="badge">Part 2</div>
            <h2>CSS3: Estetika Visual</h2>
            <img src="download (3).png" alt="Desain CSS" class="aesthetic-profile-img">
            <p>CSS digunakan untuk mengatur tampilan visual agar menarik.</p>
        </section>

    </main>

    <footer>
        <p>&copy; 2026 Belajar Web Desain - Aesthetic Pink Theme</p>
    </footer>

</body>
</html>
<?php mysqli_close($conn); ?>