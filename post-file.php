<?php
//echo "post page"
// 1.获取上传文件对应的字典
$fileInfo = $_FILES["upFile"];
//print_r($_FILES);
// 2.获取上传文件的名称
$fileName = $fileInfo["name"];
//// 3.获取上传文件保存的临时路径
$filePath = $fileInfo["tmp_name"];

echo $fileName;
echo "<br>";
echo $filePath;

// 4.移动文件
move_uploaded_file($filePath, "./images/".$fileName);
//文件名称需要拼接，在js中用+，PHP用.
?>