<?php

namespace App\Services;

class Devs4
{

    private static $client;
    private static $base_uri = 'https://www.4devs.com.br/';
    public static $sexo = ['H' => 'Masculino', 'M' => 'Feminino'];
    public static $choices_sexo = ['1' => 'H', '2' => 'M'];
    public static $choices_empresa = [
        '1'  => ['CHESF','8132292000'],
        '2'  => ['COMPESA','8131815039'],
        '3'  => ['ALIMENTACAO PERFEITA NORDESTE LTDA','8130341105'],
        '4'  => ['SUPERMERCADOS BOMPRECO','8134989900'],
        '5'  => ['HIPERCARD BANCO MULTIPLO S.A.','8130033030'],
        '6'  => ['RAPIDAO COMETA','8140625465'],
        '7'  => ['DROGARIA GUARARAPES BRASIL S/A','8130342657'],
        '8'  => ['VOTORANTIM CIMENTOS N/NE S/A','8136777300'],
        '9'  => ['CELPE','8132176000'],
        '10' => ['JCPM PARTICIPACOES E EMPREENDIMENTOS S.A','8121272000'],
        '11' => ['CONEPAR S/A','8133732200'],
        '12' => ['BRENNAND ENERGIA S/A','8121377000'],
        '13' => ['GL EMPREENDIMENTOS LTDA.','8138786000'],
        '14' => ['ICAL PARTICIPACOES S/A','8132724444'],
        '15' => ['INTERLIGACAO ELETRICA GARANHUNS S/A','8130497171'],
        '16' => ['VIVIX VIDROS PLANOS','8133511799'],
        '17' => ['BCPAR S.A.','8125445058'],
        '18' => ['FACULDADE MAURICIO DE NASSAU','8134134611'],
        '19' => ['RIOMAR SHOPPING S.A','8138780000'],
        '20' => ['MOURA DUBEUX ENGENHARIA S/A','8140203538'],
    ];

    public static function getPerson($sexo = '', $idade = '', $pontuacao = 'N', $estado = '', $cidade = ''){
        //Define opções(cabecálhos e paramentros do formulário)
        $options = [
            'headers' => [
                'X-Requested-With' => 'XMLHttpRequest',
            ],
            'form_params' => [
            'acao' => 'gerar_pessoa',
            'sexo' => $sexo,
            'idade' => $idade,
            'pontuacao' => $pontuacao,
            'cep_estado' => $estado,
            'cep_cidade' => $cidade,
            ],
        ];
        //Efetua a requisição POST
        $response = self::getClient()->request('POST', "/ferramentas_online.php", $options);
        if ($response->getStatusCode() == 200){
            $json = $response->getBody()->getContents();
            $person = json_decode($json);
        } else {
            $person = [];
        }
        //Retorna o resultado
        return $person;
    }

    public static function swithSex($sexo){
        $s = '';
        if ($sexo == 'H'){
            $s = 'M';
        } else {
            $s = 'H';
        }
        return $s;
    }

    private static function getClient(){
        if (is_null(self::$client)){
            self::$client = new \GuzzleHttp\Client([
                'base_uri' => self::$base_uri,
            ]);
            //$client->setDefaultOption('headers', array('X-Requested-With' => 'XMLHttpRequest'));
        }
        return self::$client;
    }

}
