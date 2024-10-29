<?php
declare(strict_types=1);

namespace Tecsafe\OFCP\Events;



enum EventChannels implements \JsonSerializable
{
  case CUSTOMER_SLASH_MERGE;
  case CUSTOMER_SLASH_DELETE;

  public function jsonSerialize(): mixed
  {
    return match($this) {
      self::CUSTOMER_SLASH_MERGE => "customer/merge",
      self::CUSTOMER_SLASH_DELETE => "customer/delete",
    };
  }
}
