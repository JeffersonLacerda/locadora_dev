<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\Util;

class UtilTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testArrayToString()
    {
        $a1 = ['Jobson', 'Wellyson', 'Fernando', 'Anderson'];
        $a2 = ['Carro', 'Moto', 'Avião'];
        $a3 = [];
        $a4 = [
            ['nome'=>'Jobson', 'cargo' => 'Desenvolvedor'],
            ['nome'=>'Wellyson', 'cargo' => 'Desenvolvedor'],
            ['nome'=>'Fernando', 'cargo' => 'Gerente'],
            ['nome'=>'Anderson', 'cargo' => 'Analista de requisitos']
        ];

        $t1 = Util::array_to_string($a1);
        $t2 = Util::array_to_string($a2);
        $t3 = Util::array_to_string($a3);
        $t4 = Util::array_to_string($a4, 'nome');
        $t5 = Util::array_to_string($a4, 'cargo');
        $t6 = Util::array_to_string($a4, 'nome', ['cargo', 'Desenvolvedor']);
        $t7 = Util::array_to_string($a4, 'setor');
        $t8 = Util::array_to_string($a4, 'nome', ['setor', 'Desenvolvedor']);
        $t9 = Util::array_to_string($a4, 'nome', ['cargo', 'Desenvolvimento']);

        $this->assertEquals($t1, 'Jobson, Wellyson, Fernando, Anderson');
        $this->assertEquals($t2, 'Carro, Moto, Avião');
        $this->assertEquals($t3, '');
        $this->assertEquals($t4, 'Jobson, Wellyson, Fernando, Anderson');
        $this->assertEquals($t5, 'Desenvolvedor, Desenvolvedor, Gerente, Analista de requisitos');
        $this->assertEquals($t6, 'Jobson, Wellyson');
        $this->assertEquals($t7, '');
        $this->assertEquals($t8, '');
        $this->assertEquals($t9, '');
    }    

    public function testSameSurname()
    {
        $t1 = Util::same_surname('Jobson Tenório do Nascimento','Joane Maria Miranda Tenório');
        $t2 = Util::same_surname('Juliene Maria Miranda Tenório','Joane Maria Miranda Tenório');
        $t3 = Util::same_surname('Paulo José da Silva','Carlos Vieira da Silva');
        $t4 = Util::same_surname('Vinicius Heitor Lopes','Tiago Rodrigo Lopes');
        $t5 = Util::same_surname('Maria Ieda Lima da Silva','Juciaria Lima da Silva');
        
        $this->assertEquals($t1, 'Tenório');
        $this->assertEquals($t2, 'Maria Miranda Tenório');
        $this->assertEquals($t3, 'da Silva');
        $this->assertEquals($t4, 'Lopes');
        $this->assertEquals($t5, 'Lima da Silva');
    }

    public function testChangeSurname()
    {
        $t1 = Util::change_surname('Jobson Carvalho Farias', 'Tenório do Nascimento');
        $t2 = Util::change_surname('Joane Maria de Oliveira Silva', 'Miranda Tenório');
        $t3 = Util::change_surname('Maria Ieda Alves Feitosa', 'Lima da Silva');
        $t4 = Util::change_surname('João Paulo Cavalcanti', 'Pereira do Nascimento');
        $t5 = Util::change_surname('Wellyson Fernando Paiva Neto', 'Nunes Souza');

        $this->assertEquals($t1, 'Jobson Tenório do Nascimento');
        $this->assertEquals($t2, 'Joane Maria Miranda Tenório');
        $this->assertEquals($t3, 'Maria Ieda Lima da Silva');
        $this->assertEquals($t4, 'João Pereira do Nascimento');
        $this->assertEquals($t5, 'Wellyson Fernando Nunes Souza');
    }

}
