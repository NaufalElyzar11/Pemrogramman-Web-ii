<?php
require_once 'Koneksi.php';

function getAllMember()
{
    $conn = koneksi();
    $sql = "SELECT * FROM member";
    $result = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    mysqli_close($conn);
    return $data;
}

function getMemberById($id_member)
{
    $conn = koneksi();
    $id_member = mysqli_real_escape_string($conn, $id_member);
    $sql = "SELECT * FROM member WHERE id_member='$id_member'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $data;
}

function insertMember($nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar)
{
    $conn = koneksi();
    $nama_member = mysqli_real_escape_string($conn, $nama_member);
    $nomor_member = mysqli_real_escape_string($conn, $nomor_member);
    $alamat = mysqli_real_escape_string($conn, $alamat);
    $tgl_mendaftar = mysqli_real_escape_string($conn, $tgl_mendaftar);
    $tgl_terakhir_bayar = mysqli_real_escape_string($conn, $tgl_terakhir_bayar);
    $sql = "INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) VALUES ('$nama_member', '$nomor_member', '$alamat', '$tgl_mendaftar', '$tgl_terakhir_bayar')";
    $status = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $status;
}

function updateMember($id_member, $nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar)
{
    $conn = koneksi();
    $id_member = mysqli_real_escape_string($conn, $id_member);
    $nama_member = mysqli_real_escape_string($conn, $nama_member);
    $nomor_member = mysqli_real_escape_string($conn, $nomor_member);
    $alamat = mysqli_real_escape_string($conn, $alamat);
    $tgl_mendaftar = mysqli_real_escape_string($conn, $tgl_mendaftar);
    $tgl_terakhir_bayar = mysqli_real_escape_string($conn, $tgl_terakhir_bayar);
    $sql = "UPDATE member SET nama_member='$nama_member', nomor_member='$nomor_member', alamat='$alamat', tgl_mendaftar='$tgl_mendaftar', tgl_terakhir_bayar='$tgl_terakhir_bayar' WHERE id_member='$id_member'";
    $status = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $status;
}

function deleteMember($id_member)
{
    $conn = koneksi();
    $id_member = mysqli_real_escape_string($conn, $id_member);
    $sql = "DELETE FROM member WHERE id_member='$id_member'";
    $status = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $status;
}


function getAllBuku()
{
    $conn = koneksi();
    $sql = "SELECT * FROM buku";
    $result = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    mysqli_close($conn);
    return $data;
}

function getBukuById($id_buku)
{
    $conn = koneksi();
    $id_buku = mysqli_real_escape_string($conn, $id_buku);
    $sql = "SELECT * FROM buku WHERE id_buku='$id_buku'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $data;
}

function insertBuku($judul_buku, $penulis, $penerbit, $tahun_terbit)
{
    $conn = koneksi();
    $judul_buku = mysqli_real_escape_string($conn, $judul_buku);
    $penulis = mysqli_real_escape_string($conn, $penulis);
    $penerbit = mysqli_real_escape_string($conn, $penerbit);
    $tahun_terbit = (int)$tahun_terbit;
    $sql = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES ('$judul_buku', '$penulis', '$penerbit', $tahun_terbit)";
    $status = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $status;
}

function updateBuku($id_buku, $judul_buku, $penulis, $penerbit, $tahun_terbit)
{
    $conn = koneksi();
    $id_buku = mysqli_real_escape_string($conn, $id_buku);
    $judul_buku = mysqli_real_escape_string($conn, $judul_buku);
    $penulis = mysqli_real_escape_string($conn, $penulis);
    $penerbit = mysqli_real_escape_string($conn, $penerbit);
    $tahun_terbit = (int)$tahun_terbit;
    $sql = "UPDATE buku SET judul_buku='$judul_buku', penulis='$penulis', penerbit='$penerbit', tahun_terbit=$tahun_terbit WHERE id_buku='$id_buku'";
    $status = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $status;
}

function deleteBuku($id_buku)
{
    $conn = koneksi();
    $id_buku = mysqli_real_escape_string($conn, $id_buku);
    $sql = "DELETE FROM buku WHERE id_buku='$id_buku'";
    $status = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $status;
}

function getAllPeminjaman()
{
    $conn = koneksi();
    $sql = "SELECT p.id_peminjaman, m.nama_member AS nama_member, b.judul_buku, p.tgl_pinjam, p.tgl_kembali 
            FROM peminjaman p
            JOIN member m ON p.id_member = m.id_member
            JOIN buku b ON p.id_buku = b.id_buku";
    $result = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    mysqli_close($conn);
    return $data;
}

function getPeminjamanById($id_peminjaman)
{
    $conn = koneksi();
    $id_peminjaman = mysqli_real_escape_string($conn, $id_peminjaman);
    $sql = "SELECT p.id_peminjaman, p.id_member, p.id_buku, m.nama_member AS nama_member, b.judul_buku, p.tgl_pinjam, p.tgl_kembali
            FROM peminjaman p
            JOIN member m ON p.id_member = m.id_member
            JOIN buku b ON p.id_buku = b.id_buku
            WHERE p.id_peminjaman='$id_peminjaman'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $data;
}

function insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali)
{
    $conn = koneksi();
    $id_member = mysqli_real_escape_string($conn, $id_member);
    $id_buku = mysqli_real_escape_string($conn, $id_buku);
    $tgl_pinjam = mysqli_real_escape_string($conn, $tgl_pinjam);
    $tgl_kembali = mysqli_real_escape_string($conn, $tgl_kembali);
    $sql = "INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) VALUES ('$id_member', '$id_buku', '$tgl_pinjam', '$tgl_kembali')";
    $status = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $status;
}

function updatePeminjaman($id_peminjaman, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali)
{
    $conn = koneksi();
    $id_peminjaman = mysqli_real_escape_string($conn, $id_peminjaman);
    $id_member = mysqli_real_escape_string($conn, $id_member);
    $id_buku = mysqli_real_escape_string($conn, $id_buku);
    $tgl_pinjam = mysqli_real_escape_string($conn, $tgl_pinjam);
    $tgl_kembali = mysqli_real_escape_string($conn, $tgl_kembali);
    $sql = "UPDATE peminjaman 
            SET id_member='$id_member', id_buku='$id_buku', tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali'
            WHERE id_peminjaman='$id_peminjaman'";
    $status = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $status;
}


function deletePeminjaman($id_peminjaman)
{
    $conn = koneksi();
    $id_peminjaman = mysqli_real_escape_string($conn, $id_peminjaman);
    $sql = "DELETE FROM peminjaman WHERE id_peminjaman='$id_peminjaman'";
    $status = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $status;
}
