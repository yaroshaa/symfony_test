<?php

namespace App\DTO;

use App\Entity\Address;
use Doctrine\Common\Collections\Collection;

class AddressDTO
{
    private $address;
    private string $status;
    private $tariff;
    private $balance;
    private $services;

    public function __construct(Address $address)
    {
        $this->address = $address->getAddress();
        $this->status = $address->getStatus() ? 'enable' : 'disable';
        $this->tariff = $address->getTariff();
        $this->balance = (float)$address->getBalance();
        $this->services = new ServiceDTO($address->getService());
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function getStatus()
    {
        return $this->status;
    }

    public function getTariff ()
    {
        return $this->tariff ;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function getServices() :ServiceDTO
    {
        return $this->services;
    }


}