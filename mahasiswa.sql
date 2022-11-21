CREATE DATABASE fakultas;
    -- cara ngeliat informasi table --
    desc mahasiswa;
    desc jurusan;
    -- cara ngeliat data ditable --
    select * from mahasiswa;
    select * from jurusan;

CREATE TABLE jurusan (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    kode CHAR (4) NOT NULL,
    nama VARCHAR(50) NOT NULL
);
    -- cara masukin data ke table --
    insert into jurusan (kode, nama) values ("EKP", "Ekonomi Keuangan dan Perbankan");
    insert into jurusan (kode, nama) values ("EKIS", "Ekonomi Islam");

CREATE TABLE mahasiswa (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_jurusan INTEGER NOT NULL,
    nim CHAR(8) NOT NULL,
    nama VARCHAR(50) NOT NULL,
    jenis_kelamin enum('laki-laki', 'perempuan') NOT NULL,
    tempat_lahir VARCHAR(50) NOT NULL,
    tanggal_lahir DATE NOT NULL,
    alamat VARCHAR(255) NOT NULL,
    FOREIGN KEY(id_jurusan) REFERENCES jurusan(id)
);
    -- cara masukin data ke table --
    insert into mahasiswa (id_jurusan, nim, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat) 
    values (1, "20221110", "Shofiyyah", "Perempuan", "Surabaya", "2001-12-09", "Jl. Rorotan IX");
    insert into mahasiswa (id_jurusan, nim, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat) 
    values (2, "20221109", "Devi", "Perempuan", "Bali", "2001-9-9", "Jl. Ngurah Rai 19");
    insert into mahasiswa (id_jurusan, nim, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat) 
    values (1, "20221108", "Aulia", "Perempuan", "Sukabumi", "2000-12-30", "Jl. Anggrek 10");
    -- cara ngeganti value yang ada di tabel --
    update mahasiswa set tanggal_lahir = "2001-07-22" where id = 2;
    update mahasiswa set tempat_lahir = "Jakarta" -- nanti yang keubah semua datanya karena engga ada where idnya--
    -- cara ngedelete data ditable --
    delete from mahasiswa where id = 3;