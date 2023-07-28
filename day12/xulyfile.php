<?php

//Kiểm tra thư mục tồn tại chưa có thì tạo mới
$file = @fopen('data.txt', 'r');
if (!$file)
    echo "Mở file không thành công";
else {
    echo "mở file thành  công"
}

//Kiểm tra file có cho phép ghi không

$file = "data.txt";
if(is_writable($file)) {
  echo ("$file is writable");
} else {
  echo ("$file is not writable");
}

//Ghi file với nội dung: xin chào 
$file = @fopen('data.txt', 'w');
if (!$file)
    echo "Mở file không thành công";
else {
    $data = 'xin chào';
    fwrite($file, $data);
    fclose($file);//Đóng file
    unlink($file);//Xóa file
}
?>