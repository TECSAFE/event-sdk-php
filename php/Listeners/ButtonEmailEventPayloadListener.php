<?php

declare(strict_types=1);

namespace Tecsafe\OFCP\Events\Listeners;

use Tecsafe\OFCP\Events\Models\ButtonEmailEventPayload;
use Tecsafe\OFCP\Events\MqServiceError;

interface ButtonEmailEventPayloadListener
{
    /**
     * Handle the ButtonEmailEventPayload event. If returning false, the event will be requeued.
     * @param ButtonEmailEventPayload $event The event to handle.
     * @return bool|\Tecsafe\OFCP\Events\MqServiceError True if the event was handled successfully, or an error object / false if not
     */
    public function on_event(ButtonEmailEventPayload $event): bool | MqServiceError;
}
