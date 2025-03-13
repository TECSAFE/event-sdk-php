<?php

declare (strict_types=1);
namespace Tecsafe\OFCP\Events\Models;

use Tecsafe\OFCP\Events\Models\EmailHeader;
/**
 * Payload for sending generic emails
 */
final class GenericEmailEventPayload implements \Tecsafe\OFCP\Events\OfcpEvent
{
    /**
     * Payload for sending generic emails
     * 
     * @param EmailHeader $header The header of an email. Reused in all email events.
     * @param string $text The text content of the email
     * @param string $title The title of the email
     * @return self
     */
    public function __construct(private EmailHeader $header, private string $text, private string $title)
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
        return new self(isset($data['header']) ? EmailHeader::from_json($data['header']) : null, $data['text'] ?? null, $data['title'] ?? null);
    }
    public function getHeader(): EmailHeader
    {
        return $this->header;
    }
    public function setHeader(EmailHeader $header): void
    {
        $this->header = $header;
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
        return ['header' => $this->header, 'text' => $this->text, 'title' => $this->title];
    }
}