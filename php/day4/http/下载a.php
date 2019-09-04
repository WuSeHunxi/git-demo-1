<?php

//让文件下载   当响应头后面额文件后缀没见过的时候就会造成下载的结果
header('Content-Type:application/octet-stream');

// 哈哈哈