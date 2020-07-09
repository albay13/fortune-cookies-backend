<?php
namespace App\FortuneCookies\Repositories\Interfaces;

use App\Http\Requests\Api\FortuneUpdateRequest;


interface FortuneCookieRepoInterface{
    
    public function update(FortuneUpdateRequest $request, $fortune);
}