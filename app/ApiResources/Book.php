<?php

namespace App\ApiResources;

class Book
{
    public function __construct(public int $id, public string $title, public string $author){}
}
