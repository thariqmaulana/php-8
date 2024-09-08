<?php

class Example
{
  // dulu hanya 1 atau mix
  public string|int|array $data;
}

$example = new Example();
$example->data = "thariq";
$example->data = 123;
$example->data = [];

echo "SUkses";