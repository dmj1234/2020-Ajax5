---
title: WAMPServer报错
tags: --！油加满，向前冲！学习使我快乐--！#
---

####  403  问题
- 报错界面Forbidden：You don't have permission to access / on this server.
- 禁止的：您无权访问此服务器上的/。
- 服务器理解客户的请求，但拒绝处理它。通常由于服务器上文件或目录的权限设置导致。

- 解决方法：
- 1、我们对apache的文件进行配置。httpd.conf
   <Directory "/var/blog">
   Options Indexes FollowSymLinks
   AllowOverride None
   Order allow,deny
   Deny from all     将Deny改成Allow  允许全部来自外部的访问
</Directory>
- 2、重新安装。一般情况是能打开的。
- 3、现在我能用就行，要解决不了继续干他！

####  502  问题并且PHP跳出is not configured 
- 502错误网关是网站服务器通信出错的表现
- PHP Interpreter is not configured Please configure
- 解决方法：点击is not configured 
          Interpreter：点击
          PHP excetable：选择你的PHP安装路径，文件以.exe结尾
          OK。
          
