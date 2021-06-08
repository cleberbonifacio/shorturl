<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Urls;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class ShortUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($key)
    {
        if($key){
            //Find site URL
            $site = Urls::where('nova_url', $key)->first();

            if($site){
                $validade = strtotime($site->validade);
                $agora   = strtotime(now());
                if($validade < $agora){
                    return response()->json(['error' => 'Url vencida, tente novamente.'], 404);
                }
                return response()->json($site->antiga_url, 200);
            }else{
                return response()->json(['error' => 'URL não encontrada, tente novamente.'], 404);
            }
        }else{
            return response()->json(['error' => 'Algo deu errado, tente novamente.'], 404);
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($key)
    {

         //Get authenticated user
         $user = Auth::user();

         //Verify user authenticated
         if(!$user){
             return response()->json(['error' => 'Operação não permitida.'], 401);
         }

        //Get URL
        $antiga_url = $key;
        $nova_url = sprintf('%010X', mt_rand(0, 0xFFFFFFFFFF));

        // return response()->json(url("/api/$nova_url"), 200);

        if ($antiga_url || $nova_url) {

            try {
                //Save new url
                $dataUrl = [
                    'id_user' => $user->id,
                    'nova_url' => $nova_url,
                    'antiga_url' => $antiga_url,
                    'validade' => Carbon::now()->addMonth(),
                ];

                $urlSave = Urls::create($dataUrl);
            } catch (\Throwable $th) {
               return response()->json(['error' => 'Algo deu errado, tente novamente.'], 401);
            }

        }

        return response()->json(['success' =>  url("/api/$nova_url")], 200);

    }

}
