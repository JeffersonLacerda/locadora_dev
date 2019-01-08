<?php

use Illuminate\Database\Seeder;
use App\Models\Distributor;

class DistributorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Distributor::create([
            'cnpj' => '06944183000180', 
            'corporate_name' => 'Nordeste Distribuidora De Fitas de Video e DVDs Ltda', 
            'contact_name' => 'Márcia Cecília Cavalcanti', 
            'contact_phone' => '(85) 3307-9000', 
            'place' => 'Rua J da Penha', 
            'number' => '662', 
            'complement' => '', 
            'district' => 'Centro', 
            'city' => 'Fortaleza', 
            'state' => 'CE', 
            'country' => 'Brasil', 
            'cep' => '60110120',
        ]);
        Distributor::create([
            'cnpj' => '03918609000132', 
            'corporate_name' => 'Wmix Distribuidora Ltda', 
            'contact_name' => 'Tiago Vinicius Sales', 
            'contact_phone' => '(48) 3035-9700', 
            'place' => 'Av. Brigadeiro da Silva Paes', 
            'number' => '225', 
            'complement' => '', 
            'district' => 'Campinas', 
            'city' => 'São José', 
            'state' => 'SC', 
            'country' => 'Brasil', 
            'cep' => '88101250',
        ]);
        Distributor::create([
            'cnpj' => '31039404000112', 
            'corporate_name' => 'Zero Vídeo Distribuidora', 
            'contact_name' => 'Samuel Ryan Rocha', 
            'contact_phone' => '(51) 3225-3223', 
            'place' => 'Av. Farrapos', 
            'number' => '929', 
            'complement' => '', 
            'district' => 'Floresta', 
            'city' => 'Porto Alegre', 
            'state' => 'RS', 
            'country' => 'Brasil', 
            'cep' => '90220004'
        ]);
        Distributor::create([
            'cnpj' => '15263576000119', 
            'corporate_name' => 'Livres Distribuidora De Audiovisual Ltda', 
            'contact_name' => 'Caio Daniel Porto', 
            'contact_phone' => '(21) 2623-7775', 
            'place' => 'R Das Laranjeiras', 
            'number' => '457', 
            'complement' => 'Apto 601 - Bloco B', 
            'district' => 'Laranjeiras', 
            'city' => 'Rio De Janeiro', 
            'state' => 'RJ', 
            'country' => 'Brasil', 
            'cep' => '22240005'
        ]);
        Distributor::create([
            'cnpj' => '10681698000101', 
            'corporate_name' => 'Tucuman Distribuidora De Filmes Ltda', 
            'contact_name' => 'Allana Sophia Costa', 
            'contact_phone' => '(21) 3759-7022', 
            'place' => 'R Alcindo Guanabara', 
            'number' => '24', 
            'complement' => 'Sala 1803', 
            'district' => 'Centro', 
            'city' => 'Rio De Janeiro', 
            'state' => 'RJ', 
            'country' => 'Brasil', 
            'cep' => '20031915',
        ]);
        Distributor::create([
            'cnpj' => '06987687000187', 
            'corporate_name' => 'Fallms Entretenimento Distribuidora De Filmes Ltda', 
            'contact_name' => 'Nair Yasmin Rezende', 
            'contact_phone' => '(11) 2749-8028', 
            'place' => 'Av Eng. Luis Gomes Cardim Sangirardi', 
            'number' => '358', 
            'complement' => '', 
            'district' => 'Vila Mariana ', 
            'city' => 'Sao Paulo', 
            'state' => 'SP', 
            'country' => 'Brasil', 
            'cep' => '04112080',
        ]);
        Distributor::create([
            'cnpj' => '63121315000107', 
            'corporate_name' => 'Europa Filmes', 
            'contact_name' => 'Sarah Julia da Luz', 
            'contact_phone' => '(11) 2612-9261', 
            'place' => 'Avenida Ipanema', 
            'number' => '165', 
            'complement' => '17º andar Sala 01', 
            'district' => 'Alphaville', 
            'city' => 'Barueri', 
            'state' => 'SP', 
            'country' => 'Brasil', 
            'cep' => '06472002',
        ]);
        Distributor::create([
            'cnpj' => '63296355000190', 
            'corporate_name' => 'DVD World', 
            'contact_name' => 'Cauê Paulo Corte Real', 
            'contact_phone' => '(11) 3044-0700', 
            'place' => 'Praça Guom', 
            'number' => '879', 
            'complement' => 'Zona Leste', 
            'district' => 'Jardim São Luís', 
            'city' => 'São Paulo', 
            'state' => 'SP', 
            'country' => 'Brasil', 
            'cep' => '08121050',
        ]);
        Distributor::create([
            'cnpj' => '18093502000170', 
            'corporate_name' => 'Vídeo Perola', 
            'contact_name' => 'Vanessa Sandra Fogaça', 
            'contact_phone' => '(18) 3304-6866', 
            'place' => 'Rua tibiriça', 
            'number' => '582', 
            'complement' => '', 
            'district' => 'Jardin América Araçatuba', 
            'city' => 'São Paulo', 
            'state' => 'SP', 
            'country' => 'Brasil', 
            'cep' => '16071000',
        ]);
    }
}
