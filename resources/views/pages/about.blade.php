@extends('default')

@section('title', 'Sobre')
@section('description', 'Versão 0.2')

@section('content')

    <div class="row">
        <div class="col-xs-12">

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">O que é o Coinz?</h3>
                </div>
                <div class="box-body">
                    <p>O Coinz é uma pequena aplicação web que serve para gerir de uma forma simples as tuas moedas.</p>
                </div>
            </div>

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Autor</h3>
                </div>
                <div class="box-body">
                    <p>Leonardo Oliveira. 19 anos. Resolvi criar este pequeno projeto para ter uma primeira experiência em programação web com <a href="https://secure.php.net/" target="_blank">php</a>, aproveitando para desenvolver algo que será útil para gerir a minha coleção de moedas e, quem sabe, as coleções de amigos e familiares. ;)</p>
                </div>
            </div>

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Créditos</h3>
                </div>
                <div class="box-body">
                    <p>Esta aplicação foi desenvolvida em <a href="https://secure.php.net/" target="_blank">php</a>, utilizando <a href="http://laravel.com/" target="_blank">Laravel</a>. O design do site é baseado em <a href="http://getbootstrap.com/" target="_blank">Bootstrap</a>, tendo sido utilizado o tema <a href="https://shapebootstrap.net/item/1524915-adminlte-dashboard-and-control-panel" target="_blank">AdminLTE</a>. Obrigado ao <a href="https://www.linkedin.com/in/pcorado" target="_blank">Pedro</a> pelas suas sugestões.</p>
                </div>
            </div>

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Versões</h3>
                </div>
                <div class="box-body">
                    <p>Atualmente o Coinz encontra-se em fase experimental, tendo apenas algumas funcionalidades básicas e muitos erros para corrigir.</p>
                    <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Data</th>
                            <th>Funcionalidades</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>0.1</td>
                            <td>5 de Novembro de 2015</td>
                            <td>
                                <ul>
                                    <li>Esquema e estrutura iniciais das páginas.</li>
                                    <li>Sistemas de registo e login.</li>
                                    <li>Registo de qualquer tipo de moeda de euro.</li>
                                    <li>Visualização da coleção de moedas de cada utlizador.</li>
                                    <li>Introdução de exemplares de moedas para cada utilizador.</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>0.2 <span class="label label-info">Atual</span></td>
                            <td>16 de Novembro de 2015</td>
                            <td>
                                <ul>
                                    <li>Possibilidade de editar e eliminar moedas e exemplares.</li>
                                    <li>Melhoria na validação da introdução de dados.</li>
                                    <li>Novas mensagens informativas mostradas ao utilizador.</li>
                                    <li>Sistema de confirmação de email e de recuperação de password.</li>
                                    <li>Dois níveis de utilizadores: normal e administrador.</li>
                                    <li>Melhorias gerais na funcionalidade das páginas.</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>0.3</td>
                            <td>Brevemente</td>
                            <td>
                                <ul>
                                    <li>Possibilidade de visualizar e editar perfil do utilizador.</li>
                                    <li>...</li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table></div>
            </div>

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Licença</h3>
                </div>
                <div class="box-body">
                    <p>Este projeto utiliza a licença <a rel="license" href="http://www.apache.org/licenses/LICENSE-2.0.html" target="_blank">Apache 2.0</a>.</p>
                </div>
            </div>

        </div>
    </div>

@endsection