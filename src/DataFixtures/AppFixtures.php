<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class AppFixtures extends Fixture
{

private $passWordHasher;

public function __construct(UserPasswordHasherInterface $passWordHasher){
    $this->passWordHasher = $passWordHasher;
}

public function load(ObjectManager $manager)
{
    $usersData = [
        ['email' => 'toto@machin.net', 'password'=> 'toto123456', 'firstName'=>'john', 'lastName'=>'doe', 'company'=>'giants'],
        ['email' => 'baba@machin.net', 'password'=> 'baba123456', 'firstName'=>'pat','lastName'=>'doe', 'company'=>'giants'],
        ['email' => 'loulou@machin.net', 'password'=> 'loulou123456','firstName'=>'dede','lastName'=>'doe', 'company'=>'giants']
    ];
    foreach ($usersData as $userData) {
        $user = new User();
        $user->setEmail($userData['email']);
        $hashedPassword = $this->passWordHasher->hashPassword($user, $userData['password']);
        $user->setPassword($hashedPassword);
        $user->setRoles(['ROLE_USER']);
        $user->setFirstName($userData['firstName']);
        $user->setLastName($userData['lastName']);
        $user->setCompany($userData['company']);

        $manager->persist($user);


    }
    $manager->flush();
}


}
