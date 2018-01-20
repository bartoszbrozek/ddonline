<?php

namespace App\Controller;

use App\Entity\CharacterClass;
use App\Entity\GameCharacter;
use App\Form\CharacterType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CharacterController extends Controller
{

    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $character = new GameCharacter();

        $form = $this->createForm(CharacterType::class, $character);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($character);
            $em->flush();

            $this->addFlash('success', "You have created a new character.");
            return $this->redirect('/');
        }

        return $this->render('character/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function listAction(Request $request)
    {
        $characters = $this->getDoctrine()->getRepository(GameCharacter::class)->getAll();

//        dump($characters);

        return $this->render('character/list.html.twig', [
            'characters' => $characters
        ]);
    }
}
