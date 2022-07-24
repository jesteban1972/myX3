<?php

namespace App\Controller;

use App\Entity\Praxis;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KalimaController extends AbstractController
{
    private const MAX_EXCERPT_LENGTH = 510; // default 510 chars

    #[Route('/kalima', name: 'app_kalima')]
    public function index(): Response
    {
        return $this->render('kalima/index.html.twig', [
            'controller_name' => 'KalimaController',
        ]);
    }

    public function getCombinedDescription($amor): string
    {
        $allDescriptions = [
            1 => $amor->getDescription1(),
            2 => $amor->getDescription2(),
            3 => $amor->getDescription3(),
            4 => $amor->getDescription4(),
        ];

        $combinedDescription = '';

        foreach ($allDescriptions as $key => $description) {
            if (isset($description)) {
                $combinedDescription .= 1 !== $key ? '. ' : '';
                $combinedDescription .= $description;
            }
        }

        return $combinedDescription;
    }

    public function fetchExcerpt(Praxis $praxis): string
    {
        $rawText = $praxis->getDescription();

        if (strlen($rawText) < self::MAX_EXCERPT_LENGTH) {
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
        $excerpt .=  ' [...] <input type="button" value="_("See more...")" onclick="window.location.href=\'practica\\' . $praxis->getId() . '\'" />';

        return $excerpt;
    }
}
