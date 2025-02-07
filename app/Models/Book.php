<?php

namespace App\Models;

use ApiPlatform\Metadata\ApiResource;
use App\State\BookProcessor;
use App\State\BookProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ApiResource(
    provider: BookProvider::class,
    processor: BookProcessor::class,
)]
class Book extends Model
{
    use HasFactory;
}
