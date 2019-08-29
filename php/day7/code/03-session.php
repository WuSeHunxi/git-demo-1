<?php

// 给当前用户找一个属于他的箱子（没有箱子开箱子，有箱子找已有的箱子）
session_start();


// 设置session
$_SESSION['key1'] = 'value1';
