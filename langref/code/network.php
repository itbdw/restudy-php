<?php


$host = "www.baidu.com";
$url = $host;

$fp = fsockopen($url, 80, $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "GET /ip.php HTTP/1.1\r\n";
    $out .= "Host: ${host}\r\n";
    $out .= "Connection: Close\r\n\r\n";
    fwrite($fp, $out);

    $res = '';
    while (!feof($fp)) {
        $res .= fgets($fp, 128);
    }
    echo $res;
    fclose($fp);
}

//
//$fp = fsockopen("udp://127.0.0.1", 13, $errno, $errstr);
//if (!$fp) {
//    echo "no fp\n";
//    echo "ERROR: $errno - $errstr<br />\n";
//} else {
//    echo "has fp\n";
//    fwrite($fp, "\n");
//    echo fread($fp, 26);
//    fclose($fp);
//}


/**
 *
 *
checkdnsrr — 给指定的主机（域名）或者IP地址做DNS通信检查
closelog — 关闭系统日志链接
define_syslog_variables — Initializes all syslog related variables
dns_check_record — 别名 checkdnsrr
dns_get_mx — 别名 getmxrr
dns_get_record — 获取指定主机的DNS记录
fsockopen — 打开一个网络连接或者一个Unix套接字连接
gethostbyaddr — 获取指定的IP地址对应的主机名
gethostbyname — 返回主机名对应的 IPv4地址。
gethostbynamel — 获取互联网主机名对应的 IPv4 地址列表
gethostname — 获取主机名
getmxrr — 获取互联网主机名对应的 MX 记录
getprotobyname — Get protocol number associated with protocol name
getprotobynumber — Get protocol name associated with protocol number
getservbyname — 获取互联网服务协议对应的端口
getservbyport — Get Internet service which corresponds to port and protocol
header_register_callback — 调用一个 header 函数
header_remove — 删除之前设置的 HTTP 头
header — 发送原生 HTTP 头
headers_list — 返回已发送的 HTTP 响应头（或准备发送的）
headers_sent — 检测 HTTP 头是否已经发送
http_response_code — 获取/设置响应的 HTTP 状态码
inet_ntop — Converts a packed internet address to a human readable representation
inet_pton — Converts a human readable IP address to its packed in_addr representation
ip2long — 将 IPV4 的字符串互联网协议转换成长整型数字
long2ip — 将长整型转化为字符串形式带点的互联网标准格式地址（IPV4）
openlog — Open connection to system logger
pfsockopen — 打开一个持久的网络连接或者Unix套接字连接。
setcookie — 发送 Cookie
setrawcookie — 发送未经 URL 编码的 cookie
socket_get_status — 别名 stream_get_meta_data
socket_set_blocking — 别名 stream_set_blocking
socket_set_timeout — 别名 stream_set_timeout
syslog — Generate a system log message
 *
 */