<?php

namespace domain\Services\ArticleService;

use App\Models\Article;
use infrastructure\Facades\ImagesFacade;

class ArticleService
{
    public function __construct()
    {
        $this->articles = new Article();
    }

    public function all()
    {
        return $this->articles->all();
    }

    public function getActive()
    {
        return $this->articles->getActive();
    }

    public function totalCountOfUsers()
    {
        return $this->articles->getActive()->count();
    }

    public function create(array $data)
    {
        // dd($data);
        // return $this->articles->create($data);
        if (isset($data['images'])) {
            $image = ImagesFacade::store($data['images'], [1,2,3,4,5]);
            $data['image'] = $image['created_images']->id;
        }
        return $this->articles->create($data);
    }

    public function get($article_id)
    {
        return $this->articles->find($article_id);
    }

    public function forRelated($article_id)
    {
        return $this->articles->forRelated($article_id);
    }


    public function update(array $data, $article_id)
    {
        $articles = $this->articles->find($article_id);
        $articles->update($this->edit($articles, $data));
    }

    protected function edit(Article $articles, $data)
    {
        return array_merge($articles->toArray(), $data);
    }


    public function delete($article_id)
    {
        return $this->articles->find($article_id)->delete();
    }

    public function changeStatus($article_id)
    {
        $articles = $this->articles->find($article_id);
        if ($articles->status == 0) {
            $articles->status = 1;
            $articles->update();
            return 1;
        } else {
            $articles->status = 0;
            $articles->update();
            return 0;
        }
    }
}
