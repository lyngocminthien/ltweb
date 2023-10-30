<?php
function layLoai($conn)
{
    $sql = "select * from loai order by thuTu";
    return mysqli_query($conn, $sql);
}
function layLoaiID($conn, $id)
{
    $sql = "select * from loai where MaLoai = '$id' order by thuTu";
    return mysqli_query($conn, $sql);
}
function laySanPham($conn, $n)
{
    $sql = "select * from sanpham order by MaSP limit " . $n;
    return mysqli_query($conn, $sql);
}
function laySP($conn, $idLoai)
{
    $sql = "select * from sanpham where Maloai = '$idLoai'";
    return mysqli_query($conn, $sql);
}
function layChiTietSanPham($conn, $MaSP)
{
    $layChiTietSanPham = "SELECT * FROM sanpham WHERE MaSP = $MaSP";
    return mysqli_query($conn, $layChiTietSanPham);
}
function timkiemSP($conn, $search)
{
    $sql = "SELECT * FROM sanpham WHERE TenSP LIKE '%$search%'";
    return mysqli_query($conn, $sql);
}
function logIn($conn, $taikhoan, $matkhau)
{
    $sql = "SELECT * FROM account WHERE user = '$taikhoan' AND pass = '{$matkhau}' LIMIT 1";
    return mysqli_query($conn, $sql);
}
function SignUp($conn, $user, $pass, $hoTen, $email, $sdt, $diaChi)
{
    $sql = "INSERT INTO account (User, Pass, HoTen, Email, Sdt, DiaChi)
    VALUES ('$user', '$pass', '$hoTen', '$email', '$sdt', '$diaChi')";
    return mysqli_query($conn, $sql);
}
function layGio($conn, $MaSP)
{
    $sql = "SELECT * FROM giohang WHERE MaSP= '$MaSP'";
    return mysqli_query($conn, $sql);
}
function UpdataGio($conn, $SoLuong, $MaSP)
{
    $sql = "UPDATE giohang SET SoLuong='$SoLuong' WHERE MaSP='$MaSP'";
    return mysqli_query($conn, $sql);
}
function NhapGio($conn, $TenSP, $MaSP, $Gia, $Hinh, $SoLuong)
{
    $sql = "INSERT INTO giohang(TenSP,MaSP,Gia,Hinh,SoLuong) values ('$TenSP','$MaSP','$Gia','$Hinh','$SoLuong')";
    return mysqli_query($conn, $sql);
}
function XoaGio($conn)
{
    $sql = "DELETE FROM giohang;";
    return mysqli_query($conn, $sql);
}
function XoaID_Gio($conn, $MaGioHang)
{
    $sql = "DELETE FROM giohang WHERE MaGioHang='$MaGioHang'";
    return mysqli_query($conn, $sql);
}
function layHetGioHang($conn)
{
    $sql = "SELECT * FROM giohang ORDER BY MaGioHang DESC";
    return mysqli_query($conn, $sql);
}
function XoaSP_Gio($conn, $MaSP)
{
    $sql = "DELETE FROM giohang WHERE MaSP='$MaSP'";
    return mysqli_query($conn, $sql);
}
function layDonHang($conn)
{
    $sql = "SELECT * FROM donhang ";
    return mysqli_query($conn, $sql);
}
function layDonHang_User($conn, $User)
{
    $sql = "SELECT * FROM donhang WHERE User='$User'";
    return mysqli_query($conn, $sql);
}
function layDonHang_MaDH($conn, $MaDH)
{
    $sql = "SELECT * FROM donhang WHERE MaDH='$MaDH'";
    return mysqli_query($conn, $sql);
}
function NhapDon($conn, $MaDH, $TongSoLuong, $User, $TinhTrang, $TongHD)
{
    $sql = "INSERT INTO donhang (MaDH, TongSoLuong, User, TinhTrang,  TongHD) VALUES ('$MaDH', '$TongSoLuong', '$User', '$TinhTrang', '$TongHD')";
    return mysqli_query($conn, $sql);
}
function layCTDH($conn)
{
    $sql = "SELECT * FROM chitietdonhang ";
    return mysqli_query($conn, $sql);
}

function layCTDH_MaDH($conn, $MaDH)
{
    $sql = "SELECT * FROM chitietdonhang WHERE MaDH='$MaDH' ";
    return mysqli_query($conn, $sql);
}
function NhapChiTietDon($conn, $MaDH, $MaSP, $SoLuong, $TenSP, $Hinh, $Gia)
{
    $sql = "INSERT INTO chitietdonhang(MaDH, MaSP, SoLuong, TenSP, Hinh, Gia) 
        VALUES ('$MaDH', '$MaSP', '$SoLuong','$TenSP','$Hinh','$Gia')";
    return mysqli_query($conn, $sql);
}
function layThongTin($conn)
{
    $sql = "SELECT * FROM account";
    return mysqli_query($conn, $sql);
}
function layThongTin_User($conn, $User)
{
    $sql = "SELECT * FROM account WHERE User='$User' ";
    return mysqli_query($conn, $sql);
}
