<?php

declare (strict_types=1);
namespace Tecsafe\OFCP\Events\Models;

use Tecsafe\OFCP\Events\Models\BodyData;
/**
 * Email body attributs text: Email text that will be added in the template {{ text }} without html tags Links are parsed to anchor tags title: Email title that will be added in the template {{ title }} not the subject data: holds the data for the buttons
 */
final class Body implements \Tecsafe\OFCP\Events\OfcpEvent
{
    /**
     * Email body attributs text: Email text that will be added in the template {{ text }} without html tags Links are parsed to anchor tags title: Email title that will be added in the template {{ title }} not the subject data: holds the data for the buttons
     * 
     * @param BodyData $data
     * @param string $text
     * @param string $title
     * @return self
     */
    public function __construct(private BodyData $data, private string $text, private string $title)
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
        return new self(isset($data['data']) ? BodyData::from_json($data['data']) : null, $data['text'] ?? null, $data['title'] ?? null);
    }
    public function getData(): BodyData
    {
        return $this->data;
    }
    public function setData(BodyData $data): void
    {
        $this->data = $data;
    }
    public function getText(): string
    {
        return $this->text;
    }
    public function setText(string $text): void
    {
        $this->text = $text;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    public function jsonSerialize(): array
    {
        return ['data' => $this->data, 'text' => $this->text, 'title' => $this->title];
    }
}