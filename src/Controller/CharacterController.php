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
        $gameCharacter = new GameCharacter();
        $form = $this->createForm(CharacterType::class, $gameCharacter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $this->getDoctrine()->getRepository(User::class)
                ->getSingleUserById($userInterface->getId());

            $gameCharacter->setUser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($gameCharacter);
            $em->flush();

            $this->addFlash('success', "You have created a new character.");
            return $this->redirect('/character/list');
        }

        return $this->render('character/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function listAction(Request $request, UserInterface $userInterface)
    {
        $characters = $this->getDoctrine()->getRepository(GameCharacter::class)
            ->getUserGameCharactersById($userInterface->getId());

        return $this->render('character/list.html.twig', [
            'characters' => $characters
        ]);
    }

    public function showAction(Request $request, UserInterface $userInterface, $id)
    {
        $character = $this->getDoctrine()->getRepository(GameCharacter::class)
            ->getSingleGameCharacter($userInterface->getId(), $id);

        dump($character);

        return $this->render('character/show.html.twig', [
            'character' => $character
        ]);
    }

    public function editAction(Request $request, GameCharacter $gameCharacter)
    {
        $form = $this->createForm(CharacterType::class, $gameCharacter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Character edited successfully.');

            return $this->redirectToRoute('character/list');
        }

        return $this->render('character/edit.html.twig', [
            'gameCharacter' => $gameCharacter,
            'form' => $form->createView()
        ]);
    }

    public function removeAction(Request $request, GameCharacter $gameCharacter)
    {
        $form = $this->createForm(CharacterType::class, $gameCharacter);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $em->remove($gameCharacter);
        $em->flush();

        $this->addFlash('success', 'Character removed successfully.');

        return $this->redirectToRoute('character/list');
    }
}
