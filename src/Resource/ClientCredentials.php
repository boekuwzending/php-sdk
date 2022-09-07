<?php

namespace Boekuwzending\Resource;

class ClientCredentials
{
    /** @var string */
    private $identifier;

    /** @var string */
    private $secret;

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): void
    {
        $this->identifier = $identifier;
    }

    public function getSecret(): string
    {
        return $this->secret;
    }

    public function setSecret(string $secret): void
    {
        $this->secret = $secret;
    }
}
