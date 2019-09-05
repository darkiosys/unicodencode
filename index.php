<?php
    function unicodeMessageEncode($message){
        return '@U' . strtoupper(bin2hex(mb_convert_encoding($message, 'UCS-2','auto')));
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo unicodeMessageEncode($_POST["message"]);
    } else {
        echo "Hi";
    }

    if (!function_exists('hex2bin')) {
        function hex2bin($hexstr) {
            $n = strlen($hexstr);
            $sbin = "";
            $i = 0;
            while ($i < $n) {
                $a = substr($hexstr, $i, 2);
                $c = pack("H*", $a);
                if ($i == 0) {
                    $sbin = $c;
                } else {
                   $sbin .= $c;
                }
                $i += 2;
             }
             return $sbin;
        }
    }
?>