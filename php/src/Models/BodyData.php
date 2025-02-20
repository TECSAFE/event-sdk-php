<?php

declare (strict_types=1);
namespace Tecsafe\OFCP\Events\Models;

use Tecsafe\OFCP\Events\Models\BodyDataPrimatyButton;
use Tecsafe\OFCP\Events\Models\BodyDataSecondaryButton;
final class BodyData implements \Tecsafe\OFCP\Events\OfcpEvent
{
    /**
     * This class represents the undefined model.
     * 
     * @param BodyDataPrimatyButton $primatyButton
     * @param BodyDataSecondaryButton $secondaryButton
     * @return self
     */
    public function __construct(private BodyDataPrimatyButton $primatyButton, private ?BodyDataSecondaryButton $secondaryButton)
    {
    }
    /**
     * Parse JSON data into an instance of this class.
     * 
     * @param string|array $json JSON data to parse.
     * @return self
     */
    public static function from_json(string|array $json): self
    {
        $data = \is_string($json) ? json_decode($json, true) : $json;
        return new self(isset($data['primatyButton']) ? BodyDataPrimatyButton::from_json($data['primatyButton']) : null, isset($data['secondaryButton']) ? BodyDataSecondaryButton::from_json($data['secondaryButton']) : null);
    }
    public function getPrimatyButton(): BodyDataPrimatyButton
    {
        return $this->primatyButton;
    }
    public function setPrimatyButton(BodyDataPrimatyButton $primatyButton): void
    {
        $this->primatyButton = $primatyButton;
    }
    public function getSecondaryButton(): ?BodyDataSecondaryButton
    {
        return $this->secondaryButton;
    }
    public function setSecondaryButton(?BodyDataSecondaryButton $secondaryButton): void
    {
        $this->secondaryButton = $secondaryButton;
    }
    public function jsonSerialize(): array
    {
        return ['primatyButton' => $this->primatyButton, 'secondaryButton' => $this->secondaryButton];
    }
}