<?php

namespace App\DTO;

use App\Entity\Service;

class ServiceDTO
{
    private $internet;
    private $tv;
    private $ip;


    public function __construct(Service $service)
    {
        $this->internet = $service->getInternet();
        $this->tv = $service->getTv();
        $this->ip = $service->getIp();
    }

    public function getInternet()
    {
        return $this->internet;
    }
    public function getTv()
    {
        return $this->tv;
    }

    public function getIp()
    {
        return $this->ip;
    }
}