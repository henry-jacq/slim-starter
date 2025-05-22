<?php

namespace App\Services;

use DateTime;
use App\Entity\User;
use App\Core\Session;
use App\Enum\UserRole;
use Doctrine\ORM\EntityManagerInterface;

class UserService
{
    public function __construct(
        private readonly Session $session,
        private readonly EntityManagerInterface $em
    )
    {
    }

    public function getUserByEmail(string $email): User|null
    {
        return $this->em->getRepository(User::class)->findOneBy(['email' => $email]);
    }
    
    public function createUser(array $data): User|bool
    {
        // check if user with email exists
        $user = $this->getUserByEmail($data['email']);
        if ($user !== null) {
            return $user;
        }
        
        $user = new User();
        $user->setName($data['name']);
        $user->setEmail($data['email']);
        $user->setPassword(password_hash($data['contact'], PASSWORD_DEFAULT, ['cost' => 12]));
        $user->setContactNo($data['contact']);
        $user->setGender($data['gender']);
        $user->setRole($data['role'] ?? UserRole::USER);
        $user->setCreatedAt(new DateTime());
        
        $this->em->persist($user);
        $this->em->flush();
        
        return $user;
    }
}
