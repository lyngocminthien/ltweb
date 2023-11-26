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

function addLoai($conn, $TenLoai, $NgayTao, $thuTu)
{
    $sql = "INSERT INTO loai VALUES ('NULL', '$TenLoai', '$NgayTao', '$thuTu')";
    return mysqli_query($conn, $sql);
}
function xoaLoaiID($conn, $MaLoai)
{
    $sql = "DELETE FROM loai WHERE MaLoai = '$MaLoai'";
    return mysqli_query($conn, $sql);
}
function xoaLoai($conn)
{
    $sql = "DELETE FROM sanpham";
    mysqli_query($conn, $sql);

    $sql = "DELETE FROM loai";
    return mysqli_query($conn, $sql);
}
function updateLoai($conn, $MaLoai, $TenLoai, $NgayTao, $thuTu)
{
    $sql = "UPDATE loai SET TenLoai = '$TenLoai', NgayTao = '$NgayTao', thuTu = '$thuTu' WHERE MaLoai = '$MaLoai'";
    return mysqli_query($conn, $sql);
}

function laySanPham($conn)
{
    $sql = "select * from sanpham order by MaSP";
    return mysqli_query($conn, $sql);
}

function laySanPhamLM($conn, $start, $limit)
{
    $sql = "SELECT * FROM sanpham ORDER BY MaSP LIMIT $start, $limit";
    return mysqli_query($conn, $sql);
}

function layTongSoSanPham($conn)
{
    $sql = "SELECT COUNT(*) as total FROM sanpham";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}


function addSP($conn, $TenSP, $MoTa, $Gia, $Hinh, $NoiDung, $MaLoai, $NgayTao)
{
    $sql = "INSERT INTO sanpham VALUES ('NULL', '$TenSP', '$MoTa', '$Gia', '$Hinh', '$NoiDung', '$MaLoai', '$NgayTao')";
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

function xoaSPID($conn, $MaSP)
{
    $sql = "DELETE FROM sanpham WHERE MaSP = '$MaSP'";
    return mysqli_query($conn, $sql);
}
function xoaSPmaLoai($conn, $MaLoai)
{
    $sql = "DELETE FROM sanpham WHERE MaLoai = '$MaLoai'";
    return mysqli_query($conn, $sql);
}
function xoaSP($conn)
{
    $sql = "DELETE FROM sanpham";
    return mysqli_query($conn, $sql);
}
function updateSP($conn, $MaSP, $TenSP, $MoTa, $Gia, $Hinh, $NoiDung, $MaLoai, $NgayTao)
{
    $sql = "UPDATE sanpham SET TenSP = '$TenSP', MoTa = '$MoTa', Gia = '$Gia', Hinh = '$Hinh', NoiDung = '$NoiDung', MaLoai = '$MaLoai', NgayTao = '$NgayTao' WHERE MaSP = '$MaSP'";
    return mysqli_query($conn, $sql);
}

function timkiemSP($conn, $search)
{
    $sql = "SELECT * FROM sanpham WHERE TenSP LIKE '%$search%'";
    return mysqli_query($conn, $sql);
}
function logIn($conn, $taikhoan)
{
    $sql = "SELECT * FROM account WHERE User = '$taikhoan'";
    return mysqli_query($conn, $sql);
}
function SignUp($conn, $user, $pass, $hoTen, $email, $sdt, $diaChi)
{
    $sql = "INSERT INTO account (User, Pass, HoTen, Email, Sdt, DiaChi)
    VALUES ('$user', '$pass', '$hoTen', '$email', '$sdt', '$diaChi')";
    return mysqli_query($conn, $sql);
}
function SignUpAdmin($conn, $user, $pass, $hoTen, $email, $sdt, $diaChi, $loaiTk)
{
    $sql = "INSERT INTO account (User, Pass, HoTen, Email, Sdt, DiaChi, LoaiTK)
    VALUES ('$user', '$pass', '$hoTen', '$email', '$sdt', '$diaChi', '$loaiTk')";
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

function UpdateDH($conn, $MaDH, $ChapThuan)
{
    $sql = "UPDATE donhang SET ChapThuan='$ChapThuan' WHERE MaDH='$MaDH'";
    return mysqli_query($conn, $sql);
}
function XoaDH($conn)
{
    // Xóa dữ liệu từ bảng ctdh trước
    $sql_ctdh = "DELETE FROM chitietdonhang";
    mysqli_query($conn, $sql_ctdh);

    // Xóa dữ liệu từ bảng donhang sau
    $sql_donhang = "DELETE FROM donhang";
    return mysqli_query($conn, $sql_donhang);
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

function XoaCTDH($conn)
{
    $sql = "DELETE FROM chitietdonhang";
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
