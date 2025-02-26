<?php

declare (strict_types=1);
namespace Tecsafe\OFCP\Events\Models;

/**
 * Payload for merging customers
 */
final class MergeCustomerPayload implements \Tecsafe\OFCP\Events\OfcpEvent
{
    /**
     * Payload for merging customers
     * 
     * @param string $newCustomerId The new customer ID
     * @param string $newExternalCustomerId The new customer ID
     * @param string $newSalesChannelId The new sales channel ID
     * @param string $oldCustomerId The old customer ID
     * @param string $oldExternalCustomerId The old external customer ID
     * @param string $oldSalesChannelId The old sales channel ID
     * @return self
     */
    public function __construct(private string $newCustomerId, private string $newExternalCustomerId, private string $newSalesChannelId, private string $oldCustomerId, private string $oldExternalCustomerId, private string $oldSalesChannelId)
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
        return new self($data['newCustomerId'] ?? null, $data['newExternalCustomerId'] ?? null, $data['newSalesChannelId'] ?? null, $data['oldCustomerId'] ?? null, $data['oldExternalCustomerId'] ?? null, $data['oldSalesChannelId'] ?? null);
    }
    public function getNewCustomerId(): string
    {
        return $this->newCustomerId;
    }
    public function setNewCustomerId(string $newCustomerId): void
    {
        $this->newCustomerId = $newCustomerId;
    }
    public function getNewExternalCustomerId(): string
    {
        return $this->newExternalCustomerId;
    }
    public function setNewExternalCustomerId(string $newExternalCustomerId): void
    {
        $this->newExternalCustomerId = $newExternalCustomerId;
    }
    public function getNewSalesChannelId(): string
    {
        return $this->newSalesChannelId;
    }
    public function setNewSalesChannelId(string $newSalesChannelId): void
    {
        $this->newSalesChannelId = $newSalesChannelId;
    }
    public function getOldCustomerId(): string
    {
        return $this->oldCustomerId;
    }
    public function setOldCustomerId(string $oldCustomerId): void
    {
        $this->oldCustomerId = $oldCustomerId;
    }
    public function getOldExternalCustomerId(): string
    {
        return $this->oldExternalCustomerId;
    }
    public function setOldExternalCustomerId(string $oldExternalCustomerId): void
    {
        $this->oldExternalCustomerId = $oldExternalCustomerId;
    }
    public function getOldSalesChannelId(): string
    {
        return $this->oldSalesChannelId;
    }
    public function setOldSalesChannelId(string $oldSalesChannelId): void
    {
        $this->oldSalesChannelId = $oldSalesChannelId;
    }
    public function jsonSerialize(): array
    {
        return ['newCustomerId' => $this->newCustomerId, 'newExternalCustomerId' => $this->newExternalCustomerId, 'newSalesChannelId' => $this->newSalesChannelId, 'oldCustomerId' => $this->oldCustomerId, 'oldExternalCustomerId' => $this->oldExternalCustomerId, 'oldSalesChannelId' => $this->oldSalesChannelId];
    }
}