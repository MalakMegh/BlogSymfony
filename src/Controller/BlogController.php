<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class BlogController extends AbstractController
{

    /**
     * @Route("/", name="blog")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repo->findAll();
        return $this->render('index.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/post/{id}", name="blog_show")
     */
    public function post_show($id)
    {

        $repository = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repository->find($id);
        return $this->render('blog/post_show.html.twig', ['articles' => $articles]);
    }

    /**
     * @Route("/new", name="blog_create")
     * @IsGranted("ROLE_ADMIN")
     */
    public function create(Request $request)
    {
        //ObjectManager $manager
        $manager = $this->getDoctrine()->getManager();
        $article = new Article();

        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$article->setPublished(new \DateTime());
            $manager->persist($article);
            $manager->flush();
             return $this->redirectToRoute('blog_show', ['id' => $article->getId()]);
        }
        return $this->render('blog/create.html.twig', ['formArticle' => $form->createView()]);

    }

    /**
     * @Route("/{id}/edit", name="blog_Edit")
     * @IsGranted("ROLE_ADMIN")
     */
    public function Edit(Article $article, Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($article);
            $manager->flush();
            return $this->redirectToRoute('blog', ['id' => $article->getId()]);
        }
        return $this->render('blog/update.html.twig', ['formArticle' => $form->createView()]);

    }

    /**
     * @Route("/{id}/delete", name="blog_Delete")
     * @IsGranted("ROLE_ADMIN")
     */
    public function Delete(Article $article, Request $request)
    {
        //ObjectManager $manager
        $manager = $this->getDoctrine()->getManager();

        $manager->remove($article);
        $manager->flush();

        return $this->redirectToRoute('blog', ['id' => $article->getId()]);

    }

}
