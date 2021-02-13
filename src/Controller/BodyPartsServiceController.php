<?php

namespace App\Controller;

use App\Service\BodyPartsService;
use App\Service\DataCreatorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BodyPartsServiceController extends AbstractController
{
    /**
     * @Route("/dictionary/webservice")
     * @param BodyPartsService $helloService
     * @return Response
     */
    public function index(BodyPartsService $helloService)
    {
        $soapServer = new \SoapServer('wsdl/soap_app.wsdl');
        $soapServer->setObject($helloService);

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');

        ob_start();
        $soapServer->handle();
        $response->setContent(ob_get_clean());

        return $response;
    }

    /**
     * @Route("/create-data")
     * @param DataCreatorService $dataCreator
     * @return Response
     */
    public function createDataToDB(DataCreatorService $dataCreator)
    {
        $dataCreator->createDataToDB();

        return new Response('Success!');
    }
}
