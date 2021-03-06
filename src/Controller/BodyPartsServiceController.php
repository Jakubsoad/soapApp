<?php


namespace App\Controller;

use App\Service\SoapService;
use App\Service\DataCreatorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class BodyPartsServiceController
 * @package App\Controller
 */
class BodyPartsServiceController extends AbstractController
{
    /**
     * @Route("/dictionary/webservice")
     * @param SoapService $soapService
     * @return Response
     */
    public function index(SoapService $soapService): Response
    {
        $soapServer = new \SoapServer('wsdl/soap_app.wsdl');
        $soapServer->setObject($soapService);

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=UTF-8');

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
    public function createDataToDB(DataCreatorService $dataCreator): Response
    {
        $dataCreator->createDataToDB();

        return new Response('success!');
    }
}
