-- 1. Buat Database
CREATE DATABASE perpustakaan_lengkap;
USE perpustakaan_lengkap;

-- 2. Buat Tabel Kategori Buku
CREATE TABLE kategori_buku (
    id_kategori INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(50) NOT NULL UNIQUE,
    deskripsi TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. Buat Tabel Penerbit
CREATE TABLE penerbit (
    id_penerbit INT AUTO_INCREMENT PRIMARY KEY,
    nama_penerbit VARCHAR(100) NOT NULL,
    alamat TEXT,
    telepon VARCHAR(15),
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 4. Buat Tabel Buku (dengan Modifikasi Foreign Key)
CREATE TABLE buku (
    id_buku INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    pengarang VARCHAR(100),
    id_kategori INT,
    id_penerbit INT,
    harga DECIMAL(10, 2),
    stok INT DEFAULT 0,
    tahun_terbit YEAR,
    FOREIGN KEY (id_kategori) REFERENCES kategori_buku(id_kategori) ON DELETE CASCADE,
    FOREIGN KEY (id_penerbit) REFERENCES penerbit(id_penerbit) ON DELETE CASCADE
);

-- 5. Isi Data Sample (Insert)
-- Data Kategori
INSERT INTO kategori_buku (nama_kategori, deskripsi) VALUES
('Programming', 'Buku panduan coding dan software development'),
('Design', 'Buku desain grafis dan multimedia'),
('Business', 'Buku manajemen dan bisnis'),
('Self Help', 'Buku pengembangan diri'),
('Fiction', 'Buku novel dan sastra');

-- Data Penerbit
INSERT INTO penerbit (nama_penerbit, alamat, telepon, email) VALUES
('Gramedia', 'Jakarta', '021111', 'info@gramedia.com'),
('Informatika', 'Bandung', '022222', 'kontak@informatika.com'),
('Erlangga', 'Jakarta', '021333', 'redaksi@erlangga.id'),
('Andi Offset', 'Yogyakarta', '027444', 'admin@andioffset.com'),
('Mizan', 'Bandung', '022555', 'mizan@mizan.id');

-- Data Buku (Minimal 15)
INSERT INTO buku (judul, pengarang, id_kategori, id_penerbit, harga, stok, tahun_terbit) VALUES
('Belajar PHP Dasar', 'Budi Raharjo', 1, 2, 85000, 10, 2024),
('Mastering MySQL', 'Budi Raharjo', 1, 2, 95000, 4, 2024),
('Clean Code', 'Robert C. Martin', 1, 1, 150000, 8, 2023),
('UI/UX Design Kit', 'Don Norman', 2, 3, 120000, 6, 2022),
('Strategi Bisnis Digital', 'Renald Kasali', 3, 1, 110000, 12, 2023),
('Habits for Success', 'James Clear', 4, 4, 90000, 20, 2024),
('Laskar Pelangi', 'Andrea Hirata', 5, 5, 75000, 15, 2021),
('Python for Data Science', 'Jake VanderPlas', 1, 3, 180000, 3, 2024),
('Typography Masterclass', 'Erik Spiekermann', 2, 4, 135000, 7, 2022),
('Marketing 5.0', 'Philip Kotler', 3, 1, 160000, 9, 2023),
('Atomic Habits', 'James Clear', 4, 4, 105000, 18, 2024),
('Bumi Manusia', 'Pramoedya A. Toer', 5, 5, 125000, 10, 2020),
('Java Advanced', 'Budi Raharjo', 1, 2, 115000, 2, 2024),
('Adobe Illustrator Guide', 'Mordy Golding', 2, 3, 140000, 5, 2023),
('Entrepreneurship 101', 'Bill Aulet', 3, 4, 130000, 11, 2024);

-- 6. Query yang diminta
-- A. JOIN tampilkan buku dengan nama kategori dan penerbit
SELECT b.judul, k.nama_kategori, p.nama_penerbit, b.harga
FROM buku b
JOIN kategori_buku k ON b.id_kategori = k.id_kategori
JOIN penerbit p ON b.id_penerbit = p.id_penerbit;

-- B. Jumlah buku per kategori
SELECT k.nama_kategori, COUNT(b.id_buku) AS total_buku
FROM kategori_buku k
LEFT JOIN buku b ON k.id_kategori = b.id_kategori
GROUP BY k.nama_kategori;

-- C. Jumlah buku per penerbit
SELECT p.nama_penerbit, COUNT(b.id_buku) AS total_buku
FROM penerbit p
LEFT JOIN buku b ON p.id_penerbit = b.id_penerbit
GROUP BY p.nama_penerbit;

-- D. Buku beserta detail lengkap (kategori + penerbit)
SELECT b.id_buku, b.judul, b.pengarang, k.nama_kategori, p.nama_penerbit, b.harga, b.stok, b.tahun_terbit
FROM buku b
INNER JOIN kategori_buku k ON b.id_kategori = k.id_kategori
INNER JOIN penerbit p ON b.id_penerbit = p.id_penerbit;