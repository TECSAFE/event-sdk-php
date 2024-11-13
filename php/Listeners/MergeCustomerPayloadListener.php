<?php

declare(strict_types=1);

namespace Tecsafe\OFCP\Events\Listeners;

use Tecsafe\OFCP\Events\Models\MergeCustomerPayload;
use Tecsafe\OFCP\Events\MqServiceError;

interface MergeCustomerPayloadListener
{
    /**
     * Handle the MergeCustomerPayload event. If returning false, the event will be requeued.
     * @param MergeCustomerPayload $event The event to handle.
     * @return bool|\Tecsafe\OFCP\Events\MqServiceError True if the event was handled successfully, or an error object / false if not
     */
    public function on_event(MergeCustomerPayload $event): bool | MqServiceError;
}
