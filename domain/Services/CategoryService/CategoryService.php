<?php

namespace domain\Services\CategoryService;

use App\Models\Category;

class CategoryService
{
    public function __construct()
    {
        $this->categories = new Category();
    }

    public function all()
    {
        return $this->categories->all();
    }

    public function getActive()
    {
        return $this->categories->getActive();
    }

    public function totalCountOfVehicles()
    {
        return $this->categories->getActive()->count();
    }

    public function create(array $data)
    {
        return $this->categories->create($data);
    }

    public function get($category_id)
    {
        return $this->categories->find($category_id);
    }

    public function forRelated($category_id)
    {
        return $this->categories->forRelated($category_id);
    }

    public function update(array $data, $category_id)
    {
        $categories = $this->categories->find($category_id);
        $categories->update($this->edit($categories, $data));
    }

    protected function edit(Category $category, $data)
    {
        return array_merge($category->toArray(), $data);
    }


    public function delete($category_id)
    {
        return $this->categories->find($category_id)->delete();
    }

    public function changeStatus($category_id)
    {
        $categories = $this->categories->find($category_id);
        if ($categories->status == 0) {
            $categories->status = 1;
            $categories->update();
            return 1;
        } else {
            $categories->status = 0;
            $categories->update();
            return 0;
        }
    }
}
