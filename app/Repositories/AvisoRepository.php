<?php

namespace App\Repositories;

use App\Models\Aviso;
use InfyOm\Generator\Common\BaseRepository;
use GuzzleHttp\Client as Client;

/**
 * Class AvisoRepository.
 * @version August 2, 2017, 11:09 pm UTC
 *
 * @method Aviso findWithoutFail($id, $columns = ['*'])
 * @method Aviso find($id, $columns = ['*'])
 * @method Aviso first($columns = ['*'])
 */
class AvisoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'texto',
        'user_id',
        'cliente_id',
        'titulo_id',
        'status',
        'estado',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Aviso::class;
    }

    /**
     * Enviar o AVISO e conecta na API
     * @param  [type] $aviso [description]
     * @return [type]        [description]
     */
    public function enviarAviso($aviso)
    {
        $client = new Client(['base_uri' => 'https://api-rest.zenvia360.com.br/services/']); //GuzzleHttp\Client

        $result = $client->request('POST', 'send-sms',

            [
                'headers' => [
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Basic YnJpdHRvOkpCM0R1T1lCbnc=',
                    'Accept'        => 'application/json',
                ],
                'json' => [
                    'sendSmsRequest' => [
                        'from'           => $aviso['titulo'],
                        'to'             => '55'.$aviso['to'],
                        'msg'            => $aviso['texto'],
                        'callbackOption' => 'NONE',
                        'aggregateId'    => $aviso['id'],
                    ],
                ],
            ]
        );


        $result->getStatusCode();
        $response = $result->getBody();

        return $result->getStatusCode();
    }
}
