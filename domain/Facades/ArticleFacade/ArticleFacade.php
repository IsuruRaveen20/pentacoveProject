<?php

namespace domain\Facades\ArticleFacade;

use domain\Services\ArticleService\ArticleService;
use Illuminate\Support\Facades\Facade;

class ArticleFacade extends Facade{

    protected static function getFacadeAccessor()
    {
        return ArticleService::class;
    }
}
