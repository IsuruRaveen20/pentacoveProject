<?php

namespace App\Http\Controllers;

use App\Traits\FormHelper;
use domain\Facades\ArticleFacade\ArticleFacade;
use domain\Facades\CategoryFacade\CategoryFacade;
use Illuminate\Http\Request;


class ArticleController extends ParentController
{
    use FormHelper;

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $response['articles'] = ArticleFacade::all();
        $response['tc'] = $this;
        return view('pages.articles.all')->with($response);
    }

    /**
     * create
     *
     * @return void
     */
    public function new()
    {
        $response['categories'] = CategoryFacade::all();
        $response['articles'] = ArticleFacade::all();
        return view('pages.articles.new')->with($response);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        ArticleFacade::create($request->all());
        $response['alert-success'] = 'Articles Created Successfully';
        return redirect()->route('articles.all')->with($response);
    }

    /**
     * view
     *
     * @param  mixed $article_id
     * @return void
     */
    public function view($article_id)
    {
        $response['article'] = ArticleFacade::get($article_id);
        $response['tc'] = $this;
        return view('pages.articles.show')->with($response);

    }

    /**
     * edit
     *
     * @param  mixed $article_id
     * @return void
     */
    public function edit($article_id)
    {
        $response['article'] = ArticleFacade::get($article_id);
        $response['tc'] = $this;
        return view('pages.articles.edit')->with($response);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $article_id
     * @return void
     */
    public function update(Request $request,$article_id)
    {
        ArticleFacade::update($request->all(), $article_id);
        $response['alert-success'] = 'Article updated Successfully';
        return redirect()->route('employees.all')->with($response);
    }

     /**
      * delete
      *
      * @param  mixed $article_id
      * @return void
      */
     public function delete($article_id)
    {
        ArticleFacade::delete($article_id);
        $response['alert-success'] = 'Article deleted successfully';
        return redirect()->back()->with($response);
    }

    /**
      * changeStatus
      *
      * @param  mixed $article_id
      * @return void
      */

    public function changeStatus($article_id)
    {
        $status = ArticleFacade::changeStatus($article_id);
        if ($status == 0) {
            $response['alert-success'] = 'Article Drafted successfully';
        }else {
            $response['alert-success'] = 'Article Published successfully';
        }
        return redirect()->back()->with($response);
    }

}
