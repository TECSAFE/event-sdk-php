<?php

declare(strict_types=1);

namespace Tecsafe\OFCP\Events;

use Tecsafe\OFCP\Events\Models\MergeCustomerPayload;
use Tecsafe\OFCP\Events\Models\BasicCustomerEventPayload;
use Tecsafe\OFCP\Events\Models\GenericEmailEventPayload;
use Tecsafe\OFCP\Events\Listeners\MergeCustomerPayloadListener;
use Tecsafe\OFCP\Events\Listeners\BasicCustomerEventPayloadListener;
use Tecsafe\OFCP\Events\Listeners\GenericEmailEventPayloadListener;
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
     * @param BasicCustomerEventPayload $payload The payload to send.
     * @return void
     * @throws \Exception If the message could not be sent.
     */
    public function send_customer_delete(BasicCustomerEventPayload $payload): void
    {
        $this->publish("customer.delete", json_encode($payload));
    }

    /**
     * Subscribe to the customer.delete event.
     * @param callable|BasicCustomerEventPayloadListener $callback The callback or listener instance to call when the event is received.
     */
    public function subscribe_customer_delete(callable|BasicCustomerEventPayloadListener $callback): void
    {
        $handler = function (string $payload) use ($callback) {
            $obj = BasicCustomerEventPayload::from_json($payload);
            $res = false;
            if ($callback instanceof BasicCustomerEventPayloadListener) {
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
     * @param BasicCustomerEventPayload $payload The payload to send.
     * @return void
     * @throws \Exception If the message could not be sent.
     */
    public function send_customer_created(BasicCustomerEventPayload $payload): void
    {
        $this->publish("customer.created", json_encode($payload));
    }

    /**
     * Subscribe to the customer.created event.
     * @param callable|BasicCustomerEventPayloadListener $callback The callback or listener instance to call when the event is received.
     */
    public function subscribe_customer_created(callable|BasicCustomerEventPayloadListener $callback): void
    {
        $handler = function (string $payload) use ($callback) {
            $obj = BasicCustomerEventPayload::from_json($payload);
            $res = false;
            if ($callback instanceof BasicCustomerEventPayloadListener) {
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

}
