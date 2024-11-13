<?php

declare(strict_types=1);

namespace Tecsafe\OFCP\Events\Models;

use Tecsafe\OFCP\Events\Models\TestType;

/**
 * Payload for merging customers
 */
final class MergeCustomerPayload implements \JsonSerializable
{
    /**
     * Payload for merging customers
     *
     * @param string $newCustomerId The new customer ID
     * @param string $oldCustomerId The old customer ID
     * @param string $salesChannel The sales channel ID
     * @param TestType $test
     * @return self
     */
    public function __construct(
        private string $newCustomerId,
        private string $oldCustomerId,
        private string $salesChannel,
        private TestType $test,
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
            $data['newCustomerId'] ?? null,
            $data['oldCustomerId'] ?? null,
            $data['salesChannel'] ?? null,
            isset($data['test']) ? TestType::from_json($data['test']) : null,
        );
    }

    public function getNewCustomerId(): string
    {
        return $this->newCustomerId;
    }
    public function setNewCustomerId(string $newCustomerId): void
    {
        $this->newCustomerId = $newCustomerId;
    }

    public function getOldCustomerId(): string
    {
        return $this->oldCustomerId;
    }
    public function setOldCustomerId(string $oldCustomerId): void
    {
        $this->oldCustomerId = $oldCustomerId;
    }

    public function getSalesChannel(): string
    {
        return $this->salesChannel;
    }
    public function setSalesChannel(string $salesChannel): void
    {
        $this->salesChannel = $salesChannel;
    }

    public function getTest(): TestType
    {
        return $this->test;
    }
    public function setTest(TestType $test): void
    {
        $this->test = $test;
    }

    public function jsonSerialize(): array
    {
        return [
          'newCustomerId' => $this->newCustomerId,
          'oldCustomerId' => $this->oldCustomerId,
          'salesChannel' => $this->salesChannel,
          'test' => $this->test,
        ];
    }
}
