<?php

namespace App\Controller;

use App\Entity\Company; 
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TicketDoRController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_ticket_default', methods: ['GET'])]
    public function showDefaultTicket(): Response
    {
   
        $defaultVideoUrl = 'https://www.youtube.com/embed/YOUR_DEFAULT_VIDEO_ID'; 

        return $this->render('ticket_do_r/index.html.twig', [
            'videoUrl' => $defaultVideoUrl,
            'name' => 'Votre Entreprise', 
            'logoUrl' => null,               
        ]);
    }

    #[Route('/ticket/{company}', name: 'app_ticket_do_r', methods: ['GET'])]
    public function showTicket(string $company): Response
    {
        
        $companyEntity = $this->entityManager->getRepository(Company::class)->findOneBy(['name' => $company]);

      
        $defaultVideoUrl = 'https://youtu.be/sxT2F4xHDHU'; 
        $defaultCompanyName = 'Chére Entreprise'; 
        $defaultLogoUrl = '/images/default_logo.png'; 

    
        if (!$companyEntity) {
            $companyName = $defaultCompanyName;
            $videoUrl = $defaultVideoUrl;
            $logoUrl = $defaultLogoUrl;
        } else {
      
            $companyName = $companyEntity->getName();
            $videoUrl = $companyEntity->getVideoUrl() ?? $defaultVideoUrl; 
            $logoUrl = $companyEntity->getLogoUrl() ?? $defaultLogoUrl; 
        }

       
        return $this->render('ticket_do_r/index.html.twig', [
            'name' => ucfirst($companyName),  
            'videoUrl' => $videoUrl,             
            'logoUrl' => $logoUrl,               
        ]);
    }
}
