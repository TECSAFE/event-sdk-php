<?php
declare(strict_types=1);

namespace Tecsafe\OFCP\Events;



/**
 * Payload for deleting customers
 */
final class DeleteCustomerPayload implements \JsonSerializable
{
  public function __construct(
    private ?string $customer,
    private ?string $salesChannel,
  ) {}

  public function getCustomer(): string { return $this->customer; }
  public function setCustomer(string $customer): void { $this->customer = $customer; }

  public function getSalesChannel(): string { return $this->salesChannel; }
  public function setSalesChannel(string $salesChannel): void { $this->salesChannel = $salesChannel; }

  public function jsonSerialize(): array
  {
    return [
      'customer' => $this->customer,
      'salesChannel' => $this->salesChannel,
    ];
  }
}
