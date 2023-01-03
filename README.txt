====================================================

PROJECT		: Software Security Course Work - 01
SYSTEM NAME : TUTU.COM
VERSION		: v1.0

====================================================


Required tools and softwares
=============================

1.Xampp or Wamp.
2.Web Browser (eg : Google Chrome, Microsoft Edge, Firefox OR etc.. )

Required Servers
=================

1.Apache Server.
2.Mysql Server.
3.SMTP Server.

Setup System
=============

1.Go to your Xampp or Wamp installaton Path And unzip "tutu-chat.rar" file.

	eg C:\xampp\htdocs\<tutu-chat.rar unzip here>

2.start apache server and mysql server in your tool(xampp OR wamp).

3.imortd database (DB/chatdb.sql).

4.set databse connection(inc/Connection.php).

	$connection = mysqli_connect('localhost', '<Your Sql User Name>', '<User Password>', '<Database>');

5.set your "openssl.cnf" file path.

	inc/Process/FormsChat.php
	line number 353

	'config' => 'C:\xampp\htdocs\<SET YOUR PATH>\openssl.cnf',


6.Go Your Web Browser and type http://localhost/<Your Path>/ (http://127.0.0.1/<Your Path>/)

NOTICE : recommended for remove all cookies in http://localhost/ OR http://127.0.0.1/

Developers Info
================

alexlanka.com - Royan Harsha



							*				*				*				*
