<?php

declare (strict_types=1);
namespace Tecsafe\OFCP\Events\Models;

/**
 * user data attributes username, name, email, are Required and are self explaining type: is Required and Define the type of the user [internal┃external┃service_account┃internal_service_account] groups : Optional, array of uuids of the groups the user is in
 */
final class User implements \Tecsafe\OFCP\Events\OfcpEvent
{
    /**
     * user data attributes username, name, email, are Required and are self explaining type: is Required and Define the type of the user [internal┃external┃service_account┃internal_service_account] groups : Optional, array of uuids of the groups the user is in
     * 
     * @param string $email
     * @param string $name
     * @param string $type
     * @param string $username
     * @param array $groups
     * @return self
     */
    public function __construct(private string $email, private string $name, private string $type, private string $username, private ?array $groups)
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
        return new self($data['email'] ?? null, $data['name'] ?? null, $data['type'] ?? null, $data['username'] ?? null, $data['groups'] ?? null);
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function getGroups(): ?array
    {
        return $this->groups;
    }
    public function setGroups(?array $groups): void
    {
        $this->groups = $groups;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getType(): string
    {
        return $this->type;
    }
    public function setType(string $type): void
    {
        $this->type = $type;
    }
    public function getUsername(): string
    {
        return $this->username;
    }
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }
    public function jsonSerialize(): array
    {
        return ['email' => $this->email, 'groups' => $this->groups, 'name' => $this->name, 'type' => $this->type, 'username' => $this->username];
    }
}