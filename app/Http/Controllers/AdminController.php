<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Diretor;
use App\Models\Category;
use App\Models\ObraAudiovisual;
use App\Models\Video;
use App\Models\Episodio;

class AdminController extends Controller
{

  public static function Notification($information)
  {
      \Log::debug(print_r($information->getStatus()->getCode(), 1));
  }
    public function index()
    {
        $usuarios = User::all();
        $diretores = Diretor::all();
        $categorias = Category::all();
        $obras = ObraAudiovisual::all();
        $videos = Video::all();

        return view('admin', compact('usuarios', 'diretores', 'categorias', 'obras','videos'));
    }

    public function view($id)
    {
        $usuarios = User::all();
        $diretores = Diretor::all();
        $categorias = Category::all();
        $obras = ObraAudiovisual::where("id", $id)->first();
        $videos = Video::all();
        $episodios = Episodio::all();

        return view('visualizacao', compact('episodios','usuarios', 'diretores', 'categorias', 'obras','videos'));
    }
    
    public function API($id)
    {
      $plano = '';
      $user  = Auth::user();
      switch ($id) {
        case 1:
          $plano = 'PLAN_583F7452-5218-4346-9E13-4825477449FA';
          break;
        
        case 2:
          $plano = 'PLAN_15762B1B-C939-4FF0-A45E-F0A3CF8148B2';
          break;
        case 3:
          $plano = 'PLAN_8A7EA9E0-3F1B-4F60-9FE2-B608A3CC83E4';
          break;
      }
      $curl = curl_init();

      curl_setopt_array($curl, [
        CURLOPT_URL => "https://sandbox.api.assinaturas.pagseguro.com/subscriptions",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
          'plan' => [
              'id' => $plano
          ],
          'customer' => [
              'reference_id' => $user->id,
              'email' => $user->email,
              'name' => $user->nome,
              'tax_id' => '08467547898',
              'phones' => [[
                'country' => '55',
                'area' => '14',
                'number' => '996100262'
              ]],
              'billing_info' => [[
                'card' => [
                  'holder' => [
                    'name' => $user->nome,
                    'birth_date' => '2002-05-20',
                    'tax_id' => '08467547898'
                  ],
                  'number' => '4012001037141112',
                  'exp_year' => '2026',
                  'exp_month' => '12',
                  'security_code' => 123
                ],
                'type' => 'CREDIT_CARD'
              ]]
          ],
          'reference_id' => '1',
          'payment_method' => [[
            'type' => 'CREDIT_CARD',
              'card' => [
                'security_code' => 123
              ]
          ]]
        ]),
        CURLOPT_HTTPHEADER => [
          "Authorization: 57249f92-8bbb-49a4-90e7-3d803b5672fd62b06e904d4e8cbf5341da9b5078e316f1f0-5e5c-4930-8da6-3f82c28498db",
          "accept: application/json",
          "content-type: application/json"
        ],
      ]);

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        dd("cURL Error #:" . $err);
      } else {
        dd($response);
      }
    }
}
