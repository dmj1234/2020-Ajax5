---
title: Ajax(第二部分-bilibili第二学习)
tags: --！油加满，向前冲！学习使我快乐--！#
---

#### Web服务器搭建
什么是WAMPServer软件？
- Window操作系统
- Apache （喊他：阿帕奇）世界排名第一的服务器软件，简单，快和稳定    
- MySQL 开源免费得的数据库软件，体积小，成本低，快
- PHP 超文本预处理器，直接将代码嵌入HTML文档中执行

#### 这里我们学下PHP的基础 
<?php

?>
这是基本语法。定义变量用$， 打印用$变量 = xxx;
PHP属于后端开发的语言，后端编写的代码必须放到服务器的环境下运行。
必须把服务器放到对应的文件夹下，通过浏览器找到服务器，找到服务器下的文件夹，文件夹里对应的文件带能运行
安装初始文件夹在WWW文件夹里面.

Get和Post的理解：
- 可以通过form标签的method属性指定发送请求的类型
- 如果是get请求，会将提交的数据拼接到URL的后面
- 如果是post请求，会将提交的数据放到请求头中

Get请求和POST请求的异同：
- 相同：
  都是将数据提交到远程服务器
- 不同：
  提交数据大小的限制：GET请求对数据大小限制、POST请求对数据没有大小限制
  请求应用场景：前者提交非敏感，后者提交敏感信息
  
####文件上传

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

注意:
1.上传文件一般使用POST提交
2.上传文件必须设置enctype="multipart/form-data"
3.上传的文件在PHP中可以通过$_FILES获取
4.PHP中文件默认会上传到一个临时目录, 接收完毕之后会自动删除

默认情况下服务器对上传文件的大小是有限制的, 如果想修改上传文件的限制可以修改php.ini文件
file_uploads = On   ; 是否允许上传文件 On/Off 默认是On
upload_max_filesize = 2048M       ; 上传文件的最大限制
post_max_size = 2048M             ; 通过Post提交的最多数据
max_execution_time = 30000      ; 脚本最长的执行时间 单位为秒
max_input_time = 30000          ; 接收提交的数据的时间限制 单位为秒
memory_limit = 2048M            ; 最大的内存消耗


####   Ajax使用步骤
//1创建异步对象
var xmlhttp=new XMLHttpRequest();

//2设置请求方式、请求地址
/*
method：请求的类型；GET 或 POST
url：文件在服务器上的位置
async：true（异步）或 false（同步）
*/
xmlhttp.open("GET" , "ajax-get.php" , true)
//3发送请求
xmlhttp.send();

//4监听转台的变化
xmlhttp.onreadystatechange =function (ev2){
/*
0: 请求未初始化
1: 服务器连接已建立
2: 请求已接收
3: 请求处理中
4: 请求已完成，且响应已就绪
*/
if(xmlhttp.readyState ===4 ){
// 判断是否请求成功
if(xmlhttp.status >= 200 && xmlhttp.status < 300 ||
xmlhttp.status === 304){
// 5.处理返回的结果
// alert("请求成功");
alert(xhr.responseText);
}else{
alert("请求失败");
}
}

#### Ajax在IE中遇到的问题
- 兼容低版本问题：添加以下代码   ActiveXObject为核心
 var xhr;
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xhr=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xhr=new ActiveXObject("Microsoft.XMLHTTP");
}

- 在IE浏览器中, 如果通过Ajax发送GET请求, 那么IE浏览器认为，同一个URL只有一个结果，通过添加一个随机地址
xhr.open("GET","05-ajax-get.txt?t="+(new Date().getTime()),true);
xhr.send();

#### cookie作用
- 将网页中的数据保存到浏览器中
- cookie生命周期:
  默认情况下生命周期是一次会话(浏览器被关闭)
  如果通过expires=设置了过期时间, 并且过期时间没有过期, 那么下次打开浏览器还是存在
  如果通过expires=设置了过期时间, 并且过期时间已经过期了,那么会立即删除保存的数据
- cookie注意点:
  cookie默认不会保存任何的数据
  cookie不能一次性保存多条数据, 要想保存多条数据,只能一条一条的设置
  cookie有大小和个数的限制
  个数限制: 20~50
  大小限制: 4KB左右
  
  
