<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends AbstractController
{

    /*public function index(ArticleRepository $articlerepository, NormalizerInterface $normalizer)
    {

    $articles = $articlerepository->findAll();
    $articlenormalized = $normalizer->normalize($articles);
    // dd($articlenormalized);

    $json = json_encode($articlenormalized);
    // dd($json, $articles);

    $response = new Response($json, 200, ["Content-Type" => "application/json"]);
    return $response;
    }*/

    /**
     * @Route("/api", name="api", methods={"GET"})
     */
    public function index(ArticleRepository $articlerepository)
    {

        //$articles = $articlerepository->findAll();
        $articles = $articlerepository->findBy(array(), array('id' => 'DESC'), 5, 0);
        // $json = $serializer->serialize($articles, 'json');

        // $response = new JsonResponse($json, 200, [], true);
        $response = $this->json($articles, 200, []);
        return $response;
    }

    // consommer api externe
    /**
     * @Route("/apiexterne", name="api_used")
     */
    
    public function Call_Api():Response
    {

        $url = 'http://chailly-dejesusmartins-blog.herokuapp.com/api/articles.json';
		$articles = array_slice(json_decode(file_get_contents($url), true), 0, 5, true);;
        return $this->render('blog/apiexterne.html.twig', ['articles' => $articles]);

       // return $articles;
    }
}
