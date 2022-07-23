<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KalimaController extends AbstractController
{
    #[Route('/kalima', name: 'app_kalima')]
    public function index(): Response
    {
        return $this->render('kalima/index.html.twig', [
            'controller_name' => 'KalimaController',
        ]);
    }

    public function fetchExcerpt(?string $rawText, array $options = []): string
    {
        if (!isset($rawText)) {
            throw new \Exception('unable to fetch excerpt from non existing text');
        }

        if (strlen($rawText) < 510) { // 510 domain constant
            return $rawText;
        }

        // with long narrations: only a excerpt will be presented
        // a 510 char long string are treamed at it last whitespace
        // desideratum: excerpt's length configurable with a parametrer (ex. EXCEPTR_MED)
        $excerpt = substr($rawText, 0, 510); // retrievess only the first chars
        $excerpt = substr($excerpt, 0, strrpos($excerpt, " ")); // trims the excerpt in an space

        // some substitutions are made:
        //
        // <br /> tags by paragraph sign:
        $excerpt = str_replace("<br />", '&para;', $excerpt);

        // <b>, </b>, <i>, </i> tags get supressed:
        $excerpt = str_replace("<b>", "", $excerpt);
        $excerpt = str_replace("</b>", "", $excerpt);
        $excerpt = str_replace("<i>", "", $excerpt);
        $excerpt = str_replace("</i>", "", $excerpt);
        // display a 'See more...' button:
//        echo " [...] <input type=\"button\" value=\"> " ._("See more...") .
//            "\" onclick=\"window.location.href='praxis.php?praxisID=".
//            $this->getPraxisID()."#description'\" />";

        if (isset($options)) {
            if ('App\Entity\Praxis' === $options['entity']) {
                $excerpt .=  ' [...] <input type="button" value="_(See more...)" onclick="window.location.href=\'practica\\' . $options['id'] . '\'" />';
            }
        }

        return $excerpt;
    }
}
