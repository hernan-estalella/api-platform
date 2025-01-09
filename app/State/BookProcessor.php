<?php

 declare(strict_types=1);

namespace App\State;

use ApiPlatform\Metadata\DeleteOperationInterface;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Mail\BookDeleted;
use App\Mail\BookPrePublished;
use App\Mail\BookPublished;
use App\Models\Book;
use Illuminate\Support\Facades\Mail;

final class BookProcessor implements ProcessorInterface
{
    /**
     * @param mixed $data
     * @param Operation $operation
     * @param array $uriVariables
     * @param array $context
     * @return Book|void
     */
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): mixed
    {
        if ($operation instanceof DeleteOperationInterface) {
            $this->sendDeletedMail($data);
            return $data->delete();
        }

        $this->sendPrePublishedMail($data);
        $data->save();
        $this->sendPublishedMail($data);
        return $data;
    }

    /**
     * @param mixed $data
     * @return void
     */
    private function sendPrePublishedMail(mixed $data): void
    {
        Mail::to('example@example.com')
            ->send(new BookPrePublished($data));
    }

    /**
     * @param mixed $data
     * @return void
     */
    private function sendPublishedMail(mixed $data): void
    {
        Mail::to('example@example.com')
            ->send(new BookPublished($data));
    }

    /**
     * @param mixed $data
     * @return void
     */
    private function sendDeletedMail(mixed $data): void
    {
        Mail::to('example@example.com')
            ->send(new BookDeleted($data));
    }
}
