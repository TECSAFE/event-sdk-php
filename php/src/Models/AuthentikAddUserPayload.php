<?php

declare (strict_types=1);
namespace Tecsafe\OFCP\Events\Models;

use Tecsafe\OFCP\Events\Models\User;
/**
 * Payload for add an user to Authentik
 */
final class AuthentikAddUserPayload implements \Tecsafe\OFCP\Events\OfcpEvent
{
    /**
     * Payload for add an user to Authentik
     * 
     * @param string $password
     * @param User $user user data attributes username, name, email, are Required and are self explaining type: is Required and Define the type of the user [internal┃external┃service_account┃internal_service_account] groups : Optional, array of uuids of the groups the user is in
     * @return self
     */
    public function __construct(private string $password, private User $user)
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
        return new self($data['password'] ?? null, isset($data['user']) ? User::from_json($data['user']) : null);
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): void
    {
        $this->password = $password;
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
        return ['password' => $this->password, 'user' => $this->user];
    }
}