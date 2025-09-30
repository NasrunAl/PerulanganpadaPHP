<?php

// =================================================
// STUDI KASUS: HITUNG TOTAL BELANJA ONLINE
// =================================================

echo "<h1>🛒 Detail Keranjang Belanja</h1>";

// --- DATA SIMULASI ---
// Ini adalah data barang-barang yang ada di keranjang belanja.
// Dalam aplikasi nyata, data ini biasanya diambil dari database.
$keranjang = [
    ['nama' => 'Buku Pemrograman PHP', 'harga' => 150000, 'jumlah' => 1],
    ['nama' => 'Mouse Gaming', 'harga' => 250000, 'jumlah' => 1],
    ['nama' => 'Keyboard Mechanical', 'harga' => 400000, 'jumlah' => 2]
];

// Data pelanggan
$kota_tujuan = 'Surabaya'; // Coba ganti menjadi 'Jakarta' atau 'Luar Jawa'


// --- 1. PROSES LOOPING UNTUK HITUNG SUBTOTAL ---
$subtotal = 0;
echo "<b>Barang yang dibeli:</b><ul>";

// Kita gunakan loop 'foreach' untuk memproses setiap item di dalam array $keranjang.
foreach ($keranjang as $item) {
    // Hitung total harga per item (harga * jumlah)
    $total_item = $item['harga'] * $item['jumlah'];

    // Tampilkan detail item ke layar
    echo "<li>" . $item['nama'] . " (" . $item['jumlah'] . "x) - Rp " . number_format($total_item) . "</li>";
    
    // Tambahkan total harga item ke subtotal keseluruhan
    $subtotal += $total_item;
}
echo "</ul>";
echo "<hr>";


// --- 2. PROSES PERCABANGAN UNTUK DISKON & ONGKIR ---
$diskon = 0;
$ongkir = 0;

echo "<b>Detail Biaya:</b><br>";
echo "Subtotal Belanja: Rp " . number_format($subtotal) . "<br>";

// Percabangan IF-ELSE: Cek apakah subtotal lebih dari Rp 500.000 untuk dapat diskon
if ($subtotal > 500000) {
    $diskon = 50000; // Jika ya, dapat diskon Rp 50.000
    echo "Diskon Spesial: - Rp " . number_format($diskon) . "<br>";
} else {
    echo "Diskon Spesial: (Tidak dapat diskon)<br>";
}

// Percabangan SWITCH-CASE: Menentukan ongkos kirim berdasarkan kota
switch ($kota_tujuan) {
    case 'Jakarta':
        $ongkir = 15000;
        break;
    case 'Surabaya':
        $ongkir = 20000;
        break;
    case 'Bandung':
        $ongkir = 18000;
        break;
    default:
        // 'default' dijalankan jika tidak ada 'case' yang cocok
        $ongkir = 30000;
        $kota_tujuan = "Luar Jawa"; // Memperjelas tujuan
        break;
}
echo "Ongkos Kirim (" . $kota_tujuan . "): Rp " . number_format($ongkir) . "<br>";
echo "<hr>";


// --- 3. HITUNG TOTAL AKHIR ---
$total_bayar = $subtotal - $diskon + $ongkir;

echo "<h2>Total yang Harus Dibayar: Rp " . number_format($total_bayar) . "</h2>";

?>