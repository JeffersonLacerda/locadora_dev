<?php

use Illuminate\Database\Seeder;
use App\Models\Holder;
use App\Models\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // -- Titular 1:
        $client = Client::create([
            'name' => 'Maria Josefa dos Santos',
            'email' => 'mariajosefadossantos_@arablock.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1969-08-12',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '41687141444',
            'place' => 'Rua Oscar Mariano da Silva',
            'number' => '857',
            'complement' => '',
            'district' => 'Nossa Senhora das Dores',
            'city' => 'Caruaru',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'SUPERMERCADOS BOMPRECO',
            'home_phone' => '8137618652',
            'cell_phone' => '81996249719',
            'work_phone' => '8134989900',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 1:
        Client::create([
            'name' => 'Juan dos Santos',
            'email' => 'juanruancastro_@yahoo.se',
            'gender' => 'Masculino',
            'birth_date' => '1964-03-07',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Letícia Cláudia dos Santos',
            'email' => 'lleticiaclaudiamaludossantos@openlink.com.br',
            'gender' => 'Feminino',
            'birth_date' => '2002-12-15',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 2:
        $client = Client::create([
            'name' => 'Elias Enrico Nicolas Aparício',
            'email' => 'eliasenriconicolasaparicio__eliasenriconicolasaparicio@htomail.com',
            'gender' => 'Masculino',
            'birth_date' => '1981-05-10',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '75326389444',
            'place' => 'Rua Antônio Dias de Araújo',
            'number' => '269',
            'complement' => '',
            'district' => 'São Miguel',
            'city' => 'Arcoverde',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'CHESF',
            'home_phone' => '8738870690',
            'cell_phone' => '87984755765',
            'work_phone' => '8132292000',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 2:
        Client::create([
            'name' => 'Manuela Isabelly Aparício',
            'email' => 'manuelaisabellylaradacosta_@randstad.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1986-05-12',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 3:
        $client = Client::create([
            'name' => 'César Gael Pietro Silveira',
            'email' => 'cesargaelpietrosilveira_@pozzer.net',
            'gender' => 'Masculino',
            'birth_date' => '1962-04-17',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '49520194460',
            'place' => 'Rua Cariri',
            'number' => '884',
            'complement' => '',
            'district' => 'Barra de Jangada',
            'city' => 'Jaboatão dos Guararapes',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'BRENNAND ENERGIA S/A',
            'home_phone' => '8136250685',
            'cell_phone' => '81985504573',
            'work_phone' => '8121377000',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 3:
        Client::create([
            'name' => 'Benedita Silveira',
            'email' => 'beneditabetinaferreira-99@temavonfeccaosjc.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1960-01-19',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Nicolas Silveira',
            'email' => 'nicolasrodrigolima-80@fiorecomunicacao.com.br',
            'gender' => 'Masculino',
            'birth_date' => '2001-01-06',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Fabiana Silveira',
            'email' => 'fabianajulianamelo__fabianajulianamelo@tce.sp.gov.br',
            'gender' => 'Feminino',
            'birth_date' => '2004-10-17',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 4:
        $client = Client::create([
            'name' => 'Gael Vinicius Osvaldo Assis',
            'email' => 'gaelviniciusosvaldoassis_@patriciagrillo.adv.br',
            'gender' => 'Masculino',
            'birth_date' => '1969-10-11',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '99913129435',
            'place' => 'Rua Bulandy',
            'number' => '499',
            'complement' => '',
            'district' => 'Várzea',
            'city' => 'Recife',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'JCPM PARTICIPACOES E EMPREENDIMENTOS S.A',
            'home_phone' => '8125221980',
            'cell_phone' => '81991565916',
            'work_phone' => '8121272000',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 4:
        Client::create([
            'name' => 'Benedita Vinicius Assis',
            'email' => 'beneditaterezafarias__beneditaterezafarias@gdsambiental.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1971-01-12',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Luan Vinicius Assis',
            'email' => 'luanfabiocampos..luanfabiocampos@mpc.com.br',
            'gender' => 'Masculino',
            'birth_date' => '2001-09-26',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Marina Vinicius Assis',
            'email' => 'mmarinarayssapeixoto@tradevalle.com.br',
            'gender' => 'Feminino',
            'birth_date' => '2010-10-04',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 5:
        $client = Client::create([
            'name' => 'Isabel Jennifer Adriana da Silva',
            'email' => 'isabeljenniferadrianadasilva_@vpsa.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1979-11-05',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '90721444490',
            'place' => 'Rua Projetada',
            'number' => '980',
            'complement' => '',
            'district' => 'São Cristóvão',
            'city' => 'Arcoverde',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'INTERLIGACAO ELETRICA GARANHUNS S/A',
            'home_phone' => '8725359379',
            'cell_phone' => '87992508784',
            'work_phone' => '8130497171',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 5:
        Client::create([
            'name' => 'Emanuel Hugo da Silva',
            'email' => 'emanuelhugocarlosribeiro__emanuelhugocarlosribeiro@danielstrauch.com',
            'gender' => 'Masculino',
            'birth_date' => '1980-01-04',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 6:
        $client = Client::create([
            'name' => 'Ian Nelson Manuel Rocha',
            'email' => 'iannelsonmanuelrocha-72@eldor.it',
            'gender' => 'Masculino',
            'birth_date' => '1972-09-06',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '21780911483',
            'place' => 'Rua da Hematita',
            'number' => '675',
            'complement' => '',
            'district' => 'Dom Avelar',
            'city' => 'Petrolina',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'SUPERMERCADOS BOMPRECO',
            'home_phone' => '8736426598',
            'cell_phone' => '87999530001',
            'work_phone' => '8134989900',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 6:
        Client::create([
            'name' => 'Amanda Rocha',
            'email' => 'amandaisabelmartins__amandaisabelmartins@petcamp.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1968-12-09',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 7:
        $client = Client::create([
            'name' => 'Priscila Vera da Mota',
            'email' => 'priscilaveradamota_@zyb.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1993-05-26',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '97548263406',
            'place' => 'Rua Boa Sorte',
            'number' => '625',
            'complement' => '',
            'district' => 'Curado',
            'city' => 'Jaboatão dos Guararapes',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'JCPM PARTICIPACOES E EMPREENDIMENTOS S.A',
            'home_phone' => '8136347516',
            'cell_phone' => '81981902473',
            'work_phone' => '8121272000',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 7:
        // -- Titular 8:
        $client = Client::create([
            'name' => 'Giovanni Bryan Victor Barbosa',
            'email' => 'giovannibryanvictorbarbosa_@procivil.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1963-08-20',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '38010595454',
            'place' => 'Rua Conselheiro Peretti',
            'number' => '437',
            'complement' => '',
            'district' => 'Casa Amarela',
            'city' => 'Recife',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'RIOMAR SHOPPING S.A',
            'home_phone' => '8127454129',
            'cell_phone' => '81984642559',
            'work_phone' => '8138780000',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 8:
        Client::create([
            'name' => 'Allana Mirella Barbosa',
            'email' => 'allanamirellavitoriapires-84@dhl.com',
            'gender' => 'Feminino',
            'birth_date' => '1959-07-02',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Geraldo Hugo Barbosa',
            'email' => 'geraldohugoigormoraes..geraldohugoigormoraes@riguetti.com.br',
            'gender' => 'Masculino',
            'birth_date' => '2005-09-04',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Alessandra Luna Barbosa',
            'email' => 'alessandralunalizdepaula-97@igi.com.br',
            'gender' => 'Feminino',
            'birth_date' => '2007-04-27',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 9:
        $client = Client::create([
            'name' => 'Giovanna Agatha Maitê da Mota',
            'email' => 'ggiovannaagathamaitedamota@truckeixo.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1996-10-20',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '36408134483',
            'place' => 'Rua da Leoa',
            'number' => '396',
            'complement' => '',
            'district' => 'Dom Avelar',
            'city' => 'Petrolina',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'INTERLIGACAO ELETRICA GARANHUNS S/A',
            'home_phone' => '8739111265',
            'cell_phone' => '87984602067',
            'work_phone' => '8130497171',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 9:
        Client::create([
            'name' => 'Fernando da Mota',
            'email' => 'ffernandojoaoaraujo@malosti.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1996-09-03',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 10:
        $client = Client::create([
            'name' => 'Kevin Murilo da Rosa',
            'email' => 'kevinmurilodarosa__kevinmurilodarosa@cfaraujo.eng.br',
            'gender' => 'Masculino',
            'birth_date' => '1960-04-17',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '11468923498',
            'place' => 'Rua São Francisco',
            'number' => '935',
            'complement' => '',
            'district' => 'Centro',
            'city' => 'Igarassu',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'SUPERMERCADOS BOMPRECO',
            'home_phone' => '8126836866',
            'cell_phone' => '81998104456',
            'work_phone' => '8134989900',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 10:
        Client::create([
            'name' => 'Sarah Francisca da Rosa',
            'email' => 'ssarahfranciscalunaviana@salvagninigroup.com',
            'gender' => 'Feminino',
            'birth_date' => '1955-11-26',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'João Diogo da Rosa',
            'email' => 'joaodiogocalebsales-88@marcofaria.com',
            'gender' => 'Masculino',
            'birth_date' => '2001-12-24',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Nina Carolina da Rosa',
            'email' => 'ninacarolinacarolinabarbosa-81@platinium.com.br',
            'gender' => 'Feminino',
            'birth_date' => '2007-06-01',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 11:
        $client = Client::create([
            'name' => 'Yuri Rafael Farias',
            'email' => 'yurirafaelfarias..yurirafaelfarias@tvglobo.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1985-08-05',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '63574952473',
            'place' => 'Rua Canadá',
            'number' => '626',
            'complement' => '',
            'district' => 'Chã da Tábua',
            'city' => 'São Lourenço da Mata',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'CELPE',
            'home_phone' => '8138740605',
            'cell_phone' => '81992406686',
            'work_phone' => '8132176000',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 11:
        Client::create([
            'name' => 'Isabelly Isabela Farias',
            'email' => 'isabellyisabeladarosa-99@agenciadbd.com',
            'gender' => 'Feminino',
            'birth_date' => '1982-01-25',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 12:
        $client = Client::create([
            'name' => 'Julio Raul da Rosa',
            'email' => 'juliorauldarosa..juliorauldarosa@leoshehtman.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1962-09-15',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '85741516459',
            'place' => 'Rua Arquiteto Luiz Nunes',
            'number' => '536',
            'complement' => '',
            'district' => 'Imbiribeira',
            'city' => 'Recife',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'MOURA DUBEUX ENGENHARIA S/A',
            'home_phone' => '8126139588',
            'cell_phone' => '81993381985',
            'work_phone' => '8140203538',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 12:
        Client::create([
            'name' => 'Carolina da Rosa',
            'email' => 'carolinavitoriavieira..carolinavitoriavieira@rafaelsouza.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1957-10-05',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Diego da Rosa',
            'email' => 'diegodanilobarros..diegodanilobarros@salera.com.br',
            'gender' => 'Masculino',
            'birth_date' => '2001-06-04',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 13:
        $client = Client::create([
            'name' => 'Isadora Marlene de Paula',
            'email' => 'isadoramarlenedepaula_@doublesp.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1968-04-27',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '16258565476',
            'place' => 'Rua Ibicare',
            'number' => '963',
            'complement' => '',
            'district' => 'Guararapes',
            'city' => 'Jaboatão dos Guararapes',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'INTERLIGACAO ELETRICA GARANHUNS S/A',
            'home_phone' => '8135374743',
            'cell_phone' => '81987180943',
            'work_phone' => '8130497171',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 13:
        Client::create([
            'name' => 'Luan Yago de Paula',
            'email' => 'lluanyagohugoaragao@ceuazul.ind.br',
            'gender' => 'Masculino',
            'birth_date' => '1967-12-08',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Kamilly Sophia de Paula',
            'email' => 'kkamillysophiastellamoura@osite.com.br',
            'gender' => 'Feminino',
            'birth_date' => '2008-09-17',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Carlos Bernardo de Paula',
            'email' => 'carlosbernardocarloseduardodaconceicao_@effem.com',
            'gender' => 'Masculino',
            'birth_date' => '2005-10-03',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 14:
        $client = Client::create([
            'name' => 'Anderson Vinicius Carlos Eduardo Oliveira',
            'email' => 'aandersonviniciuscarloseduardooliveira@tecsysbrasil.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1973-02-05',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '09089374400',
            'place' => 'Rua Felisburgo',
            'number' => '962',
            'complement' => '',
            'district' => 'Nova Descoberta',
            'city' => 'Recife',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'RIOMAR SHOPPING S.A',
            'home_phone' => '8125043628',
            'cell_phone' => '81996403883',
            'work_phone' => '8138780000',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 14:
        Client::create([
            'name' => 'Vera Maya Oliveira',
            'email' => 'vveramayateresinhafreitas@agenciadbd.com',
            'gender' => 'Feminino',
            'birth_date' => '1968-07-27',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Osvaldo Oliveira',
            'email' => 'osvaldoiagobarbosa_@aclnet.com.br',
            'gender' => 'Masculino',
            'birth_date' => '2006-01-05',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 15:
        $client = Client::create([
            'name' => 'Heitor Manoel Freitas',
            'email' => 'hheitormanoelfreitas@imail.com',
            'gender' => 'Masculino',
            'birth_date' => '1959-01-22',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '36912034420',
            'place' => 'Rua Algaroba',
            'number' => '401',
            'complement' => '',
            'district' => 'Alto São Miguel',
            'city' => 'Abreu e Lima',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'RAPIDAO COMETA',
            'home_phone' => '8129328521',
            'cell_phone' => '81999657661',
            'work_phone' => '8140625465',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 15:
        Client::create([
            'name' => 'Sophia Eloá Manoel Freitas',
            'email' => 'sophiaeloahadassadacosta__sophiaeloahadassadacosta@kantoferramentaria.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1955-07-05',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Breno Giovanni Manoel Freitas',
            'email' => 'bbrenogiovanniianmartins@fulltransport.com.br',
            'gender' => 'Masculino',
            'birth_date' => '2009-02-21',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Teresinha Manoel Freitas',
            'email' => 'tteresinhaoliviamoreira@jglima.com.br',
            'gender' => 'Feminino',
            'birth_date' => '2010-11-09',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 16:
        $client = Client::create([
            'name' => 'Bryan Fernando Rafael Ribeiro',
            'email' => 'bryanfernandorafaelribeiro-82@onset.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1997-07-01',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '12160395420',
            'place' => 'Rua Padre Germano',
            'number' => '386',
            'complement' => '',
            'district' => 'COHAB',
            'city' => 'Recife',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'VIVIX VIDROS PLANOS',
            'home_phone' => '8125937220',
            'cell_phone' => '81986968332',
            'work_phone' => '8133511799',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 16:
        // -- Titular 17:
        $client = Client::create([
            'name' => 'Julio Heitor Assunção',
            'email' => 'julioheitorassuncao__julioheitorassuncao@terrabrasil.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1999-04-03',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '36020922405',
            'place' => 'Rua Munhoz',
            'number' => '729',
            'complement' => '',
            'district' => 'Santo Amaro',
            'city' => 'Recife',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'CHESF',
            'home_phone' => '8125254309',
            'cell_phone' => '81984145358',
            'work_phone' => '8132292000',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 17:
        // -- Titular 18:
        $client = Client::create([
            'name' => 'Sérgio Gael Corte Real',
            'email' => 'sergiogaelcortereal_@rebecacometerra.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1959-10-27',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '38543554403',
            'place' => 'Avenida Pau-Brasil',
            'number' => '332',
            'complement' => '',
            'district' => 'São José',
            'city' => 'Gravatá',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'RAPIDAO COMETA',
            'home_phone' => '8135381215',
            'cell_phone' => '81984425780',
            'work_phone' => '8140625465',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 18:
        Client::create([
            'name' => 'Agatha Corte Real',
            'email' => 'agathaluanalopes_@obrativaengenharia.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1959-07-16',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Benedito Corte Real',
            'email' => 'bbeneditorafaeldrumond@lumavale.com.br',
            'gender' => 'Masculino',
            'birth_date' => '2001-02-04',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 19:
        $client = Client::create([
            'name' => 'Guilherme Ricardo da Rosa',
            'email' => 'guilhermericardodarosa__guilhermericardodarosa@fundamentos.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1973-09-25',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '96135346440',
            'place' => 'Rua Severino da Costa Gomes',
            'number' => '464',
            'complement' => '',
            'district' => 'Matriz',
            'city' => 'Vitória de Santo Antão',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'ICAL PARTICIPACOES S/A',
            'home_phone' => '8126238900',
            'cell_phone' => '81987438461',
            'work_phone' => '8132724444',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 19:
        Client::create([
            'name' => 'Stefany da Rosa',
            'email' => 'stefanyalessandraaparicio__stefanyalessandraaparicio@dr.com',
            'gender' => 'Feminino',
            'birth_date' => '1968-07-24',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'César Oliver da Rosa',
            'email' => 'cesarolivernoahcaldeira..cesarolivernoahcaldeira@accardoso.com.br',
            'gender' => 'Masculino',
            'birth_date' => '2007-03-24',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Milena Daniela da Rosa',
            'email' => 'milenadanielaelisafernandes__milenadanielaelisafernandes@cognis.com',
            'gender' => 'Feminino',
            'birth_date' => '2005-10-11',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 20:
        $client = Client::create([
            'name' => 'Flávia Josefa da Mota',
            'email' => 'fflaviajosefadamota@machiv.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1973-08-14',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '05298415415',
            'place' => 'Rua Antônio Conselheiro',
            'number' => '159',
            'complement' => '',
            'district' => 'Maranguape II',
            'city' => 'Paulista',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'VOTORANTIM CIMENTOS N/NE S/A',
            'home_phone' => '8137570192',
            'cell_phone' => '81995105888',
            'work_phone' => '8136777300',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 20:
        Client::create([
            'name' => 'Diogo Nelson da Mota',
            'email' => 'diogonelsonthalesassuncao-98@pozzer.net',
            'gender' => 'Masculino',
            'birth_date' => '1968-12-11',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Catarina da Mota',
            'email' => 'ccatarinaoliviaalmada@inforgel.com',
            'gender' => 'Feminino',
            'birth_date' => '2008-08-01',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Giovanni Nicolas da Mota',
            'email' => 'giovanninicolascarlospires-70@grupoitamaraty.com.br',
            'gender' => 'Masculino',
            'birth_date' => '2003-05-04',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 21:
        $client = Client::create([
            'name' => 'Benjamin Kaique Renan Moreira',
            'email' => 'benjaminkaiquerenanmoreira__benjaminkaiquerenanmoreira@orbisat.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1981-01-03',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '11636900402',
            'place' => 'Rua Padre Arruda',
            'number' => '900',
            'complement' => '',
            'district' => 'Centro',
            'city' => 'Santa Cruz do Capibaribe',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'CHESF',
            'home_phone' => '8125303060',
            'cell_phone' => '81999284740',
            'work_phone' => '8132292000',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 21:
        Client::create([
            'name' => 'Silvana Alana Moreira',
            'email' => 'silvanaalanataniaaparicio_@fepextrusao.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1984-08-15',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Tiago Moreira',
            'email' => 'ttiagoaugustopinto@iclud.com',
            'gender' => 'Masculino',
            'birth_date' => '2004-05-03',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 22:
        $client = Client::create([
            'name' => 'Kauê Osvaldo André da Silva',
            'email' => 'kaueosvaldoandredasilva..kaueosvaldoandredasilva@yogoothies.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1999-11-04',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '36235380437',
            'place' => 'Rua dos Abacateiros',
            'number' => '595',
            'complement' => '',
            'district' => 'Umbura',
            'city' => 'Igarassu',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'SUPERMERCADOS BOMPRECO',
            'home_phone' => '8129812525',
            'cell_phone' => '81989671849',
            'work_phone' => '8134989900',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 22:
        // -- Titular 23:
        $client = Client::create([
            'name' => 'Pedro Lucas Márcio Nascimento',
            'email' => 'pedrolucasmarcionascimento-76@coraza.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1980-04-16',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '86820435487',
            'place' => 'Rua Vinte e Oito',
            'number' => '823',
            'complement' => '',
            'district' => 'Santos Dumont',
            'city' => 'Arcoverde',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'SUPERMERCADOS BOMPRECO',
            'home_phone' => '8738425144',
            'cell_phone' => '87997355559',
            'work_phone' => '8134989900',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 23:
        Client::create([
            'name' => 'Amanda Nascimento',
            'email' => 'amandadanielamartins-98@prognum.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1978-12-02',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Paulo Nascimento',
            'email' => 'paulokaiquebarbosa__paulokaiquebarbosa@paginacom.com.br',
            'gender' => 'Masculino',
            'birth_date' => '2000-03-10',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 24:
        $client = Client::create([
            'name' => 'Oliver Diogo Osvaldo da Conceição',
            'email' => 'oliverdiogoosvaldodaconceicao_@lonax.net',
            'gender' => 'Masculino',
            'birth_date' => '1997-07-07',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '26326256453',
            'place' => 'Avenida Felipe Camarão',
            'number' => '689',
            'complement' => '',
            'district' => 'Heliópolis',
            'city' => 'Garanhuns',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'CHESF',
            'home_phone' => '8728451367',
            'cell_phone' => '87989555615',
            'work_phone' => '8132292000',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 24:
        // -- Titular 25:
        $client = Client::create([
            'name' => 'Amanda Bruna Galvão',
            'email' => 'aamandabrunagalvao@localiza.com',
            'gender' => 'Feminino',
            'birth_date' => '1981-07-05',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '17493838453',
            'place' => 'Rua Crateús',
            'number' => '493',
            'complement' => '',
            'district' => 'Cajueiro Seco',
            'city' => 'Jaboatão dos Guararapes',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'JCPM PARTICIPACOES E EMPREENDIMENTOS S.A',
            'home_phone' => '8126239338',
            'cell_phone' => '81996477161',
            'work_phone' => '8121272000',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 25:
        Client::create([
            'name' => 'Arthur Galvão',
            'email' => 'arthurhenrynovaes..arthurhenrynovaes@akaer.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1985-10-27',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 26:
        $client = Client::create([
            'name' => 'Melissa Isabelly Teresinha Assis',
            'email' => 'mmelissaisabellyteresinhaassis@riquefroes.com',
            'gender' => 'Feminino',
            'birth_date' => '1987-02-04',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '76699922475',
            'place' => 'Rua Gilmar de Oliveira Cassiano',
            'number' => '744',
            'complement' => '',
            'district' => 'São Cristóvão',
            'city' => 'Arcoverde',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'CHESF',
            'home_phone' => '8728716922',
            'cell_phone' => '87981597563',
            'work_phone' => '8132292000',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 26:
        Client::create([
            'name' => 'Vitor Assis',
            'email' => 'vitornelsonviana__vitornelsonviana@edu.uniso.br',
            'gender' => 'Masculino',
            'birth_date' => '1985-02-07',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Amanda Benedita Assis',
            'email' => 'amandabeneditadepaula..amandabeneditadepaula@munhozengenharia.com.br',
            'gender' => 'Feminino',
            'birth_date' => '2004-02-03',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 27:
        $client = Client::create([
            'name' => 'Martin Diogo Nogueira',
            'email' => 'mmartindiogonogueira@citadini.imb.br',
            'gender' => 'Masculino',
            'birth_date' => '1963-05-22',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '34865977449',
            'place' => 'Rua São Tomaz',
            'number' => '572',
            'complement' => '',
            'district' => 'Vassoural',
            'city' => 'Caruaru',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'RAPIDAO COMETA',
            'home_phone' => '8139487612',
            'cell_phone' => '81986827398',
            'work_phone' => '8140625465',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 27:
        Client::create([
            'name' => 'Maria Nogueira',
            'email' => 'mariapietraporto..mariapietraporto@peopleside.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1958-06-02',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Ricardo Enzo Nogueira',
            'email' => 'ricardoenzoruanfogaca_@alkbrasil.com.br',
            'gender' => 'Masculino',
            'birth_date' => '2000-11-03',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Francisca Rosa Nogueira',
            'email' => 'franciscarosaallanaoliveira_@prifree.fr',
            'gender' => 'Feminino',
            'birth_date' => '2005-03-06',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 28:
        $client = Client::create([
            'name' => 'Benjamin Kevin Edson Ribeiro',
            'email' => 'benjaminkevinedsonribeiro..benjaminkevinedsonribeiro@baltico.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1984-11-04',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '97352867422',
            'place' => 'Rua Ibernon Wanderley',
            'number' => '226',
            'complement' => '',
            'district' => 'Severiano Moraes Filho',
            'city' => 'Garanhuns',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'ALIMENTACAO PERFEITA NORDESTE LTDA',
            'home_phone' => '8739852969',
            'cell_phone' => '87998102848',
            'work_phone' => '8130341105',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 28:
        Client::create([
            'name' => 'Camila Ribeiro',
            'email' => 'ccamilamaitesilveira@zyb.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1982-06-12',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 29:
        $client = Client::create([
            'name' => 'Francisco Samuel Assis',
            'email' => 'franciscosamuelassis-86@mls.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1994-10-04',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '81681078457',
            'place' => 'Rua Barão de Souza Leão',
            'number' => '269',
            'complement' => '',
            'district' => 'Boa Viagem',
            'city' => 'Recife',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'ICAL PARTICIPACOES S/A',
            'home_phone' => '8125421153',
            'cell_phone' => '81991727138',
            'work_phone' => '8132724444',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 29:
        // -- Titular 30:
        $client = Client::create([
            'name' => 'Regina Milena da Mota',
            'email' => 'reginamilenadamota..reginamilenadamota@trilhavitoria.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1961-08-01',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '34261739488',
            'place' => 'Beco São Gonçalo',
            'number' => '100',
            'complement' => '',
            'district' => 'Boa Vista',
            'city' => 'Recife',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'FACULDADE MAURICIO DE NASSAU',
            'home_phone' => '8127437842',
            'cell_phone' => '81997440334',
            'work_phone' => '8134134611',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 30:
        Client::create([
            'name' => 'Nelson da Mota',
            'email' => 'nnelsonhenryassuncao@velc.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1959-12-23',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Giovanna Maitê da Mota',
            'email' => 'ggiovannamaitecortereal@kimmay.com.br',
            'gender' => 'Feminino',
            'birth_date' => '2006-12-26',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Luís da Mota',
            'email' => 'luisvitorbarros-89@planicoop.com.br',
            'gender' => 'Masculino',
            'birth_date' => '2001-12-05',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 31:
        $client = Client::create([
            'name' => 'Nina Aline Clara Novaes',
            'email' => 'ninaalineclaranovaes_@monsanto.com',
            'gender' => 'Feminino',
            'birth_date' => '1961-11-14',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '81453382470',
            'place' => 'Rua Benjamin Constant',
            'number' => '771',
            'complement' => '',
            'district' => 'São Francisco',
            'city' => 'Caruaru',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'INTERLIGACAO ELETRICA GARANHUNS S/A',
            'home_phone' => '8139622749',
            'cell_phone' => '81995256204',
            'work_phone' => '8130497171',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 31:
        Client::create([
            'name' => 'Bruno Cláudio Novaes',
            'email' => 'bbrunoclaudiodaconceicao@band.com',
            'gender' => 'Masculino',
            'birth_date' => '1960-03-21',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Sophie Novaes',
            'email' => 'sophieaylapinto-87@uol.om.br',
            'gender' => 'Feminino',
            'birth_date' => '2008-08-25',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Nicolas Vicente Novaes',
            'email' => 'nicolasvicentecortereal-75@eletrotex.com.br',
            'gender' => 'Masculino',
            'birth_date' => '2002-02-18',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 32:
        $client = Client::create([
            'name' => 'Ian Luiz Costa',
            'email' => 'ianluizcosta__ianluizcosta@landovale.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1986-07-16',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '62828172422',
            'place' => 'Praça da Bandeira',
            'number' => '153',
            'complement' => '',
            'district' => 'Salgadinho',
            'city' => 'Olinda',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'CELPE',
            'home_phone' => '8126625338',
            'cell_phone' => '81996459103',
            'work_phone' => '8132176000',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 32:
        Client::create([
            'name' => 'Natália Alícia Costa',
            'email' => 'nataliaaliciasebastianaalmeida-93@flexchange.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1982-10-05',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 33:
        $client = Client::create([
            'name' => 'Manuel Benjamin Lorenzo da Mata',
            'email' => 'manuelbenjaminlorenzodamata..manuelbenjaminlorenzodamata@radicigroup.com',
            'gender' => 'Masculino',
            'birth_date' => '1995-04-08',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '41932390472',
            'place' => 'Avenida General Demétrios Ribeiro',
            'number' => '474',
            'complement' => '',
            'district' => 'Petrópolis',
            'city' => 'Caruaru',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'BCPAR S.A.',
            'home_phone' => '8129592362',
            'cell_phone' => '81981970526',
            'work_phone' => '8125445058',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 33:
        // -- Titular 34:
        $client = Client::create([
            'name' => 'Emilly Larissa Isis Fernandes',
            'email' => 'emillylarissaisisfernandes_@pozzer.net',
            'gender' => 'Feminino',
            'birth_date' => '1989-08-18',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '19983561409',
            'place' => 'Rua Padre João Antônio Rodrigues',
            'number' => '898',
            'complement' => '',
            'district' => 'Cruzeiro',
            'city' => 'Gravatá',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'HIPERCARD BANCO MULTIPLO S.A.',
            'home_phone' => '8135771251',
            'cell_phone' => '81991844694',
            'work_phone' => '8130033030',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 34:
        Client::create([
            'name' => 'Mateus Severino Fernandes',
            'email' => 'mateusseverinojosedacunha__mateusseverinojosedacunha@technicolor.com',
            'gender' => 'Masculino',
            'birth_date' => '1993-11-14',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Caroline Lívia Fernandes',
            'email' => 'carolinelivialuizalopes-89@nextel.com.br',
            'gender' => 'Feminino',
            'birth_date' => '2001-06-20',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 35:
        $client = Client::create([
            'name' => 'Emanuel Benjamin Antonio da Mota',
            'email' => 'emanuelbenjaminantoniodamota..emanuelbenjaminantoniodamota@belaggiovini.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1992-12-23',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '46055092409',
            'place' => 'Rua José Deca Filho',
            'number' => '986',
            'complement' => '',
            'district' => 'São Gonçalo',
            'city' => 'Petrolina',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'HIPERCARD BANCO MULTIPLO S.A.',
            'home_phone' => '8726536100',
            'cell_phone' => '87986344731',
            'work_phone' => '8130033030',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 35:
        // -- Titular 36:
        $client = Client::create([
            'name' => 'Vicente Manoel Corte Real',
            'email' => 'vicentemanoelcortereal__vicentemanoelcortereal@galpaoestofados.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1971-10-26',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '69907685410',
            'place' => 'Rua Anadia',
            'number' => '397',
            'complement' => '',
            'district' => 'COHAB',
            'city' => 'Recife',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'BRENNAND ENERGIA S/A',
            'home_phone' => '8137334904',
            'cell_phone' => '81983854484',
            'work_phone' => '8121377000',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 36:
        Client::create([
            'name' => 'Nina Adriana Corte Real',
            'email' => 'nninaadrianaanalopes@heineken.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1970-11-08',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 37:
        $client = Client::create([
            'name' => 'Débora Marcela Bárbara Dias',
            'email' => 'deboramarcelabarbaradias-99@agenziamarketing.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1998-08-19',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '07694747480',
            'place' => 'Rua Getúlio Vargas',
            'number' => '542',
            'complement' => '',
            'district' => 'Cajueiro Seco',
            'city' => 'Jaboatão dos Guararapes',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'JCPM PARTICIPACOES E EMPREENDIMENTOS S.A',
            'home_phone' => '8129408179',
            'cell_phone' => '81987325514',
            'work_phone' => '8121272000',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 37:
        Client::create([
            'name' => 'Fábio Levi Dias',
            'email' => 'fabioleviaugustoalves-88@landovale.com.br',
            'gender' => 'Masculino',
            'birth_date' => '2001-01-23',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 38:
        $client = Client::create([
            'name' => 'Antonio Paulo Santos',
            'email' => 'antoniopaulosantos_@nine9.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1997-10-08',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '17413956403',
            'place' => 'Travessa Adolfo Bezerra',
            'number' => '992',
            'complement' => '',
            'district' => 'Aldeia dos Camarás',
            'city' => 'Camaragibe',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'RIOMAR SHOPPING S.A',
            'home_phone' => '8135298685',
            'cell_phone' => '81983168228',
            'work_phone' => '8138780000',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 38:
        // -- Titular 39:
        $client = Client::create([
            'name' => 'Tomás Diogo Diego Porto',
            'email' => 'tomasdiogodiegoporto_@ygui.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1960-01-21',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '20285205404',
            'place' => 'Avenida Brasil',
            'number' => '393',
            'complement' => '',
            'district' => 'Alpes Suiços',
            'city' => 'Gravatá',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'JCPM PARTICIPACOES E EMPREENDIMENTOS S.A',
            'home_phone' => '8127706958',
            'cell_phone' => '81991394834',
            'work_phone' => '8121272000',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 39:
        Client::create([
            'name' => 'Sara Porto',
            'email' => 'ssaraluziajesus@gringa360.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1956-04-12',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Renato Pedro Porto',
            'email' => 'rrenatopedrohenriquedarosa@andressamelo.com.br',
            'gender' => 'Masculino',
            'birth_date' => '2007-07-08',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Betina Andreia Porto',
            'email' => 'bbetinaandreiajessicagoncalves@whgames.com.br',
            'gender' => 'Feminino',
            'birth_date' => '2010-12-01',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 40:
        $client = Client::create([
            'name' => 'Eduardo Marcos Sérgio Duarte',
            'email' => 'eduardomarcossergioduarte__eduardomarcossergioduarte@solpro.biz',
            'gender' => 'Masculino',
            'birth_date' => '1991-12-15',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '57501908460',
            'place' => 'Rua Tapirana',
            'number' => '329',
            'complement' => '',
            'district' => 'Várzea',
            'city' => 'Recife',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'ALIMENTACAO PERFEITA NORDESTE LTDA',
            'home_phone' => '8128544742',
            'cell_phone' => '81985111528',
            'work_phone' => '8130341105',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 40:
        Client::create([
            'name' => 'Marli Duarte',
            'email' => 'marliemillyaragao__marliemillyaragao@asproplastic.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1986-03-21',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 41:
        $client = Client::create([
            'name' => 'Tânia Isis Alves',
            'email' => 'taniaisisalves..taniaisisalves@opcaoeduca.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1988-03-19',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '64736353430',
            'place' => 'Rua Senador Nilo Coelho',
            'number' => '866',
            'complement' => '',
            'district' => 'São João da Escócia',
            'city' => 'Caruaru',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'INTERLIGACAO ELETRICA GARANHUNS S/A',
            'home_phone' => '8126614302',
            'cell_phone' => '81999516067',
            'work_phone' => '8130497171',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 41:
        Client::create([
            'name' => 'Kaique Anthony Alves',
            'email' => 'kaiqueanthonypedrohenriqueviana..kaiqueanthonypedrohenriqueviana@steadyoffice.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1992-03-07',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Aparecida Isabella Alves',
            'email' => 'aparecidaisabellagabrielacavalcanti-71@jci.com',
            'gender' => 'Feminino',
            'birth_date' => '2006-04-06',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 42:
        $client = Client::create([
            'name' => 'Benjamin Carlos Enrico Oliveira',
            'email' => 'benjamincarlosenricooliveira__benjamincarlosenricooliveira@deskprint.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1970-01-22',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '15635638430',
            'place' => 'Praça Doutor Júlio de Melo',
            'number' => '438',
            'complement' => '',
            'district' => 'Nossa Senhora das Dores',
            'city' => 'Caruaru',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'ICAL PARTICIPACOES S/A',
            'home_phone' => '8135162620',
            'cell_phone' => '81999243292',
            'work_phone' => '8132724444',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 42:
        Client::create([
            'name' => 'Alice Sandra Oliveira',
            'email' => 'alicesandrarenatadarocha_@sfranconsultoria.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1968-11-26',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Thomas Samuel Oliveira',
            'email' => 'thomassamueldavicaldeira..thomassamueldavicaldeira@lubeka.com.br',
            'gender' => 'Masculino',
            'birth_date' => '2008-04-26',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        Client::create([
            'name' => 'Isis Isabel Oliveira',
            'email' => 'isisisabelbrunaoliveira..isisisabelbrunaoliveira@expressoforte.com.br',
            'gender' => 'Feminino',
            'birth_date' => '2011-08-20',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 43:
        $client = Client::create([
            'name' => 'Nelson Cauê Ricardo Freitas',
            'email' => 'nnelsoncauericardofreitas@vivo.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1995-07-09',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '73550613482',
            'place' => 'Avenida Piedade',
            'number' => '905',
            'complement' => '',
            'district' => 'Nova Caruaru',
            'city' => 'Caruaru',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'MOURA DUBEUX ENGENHARIA S/A',
            'home_phone' => '8135087101',
            'cell_phone' => '81996899257',
            'work_phone' => '8140203538',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 43:
        // -- Titular 44:
        $client = Client::create([
            'name' => 'Antônia Sophie Tatiane da Cruz',
            'email' => 'antoniasophietatianedacruz_@pmi.com',
            'gender' => 'Feminino',
            'birth_date' => '1975-08-03',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '87314946418',
            'place' => 'Rua Henrique Dias',
            'number' => '927',
            'complement' => '',
            'district' => 'Livramento',
            'city' => 'Vitória de Santo Antão',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'DROGARIA GUARARAPES BRASIL S/A',
            'home_phone' => '8139543306',
            'cell_phone' => '81995311868',
            'work_phone' => '8130342657',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 44:
        Client::create([
            'name' => 'Anderson da Cruz',
            'email' => 'andersonmartinlima..andersonmartinlima@cafefrossard.com',
            'gender' => 'Masculino',
            'birth_date' => '1980-11-24',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
        // -- Titular 45:
        $client = Client::create([
            'name' => 'Letícia Simone Julia Gomes',
            'email' => 'leticiasimonejuliagomes_@br.com.br',
            'gender' => 'Feminino',
            'birth_date' => '1976-09-18',
            'type' => 'Titular',
            'holder_id' => null,
        ]);
        $holder = Holder::create([
            'cpf' => '52581465450',
            'place' => 'Alameda do Ipê Amarelo',
            'number' => '438',
            'complement' => '',
            'district' => 'São José',
            'city' => 'Gravatá',
            'state' => 'PE',
            'country' => 'Brasil',
            'workplace' => 'MOURA DUBEUX ENGENHARIA S/A',
            'home_phone' => '8137015251',
            'cell_phone' => '81993368578',
            'work_phone' => '8140203538',
            'client_id' => $client->id,
        ]);
        $client->holder_id = $holder->id;
        $client->save();
        // ---- Dependentes do titular 45:
        Client::create([
            'name' => 'Pedro César Gomes',
            'email' => 'pedrocesarbryanlopes__pedrocesarbryanlopes@iblojas.com.br',
            'gender' => 'Masculino',
            'birth_date' => '1975-06-23',
            'type' => 'Dependente',
            'holder_id' => $holder->id,
        ]);
    }
}
