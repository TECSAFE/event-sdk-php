<?php
declare(strict_types=1);

namespace Tecsafe\OFCP\Events\Listeners;

use Tecsafe\OFCP\Events\Models\GenericEmailEventPayload;
use Tecsafe\OFCP\Events\MqServiceError;

interface GenericEmailEventPayloadListener {
  /**
   * Handle the GenericEmailEventPayload event. If returning false, the event will be requeued.
   * @param GenericEmailEventPayload $event The event to handle.
   * @return bool|\Tecsafe\OFCP\Events\MqServiceError True if the event was handled successfully, or an error object / false if not
   */
  public function on_event(GenericEmailEventPayload $event): bool | MqServiceError;
}
