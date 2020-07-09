<?php
namespace App\FortuneCookies\Repositories\Eloquent;

use App\Http\Resources\Api\Fortune as FortuneResource;
use App\Http\Requests\Api\FortuneUpdateRequest;
use App\FortuneCookies\Repositories\Eloquent\AbstractRepo;
use App\FortuneCookies\Repositories\Interfaces\FortuneCookieRepoInterface;


class FortuneCookieRepo extends AbstractRepo implements FortuneCookieRepoInterface{

    public function __construct(){
        parent::__construct('Api\\Fortune');
    }

    public function update(FortuneUpdateRequest $request, $fortune){
        $fortune->update($request->validated());

        return response()->json(new FortuneResource($fortune), 200);
    }

}