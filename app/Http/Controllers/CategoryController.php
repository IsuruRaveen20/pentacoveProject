<?php

namespace App\Http\Controllers;

use App\Traits\FormHelper;
use domain\Facades\CategoryFacade\CategoryFacade;
use Illuminate\Http\Request;

class CategoryController extends ParentController
{
    use FormHelper;

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $response['categories']= CategoryFacade::all();
        $response['tc'] = $this;
        return view('pages.categories.all')->with($response);
    }

    /**
     * create
     *
     * @return void
     */
    public function new()
    {
        return view('pages.categories.new');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        CategoryFacade::create($request->all());
        $response['alert-success'] = 'Category added successfully';
        return redirect()->back()->with($response);
    }

    /**
     * edit
     *
     * @param  mixed $category_id
     * @return void
     */
    public function edit($category_id)
    {
        $response['category'] = CategoryFacade::get($category_id);
        $response['tc'] = $this;
        return view('pages.categories.edit')->with($response);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $category_id
     * @return void
     */
    public function update(Request $request,$category_id)
    {
        CategoryFacade::update($request->all(), $category_id);
        $response['alert-success'] = 'Category updated Successfully';
        return redirect()->route('categories.all')->with($response);
    }

    /**
     * delete
     *
     * @param  mixed $category_id
     * @return void
     */
    public function delete($category_id)
    {
        CategoryFacade::delete($category_id);
        $response['alert-success'] = 'Category deleted successfully';
        return redirect()->back()->with($response);
    }

    public function changeStatus($category_id)
    {
        $status = CategoryFacade::changeStatus($category_id);
        if ($status == 1) {
            $response['alert-success'] = 'Category Published successfully';
        }else {
            $response['alert-success'] = 'Category Drafted successfully';
        }
        return redirect()->back()->with($response);
    }

}
