<?php
$servername = "localhost";
$database = "quanly";
$username = "root";
$password = "  ";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
//Thêm một giao dịch mới vào bảng lịch sử với thông tin: ngày giao dịch là 7/5/2023, loại giao dịch là "rút tiền", số tiền là 500, mô tả là "rút tiền ATM".
$sql_stmt = "INSERT INTO `lichsugd` (
    `STT`   ,
   `Ngaygiaodich`  ,
   `Loaigiaodich`,
   `Sotien`  ,
   `Mota` )
 
 VALUES
 ( '6', '7/5/2023', 'rút tiền', '500', 'rút tiền ATM') ";

$result = mysqli_query($conn , $sql_stmt); // Thực thi câu lệnh SQL

if (!$result) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Poseidon has been successfully added to your contacts list";
}

mysqli_close($conn ); // Đóng kết nối CSDL 

//Cập nhật số tiền của giao dịch có số thứ tự 3 trong bảng lịch sử thành 1000.
$sql_stmt = "UPDATE `lichsugd` SET `Sotien` = '1000'";
    $sql_stmt .= "WHERE `STT` = 3";
    
    $result = mysqli_query($conn,$sql_stmt);

//Xoá thông tin của giao dịch có số thứ tự 5 khỏi bảng lịch sử.

$STT = 5; 
    // ID của Venus trong CSQL
    
    $sql_stmt = "DELETE FROM `lichsugd` WHERE `STT` = $STT"; 
    // Câu lệnh SQL Delete
    
    $result = mysqli_query($conn,$sql_stmt); 
    // Thực thi câu lệnh SQL
    
    if (!$result) {
        die("Deleting record failed: " . mysqli_error());
        // Thông báo lỗi nếu thực thi thất bại 
    } else {
        echo "ID number $MaSV has been successfully deleted";
    }
//Thêm sản phẩm mới vào bảng danh sách sản phẩm với thông tin: mã sản phẩm là SP006, tên sản phẩm là "Điện thoại Samsung Galaxy A52", giá bán là 6.500.000 đồng, số lượng tồn kho là 20.

$sql_stmt = "INSERT INTO `DSSP` (
    `MaSP`   ,
   `TenSP`  ,
   `Giaban`,
   `SLtonkho`  )
 
 VALUES
 ( 'SP006', 'Điện thoại Samsung Galaxy A52', '6.500.000 ', '20') ";

$result = mysqli_query($conn , $sql_stmt); // Thực thi câu lệnh SQL

if (!$result) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Poseidon has been successfully added to your contacts list";
}

mysqli_close($conn ); // Đóng kết nối CSDL
?>