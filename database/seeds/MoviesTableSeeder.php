<?php

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Página 1 */
        $movie = Movie::create([
            'tmdb_id' => '297802', 
            'title' => 'Aquaman', 
            'original_title' => 'Aquaman', 
            'poster' => 'http://image.tmdb.org/t/p/original/4CKtfsbNqAf0uDfpLfKQyig6SDu.jpg', 
            'country' => 'AU, US', 
            'year' => 2018, 
            'direction' => 'James Wan', 
            'cast' => 'Jason Momoa, Amber Heard, Willem Dafoe, Patrick Wilson, Dolph Lundgren, Yahya Abdul-Mateen II, Nicole Kidman, Tainu Kirkwood, Tamor Kirkwood, Kaan Guldur, Otis Dhanji, Kekoa Kumano, Graham McTavish, Temuera Morrison, Ludi Lin, Randall Park, Michael Beach, Djimon Hounsou, Natalia Safran, Sophia Forrest, Leigh Whannell, Julie Andrews, Andrew Crawford, John Rhys-Davies, Patrick Cox, Jon Quested, Winnie Mzembe, Connor Zegenhagen, Gabriella Petkova, Braden Lewis, Vincent B. Gorce, Sasha Dulics, Rhianna Palmer, Robert Longstreet', 
            'synopsis' => 'Filho do humano Tom Curry (Temuera Morrison) com a atlante Atlanna (Nicole Kidman), Arthur Curry (Jason Momoa) cresce com a vivência de um humano e as capacidades metahumanas de um atlante. Quando seu irmão Orm (Patrick Wilson) deseja se tornar o Mestre dos Oceanos, subjugando os demais reinos aquáticos para que possa atacar a superfície, cabe a Arthur a tarefa de impedir a guerra iminente. Para tanto, ele recebe a ajuda de Mera (Amber Heard), princesa de um dos reinos, e o apoio de Vulko (Willem Dafoe), que o treinou secretamente desde a adolescência.', 
            'duraction' => '140', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '424783', 
            'title' => 'Bumblebee', 
            'original_title' => 'Bumblebee', 
            'poster' => 'http://image.tmdb.org/t/p/original/sWtotHJvTUBeX9HYm0KT4H44B0c.jpg', 
            'country' => 'US', 
            'year' => 2018, 
            'direction' => 'Travis Knight', 
            'cast' => 'Hailee Steinfeld, Jorge Lendeborg Jr., Pamela Adlon, John Cena, Dylan O\'Brien, John Ortiz, Jason Ian Drucker, Stephen Schneider, Rory Markham, Len Cariou, Gracie Dzienny, Ricardo Hoyos, Rachel Crow, Abby Quinn, Peter Cullen, Grey DeLisle, Steve Blum, Andrew Morgado, Kirk Baily, Dennis Singletary, Angela Bassett, Justin Theroux, David Sobolov, Jess Harnell, Jon Bailey, Kenneth Choi, Megyn Price, Glynn Turman, Vanessa Ross, Tony Toste, Fred Dryer, Isabelle Ellingson, Mika Kubota', 
            'synopsis' => '1987. Refugiado num ferro-velho numa pequena cidade praiana da Califórnia, Bumblebee, um fusca amarelo aos pedaços, machucado e sem condição de uso, é encontrado e consertado pela jovem Charlie (Hailee Steinfeld), às vésperas de completar 18 anos. Só quando Bee ganha vida ela enfim nota que seu novo amigo é bem mais do que um simples automóvel.', 
            'duraction' => '114', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '405774', 
            'title' => 'Caixa de Pássaros', 
            'original_title' => 'Bird Box', 
            'poster' => 'http://image.tmdb.org/t/p/original/akAO6r0ZuPB98VwQsN0SGIkE4z.jpg', 
            'country' => 'US', 
            'year' => 2018, 
            'direction' => 'Susanne Bier, Eric Glasser, Matt McKinnon', 
            'cast' => 'Sandra Bullock, Trevante Rhodes, John Malkovich, Sarah Paulson, Jacki Weaver, Rosa Salazar, Danielle Macdonald, LilRel Howery, Tom Hollander, Machine Gun Kelly, BD Wong, Pruitt Taylor Vince, Vivien Lyra Blair, Julian Edwards, Parminder Nagra, Rebecca Pidgeon, Amy Gumenick, Taylor Handley, Happy Anderson, Kyle Beatty, Ashley Alvarado, David Dastmalchian, Keith Jardine, Kristopher Logan, Shirley Butler, Chanon Finley, Frank Mottek, Danny Max, Debra Mark', 
            'synopsis' => 'Num mundo pós-apocalíptico, Malorie (Sandra Bullock) e os seus filhos precisam chegar a um refúgio para escapar do "Problema", criaturas que ao serem vistas fazem com que as pessoas se tornem extremamente violentas. De olhos vendados para não serem infectados, a família segue o curso de um rio para chegar à segurança.', 
            'duraction' => '117', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 27)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '324857', 
            'title' => 'Homem-Aranha no Aranhaverso', 
            'original_title' => 'Spider-Man: Into the Spider-Verse', 
            'poster' => 'http://image.tmdb.org/t/p/original/laMM4lpQSh5z6KIBPwWogkjzBVQ.jpg', 
            'country' => 'US', 
            'year' => 2018, 
            'direction' => 'Bob Persichetti, Peter Ramsey, Rodney Rothman, Scott Armstrong, John Bermudes, Alfredo Hisa, Arem Kim, Daniel Laczkowski, Letia Lewis, Anibis Lockward', 
            'cast' => 'Shameik Moore, Jake Johnson, Hailee Steinfeld, Mahershala Ali, Brian Tyree Henry, Lily Tomlin, Lauren Vélez, John Mulaney, Nicolas Cage, Liev Schreiber, Zoë Kravitz, Kimiko Glenn, Kathryn Hahn, Chris Pine, Lake Bell, Jorma Taccone, Marvin \'Krondon\' Jones III, Joaquín Cosio, Post Malone, Cliff Robertson, Stan Lee, Oscar Isaac, Greta Lee, Nick Jaine, Muneeb Rehman, Melanie Haynes, Natalie Morales, Edwin H. Bravo, Kim Yarbrough, Lex Lang, Christopher Miller, Scott Menville, Juan Pacheco', 
            'synopsis' => 'Miles Morales é um jovem negro do Brooklyn que se tornou o Homem-Aranha inspirado no legado de Peter Parker, já falecido. Entretanto, ao visitar o túmulo de seu ídolo em uma noite chuvosa, ele é surpreendido com a presença do próprio Peter, vestindo o traje do herói aracnídeo sob um sobretudo. A surpresa fica ainda maior quando Miles descobre que ele veio de uma dimensão paralela, assim como outras variações do Homem-Aranha.', 
            'duraction' => '117', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 16)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '404368', 
            'title' => 'WiFi Ralph – Quebrando a Internet', 
            'original_title' => 'Ralph Breaks the Internet', 
            'poster' => 'http://image.tmdb.org/t/p/original/jEKa0zBtlohBlloTDskP7ASh6Lx.jpg', 
            'country' => 'US', 
            'year' => 2018, 
            'direction' => 'Rich Moore, Phil Johnston', 
            'cast' => 'John C. Reilly, Sarah Silverman, Gal Gadot, Taraji P. Henson, Jack McBrayer, Jane Lynch, Alan Tudyk, Alfred Molina, Ed O\'Neill, Bill Hader, John DiMaggio, Irene Bedard, Kristen Bell, Jodi Benson, Auli\'i Cravalho, Jennifer Hale, Kate Higgins, Linda Larkin, Kelly Macdonald, Idina Menzel, Mandy Moore, Paige O\'Hara, Pamela Ribon, Anika Noni Rose, Ming-Na Wen, Roger Craig Smith, Tim Allen, Anthony Daniels, Rich Moore, Phil Johnston, Colleen Ballinger, Dani Fernandez, Tiffany Herrera, Corey Burton, Brad Garrett, Michael Giacchino, Kevin Deters, Jeremy Milton, Jesse Averna, Vin Diesel, Maurice LaMarche, Dan Reynolds, Wayne Sermon, Ben McKee, Daniel "Z" Platzman, Ana Ortiz, Ali Wong, Rebecca Wisocky, Flula Borg, Timothy Simons, Mark Smith, Jamie Elman, Hamish Blake, Glozell Green, Della Saba, Kent Boyd, Rachel Crow, June Squibb, Dianna Agron, Jason Mantzoukas, Nicole Scherzinger, Sean Giambrone, Katie Lowes, Melissa Villaseñor', 
            'synopsis' => 'Ralph, o mais famoso vilão dos videogames, e Vanellope, sua companheira atrapalhada, iniciam mais uma arriscada aventura. Após a gloriosa vitória no Fliperama Litwak, a dupla viaja para a world wide web, no universo expansivo e desconhecido da internet. Dessa vez, a missão é achar uma peça reserva para salvar o videogame Corrida Doce, de Vanellope. Para isso, eles contam com a ajuda dos "cidadãos da Internet" e de Yess, a alma por trás do "Buzzztube", um famoso website que dita tendências.', 
            'duraction' => '112', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 16)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '335983', 
            'title' => 'Venom', 
            'original_title' => 'Venom', 
            'poster' => 'http://image.tmdb.org/t/p/original/gB7ThItFiRFw18SsE1gWHA92eri.jpg', 
            'country' => 'US', 
            'year' => 2018, 
            'direction' => 'Ruben Fleischer, Spiro Razatos', 
            'cast' => 'Tom Hardy, Michelle Williams, Riz Ahmed, Scott Haze, Reid Scott, Jenny Slate, Melora Walters, Woody Harrelson, Peggy Lu, Malcolm C. Murray, Sope Aluko, Wayne Pére, Michelle Lee, Kurt Yue, Chris O\'Hara, Emilio Rivera, Amelia Young, Ariadne Joseph, Deen Brooksher, David Jones, Roger Yuan, Woon Young Park, Patrick Chundah Chu, Vickie Eng, Mac Brandt, Nick Thune, Michael Dennis Hill, Sam Medina, Scott Deckert, Lauren Richards, Jared Bankens, Lucas Fleischer, Michael Burgess, Diesel Madkins, Otis Winston, Zeva DuVall, Selena Anduze, Brittany L. Smith, Jordan Foster, Jane McNeill, Victor McCay, Elizabeth Becka, Ron Prather, Marcia White, Javier Vazquez Jr., Ellen Gerstein, Martin Bats Bradford, Steven Teuchert, Al-Jaleel Knox, Brandon Morales, Matthew Cornwell, David Fleischer, DJames Jones, Angela Davis, Stan Lee, Wade Williams', 
            'synopsis' => 'Eddie Brock (Tom Hardy) é um jornalista investigativo, que tem um quadro próprio em uma emissora local. Um dia, ele é escalado para entrevistar Carlton Drake (Riz Ahmed), o criador da Fundação Vida, que tem investido bastante em missões espaciais de forma a encontrar possíveis usos medicinais para a humanidade. Após acessar um documento sigiloso enviado à sua namorada, a advogada Anne Weying (Michelle Williams), Brock descobre que Drake tem feito experimentos científicos em humanos. Ele resolve denunciar esta situação durante a entrevista, o que faz com que seja demitido. Seis meses depois, o ainda desempregado Brock é procurado pela dra. Dora Skirth (Jenny Slate) com uma denúncia: Drake estaria usando simbiontes alienígenas em testes com humanos, muitos deles mortos como cobaias.', 
            'duraction' => '112', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '504172', 
            'title' => 'The Mule', 
            'original_title' => 'The Mule', 
            'poster' => 'http://image.tmdb.org/t/p/original/t0idiLMalKMj2pLsvqHrOM4LPdQ.jpg', 
            'country' => 'CA, US', 
            'year' => 2018, 
            'direction' => 'Clint Eastwood', 
            'cast' => 'Clint Eastwood, Bradley Cooper, Taissa Farmiga, Michael Peña, Laurence Fishburne, Clifton Collins Jr., Dianne Wiest, Ignacio Serricchio, Alison Eastwood, Manny Montana, Loren Dean, Victor Rasuk, Robert LaSardo, Jill Flint, Paul Alayo, Lee Coc, Noel Gugliemi, Katie Gill, Sparrow Nicole, Scott Dale, Joe Knezevich, Charles Lawlor, Saul Huezo, Daniel Moncada, Austin Freeman, Jackie Prucha, Andy García, Lobo Sebastian, Diego Cataño, Devon Ogden, Lee Coc, Monica Mathis, Ashani Roberts, Eugene Cordero', 
            'synopsis' => '', 
            'duraction' => '116', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 80)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '400650', 
            'title' => 'O Retorno de Mary Poppins', 
            'original_title' => 'Mary Poppins Returns', 
            'poster' => 'http://image.tmdb.org/t/p/original/3Eo7j7BawMvmNsC9NbQsvF9vcLu.jpg', 
            'country' => 'US', 
            'year' => 2018, 
            'direction' => 'Rob Marshall, Grant Butler, Ben Howarth, Lisa Vick', 
            'cast' => 'Emily Blunt, Lin-Manuel Miranda, Ben Whishaw, Emily Mortimer, Julie Walters, Dick Van Dyke, Angela Lansbury, Colin Firth, Meryl Streep, Karen Dotrice, Pixie Davies, Nathanael Saleh, Joel Dawson, David Warner, Jim Norton, Jeremy Swift, Kobna Holdbrook-Smith, Noma Dumezweni, Tarik Frimpong, Edward Hibbert, Chris O\'Dowd, Mark Addy, Bernardo Santos, Bern Collaco, Fran Targ, Johanna Thea, Jag Patel, Ian Conningham, Raj Awasti, Christian Dixon, Nina Kumar, David Gambier, Jonah Privett, Jeremy Azis, Calvin Chen, Bern Collaço, Steve Carroll, Nick Owenford, Martyn Mayger, Craig Stein, Alex Jaep, Richard Price', 
            'synopsis' => 'Numa Londres abalada pela Grande Depressão, Mary Poppins (Emily Blunt) desce dos céus novamente com seu fiel amigo Jack (Lin-Manuel Miranda) para ajudar Michael (Ben Whishaw) e Jane Banks (Emily Mortimer), agora adultos trabalhadores, que sofreram uma perda pessoal. As crianças Annabel (Pixie Davies), Georgie (Joel Dawson) e John (Nathanael Saleh) vivem com os pais na mesma casa de 24 anos atrás e precisam da babá enigmática e do acendedor de lampiões otimista para trazer alegria e magia de volta para suas vidas.', 
            'duraction' => '131', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10402)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '338952', 
            'title' => 'Animais Fantásticos: Os Crimes de Grindelwald', 
            'original_title' => 'Fantastic Beasts: The Crimes of Grindelwald', 
            'poster' => 'http://image.tmdb.org/t/p/original/qflbWgNtthGGl8nURPfffGEgZu6.jpg', 
            'country' => 'GB, US', 
            'year' => 2018, 
            'direction' => 'David Yates', 
            'cast' => 'Eddie Redmayne, Katherine Waterston, Alison Sudol, Dan Fogler, Jude Law, Ezra Miller, Johnny Depp, Zoë Kravitz, Callum Turner, Claudia Kim, Carmen Ejogo, Jessica Williams, William Nadylam, Ingvar Eggert Sigurðsson, Ólafur Darri Ólafsson, Kevin Guthrie, Brontis Jodorowsky, Deano Bugatti, Derek Riddell, David Sakurai, Fiona Glascott, Wolf Roth, Victoria Yeates, Poppy Corby-Tuech, Cornell John, Callum Forman, Bernardo Santos, Sabine Crossen, Johanna Thea, Alexandra Ford, Donna Preston, Jag Patel, Nasir Jama, Liv Hansen, Jason Redshaw, Annarie Boor, Deepak Anand, Nick Owenford, Jeremy Oliver, Dave Simon, Aykut Hilmi, Andrew Blackall, Simon Wan, Phil Hodges, Stephen McDade, Israel Ruiz, Michael Haydon, Linda Santiago, Sean Gislingham, Tahir Burhan, Sean Coleman, Adrian Wheeler, Morrison Thomas, Andrew Turner, Natalie Lauren, Alfrun Rose, Jan Freygang, Ryan Hannaford, Connor Wolf, Maja Bloom, Andy Summers, Olwen Fouéré, Simon Meacock, David Wilmot, Ed Gaughan, Jamie Campbell Bower, Toby Regbo, Hugh Quarshie, Isaura Barbé-Brown, Keith Chanter, Tim Ingall', 
            'synopsis' => 'Newt Scamander (Eddie Redmayne) reencontra os queridos amigos Tina Goldstein (Katherine Waterston), Queenie Goldstein (Alison Sudol) e Jacob Kowalski (Dan Fogler). Ele é recrutado pelo seu antigo professor em Hogwarts, Alvo Dumbledore (Jude Law), para enfrentar o terrível bruxo das trevas Gellert Grindelwald (Johnny Depp), que escapou da custódia da MACUSA (Congresso Mágico dos EUA) e reúne seguidores, dividindo o mundo entre seres de magos sangue puro e seres não-mágicos.', 
            'duraction' => '134', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '480530', 
            'title' => 'Creed II', 
            'original_title' => 'Creed II', 
            'poster' => 'http://image.tmdb.org/t/p/original/v3QyboWRoA4O9RbcsqH8tJMe8EB.jpg', 
            'country' => 'US', 
            'year' => 2018, 
            'direction' => 'Steven Caple Jr.', 
            'cast' => 'Michael B. Jordan, Sylvester Stallone, Tessa Thompson, Wood Harris, Phylicia Rashād, Dolph Lundgren, Florian Munteanu, Andre Ward, Brigitte Nielsen, Milo Ventimiglia, Russell Hornsby, Carl Weathers, Robbie Johns, Jacob \'Stitch\' Duran, Patrice Harris, Ana Gerena, Christopher Mann, Robert Douglas, Benjamin Vaynshelboym, Angelina Shipilina, Pavel Vakunov, Oleg Ivanov, Pete Postiglione, Billy Vargus, Zack Beyer, Chrisdine King, Johanna Tolentino, Eleni Delopoulos, Marcia Myers, Ivo Nandi, Dmitry Torgovitsky, Michael Buffer, Jim Lampley, Max Kellerman, Roy Jones Jr.', 
            'synopsis' => 'Adonis Creed (Michael B. Jordan) saiu mais forte do que nunca de sua luta contra \'Pretty\' Ricky Conlan (Tony Bellew), e segue sua trajetória rumo ao campeonato mundial de boxe, contra toda a desconfiança que acompanha a sombra de seu pai e com o apoio de Rocky (Sylvester Stallone). Sua próxima luta não será tão simples, ele precisa enfrentar um adversário que possui uma forte ligação com o passado de sua família, o que torna tudo ainda mais complexo.', 
            'duraction' => '130', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '299536', 
            'title' => 'Vingadores: Guerra Infinita', 
            'original_title' => 'Avengers: Infinity War', 
            'poster' => 'http://image.tmdb.org/t/p/original/rkHe0BfOo1f5N2q6rxgdYac7Zf6.jpg', 
            'country' => 'US', 
            'year' => 2018, 
            'direction' => 'Joe Russo, Anthony Russo, Chris Castaldi, Simon Downes, Mark Rossini, Eli Sasich, Hajar Mainl, Lori Grabowski', 
            'cast' => 'Robert Downey Jr., Chris Hemsworth, Mark Ruffalo, Chris Evans, Josh Brolin, Zoe Saldana, Chris Pratt, Paul Bettany, Elizabeth Olsen, Tom Holland, Bradley Cooper, Dave Bautista, Scarlett Johansson, Don Cheadle, Benedict Cumberbatch, Chadwick Boseman, Karen Gillan, Tom Hiddleston, Anthony Mackie, Sebastian Stan, Idris Elba, Danai Gurira, Peter Dinklage, Benedict Wong, Pom Klementieff, Vin Diesel, Gwyneth Paltrow, Benicio del Toro, Sean Gunn, William Hurt, Letitia Wright, Terry Notary, Tom Vaughan-Lawlor, Carrie Coon, Michael James Shaw, Stan Lee, Winston Duke, Florence Kasumba, Kerry Condon, Monique Ganderton, Jacob Batalon, Tiffany Espensen, Isabella Amara, Ethan Dizon, Ariana Greenblatt, Ameenah Kaplan, Ross Marquand, Michael Anthony Rogers, Stephen McFeely, Aaron Lazar, Robert Pralgo, Olaniyan Thurmon, Blair Jasin, Matthew Zuk, Laura Miller, Kenneth Branagh, Samuel L. Jackson, Cobie Smulders', 
            'synopsis' => 'Enquanto os Vingadores e seus aliados continuaram a proteger o mundo de ameaças grandes demais para qualquer herói, uma nova ameaça emergiu das sombras cósmicas: Thanos. Um déspota de infâmia intergalática, tem o objetivo de coletar todas as seis Joias do Infinito, artefatos de poder inimaginável, e usá-las para infligir sua vontade distorcida em toda a realidade. Tudo pelo que os Vingadores lutaram levou até este momento - o destino da Terra e da própria existência nunca foi tão incerto.', 
            'duraction' => '149', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '505954', 
            'title' => 'T-34', 
            'original_title' => 'Т-34', 
            'poster' => 'http://image.tmdb.org/t/p/original/AnLCqcH66Ecu8VFmXu3RofK4SMK.jpg', 
            'country' => 'RU', 
            'year' => 2018, 
            'direction' => 'Aleksey Sidorov', 
            'cast' => 'Alexander Petrov, Victor Dobronravov, Irina Starshenbaum, Vinzenz Kiefer, Petr Skvortsov, Semyon Treskunov, Artyom Bystrov, Michael Janibekyan, Anton Bogdanov, Sofya Sinitsyna, Yuliya Dzhulai, Darya Hramtsova, Vasiliy Uriyevskiy, Vasiliy Butkevich, Yaroslav Shtefan, Kirill Lopatkin, Polina Volkova, Wolfgang Cerny, Yuriy Borisov, Igor Khripunov, Paul Orlyanskiy', 
            'synopsis' => '', 
            'duraction' => '75', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 10752)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '428078', 
            'title' => 'Máquinas Mortais', 
            'original_title' => 'Mortal Engines', 
            'poster' => 'http://image.tmdb.org/t/p/original/4qtIczCqcSKiaXon4XmYY0PoT74.jpg', 
            'country' => 'NZ, US', 
            'year' => 2018, 
            'direction' => 'Christian Rivers', 
            'cast' => 'Hera Hilmar, Robert Sheehan, Hugo Weaving, Jihae, Ronan Raftery, Leila George, Patrick Malahide, Stephen Lang, Colin Salmon, Mark Mitchinson, Regé-Jean Page, Menik Gooneratne, Frankie Adams, Leifur Sigurdarson, Caren Pistorius, Sophie Cox, Aaron Jackson, Mark Hadlow, Joel Tobeck, Stephen Ure, Kee Chan, Yoson An', 
            'synopsis' => 'Anos depois da "Guerra dos Sessenta Minutos". A Terra está destruída e para sobreviver as cidades se movem em rodas gigantes, conhecidas como Cidades Tração, e lutam com outras para conseguir mais recursos naturais. Quando Londres se envolve em um ataque, Tom (Robert Sheehan) é lançado para fora da cidade junto com uma fora-da-lei e os dois juntos precisam lutar para sobreviver e ainda enfrentar uma ameaça que coloca a vida no planeta em risco.', 
            'duraction' => '128', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '569547', 
            'title' => 'Black Mirror - Bandersnatch', 
            'original_title' => 'Black Mirror: Bandersnatch', 
            'poster' => 'http://image.tmdb.org/t/p/original/fR0VZ0VE598zl1lrYf7IfBqEwQ2.jpg', 
            'country' => 'GB, US', 
            'year' => 2018, 
            'direction' => 'David Slade', 
            'cast' => 'Fionn Whitehead, Craig Parkinson, Alice Lowe, Will Poulter, Asim Chaudhry, Tallulah Haddon, Alan Asaad, Catriona Knox, Paul Bradley, Jonathan Aris, A.J. Houghton, Fleur Keith, Laura Evelyn, Suzanne Burden, Jeff Minter', 
            'synopsis' => 'Enquanto adapta um romance de fantasia para videogame em 1984, um jovem programador começa a questionar o próprio conceito de realidade e acaba enfrentando um desafio alucinante.', 
            'duraction' => '90', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 9648)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10770)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '494113', 
            'title' => 'Infected', 
            'original_title' => 'Infisert', 
            'poster' => 'http://image.tmdb.org/t/p/original/fX9N4ejnjX2T0pfxaMaMvChC6WL.jpg', 
            'country' => 'NO', 
            'year' => 2018, 
            'direction' => 'Robert Rønning', 
            'cast' => 'Kathrine Sørland, Ingar Helge Gimle, Stig Frode Henriksen, Ida Nilsen, Gitte Witt, Kim Sønderholm, Oddrun Valestrand, Ane Viola Semb', 
            'synopsis' => '', 
            'duraction' => '90', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 27)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '454293', 
            'title' => 'Operação Supletivo: Agora Vai!', 
            'original_title' => 'Night School', 
            'poster' => 'http://image.tmdb.org/t/p/original/kM3QlCTSnLQSkY4kzNxddOSKouU.jpg', 
            'country' => 'US', 
            'year' => 2018, 
            'direction' => 'Malcolm D. Lee', 
            'cast' => 'Kevin Hart, Tiffany Haddish, Rob Riggle, Yvonne Orji, Mary Lynn Rajskub, Ben Schwartz, Megalyn Echikunwoke, Anne Winters, Keith David, Taran Killam, Mason Guccione, Romany Malco, Bresha Webb, Brooke Butler, Matilda Del Toro, Melissa LeEllen, Al Madrigal, Donna Biscoe, David Dunston, Owen Harn, Brian Kayode-Patrick Johnson, Fat Joe', 
            'synopsis' => 'Teddy Walker é um vendedor de sucesso cuja vida toma um rumo inesperado quando acidentalmente explode seu local de trabalho. Forçado a frequentar a escola noturna para obter seu GED, Teddy logo se vê lidando com um grupo de estudantes desajuste, seu ex-inimigo do ensino médio e um professor mal-humorado que não acha que ele é brilhante demais.', 
            'duraction' => '111', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '424694', 
            'title' => 'Bohemian Rhapsody', 
            'original_title' => 'Bohemian Rhapsody', 
            'poster' => 'http://image.tmdb.org/t/p/original/vus5xPgn3l9H4OiK5fx0J4Hflzy.jpg', 
            'country' => 'GB, US', 
            'year' => 2018, 
            'direction' => 'Claire Frayn, Jack Ravenscroft, Bryan Singer', 
            'cast' => 'Rami Malek, Gwilym Lee, Ben Hardy, Joseph Mazzello, Lucy Boynton, Aidan Gillen, Tom Hollander, Mike Myers, Allen Leech, Aaron McCusker, Meneka Das, Ace Bhatti, Priya Blackburn, Max Bennett, Dermot Murphy, Dickie Beau, Jack Roth, Neil Fox-Roberts, Philip Andrew, Jess Radomska, Adam Rauf, Matthew Houston, Michelle Duncan, Scott Morrison Watson, Devlin Lloyd, Garry Summers, Matthew Fredricks, Stefan Kopiecki, Pat Lally, Ian Jareth Williamson, Johanna Thea, Adam Lazarus, Peter Vo, Lasco Atkins', 
            'synopsis' => 'Freddie Mercury (Rami Malek) e seus companheiros, Brian May, Roger Taylor e John Deacon mudam o mundo da música para sempre ao formar a banda Queen durante a década de 1970. Porém, quando o estilo de vida extravagante de Mercury começa a sair do controle, a banda tem que enfrentar o desafio de conciliar a fama e o sucesso com suas vidas pessoais cada vez mais complicadas.', 
            'duraction' => '135', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10402)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '346910', 
            'title' => 'O Predador', 
            'original_title' => 'The Predator', 
            'poster' => 'http://image.tmdb.org/t/p/original/yhIqpoYFnAra24si0JqFEWdiPOX.jpg', 
            'country' => 'CA, US', 
            'year' => 2018, 
            'direction' => 'Shane Black, Joecy Shepherd, Ingrid Kenning, Amandine Dufraise, Justin Muller, Richard Cowan, Brandon Lambdin, Shamess Shute', 
            'cast' => 'Boyd Holbrook, Trevante Rhodes, Jacob Tremblay, Keegan-Michael Key, Olivia Munn, Sterling K. Brown, Thomas Jane, Alfie Allen, Augusto Aguilera, Jake Busey, Yvonne Strahovski, Brian A. Prince, Mike Dopud, Niall Matter, Javier Lacroix, Gabriel LaBelle, Nikolas Dukic, R. J. Fetherstonhaugh, Garry Chalk, Eduard Witzke, Lochlyn Munro, Rhys Williams, Malcolm Masters, Harrison MacDonald, Anousha Alamian, Patrick Sabongui, J. C. Williams, Sean Kohnke, Lars Grant, Byron Brisco, Fraser Corbett, Chad Bellamy, Peter Shinkoda, Aaron Craven, Duncan Fraser, Emy Aneke, Darryl Scheelar, Fraser Aitcheson, Jan Bos, Françoise Yip, Sage Brocklebank, Sean O. Roberts, Colin Corrigan', 
            'synopsis' => 'Uma perseguição entre naves alienígenas traz à Terra um novo predador, que acaba sendo capturado por humanos. Antes disso, ele tem seu capacete e bracelete roubados por Quinn McKenna (Boyd Holbrook), um atirador de elite que estava em missão no local onde a nave caiu. A bióloga Casey Brackett (Olivia Munn) é então chamada para examinar o ser recém-descoberto, mas ele logo consegue escapar do laboratório em que é mantido cativeiro. Ao tentar recapturá-lo Casey encontra McKenna, que está em um ônibus repleto de ex-militares com problemas. Juntos, eles buscam um meio de sobreviver e, ao mesmo tempo, proteger o pequeno Rory (Jacob Tremblay), filho de McKenna, que está com os artefatos alienígenas pegos pelo pai.', 
            'duraction' => '107', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '375588', 
            'title' => 'Robin Hood - A Origem', 
            'original_title' => 'Robin Hood', 
            'poster' => 'http://image.tmdb.org/t/p/original/3BDOuDfwE7kjnwF5QQtb1LD2ptR.jpg', 
            'country' => 'US', 
            'year' => 2018, 
            'direction' => 'Otto Bathurst', 
            'cast' => 'Taron Egerton, Jamie Foxx, Ben Mendelsohn, Eve Hewson, Jamie Dornan, Tim Minchin, Paul Anderson, Björn Bengtsson, Josh Herdman, Roderick Hill, F. Murray Abraham', 
            'synopsis' => 'A origem da famosa lenda sobre o ladrão que rouba dos ricos para dar aos pobres. Robin Hood (Taron Egerton) volta das Cruzadas e surpreende-se ao encontrar a Floresta Sherwood infestada de criminosos, no mais completo caos. Ele não deixará que as coisas permaneçam desse jeito.', 
            'duraction' => '116', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '446021', 
            'title' => 'Maus Momentos no Hotel Royale', 
            'original_title' => 'Bad Times at the El Royale', 
            'poster' => 'http://image.tmdb.org/t/p/original/ohpQY0dKXUJC3yijZqyLiMKJkOg.jpg', 
            'country' => 'US', 
            'year' => 2018, 
            'direction' => 'Drew Goddard', 
            'cast' => 'Jeff Bridges, Cynthia Erivo, Dakota Johnson, Jon Hamm, Chris Hemsworth, Cailee Spaeny, Lewis Pullman, Nick Offerman, Xavier Dolan, Shea Whigham, Mark O\'Brien, Charles Halford, Jim O\'Heir, Gerry Nairn, Alvina August, London Morrison, Bethany Brown, Rebecca Toolan, Hannah Zirke, Billy Wickman, Charlotte Mosby, William B. Davis, Manny Jacinto, Tally Rodin, Sophia Lauchlin Hirt, Jonathan Whitesell, Synto D. Misati, Austin Abell, Katharine Isabelle, Sarah Smyth', 
            'synopsis' => 'Década de 1960, sete desconhecidos se encontram no El Royale, um hotel degradado perto de Lake Tahoe, Califórnia. Cada um deles tem um segredo obscuro e precisa encontrar redenção durante a noite... antes que tudo vá para o inferno.', 
            'duraction' => '141', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 80)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 9648)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        /* Página 2 */
        $movie = Movie::create([
            'tmdb_id' => '424139', 
            'title' => 'Halloween', 
            'original_title' => 'Halloween', 
            'poster' => 'http://image.tmdb.org/t/p/original/bXs0zkv2iGVViZEy78teg2ycDBm.jpg', 
            'country' => 'US', 
            'year' => 2018, 
            'direction' => 'David Gordon Green', 
            'cast' => 'Jamie Lee Curtis, Judy Greer, Andi Matichak, Will Patton, Virginia Gardner, Sophia Miller, James Jude Courtney, Nick Castle, Haluk Bilginer, Rhian Rees, Jefferson Hall, Toby Huss, Dylan Arnold, Miles Robbins, Jibrail Nantambu, Brien Gregorie, Vince Mattis, Omar J. Dorsey, Christopher Allen Nelson, Marian Green, Pedro Lopez, Drew Scheid, Hannah Russell, Charlie Benton, Carmela McNeal, Jared Moser, Diva Tyler, Koby Griffin, Chris Holloway, Rob Niter, Omar Azimi, Michael Harrity, Edward Stachyra, Michael Smallwood, David Lowe, Johnny Price, Ranisha Wood, Matthew Anderson, Angela Anderson, W.F. Bell, Willie Tyrone Ferguson, Aaron Christian Paderewski, Anthony Woodle', 
            'synopsis' => 'Uma equipe de documentários britânica viaja aos EUA para visitar Michael na prisão, para uma retrospectiva sobre a noite de terror, mas seu projeto entra em caos e se torna mais interessante quando Michael escapa da custódia, recupera sua antiga máscara e busca vingança de Laurie, fazendo outras vítimas em seu caminho.', 
            'duraction' => '106', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 27)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '463272', 
            'title' => 'Johnny English 3.0', 
            'original_title' => 'Johnny English Strikes Again', 
            'poster' => 'http://image.tmdb.org/t/p/original/6XvIHDtzxr4Em9ZiAc7dg5tzTvW.jpg', 
            'country' => 'FR, US, GB', 
            'year' => 2018, 
            'direction' => 'David Kerr', 
            'cast' => 'Rowan Atkinson, Ben Miller, Olga Kurylenko, Jake Lacy, Emma Thompson, Adam James, Amit Shah, Matthew Beard, Michael Gambon, Charles Dance, Edward Fox, Kevin Eldon, Pauline McLynn, Jonny Sweet, Samantha Russell, David Mumeni, Miranda Hennessy, Vicki Pepperdine, Marvin Beyster, Neil Edmond, Gus Brown, Peter Vo', 
            'synopsis' => 'Em sua nova aventura, Johnny English (Rowan Atkinson) é a última salvação do serviço secreto quando um ataque cibernético revela as identidades de todos os agentes do país. Tirado de sua aposentadoria, ele volta à ativa com a missão de achar o hacker por trás do ataque. Com poucas habilidades e métodos analógicos, Johnny English precisa superar os desafios do mundo tecnológico para fazer da missão um sucesso.', 
            'duraction' => '89', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '484247', 
            'title' => 'Um Pequeno Favor', 
            'original_title' => 'A Simple Favor', 
            'poster' => 'http://image.tmdb.org/t/p/original/bUAEA2ezgUvogQVcUjwbHU3604b.jpg', 
            'country' => 'CA, US', 
            'year' => 2018, 
            'direction' => 'Paul Feig, Myron Hoffert, Derek Robertson, Daniela Saioni', 
            'cast' => 'Anna Kendrick, Blake Lively, Henry Golding, Ian Ho, Joshua Satine, Andrew Rannells, Rupert Friend, Paul Jurewicz, Roger Dunn, Dustin Milligan, Eric Johnson, Bashir Salahuddin, Linda Cardellini, Jason Oliveira, Danielle Bourgon, Patti Harrison, Ava LaFramboise, Jean Smart, Sarah Baker, Glenda Braganza, Zach Smadu, Andrew Moodie, Aparna Nancherla, Kelly McCormack, Gia Sandhu', 
            'synopsis' => 'Quando a `nova amiga´ de Stephanie (Anna Kendrick) pede para ela pegar seu filho na escola e depois desaparece misteriosamente, Stephanie procura descobrir a verdade por trás do súbito desaparecimento de Emily (Blake Lively). Stephanie é acompanhada pelo marido de Emily, Sean (Henry Golding) neste thriller cheio de reviravoltas e traições, segredos e revelações, amor e lealdade, assassinato e vingança.', 
            'duraction' => '117', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 80)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 9648)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '507562', 
            'title' => 'Crayon Shin-chan: Burst Serving! Kung Fu Boys ~Ramen Rebellion~', 
            'original_title' => 'クレヨンしんちゃん 爆盛！カンフーボーイズ ～拉麺大乱～', 
            'poster' => 'http://image.tmdb.org/t/p/original/beQxbz53wcBHG6TzevTHvs3Gz20.jpg', 
            'country' => 'JP', 
            'year' => 2018, 
            'direction' => 'Wataru Takahashi', 
            'cast' => 'Akiko Yajima, Miki Narahashi, Satomi Kourogi, Toshiyuki Morikawa, Mari Mashiba, Tamao Hayashi, Teiyū Ichiryūsai, Chie Satou, Daisuke Sakaguchi, Makiko Ohmoto', 
            'synopsis' => 'Shin-chan está pronta para desafiar o Kung Fu na Chinatown da cidade de Kasukabe, conhecida como Aiyā Town.  Crayon Shin-chan: Burst Servindo! Kung Fu Boys ~ Ramen Rebellion ~ é um filme de anime japonês de 2018 produzido pela Shin-Ei Animation. É o 26º filme da série popular de comédia e mangá Crayon Shin-chan. O diretor deste filme é Wataru Takahashi, que também dirigiu o filme de 2014 Crayon Shin-chan: Serious Battle!', 
            'duraction' => '105', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 16)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '503314', 
            'title' => 'Dragon Ball Super: Broly', 
            'original_title' => 'Dragon Ball Super: Broly', 
            'poster' => 'http://image.tmdb.org/t/p/original/ulZObGBOAknrRff8QCn89ernI0t.jpg', 
            'country' => 'JP', 
            'year' => 2018, 
            'direction' => 'Tatsuya Nagamine', 
            'cast' => 'Masako Nozawa, Ryou Horikawa, Bin Shimada, Ryusei Nakao, Banjou Ginga, Toshio Furukawa, Aya Hisakawa, Takeshi Kusao, Kouichi Yamadera, Masakazu Morita, Katsuhisa Houki, Ryuuzaburou Ootomo, Nana Mizuki, Tomokazu Sugita, Tetsu Inada, Naoko Watanabe, Takuya Kirimoto', 
            'synopsis' => 'Esta é a história de um novo Saiyajin.  A Terra está em paz depois do fim do ‘Torneio do Poder’. Goku não quer nada além de treinar, já que agora compreende quantas pessoas fortes existem nos universos que ele ainda não conheceu. Então, um dia, um Saiyajin desconhecido chamado ‘Broly’ aparece diante de Goku e Vegeta. Como é possível que um Saiyajin esteja na Terra quando ele deveria ter sido destruído junto com o Planeta Vegeta? De volta do inferno mais uma vez, Freeza também aparece e os três Saiyajins que tiveram caminhos completamente diferentes se encontram em um intenso conflito.', 
            'duraction' => '100', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 16)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '399402', 
            'title' => 'Fúria em Alto Mar', 
            'original_title' => 'Hunter Killer', 
            'poster' => 'http://image.tmdb.org/t/p/original/ral7cnZBQZGFmGaJUxrpcY8Xj3l.jpg', 
            'country' => 'CN, GB, US', 
            'year' => 2018, 
            'direction' => 'Donovan Marsh', 
            'cast' => 'Gerard Butler, Common, Michael Nyqvist, Mikhail Gorevoy, Gary Oldman, Toby Stephens, Zane Holtz, Linda Cardellini, Ryan McPartlin, Michael Trucco, Caroline Goodall, David Gyasi, Gabriel Chavarria, Carter MacIntyre, Taylor John Smith, Henry Goodman, Colin Stinton, Shane Taylor, Will Attenborough, Christopher Goh, Sarah Middleton, Adam James', 
            'synopsis' => 'Dono de métodos próprios nada convencionais, o Comandante Joe Glass (Gerard Butler) é o responsável por liderar uma delicada missão pelas perigosas águas do Mar de Barents à bordo do submarino USS Arkansas. O objetivo da tarefa é monitorar a atividade militar russa na região após outro submarino americano desaparecer naqueles mares. Enquanto isso, a situação política na região se acirra ao ponto de Glass ter de tomar decisões cruciais para impedir que se deflagre um conflito de escala continental entre as duas potências.', 
            'duraction' => '118', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '353081', 
            'title' => 'Missão Impossível - Efeito Fallout', 
            'original_title' => 'Mission: Impossible - Fallout', 
            'poster' => 'http://image.tmdb.org/t/p/original/i273qQubszItr11lQNMFWnYP4J1.jpg', 
            'country' => 'CN, US, FR, NO', 
            'year' => 2018, 
            'direction' => 'Christopher McQuarrie, Nicoletta Mani', 
            'cast' => 'Tom Cruise, Rebecca Ferguson, Michelle Monaghan, Ving Rhames, Henry Cavill, Simon Pegg, Wes Bentley, Sean Harris, Angela Bassett, Vanessa Kirby, Frederick Schmidt, Alec Baldwin, Liang Yang, Kristoffer Joner, Wolf Blitzer, Dean Ashton, Alix Bénézech, Joey Ansah, Velibor Topic, Alexandre Poole, Andrew Cazanave Pin, Christophe de Choisy, Guy Remy, Jean Baptiste Fillon, Maximilian Geller, Olivier Huband, Raphael Desprez, Raphael Joner, Thierry Picaut, Vincent Latorre, Harvey Djent, Grahame Fox, David Mumeni, Charlie Archer, Caspar Phillipson, Ffion Jolly, Lolly Adefope, Ross O\'Hennessy, Russ Bain, Nigel Allen, Tracey Saunders, Alicia Mencía Castaño, Conny Sharp, Jessie Vinning, Stuart Davidson, Julianne Binard, Bernardo Santos, Lampros Kalfuntzos', 
            'synopsis' => 'Obrigado a unir forças com o agente especial da CIA August Walker (Henry Cavill) para mais uma missão impossível, Ethan Hunt (Tom Cruise) se vê novamente cara a cara com Solomon Lane (Sean Harris) e preso numa teia que envolve velhos conhecidos movidos por interesses misteriosos e contatos de moral duvidosa. Atormentado por decisões do passado que retornam para assombrá-lo, Hunt precisa se resolver com seus sentimentos e impedir que uma catastrófica explosão ocorra, no que conta com a ajuda dos amigos de IMF.', 
            'duraction' => '147', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '507569', 
            'title' => 'Nanatsu no Taizai : Prisioneiros do Céu', 
            'original_title' => '劇場版 七つの大罪 天空の囚われ人', 
            'poster' => 'http://image.tmdb.org/t/p/original/lgYGPujZNckyKwQQNwMLmkWoKui.jpg', 
            'country' => 'JP', 
            'year' => 2018, 
            'direction' => 'Noriyuki Abe, Yasuto Nishikata', 
            'cast' => 'Tatsuhisa Suzuki, Yuuki Kaji, Jun Fukuyama, Sora Amamiya, Misaki Kuno, Aoi Yuki, Tomokazu Sugita, Maaya Sakamoto', 
            'synopsis' => 'Os Sete Pecados Capitais viajam para uma terra remota em busca do ingrediente conhecido como “peixe celestial”. Meliodas e Hawk acabam no “Palácio dos Céus” que existe acima das nuvens, e é habitado por seres alados. Após a sua chegada, Meliodas é confundido com um menino que cometeu um crime e acaba sendo preso. Enquanto isso, os moradores estão preparando uma cerimônia de defesa contra uma besta feroz que desperta uma vez a cada 3.000 anos. No entanto, os Seis Cavaleiros de Preto, um exército do clã demoníaco, remove o selo da besta para ameaçar a vida dos moradores do Palácio. Meliodas e seus aliados enfrentarão esses cavaleiros em um campo de batalha.', 
            'duraction' => '99', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '260513', 
            'title' => 'Os Incríveis 2', 
            'original_title' => 'Incredibles 2', 
            'poster' => 'http://image.tmdb.org/t/p/original/y3EEb7o6NxK0pl0WsOswCos663y.jpg', 
            'country' => 'US', 
            'year' => 2018, 
            'direction' => 'Brad Bird, Adam Schnitzer, Alexander Curtis, Andy Grisdale, Arjun Rihan, Gregg Olsson, Jahkeeli Garnett, Jan Pfenninger, Leo Santos, Mark Sanford, Matthew Silas, Mike Leonard, Robert Kinkead, Ryan Heuett, Seong-Young Kim', 
            'cast' => 'Craig T. Nelson, Holly Hunter, Sarah Vowell, Huck Milner, Eli Fucile, Nicholas Bird, Samuel L. Jackson, Bob Odenkirk, Catherine Keener, Brad Bird, Jonathan Banks, Michael Bird, Sophia Bush, Phil LaMarr, Paul Eiding, Isabella Rossellini, John Ratzenberger, Bill Wise, Barry Bostwick, Jere Burns, Adam Rodríguez, Kimberly Adair Clark, Usher, Adam Gates, LaTanya Richardson Jackson, Debi Derryberry, Fred Tatasciore, Alyson Stoner, Michael B. Johnson', 
            'synopsis' => 'A família de super-heróis favorita de todo mundo está de volta em Os Incríveis 2, mas dessa vez, Helena está sendo o destaque, deixando Beto em casa com Violeta e Flecha para se aventurar no dia a dia heroico de vida “normal”. É uma transição difícil para todo mundo, sendo os super poderes emergentes de Zezé o fator mais complicado. Quando um novo vilão traça uma trama brilhante e perigosa, a família e Gelado devem encontrar uma maneira de trabalhar juntos novamente, o que é mais fácil dizer do que fazer, mesmo quando são incríveis.', 
            'duraction' => '118', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 16)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '300681', 
            'title' => 'Replicas', 
            'original_title' => 'Replicas', 
            'poster' => 'http://image.tmdb.org/t/p/original/kEuIYDEJ9ReBbJLb7QeP9KdbjEe.jpg', 
            'country' => 'CN, PR, GB, US', 
            'year' => 2018, 
            'direction' => 'Jeffrey Nachmanoff', 
            'cast' => 'Keanu Reeves, Alice Eve, Thomas Middleditch, Emjay Anthony, Emily Alyn Lind, Nyasha Hatendi, Amber Rivera, Jeffrey Holsman, John Ortiz', 
            'synopsis' => '', 
            'duraction' => '107', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 9648)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '363088', 
            'title' => 'Homem-Formiga e a Vespa', 
            'original_title' => 'Ant-Man and the Wasp', 
            'poster' => 'http://image.tmdb.org/t/p/original/azH25XpelbpzSEg8JoQVJQsFNF7.jpg', 
            'country' => 'US', 
            'year' => 2018, 
            'direction' => 'Peyton Reed, Hajar Mainl, Hannah Myvanwy Driscoll, Karen M. Cantley, Robin Meyers', 
            'cast' => 'Paul Rudd, Evangeline Lilly, Michael Peña, Walton Goggins, Bobby Cannavale, Judy Greer, T.I., David Dastmalchian, Hannah John-Kamen, Abby Ryder Fortson, Randall Park, Michelle Pfeiffer, Laurence Fishburne, Michael Douglas, Divian Ladwa, Goran Kostić, Rob Archer, Sean Kleier, Benjamin Byron Davis, Michael Cerveris, Riann Steele, Dax Griffin, Hayley Lovitt, Langston Fishburne, RaeLynn Bratten, Madeleine McGraw, Tim Heidecker, Stan Lee, Charles Justo, Brian Huskey, Suehyla El-Attar, Julia Vera, Jessica Winther, Norwood J. Cheek Jr., Bryan Lugo, Darcy Shean, Torrey Vogel, Simon Potter, Jon Wurster, Tom Scharpling, Virginia Hamilton, Natasha Zouves, Joshua Mikel, Ronald Joe Vasquez, Chris Gann, Sergio Briones, Denney Pierce, Vanessa Ross, Zachary Culbertson, Steven Wiig, Timothy Carr, Sawyer Jones, Rick Richardson, Benjamin Weaver, Jamel Chambers, Jennifer Black, Sandra Dee Richardson, Tahseen Ghauri, Dale Liner, John Ozuna, Marcella Bragio, Sophia Marcs, William W. Barbour, Kevin Carscallen, Seth McCracken', 
            'synopsis' => 'Após ter ajudado o Capitão América na batalha contra o Homem de Ferro na Alemanha, Scott Lang (Paul Rudd) é condenado a dois anos de prisão domiciliar, por ter quebrado o Tratado de Sokovia. Diante desta situação, ele foi obrigado a se aposentar temporariamente do posto de super-herói. Restando apenas três dias para o término deste prazo, ele tem um estranho sonho com Janet Van Dyne (Michelle Pfeiffer), que desapareceu 30 anos atrás ao entrar no mundo quântico em um ato de heroísmo. Ao procurar o dr. Hank Pym (Michael Douglas) e sua filha Hope (Evangeline Lilly) em busca de explicações, Scott é rapidamente cooptado pela dupla para que possa ajudá-los em sua nova missão: construir um túnel quântico, com o objetivo de resgatar Janet de seu limbo.', 
            'duraction' => '118', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '407436', 
            'title' => 'Mogli: Entre Dois Mundos', 
            'original_title' => 'Mowgli: Legend of the Jungle', 
            'poster' => 'http://image.tmdb.org/t/p/original/wL8qLcZt8Hyf8Z8FYH1SucNySeq.jpg', 
            'country' => 'GB, US', 
            'year' => 2018, 
            'direction' => 'Andy Serkis, Wendy Alport, Lee Grumett, Jo Tew, Paula Casarin', 
            'cast' => 'Rohan Chand, Christian Bale, Benedict Cumberbatch, Cate Blanchett, Andy Serkis, Freida Pinto, Naomie Harris, Peter Mullan, Eddie Marsan, Louis Ashbourne Serkis, Jack Reynor, Matthew Rhys, Tom Hollander, Keveshan Pillay, Riaz Mansoor, Jayden Fowora-Knight, Georgie Farmer', 
            'synopsis' => 'Criado por uma alcatéia em meio às florestas da Índia, Mogli (Rohan Chand) vive com os animais da selva e conta com a amizade do urso Baloo (Andy Serkis) e da pantera Bagheera (Christian Bale). Ele é aceito por todos os animais, exceto pelo temido tigre Shere Khan (Benedict Cumberbach). Quando Mogli se defronta com suas origens humanas, perigos maiores do que a rixa com Shere Khan podem surgir.', 
            'duraction' => '105', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '345887', 
            'title' => 'O Protetor 2', 
            'original_title' => 'The Equalizer 2', 
            'poster' => 'http://image.tmdb.org/t/p/original/3arTw3WKvPAiaIq9gWORJjYFTC5.jpg', 
            'country' => 'US', 
            'year' => 2018, 
            'direction' => 'Antoine Fuqua, Donald Sparks, Dug Rotstein, Aidan Payne', 
            'cast' => 'Denzel Washington, Pedro Pascal, Ashton Sanders, Orson Bean, Bill Pullman, Melissa Leo, Jonathan Scarfe, Sakina Jaffrey, Kazy Tauginas, Garrett Golden, Adam Karst, Alican Barlas, Rhys Olivia Cote, Tamara Hickey, Ken Baltin, Colin Allen, Antoine de Lartigue, Abigail Marlowe, Jim Loutzenhiser, Alessandra Noelle Rosenfeld, Lillie Dickens, Rex Baning, Lance A. Williams, Caroline Day, Rory Benjamin Smith, Ted Arcidi, Rutherford Cius, Wesley Pereira, David Carrasquillo, Nathaniel Chaney, Jermaine Holt, Drew Cooper, Jay Hieron, Naheem Garcia, Gloria Papert, Phil Tavares, Tim Doherty, Cj Stuart, Donald Cerrone, Gabrielle Lorthe, Karen Strong, Marley Dauphin, Elena Capaldi, Penélope de la Rosa, Miguel Nascimento, Maximillian McNamara, Gerry Pucci, Phyllis Kay, Johnny L. Hernandez, Andrei Arlovski, Liam McNeill', 
            'synopsis' => 'Massachusetts, Estados Unidos. Robert McCall (Denzel Washington) agora trabalha como motorista, ajudando pessoas que enfrentam dificuldades decorrentes de injustiças. Quando sua amiga Susan Plummer (Melissa Leo) é morta durante a investigação de um assassinato na Bélgica, ele decide sair do anonimato e encontrar seu antigo parceiro, Dave (Pedro Pascal), no intuito de encontrar pistas sobre o autor do crime.', 
            'duraction' => '121', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 80)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '426426', 
            'title' => 'Roma', 
            'original_title' => 'Roma', 
            'poster' => 'http://image.tmdb.org/t/p/original/7MdjlSPGwCV7OUKvjjkKXWPKJay.jpg', 
            'country' => 'US, MX', 
            'year' => 2018, 
            'direction' => 'Alfonso Cuarón, Natalia Moguel', 
            'cast' => 'Yalitza Aparicio, Marina de Tavira, Diego Cortina Autrey, Carlos Peralta, Marco Graf, Daniela Demesa, Nancy García García, Verónica García, Fernando Grediaga, Andy Cortés, Jorge Antonio Guerrero, José Manuel Guerrero Mendoza, Latin Lover, Zarela Lizbeth Chinolla Arellano, José Luis López Gómez, Edwin Mendoza Ramírez, Clementina Guadarrama, Enoc Leaño, Nicolás Peréz Taylor Félix, Kjartan Halvorsen', 
            'synopsis' => 'Cidade do México, 1970. A rotina de uma família de classe média é controlada de maneira silenciosa por uma mulher (Yalitza Aparicio), que trabalha como babá e empregada doméstica. Durante um ano, diversos acontecimentos inesperados começam a afetar a vida de todos os moradores da casa, dando origem a uma série de mudanças, coletivas e pessoais.', 
            'duraction' => '135', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '429476', 
            'title' => 'Parque do Inferno', 
            'original_title' => 'Hell Fest', 
            'poster' => 'http://image.tmdb.org/t/p/original/4ag1lH1E3r2uSQpK5BkNTvA0JDX.jpg', 
            'country' => 'US', 
            'year' => 2018, 
            'direction' => 'Gregory Plotkin, Tim Fitzgerald, David Waters, Hajar Mainl', 
            'cast' => 'Amy Forsyth, Reign Edwards, Bex Taylor-Klaus, Christian James, Roby Attal, Matt Mercurio, Courtney Dietz', 
            'synopsis' => 'Durante a noite de Halloween, um grupo de amigos começa a ser perseguido por um assassino mascarado em um parque de diversões temático. O mais terrível é que todas as atrocidades cometidas pelo criminoso são praticadas na frente do público alienado presente no local. Eles acreditam que tudo faz parte do \"show\", ignorando os pedidos de socorro dos jovens.', 
            'duraction' => '89', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 27)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '398173', 
            'title' => 'A Casa que Jack Construiu', 
            'original_title' => 'The House That Jack Built', 
            'poster' => 'http://image.tmdb.org/t/p/original/6Wd8NCH2aHDx6v2lp7SEH1PkLPG.jpg', 
            'country' => 'DK, FR, DE, SE', 
            'year' => 2018, 
            'direction' => 'Lars von Trier', 
            'cast' => 'Matt Dillon, Bruno Ganz, Uma Thurman, Siobhan Fallon Hogan, Sofie Gråbøl, Riley Keough, Jeremy Davies, Jack Mckenzie, Mathias Hjelm, Ed Speleers, Emil Tholstrup, Marijana Jankovic, Carina Skenhede, Robert Jezek, Osy Ikhile, Christian Arnold, Yoo Ji-tae, Johannes Bah Kuhnke, Jerker Fahlström, David Bailie, Robert G. Slade', 
            'synopsis' => 'Um dia, durante um encontro fortuito na estrada, o arquiteto Jack (Matt Dillon) mata uma mulher. Este evento provoca um prazer inesperado no personagem, que passa a assassinar dezenas de pessoas ao longo de doze anos. Devido ao descaso das autoridades e à indiferença dos habitantes locais, o criminoso não encontra dificuldade em planejar seus crimes, executá-los ao olhar de todos e guardar os cadáveres num grande frigorífico. Tempos mais tarde, ele compartilha os seus casos mais marcantes com o sábio Virgílio (Bruno Ganz) numa jornada rumo ao inferno.', 
            'duraction' => '151', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 27)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 80)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '383498', 
            'title' => 'Deadpool 2', 
            'original_title' => 'Deadpool 2', 
            'poster' => 'http://image.tmdb.org/t/p/original/1StH1Yye2ssizggxgH20prw8eEF.jpg', 
            'country' => 'US', 
            'year' => 2018, 
            'direction' => 'David Leitch, Ana Oparnica Sebal, Paul Barry', 
            'cast' => 'Ryan Reynolds, Josh Brolin, Morena Baccarin, Julian Dennison, Zazie Beetz, T.J. Miller, Leslie Uggams, Karan Soni, Brianna Hildebrand, Jack Kesy, Eddie Marsan, Shiori Kutsuna, Stefan Kapičić, Andre Tricoteux, Randal Reeder, Nikolai Witschl, Thayr Harris, Rob Delaney, Lewis Tan, Bill Skarsgård, Terry Crews, Brad Pitt, Paul Wu, Robert Maillet, Alan Tudyk, Matt Damon, Michasha Armstrong, Hayley Sales, Islie Hirvonen, Joe Doserro, Jagua Arneja, Gerry South, Mike Dopud, Luke Roessler, Andy Canete, Tanis Dolman, Eleanor Walker, Hunter Dillon, Sala Baker, Sonia Sunger, Paul Wernick, Rhett Reese, Abiola Uthman, Tony Bailey, David Leitch, Hugh Jackman, James McAvoy, Nicholas Hoult, Kodi Smit-McPhee, Alexandra Shipp, Evan Peters, Tye Sheridan, David Berón, Richard Epcar, Lex Lang, David Michie, Andrew Morgado, Ben Pronsky, Dean Wein', 
            'synopsis' => 'Quando o super soldado Cable chega em uma missão para assassinar o jovem mutante Russel, o mercenário Deadpool precisa aprender o que é ser herói de verdade para salvá-lo. Para isso, ele recruta seu velho amigo Colossus e forma o novo grupo X-Force, sempre com o apoio do fiel escudeiro Dopinder.', 
            'duraction' => '119', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '439079', 
            'title' => 'A Freira', 
            'original_title' => 'The Nun', 
            'poster' => 'http://image.tmdb.org/t/p/original/9ShELeGBnk5HYgI0cLfDuS4JMb3.jpg', 
            'country' => 'US', 
            'year' => 2018, 
            'direction' => 'Corin Hardy, Cleopatra Medvetchi, Jody Blose', 
            'cast' => 'Bonnie Aarons, Taissa Farmiga, Demián Bichir, Jonas Bloquet, Charlotte Hope, Ingrid Bisu, Jonny Coyne, Sandra Teles, August Maturo, Michael Smiley, Dee Bradley Baker, Debra Wilson, Mark Steger, Gabrielle Downey, David Horovitch, Lili Bordán, Daniel Mandehr, Christof Veillon, Jared Morgan, Boiangiu Alma, Lidiya Korotko, Tudor Munteanu, Manuela Ciucur, Jack Falk, Lynnette Gaza, Ani Sava, Scarlett Hicks, Izzie Coffey, Laur Dragan, Eugeniu Cozma, Beatrice Péter, Ana Udroiu, Andreea Sovan, Dana Voicu, Andreea Moldovianu, Beatrice Rubica, Claudia Susanu, Patrick Wilson, Vera Farmiga', 
            'synopsis' => 'Quando uma jovem freira em uma abadia de clausura na Romênia tira a própria vida, um padre com um passado assombrado e uma noviça no limiar de seus votos finais são enviados pelo Vaticano para investigar o caso. Juntos, eles descobrem o segredo profano da ordem. Arriscando não apenas suas vidas, mas sua fé e suas próprias almas, eles enfrentam uma força maléfica na forma da mesma freira demoníaca que primeiro aterrorizou o público em \"Invocação do Mal 2\", enquanto a abadia se torna um campo de batalha horrível entre os vivos e os condenados.', 
            'duraction' => '96', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 27)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 9648)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '438808', 
            'title' => 'White Boy Rick', 
            'original_title' => 'White Boy Rick', 
            'poster' => 'http://image.tmdb.org/t/p/original/l15r2aLqdifXM9GFsJLkOq5Y8SI.jpg', 
            'country' => 'US', 
            'year' => 2018, 
            'direction' => 'Yann Demange', 
            'cast' => 'Richie Merritt, Matthew McConaughey, Jennifer Jason Leigh, Bel Powley, RJ Cyler, Rory Cochrane, Eddie Marsan, Bruce Dern, Piper Laurie, Brian Tyree Henry, Taylour Paige, Jonathan Majors, Kyanna Simone Simpson, Lawrence Adimora, Brad Carter, Brian Wolfman Black Bowman, Gaynelle W. Sloman, Derrick Gilliam, Yassie Hawkes, Lauren Ashley Berry, Tyler Joseph Campbell, Joe Fishel', 
            'synopsis' => 'A história de Richard Wershe Jr. (Richie Merritt) que, em meados da década de 1980, quando tinha apenas 14 anos, se tornou um informante disfarçado para a polícia. Depois acabou virando um grande traficante de drogas e, quando tinha 17 anos, sua vida dupla foi desmascarada ao ser pego com 17 quilos de cocaína. Richard foi condenado a prisão perpétua.', 
            'duraction' => '116', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 80)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '429203', 
            'title' => 'The Old Man & the Gun', 
            'original_title' => 'The Old Man & the Gun', 
            'poster' => 'http://image.tmdb.org/t/p/original/fXZyZJuWDG1kXZ0XyHDIAaOqUQk.jpg', 
            'country' => 'US', 
            'year' => 2018, 
            'direction' => 'David Lowery', 
            'cast' => 'Robert Redford, Sissy Spacek, Casey Affleck, Danny Glover, Tom Waits, Tika Sumpter, Elisabeth Moss, Isiah Whitlock Jr., Keith Carradine, John David Washington, Augustine Frizzell, Ari Elizabeth Johnson, Teagan Johnson, Gene Jones, Robert Longstreet, Barlow Jacobs, Jennifer Joplin', 
            'synopsis' => '', 
            'duraction' => '93', 
            'type_id' => '2',
        ]);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 80)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);

        /* Página 1 / 2017 */
        $movie = Movie::create([
            'tmdb_id' => '671', 
            'title' => 'Harry Potter e a Pedra Filosofal', 
            'original_title' => 'Harry Potter and the Philosopher\'s Stone', 
            'poster' => 'http://image.tmdb.org/t/p/original/xdTCNX2bhgxqbuwd5r0KbLULbcb.jpg', 
            'country' => 'GB, US', 
            'year' => 2001, 
            'direction' => 'Chris Columbus, Annie Penn, Chris Carreras, Michael Stevenson, Michael Michael', 
            'cast' => 'Daniel Radcliffe, Rupert Grint, Emma Watson, Richard Harris, Tom Felton, Robbie Coltrane, Alan Rickman, Maggie Smith, Richard Griffiths, Ian Hart, Fiona Shaw, John Hurt, David Bradley, Matthew Lewis, Sean Biggerstaff, Warwick Davis, Harry Melling, James Phelps, Oliver Phelps, John Cleese, Chris Rankin, Alfie Enoch, Devon Murray, Jamie Waylett, Josh Herdman, Zoë Wanamaker, Julie Walters, Bonnie Wright, Luke Youngblood, Verne Troyer, Adrian Rawlins, Geraldine Somerville, Elizabeth Spriggs, Richard Bremmer, Nina Young, Terence Bayler, Harry Taylor, Jean Southern, Leslie Phillips, Simon Fisher-Becker, Derek Deadman, Ray Fearon, Eleanor Columbus, Ben Borowiecki, Danielle Tabor, Leilah Sutherland, Emily Dale, Will Theakston, Scot Fearn, Saunders Triplets, Jimmy Vee, Kieri Kennedy, Christina Petrou, Gemma Sandzer, Leila Hoffman, David Brett, Zoe Sugg, Hazel Showham', 
            'synopsis' => 'Harry Potter (Daniel Radcliffe) é um garoto órfão de 10 anos que vive infeliz com seus tios, os Dursley. Até que, repentinamente, ele recebe uma carta contendo um convite para ingressar em Hogwarts, uma famosa escola especializada em formar jovens bruxos. Inicialmente Harry é impedido de ler a carta por seu tio Válter (Richard Griffiths), mas logo ele recebe a visita de Hagrid (Robbie Coltrane), o guarda-caça de Hogwarts, que chega em sua casa para levá-lo até a escola. A partir de então Harry passa a conhecer um mundo mágico que jamais imaginara, vivendo as mais diversas aventuras com seus mais novos amigos, Rony Weasley (Rupert Grint) e Hermione Granger (Emma Watson).', 
            'duraction' => '152', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '181808', 
            'title' => 'Star Wars: Os Últimos Jedi', 
            'original_title' => 'Star Wars: The Last Jedi', 
            'poster' => 'http://image.tmdb.org/t/p/original/v1QQKq8M0fWxMgSdGOX1aCv8qMB.jpg', 
            'country' => 'US', 
            'year' => 2017, 
            'direction' => 'Rian Johnson, Jamie Christopher, Paula Casarin', 
            'cast' => 'Daisy Ridley, John Boyega, Oscar Isaac, Adam Driver, Mark Hamill, Carrie Fisher, Kelly Marie Tran, Laura Dern, Joonas Suotamo, Benicio del Toro, Frank Oz, Lupita Nyong\'o, Andy Serkis, Domhnall Gleeson, Gwendoline Christie, Anthony Daniels, Jimmy Vee, Bill Hader, Ben Schwartz, Dave Chapman, Brian Herring, Billie Lourd, Mark Lewis Jones, Amanda Lawrence, Tom Kane, Tim Rose, Mike Quinn, Adrian Edmondson, Veronica Ngo, Justin Theroux, Lily Cole, Joseph Gordon-Levitt, Warwick Davis, Gareth Edwards, Gary Barlow, Peter Mayhew, Edgar Wright, Joe Cornish, Hermione Corfield, Noah Segan, Jamie Christopher, Griffin Hamill, Nathan Hamill, Chelsea Hamill, Prince William, Prince Harry, Hugh Skinner, Paul Kasey, Kate Dickie, Ralph Ineson, Kiran Shah, Crystal Clarke, Liang Yang, Bern Collaço, Andy Nyman, Navin Chowdhry, Shauna Macdonald, Priyanga Burford, Michaela Coel', 
            'synopsis' => 'Após encontrar o mítico e recluso Luke Skywalker em uma ilha isolada, a jovem Rey busca entender o balanço da Força a partir dos ensinamentos do mestre jedi. Paralelamente, o Primeiro Império de Kylo Ren se reorganiza para enfrentar a Aliança Rebelde.', 
            'duraction' => '150', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '263115', 
            'title' => 'Logan', 
            'original_title' => 'Logan', 
            'poster' => 'http://image.tmdb.org/t/p/original/f0CtZbae9cXj8bkWdCHzUHx5lsR.jpg', 
            'country' => 'US', 
            'year' => 2017, 
            'direction' => 'James Mangold, Sheila Waldron, Aaron Wiener, Josh McLaglen, Michael Musteric, Garrett Warren', 
            'cast' => 'Hugh Jackman, Patrick Stewart, Dafne Keen, Boyd Holbrook, Stephen Merchant, Richard E. Grant, Sienna Novikov, Eriq La Salle, Elise Neal, Elizabeth Rodriguez, Doris Morgado, David Kallaway, Han Soto, Jayson Genao, Krzysztof Soszynski, Alison Fernandez, Quincy Fouse, Al Coronel, Frank Gallegos, Anthony Escobar, Reynaldo Gallegos, Stephen Dunlevy, Daniel Bernhardt, Ryan Sturz, Brandon Melendy, Luke Hawx, Paul Andrew O\'Connor, Rocky Abou-Sakher, Jean Claude Leuyer, Jef Groff, Jeremy Fitzgerald, Chris Palermo, Clinton Roberts, Keith Jardine, Andrew Arrabito, Sebastian James, Aaron Matthews, Garrett Hammond, Matt McClain, Maureen Brennan, Hannah Westerfield, Bryant Tardy, Ashlyn Casalegno, Parker Lovein, Jimmy Gonzales, Lennie Loftin, Mark Ashworth, James Handy, Bryce Romero, Phi Vu, Chester Rushing, David Simpson, Lauren Gros, John Raymond, Vanessa Cloke, Katie Anne Mitchell, Lara Grice, James Moses Black, Ned Yousef, Baxter Humby, Daniel Hernández, Michael Lehr, Bryan Sloyer, John Bernecker, Joe Williams, Robert Wu, Victor Winters-Junco, Craig Henningsen, Evan Dane Taylor, Toby Holguin, Panuvat Anthony Nanakornpanom, Eyad Elbitar, Rissa Rose Kilar, Salef Celiz, Aidan Kennedy, Chase Cubia, Vincenzo Lucatorto, Haley Glass, Nayah Murphy, Emma Teo, Noell Jellison, Ella Rowbotham, Hudson Wright, Sebeon Jackson, Kelton DuMont, Damon Carney, Cynthia Woods, Mali O\'Connor, Robert Vargas, David Paris, Ted Ferguson, Juan Gaspard, Christopher Heskey, Julia Holt, Natosha Humphrey, Lizeth Hutchings, Donald M. Krause, Justin Lebrun, Gentry Lee, Gonzalo Robles, Daymond C. Roman, Mary Peyton Stewart, Michael Love Toliver, Gregory Paul Valdez, Dave Davis', 
            'synopsis' => 'Em 2029, Logan (Hugh Jackman) ganha a vida como chofer de limousine para cuidar do nonagenário Charles Xavier (Patrick Stewart). Debilitado fisicamente e esgotado emocionalmente, ele é procurado por Gabriela (Elizabeth Rodriguez), uma mexicana que precisa da ajuda do ex-X-Men para defender a pequena Laura Kinney / X-23 (Dafne Keen). Ao mesmo tempo em que se recusa a voltar à ativa, Logan é perseguido pelo mercenário Donald Pierce (Boyd Holbrook), interessado na menina.', 
            'duraction' => '135', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '284053', 
            'title' => 'Thor: Ragnarok', 
            'original_title' => 'Thor: Ragnarok', 
            'poster' => 'http://image.tmdb.org/t/p/original/6sVtz4UEgcFUqEOnFGPnGgoePow.jpg', 
            'country' => 'US', 
            'year' => 2017, 
            'direction' => 'Taika Waititi, Vincent Lascoumes, Ben Cooke, Kerry Lyn McKissick, Tom Hooper', 
            'cast' => 'Chris Hemsworth, Tom Hiddleston, Cate Blanchett, Idris Elba, Jeff Goldblum, Tessa Thompson, Karl Urban, Mark Ruffalo, Anthony Hopkins, Taika Waititi, Tadanobu Asano, Ray Stevenson, Zachary Levi, Benedict Cumberbatch, Rachel House, Clancy Brown, Scarlett Johansson, Stan Lee, Sam Neill, Luke Hemsworth, Matt Damon, Charlotte Nicdao, Georgia Blizzard, Amali Golden, Ashley Ricardo, Shalom Brune-Franklin, Taylor Hemsworth, Cohen Holloway, Alia Seror-O\'Neill, Sophia Laryea, Stephen Oliver, Hamish Parkinson, Jasper Bagg, Sky Castanho, Shari Sebbens, Richard Green, Sol Castanho, Jet Tranter, Samantha Hopper, Eloise Winestock, Rob Mayes, Tahlia Jade, Winnie Mzembe, Sean Edward Frazer, Connor Zegenhagen, Tracie Filmer, Tracey Lee Maxwell, Beatrice Ward, Donnie Baxter, Greta Carew-Johns, Adam Green, Mollie McGregor, Sophia McGregor', 
            'synopsis' => 'Thor está aprisionado do outro lado do universo, sem seu martelo, e se vê em uma corrida para voltar até Asgard e impedir o Ragnarok, a destruição de seu lar e o fim da civilização asgardiana que está nas mãos de uma nova e poderosa ameaça, a terrível Hela. Mas primeiro ele precisa sobreviver a uma batalha de gladiadores que o coloca contra seu ex-aliado e vingador, o Incrível Hulk.', 
            'duraction' => '130', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '335984', 
            'title' => 'Blade Runner 2049', 
            'original_title' => 'Blade Runner 2049', 
            'poster' => 'http://image.tmdb.org/t/p/original/zppVzoeQvds6FPTzcMww6chPIks.jpg', 
            'country' => 'CA, US, HU, GB', 
            'year' => 2017, 
            'direction' => 'Denis Villeneuve', 
            'cast' => 'Ryan Gosling, Harrison Ford, Ana de Armas, Robin Wright, Sylvia Hoeks, Mackenzie Davis, Jared Leto, Carla Juri, Lennie James, Dave Bautista, David Dastmalchian, Barkhad Abdi, Hiam Abbass, Wood Harris, Edward James Olmos, Tómas Lemarquis, Sallie Harmsen, Sean Young, Loren Peta, Mark Arnold, Krista Kosonen, Elarica Johnson, Kingston Taylor, David Benson, Ben Thompson, Suzie Kennedy, Stephen Triffitt, Ellie Wright, Vilma Szécsi, Kincsö Sánta, André Lukács Molnár, István Göz, Pál Nyári, Joshua Tersoo Allagh, Zoltán Béres, Konstantin Pál, Ferenc Györgyi, Samuel Brown', 
            'synopsis' => 'Trinta anos após os eventos do primeiro filme, um novo agente de LAPD, o oficial K (Ryan Gosling), descobre um segredo há muito enterrado que tem o potencial de mergulhar o que resta da sociedade no caos. A descoberta de K leva-o em uma missão para encontrar Rick Deckard (Harrison Ford), um ex-corredor de LAPD que está desaparecido há 30 anos.', 
            'duraction' => '184', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '141052', 
            'title' => 'Liga da Justiça', 
            'original_title' => 'Justice League', 
            'poster' => 'http://image.tmdb.org/t/p/original/geyu6rplpbp7OUeOfB2uRVf1LpG.jpg', 
            'country' => 'US', 
            'year' => 2017, 
            'direction' => 'Zack Snyder, Jesse Peckham, Kimi Webber', 
            'cast' => 'Ben Affleck, Henry Cavill, Gal Gadot, Ezra Miller, Jason Momoa, Ray Fisher, Ciarán Hinds, Amy Adams, Jeremy Irons, Diane Lane, Connie Nielsen, J.K. Simmons, Billy Crudup, Joe Morton, Amber Heard, Michael McElhatton, Joe Manganiello, Jesse Eisenberg, Robin Wright, David Thewlis, Julian Lewis Jones, Marc McClure, Lisa Loven Kongsli, Holt McCallany, Ingvar Eggert Sigurðsson, Gemma Refoufi, Kelly Burke, Paulina Boneva, Alexandra Ford, Eleanor Matsuura, Daniel Stisen, Samantha Jo, Sergi Constance, Doutzen Kroes, Dan Mersh, Peter Vo, Caitlin McKenna-Wilkinson, Robin Atkin Downes, Rajia Baroudi, Neil Dickson, Keith Ferguson, Lex Lang, Michelle Ruff, Salli Saffioti, David Shaughnessy, Alan Shearman, Kaiji Tang, Matthew Wolf', 
            'synopsis' => 'Movido pela fé restaurada na humanidade e inspirado pelo ato de coragem do Superman, Bruce Wayne e a sua nova aliada, Diana Prince, enfrentam um inimigo ainda maior. Juntos, Batman e Mulher-Maravilha vão recrutar uma equipa de meta-humanos e fazer frente à mais recente ameaça mundial. A eles juntam-se Aquaman, Flash e o Cyborg, mas será que chegam a tempo de salvar o mundo?', 
            'duraction' => '120', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '27205', 
            'title' => 'A Origem', 
            'original_title' => 'Inception', 
            'poster' => 'http://image.tmdb.org/t/p/original/5hVXWyB1NaDu6dHCcgYEe7hyUhS.jpg', 
            'country' => 'GB, US', 
            'year' => 2010, 
            'direction' => 'Christopher Nolan', 
            'cast' => 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page, Tom Hardy, Ken Watanabe, Cillian Murphy, Marion Cotillard, Michael Caine, Dileep Rao, Tom Berenger, Pete Postlethwaite, Lukas Haas, Talulah Riley, Tohoru Masamune, Taylor Geare, Claire Geare, Johnathan Geare, Yuji Okumoto, Earl Cameron, Ryan Hayward, Miranda Nolan, Russ Fega, Tim Kelleher, Coralie Dedykere, Silvie Laguna, Virgile Bramly, Nicolas Clerc, Jean-Michel Dagory, Marc Raducci, Tai-Li Lee, Magnus Nolan, Helena Cullinan, Mark Fleischmann, Shelley Lang, Adam Cole, Jack Murray, Kraig Thornber, Angela Nathenson, Natasha Beaumont, Carl Gilliard, Jill Maddrell, Alex Lombard, Nicole Pulliam, Peter Basham, Michael Gaston, Felix Scott, Andrew Pleavin, Lisa Reynolds, Jason Tendell, Jack Gilroy, Shannon Welles', 
            'synopsis' => 'Em um mundo onde é possível entrar na mente humana, Cobb (Leonardo DiCaprio) está entre os melhores na arte de roubar segredos valiosos do inconsciente, durante o estado de sono. Além disto ele é um fugitivo, pois está impedido de retornar aos Estados Unidos devido à morte de Mal (Marion Cotillard). Desesperado para rever seus filhos, Cobb aceita a ousada missão proposta por Saito (Ken Watanabe), um empresário japonês: entrar na mente de Richard Fischer (Cillian Murphy), o herdeiro de um império econômico, e plantar a ideia de desmembrá-lo. Para realizar este feito ele conta com a ajuda do parceiro Arthur (Joseph Gordon-Levitt), a inexperiente arquiteta de sonhos Ariadne (Ellen Page) e Eames (Tom Hardy), que consegue se disfarçar de forma precisa no mundo dos sonhos.', 
            'duraction' => '148', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 9648)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '283995', 
            'title' => 'Guardiões da Galáxia Vol. 2', 
            'original_title' => 'Guardians of the Galaxy Vol. 2', 
            'poster' => 'http://image.tmdb.org/t/p/original/hXi3ExbRXnZCPbdHQkppQdcdMUF.jpg', 
            'country' => 'US', 
            'year' => 2017, 
            'direction' => 'James Gunn, James Gunn', 
            'cast' => 'Chris Pratt, Zoe Saldana, Dave Bautista, Vin Diesel, Bradley Cooper, Michael Rooker, Karen Gillan, Pom Klementieff, Elizabeth Debicki, Chris Sullivan, Sean Gunn, Sylvester Stallone, Kurt Russell, Wyatt Oleff, Laura Haddock, Gregg Henry, Seth Green, Fred, Evan Jones, Jimmy Urine, Stephen Blackehart, Steve Agee, Mike Escamilla, Joe Fria, Terence Rosemore, Tommy Flanagan, Richard Christy, Michael Rosenbaum, Ving Rhames, Michelle Yeoh, Miley Cyrus, Stan Lee, David Hasselhoff, Rob Zombie, Jeff Goldblum, Ben Browder, Jim Gunn Sr., Leota Gunn, Hannah Gottesman, Hilty Bowen, Alexander Klein, Luke Cook, Blondy Baruti, Kendra Carelli, Milynn Sarley, Sierra Love, Molly C. Quinn, Rhoda Griffis, Mac Wells, Elizabeth Ludlow, Damita Jane Howard, Donny Carrington, Brian Clackley, Nea Dune, Fred Galle, Stephen Vining, Tahseen Ghauri, Alphonso A\'Qen-Aten Jackson, Kelly Richardson, Guillermo Rodriguez, Josh Tipis, Jason Williams, Cheyanna Lavon Zubas, Aaron Schwartz', 
            'synopsis' => 'Peter Quill (Chris Pratt), Gamora (Zoe Saldana), Rocket Racoon (voz de Bradley Cooper), Baby Groot (voz de Vin Diesel) e Drax (Dave Bautista) provaram que, apesar das desavenças, formam uma equipe e tanto. Agora, Peter descobre segredos sobre a identidade de seu pai e na busca por ele, inimigos acabam se tornando aliados.', 
            'duraction' => '136', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '316029', 
            'title' => 'O Rei do Show', 
            'original_title' => 'The Greatest Showman', 
            'poster' => 'http://image.tmdb.org/t/p/original/w5EPR88Kz73eRvnwmgUUKcZQt27.jpg', 
            'country' => 'US', 
            'year' => 2017, 
            'direction' => 'Michael Gracey, Peter Kohn, Deanna Leslie, Mary Bailey, Sheila Waldron', 
            'cast' => 'Hugh Jackman, Michelle Williams, Zac Efron, Zendaya, Rebecca Ferguson, Keala Settle, Yahya Abdul-Mateen II, Paul Sparks, Sam Humphrey, Austyn Johnson, Cameron Seely, Eric Anderson, Ellis Rubin, Skylar Dunn, Fredric Lehne, Kathryn Meisle, Daniel Everidge, Radu Spinghel, Yusaku Komori, Danial Son, Will Swenson, Linda Marie Larson, Byron Jennings, Betsy Aidem, Damian Young, Tina Benko, Gayle Rankin, Arnie Burton, Natasha Liu Bordizzo, Luciano Acuna Jr., Shannon Holtzapffel, Nick Jantz, Jonathan Redavid, Timothy Hughes, Jeremy Hudson, Taylor James, Chelsea Caso, Caoife Coleman, Mishay Petronelli, Loren Allred, Ziv Zaifman, Marko Caka, Isaac Eshete, Carly Adams', 
            'synopsis' => 'De origem humilde e desde a infância sonhando com um mundo mágico, P.T. Barnum (Hugh Jackman) desafia as barreiras sociais se casando com a filha do patrão do pai e dá o pontapé inicial na realização de seu maior desejo abrindo uma espécie de museu de curiosidades. O empreendimento fracassa, mas ele logo vislumbra uma ousada saída: produzir um grande show estrelado por freaks, fraudes, bizarrices e rejeitados de todos os tipos.', 
            'duraction' => '104', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '76338', 
            'title' => 'Thor: O Mundo Sombrio', 
            'original_title' => 'Thor: The Dark World', 
            'poster' => 'http://image.tmdb.org/t/p/original/9ySzOgYbKEHFDjMgsKPMuzN9M2z.jpg', 
            'country' => 'US', 
            'year' => 2013, 
            'direction' => 'Alan Taylor', 
            'cast' => 'Chris Hemsworth, Natalie Portman, Tom Hiddleston, Anthony Hopkins, Stellan Skarsgård, Idris Elba, Christopher Eccleston, Adewale Akinnuoye-Agbaje, Kat Dennings, Ray Stevenson, Tadanobu Asano, Zachary Levi, Jaimie Alexander, Rene Russo, Chris O\'Dowd, Alice Krige, Jonathan Howard, Benicio del Toro, Ophelia Lovibond, Tony Curran, Clive Russell, Richard Brake, Chris Evans, Stan Lee, Elsa Pataky, Ramone Morgan, Obada Alassadi, Imaan Chentouf, Claire Brown, Henry Calcutt, Ava Caton, Abbie McCann, Thomas Arnold, Sam Swainsbury, Connor Donaghey, Royce Pierreson, Annabel Norbury, Sophie Cosson, Justin Edwards, Gruffudd Glyn, Steve Scott, Brett Tucker, Talulah Riley, Richard Wharton', 
            'synopsis' => 'Enquanto Thor (Chris Hemsworth) liderava as últimas batalhas para conquistar a paz entre os Nove Reinos, o maldito elfo negro Malekith (Christopher Eccleston) acordava de um longo sono, sedento de vingança e louco para levar todos para a escuridão eterna. Alertado do perigo por Odin (Anthony Hopkins), o herói precisa contar com a ajuda dos companheiros Volstagg (Ray Stevenson), Sif (Jaimie Alexander), entre outros, e até de seu irmão, o traiçoeiro Loki (Tom Hiddleston), em um plano audacioso para salvar o universo do grande mal. Mas os caminhos de Thor e da amada Jane Foster (Natalie Portman) se cruzam novamente e, dessa vez, a vida dela está realmente em perigo.', 
            'duraction' => '112', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '672', 
            'title' => 'Harry Potter e a Câmara Secreta', 
            'original_title' => 'Harry Potter and the Chamber of Secrets', 
            'poster' => 'http://image.tmdb.org/t/p/original/811j0Jf2D0mK1U6RxXJoZgOB29n.jpg', 
            'country' => 'DE, GB, US', 
            'year' => 2002, 
            'direction' => 'Chris Columbus, David Hanks, Annie Penn, Chris Carreras, Fiona Richards, William Dodds', 
            'cast' => 'Daniel Radcliffe, Rupert Grint, Emma Watson, Richard Harris, Alan Rickman, Tom Felton, Kenneth Branagh, Robbie Coltrane, Maggie Smith, David Bradley, Bonnie Wright, Matthew Lewis, Jason Isaacs, Shirley Henderson, Toby Jones, James Phelps, Oliver Phelps, Richard Griffiths, Fiona Shaw, Harry Melling, John Cleese, Julie Walters, Mark Williams, Jamie Waylett, Josh Herdman, Alfie Enoch, Devon Murray, Sean Biggerstaff, Hugh Mitchell, Chris Rankin, Warwick Davis, Robert Hardy, Miriam Margolyes, Gemma Jones, Christian Coulson, Edward Randell, Luke Youngblood, Eleanor Columbus, Louis Doyle, Emily Dale, Rochelle Douglas, Leslie Phillips, Julian Glover, Martin Bayfield, Gemma Padley, Danielle Tabor, Jamie Yeates, Charlotte Skeoch, Helen Stuart, Nina Young, Adrian Rawlins, Geraldine Somerville, Jim Norton, Veronica Clifford, Heather Bleasdale, Tom Knight, Ben Borowiecki, Kathleen Cauley, Alfred Burke, Peter O\'Farrell, Violet Columbus, Harry Taylor', 
            'synopsis' => 'De férias na casa de seus tios Dursley, Harry Potter (Daniel Radcliffe) recebe a inesperada visita de Dobby, um elfo doméstico, que veio avisá-lo para não retornar à Escola de Magia de Hogwarts, pois lá correrá um grande perigo. Harry não lhe dá ouvidos e decide retornar aos estudos, enfrentando um 2º ano recheado de novidades. Uma delas é a contratação do novo Professor de Defesa Contra as Artes das Trevas, Gilderoy Lockhart (Kenneth Branagh), que é considerado um grande galã e não perde uma oportunidade de fazer marketing pessoal. Porém, o aviso de Dobby se confirma e logo toda Hogwarts está envolvida em um mistério que resulta no aparecimento de alunos petrificados.', 
            'duraction' => '161', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '297762', 
            'title' => 'Mulher-Maravilha', 
            'original_title' => 'Wonder Woman', 
            'poster' => 'http://image.tmdb.org/t/p/original/ujQthWB6c0ojlARk28NSTmqidbF.jpg', 
            'country' => 'US', 
            'year' => 2017, 
            'direction' => 'Patty Jenkins, Patty Jenkins', 
            'cast' => 'Gal Gadot, Chris Pine, Connie Nielsen, Robin Wright, Danny Huston, David Thewlis, Saïd Taghmaoui, Ewen Bremner, Eugene Brave Rock, Lucy Davis, Elena Anaya, Lilly Aspell, Lisa Loven Kongsli, Ann Wolfe, Ann Ogbomo, Emily Carey, James Cosmo, Wolf Kahler, Alexander Mercury, Martin Bishop, Flora Nicholson, Pat Abernethy, Freddy Elletson, Sammy Hayman, Michael Tantrum, Philippe Spall, Edward Wolstenholme, Ian Hughes, Marko Leht, Steffan Rhodri, Andrew Byron, Dominic Kinnaird, Rachel Pickup, Ulli Ackermann, Frank Allen Forbes, Peter Stark, Rainer Bock, Josh Bromley, Jennie Eggleton, Eva Dabrowski, Harvey James, George Johnston, Danielle Lewis, Florence Kasumba, Eleanor Matsuura, Josette Simon, Doutzen Kroes, Hayley Warnes, Caitlin Burles, Jemma Moore, Samantha Jo, Brooke Ence, Madeleine Vall, Hari James, Jacqui-Lee Pryce, Betty Adewole, Caroline Maria Winberg, Lizzie Bowden, Kattreya Scheurer-Smith, Rekha Luther, Thaina Oliveira, Ooooota Adepo, Zinnia Kumar, Toma McDonagh, Amber Doyle, Freddy Carter, Fred Fergus, Tim Pritchett, Gana Bayarsaikhan, Camilla Roholm, Stephanie Haymes-Roven, Nia Burke, Dee Lewis Clay, Tori Letzler', 
            'synopsis' => 'Treinada desde cedo para ser uma guerreira imbatível, Diana Prince (Gal Gadot) nunca saiu da paradisíaca ilha em que é reconhecida como Princesa das Amazonas. Quando o piloto Steve Trevor (Chris Pine) se acidenta e cai numa praia do local, ela descobre que uma guerra sem precedentes está se espalhando pelo mundo e decide deixar seu lar certa de que pode parar o conflito. Lutando para acabar com todas as lutas, Diana percebe o alcance de seus poderes e sua verdadeira missão na Terra.', 
            'duraction' => '141', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10752)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '315635', 
            'title' => 'Homem-Aranha: De Volta ao Lar', 
            'original_title' => 'Spider-Man: Homecoming', 
            'poster' => 'http://image.tmdb.org/t/p/original/9Fgs1ewIZiBBTto1XDHeBN0D8ug.jpg', 
            'country' => 'US', 
            'year' => 2017, 
            'direction' => 'Jon Watts, Kerry Lyn McKissick', 
            'cast' => 'Tom Holland, Michael Keaton, Marisa Tomei, Jacob Batalon, Tony Revolori, Zendaya, Robert Downey Jr., Jon Favreau, Donald Glover, Tyne Daly, Gwyneth Paltrow, Kerry Condon, Chris Evans, Laura Harrier, Garcelle Beauvais, Jennifer Connelly, Hemky Madera, Bokeem Woodbine, Logan Marshall-Green, Michael Chernus, Michael Mando, Christopher Berry, Kenneth Choi, Hannibal Buress, Martin Starr, Selenis Leyva, Tunde Adebimpe, John Penick, Isabella Amara, Jorge Lendeborg Jr., Josie Totah, Abraham Attah, Tiffany Espensen, Angourie Rice, Michael Barbieri, Ethan Dizon, Martha Kelly, Kirk R. Thatcher, Stan Lee, Jona Xiao, Gary Weeks, Zach Cherry, Yu Lew, Sondra James, Bob Adrian, Gary Richardson, Joe Hang, Wayne Pére, Alexa Laraki, Liza Fagin, Miles Mussenden, Lorenzo James Henrie, Jonah Bowling, Rebeca Donovan, Amy Hill, Kevin LaRosa Jr., Ren Colley, Jennifer Kim, Ari Groover, Louis Gonzalez, Stewart Steinberg, Andy Powers, Omar Capra, Nitin Nohria, Vince Foster, Brian Schaeffer, Chris Adams, Myles Anderson, Cassidy Balkcom, Sydney Shea Barker, Jeremy Francis Bell, Romar Bennett, Jonnah-Blaine Bowling, Maiya Boyd, Dante Brattelli, Michael Breath, Lauren Brumbelow, Wayne Burley, Randy Burnett, Liam Capek, London Carlisle, Leonardo Collaguazo, Richard R. Corapi, Marmee Regine Cosico, Joy Costanza, Roy Coulter, John Druzba, Elli, Adrian Favela, Gregory French, Tahseen Ghauri, Davvy Glab, Melissa Kay Glaze, Emelita T. Gonzalez, Austin Handle, Jonathan Randall Hunter, Jada Jarvis, Jerome Joyce, Faith Logan, Destiny Lopez, Sherin Maldonado, Melvin Kindall Myles, Donald K. Overstreet, Darshan Patel, Felix Perez, Calvin Powell, Salena Qureshi, Hallie Ricardo, Doug Scroggins III, Chris Sepulveda, Johnny Serret, Stephen Vining, Megan Wilkens, Nickolas Wolf, Trevor Wolf, Tiani Wright, Friday Chamberlain', 
            'synopsis' => 'Depois de atuar ao lado dos Vingadores, chegou a hora do pequeno Peter Parker (Tom Holland) voltar para casa e para a sua vida, já não mais tão normal. Lutando diariamente contra pequenos crimes nas redondezas, ele pensa ter encontrado a missão de sua vida quando o terrível vilão Abutre (Michael Keaton) surge amedrontando a cidade. O problema é que a tarefa não será tão fácil como ele imaginava.', 
            'duraction' => '133', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '354912', 
            'title' => 'Viva - A Vida é uma Festa', 
            'original_title' => 'Coco', 
            'poster' => 'http://image.tmdb.org/t/p/original/6oNm06TPz2vGiPc2I52oXW3JwPS.jpg', 
            'country' => 'US', 
            'year' => 2017, 
            'direction' => 'Lee Unkrich, Adrian Molina', 
            'cast' => 'Anthony Gonzalez, Gael García Bernal, Benjamin Bratt, Alanna Ubach, Renée Victor, Ana Ofelia Murguía, Edward James Olmos, Antonio Sol, Alfonso Aráu, Selene Luna, Dyana Ortelli, Herbert Siguenza, Jaime Camil, Sofía Espinosa, Luis Valdez, Polo Rojas, Montse Hernandez, Lombardo Boyar, Octavio Solis, Gabriel Iglesias, Cheech Marin, Carla Medina, Blanca Araceli, Natalia Córdova-Buckley, Salvador Reyes, John Ratzenberger, Memo Aponte, Liliana Barba Meinecke, Emmanuel Bernal, David Beron, Denise Blasor, Wilma Bonet, Alex Castillo, Vicki Davis, Daniel Diaz, Roberto Donati, Efrain Figueroa, Deb Fink, Libertad García Fonzi, Emilio Fuentes, Daniella Garcia-Lorido, Mike Gomez, Lillian Groag, Joshua Guerrero, Montse Hernandez, Marabina Jaimes, Jossara Jinaro, Christian Lanz, Constanza Lechuga, Luisa Leschin, Ruth Livier, Maria Dominique Lopez, Valeria Maldonado, Richard Miro, Adrian Molina, Daniel Edward Mora, Vivianne Nacif, Adriana Sevahn Nichols, Jonathan Nichols, Arthur Ortiz, Jessica Pacheco, Juan Pacheco, Jacqueline Pinol, James Ponce, Al Rodrigo, J. Francisco Rodriguez, Polo Rojas, Eduardo Roman, Eddie Santiago, Melissa Santos, Luis Solís, Rosalba Sotelo, Chris Triana, Trujo, Lee Unkrich, Ruth Zalduondo, James Zavaleta, Bernardo Cubria, Gary Carlos Cervantes, Johnny A. Sanchez, Levi Nunez, Óscar Bonfiglio, Lalo Alcaraz, Marcela Davison Aviles, Carolina Ángel', 
            'synopsis' => 'Miguel é um menino de 12 anos que quer em ser um músico famoso, mas deve lidar com sua família que desaprova seu sonho. Determinado a virar o jogo, o jovem  acaba desencadeando uma série de eventos ligados a um mistério de 100 anos. A aventura, com inspiração no feriado mexicano do Dia dos Mortos, acaba gerando uma extraordinária reunião familiar.', 
            'duraction' => '109', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 16)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '399055', 
            'title' => 'A Forma da Água', 
            'original_title' => 'The Shape of Water', 
            'poster' => 'http://image.tmdb.org/t/p/original/hHPFq7myTjAVH6CwQjamAuUqhrr.jpg', 
            'country' => 'US', 
            'year' => 2017, 
            'direction' => 'Pierre Henry, Guillermo del Toro, Dug Rotstein', 
            'cast' => 'Sally Hawkins, Doug Jones, Michael Shannon, Richard Jenkins, Octavia Spencer, Michael Stuhlbarg, David Hewlett, Nick Searcy, Stewart Arnott, Nigel Bennett, Lauren Lee Smith, Martin Roach, Allegra Fulton, John Kapelos, Morgan Kelly, Wendy Lyon, Madison Ferguson, Jayden Greig, Deney Forrest, Brandon McKnight, Dru Viergever, Cyndy Day, Marvin Kaye, Jim Pagiamtzis, Cameron Laurie, Alexey Pankratov, Shane Clinton Jarvis, Evgeny Akimov, Dave Reachill, Matthew Mease, Amanda Smith, Maxine Grossman, Edward Tracz, Shaila D\'Onofrio, Vanessa Oude-Reimerink, Sergey Nikonov, Jonelle Gunderson, Cylde Whitham, Dan Lett, Danny Waugh, Karen Glave, Diego Fuentes, Cody Ray Thompson', 
            'synopsis' => 'Década de 60. Em meio aos grandes conflitos políticos e bélicos e as grandes transformações sociais ocorridas nos Estados Unidos, Elisa (Sally Hawkins), zeladora em um laboratório experimental secreto do governo, conhece e se afeiçoa a uma criatura fantástica mantida presa no local. Para elaborar um arriscado plano de fuga ela recorre a um vizinho (Richard Jenkins) e à colega de trabalho Zelda (Octavia Spencer).', 
            'duraction' => '123', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10749)->first();
        $movie->genres()->attach($genre->id);

        /* Página 1 / 2016 */
        $movie = Movie::create([
            'tmdb_id' => '269149', 
            'title' => 'Zootopia - Essa Cidade é o Bicho', 
            'original_title' => 'Zootopia', 
            'poster' => 'http://image.tmdb.org/t/p/original/cp9KdbU76GOMUPXBBnINKUHs4ds.jpg', 
            'country' => 'US', 
            'year' => 2016, 
            'direction' => 'Byron Howard, Rich Moore', 
            'cast' => 'Ginnifer Goodwin, Jason Bateman, Shakira, Idris Elba, Octavia Spencer, J.K. Simmons, Alan Tudyk, Jenny Slate, Bonnie Hunt, Don Lake, Tom Lister Jr., Tommy Chong, Kristen Bell, Katie Lowes, Josh Dallas, John DiMaggio, Nate Torrence, Maurice LaMarche, Kath Soucie, Mark Smith, Rich Moore, Byron Howard, Jared Bush, Della Saba, Phil Johnston, Gita Reddy, Jesse Corti, Leah Latham, Peter Mansbridge, Josie Trinidad, John Lavelle, Evelyn Wilson Bresee, Hewitt Bush, Jill Cordes, Madeleine Curry, Terri Douglas, Melissa Goodwin Shepherd, Zach King, Dave Kohut, Raymond S. Persi, Fuschia!, Jeremy Milton, Pace Paulsen, Fabienne Rawley, Bradford Simonsen, Claire K. Smith, Jackson Stein, David A. Thibodeau, Hannah G. Williams, Vassos Alexander, Ricardo Boechat, David Campbell, Koura Kazumasa, Daveed Diggs', 
            'synopsis' => 'Judy Hopps é a pequena coelha de uma fazenda isolada, filha de agricultores que plantam cenouras há décadas. Mas ela tem sonhos maiores: pretende se mudar para a cidade grande, Zootopia, onde todas as espécies de animais convivem em harmonia, na intenção de se tornar a primeira coelha policial. Judy enfrenta o preconceito e as manipulações dos outros animais, mas conta com a ajuda inesperada da raposa Nick Wilde, conhecida por sua malícia e suas infrações. A inesperada dupla se dedica à busca de um animal desaparecido, descobrindo uma conspiração que afeta toda a cidade.', 
            'duraction' => '108', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 16)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '381288', 
            'title' => 'Fragmentado', 
            'original_title' => 'Split', 
            'poster' => 'http://image.tmdb.org/t/p/original/ztYvYWpSpFtzM2w5MwsmNzzQbJg.jpg', 
            'country' => 'US', 
            'year' => 2017, 
            'direction' => 'M. Night Shyamalan', 
            'cast' => 'James McAvoy, Anya Taylor-Joy, Betty Buckley, Haley Lu Richardson, Jessica Sula, Brad William Henke, Sebastian Arcelus, Neal Huff, Kim Director, Lyne Renee, M. Night Shyamalan, Bruce Willis, Maria Breyman, Peter Patrikios, Roy James Wilson, Robert Bizik, Kerry Dutka, Izzie Coffey, Rosemary Howard, Jon Douglas Rainey, Junnie Lopez, Steven Dennis, Matthew Nadu, Barbara Edwards, Gary Ayash, Kash Goins, James Robinson Jr., Corinne Costa, John Mitchell, Andrea Havens, Shawn Gonzalez, Matthew Bowerman, Kelly Werkheiser, Aleksandra Svetlichnaya, Jalina Mercado, Michael J. Kraycik, Michelle Santiago, Michaela Bockarie, Colin Campbell, Jeff Buckner, Nakia Dillard, Vincent Riviezzo, John Jillard Sr., Julie Potter, Ukee Washington, Christopher Lee Philips', 
            'synopsis' => 'Kevin (James McAvoy) possui 23 personalidades distintas e consegue alterná-las quimicamente em seu organismo apenas com a força do pensamento. Um dia, ele sequestra três adolescentes que encontra em um estacionamento. Vivendo em cativeiro, elas passam a conhecer as diferentes facetas de Kevin e precisam encontrar algum meio de escapar.', 
            'duraction' => '117', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 27)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '259316', 
            'title' => 'Animais Fantásticos e Onde Habitam', 
            'original_title' => 'Fantastic Beasts and Where to Find Them', 
            'poster' => 'http://image.tmdb.org/t/p/original/kFgEl52DNhI6QqwN2CsKuxKl19T.jpg', 
            'country' => 'GB', 
            'year' => 2016, 
            'direction' => 'David Yates', 
            'cast' => 'Eddie Redmayne, Colin Farrell, Katherine Waterston, Dan Fogler, Alison Sudol, Jon Voight, Ron Perlman, Johnny Depp, Zoë Kravitz, Ezra Miller, Samantha Morton, Carmen Ejogo, Josh Cowdery, Ronan Raftery, Faith Wood-Blagrove, Jenn Murray, Gemma Chan, Peter Breitmayer, Kevin Guthrie, Sean Cronin, Sam Redford, Akin Gazi, Todd Boyce, Anne Wittman, Andreea Păduraru, Matthew Sim, Elizabeth Moynihan, Adam Lazarus, Lucie Pohl, Tim Bentinck, Bart Edwards, Brian F. Mulvey, Tristan Tait, Tom Clarke Hill, Cory Peterson, Jake Samuels, Max Cazier, Dan Hedaya, Christy Meyer, Guy Paul, Walles Hamonde, Dominique Tipper, Leo Heller, Miles Roughley, Erick Hayden, Paul Birchard, Tom Hodgkins, Ellie Haddington, Joseph Macnab, Martin Oelbermann, Richard Clothier, Christian Dixon, Richard Hardisty, Miquel Brown, Wunmi Mosaku, Cristian Solimeno, Matthew Wilson, Aretha Ayeh, Emmi, Nicholas McGaughey, Arinzé Kene, Jane Perry, Abi Adeyemi, Reid Anderson, Aileen Archer, Lee Asquith-Coe, Lasco Atkins, Robert-Anthony Artlett, Alphonso Austin, Michael Barron, Roy Beck, Marc Benanti, Nathan Benham, Paul Bergquist, Laura Bernardeschi, David J Biscoe, Lee Bolton, Annarie Boor, Elizabeth Briand, Neil Broome, Greg Brummel, Douglas Byrne, Fanny Carbonnel, David Charles-Cully, Stacey Clegg, Chloe Collingwood, Claire Cooper-King, Carmen Cowell, Silvia Crastan, Tom Dab, Craig Davies, Nick Davison, Chloe de Burgh, Paul Dewdney, Rudi Dharmalingam, Joshua Diffley, Nick Donald, Richard Douglas, Henry Douthwaite, Stephanie Eccles, Dino Fazzani, Flor Ferraco, Marketa Flynn, Lobna Futers, Michael Gabbitas, David Goodson, Kirsty Grace, Rudy Valentino Grant, Guna Gultniece, Abigayle Honeywill, Luke Hope, Kornelia Horvath, Ashley Hudson, Alan Wyn Hughes, Alex Jaep, Ian Jenkins, Patrick Carney Junior, Solomon Taiwo Justified, Lampros Kalfuntzos, Attila G. Kerekes, Simon Kerrison, Denis Khoroshko, Cole Leman, Adam Lezemore, Keith Lomas, Paul Low-Hang, Khristopher MacLeod, Joe Malone, Alan Mandel, Christopher Marsh, Jorge Leon Martinez, Christine Marzano, Pete Meads, Andy Mihalache, Arnold Montey, James M.L. Muller, Paul A Munday, John Murray, Dennis O\'Donnell, Yves O\'Hara, Andrew G. Ogleby, Edd Osmond, Nick Owenford, Andrew Parker, Gino Picciano, Richard Price, Olivia Quinn, Paul Redfern, Jason Redshaw, Anthony J. Sacco, Bernardo Santos, Andrei Satalov, Dave Simon, David Soffe, Ryan Storey, Connor Sullivan, Camilla Talarowska, Dan Trotter, Vassiliki Tzanakou, Geeta Vij, Morgan Walters, Dean Weir, Anick Wiget, Miroslav Zaruba', 
            'synopsis' => 'Baseado no livro homônimo de J.K. Rowling. O excêntrico magizoologista Newt Scamander (Eddie Redmayne) chega à cidade de Nova York com sua maleta, um objeto mágico onde ele carrega uma coleção de fantásticos animais do mundo da magia que coletou durante as suas viagens. Em meio a comunidade bruxa norte-americana que teme muito mais a exposição aos trouxas do que os ingleses, Newt precisará usar suas habilidades e conhecimentos para capturar uma variedade de criaturas que acabam saindo da sua maleta.', 
            'duraction' => '132', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '767', 
            'title' => 'Harry Potter e o Enigma do Príncipe', 
            'original_title' => 'Harry Potter and the Half-Blood Prince', 
            'poster' => 'http://image.tmdb.org/t/p/original/vWr9NHmy3IKzkJLX2Kz6ZcHoszP.jpg', 
            'country' => 'GB, US', 
            'year' => 2009, 
            'direction' => 'David Yates', 
            'cast' => 'Daniel Radcliffe, Rupert Grint, Emma Watson, Tom Felton, Michael Gambon, Jim Broadbent, Helena Bonham Carter, Robbie Coltrane, Maggie Smith, Alan Rickman, Timothy Spall, David Thewlis, Julie Walters, Matthew Lewis, Evanna Lynch, Bonnie Wright, Oliver Phelps, James Phelps, Mark Williams, Warwick Davis, Natalia Tena, Katie Leung, Dave Legeno, Geraldine Somerville, Helen McCrory, Freddie Stroma, David Bradley, Frank Dillane, Hero Fiennes-Tiffin, Gemma Jones, Afshan Azad, Shefali Chowdhury, Georgina Leonidas, Devon Murray, Anna Shaffer, Josh Herdman, Jamie Waylett, Scarlett Byrne, Jessie Cave, Louis Cordice, Alfie Enoch, Robert Knox, William Melling, Paul Ritter, Isabella Laughland, Ralph Ineson, Suzanne Toase, Rod Hunt, Elarica Johnson, Ralph Fiennes', 
            'synopsis' => 'Lorde Voldemort (Ralph Fiennes) é uma ameaça real, tanto para o mundo dos bruxos quanto o dos trouxas. Harry Potter (Daniel Radcliffe) suspeita que o perigo esteja dentro da Escola de Artes e Bruxaria de Hogwarts, mas Alvo Dumbledore (Michael Gambon) está mais preocupado em prepará-lo para o confronto final com o Lorde das Trevas. Dumbledore convida seu colega Horácio Slughorn (Jim Broadbent) para ser o novo professor de Poções, já que Severo Snape (Alan Rickman) enfim alcançou o sonho de ministrar as aulas de Defesa Contra as Artes das Trevas. Paralelamente Harry começa a ter um interesse cada vez maior por Gina Weasley (Bonnie Wright), irmã de seu melhor amigo Rony (Rupert Grint), que também é alvo de interesse de Dino Thomas (Alfie Enoch).', 
            'duraction' => '153', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '271110', 
            'title' => 'Capitão América: Guerra Civil', 
            'original_title' => 'Captain America: Civil War', 
            'poster' => 'http://image.tmdb.org/t/p/original/bL3Pp80AUgmwOE9K2EMcMH8566W.jpg', 
            'country' => 'US', 
            'year' => 2016, 
            'direction' => 'Anthony Russo, Joe Russo', 
            'cast' => 'Chris Evans, Robert Downey Jr., Sebastian Stan, Scarlett Johansson, Jeremy Renner, Anthony Mackie, Don Cheadle, Chadwick Boseman, Paul Bettany, Elizabeth Olsen, Paul Rudd, Emily VanCamp, Tom Holland, Daniel Brühl, William Hurt, Frank Grillo, Martin Freeman, John Slattery, Hope Davis, Marisa Tomei, John Kani, Alfre Woodard, Kerry Condon, Gene Farber, Florence Kasumba, Jim Rash, Stan Lee, Joe Russo, Damion Poitier, Michael A. Cook, Laughton Parchment, Jackson Spidell, Yi Long, Heidi Moneymaker, Aaron Toney, Cale Schultz, Ann Russo, Cornell John, Sven Hönig, Joshua Peck, Brent McGee, Be Satrazemis, Blair Jasin, Oli Bigalke, Rafael Banasik, David de Vries, John Curran, Katie Amess, Austin Sanders, Brett Gentile, Matthew Anderson, Andrew Botchwey, Chase Bradfield, Ernest Charles, Hendricks Coates, Ethan Condon, Shen Dynes, Nathaniel Ellis, Jariah Ferguson, Evan Ffrench, Justin Freeman, Ralphael Grand\'Pierre, Julian Grimes, Aaron Hayes, Austin Hooper, Amiri Jones, Myles Joseph, Stephen Lewis, Jacob Ludwick, D\'Mahrei McRae, Ashwin Mudaliar, Eli Ollinger, Parker Pape, Daniel Parada, Jonah Ruffin, Darryl Sampson, Cameron Sardone, Stanley Sellers, Miles Selles, Jacob Sung, Caden Wilkinson, Kim Scar, Jessica Walther-Gabory, Beniamino Brogi, Silvina Buchbauer, Henry Amadi, Ugochukwu Ani, Michael Anthony Rogers, Umar Khan, David Brown, Guy Fernandez, Sophia Russo, Amelia Morck, Julianna Guill, Surely Alvelo, Brian Schaeffer, Kevin LaRosa Jr., Al Cerullo, Frédéric North, Ray Sahetapy, Oliver Bigalke, Chris Jai Alex', 
            'synopsis' => 'Steve Rogers (Chris Evans) é o atual líder dos Vingadores, super-grupo de heróis formado por Viúva Negra (Scarlett Johansson), Feiticeira Escarlate (Elizabeth Olsen), Visão (Paul Bettany), Falcão (Anthony Mackie) e Máquina de Combate (Don Cheadle). O ataque de Ultron fez com que os políticos buscassem algum meio de controlar os super-heróis, já que seus atos afetam toda a humanidade. Tal decisão coloca o Capitão América em rota de colisão com Tony Stark (Robert Downey Jr.), o Homem de Ferro.', 
            'duraction' => '137', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '284052', 
            'title' => 'Doutor Estranho', 
            'original_title' => 'Doctor Strange', 
            'poster' => 'http://image.tmdb.org/t/p/original/dsAQmTOCyMDgmiPp9J4aZTvvOJP.jpg', 
            'country' => 'US', 
            'year' => 2016, 
            'direction' => 'Scott Derrickson', 
            'cast' => 'Benedict Cumberbatch, Chiwetel Ejiofor, Rachel McAdams, Mads Mikkelsen, Tilda Swinton, Benedict Wong, Michael Stuhlbarg, Benjamin Bratt, Scott Adkins, Zara Phythian, Alaa Safi, Katrina Durden, Topo Wresniwiro, Umit Ulgen, Linda Louise Duan, Mark Anthony Brighton, Meera Syal, Amy Landecker, Adam Pelta-Pauls, Sarah Malin, Eben Young, Kobna Holdbrook-Smith, Elizabeth Healey, Guillaume Faure, Daniel Dow, Stan Lee, Ezra Khan, Kimberly Van Luin, Pat Kiernan, Alister Albert, Moya Allen, Mairead Armstrong, Raj Awasti, Annarie Boor, Dante Briggins, Jill Buchanan, Alice Chen, Bern Collaco, Anna Elizabeth Eaton, Daniel Eghan, Juani Feliz, Cliff Ferraro, Sian Francis, Ulises Galeano, Martavious Gayles, Leigh Holland, Mo Idriss, Tamika Katon-Donegal, Faith Logan, Tyrone Love, Pezhmaan Alinia, Kei Miura, Cameron Moon, Shina Shihoko Nagai, Emily Ng, Emeson Nwolie, Jag Patel, Andreas Pliatsikas, Henardo Rodriguez, Samantha Russell, Michelle Santiago, Nancy Ellen Shore, Tina Simmons, Rachel Emma Slack, Clem So, Chris Hemsworth', 
            'synopsis' => 'Da Marvel Studios vem “Doctor Strange”, a história do mundialmente famoso neurocirurgião Dr. Stephen Strange, cuja vida muda para sempre depois de um terrível acidente de carro, que o rouba do uso de suas mãos. Quando a medicina tradicional o falha, ele é forçado a procurar por cura e esperança, em um lugar improvável - um enclave misterioso conhecido como Kamar-Taj. Ele rapidamente descobre que isso não é apenas um centro de cura, mas também a linha de frente de uma batalha contra as forças ocultas invisíveis empenhadas em destruir nossa realidade. Em pouco tempo, Strange - armado com poderes mágicos recém-adquiridos - é forçado a escolher se quer retornar à sua vida de fortuna e status ou deixar tudo para trás para defender o mundo como o mais poderoso feiticeiro existente.', 
            'duraction' => '115', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '245891', 
            'title' => 'John Wick: De Volta ao Jogo', 
            'original_title' => 'John Wick', 
            'poster' => 'http://image.tmdb.org/t/p/original/rboZslo3eQWKBQ3QvlO6wGV0J3K.jpg', 
            'country' => 'CN, US', 
            'year' => 2014, 
            'direction' => 'Chad Stahelski, David Leitch', 
            'cast' => 'Keanu Reeves, Michael Nyqvist, Alfie Allen, Willem Dafoe, Ian McShane, Lance Reddick, Dean Winters, Adrianne Palicki, Omer Barnea, Toby Leonard Moore, Daniel Bernhardt, Bridget Moynahan, John Leguizamo, Bridget Regan, Keith Jardine, Tait Fletcher, Kazy Tauginas, Alexander Frekey, Thomas Sadoski, Randall Duk Kim, David Patrick Kelly, Clarke Peters, Kevin Nash, Gameela Wright, Vladislav Koulikov, Munro M. Bonnell, Patricia Squire, Vladimir Troitsky, Tommy Bayiokos, Carolyn Blair, Samantha Crawford, Nadia Kay, Natalia Kiriya, Scott Tixier', 
            'synopsis' => 'John Wick (Keanu Reeves) já foi um dos assassinos mais temidos da cidade de Nova York, trabalhando em parceria com a máfia russa. Um dia, ele decide se aposentar, e neste período tem que lidar com a triste morte de sua esposa. Vítima de uma doença grave, ela já previa a sua própria morte, e deu de presente ao marido um cachorro para cuidar em seu período de luto. No entanto, poucos dias após o funeral, o cachorro é morto por ladrões que roubam o seu carro. John Wick parte em busca de vingança contra estes homens que ele já conhecia muito bem, e que roubaram o último símbolo da mulher que ele amava.', 
            'duraction' => '101', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '293660', 
            'title' => 'Deadpool', 
            'original_title' => 'Deadpool', 
            'poster' => 'http://image.tmdb.org/t/p/original/g0ehjmoNsgH9RmlGiAfYzN2whps.jpg', 
            'country' => 'US', 
            'year' => 2016, 
            'direction' => 'Tim Miller', 
            'cast' => 'Ryan Reynolds, Morena Baccarin, Ed Skrein, T.J. Miller, Gina Carano, Brianna Hildebrand, Stefan Kapičić, Andre Tricoteux, Leslie Uggams, Karan Soni, Jed Rees, Stan Lee, Rob Liefeld, Rob Hayter, Randal Reeder, Isaac C. Singleton Jr., Michael Benyaer, Style Dayne, Kyle Cassie, Taylor Hickson, Ayzee, Naika Toussaint, Justyn Shippelt, Donna Yamamoto, Hugh Scott, Cindy Piper, Emily Haine, Aatash Amir, Chad Riley, Darcey Johnson, Kyle Rideout, Jason William Day, Ben Wilkinson, Rachel Sheen, Paul Lazenby, Heather Ashley Chase, Paul Belsito, Fabiola Colmenero, Victoria De Mare, David Hardware, Matthew Hoglie, Tony Chris Kazoleas, Greg LaSalle, David Longworth, Michael Neumeyer, Sean Quan, Anthony J. Sacco, Olesia Shewchuk, Dan Zachary, Maggie Baird, David Berón, Richard Epcar, Lex Lang, David Michie, Ben Pronsky, Matthew Wolf', 
            'synopsis' => 'Baseado no anti-herói não convencional da Marvel Comics, Deadpool conta a história da origem do ex-agente das Forças Especiais que se tornou o mercenário Wade Wilson. Depois de ser submetido a um desonesto experimento que o deixa com poderes de cura acelerada, Wade adota o alter ego de Deadpool. Armado com suas novas habilidades e um senso de humor negro e distorcido, Deadpool persegue o homem que quase destruiu sua vida.', 
            'duraction' => '107', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '238', 
            'title' => 'O Poderoso Chefão', 
            'original_title' => 'The Godfather', 
            'poster' => 'http://image.tmdb.org/t/p/original/o8DYJTbPdnKqCTEnBcfNGt3NoKn.jpg', 
            'country' => 'US', 
            'year' => 1972, 
            'direction' => 'Francis Ford Coppola', 
            'cast' => 'Marlon Brando, Al Pacino, James Caan, Richard S. Castellano, Robert Duvall, Sterling Hayden, John Marley, Richard Conte, Al Lettieri, Diane Keaton, Abe Vigoda, Talia Shire, Gianni Russo, John Cazale, Rudy Bond, Al Martino, Morgana King, Lenny Montana, John Martino, Salvatore Corsitto, Alex Rocco, Tony Giorgio, Victor Rendina, Simonetta Stefanelli, Saro Urzì, Sofia Coppola, Louis Guss, Gabriele Torrei, Tony King, Richard Bright, Vito Scotti, Tere Livrano, Julie Gregg, Angelo Infanti, Corrado Gaipa, Franco Citti, Max Brandt, Carmine Coppola, Roman Coppola, Don Costello, Robert Dahdah, Gray Frederickson, Ron Gilbert, Joe Lo Grippo, Sonny Grosso, Randy Jurgensen, Tony Lip, Lou Martini Jr., Raymond Martino, Joseph Medaglia, Rick Petrucelli, Sal Richards, Tom Rosqui, Frank Sivero, Filomena Spagnuolo, Joe Spinell, Nick Vallelonga, Conrad Yama', 
            'synopsis' => 'Em 1945, Don Corleone (Marlon Brando) é o chefe de uma mafiosa família italiana de Nova York. Ele costuma apadrinhar várias pessoas, realizando importantes favores para elas, em troca de favores futuros. Com a chegada das drogas, as famílias começam uma disputa pelo promissor mercado. Quando Corleone se recusa a facilitar a entrada dos narcóticos na cidade, não oferecendo ajuda política e policial, sua família começa a sofrer atentados para que mudem de posição. É nessa complicada época que Michael (Al Pacino), um herói de guerra nunca envolvido nos negócios da família, vê a necessidade de proteger o seu pai e tudo o que ele construiu ao longo dos anos.', 
            'duraction' => '175', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 80)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '209112', 
            'title' => 'Batman vs Superman: A Origem da Justiça', 
            'original_title' => 'Batman v Superman: Dawn of Justice', 
            'poster' => 'http://image.tmdb.org/t/p/original/9ORTc9UUTtRq7pssuu5OXNG3W5m.jpg', 
            'country' => 'US', 
            'year' => 2016, 
            'direction' => 'Zack Snyder', 
            'cast' => 'Ben Affleck, Henry Cavill, Gal Gadot, Amy Adams, Jesse Eisenberg, Diane Lane, Jeremy Irons, Laurence Fishburne, Holly Hunter, Scoot McNairy, Callan Mulvey, Tao Okamoto, Jena Malone, Brandon Spink, Lauren Cohan, Hugh Maguire, Michael Cassidy, Alan D. Purwin, Dan Amboyer, Rebecca Buller, Harry Lennix, Christina Wren, Jade Chynoweth, Chad Krowchuk, Kevin Costner, Ezra Miller, Patrick Wilson, Charlie Rose, Vikram Gandhi, Andrew Sullivan, Neil deGrasse Tyson, Jon Stewart, Soledad O\'Brien, Erika R. Erickson, Dana Bash, Nancy Grace, Anderson Cooper, Brooke Baldwin, Carla Gugino, Jason Momoa, Joe Morton, Ray Fisher, Joseph Cranford, Emily Peterson, Jeffrey Dean Morgan, Sammi Rotibi, Hanna Dworkin, Tiffany L. Addison, Owais Ahmed, Anish Jethmalani, Tiffany Bedwell, Natalee Arteaga, Keith D. Gallagher, Jeff Dumas, Miriam Lee, Alicia Regan, Stephanie Koenig, Ripley Sobo, Richard Burden, Julius Tennon, Wunmi Mosaku, Dennis North, Kiff VandenHeuvel, Mason Heidger, Ahney Her, Kristine Cabanban, Sebastian Sozzi, Kent Shocknek, Ralph Lister, Sammy A. Publes, Jay R. Adams, David Midura, Jay Towers, Michael Ellison, Kirill Ostapenko, Rashontae Wawrzyniak, Tom Luginbill, Dave Pasch, Danny Mooney , Henry Frost III, Nicole Forester, Debbie Stabenow, Milica Govich, John Lepard, Sandra Love Aldridge, Graham W.J. Beal, Henri Franklin, Jonathan West, T.J. Martinelli, Chris Newman, Lulu Dahl, Sam Logan Khaleghi, Anne Marie Damman, Connie Craig, Henrietta Hermelin, Patrick Leahy, Albert Valladares, David Paris, Abigail Kuklis, Greg Violand, Tiren Jhames, Steve Jasgur, Jonathan Stanley, Jesse Nagy, Duvale Murchison, Thomas J. Fentress, Coburn Goss, Jeff Hanlin, Gary A. Hecker, Robin Atkin Downes, Issac Ryan Brown, Barton Bund, Bailey Chase, Patrick O\'Connor Cronin, Sonja Crosby, C.T. Fletcher, Ahman Green, Diana Gaitirira, Jalene Mack, Esodie Geiger, Nene Nwoko, Scott Edward Logan, Marcus Goddard, Cruz Gonzalez-Cadel, Alma Martinez, Sal Lopez, Marcel Shihadeh, Theo Bongani Ndyalvane, Satori Shakoor, Ele Bardha, Inder Kumar, Brandon Bautista, Laura Atwood, Debbie Scaletta, David Leach, Gordon Michaels, Brian Boland, Taras Los, Jason Hughley, Sidi Henderson, Meighan Gerachis, Nicole Santini, Axel Harney, Wayne E. Brown, Dante Briggins, Shannon Garnett, Lynch R. Travis, Carmen Gangale, Joe Cipriano, Will Blagrove, Marcelo Bem, Joe Fishel, Mark Edward Taylor', 
            'synopsis' => 'Temendo que as ações de um super-herói divino não tenham sido controladas, o formidável e vigoroso vigilante de Gotham City enfrenta o salvador mais reverenciado e moderno de Metrópolis, enquanto o mundo luta com o tipo de herói que realmente precisa. E com Batman e Superman em guerra um com o outro, uma nova ameaça rapidamente surge, colocando a humanidade em maior perigo do que nunca antes.', 
            'duraction' => '151', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '345920', 
            'title' => 'Beleza Oculta', 
            'original_title' => 'Collateral Beauty', 
            'poster' => 'http://image.tmdb.org/t/p/original/c7t741JhaFvoaiQyQBk5eCnxFny.jpg', 
            'country' => 'US', 
            'year' => 2016, 
            'direction' => 'David Frankel', 
            'cast' => 'Will Smith, Edward Norton, Kate Winslet, Michael Peña, Helen Mirren, Keira Knightley, Naomie Harris, Jacob Latimore, Ann Dowd, Enrique Murciano, Kylie Rogers, Natalie Gold, Liza Colón-Zayas, Shirley Rumierk, Alyssa Cheatham, Benjamin Snyder, Mary Beth Peil, Andy Taylor, Michael Cumpsty, Claire Glassford, Joseph Castillo-Midyett, Bryan Terrell Clark, Marcus Paul James, Mykal Kilgore, Jimmy Palumbo, Elia Monte-Brown, Suzy Jane Hunt, Crystal Anne Dickinson, Andres Munar, Harriett D. Foy, Maureen Mueller, Steven Hauck, Robert \'Toshi\' Kar Yuen Chan, Willie C. Carpenter, Jabriah Anderson, Laura Hart, Emily Bennett, Liz Celeste, Madeline Lupi, Jordana Keller, Reginald L. Barnes', 
            'synopsis' => 'Após uma tragédia pessoal, Howard (Will Smith) entra em depressão e passa a escrever cartas para a Morte, o Tempo e o Amor algo que preocupa seus amigos. Mas o que parece impossível, se torna realidade quando essas três partes do universo decidem responder. Morte (Helen Mirren), Tempo (Jacob Latimore) e Amor (Keira Knightley) vão tentar ensinar o valor da vida para o protagonista.', 
            'duraction' => '97', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10749)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '140607', 
            'title' => 'Star Wars: O Despertar da Força', 
            'original_title' => 'Star Wars: The Force Awakens', 
            'poster' => 'http://image.tmdb.org/t/p/original/6OeTdEmAUHXj0wBijQ8850Y1ZzY.jpg', 
            'country' => 'US', 
            'year' => 2015, 
            'direction' => 'J.J. Abrams', 
            'cast' => 'Harrison Ford, Carrie Fisher, Daisy Ridley, Adam Driver, John Boyega, Oscar Isaac, Lupita Nyong\'o, Andy Serkis, Domhnall Gleeson, Anthony Daniels, Peter Mayhew, Max von Sydow, Mark Hamill, Gwendoline Christie, Joonas Suotamo, Simon Pegg, Kiran Shah, Ken Leung, Greg Grunberg, Billie Lourd, Iko Uwais, Yayan Ruhian, Cecep Arif Rahman, Brian Vernel, Tim Rose, Erik Bauersfeld, Mike Quinn, Bill Kipsang Rotich, Warwick Davis, Jessica Henwick, Anna Brewster, Cailey Fleming, Ian Whyte, Dave Chapman, Brian Herring, Bill Hader, Ben Schwartz, Kenny Baker, Jimmy Vee, Thomas Brodie-Sangster, Kate Fleetwood, Emun Elliott, Maisie Richardson-Sellers, Harriet Walter, Sebastian Armesto, Pip Torrens, Daniel Craig, Michael Giacchino, Nigel Godrich, Ewan McGregor, Frank Oz, Alec Guinness, Mark Stanley, Morgan Dameron, Gerald W. Abrams, Andrew Jack, Crystal Clarke, Pip Andersen, Christina Chong, Miltos Yerolemou, Amybeth Hargreaves, Leanne Best, Judah Friedlander, Kevin Smith, J.J. Abrams, Lin-Manuel Miranda, Dee Bradley Baker, Matt Lanter, Tom Kane, Catherine Taber, Matthew Wood, Samuel Witwer, Meredith Salenger, James Arnold Taylor, Dave Filoni, Michael Donovan, Devon Libran, Elle Newlands, Terri Douglas, Robert Stambler, Verona Blue, TJ Falls, Michelle Rejwan, Eugene Byrd, Fred Tatasciore, David Collins, Amanda Foreman, Christopher Scarabosio, Patrick Correll, Karen Huie, Orly Schuchmacher, Emily Towers, Jonathan Dixon, Katie Sheridan, Mark Dodson, Christian Simpson, Liang Yang, David Acord, Rocky Marshall, Philicia Saunders, Jeffery Kissoon, Claudia Sermbezis, Jim McGrath, Tosin Cole, James McArdle, Stefan Grube, Dixie Arnold, Hannah John-Kamen, Sasha Frost, Victor McGuire, Saara Forsberg, Jamie B. Chambers', 
            'synopsis' => 'Décadas após a queda de Darth Vader e do Império, surge uma nova ameaça: a Primeira Ordem, uma organização sombria que busca minar o poder da República e que tem Kylo Ren (Adam Driver), o General Hux (Domhnall Gleeson) e o Líder Supremo Snoke (Andy Serkis) como principais expoentes. Eles conseguem capturar Poe Dameron (Oscar Isaac), um dos principais pilotos da Resistência, que antes de ser preso envia através do pequeno robô BB-8 o mapa de onde vive o mitológico Luke Skywalker (Mark Hamill). Ao fugir pelo deserto, BB-8 encontra a jovem Rey (Daisy Ridley), que vive sozinha catando destroços de naves antigas. Paralelamente, Poe recebe a ajuda de Finn (John Boyega), um stormtrooper que decide abandonar o posto repentinamente. Juntos, eles escapam do domínio da Primeira Ordem.', 
            'duraction' => '136', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '206647', 
            'title' => '007 Contra Spectre', 
            'original_title' => 'Spectre', 
            'poster' => 'http://image.tmdb.org/t/p/original/1oHjIUj0f4cKmVq4P3pBumdTBDw.jpg', 
            'country' => 'GB, US', 
            'year' => 2015, 
            'direction' => 'Sam Mendes', 
            'cast' => 'Daniel Craig, Christoph Waltz, Léa Seydoux, Ralph Fiennes, Monica Bellucci, Ben Whishaw, Naomie Harris, Dave Bautista, Andrew Scott, Rory Kinnear, Jesper Christensen, Alessandro Cremona, Stephanie Sigman, Tenoch Huerta, Adriana Paz, Domenico Fortunato, Marco Zingaro, Stefano Elfi DiClaudia, Ian Bonar, Tam Williams, Richard Banham, Pip Carter, Simon Lenagan, Alessandro Bressanello, Marc Zinga, Brigitte Millar, Adel Bencherif, Gediminas Adomaitis, Peppe Lanzetta, Francesco Arca, Matteo Taranto, Emilio Aniba, Benito Sagredo, Dai Tabuchi, George Lasha, Sargon Yelda, Andy Cheung, Erick Hayden, Oleg Mirochnikov, Antonio Salines, Miloud Mourad Benamara, Gido Schimanski, Nigel Barber, Patrice Naiambana, Stephane Cornicard, Gary Fannin, Sadao Ueda, Phillip Law, Wai Wong, Joseph Balderrama, Eiji Mihara, Junichi Kajioka, Victor Schefé, Harald Windisch, Tristan Matthiae, Detlef Bothe, Bodo Friesecke, Wilhem Iben, Noemi Krausz, Noah Saavedra, Francis Attakpah, Michael Glantschnig, Marlon Boess, Marie Wohlmuth, Lili Epply, Konstantin Gerlach, Lara Parmiani, Umit Ulgen, Amra Mallassi, Ziad Abaza, Walid Mumuni, Derek Horsham, Nari Blair-Mangat, Michael White, Adam McGrady, Nader Dernaika, Pezhmaan Alinia, Judi Dench, Neve Gachev, Kim Adis, Maurisa Selene Coleman, Matija Mondi Matović', 
            'synopsis' => 'James Bond (Daniel Craig) vai à Cidade do México com a tarefa de eliminar Marco Sciarra (Alessandro Cremona), sem que seu chefe, M (Ralph Fiennes), tenha conhecimento. Isto faz com que Bond seja suspenso temporariamente de suas atividades e que Q (Ben Whishaw) instale em seu sangue um localizador, que permite que o governo britânico saiba sempre em que parte do planeta ele está. Apesar disto, Bond conta com a ajuda de seus colegas na organização para que possa prosseguir em sua investigação pessoal sobre a misteriosa organização chamada Spectre.', 
            'duraction' => '148', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 80)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '76341', 
            'title' => 'Mad Max: Estrada da Fúria', 
            'original_title' => 'Mad Max: Fury Road', 
            'poster' => 'http://image.tmdb.org/t/p/original/chMOGs0qNQyIeJnz7ZN9MJOA18T.jpg', 
            'country' => 'AU, US', 
            'year' => 2015, 
            'direction' => 'George Miller', 
            'cast' => 'Tom Hardy, Charlize Theron, Nicholas Hoult, Hugh Keays-Byrne, Josh Helman, Nathan Jones, Zoë Kravitz, Rosie Huntington-Whiteley, Riley Keough, Abbey Lee, Courtney Eaton, John Howard, Richard Carter, Iota, Angus Sampson, Jennifer Hagan, Megan Gale, Melissa Jaffer, Melita Jurišić, Gillian Jones, Joy Smithers, Antoinette Kellerman, Christina Koch, Jon Iles, Quentin Kenihan, Coco Jack Gillies, Chris Patton, Stephen Dunlevy, Richard Norton, Vince Roxburgh, John Walton, Ben Smith-Petersen, Russ McCarroll, Judd Wild, Elizabeth Cunico, Greg Van Borssum, Rob Jones, Sebastian Dickins, Darren Mitchell, Crusoe Kurddal, Shyan Tonga, Cass Comerford, Albert Lee, Riley Paton, Ripley Voeten, Riley Paton, Maycn Van Borssum, Hunter Stratton Boland, Nathan Jenkins, Fletcher Gill, Whiley Toll, Ferdinand Hengombe, Gadaffi Davsab, Noddy Alfred, Jackson Hengombe, Christian Fane, Callum Gallagher, Abel Hofflin, Lee Perry, Hiroshi Kasuga', 
            'synopsis' => 'Assombrado por seu turbulento passado, Max Rockatansky (Tom Hardy) acredita que a melhor maneira de sobreviver é vagar sozinho. No entanto, após ser capturado pelos homens do tirano Immortan Joe (Hugh Keays-Byrne), o guerreiro das estradas se vê no meio de uma guerra mortal, iniciada pela Imperatriz Furiosa (Charlize Theron) na tentativa de resgatar um grupo de garotas e retornar à sua terra natal. Enfurecido, o senhor da guerra convoca os seus garotos de guerra e caça impiedosamente os rebeldes nas estradas do deserto da Austrália. Também tentando fugir, Max aceita ajudar Furiosa em sua luta contra Joe e se vê dividido mais uma vez entre seguir o seu caminho sozinho ou ficar com o grupo.', 
            'duraction' => '120', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '246655', 
            'title' => 'X-Men: Apocalipse', 
            'original_title' => 'X-Men: Apocalypse', 
            'poster' => 'http://image.tmdb.org/t/p/original/gMlMdHI7mOdqWvSUYq0RBNxuZrN.jpg', 
            'country' => 'US', 
            'year' => 2016, 
            'direction' => 'Bryan Singer', 
            'cast' => 'James McAvoy, Michael Fassbender, Jennifer Lawrence, Nicholas Hoult, Oscar Isaac, Rose Byrne, Evan Peters, Josh Helman, Sophie Turner, Tye Sheridan, Lucas Till, Kodi Smit-McPhee, Ben Hardy, Alexandra Shipp, Lana Condor, Olivia Munn, Warren Scherer, Rochelle Okoye, Monique Ganderton, Fraser Aitcheson, Abdulla Hamam, Hesham Hammoud, Antonio Daniel Hidalgo, Al Maini, Berdj Garabedian, Ally Sheedy, Anthony Konechny, Emma Elle Paterson, Manuel Sinor, Gustave Ouimet, Lukas Penar, Ryan Hollyman, Joanne Boland, Nabeel El Khafif, Manuel Tadros, Abanoub Andraous, Aladeen Tawfeek, Carolina Bartczak, T. J. McGibbon, Davide Chiazzese, Sebastian Naskrent, Boris Sichon, Martin Skorek, Kamil Orzechowski, Michael Terlecki, Ahmed Osman, Ziad Ghanem, Moataz Fathi, Tómas Lemarquis, James Loye, Zehra Leverman, Herb Luft, Stan Lee, Joan Lee, Stephen Bogaert, John Bourgeois, Conrad Coates, Dan Lett, Adrian G. Griffiths, Shawn Campbell, Joe Cobden, Henry Hallowell, Danielle Dury, Naomi Frenette, Aj Risi, Raphaël Dury, Ian Rosenberg, Erika Heather Mergl, Tauntaun, Mary-Piper Gaudet, Josh Madryga, Scott Cook, Allen Keng, Tally Rodin, Francis Limoges, Tsu-Ching Yu, Karl Walcott, Desmond Campbell, Ian Geldart, John Ottman, Linda Joyce Nourse, Zeljko Ivanek, Christopher B. MacCabe, Chris Cavener, Ronald Tremblay, Joseph Bellerose, Philippe Hartmann, Sebastien Teller, Alexander Peganov, Simon Therrien, Patrice Martre, James Malloch, Vladimir Alexis, Jason Deline, Hugh Jackman', 
            'synopsis' => 'Desde o início da civilização, ele era adorado como um deus. Apocalipse, o primeiro e mais poderoso mutante do universo X-Men da Marvel, acumulou os poderes de muitos outros mutantes, tornando-se imortal e invencível. Ao acordar depois de milhares de anos, fica desiludido com o mundo em que se encontra e recruta um grupo de mutantes poderosos, incluindo um Magneto desanimado, para purificar a humanidade e criar uma nova ordem mundial, sobre a qual ele reinará. Com o destino da Terra em causa, Raven com a ajuda do Professor X irá liderar uma equipa de jovens X-Men para combater o seu maior inimigo e salvar a humanidade da destruição total.', 
            'duraction' => '144', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '12445', 
            'title' => 'Harry Potter e as Relíquias da Morte - Parte 2', 
            'original_title' => 'Harry Potter and the Deathly Hallows: Part 2', 
            'poster' => 'http://image.tmdb.org/t/p/original/dRDcDVsO5G71cGhFn6dDfQ56neI.jpg', 
            'country' => 'GB, US', 
            'year' => 2011, 
            'direction' => 'David Yates', 
            'cast' => 'Daniel Radcliffe, Rupert Grint, Emma Watson, Alan Rickman, Ralph Fiennes, Maggie Smith, Helena Bonham Carter, Bonnie Wright, Evanna Lynch, Matthew Lewis, Tom Felton, Devon Murray, David Thewlis, Oliver Phelps, James Phelps, Jason Isaacs, Robbie Coltrane, Warwick Davis, Ciarán Hinds, Helen McCrory, Natalia Tena, George Harris, Jim Broadbent, Domhnall Gleeson, Clémence Poésy, Emma Thompson, Gemma Jones, Julie Walters, Mark Williams, Michael Gambon, David Bradley, Miriam Margolyes, Peter Mullan, Timothy Spall, Arben Bajraktaraj, Pauline Stone, David Ryall, Ralph Ineson, Suzie Toase, Chris Rankin, Rod Hunt, Dave Legeno, Nick Moran, Guy Henry, Anna Shaffer, Alfie Enoch, Jessie Cave, Shefali Chowdhury, Afshan Azad, Louis Cordice, Josh Herdman, Scarlett Byrne, Isabella Laughland, Jamie Marks, Katie Leung, Georgina Leonidas, Freddie Stroma, John Hurt, Kelly Macdonald, Gary Oldman, Adrian Rawlins, Geraldine Somerville, Anthony Allgood, Rusty Goffe, Benn Northover, Ian Peck, Hebe Beardsall, William Melling, Sian Grace Phillips, Amber Evans, Ruby Evans, Jon Key, Philip Wright, Gary Sayer, Tony Adkins, Penelope McGhie, Ellie Darcey-Alden, Ariella Paradise, Benedict Clarke, Alfie McIlwain, Rohan Gotobed, Toby Papworth, Peter G. Reed, Judith Sharp, Emil Hostina, Bob Yves Van Hellenberg Hubar, Granville Saxton, Tony Kirwood, Ashley McGuire, Arthur Bowen, Daphne de Beistegui, Will Dunn, Jade Gordon, Bertie Gilbert, Helena Barlow, Ryan Turner, Jamie Campbell Bower, Luke Newberry, Sean Biggerstaff, Leslie Phillips, Graham Duff, Keijo J. Salmela', 
            'synopsis' => 'Harry Potter (Daniel Radcliffe) e seus amigos Rony Weasley (Rupert Grint) e Hermione Granger (Emma Watson) seguem à procura das horcruxes. O objetivo do trio é encontrá-las e, em seguida, destruí-las, de forma a eliminar lorde Voldemort (Ralph Fiennes) de uma vez por todas. Com a ajuda do duende Grampo (Warwick Davis), eles entram no banco Gringotes de forma a invadir o cofre de Bellatrix Lestrange (Helena Bonham Carter). De lá retornam ao castelo de Hogwarts, onde precisam encontrar mais uma horcrux. Paralelamente, Voldemort prepara o ataque definitivo ao castelo.', 
            'duraction' => '130', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '286217', 
            'title' => 'Perdido em Marte', 
            'original_title' => 'The Martian', 
            'poster' => 'http://image.tmdb.org/t/p/original/qBstVAwCZMxSupZgQgRerIzBcPA.jpg', 
            'country' => 'GB, US', 
            'year' => 2015, 
            'direction' => 'Ridley Scott', 
            'cast' => 'Matt Damon, Jessica Chastain, Kristen Wiig, Jeff Daniels, Michael Peña, Sean Bean, Kate Mara, Sebastian Stan, Aksel Hennie, Chiwetel Ejiofor, Benedict Wong, Mackenzie Davis, Donald Glover, Nick Mohammed, Chen Shu, Eddy Ko, Enzo Cilenti, Jonathan Aris, Gruffudd Glyn, Naomi Scott, Geoffrey Thomas, Yang Haiwen, Narantsogt Tsogtsaikhan, Brian Caspe, Szonja Oroszlán, Mark O\'Neal, Karen Gagnon, Lili Bordán, Nikolett Barabas, Dilyana Bouklieva, Björn Freiberg, James Fred Harkins Jr., Sam Spruell, Matt Devere, Mike Kelly, Greg De Cuir, Peter Linka, Declan Hannigan, Peter Schueller, Waleska Latorre, Frederik Pleitgen, Charlie Gardner, Nóra Lili Hörich, Kamilla Fátyol, Yang Liu, Richard Rifkin, Nicholas Wittman, Ben O\'Brien, Scott Alexander Young, Jason Ryan, James Dougherty, Xue Xuxing, Balázs Medveczky', 
            'synopsis' => 'O astronauta Mark Watney (Matt Damon) é enviado a uma missão em Marte. Após uma severa tempestade ele é dado como morto, abandonado pelos colegas e acorda sozinho no misterioso planeta com escassos suprimentos, sem saber como reencontrar os companheiros ou retornar à Terra.', 
            'duraction' => '141', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '135397', 
            'title' => 'Jurassic World: O Mundo dos Dinossauros', 
            'original_title' => 'Jurassic World', 
            'poster' => 'http://image.tmdb.org/t/p/original/6xdqXJl5ukTvQOl3j0GOuHQnozJ.jpg', 
            'country' => 'US', 
            'year' => 2015, 
            'direction' => 'Colin Trevorrow', 
            'cast' => 'Chris Pratt, Bryce Dallas Howard, Irrfan Khan, Vincent D\'Onofrio, Nick Robinson, Ty Simpkins, Jake Johnson, Omar Sy, BD Wong, Judy Greer, Lauren Lapkus, Brian Tee, Katie McGrath, Andy Buckley, Eric Edelstein, Jimmy Fallon, James DuMont, Matt Burke, Anna Talakkottur, Colin Trevorrow, Courtney J. Clark, Kelly Washington, Matthew Cardarople, Chad Randall, Yvonne Angulo, Chloe Perrin, Erika Erica, Tiffany Forest, Brandon Marc Higa, Arlene Newman', 
            'synopsis' => 'O Jurassic Park, localizado na ilha Nublar, enfim está aberto ao público. Com isso, as pessoas podem conferir shows acrobáticos com dinossauros e até mesmo fazer passeios bem perto deles, já que agora estão domesticados. Entretanto, a equipe chefiada pela doutora Claire (Bryce Dallas Howard) passa a fazer experiências genéticas com estes seres, de forma a criar novas espécies. Uma delas adquire inteligência bem mais alta, logo se tornando uma grande ameaça para a existência humana.', 
            'duraction' => '125', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '281957', 
            'title' => 'O Regresso', 
            'original_title' => 'The Revenant', 
            'poster' => 'http://image.tmdb.org/t/p/original/wmwrkj2r6X1uCgYWIk3Rf1Q7qt.jpg', 
            'country' => 'CA, HK, TW, US', 
            'year' => 2015, 
            'direction' => 'Alejandro González Iñárritu', 
            'cast' => 'Leonardo DiCaprio, Tom Hardy, Will Poulter, Domhnall Gleeson, Paul Anderson, Brad Carter, Kristoffer Joner, Lukas Haas, Brendan Fletcher, Joshua Burge, Robert Moloney, Grace Dove, Timothy Lyle, Kory Grim, Forrest Goodluck, Duane Howard, Arthur RedCloud, Vincent Leclerc, Emmanuel Bilodeau', 
            'synopsis' => 'Em uma expedição pelo desconhecido deserto americano, o lendário explorador Hugh Glass (Leonardo DiCaprio) é brutalmente atacado por um urso e deixado como morto pelos membros de sua própria equipe de caça. Em uma luta para sobreviver, Glass resiste à dor inimaginável, bem como à traição de seu confidente, John Fitzgerald (Tom Hardy). Guiado pela força de vontade e pelo amor de sua família, Glass deve navegar um inverno brutal em uma incessante busca por sobrevivência e redenção.', 
            'duraction' => '156', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 37)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '8587', 
            'title' => 'O Rei Leão', 
            'original_title' => 'The Lion King', 
            'poster' => 'http://image.tmdb.org/t/p/original/jP7CAD8j8B93dEy2hkLzMqetie8.jpg', 
            'country' => 'US', 
            'year' => 1994, 
            'direction' => 'Roger Allers, Rob Minkoff', 
            'cast' => 'Matthew Broderick, Jonathan Taylor Thomas, James Earl Jones, Jeremy Irons, Moira Kelly, Niketa Calame, Ernie Sabella, Nathan Lane, Robert Guillaume, Rowan Atkinson, Whoopi Goldberg, Cheech Marin, Jim Cummings, Madge Sinclair, Joseph Williams, Jason Weaver, Sally Dworsky, Laura Williams, Zoe Leader, Frank Welker, Judi M. Durand, Daamen J. Krall, David McCharen, Mary Linda Phillips, Phil Proctor, David J. Randolph, Evan Saucedo, Brian Tochi, Cathy Cavadini', 
            'synopsis' => 'Mufasa (James Earl Jones), o Rei Leão, e a rainha Sarabi (Madge Sinclair) apresentam ao reino o herdeiro do trono, Simba (Matthew Broderick). O recém-nascido recebe a bênção do sábio babuíno Rafiki (Robert Guillaume), mas ao crescer é envolvido nas artimanhas de seu tio Scar (Jeremy Irons), o invejoso e maquiavélico irmão de Mufasa, que planeja livrar-se do sobrinho e herdar o trono.', 
            'duraction' => '89', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 16)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);

        $movie = Movie::create([
            'tmdb_id' => '686', 
            'title' => 'Contato', 
            'original_title' => 'Contact', 
            'poster' => 'http://image.tmdb.org/t/p/original/zTMQeQgVSjm9ziwbYbEm0FomQAU.jpg', 
            'country' => 'US', 
            'year' => 1997, 
            'direction' => 'Robert Zemeckis', 
            'cast' => 'Jodie Foster, Matthew McConaughey, James Woods, John Hurt, Tom Skerritt, William Fichtner, David Morse, Angela Bassett, Geoffrey Blake, Max Martini, Rob Lowe, Jake Busey, Jena Malone, Tucker Smallwood, Sami Chester, Henry Strozier, Haynes Brooke, Timothy McNeil, Laura Elena Surillo, Michael Chaban, Larry King, Thomas Garner , Conroy Chino, Dan Gifford, Vance Valencia, Donna Kelley, Leon Harris, Claire Shipman, Behrooz Afrakhan, Saemi Nakamura, Maria Celeste Arraras, Tabitha Soren, Geraldo Rivera, Ian Whitcomb, Jay Leno, Michael Albala, Ned Netterville, Leo Lee, William Jordan, David St. James, Steven Ford, Alexander Zemeckis, Janie Peterson, Philippe Bergeron, Jennifer Balgobin, Anthony Hamilton, Rebecca T. Beucler, Marc Macaulay, Jeffery Thomas Johnson, Yuji Okumoto, Gerry Griffin, Brian Alston, Rob Elk, Mark Thomason, José Rey, Todd Patrick Breaugh, Alex Veadov, Alice Kushida, Robin Gammell, Richardson Morse, Seiji Okamura, Mak Takano, Hiroshi Tom Tanaka, Catherine Dao, Kristoffer Ryan Winters, Valorie Armstrong, Jim Hild, William L. Thomas, Diego Montoya, Jonathan Adler, Robert Aguilar Jr., Mark Bailey, Matt Bennett, Tony Boldi, Christopher Boyer, Mark Byrne, Candice T. Cain, Aixa Clemente, Derrick Damions, Elaina Erika Davis, Joey Dente, Michael Egan, Jeff Elmore, Pamela Fischer, Carl Gilliard, William B. Kaplan, Ming Lo, Sunshine Logroño, Denise Loveday, Neal Matarazzo, Cassidy McMillan, Molly Mueller, Paul L. Nolan, Marisa Petroro, Errica Poindexter, J.A. Preston, Frank Principe, Leo Rogstad, Russell Sanderlin Sr., Frank Silva, John A. Taylor, Todd Thompson, Cenk Uygur, Holly Cross Vagley, Eric Alan Wendell, Delaney Williams', 
            'synopsis' => 'Desde menina, Ellie (Jodie Foster) buscou indícios de outras vidas no universo. Quando recebe uma mensagem com uma máquina capaz de levar um ser humano e fazer contato com extraterrestres, reivindica o direito de ser escolhida para a missão.', 
            'duraction' => '150', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 9648)->first();
        $movie->genres()->attach($genre->id);

        $movie = Movie::create([
            'tmdb_id' => '11978', 
            'title' => 'Homens De Honra', 
            'original_title' => 'Men of Honor', 
            'poster' => 'http://image.tmdb.org/t/p/original/cubiycGx2iEat6R9JWd8kmRNYrL.jpg', 
            'country' => 'US', 
            'year' => 2000, 
            'direction' => 'George Tillman, Jr.', 
            'cast' => 'Robert De Niro, Cuba Gooding Jr., Charlize Theron, Aunjanue Ellis, Hal Holbrook, Michael Rapaport, Powers Boothe, David Keith, Glynn Turman, Holt McCallany, Tyler Posey, Henry Harris, Theo Nicholas Pagones, Richard Sanders', 
            'synopsis' => 'Carl Brashear (Cuba Gooding Jr.) , de uma humilde família negra, vivia em uma área rural. Ainda garoto, no início dos anos 40, já adorava mergulhar, sendo que quando jovem se alistou na Marinha esperando se tornar um mergulhador. Inicialmente Carl trabalha como cozinheiro, uma das poucas tarefas permitidas a um negro na época. Quando resolve mergulhar no mar em uma sexta-feira acaba sendo preso, pois os negros só podiam nadar na terça-feira, mas sua rapidez ao nadar é vista por todos e assim se torna um \"nadador de resgate\", por iniciativa do capitão Pullman (Powers Boothe). Quando Brashear solicita a escola de mergulhadores encontra o comandante Billy Sunday (Robert De Niro), um instrutor de mergulho áspero e tirânico que tem absoluto poder sobre suas decisões. Mas a coragem e determinação de Brashear impressionam Sunday e os dois se tornam amigos quando Brashear tem de lutar contra o preconceito e a burocracia militar.', 
            'duraction' => '129', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);

        $movie = Movie::create([
            'tmdb_id' => '9294', 
            'title' => 'Fenômeno', 
            'original_title' => 'Phenomenon', 
            'poster' => 'http://image.tmdb.org/t/p/original/gsmwDAtdxAUzVyELzvdRavqqVYN.jpg', 
            'country' => 'US', 
            'year' => 1996, 
            'direction' => 'Jon Turteltaub', 
            'cast' => 'John Travolta, Kyra Sedgwick, Forest Whitaker, Robert Duvall, Jeffrey DeMunn, Richard Kiley, David Gallagher, Ashley Buccille, Tony Genaro, Sean O\'Bryan, Troy Evans, Bruce A. Young, Vyto Ruginis, Brent Spiner, Susan Merson, Michael Milhoan', 
            'synopsis' => 'No dia do seu 37º aniversário um mecânico (John Travolta) vê uma luz muito intensa e sente um impacto que o leva ao chão, fazendo com que ele imediatamente se torne uma pessoa extraordinariamente inteligente. No início ele não descobre este seu novo dom, mas o fato de não mais dormir, ler alguns livros por dia, prever um terremoto, aprender português em vinte minutos, decifrar códigos militares, entre outras coisas, chamam a atenção de muita gente, inclusive do governo, que deseja utilizar esta inteligência no Serviço Secreto e não em benefício da comunidade, que é o sonho dele.', 
            'duraction' => '123', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10749)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);

        $movie = Movie::create([
            'tmdb_id' => '8840', 
            'title' => 'Coração de Dragão', 
            'original_title' => 'DragonHeart', 
            'poster' => 'http://image.tmdb.org/t/p/original/xt2rtcGtOG9jTZsA6jHtDeX33Ab.jpg', 
            'country' => 'US', 
            'year' => 1996, 
            'direction' => 'Rob Cohen', 
            'cast' => 'Dennis Quaid, David Thewlis, Pete Postlethwaite, Dina Meyer, Julie Christie, Sean Connery, John Gielgud, Lee Oakes, Brian Thompson, Jason Isaacs, Wolf Christian, Terry O\'Neill, Eva Vejmělková, Milan Bahúl, Peter Hric, Sandra Kovacicova, Kyle Cohen, Thom Baker', 
            'synopsis' => 'No século X, durante uma revolta de camponeses, o rei, um terrível tirano, morre nos combates. Seu filho, um jovem príncipe, presencia tudo, além de ser gravemente ferido. A rainha, vendo o estado do filho, invoca o poder mágico de um dragão para salvá-lo, mas este só concorda em socorrê-lo dividindo o seu coração quando o príncipe jura que será bom e justo. No entanto, ele se torna um rei mais perverso que o pai e um jovem cavaleiro acredita que foi o coração do dragão que modificou o príncipe. Assim, decide eliminar todos os dragões, mas quando falta apenas um para ser morto o cavaleiro passa a ter uma visão real dos fatos.', 
            'duraction' => '103', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);

        $movie = Movie::create([
            'tmdb_id' => '10473', 
            'title' => 'Coração de Dragão - Um Novo Começo', 
            'original_title' => 'DragonHeart: A New Beginning', 
            'poster' => 'http://image.tmdb.org/t/p/original/8mbg22L9MdSyELeNwEJkMDVsEVO.jpg', 
            'country' => 'US', 
            'year' => 2000, 
            'direction' => 'Doug Lefler', 
            'cast' => 'Christopher Masterson, Harry Van Gorkum, Rona Figueroa, Matt Hickey, Henry O, Tom Burke, Robby Benson, Ken Shorter', 
            'synopsis' => 'Quando um garoto solitário e órfão descobre aquele que pode ser o último dragão vivo na terra, ele percebe que seu sonho de se tornar um cavalheiro pode virar realidade. Entre desafios e obstáculos, a dupla vai vivendo heroicas aventuras, mas algo maior se aproxima. Eles estariam preparados para grandes desafios?', 
            'duraction' => '84', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '451644', 
            'title' => 'Coração de Dragão 4: A Batalha pelo Coração de Fogo', 
            'original_title' => 'Dragonheart: Battle for the Heartfire', 
            'poster' => 'http://image.tmdb.org/t/p/original/e8JBfdyQNK3EJ12mfI9jzt3PtoA.jpg', 
            'country' => 'US', 
            'year' => 2017, 
            'direction' => 'Patrik Syversen', 
            'cast' => 'Marte Germaine Christensen, Patrick Stewart, Tom Rhys Harries, Jessamine-Bliss Bell, Tamzin Merchant, André Eriksen, Richard Cordery, Martin Hutson, Delroy Brown, Turlough Convery, Dina De Laurentiis, Elijah Ungvary, Stig Frode Henriksen, Daniel Berge Halvorsen, Ørjan Gamst, Lewis Mackinnon', 
            'synopsis' => 'Ação, aventura e fantasia esperam por você neste novo capítulo da saga “Coração de Dragão”. Drago, um dragão que compartilha seu coração com o Rei da Britânia, precisa encontrar um herdeiro para o trono por causa do falecimento do Rei. Mas os possíveis herdeiros, os irmãos gêmeos Edric e Meghan, usam sua força e habilidade de controlar o fogo herdados do dragão um contra o outro.', 
            'duraction' => '98', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '300803', 
            'title' => 'Coração de Dragão 3 - A Maldição do Feiticeiro', 
            'original_title' => 'Dragonheart 3: The Sorcerer\'s Curse', 
            'poster' => 'http://image.tmdb.org/t/p/original/6OirjSXzplK1R1tFrFSaMyECEza.jpg', 
            'country' => 'US', 
            'year' => 2015, 
            'direction' => 'Colin Teague', 
            'cast' => 'Julian Morris, Tamzin Merchant, Jassa Ahluwalia, Ben Kingsley, Jonjo O\'Neill, Christopher Fairbank, Ozama Oancea, Jake Curran, Dominic Mafham', 
            'synopsis' => 'Quando o aspirante à cavaleiro Gareth (Julian Morris) sai em busca de um cometa caído com boatos de que possa conter ouro, ele fica chocado ao encontrar na verdade o dragão Drago (voz de Ben Kingsley). Após Drago salvar a vida de Gareth os dois tornam-se intrinsecamente ligados, e devem trabalhar juntos para derrotar um malvado feiticeiro e parar seu reinado de terror. Ao longo do caminho, Gareth aprende o verdadeiro significado de ser um cavaleiro nesta ação-aventura de fantasia para as idades.', 
            'duraction' => '97', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);

        $movie = Movie::create([
            'tmdb_id' => '602', 
            'title' => 'Independence Day', 
            'original_title' => 'Independence Day', 
            'poster' => 'http://image.tmdb.org/t/p/original/yVB3Ja8pGr2IrN1nPx2v0Kr6cjK.jpg', 
            'country' => 'US', 
            'year' => 1996, 
            'direction' => 'Roland Emmerich', 
            'cast' => 'Jeff Goldblum, Will Smith, Bill Pullman, Mary McDonnell, Judd Hirsch, Robert Loggia, Randy Quaid, Margaret Colin, Vivica A. Fox, James Rebhorn, Harvey Fierstein, Adam Baldwin, James Duval, Lisa Jakub, Giuseppe Andrews, Harry Connick Jr., Mae Whitman, Kiersten Warren, John Storey, Frank Novak, Devon Gummersall, Leland Orser, Mirron E. Willis, Ross Lacy, David Pressman, Raphael Sbarge, Bobby Hosea, Dan Lauria, Steve Giannelli, Eric Paskel, Carlos Lacámara, John Bennett Perry, Troy Willis, Tim Kelleher, Wayne Wilderson, Jay Acovone, Jana Marie Hupp, Robert Pine, David Channell, John Capodice, Greg Collins, Derek Webster, Mark Fite, Levan Uchaneishvili, Kristof Konrad, Kevin Sifuentes, Elston Ridgle, Randy Oglesby, Jack Moore, Barry Del Sherman, Lyman Ward, Anthony Crivello, Richard Speight Jr., Joe Fowler, Sharon Tay, Peter J. Lucas, Yelena Danova, Johnny Kim, Vanessa J. Wells, Sayed Badreya, Adam Tomei, John Bradley, Kimberly Beck, Andrew Keegan, Jim Piddock, Pat Skipper, Erick Avari, Brent Spiner, James Wong, Frank Welker, Janette Andrade', 
            'synopsis' => 'No dia 2 de julho os sistemas de comunicação do mundo inteiro se transformam em um caos, devido à uma estranha interferência atmosférica. Logo se descobre que enormes objetos estão em curso de colisão com a Terra. Inicialmente imagina-se que se tratam de meteoros, mas logo revela-se ser na verdade uma imensa nave espacial pilotada por alienígenas. Após frustradas tentativas de se comunicar com os extra-terrestres, um técnico em comunicação descobre que os seres do espaços estão usando os satélites terrestres para se comunicarem e iniciarem em menos de um dia um ataque conjunto nas principais cidades do planeta. No dia 3 de julho o ataque alienígena começa de forma esmagadora e nem armas nucleares conseguem destruir a blindagem protetora. Mas no dia 4 de julho surge uma possibilidade de vencer o invasor e nesta hora todas as nações precisam se unir, pois está em jogo a existência da raça humana.', 
            'duraction' => '153', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '47933', 
            'title' => 'Independence Day: O Ressurgimento', 
            'original_title' => 'Independence Day: Resurgence', 
            'poster' => 'http://image.tmdb.org/t/p/original/8ELbJ6YIOmCdFM0tPDgve3uXLTM.jpg', 
            'country' => 'US', 
            'year' => 2016, 
            'direction' => 'Roland Emmerich', 
            'cast' => 'Liam Hemsworth, Jeff Goldblum, Bill Pullman, Maika Monroe, Sela Ward, William Fichtner, Vivica A. Fox, Charlotte Gainsbourg, Brent Spiner, Judd Hirsch, Patrick St. Esprit, Joey King, Jessie Usher, Chin Han, AngelaBaby, Grace Huang, Ryan Cartwright, Garrett Wareing, Gbenga Akinnagbe, Mckenna Grace, Ron Yuan, Alice Rietveld, Nicolas Wright, Travis Tope, James A. Woods, Robert Loggia, Deobia Oparei, Travis Hammer, John Storey, Hays Wellford, Sam Quinn, Alma Sisneros, Diana Gaitirira, Humberto Castro, Richard Beal, Joshua Mikel, Monique Candelaria, Stafford Douglas, Robert Neary, Beth Bailey, Mona Malec, Grizelda Quintana, Lance Lim, Brandon K. Hampton, Kenny Leu, Joel Virgel, Jacob Browne, Matthew Munroe, Jade Scott Lewis, Zeb Sanders, Donovan Tyee Smith, Omar Diop, Stephen Oyoung, Casey Messer, J.P. Murrieta, Ava Del Cielo, Leilei Chen, Catharine Pilafas, Katrina Kavanaugh, Jason E. Hill, Sylvie Hagan, Evan Bryn Graves, Aaron Tyler, Jenna Purdy, Arturo del Puerto, Ben Wang, Nicholas Ballas, Tyler Kurtz, John Eric Bentley, Ed Cunningham, Brian T. Delaney, Jon Curry, Robin Atkin Downes, Jake Eberle, Eddie Frierson, Kate Higgins, April Hong, Mela Lee, James Taku Leung, Scott Lawrence, Paul Mercier, Andrew Morgado, Matt Nolan, Paul Pape, Rick Pasqualone, Sam Riegel, Karen Strassman, Courtney Taylor, Kirk Thornton', 
            'synopsis' => 'Após o devastador ataque alienígena ocorrido em 1996, todas as nações da Terra se uniram para combater os extra-terrestres, caso eles retornassem. Para tanto são construídas bases na Lua e também em Saturno, que servem como monitoramento. Vinte anos depois, o revide enfim acontece e uma imensa nave, bem maior que as anteriores, chega à Terra. Para enfrentá-los, uma nova geração de pilotos liderada por Jake Morrison (Liam Hemsworth) é convocada pela presidente Landford (Sela Ward). Eles ainda recebem a ajuda de veteranos da primeira batalha, como o ex-presidente Whitmore (Bill Pullman), o cientista David Levinson (Jeff Goldblum) e seu pai Julius (Judd Hirsch).', 
            'duraction' => '129', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);

        $movie = Movie::create([
            'tmdb_id' => '251', 
            'title' => 'Ghost - Do Outro Lado da Vida', 
            'original_title' => 'Ghost', 
            'poster' => 'http://image.tmdb.org/t/p/original/wlbPxCyGhXoIUkrQY0xsY61xah7.jpg', 
            'country' => 'US', 
            'year' => 1990, 
            'direction' => 'Jerry Zucker', 
            'cast' => 'Patrick Swayze, Demi Moore, Whoopi Goldberg, Tony Goldwyn, Vincent Schiavelli, Gail Boggs, Stephen Root, Rick Aviles, Vivian Bonnell, Armelia McQueen, Angelina Estrada, Augie Blunt, Phil Leeds, Alma Beltran, Dorothy Love Coates, Susan Breslau, Martina Deignan, Derek Thompson', 
            'synopsis' => 'Sam Wheat (Patrick Swayze) e Molly Jensen (Demi Moore) formam um casal muito apaixonado que tem suas vidas destruídas, pois ao voltarem de uma apresentação de \"Hamlet\" são atacados e Sam é morto. No entanto, seu espírito não vai para o outro plano e decide ajudar Molly, pois ela corre o risco de ser morta e quem comanda a trama, e o mesmo que tirou sua vida, é quem Sam considerava seu melhor amigo. Para poder se comunicar com Molly ele utiliza Oda Mae Brown (Whoopi Goldberg), uma médium trambiqueira que consegue ouvi-lo, para desta maneira alertar sua esposa do perigo que corre.', 
            'duraction' => '129', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 9648)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10749)->first();
        $movie->genres()->attach($genre->id);

        $movie = Movie::create([
            'tmdb_id' => '9714', 
            'title' => 'Esqueceram de Mim 3', 
            'original_title' => 'Home Alone 3', 
            'poster' => 'http://image.tmdb.org/t/p/original/zrnZRSDp7ZCHW5gbQuGugRFGPTr.jpg', 
            'country' => 'US', 
            'year' => 1997, 
            'direction' => 'Raja Gosnell', 
            'cast' => 'Alex D. Linz, Olek Krupa, Rya Kihlstedt, Lenny Von Dohlen, Scarlett Johansson, Seth Smith, Haviland Morris, David Thornton, Kevin Kilner, Marian Seldes, Christopher Curry, Baxter Harris, James Saito, Kevin Gudahl, Richard Hamilton, Neil Flynn, Tony Mockus Jr., Pat Healy, James Chisem, Darwin Harris, Sharon Sachs, Joseph Luis Caballero, Freeman Coffey, Krista Lally, Adrianne Duncan, Larry C. Tankson, Jennifer A. Daley, Darren T. Knaus, Nick Jantz', 
            'synopsis' => 'Um grupo de contrabandistas internacionais esconde um valioso chip de computador em um carrinho de brinquedo, que vai parar nas mãos do endiabrado menino Alex Pruitt (Alex D. Linz). Na tentativa de reaver o chip, eles precisarão antes enfrentar as armadilhas criadas pelo garoto para defender seu brinquedo.', 
            'duraction' => '102', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '772', 
            'title' => 'Esqueceram de Mim 2 - Perdido em Nova York', 
            'original_title' => 'Home Alone 2: Lost in New York', 
            'poster' => 'http://image.tmdb.org/t/p/original/A9jPbxBQ3PnMCqEaZ9f9Clm2SSY.jpg', 
            'country' => 'US', 
            'year' => 1992, 
            'direction' => 'Chris Columbus', 
            'cast' => 'Macaulay Culkin, Joe Pesci, Catherine O\'Hara, Daniel Stern, John Heard, Devin Ratray, Hillary Wolf, Gerry Bamman, Jedidiah Cohen, Kieran Culkin, Tim Curry, Eddie Bracken, Rob Schneider, Mike Maronna, Ralph Foody, Abdoulaye N\'Gom, Brenda Fricker, Dana Ivey, Ally Sheedy, Clare Hoak, Terrie Snell, Senta Moses, Anna Slotky, Leigh Zimmerman, Monica Devereux, Bob Eubanks, Rip Taylor, Jaye P. Morgan, Jimmie Walker, Harry Hutchinson, Clarke Devereux, Rod Sell, Ron Canada, Cedric Young, William D\'Ambra, Mark Morettini, James Cole, Donald Trump, Warren Rice, Anthony Cannata, Michael Goldfinger, Mario Todisco, Eleanor Columbus, Daiana Campeanu', 
            'synopsis' => 'Garoto (Macaulay Culkin) se vê novamente sozinho, quando em virtude de uma confusão no aeroporto que fez com que ele ao invés de embarcar com a família para a Flórida partisse sozinho para Nova York. Mas como tinha o cartão de crédito do pai (John Heard), ele se hospeda no melhor hotel da cidade, mas também encontra os dois ladrões que tinha enfrentado no passado e que agora planejam se vingar dele.', 
            'duraction' => '120', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 80)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '771', 
            'title' => 'Esqueceram de Mim', 
            'original_title' => 'Home Alone', 
            'poster' => 'http://image.tmdb.org/t/p/original/8lLWzShWxhrFlbBc13libQQOwGR.jpg', 
            'country' => 'US', 
            'year' => 1990, 
            'direction' => 'Chris Columbus', 
            'cast' => 'Macaulay Culkin, Joe Pesci, Daniel Stern, John Heard, Catherine O\'Hara, Roberts Blossom, Devin Ratray, Mike Maronna, Hillary Wolf, Angela Goethals, Gerry Bamman, Terrie Snell, Daiana Campeanu, Kieran Culkin, Kristin Minter, John Candy, Ralph Foody, Michael Guido, Larry Hankin, Ken Hudson Campbell, Hope Davis, Billie Bird, Bill Erwin, Jeffrey Wiseman, Virginia Smith, Ray Toler, Clarke Devereux, Dan Charles Zukoski, Matt Doherty, Jedidiah Cohen, Senta Moses, Anna Slotky, Gerry Becker, Victor Cole, Porscha Radcliffe, Brittany Radcliffe, Peter Siragusa, Alan Wilder, Dianne B. Shaw, James Ryan, Mark Beltzman, Ann Whitney, Jim Ortlieb, Monica Devereux, Lynn Mansbach, Tracy J. Connor, Sandra Macat, Richard J. Firfer, Kate Johnson, Michael Hansen, Peter Pantaleo, Jean-Claude Sciore, Edward Bruzan, Frank Cernugel, Eddie Korosa, Robert Okrzesik, Leo Perion, Vince Waidzulis', 
            'synopsis' => 'Uma família de Chicago planeja passar o Natal em Paris. Porém, em meio às confusões da viagem, um dos filhos, Kevin (Macaulay Culkin), acaba esquecido em casa. O garoto de apenas oito anos é obrigado a se virar sozinho e defender a casa de dois insistentes ladrões.', 
            'duraction' => '103', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);

        $movie = Movie::create([
            'tmdb_id' => '619', 
            'title' => 'O Guarda-Costas', 
            'original_title' => 'The Bodyguard', 
            'poster' => 'http://image.tmdb.org/t/p/original/7TycbAN7t104jmh3XSTbyb3G7hV.jpg', 
            'country' => 'US', 
            'year' => 1992, 
            'direction' => 'Mick Jackson', 
            'cast' => 'Whitney Houston, Kevin Costner, Gary Kemp, Bill Cobbs, Ralph Waite, Tomas Arana, Michele Lamar Richards, Mike Starr, Christopher Birt, DeVaughn Nixon, Gerry Bamman, Joe Urla, Tony Pierce, Charles Keating, Robert Wuhl, Debbie Reynolds, Danny Kamin, Richard Schiff, Nathaniel Parker, Bert Remsen, Stephen Shellen, Chris Connelly, Patricia Healy, Blumen Young, Linda Thompson, Towanna King, David Foster, Ethel Ayler, Sean Cheesman, Donald Hotton, Nita Whitaker, Rob Sullivan, Jennifer Lyon-Buchanan, Victoria Bass', 
            'synopsis' => 'Frank Farmer (Kevin Costner), um guarda-costas altamente eficiente e caro, é contratado para proteger Rachel Marron (Whitney Houston), uma grande cantora e atriz, que está recebendo cartas anônimas e ameaçadoras. Frank é um ex-agente do Serviço Secreto que ainda não se perdoou do sentimento de culpa em relação à sua inabilidade de proteger o presidente Reagan, que quase foi assassinado por John Hinckley. Frank e Rachel se apaixonam mas ele não deixa este amor evoluir, pois quando estão juntos Rachel fica vulnerável. Paralelamente, novos atentados acontecem.', 
            'duraction' => '129', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10402)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10749)->first();
        $movie->genres()->attach($genre->id);

        $movie = Movie::create([
            'tmdb_id' => '109445', 
            'title' => 'Frozen: Uma Aventura Congelante', 
            'original_title' => 'Frozen', 
            'poster' => 'http://image.tmdb.org/t/p/original/MrFZiS8YnafcPrMTbfAEOJDgCd.jpg', 
            'country' => 'US', 
            'year' => 2013, 
            'direction' => 'Chris Buck, Jennifer Lee', 
            'cast' => 'Kristen Bell, Idina Menzel, Jonathan Groff, Josh Gad, Santino Fontana, Alan Tudyk, Ciarán Hinds, Chris Williams, Stephen J. Anderson, Maia Wilson, Edie McClurg, Robert Pine, Maurice LaMarche, Livvy Stubenrauch, Eva Bella, Spencer Ganus, Ava Acres, Stephen Apostolina, Krik Baily, David Boat, Paul Briggs, Woody Buck, Lewis Cleale, Wendy Cutler, Terri Douglas, Eddie Frierson, Jean Gilpin, Jackie Gonneau, Nicholas Guest, Bridget Hoffman, Nick Jameson, Daniel Kaz, John Lavelle, Jennifer Lee, Patricia Lentz, Annie Lopez, Katie Lowes, Mona Marshall, Dara McGarry, Scott Menville, Adam Overett, Paul Pape, Courtney Peldon, Jennifer Perry, Raymond S. Persi, Jean-Michel Richaud, Lynwood Robinson, Carter Sand, Jadon Sand, Katie Silverman, Pepper Sweeney, Fred Tatasciore, Annaleigh Ashford, Jenica Bergere, Tyree Brown, Anaïs Delva, Jesse Corti, Jeffrey Marcus, Tucker Gilmore, Kirk Baily, Tommar Wilson, June Christopher', 
            'synopsis' => 'A caçula Anna (Kristen Bell/Gabi Porto) adora sua irmã Elsa (Idina Menzel/Taryn Szpilman), mas um acidente envolvendo os poderes especiais da mais velha, durante a infância, fez com que os pais as mantivessem afastadas. Após a morte deles, as duas cresceram isoladas no castelo da família, até o dia em que Elsa deveria assumir o reinado de Arendell. Com o reencontro das duas, um novo acidente acontece e ela decide partir para sempre e se isolar do mundo, deixando todos para trás e provocando o congelamento do reino. É quando Anna decide se aventurar pelas montanhas de gelo para encontrar a irmã e acabar com o frio.', 
            'duraction' => '102', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 16)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);

        $movie = Movie::create([
            'tmdb_id' => '88730', 
            'title' => 'Os Saltimbancos Trapalhões', 
            'original_title' => 'Os Saltimbancos Trapalhões', 
            'poster' => 'http://image.tmdb.org/t/p/original/fWYBeNsJUPtxtnXHT1ViLI3LeKe.jpg', 
            'country' => 'BR', 
            'year' => 1981, 
            'direction' => 'J.B. Tanko', 
            'cast' => 'Renato Aragão, Dedé Santana, Mussum, Zacarias, Lucinha Lins, Mário Cardoso, Eduardo Conde, Mila Moreira, Paulo Fortes, Carlos Kurt', 
            'synopsis' => 'Funcionários humildes, os amigos Didi (Renato Aragão), Dedé (Dedé Santana), Mussum (Mussum) e Zacarias (Zacarias) se tornam a grande atração do circo Bartolo, graças à sua incrível capacidade de fazer o público rir. Mas o sucesso lhes têm um preço: a oposição do mágico Assis Satã e a ganância do Barão, o dono do circo. Juntos, os quatro amigos precisarão combatê-los.', 
            'duraction' => '95', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10402)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '123568', 
            'title' => 'Os Trapalhões e o Mágico de Oróz', 
            'original_title' => 'Os Trapalhões e o Mágico de Oróz', 
            'poster' => 'http://image.tmdb.org/t/p/original/vuqGUnWLyLC17zYXWPwfT43145A.jpg', 
            'country' => 'BR', 
            'year' => 1984, 
            'direction' => 'Victor Lustosa, Dedé Santana', 
            'cast' => 'Renato Aragão, Dedé Santana, Mussum, Zacarias, José Dumont, Arnaud Rodrigues, Mauricio do Valle, Jofre Soares, Tony Tornado, Bia Seidl, Dary Reis, Xuxa Meneghel', 
            'synopsis' => 'Desesperados com a falta de comida e a miséria no Nordeste, os amigos Didi, Sóro e Tatu partem para a cidade. No caminho, encontram um Espantalho abandonado que deseja possuir um cérebro. Seguindo, descobrem o Homem de Lata, cujo problema é a falta de um coração. Juntos chegam à cidade de Oroz, castigada pela seca e a tirania do coronel Ferreira, em relação ao qual o Delegado Leão não toma nenhuma atitude, pois é covarde.', 
            'duraction' => '93', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 10402)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '143552', 
            'title' => 'Os Trapalhões na Serra Pelada', 
            'original_title' => 'Os Trapalhões na Serra Pelada', 
            'poster' => 'http://image.tmdb.org/t/p/original/wYwUK4lmYx5bhb2Mprxy3j1tJ8q.jpg', 
            'country' => 'BR', 
            'year' => 1982, 
            'direction' => 'J.B. Tanko', 
            'cast' => 'Renato Aragão, Dedé Santana, Mussum, Zacarias, Louise Cardoso, Eduardo Conde, Wilson Grey, Gracindo Júnior, Ana Maria Magalhães, Dary Reis, Paulo Ramos', 
            'synopsis' => 'Os amigos Curió, Boroca, Mexelete e Bateia, aventuram-se em busca de ouro no garimpo de Serra Pelada. A região é controlada pelo estrangeiro Von Bermann, cujas ordens são executadas pelo capanga Bira. Sedento de poder, o gringo contrabandeia o ouro e deseja apoderar-se das terras do brasileiro Ribamar, que se recusa a fazer negócio antes da chegada do filho Chicão. Com a ajuda dos quatro trapalhões, o rapaz luta com os bandidos e socorre o pai em perigo.', 
            'duraction' => '88', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 10751)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);

        $movie = Movie::create([
            'tmdb_id' => '34196', 
            'title' => 'Deus é Brasileiro', 
            'original_title' => 'Deus É Brasileiro', 
            'poster' => 'http://image.tmdb.org/t/p/original/ha7ZxUkNK9untPvwexlA2y6B1W3.jpg', 
            'country' => 'BR', 
            'year' => 2003, 
            'direction' => 'Carlos Diegues', 
            'cast' => 'Antônio Fagundes, Wagner Moura, Paloma Duarte, Bruce Gomlevsky, Stepan Nercessian, Castrinho, Hugo Carvana, Chico Assis, Thiago Farias, Susana Werner, Toni Garrido', 
            'synopsis' => 'Cansado de tantos erros cometidos pela humanidade, Deus (Antônio Fagundes) resolve tirar umas férias dela, decidindo ir descansar em alguma estrela distante. Para tanto precisa encontrar um substituto para ficar em seu lugar enquanto estiver fora. Deus resolve então procurá-lo no Brasil, país tão religioso que ainda não tem um santo seu reconhecido oficialmente. Seu guia em sua busca é Taoca (Wagner Moura), um esperto pescador que vê em seu encontro com Deus sua grande chance de se livrar dos problemas pessoais. Juntos eles rodarão o Brasil em busca do substituto ideal.', 
            'duraction' => '110', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 14)->first();
        $movie->genres()->attach($genre->id);

        $movie = Movie::create([
            'tmdb_id' => '154441', 
            'title' => 'Até que a Sorte nos Separe', 
            'original_title' => 'Até que a Sorte nos Separe', 
            'poster' => 'http://image.tmdb.org/t/p/original/bUPwSEPx427jfY7CUrzdytC9woG.jpg', 
            'country' => 'BR', 
            'year' => 2012, 
            'direction' => 'Roberto Santucci', 
            'cast' => 'Leandro Hassum, Danielle Winits, Kiko Mascarenhas, Rita Elmôr, Ailton Graça, Julia Dalavia, Henry Fiuka, Marcelo Saback, Carlos Bonow, Júlio Braga, Maurício Sherman, Victor Mayer, Antônio Fragoso, Rodrigo Sant’anna, Bruna Di Tullio, Bruna Pietronave, Gustavo Novaes, Helô Cintra, Luana de Nigro, Marcos Pitombo, Natasha Stransky, Patrícia Batitucci, Tamara Taxman, Atualpa Frota, Bruno Buaiz, Cleann Orben, Fernanda Nakamura, Heitor Vignoli, Leonardo Xavier, Livia Guerra, Luiz Mendonça, Mario Hermeto, Rodrigo Candelot, Saulo Rodrigues, Stela Celano, Vanessa Bueno, Vera Rosa', 
            'synopsis' => 'Tino (Leandro Hassum) é um pai de família comum que vê sua vida virar de ponta a cabeça após ganhar na loteria. Levando uma vida de ostentação ao lado da mulher, Jane (Danielle Winits), ele gasta todo o dinheiro em 15 anos. Ao se ver quebrado, Tino aceita a ajuda do vizinho Amauri (Kiko Mascarenhas), um consultor de finanças super burocrático e que por sinal vive seu próprio drama ao enfrentar uma crise no casamento com Laura (Rita Elmôr). Tentando evitar que Jane descubra a nova situação financeira, afinal ela está grávida do terceiro filho não pode passar por fortes emoções, Tino se envolve em várias confusões para fingir que tudo continua bem. Para isso, conta com ajuda do melhor amigo, Adelson (Aílton Graça), e dos filhos.', 
            'duraction' => '104', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '228177', 
            'title' => 'Até que a Sorte nos Separe 2', 
            'original_title' => 'Até que a Sorte nos Separe 2', 
            'poster' => 'http://image.tmdb.org/t/p/original/dCXOifQ6HixXBvhkIRKLDdCXnX0.jpg', 
            'country' => 'BR', 
            'year' => 2013, 
            'direction' => 'Roberto Santucci', 
            'cast' => 'Leandro Hassum, Camila Morgado, Kiko Mascarenhas, Jerry Lewis, Anderson Silva, Rita Elmôr, Marcius Melhem, Julia Dalavia', 
            'synopsis' => 'Três anos depois, Tino (Leandro Hassum) e Jane (Camila Morgado) estão mais uma vez em dificuldades financeiras. O saldo bancário do casal é salvo graças ao inesperado falecimento de tio Olavinho, que deixou uma herança de R$ 100 milhões a ser dividida igualmente entre Jane e sua mãe, Estela (Arlete Salles). Como o último desejo do tio foi que suas cinzas sejam jogadas no Grand Canyon, Tino aproveita para levar a esposa e dois de seus filhos para conhecer Las Vegas. Entretanto, ele se empolga com a jogatina de um cassino e perde todo o dinheiro ganho por Jane na mesa de pôquer. Para piorar a situação, ainda fica devendo US$ 10 milhões a um capanga da máfia mexicana (Charles Paraventi), que deseja receber o dinheiro a todo custo.', 
            'duraction' => '102', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);
        $movie = Movie::create([
            'tmdb_id' => '324465', 
            'title' => 'Até Que A Sorte Nos Separe 3 - A Falência Final', 
            'original_title' => 'Até que a Sorte nos Separe 3 - A Falência Final', 
            'poster' => 'http://image.tmdb.org/t/p/original/fFinhlDDT4ZGgmXQHvpDaGsBZG2.jpg', 
            'country' => 'BR', 
            'year' => 2015, 
            'direction' => 'Roberto Santucci, Marcelo Antunez', 
            'cast' => 'Camila Morgado, Leandro Hassum, Ailton Graça, Arlete Salles, Henry Fiuka', 
            'synopsis' => 'Após perder a herança da família em Las Vegas, Tino, já falido, arranja um trabalho de camelô na rua. Um dia é atropelado pelo filho do empresário mais rico do país, ficando assim por meses em coma. Quando acorda, Tino descobre que o homem que o atropelou está apaixonado por sua filha, e os dois pretendem se casar.', 
            'duraction' => '106', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 35)->first();
        $movie->genres()->attach($genre->id);

        $movie = Movie::create([
            'tmdb_id' => '644', 
            'title' => 'A.I. Inteligencia Artificial', 
            'original_title' => 'A.I. Artificial Intelligence', 
            'poster' => 'http://image.tmdb.org/t/p/original/sQasyc5byDqjCZYXQDK215Jo7RD.jpg', 
            'country' => 'US', 
            'year' => 2001, 
            'direction' => 'Steven Spielberg', 
            'cast' => 'Haley Joel Osment, Frances O\'Connor, Sam Robards, Jake Thomas, Jude Law, William Hurt, Robin Williams, Ben Kingsley, Meryl Streep, Chris Rock, Ken Leung, Clark Gregg, Kevin Sussman, Tom Gallop, Eugene Osment, April Grace, Matt Winston, Sabrina Grdevich, Theo Greenly, Michael Mantell, Keith Campbell, Brian Turk, Brendan Gleeson, Christopher Dye, Jack Angel, Tim Rigby, Enrico Colantoni, Adrian Grenier, Matt Malloy, Brent Sexton, Erik Bauersfeld, Michael Fishman, Diane Fletcher, Al Jourgensen, Paul Barker, Vito Carenzo, Adam Grossman, Rena Owen, Adam Alexi-Malle, Laurence Mason', 
            'synopsis' => 'Na metade do século XXI, o efeito estufa derreteu uma grande parte das calotas polares da Terra, fazendo com que boa parte das cidades litorâneas do planeta fiquem parcialmente submersas. Para controlar este desastre ambiental a humanidade conta com o auxílio de uma nova forma de computador independente, com inteligência artificial, conhecido como A.I. É neste contexto que vive o garoto David Swinton (Haley Joel Osment), que irá passar por uma jornada emocional inesquecível.', 
            'duraction' => '146', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);

        $movie = Movie::create([
            'tmdb_id' => '95', 
            'title' => 'Armageddon', 
            'original_title' => 'Armageddon', 
            'poster' => 'http://image.tmdb.org/t/p/original/uZczCkMF8UK8uyVaxtM8efc9m9z.jpg', 
            'country' => 'US', 
            'year' => 1998, 
            'direction' => 'Michael Bay', 
            'cast' => 'Bruce Willis, Billy Bob Thornton, Ben Affleck, Liv Tyler, Will Patton, Steve Buscemi, William Fichtner, Michael Clarke Duncan, Peter Stormare, Owen Wilson, Ken Hudson Campbell, Jessica Steen, Chris Ellis, Keith David, Jason Isaacs, Marshall R. Teague, J. Patrick McCormack, Ian Quinn, Charlton Heston, Eddie Griffin, Sage Allen, Grace Zabriskie, Grayson McCouch, Clark Heathcliffe Brolly, Greg Collins, John Mahon, K.C. Leomiti, Stanley Anderson, James Harper, Harry Humphries, Ellen Cleghorne, Udo Kier, Anthony Guidera, Dyllan Christopher, Judith Hoag, Deborah Nishimura, Albert Wong, Jim Ishida, John Aylward, Mark Curry, Seiko Matsuda, Steven Ford, Christian Clemenson, Shawnee Smith, Bodhi Elfman, Dina Morrone, Patrick Lander, Brian Mulligan, Patrick Richwood, Frank Van Keeken, Googy Gress, Frederick Weller, Jeff Austin, Matt Malloy, H. Richard Greene, Brian Brophy, Peter Murnik, Brian Hayes Currie, Andy Milder, Michael Kaplan, Duke Valenti, Michael Taliferro, Billy Devlin, Michele Edison, Michael Bay, Mary Ann Schmidt, Judi Beecher', 
            'synopsis' => 'Após uma chuva de pequenos meteoros que atingem a Terra (incluindo Nova York), a NASA se dá conta de que um asteróide do tamanho do Texas está em um curso de colisão com o nosso planeta. O asteróide se aproxima da Terra à uma velocidade 35.000km/h. e, se o choque acontecer, qualquer forma de vida deixará de existir na Terra, exatamente como o que exterminou os dinossauros 65 milhões de anos atrás. Restando apenas 18 dias para o choque entre a Terra e o asteróide, a única solução possível é enviar astronautas em um ônibus espacial até a superfície do asteróide e lá perfurar 800 pés para colocar um bomba nuclear, detonando-a por controle remoto. Para cumprir tal missão é convocado o mais famoso perfurador de petróleo (Bruce Willis) a grandes profundidades do mundo, que exige formar sua equipe com técnicos que têm um comportamento nada convencional para os padrões do governo.', 
            'duraction' => '151', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 12)->first();
        $movie->genres()->attach($genre->id);

        $movie = Movie::create([
            'tmdb_id' => '218', 
            'title' => 'O Exterminador do Futuro', 
            'original_title' => 'The Terminator', 
            'poster' => 'http://image.tmdb.org/t/p/original/iHVDy91mpqUbUDdG6hfyniFQPx4.jpg', 
            'country' => 'GB, US', 
            'year' => 1984, 
            'direction' => 'James Cameron', 
            'cast' => 'Arnold Schwarzenegger, Michael Biehn, Linda Hamilton, Paul Winfield, Lance Henriksen, Bess Motta, Earl Boen, Rick Rossovich, Bill Paxton, Brian Thompson, Franco Columbu, Dick Miller, Joe Farago, Shawn Schepps, Bruce M. Kerner, Brad Rearden, William Wisher Jr., Ken Fritz, Hettie Lynne Hurtes, Philip Gordon, Stan Yale, Leslie Morris, Hugh Farrington, Harriet Medin, James Ralston, Wayne Stone, John E. Bristol, Patrick Pinney, Greg Robbins, Marianne Muellerleile, Marian Green, J. Randolph Harrison, Darrell Mapson', 
            'synopsis' => 'Num futuro próximo, a guerra entre humanos e máquinas foi deflagrada. Com a tecnologia a seu dispor, um plano inusitado é arquitetado pelas máquinas ao enviar para o passado um andróide (Arnold Schwarzenegger) com a missão de matar a mãe (Linda Hamilton) daquele que viria a se transformar num líder e seu pior inimigo. Contudo, os humanos também conseguem enviar um representante (Michael Biehn) para proteger a mulher e tentar garantir o futuro da humanidade.', 
            'duraction' => '107', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 53)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 878)->first();
        $movie->genres()->attach($genre->id);

        $movie = Movie::create([
            'tmdb_id' => '47931', 
            'title' => 'Tropa de Elite 2: O Inimigo Agora é Outro', 
            'original_title' => 'Tropa de Elite 2', 
            'poster' => 'http://image.tmdb.org/t/p/original/jgypIpQ4TU0fjYEnqxmKFp0hUwe.jpg', 
            'country' => 'BR', 
            'year' => 2010, 
            'direction' => 'José Padilha', 
            'cast' => 'Wagner Moura, Irandhir Santos, André Ramiro, Pedro Van-Held, Maria Ribeiro, Sandro Rocha, Milhem Cortaz, Tainá Müller, Seu Jorge, André Mattos, Adriano Garib, Júlio Adrião, Emílio Orciollo Netto, Charles Fricks, Fabrício Boliveira, Pierre Santos, Cadu Fávero, Luca Bianchi, Juliana Schalch, Rogério Trindade, Luciano Vidigal, Prazeres Barbosa, Roney Villela, Rose Abdallah, Thogun Teixeira, Kikito Junqueira, Marcelo Freixo', 
            'synopsis' => 'Nascimento (Wagner Moura), agora coronel, foi afastado do BOPE por conta de uma mal sucedida operação. Desta forma, ele vai parar na inteligência da Secretaria de Segurança Pública do Estado. Contudo, ele descobre que o sistema que tanto combate é mais podre do que imagina e que o buraco é bem mais embaixo. Seus problemas só aumentam, porque o filho, Rafael (Pedro Van Held), tornou-se adolescente, Rosane (Maria Ribeiro) não é mais sua esposa e seu arqui-inimigo, Fraga (Irandhir Santos), ocupa posição de destaque no seio de sua família.', 
            'duraction' => '115', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 28)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 80)->first();
        $movie->genres()->attach($genre->id);
        $genre = Genre::where('tmdb_id', 18)->first();
        $movie->genres()->attach($genre->id);

        $movie = Movie::create([
            'tmdb_id' => '58496', 
            'title' => 'Senna', 
            'original_title' => 'Senna', 
            'poster' => 'http://image.tmdb.org/t/p/original/vfiaf7rBWNfxp5erFq9IeGMYbS4.jpg', 
            'country' => 'FR, GB', 
            'year' => 2010, 
            'direction' => 'Asif Kapadia', 
            'cast' => 'Ayrton Senna, Alain Prost, Frank Williams, Ron Dennis, Viviane Senna, Milton da Silva, Neide Senna, Jackie Stewart, Sid Watkins, Galvão Bueno, Reginaldo Leme, Gerhard Berger, Nelson Piquet, Nigel Mansell, Jean-Marie Balestre, Bernie Ecclestone, John Bisignano, Pierre Van Vliet', 
            'synopsis' => 'A notável história de Ayrton Senna pontuando suas realizações físicas e espirituais nas pistas e fora delas, sua busca por perfeição e o status de mito que ele alcançou são os temas de SENNA, um documentário que abrange os anos da lenda do automobilismo como piloto de F1 desde sua temporada de estréia em 1984 até sua morte precoce uma década depois.', 
            'duraction' => '106', 
            'type_id' => '1',
        ]);
        $genre = Genre::where('tmdb_id', 99)->first();
        $movie->genres()->attach($genre->id);
        

    }

}
