<?php

function sayHello(Stringable $stringable): void
{
  //  hanya punya 1 fn
  echo "Hello {$stringable->__toString()}" . PHP_EOL;
}

class Person //implements Stringable tidak perlu manual
{
  public function __toString(): string
  {
    return "Person";
  }
}

sayHello(new Person());// new person implement stringable secara otomatis