<?php

declare(strict_types=1);

namespace Tecsafe\OFCP\Events\Models;

/**
 * Payload for deleting customers
 */
final class BasicCustomerEventPayload implements \JsonSerializable
{
    /**
     * Payload for deleting customers
     *
     * @param string $customer The customer ID
     * @param string $salesChannel The sales channel ID
     * @return self
     */
    public function __construct(
        private string $customer,
        private string $salesChannel,
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
            $data['customer'] ?? null,
            $data['salesChannel'] ?? null,
        );
    }

    public function getCustomer(): string
    {
        return $this->customer;
    }
    public function setCustomer(string $customer): void
    {
        $this->customer = $customer;
    }

    public function getSalesChannel(): string
    {
        return $this->salesChannel;
    }
    public function setSalesChannel(string $salesChannel): void
    {
        $this->salesChannel = $salesChannel;
    }

    public function jsonSerialize(): array
    {
        return [
          'customer' => $this->customer,
          'salesChannel' => $this->salesChannel,
        ];
    }
}
