<?php

namespace App\DTO;

use App\Entity\User;
use Doctrine\Common\Collections\Collection;

class UserDTO
{
    private $id;
    private $username;
    private $email;
    private $phone;
    private $language;
    private $theme;
    private ?string $deviceId;
    private array $addresses;

    public function __construct(User $user)
    {
        $this->id = $user->getId();
        $this->username = $user->getName();
        $this->email = $user->getEmail();
        $this->phone = $user->getPhone();
        $this->language = $user->getLanguage();
        $this->theme = $user->getTheme();
        $this->deviceId = $user->getDeviceId() ?? '';
        $this->addresses = $this->addressesGen($user->getAddresses());
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPhone()
    {
        return $this->phone;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getTheme()
    {
        return $this->theme;
    }

    public function getDeviceId(): ?string
    {
        return $this->deviceId;
    }

    public function getAddresses(): array
    {
        return $this->addresses;
    }

    private function addressesGen(Collection $addresses)
    {
        $arr = [];

        foreach ($addresses as $address) {
            $arr[] = new AddressDTO($address);
        }

        return $arr;
    }
}