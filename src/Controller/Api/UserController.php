<?php

namespace App\Controller\Api;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\DTO\UserDTO;
use Symfony\Component\Serializer\SerializerInterface;

class UserController extends AbstractController
{
    #[Route('/api/user/{id}', methods: ['GET', 'HEAD'])]
    public function show(int $id, EntityManagerInterface $entityManager, SerializerInterface $serializer): Response
    {
        $user = $entityManager->getRepository(User::class)->find($id);
        $userDTO = new UserDTO($user);

        $data = $serializer->serialize($userDTO, 'json');
        return new Response($data);
    }
}
