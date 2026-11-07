# Studi Kasus: Data Titik CCTV Kota Samarinda

Paket PHP, HTML, JavaScript dan MySQL untuk menampilkan, memasukkan, menghapus, serta mengedit data CCTV.
Sumber: https://geoportal.samarindakota.go.id/satu-peta — layer Titik CCTV Kota Samarinda.

## Menjalankan
1. Ekstrak folder stusikasus ke C:\wamp64\www\ sehingga index.php berada di C:\wamp64\www\stusikasus\index.php.
2. Aktifkan Apache dan MySQL melalui WampServer.
3. Buka phpMyAdmin, pilih Import, dan impor stusikasus.sql. Berkas ini membuat database stusikasus dan tabel cctv tanpa menghapus data lama.
4. Jika akun MySQL memiliki kata sandi, ubah $password di kelima berkas PHP: index.php, delete.php, input/input.php, edit/index.php, edit/edit.php. Semuanya memakai database stusikasus.
5. Buka http://localhost/stusikasus/index.php lalu pilih Input Data.

Nama folder mengikuti tulisan permintaan: stusikasus. Pada gambar Explorer tertulis studikasus. Jika menggunakan nama studikasus, ubah nama folder hasil ekstraksi dan akses http://localhost/studikasus/index.php. Nama database tetap stusikasus; keduanya tidak harus sama.

## Kolom
Kolom sumber yang terlihat pada gambar: NO, PROVINSI, KAB_KOTA, KECAMATAN, KELURAHAN_, NAMA_CCTV, STATUS, ALAMAT. KELURAHAN_ disederhanakan menjadi kelurahan di database. NO disimpan sebagai no (Nomor Sumber). id adalah kunci internal AUTO_INCREMENT terpisah dari NO sumber.
Longitude dan latitude ditambahkan untuk menyimpan geometri titik. Gunakan koordinat objek dari data ekspor atau atribut geometri, dengan CRS EPSG:4326. Angka koordinat sudut peta tidak otomatis merupakan koordinat CCTV. Jika belum diketahui, kedua isian boleh kosong dan disimpan NULL; rekaman tersebut belum lengkap sebagai data titik.
Tangkapan layar memuat nama CCTV Simpang Masjid Raya, NO 12, status Aktif, alamat Jl.Niaga Barat. Nilai administrasinya perlu diperiksa kembali pada sumber sebelum dipakai. Tidak ada data atau koordinat contoh yang dibuat-buat dalam SQL.

## Hubungan dengan modul
Alur modul dipertahankan: new mysqli -> SELECT -> fetch_assoc -> tabel HTML; formulir POST -> INSERT; id GET -> DELETE; SELECT berdasarkan id -> formulir edit POST -> UPDATE.
Ini adaptasi kolom, bukan salinan identik. Penyesuaian: pengaturan database, HTML escaping, pemeriksaan ID dan isian, escaping teks SQL, validasi koordinat, serta redirect ke ../index.php dari subfolder. Tidak ada framework atau prepared statement dalam paket ini. Pesan sukses tidak dicetak sebelum header agar pengalihan tidak terganggu.
Validasi luas modul diganti validasi koordinat karena layer CCTV tidak memiliki kolom luas pada bagian gambar yang terlihat. Formulir edit menggunakan return false untuk mencegah pengiriman data tidak valid.

## Uji di komputer lokal
1. Tambahkan satu data dari geoportal melalui formulir dan periksa di tabel web serta phpMyAdmin.
2. Klik edit, ubah satu atribut, Submit, pastikan baris yang sama berubah.
3. Coba koordinat longitude 200; formulir harus menolak.
4. Tambahkan rekaman uji terpisah, lalu hapus rekaman uji tersebut. Pastikan data sumber lain tetap tersedia.
5. Pastikan apostrof pada teks seperti O'Brian dapat tersimpan dan muncul dengan benar.

Paket belum dijalankan terhadap MySQL/WampServer pengguna. Versi awal ini mempertahankan aksi hapus melalui tautan GET sesuai modul untuk latihan localhost. Jika akan diterapkan sebagai layanan publik, tambahkan autentikasi, perlindungan CSRF, dan ubah hapus menjadi POST.
