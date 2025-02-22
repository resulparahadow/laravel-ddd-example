<?php

declare(strict_types=1);

namespace App\Kanban\Board\Application;

use App\Kanban\Board\Domain\Board;
use App\Shared\Domain\Bus\Query\Response;

final class BoardResponse implements Response
{
    public function __construct(private string $id, private string $name)
    {
    }

    public static function fromBoard(Board $board): self
    {
        return new self(
            $board->id()->value(),
            $board->name()->value()
        );
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}
