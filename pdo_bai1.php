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


 //Thêm 5 sinh viên mới vào bảng danh sách đã tạo ở câu 1.

 $data = [
    [
         'MaSV' => 'SV001',
         'Hoten' => 'Phạm Thảo',
         'Ngaysinh' => '2002-10-01',
         'Lophoc' => 'K56SD3',
         'Diemtb' => '8.7'
    ],
    [
        'MaSV' => 'SV002',
        'Hoten' => 'Nguyễn Lan',
        'Ngaysinh' => '2002-10-01',
        'Lophoc' => 'K56SD3',
        'Diemtb' => '6.2'
   ],
   [
    'MaSV' => 'SV003',
    'Hoten' => 'Phạm Mai',
    'Ngaysinh' => '2002-10-01',
    'Lophoc' => 'K56SD3',
    'Diemtb' => '9'
   ],
   [
    'MaSV' => 'SV004',
    'Hoten' => 'Đỗ Đức',
    'Ngaysinh' => '2002-10-01',
    'Lophoc' => 'K56SD3',
    'Diemtb' => '6.4'
   ],
   [
    'MaSV' => 'SV005',
    'Hoten' => 'Hoàng Lan',
    'Ngaysinh' => '2002-10-01',
    'Lophoc' => 'A5',
    'Diemtb' => '5'
   ]
];

$stmt = $conn->prepare("INSERT INTO DSSV (`MaSV`,`Hoten`,`Ngaysinh`,`Lophoc`,`Diemtb`)  values (:MaSV,:Hoten,:Ngaysinh,:Lophoc,:Diemtb)");

try{
    foreach($data as $row) {
        $stmt->execute($row); 
    }
    echo "Add success";
}
catch (Exception $e) 
{
    echo "Add failed: " . $e->getMessage();
}

//Cập nhật điểm trung bình của sinh viên có mã "SV001" thành 8.5.

$stmt = $conn->prepare("UPDATE DSSV SET Diemtb=:Diemtb  WHERE MaSV=:MaSV");
$data = [
         'MaSV' => 'SV001',
         'Diemtb' => '8.5'
];
$result=$stmt-> execute($data);
if (!$result) {
    die("update failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "update success";
}

//Xoá thông tin của sinh viên có mã "SV003" khỏi bảng danh sách.
$stmt = $conn->prepare("DELETE from DSSV WHERE MaSV=:MaSV");
$data = [
         'MaSV' => 'SV003',
];
$result=$stmt-> execute($data);
    
if (!$result) {
    die("delete failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "delete success";
}

?>