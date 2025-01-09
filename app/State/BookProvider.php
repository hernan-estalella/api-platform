<?php

declare(strict_types=1);

namespace App\State;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\State\ProviderInterface;
use App\Models\Book;
use Exception;

final class BookProvider implements ProviderInterface
{
    /**
     * @throws Exception
     */
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        return match (get_class($operation)) {
            Get::class, Delete::class, Patch::class => Book::find($uriVariables['id']),
            GetCollection::class => Book::all(),
            default => throw new Exception('Unsupported operation'),
        };
    }
}
