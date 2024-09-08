<?php

// di php 7 throw adalah statement

function sayHello(string $name)
{
  if ($name == null) {
    throw new Exception("Tidak boleh null");
  }

  echo "Hello $name" . PHP_EOL;
}

function sayHelloExpression(?string $name)
{
  $result = $name != null ? "Hello $name" : throw new Exception("Tidak boleh null");
  echo $result . PHP_EOL;
}

// sayHelloExpression(null);
sayHelloExpression("thariq");