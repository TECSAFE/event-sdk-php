<?php

declare(strict_types=1);

namespace Tecsafe\OFCP\Events\Models;

/**
 * Payload for deleting customers
 */
final class GenericEmailEventPayload implements \JsonSerializable
{
    /**
     * Payload for deleting customers
     *
     * @param string $email The receiving email address
     * @param string $subject The email subject ID
     * @param string $text The email text, only normal text and links are supported, and should not contain HTML
     * @return self
     */
    public function __construct(
        private string $email,
        private string $subject,
        private string $text,
    ) {
    }

    /**
     * Parse JSON data into an instance of this class.
     *
     * @param string|array $json JSON data to parse.
     * @return self
     */
    public static function from_json(string|array $json): self
    {
        $data = is_string($json) ? json_decode($json, true) : $json;
        return new self(
            $data['email'] ?? null,
            $data['subject'] ?? null,
            $data['text'] ?? null,
        );
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    public function getText(): string
    {
        return $this->text;
    }
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function jsonSerialize(): array
    {
        return [
          'email' => $this->email,
          'subject' => $this->subject,
          'text' => $this->text,
        ];
    }
}
