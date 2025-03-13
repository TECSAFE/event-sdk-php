<?php

declare (strict_types=1);
namespace Tecsafe\OFCP\Events\Models;

use Tecsafe\OFCP\Events\Models\EmailHeader;
use Tecsafe\OFCP\Events\Models\PrimaryButton;
use Tecsafe\OFCP\Events\Models\SecondaryButton;
/**
 * Payload for sending emails with one to two buttons
 */
final class ButtonEmailEventPayload implements \Tecsafe\OFCP\Events\OfcpEvent
{
    /**
     * Payload for sending emails with one to two buttons
     * 
     * @param EmailHeader $header The header of an email. Reused in all email events.
     * @param PrimaryButton $primaryButton The primary button
     * @param string $text The text content of the email
     * @param string $title The title of the email
     * @param SecondaryButton $secondaryButton The secondary button
     * @return self
     */
    public function __construct(private EmailHeader $header, private PrimaryButton $primaryButton, private string $text, private string $title, private ?SecondaryButton $secondaryButton)
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
        return new self(isset($data['header']) ? EmailHeader::from_json($data['header']) : null, isset($data['primaryButton']) ? PrimaryButton::from_json($data['primaryButton']) : null, $data['text'] ?? null, $data['title'] ?? null, isset($data['secondaryButton']) ? SecondaryButton::from_json($data['secondaryButton']) : null);
    }
    public function getHeader(): EmailHeader
    {
        return $this->header;
    }
    public function setHeader(EmailHeader $header): void
    {
        $this->header = $header;
    }
    public function getPrimaryButton(): PrimaryButton
    {
        return $this->primaryButton;
    }
    public function setPrimaryButton(PrimaryButton $primaryButton): void
    {
        $this->primaryButton = $primaryButton;
    }
    public function getSecondaryButton(): ?SecondaryButton
    {
        return $this->secondaryButton;
    }
    public function setSecondaryButton(?SecondaryButton $secondaryButton): void
    {
        $this->secondaryButton = $secondaryButton;
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
        return ['header' => $this->header, 'primaryButton' => $this->primaryButton, 'secondaryButton' => $this->secondaryButton, 'text' => $this->text, 'title' => $this->title];
    }
}