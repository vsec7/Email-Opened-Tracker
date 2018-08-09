<?php
// @Viloid

date_default_timezone_set('Asia/Jakarta');

// Transparent GIF
header("Content-Type: image/gif");
echo base64_decode('R0lGODlhAQABAJAAAP8AAAAAACH5BAUQAAAALAAAAAABAAEAAAICBAEAOw==');

$c = json_decode(file_get_contents("https://api.apility.net/geoip/".getIP()))->ip->country;

// Logging
sv("log.db",date('d-m-Y H:i:s')."|".$c."|".getIP());

function getIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

function sv($l,$d)
{
    $fp = fopen($l, 'a');
    fwrite($fp,$d."\n");
    fclose($fp);
}

