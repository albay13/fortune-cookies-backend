<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\FortuneUpdateRequest;
use App\Http\Resources\Api\Fortune as FortuneResource;
use App\FortuneCookies\Repositories\Interfaces\FortuneCookieRepoInterface;

class FortuneCookieController extends Controller
{
    protected $_fortuneCookies;

    public function __construct(FortuneCookieRepoInterface $_fortuneCookies){
        $this->_fortuneCookies = $_fortuneCookies;
    }

    public function index(){
        try{
            FortuneResource::withoutWrapping();
            return FortuneResource::collection($this->_fortuneCookies->paginate());
        }catch(\Exception $e){
            return response()->json($e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        //
    }

    public function update(FortuneUpdateRequest $request, $id)
    {   
        $fortune = $this->_fortuneCookies->findOrFail($id);
        DB::beginTransaction();
        try{
            DB::commit();
            return $this->_fortuneCookies->update($request, $fortune);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
