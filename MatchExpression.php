<?php

$value = "B";
$result = "";

switch ($value) {
  case "A":
  case "B":
  case "C":
    $result = "Anda Lulus";
    break;
  case "D":
  case "E":
    $result = "Anda Tidak Lulus";
    break;
  default:
    $result = "Terjadi Kesalahan";
    break;
}

echo "Switch : $result" . PHP_EOL;

// kelemahannya tidak bisa panjang-panjang/banyak. jadi kasus sederhana 
// semacam alternatif if adalah ternary. jika sederhana

// kalau di switch hanya equals check (=)
// match tidak terbatas pada equals

$result = match ($value) {
   "A", "B", "C" => "Anda Lulus",
   "D", "E"=> "Anda Tidak Lulus",
   default => "Terjadi Kesalahan"
};

echo "Match : $result" . PHP_EOL;

$nilai = true;
$value = 40;

$result = match ($nilai) {
   $value >= 80 => "A", // yg penting boolean di kiri.
   $value >= 70 => "B", //  bisa => memanggil fn
   $value >= 60 => "C",
   $value >= 50 => "D",
   default => "E"
};

echo "$result" . PHP_EOL;

$name = "Mr. Thariq";

$result = match (true) {
   str_contains($name, "Mr.") => "Hello Sir",
   str_contains($name, "Mrs.") => "Hello Mam",
   default => "Hello"
};

echo $result . PHP_EOL;

// sangat sederhana = ternary
// sedikit meningkat = match