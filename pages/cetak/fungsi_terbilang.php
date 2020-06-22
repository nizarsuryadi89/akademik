<?php
function terbilang($i){
  $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
 
  if ($i < 12) return " " . $huruf[$i];
  elseif ($i < 20) return terbilang($i - 10) . " belas";
  elseif ($i < 100) return terbilang($i / 10) . " puluh" . terbilang($i % 10);
  elseif ($i < 200) return " seratus" . terbilang($i - 100);
  elseif ($i < 1000) return terbilang($i / 100) . " ratus" . terbilang($i % 100);
  elseif ($i < 2000) return " seribu" . terbilang($i - 1000);
  elseif ($i < 1000000) return terbilang($i / 1000) . " ribu" . terbilang($i % 1000);
  elseif ($i < 1000000000) return terbilang($i / 1000000) . " juta" . terbilang($i % 1000000);   
  elseif ($i < 1) return terbilang($i /1). " koma" . terbilang($i % 1);
}
?>