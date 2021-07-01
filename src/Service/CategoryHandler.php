<?php

namespace App\Service;

use App\Repository\CategoryRepository;

class CategoryHandler
{

    public function handle(array $categories): array
    {
        $colors = [
            "Mélodique" => "danger",
            "Industrielle" => "info",
            "Groovy" => "secondary",
            "Deep" => "warning",
            "Détroit" => "success"
        ];

        foreach($categories as $category) {
            $category->setColor($colors[$category->getLabel()]);
        }

        return $categories;
    }

}