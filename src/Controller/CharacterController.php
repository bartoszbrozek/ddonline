<?php

namespace App\Controller;

use App\Entity\CharacterClass;
use App\Entity\GameCharacter;
use App\Entity\User;
use App\Form\CharacterType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class CharacterController extends Controller
{

    public function createAction(Request $request, UserInterface $userInterface)
    {
        $em = $this->getDoctrine()->getManager();

        $character = new GameCharacter();

        $form = $this->createForm(CharacterType::class, $character);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $this->getDoctrine()->getRepository(User::class)->getSingleUserById($userInterface->getId());
            $character->setUser($user);

            $em->persist($character);
            $em->flush();

            $this->addFlash('success', "You have created a new character.");
            return $this->redirect('/');
        }

        return $this->render('character/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function listAction(Request $request, UserInterface $userInterface)
    {
        $characters = $this->getDoctrine()->getRepository(GameCharacter::class)->getUserGameCharactersById($userInterface->getId());

//        dump($characters);

        return $this->render('character/list.html.twig', [
            'characters' => $characters
        ]);
    }
}
