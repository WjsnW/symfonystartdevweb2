<?php

namespace App\Controller;

use App\Entity\Article; // on appel la classe Article située dans le namespace App\Entity (voir fichier src/Entity/Article.php)
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(): Response
    {
        // On recupère tous les articles depuis la base de donnée
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render('blog/index.html.twig',[
            'articles' => $articles // On passe la collection d'articles à la vue
        ]);
    }

    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show($id) : Response
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

        return $this->render('blog/show.html.twig',[
            'article' => $article,
        ]);
    }
}