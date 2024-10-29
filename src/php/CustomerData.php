<?php
declare(strict_types=1);

namespace Tecsafe\OFCP\Events;



final class CustomerData implements \JsonSerializable
{
  public function __construct(
    private ?string $email,
    private ?string $name,
  ) {}

  public function getEmail(): string { return $this->email; }
  public function setEmail(string $email): void { $this->email = $email; }

  public function getName(): string { return $this->name; }
  public function setName(string $name): void { $this->name = $name; }

  public function jsonSerialize(): array
  {
    return [
      'email' => $this->email,
      'name' => $this->name,
    ];
  }
}
