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

$sql_stmt = "INSERT INTO `DSSV` (`MaSV`,`Hoten`,`Ngaysinh`,`Lophoc`,`Diemtb`) VALUES('55','Phạm Tâm','12/09/1999',' K56SD1 ','9.2'),
('55','Phạm Tâm','12/09/1999',' K56SD1 ','9.2'),
('55','Phạm Tâm','12/09/1999',' K56SD1 ','9.2'),
('55','Phạm Tâm','12/09/1999',' K56SD1 ','9.2'),
('55','Phạm Tâm','12/09/1999',' K56SD1 ','9.2')
"; 

$result = mysqli_query($conn , $sql_stmt); // Thực thi câu lệnh SQL

if (!$result) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Poseidon has been successfully added to your contacts list";
}

mysqli_close($conn ); // Đóng kết nối CSDL 

//Cập nhật điểm trung bình của sinh viên có mã "SV001" thành 8.5.
$sql_stmt = "UPDATE `DSSV` SET `Diemtb` = '8.5'";
    $sql_stmt .= "WHERE `MaSV` = SV001";
    
    $result = mysqli_query($conn,$sql_stmt);

//Xoá thông tin của sinh viên có mã "SV003" khỏi bảng danh sách.

$MaSV = 003; 
    // ID của Venus trong CSQL
    
    $sql_stmt = "DELETE FROM `DSSV` WHERE `id` = $id"; 
    // Câu lệnh SQL Delete
    
    $result = mysqli_query($conn,$sql_stmt); 
    // Thực thi câu lệnh SQL
    
    if (!$result) {
        die("Deleting record failed: " . mysqli_error());
        // Thông báo lỗi nếu thực thi thất bại 
    } else {
        echo "ID number $MaSV has been successfully deleted";
    }
//Tạo bảng lịch sử giao dịch với các cột: ngày giao dịch, loại giao dịch, số tiền, mô tả.
  
?>