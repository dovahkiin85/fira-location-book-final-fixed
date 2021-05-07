<?php

namespace Fira\Domain\Entity;

class UserEntity extends Entity
{
    protected string $name;
    protected string $family;
    protected string $email;
    protected string $passwordHash;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string   $name
     */
    public function setName(string $name): string
    {
        $this->name = $name;
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFamily(): string
    {
        return $this->family;
    }

    /**
     * @param string   $family
     */
    public function setFamily(string $family): string
    {
        $this->family = $family;
        return $this->family;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string   $email
     */
    public function setEmail(string $email): string
    {
        $this->email = $email;
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    /**
     * @param string   $passwordHash
     */
    public function setPasswordHash(string $passwordHash): string
    {
        $this->passwordHash = $passwordHash;
        return $this->passwordHash;
    }
}
