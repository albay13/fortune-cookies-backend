<?php
namespace App\FortuneCookies\Repositories\Eloquent;

use App\FortuneCookies\Repositories\Interfaces\AbstractRepoInterface;


class AbstractRepo implements AbstractRepoInterface{
    
    protected $_model;
    
    public function __construct(string $model){
        $this->model = "App\\Models\\$model";
    }

    public function findOrFail($id, $model = null){
        return $this->model::findOrfail($id);
    }

    public function paginate(){
        return $this->model::paginate(100);    
    }
}