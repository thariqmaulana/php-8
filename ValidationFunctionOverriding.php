<?php

// di php 7 ketika kita mengubah parameter/return value maka tidak masalah, hanya warning
// sekarang tidak bisa diubah harus sesuai kontrak
// menjadi error

trait SampleTrait
{
  public abstract function sampleFunction(string $name): string;
}

class SampleClass
{
  use SampleTrait;

  public function sampleFunction(string $name): string
  {
    return "ABC";
  }
}

class ParentClass
{
  public function method(string $name)
  {

  }
}


class ChildClass extends ParentClass
{
  // jadi sekarang wajib sama
  public function method(string $name)
  {

  }
}

// private fn overriding
// di php 7 fn private akan dinggap overriding jika child membuat fn dengan
// nama yg sama
// padahal sudah jelas private

// di php 8 bisa membuat dengan nama yg sama
// tanpa dianggap overriding
// tidak ada lagi hubungannya

class Manager
{
  private function test(int $inte): void
  {

  }
}

class Employee extends Manager
{
  public function test(string $name): string
  {
    return "ABX";
  }
}