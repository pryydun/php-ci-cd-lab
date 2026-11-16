<?php

declare(strict_types=1);

namespace App\Tasks;

final class Genre
{
    /** @var array<int, Artist> */
    private array $artists = [];

    public function __construct(
        public readonly int $genre_id,
        public readonly string $name
    ) {}

    public function addArtist(Artist $artist): void
    {
        $this->artists[$artist->id] = $artist;
    }

    public function removeArtist(int $id): bool
    {
        if (! isset($this->artists[$id])) {
            return false;
        }

        unset($this->artists[$id]);

        return true;
    }

    public function searchArtist(string $name): array
    {
        return array_values(array_filter(
            $this->artists,
            fn (Artist $artist): bool => $artist->name === $name
        ));
    }

    public function getArtists(): array
    {
        return array_values($this->artists);
    }
}
