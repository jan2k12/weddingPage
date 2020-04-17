<?php


namespace App\Controller;


use App\Entity\GuestData;
use App\Form\GuestDataType;
use App\Repository\GuestDataRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends AbstractController
{
    public function index()
    {
        return $this->render('base.html.twig');
    }

    public function schedule()
    {
        return $this->render('schedule.html.twig');
    }

    public function tipps()
    {
        return $this->render('tipps.html.twig');
    }

    public function confirmation(Request $request, GuestDataRepository $gdata)
    {
        $user = $this->getUser();
        $this->denyAccessUnlessGranted('ROLE_GUEST');

        $data = $gdata->findOneByUserId($user->getId());

        if (!$data) {
            $guestData = new GuestData();
        } else {
            $guestData = $data;
        }
        $success=false;
        $form = $this->createForm(GuestDataType::class, $guestData);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $guestData->setUser($user);
            $em->persist($guestData);
            $em->flush();
            $success = true;
        }
        return $this->render('confirmation.html.twig', ['form' => $form->createView(),"success"=>$success]);
    }

    public function contact()
    {
        return $this->render('contact.html.twig');
    }

    public function datenschutz()
    {
        return $this->render('datenschutz.html.twig');
    }

    public function impressum()
    {
        return $this->render('impressum.html.twig');
    }

    public function adresses()
    {
        return $this->render('adresses.html.twig');
    }
}