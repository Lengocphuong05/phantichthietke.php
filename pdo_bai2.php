<?php
 $db_type ='mysql';
 $db_host ="localhost";
 $user_name = "root";
 $user_pass ="";
 $db_name ="quanly";

 //connect
$conn = new PDO("$db_type:host=$db_host;dbname=$db_name",$user_name,$user_pass);
if ($conn) {
    echo "Connected to the $db_host successfully!";
}
//Thêm một giao dịch mới vào bảng lịch sử với thông tin: ngày giao dịch là 7/5/2023, loại giao dịch là "rút tiền", số tiền là 500, mô tả là "rút tiền ATM".
$stsm = $conn->prepare('INSERT INTO `lichsugd`(
    `STT`   ,
   `Ngaygiaodich`  ,
   `Loaigiaodich`,
   `Sotien`  ,
   `Mota` )
 
VALUE (?, ?, ?, ?)');
$data = array('2023-07-05','Rut tien', '500','Rut tien ATM');

$result=$stsm-> execute($data);
if (!$result) {
    die("Adding record failed: " . mysqli_error()); 
   
} else {
    echo "History transaction has been add in your data";
}
//Cập nhật số tiền của giao dịch có số thứ tự 3 trong bảng lịch sử thành 1000.
$stmt = $conn->prepare("UPDATE lichsugd SET Sotien=:Sotien  WHERE STT=:STT");
$data = [
         'Sotien' => '1000',
         'STT' => '3'
];
$result=$stmt-> execute($data);
if (!$result) {
    die("update failed: " . mysqli_error()); 
    
} else {
    echo "update success";
}
//Xoá thông tin của giao dịch có số thứ tự 5 khỏi bảng lịch sử.
$stmt = $conn->prepare("DELETE from lichsugd WHERE STT=:STT");
$data = [
         'STT' => '5',
];
$result=$stmt-> execute($data);
    
if (!$result) {
    die("delete failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "delete success";
}

?>