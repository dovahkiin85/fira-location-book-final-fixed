<?php


namespace Fira\Domain\UseCase\User;


use Fira\Domain\Entity\UserEntity;
use Fira\Domain\Repository\UserRepository;

class UpdateUserUC extends RegisterUserUC
{
    private UserEntity $userEntity;

    public function __construct(UserRepository $userRepository , UserEntity $entity)
    {
        parent::__construct($userRepository);
        $this->userEntity = $entity;
        $this->loadEntityData();
    }
    private function loadEntityData(): bool
    {
        $this->name = $this->userEntity->getName();
        $this->family = $this->userEntity->setFamily();
        $this->email = $this->userEntity->setEmail();
        $this->password = $this->userEntity->setPasswordHash();


    }
}