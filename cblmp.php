<?php



//cblmp = cloudballymourplugin



session_start(); 



$v = "1.10.0.0"; //version



//setcookie

$host = $_SERVER['HTTP_HOST'];

setcookie('cblmp',$host,time()+1800);



//The following is the cpu overload will jump to the busy status page.

$ping = "10"; //10=It can withstand up to 1000 cpu to access, if more than 1000 cpu will not be able to load the page properly.



$load = sys_getloadavg();

if ($load[0] > $ping) {

    header('HTTP/1.1 503 Too busy, try again later');

    die($server);

}



$loads = sys_getloadavg();

$core_nums = trim(shell_exec("grep -P '^processor' /proc/cpuinfo|wc -l"));

$load = round($loads[0]/($core_nums + 1)*100, 2);







//The following code is anti-ddos attack

$gip = $_SERVER["REMOTE_ADDR"];



if($gip){

$ip = "http://127.0.0.1";



}else{



  header('Location: http://127.0.0.1');

}

setcookie("ck","ddos",time()+2);

if(!$_COOKIE["ck"]) {



}else {

header("Location: $ip ");

}



?>
