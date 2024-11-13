<?php

declare(strict_types=1);

namespace Tecsafe\OFCP\Events\Models;

final class TestType implements \JsonSerializable
{
    /**
     * This class represents the undefined model.
     *
     * @param string $foo
     * @return self
     */
    public function __construct(
        private string $foo,
    ) {
    }

    /**
     * Parse JSON data into an instance of this class.
     *
     * @param string|array $json JSON data to parse.
     * @return self
     */
    public static function from_json(string|array $json): self
    {
        $data = is_string($json) ? json_decode($json, true) : $json;
        return new self(
            $data['foo'] ?? null,
        );
    }

    public function getFoo(): string
    {
        return $this->foo;
    }
    public function setFoo(string $foo): void
    {
        $this->foo = $foo;
    }

    public function jsonSerialize(): array
    {
        return [
          'foo' => $this->foo,
        ];
    }
}
