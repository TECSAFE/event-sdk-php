<?php
declare(strict_types=1);

namespace Tecsafe\OFCP\Events;

use Tecsafe\OFCP\Events\CustomerData;

/**
 * Payload for merging customers
 */
final class MergeCustomerPayload implements \JsonSerializable
{
  public function __construct(
    private string $salesChannel,
    private ?CustomerData $data,
    private ?string $newCustomerId,
    private ?string $oldCustomerId,
  ) {}

  public function getData(): CustomerData { return $this->data; }
  public function setData(CustomerData $data): void { $this->data = $data; }

  public function getNewCustomerId(): string { return $this->newCustomerId; }
  public function setNewCustomerId(string $newCustomerId): void { $this->newCustomerId = $newCustomerId; }

  public function getOldCustomerId(): string { return $this->oldCustomerId; }
  public function setOldCustomerId(string $oldCustomerId): void { $this->oldCustomerId = $oldCustomerId; }

  public function getSalesChannel(): ?string { return $this->salesChannel; }
  public function setSalesChannel(?string $salesChannel): void { $this->salesChannel = $salesChannel; }

  public function jsonSerialize(): array
  {
    return [
      'data' => $this->data,
      'newCustomerId' => $this->newCustomerId,
      'oldCustomerId' => $this->oldCustomerId,
      'salesChannel' => $this->salesChannel,
    ];
  }
}
