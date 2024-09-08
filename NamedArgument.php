<?php

function sayHello(string $first = "", ?string $middle = "default", string $last = ""): void
{
  var_dump($first, $middle, $last);
  echo "Hello $first $middle $last" . PHP_EOL;
}

// Sebelum PHP-8. Harus berurut;
sayHello("Ayam", "Kambing", "Sapi");

// dengan named argument. tidak perlu $. kalau $ berarti variable;
// sayHello(last: "Sapi", first: "Ayam", "kambing"); kambing diisi tetap menjadi ke 3.
// jadi menimpa sapi. dan parameter middle tidak diisi. maka error
sayHello(last: "Sapi", first: "Ayam", middle: "Kambing");

// default argument sebelum parameter terakhir menjadi berguna
// sayHello("last","first"); error karena hanya 2 param. ke 3 tidak diisi
// sayHello(last: "last", first: "first"); error di php versi ini
// solusi agar tidak error beri semua nilai default
sayHello(last: "last", first: "first");
