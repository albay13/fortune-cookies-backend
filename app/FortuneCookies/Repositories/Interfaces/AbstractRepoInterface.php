<?php
namespace App\FortuneCookies\Repositories\Interfaces;


interface AbstractRepoInterface{
    
    public function findOrFail($id);

    public function paginate();
}