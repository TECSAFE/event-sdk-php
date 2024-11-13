<?php

declare(strict_types=1);

namespace Tecsafe\OFCP\Events;

use Tecsafe\OFCP\Events\Models\MergeCustomerPayload;
use Tecsafe\OFCP\Events\Models\DeleteCustomerPayload;
use Tecsafe\OFCP\Events\Listeners\MergeCustomerPayloadListener;
use Tecsafe\OFCP\Events\Listeners\DeleteCustomerPayloadListener;
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
     * @param DeleteCustomerPayload $payload The payload to send.
     * @return void
     * @throws \Exception If the message could not be sent.
     */
    public function send_customer_delete(DeleteCustomerPayload $payload): void
    {
        $this->publish("customer.delete", json_encode($payload));
    }

    /**
     * Subscribe to the customer.delete event.
     * @param callable|DeleteCustomerPayloadListener $callback The callback or listener instance to call when the event is received.
     */
    public function subscribe_customer_delete(callable|DeleteCustomerPayloadListener $callback): void
    {
        $handler = function (string $payload) use ($callback) {
            $obj = DeleteCustomerPayload::from_json($payload);
            $res = false;
            if ($callback instanceof DeleteCustomerPayloadListener) {
                $res = $callback->on_event($obj);
            } else {
                $res = $callback($obj);
            }
            return $res;
        };
        $this->subscribe("customer.delete", $handler);
    }

}
