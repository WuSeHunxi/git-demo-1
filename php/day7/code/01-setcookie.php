<?php

// cookie的使用场景：永久登陆  购物车

// 设置cookie使用setcooki()函数
// bool setcookie ( string $name [, string $value = "" [, int $expire = 0 [, string $path = "" [, string $domain = "" [,         bool$secure = false [, bool $httponly = false ]]]]]] )
// $name：指定Cookie的名字
// $value： Cookie的值（可以选择性添加）
// $expire：设置Cookie的过期时间，默认值为0，单位为秒数，没有设置就默认为内存Cookie
// $path： 设置Cookie的有效路径，默认是当前目录或者其子目录有效，也可以指定成整个根目录/，在整个根目录下有效
// $domain：设置Cookie的作用域，默认在本域下
// $secure：设置是否Cookie只能通过Https传输，默认值是false
// $httponly：是否只是用http访问Cookie，默认值是false，如果设置成true，那么客户端的js就无法操作这个Cookie了，使用这个可以减少XSS攻击



// Cookie是通过响应报文的响应头发过来的
// 设置响应头（header）中的 Set-Cookie 可以下发小票（给客户端发）
// Cookie 在客户端存储的是键值结构
// header('Set-Cookie: foo=bar');

// header 在设置相同的键时 会出现覆盖的情况
// header('Foo: 123');
// header('Foo: 456');

// setcookie 是专门用于设置 cookie 的函数
// setcookie('key', 'value');

// 只传递一个参数是删除
// 原理：设置过期时间为一个过去时间
// setcookie('key');

// 传递两个参数是设置 cookie
setcookie('key1', 'value1');  // 浏览器关闭就会自动删除cookie

// 传递第三个参数是设置过期时间
// 不传递就是 会话级别的 Cookie （关闭浏览器就自动删除）

// 写几个setcookie函数就有几个set-cookie
setcookie('key2', 'value2', time() + 1 * 24 * 60 * 60);

setcookie('key3', 'value3', time() + 1 * 24 * 60 * 60, '/users');

// 第四个参数是路径，用来设置cookie的范围                    设置HTTPS   判断是否只能使用http访问cookie
setcookie('key4', 'value4', time() + 1 * 24 * 60 * 60, '', '', false, true);
// setcookie的七个参数，可以多传，也可以少传

// path：设置cookie的作用路径范围

// domain：设置cookie的作用域名范围

// httponly：一旦cookie的httponly为真，那么只能在服务端获取，在js中无法获取
// js是客户端本地的服务，而httponly是php协议的