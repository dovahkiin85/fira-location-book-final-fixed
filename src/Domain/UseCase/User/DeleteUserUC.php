<?php


namespace Fira\Domain\UseCase\User;



use Fira\Domain\Entity\UserEntity;
use Fira\Domain\Repository\UserRepository;
use Fira\Domain\UseCase\UseCaseInterface;

class DeleteUserUC implements UseCaseInterface
{
    /**
     * @var UserEntity
     */
    public UserEntity $entity;

    public function __construct(UserRepository $userRepository, UserEntity $userEntity)
    {
        $this->entity = $userEntity;
        $this->repo = $userRepository;
    }
    public function execute()
    {
        $this->repo->delete($this->entity->getName());
    }

    public function validate(): void
    {

    }
}