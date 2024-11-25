<?php

namespace App\DataFixtures;

use App\Entity\Address;
use App\Entity\Service;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordHasherInterface
     */
    private $passwordHasher;

    /**
     * constructor
     *
     * @param UserPasswordHasherInterface $passwordHasher
     */
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $this->loadUser($manager);
        $this->loadAddresses($manager);
        $this->loadServices($manager);
    }

    /**
     * Fixtures data for user.
     *
     * @param ObjectManager $manager
     */
    private function loadUser(ObjectManager $manager)
    {
        $user = new User();
        $user->setName('domo00000');
        $user->setPassword($this->passwordHasher->hashPassword(
            $user,
            '1'
        ));
        $user->setEmail('test@test.ua');
        $user->setPhone('000000000');
        $user->setLanguage('uk');
        $user->setTheme('light');
        $manager->persist($user);
        $manager->flush();
    }

    /**
     * Fixtures data for addresses.
     *
     * @param ObjectManager $manager
     */
    private function loadAddresses(ObjectManager $manager)
    {
        foreach(DataFixtures::ADDRESSES as $item) {
            $address = new Address();
            $address->setUser($manager->getRepository(User::class)->find($item['user_id']));
            $address->setAddress($item['address']);
            $address->setStatus($item['status']);
            $address->setTariff($item['tariff']);
            $address->setBalance($item['balance']);

            $manager->persist($address);
        }

        $manager->flush();
    }

    /**
     * Fixtures data for services.
     *
     * @param ObjectManager $manager
     */
    private function loadServices(ObjectManager $manager)
    {
        foreach(DataFixtures::SERVICES as $item) {
            $address = new Service();
            $address->setAddress($manager->getRepository(Address::class)->find($item['address_id']));
            $address->setInternet($item['internet']);
            $address->setTv($item['tv']);
            $address->setIp($item['ip']);

            $manager->persist($address);
        }

        $manager->flush();
    }
}
