<?php

namespace Kiwilan\Opds\Entries;

use DateTime;

class OpdsEntry
{
    public function __construct(
        protected string $id,
        protected string $title,
        protected string $route,
        protected ?string $summary = null,
        protected ?string $media = null,
        protected DateTime|string|null $updated = null,
    ) {
        if ($summary) {
            $this->summary = strip_tags($summary);
            $this->summary = strlen($this->summary) > 200 ? substr($this->summary, 0, 200).'...' : $this->summary;
        }
    }

    public function id(): string
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function route(): string
    {
        return $this->route;
    }

    public function summary(): ?string
    {
        return $this->summary;
    }

    public function media(): ?string
    {
        return $this->media;
    }

    public function updated(): DateTime|string|null
    {
        return $this->updated;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id(),
            'title' => $this->title(),
            'route' => $this->route(),
            'summary' => $this->summary(),
            'media' => $this->media(),
            'updated' => $this->updated(),
        ];
    }
}