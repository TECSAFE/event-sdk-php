<?php
declare(strict_types=1);

namespace Tecsafe\OFCP\Events;



/**
 * Payload for merging customers
 */
final class MergeCustomerPayload implements \JsonSerializable
{
  public function __construct(
    private string $newCustomerId,
    private string $oldCustomerId,
    private string $salesChannel,
  ) {}

  public function getNewCustomerId(): string { return $this->newCustomerId; }
  public function setNewCustomerId(string $newCustomerId): void { $this->newCustomerId = $newCustomerId; }

  public function getOldCustomerId(): string { return $this->oldCustomerId; }
  public function setOldCustomerId(string $oldCustomerId): void { $this->oldCustomerId = $oldCustomerId; }

  public function getSalesChannel(): string { return $this->salesChannel; }
  public function setSalesChannel(string $salesChannel): void { $this->salesChannel = $salesChannel; }

  public function jsonSerialize(): array
  {
    return [
      'newCustomerId' => $this->newCustomerId,
      'oldCustomerId' => $this->oldCustomerId,
      'salesChannel' => $this->salesChannel,
    ];
  }
}
