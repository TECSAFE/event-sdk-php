<?php

declare(strict_types=1);

namespace Tecsafe\OFCP\Events\Models;

use Tecsafe\OFCP\Events\Models\Body;
use Tecsafe\OFCP\Events\Models\Header;

/**
 * Payload for sending generic emails
 */
final class GenericEmailEventPayload implements \JsonSerializable
{
    /**
     * Payload for sending generic emails
     *
     * @param Body $body Email body attributs text: Email text that will be added in the template {{ text }} without html tags Links are parsed to anchor tags title: Email title that will be added in the template {{ title }} not the subject
     * @param Header $header Email header attreibutes to, from, cc, bcc, subject, are Required and are self explaining replyTo: Optional the recipient of the reply returnPath : Optional return path address of the email
     * @return self
     */
    public function __construct(
        private Body $body,
        private Header $header,
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
            isset($data['body']) ? Body::from_json($data['body']) : null,
            isset($data['header']) ? Header::from_json($data['header']) : null,
        );
    }

    public function getBody(): Body
    {
        return $this->body;
    }
    public function setBody(Body $body): void
    {
        $this->body = $body;
    }

    public function getHeader(): Header
    {
        return $this->header;
    }
    public function setHeader(Header $header): void
    {
        $this->header = $header;
    }

    public function jsonSerialize(): array
    {
        return [
          'body' => $this->body,
          'header' => $this->header,
        ];
    }
}
