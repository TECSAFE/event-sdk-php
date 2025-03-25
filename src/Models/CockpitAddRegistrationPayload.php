<?php

declare (strict_types=1);
namespace Tecsafe\OFCP\Events\Models;

use Tecsafe\OFCP\Events\Models\User;
/**
 * Payload for add an user to the Cockpit
 */
final class CockpitAddRegistrationPayload implements \Tecsafe\OFCP\Events\OfcpEvent
{
    /**
     * Payload for add an user to the Cockpit
     * 
     * @param mixed $expirationDate
     * @param string $organisationId
     * @param string $password
     * @param string $role
     * @param User $user user data attributes username, name, email, are Required and are self explaining type: is Required and Define the type of the user [internal┃external┃service_account┃internal_service_account] groups : Optional, array of uuids of the groups the user is in
     * @return self
     */
    public function __construct(private mixed|null $expirationDate, private string $organisationId, private string $password, private string $role, private User $user)
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
        return new self($data['expirationDate'] ?? null, $data['organisationId'] ?? null, $data['password'] ?? null, $data['role'] ?? null, isset($data['user']) ? User::from_json($data['user']) : null);
    }
    public function getExpirationDate(): mixed
    {
        return $this->expirationDate;
    }
    public function setExpirationDate(mixed $expirationDate): void
    {
        $this->expirationDate = $expirationDate;
    }
    public function getOrganisationId(): string
    {
        return $this->organisationId;
    }
    public function setOrganisationId(string $organisationId): void
    {
        $this->organisationId = $organisationId;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    public function getRole(): string
    {
        return $this->role;
    }
    public function setRole(string $role): void
    {
        $this->role = $role;
    }
    public function getUser(): User
    {
        return $this->user;
    }
    public function setUser(User $user): void
    {
        $this->user = $user;
    }
    public function jsonSerialize(): array
    {
        return ['expiration_date' => $this->expirationDate, 'organisationId' => $this->organisationId, 'password' => $this->password, 'role' => $this->role, 'user' => $this->user];
    }
}