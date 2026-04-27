-- 1. MEMBUAT DATABASE
CREATE DATABASE IF NOT EXISTS perpustakaan_lengkap;
USE perpustakaan_lengkap;

-- ==========================================
-- 2. MEMBUAT TABEL DAN IMPLEMENTASI SOFT DELETE
-- Konsep soft delete menggunakan kolom deleted_at. 
-- Jika nilainya NULL berarti data aktif, jika ada tanggalnya berarti data terhapus.
-- ==========================================

-- Tabel Rak (Bonus)
CREATE TABLE rak (
    id_rak INT AUTO_INCREMENT PRIMARY KEY,
    nama_rak VARCHAR(50) NOT NULL,
    lokasi VARCHAR(100),
    deleted_at TIMESTAMP NULL DEFAULT NULL
);

-- Tabel Kategori Buku
CREATE TABLE kategori_buku (
    id_kategori INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(50) NOT NULL UNIQUE,
    deskripsi TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL
);

-- Tabel Penerbit
CREATE TABLE penerbit (
    id_penerbit INT AUTO_INCREMENT PRIMARY KEY,
    nama_penerbit VARCHAR(100) NOT NULL,
    alamat TEXT,
    telepon VARCHAR(15),
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL
);

-- Tabel Buku (Modifikasi FK ke kategori, penerbit, dan rak)
CREATE TABLE buku (
    id_buku INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    pengarang VARCHAR(100),
    tahun_terbit INT,
    harga DECIMAL(10,2),
    stok INT,
    id_kategori INT,
    id_penerbit INT,
    id_rak INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (id_kategori) REFERENCES kategori_buku(id_kategori) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_penerbit) REFERENCES penerbit(id_penerbit) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_rak) REFERENCES rak(id_rak) ON DELETE SET NULL ON UPDATE CASCADE
);

-- ==========================================
-- 3. INSERT DATA SAMPLE
-- ==========================================

-- Insert 2 Rak
INSERT INTO rak (nama_rak, lokasi) VALUES
('Rak A1', 'Lantai 1 Lorong A'),
('Rak B1', 'Lantai 1 Lorong B');

-- Insert 5 Kategori
INSERT INTO kategori_buku (nama_kategori, deskripsi) VALUES
('Programming', 'Buku tentang bahasa pemrograman dan coding'),
('Database', 'Buku tentang perancangan dan manajemen basis data'),
('Sistem Informasi', 'Buku tentang analisis, desain, dan pengembangan sistem'),
('Jaringan', 'Buku tentang infrastruktur dan keamanan jaringan'),
('Fiksi', 'Koleksi novel dan cerita fiksi');

-- Insert 5 Penerbit
INSERT INTO penerbit (nama_penerbit, alamat, telepon, email) VALUES
('Informatika', 'Bandung', '022123456', 'info@informatika.com'),
('Andi Publisher', 'Yogyakarta', '0274123456', 'info@andipublisher.com'),
('Elex Media', 'Jakarta', '021123456', 'elex@media.com'),
('Gramedia', 'Jakarta', '021987654', 'info@gramedia.com'),
('BukuKita', 'Surabaya', '031123456', 'admin@bukukita.com');

-- Insert 15 Buku
INSERT INTO buku (judul, pengarang, tahun_terbit, harga, stok, id_kategori, id_penerbit, id_rak) VALUES
('Belajar PHP Dasar', 'Budi Raharjo', 2024, 85000, 10, 1, 1, 1),
('Pemrograman Berorientasi Objek', 'Zaki Kafila Pamungkas', 2026, 120000, 8, 1, 2, 1),
('Analisis dan Perancangan Sistem', 'Rosa A.S', 2023, 95000, 5, 3, 1, 2),
('Mastering MySQL', 'Abdul Kadir', 2022, 110000, 12, 2, 2, 1),
('Jaringan Komputer Lanjut', 'Iwan Sofana', 2021, 130000, 4, 4, 1, 2),
('Membangun Web dengan Laravel', 'Budi Raharjo', 2024, 95000, 7, 1, 1, 1),
('Basis Data Relasional', 'Fathansyah', 2020, 80000, 15, 2, 3, 1),
('UML Distilled', 'Martin Fowler', 2019, 150000, 3, 3, 3, 2),
('Keamanan Jaringan', 'Onno W. Purbo', 2023, 105000, 6, 4, 2, 2),
('Laskar Pelangi', 'Andrea Hirata', 2005, 75000, 20, 5, 4, 2),
('Python untuk Pemula', 'Jubilee Enterprise', 2024, 60000, 10, 1, 3, 1),
('Desain Database Modern', 'Zaki Kafila Pamungkas', 2025, 115000, 8, 2, 1, 1),
('Sistem Informasi Manajemen', 'Jogiyanto', 2021, 140000, 5, 3, 2, 2),
('Mikrotik Dasar', 'Rendra Towidjojo', 2022, 90000, 11, 4, 5, 2),
('Bumi Manusia', 'Pramoedya A. Toer', 2000, 85000, 14, 5, 4, 2);

-- ==========================================
-- 4. STORED PROCEDURE (BONUS)
-- ==========================================

-- Procedure untuk melakukan soft delete pada buku
DELIMITER //
CREATE PROCEDURE sp_hapus_buku(IN p_id_buku INT)
BEGIN
    UPDATE buku SET deleted_at = CURRENT_TIMESTAMP WHERE id_buku = p_id_buku;
END //
DELIMITER ;

-- ==========================================
-- 5. QUERY JOIN YANG DIMINTA
-- ==========================================

-- Query 1: JOIN untuk tampilkan buku dengan nama kategori dan penerbit
SELECT b.judul, k.nama_kategori, p.nama_penerbit
FROM buku b
JOIN kategori_buku k ON b.id_kategori = k.id_kategori
JOIN penerbit p ON b.id_penerbit = p.id_penerbit
WHERE b.deleted_at IS NULL;

-- Query 2: Jumlah buku per kategori
SELECT k.nama_kategori, COUNT(b.id_buku) AS jumlah_buku
FROM kategori_buku k
LEFT JOIN buku b ON k.id_kategori = b.id_kategori AND b.deleted_at IS NULL
GROUP BY k.id_kategori;

-- Query 3: Jumlah buku per penerbit
SELECT p.nama_penerbit, COUNT(b.id_buku) AS jumlah_buku
FROM penerbit p
LEFT JOIN buku b ON p.id_penerbit = b.id_penerbit AND b.deleted_at IS NULL
GROUP BY p.id_penerbit;

-- Query 4: Buku beserta detail lengkap (kategori + penerbit + rak)
SELECT b.id_buku, b.judul, b.pengarang, b.tahun_terbit, b.harga, b.stok, 
       k.nama_kategori, p.nama_penerbit, r.nama_rak, r.lokasi
FROM buku b
JOIN kategori_buku k ON b.id_kategori = k.id_kategori
JOIN penerbit p ON b.id_penerbit = p.id_penerbit
LEFT JOIN rak r ON b.id_rak = r.id_rak
WHERE b.deleted_at IS NULL;