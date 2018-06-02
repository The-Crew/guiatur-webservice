<?php

class Utils {
    public static function gerarUniquid() {
        $datacod = date('dmy');
        $horacod = date('His');
        $arraytempo = gettimeofday();
        $microsegundos = $arraytempo['usec'];
        $a = mt_rand(0,9);
        $b = mt_rand(0,9);
        $c = mt_rand(0,9);
        $d = mt_rand(0,9);
        $e = mt_rand(0,9);
        $f = mt_rand(0,9);
        $g = mt_rand(0,9);
        $h = mt_rand(0,9);
        $i = mt_rand(0,9);
        return md5($datacod.$horacod.$microsegundos.$a.$b.$c.$d.$e.$f.$g.$h.$i);
    }
}

