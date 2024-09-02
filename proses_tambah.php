<?php
// Include file koneksi
include 'koneksi.php';

// Mulai session
session_start();

// Ambil data dari form
$trainer_name = $_POST['trainer_name'];
$date = $_POST['date'];
$session_number = $_POST['session_number'];
$time = $_POST['time'];
$topic = $_POST['topic'];

// Prepared statement untuk mengecek apakah trainer sudah ada di database
$stmt = $conn->prepare("SELECT id FROM trainers WHERE name = ?");
$stmt->bind_param("s", $trainer_name);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Jika trainer sudah ada, gunakan ID-nya
    $row = $result->fetch_assoc();
    $trainer_id = $row['id'];
} else {
    // Jika trainer belum ada, tambahkan ke database
    $stmt_insert_trainer = $conn->prepare("INSERT INTO trainers (name) VALUES (?)");
    $stmt_insert_trainer->bind_param("s", $trainer_name);
    if ($stmt_insert_trainer->execute()) {
        $trainer_id = $stmt_insert_trainer->insert_id; // Ambil ID dari trainer yang baru ditambahkan
    } else {
        echo "Error: " . $stmt_insert_trainer->error;
        exit;
    }
}

// Masukkan data sesi ke dalam tabel sessions
$stmt_insert_session = $conn->prepare("INSERT INTO sessions (trainer_id, date, session_number, time, topic) VALUES (?, ?, ?, ?, ?)");
$stmt_insert_session->bind_param("issss", $trainer_id, $date, $session_number, $time, $topic);

if ($stmt_insert_session->execute()) {
    // Redirect ke halaman tambah_jadwal.php dengan parameter query string
    header("Location: tambah_jadwal.php?success=1");
    exit();
} else {
    echo "Error: " . $stmt_insert_session->error;
}

// Tutup koneksi
$stmt->close();
$stmt_insert_trainer->close();
$stmt_insert_session->close();
$conn->close();
?>