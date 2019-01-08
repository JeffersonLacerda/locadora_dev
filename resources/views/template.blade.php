@extends('adminlte::master')

@section('adminlte_css')
    @yield('css')
    <style>
        header {
            background-color: #002346;
            color: white;
        }
        header .title {
            font-size: 3em;
        }
        header .phone {
            font-size: 1.3em;
        }
        header .row {
            margin-bottom: 1em;
            margin-top: 1em;
        } 
        #content {
            background-color: #fff;
            min-height: 80vh;
        }
        footer {
            color: white;
        }
        footer .newsletter {
            background-color: #03182E;
        }
        footer .newsletter .row{
            margin: 1em 0;
        }
        footer .address {
            background-color: #002346;
            padding: 0.5em;
            text-align: center;
        }
        footer .address img{
            height: 12em;
        }
        footer .address address{
            margin: 0.5em 0;
        }
        footer .copyright {
            background-color: #03182E;
        }
        footer .copyright p{
            text-align: center;
            margin: 0.5em 0;
            font-weight: bold;
        }


    </style>
@stop

@section('body')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span class="title"><i class="fas fa-chess-queen"></i> Locadora Imperial</span>
                    <div class="box-tools pull-right">
                        <span class="phone"><i class="fas fa-phone"></i> (81)6066-8035</span>&nbsp;&nbsp;
                        <a href="{{ route('home') }}" class="btn btn-danger"> <i class="fas fa-lock"></i>&nbsp;&nbsp;&nbsp;Área restrita </a>
                    </div>
                </div>
                
            </div>
        </div>
    </header>
    <div id="content">
        @yield('content')
    </div>
    <footer>
        <div class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <p><i class="fas fa-location-arrow"></i> Assine nossa newsletter e fique por dentro de todos os lançamentos</p>
                    </div>
                    <div class="col-md-7">
                        <form class="form-inline" id="form_newsletter">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nome" size="20" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="E-mail" size="40" required>
                            </div>
                            <button id="btn_clear" type="submit" class="btn btn-danger">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="address">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3>[MPI906] Engenharia de Software</h3>
                        <p>Mestrado Profissional em Ciência da Computação com ênfase em Gestão de TI (Turma 10)</p>
                        <p>Prof. Vinicius Cardoso Garcia</p>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('img/Cin.png') }}" alt="">
                    </div>
                    
                    <div class="col-md-4">
                        <h3>Alunos:</h3>
                        <address>
                            Anderson Franca Ferreira
                            <a href="mailto:aff2@cin.ufpe.br">aff2@cin.ufpe.br</a>
                        </address>
                        <address>
                            Jobson Tenório do Nascimento
                            <a href="mailto:jtn@cin.ufpe.br">jtn@cin.ufpe.br</a>
                        </address>
                        <address>
                            José Fernando da Silva
                            <a href="mailto:jfs5@cin.ufpe.br">jfs5@cin.ufpe.br</a>
                        </address>
                        <address>
                            Wellyson Fernando Nunes Souza
                            <a href="mailto:wfns@cin.ufpe.br">wfns@cin.ufpe.br</a>
                        </address>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="row">
                <div class="col-md-12">
                    <p>Copyright ® 2019 - Todos os Direitos Reservados</p>
                </div>
            </div>
        </div>
    </footer>
@stop

@section('adminlte_js')
    <script>
        $("#form_newsletter").submit(function(){
            alert("Obrigado por assinar nosso newsletter agora você receberá em seu email nossas ofertas e lançamentos!");
            $("#form_newsletter").reset();
        });
    </script>
    @yield('js')
@stop