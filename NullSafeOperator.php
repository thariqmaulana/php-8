<?php

class Address
{
  public ?string $country;
}

class User
{
  public ?Address $address;
}

// jadi tidak perlu manual if

function getCountry(?User $user): ?string
{
  if ($user != null) {
    if ($user->address != null) {
      return $user->address->country;// kalau langsung akses ini error karena mengakses null
    }
  }
  return null;
}

function getCountry2(?User $user): ?string
{
  return $user?->address?->country;
  // langsung return null apabila ada yg null sebelum country
}

echo getCountry(null) . PHP_EOL;
echo getCountry2(null) . PHP_EOL;
var_dump(getCountry2(null)); //tentu saja countrY null