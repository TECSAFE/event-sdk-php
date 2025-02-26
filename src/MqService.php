<?php
declare(strict_types=1);

namespace Tecsafe\OFCP\Events;

use Tecsafe\OFCP\Events\Models\MergeCustomerPayload;
use Tecsafe\OFCP\Events\Models\CustomerDeleteEventPayload;
use Tecsafe\OFCP\Events\Models\CustomerCreatedEventPayload;
use Tecsafe\OFCP\Events\Models\GenericEmailEventPayload;
use Tecsafe\OFCP\Events\Models\ButtonEmailEventPayload;
use Tecsafe\OFCP\Events\Models\AuthentikAddUserPayload;
use Tecsafe\OFCP\Events\Listeners\MergeCustomerPayloadListener;
use Tecsafe\OFCP\Events\Listeners\CustomerDeleteEventPayloadListener;
use Tecsafe\OFCP\Events\Listeners\CustomerCreatedEventPayloadListener;
use Tecsafe\OFCP\Events\Listeners\GenericEmailEventPayloadListener;
use Tecsafe\OFCP\Events\Listeners\ButtonEmailEventPayloadListener;
use Tecsafe\OFCP\Events\Listeners\AuthentikAddUserPayloadListener;
use Tecsafe\OFCP\Events\MqServiceBase;

class MqService extends MqServiceBase
{

  /**
   * Send the customer.merge event.
   * @param MergeCustomerPayload $payload The payload to send.
   * @return void
   * @throws \Exception If the message could not be sent.
   */
  public function send_customer_merge(MergeCustomerPayload $payload): void
  {
    $this->publish("customer.merge", json_encode($payload));
  }

  /**
   * Subscribe to the customer.merge event.
   * @param callable|MergeCustomerPayloadListener $callback The callback or listener instance to call when the event is received.
   */
  public function subscribe_customer_merge(callable|MergeCustomerPayloadListener $callback): void
  {
    $handler = function (string $payload) use ($callback) {
      $obj = MergeCustomerPayload::from_json($payload);
      $res = false;
      if ($callback instanceof MergeCustomerPayloadListener) {
        $res = $callback->on_event($obj);
      } else {
        $res = $callback($obj);
      }
      return $res;
    };
    $this->subscribe("customer.merge", $handler);
  }

  /**
   * Send the customer.delete event.
   * @param CustomerDeleteEventPayload $payload The payload to send.
   * @return void
   * @throws \Exception If the message could not be sent.
   */
  public function send_customer_delete(CustomerDeleteEventPayload $payload): void
  {
    $this->publish("customer.delete", json_encode($payload));
  }

  /**
   * Subscribe to the customer.delete event.
   * @param callable|CustomerDeleteEventPayloadListener $callback The callback or listener instance to call when the event is received.
   */
  public function subscribe_customer_delete(callable|CustomerDeleteEventPayloadListener $callback): void
  {
    $handler = function (string $payload) use ($callback) {
      $obj = CustomerDeleteEventPayload::from_json($payload);
      $res = false;
      if ($callback instanceof CustomerDeleteEventPayloadListener) {
        $res = $callback->on_event($obj);
      } else {
        $res = $callback($obj);
      }
      return $res;
    };
    $this->subscribe("customer.delete", $handler);
  }

  /**
   * Send the customer.created event.
   * @param CustomerCreatedEventPayload $payload The payload to send.
   * @return void
   * @throws \Exception If the message could not be sent.
   */
  public function send_customer_created(CustomerCreatedEventPayload $payload): void
  {
    $this->publish("customer.created", json_encode($payload));
  }

  /**
   * Subscribe to the customer.created event.
   * @param callable|CustomerCreatedEventPayloadListener $callback The callback or listener instance to call when the event is received.
   */
  public function subscribe_customer_created(callable|CustomerCreatedEventPayloadListener $callback): void
  {
    $handler = function (string $payload) use ($callback) {
      $obj = CustomerCreatedEventPayload::from_json($payload);
      $res = false;
      if ($callback instanceof CustomerCreatedEventPayloadListener) {
        $res = $callback->on_event($obj);
      } else {
        $res = $callback($obj);
      }
      return $res;
    };
    $this->subscribe("customer.created", $handler);
  }

  /**
   * Send the email.generic event.
   * @param GenericEmailEventPayload $payload The payload to send.
   * @return void
   * @throws \Exception If the message could not be sent.
   */
  public function send_email_generic(GenericEmailEventPayload $payload): void
  {
    $this->publish("email.generic", json_encode($payload));
  }

  /**
   * Subscribe to the email.generic event.
   * @param callable|GenericEmailEventPayloadListener $callback The callback or listener instance to call when the event is received.
   */
  public function subscribe_email_generic(callable|GenericEmailEventPayloadListener $callback): void
  {
    $handler = function (string $payload) use ($callback) {
      $obj = GenericEmailEventPayload::from_json($payload);
      $res = false;
      if ($callback instanceof GenericEmailEventPayloadListener) {
        $res = $callback->on_event($obj);
      } else {
        $res = $callback($obj);
      }
      return $res;
    };
    $this->subscribe("email.generic", $handler);
  }

  /**
   * Send the email.button event.
   * @param ButtonEmailEventPayload $payload The payload to send.
   * @return void
   * @throws \Exception If the message could not be sent.
   */
  public function send_email_button(ButtonEmailEventPayload $payload): void
  {
    $this->publish("email.button", json_encode($payload));
  }

  /**
   * Subscribe to the email.button event.
   * @param callable|ButtonEmailEventPayloadListener $callback The callback or listener instance to call when the event is received.
   */
  public function subscribe_email_button(callable|ButtonEmailEventPayloadListener $callback): void
  {
    $handler = function (string $payload) use ($callback) {
      $obj = ButtonEmailEventPayload::from_json($payload);
      $res = false;
      if ($callback instanceof ButtonEmailEventPayloadListener) {
        $res = $callback->on_event($obj);
      } else {
        $res = $callback($obj);
      }
      return $res;
    };
    $this->subscribe("email.button", $handler);
  }

  /**
   * Send the authentik.add_user event.
   * @param AuthentikAddUserPayload $payload The payload to send.
   * @return void
   * @throws \Exception If the message could not be sent.
   */
  public function send_authentik_add_user(AuthentikAddUserPayload $payload): void
  {
    $this->publish("authentik.add_user", json_encode($payload));
  }

  /**
   * Subscribe to the authentik.add_user event.
   * @param callable|AuthentikAddUserPayloadListener $callback The callback or listener instance to call when the event is received.
   */
  public function subscribe_authentik_add_user(callable|AuthentikAddUserPayloadListener $callback): void
  {
    $handler = function (string $payload) use ($callback) {
      $obj = AuthentikAddUserPayload::from_json($payload);
      $res = false;
      if ($callback instanceof AuthentikAddUserPayloadListener) {
        $res = $callback->on_event($obj);
      } else {
        $res = $callback($obj);
      }
      return $res;
    };
    $this->subscribe("authentik.add_user", $handler);
  }

}
