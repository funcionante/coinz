@extends('app')

@section('title', $title = 'Sobre')
@section('description', 'Versão 0.1')

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
                    <h3 class="box-title">Licença</h3>
                </div>
                <div class="box-body">
                    <p>Este projeto utiliza a licença <a rel="license" href="http://www.apache.org/licenses/LICENSE-2.0.html" target="_blank">Apache 2.0</a>.</p>
                </div>
            </div>
        </div>
    </div>

@endsection