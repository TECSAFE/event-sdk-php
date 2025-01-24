<?php

declare(strict_types=1);

namespace Tecsafe\OFCP\Events\Models;

/**
 * Email header attreibutes to, from, cc, bcc, subject, are Required and are self explaining replyTo: Optional the recipient of the reply returnPath : Optional return path address of the email
 */
final class Header implements \JsonSerializable
{
    /**
     * Email header attreibutes to, from, cc, bcc, subject, are Required and are self explaining replyTo: Optional the recipient of the reply returnPath : Optional return path address of the email
     *
     * @param string $reservedFrom
     * @param string $subject
     * @param array $to
     * @param array $bcc
     * @param array $cc
     * @param string $replyTo
     * @param string $returnPath
     * @return self
     */
    public function __construct(
        private string $reservedFrom,
        private string $subject,
        private array $to,
        private ?array $bcc,
        private ?array $cc,
        private ?string $replyTo,
        private ?string $returnPath,
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
            $data['reservedFrom'] ?? null,
            $data['subject'] ?? null,
            $data['to'] ?? null,
            $data['bcc'] ?? null,
            $data['cc'] ?? null,
            $data['replyTo'] ?? null,
            $data['returnPath'] ?? null,
        );
    }

    public function getBcc(): ?array
    {
        return $this->bcc;
    }
    public function setBcc(?array $bcc): void
    {
        $this->bcc = $bcc;
    }

    public function getCc(): ?array
    {
        return $this->cc;
    }
    public function setCc(?array $cc): void
    {
        $this->cc = $cc;
    }

    public function getReservedFrom(): string
    {
        return $this->reservedFrom;
    }
    public function setReservedFrom(string $reservedFrom): void
    {
        $this->reservedFrom = $reservedFrom;
    }

    public function getReplyTo(): ?string
    {
        return $this->replyTo;
    }
    public function setReplyTo(?string $replyTo): void
    {
        $this->replyTo = $replyTo;
    }

    public function getReturnPath(): ?string
    {
        return $this->returnPath;
    }
    public function setReturnPath(?string $returnPath): void
    {
        $this->returnPath = $returnPath;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    public function getTo(): array
    {
        return $this->to;
    }
    public function setTo(array $to): void
    {
        $this->to = $to;
    }

    public function jsonSerialize(): array
    {
        return [
          'bcc' => $this->bcc,
          'cc' => $this->cc,
          'from' => $this->reservedFrom,
          'replyTo' => $this->replyTo,
          'returnPath' => $this->returnPath,
          'subject' => $this->subject,
          'to' => $this->to,
        ];
    }
}
