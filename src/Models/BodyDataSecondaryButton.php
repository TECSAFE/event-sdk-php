<?php

declare (strict_types=1);
namespace Tecsafe\OFCP\Events\Models;

final class BodyDataSecondaryButton implements \Tecsafe\OFCP\Events\OfcpEvent
{
    /**
     * This class represents the undefined model.
     * 
     * @param string $title
     * @param string $url
     * @return self
     */
    public function __construct(private string $title, private string $url)
    {
    }
    /**
     * Parse JSON data into an instance of this class.
     * 
     * @param string|array $json JSON data to parse.
     * @return self
     */
    public static function from_json(string|array $json): self
    {
        $data = \is_string($json) ? json_decode($json, true) : $json;
        return new self($data['title'] ?? null, $data['url'] ?? null);
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    public function getUrl(): string
    {
        return $this->url;
    }
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
    public function jsonSerialize(): array
    {
        return ['title' => $this->title, 'url' => $this->url];
    }
}