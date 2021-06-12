@extends('template.main')
@section('color-bg')
 background-image
@endsection

@section('content')
@section('navbar')
	@include('components.navbar')
@endsection

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card form-box">
                <div class="card-body row p-0">
                    <div class="col-md-12 p-5">

                            <h2 class="text-center">Submissão de trabalho para {{$Apelido}}</h2>
                            <hr>

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif                            

                            <form method="post" action="{{ route('create_trabalho')}}" enctype="multipart/form-data">

                                @csrf
                                <input type="hidden" name="Apelido" value="{{$Apelido}}">

                                <div class="form-group">

                                    <label for="nome">Trabalho: </label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o título do seu trabalho">
                                </div>

                                <div class="form-group">
                                    <label for="autor">Autor: </label>
                                    <input type="text" class="form-control" id="autor" name="autor" placeholder="Insira o nome do autor principal">
                                </div>
                                
                                <div class="form-group">
                                    <label for="coautores">Coautores: </label>
                                    <input type="text" class="form-control" id="coautores" name="coautores" placeholder="Insira o nome dos coautores">
                                </div>

                                <div class="form-group">
                                    <label for="trabalhoPdf">Projeto em arquivo em PDF</label>
                                    <input type="file" class="form-control" id="trabalhoPdf" name="trabalhoPdf">
                                </div>
                                
                                <div class="form-group">
                                    <label for="diarioPdf">Diário de bordo em arquivo PDF</label>
                                    <input type="file" class="form-control" id="diarioPdf" name="diarioPdf">
                                </div>

                                <div class="form-group">
                                    <label for="linkVid">Link para vídeo</label>
                                    <input type="url" class="form-control" id="linkVid" name="linkVid" placeholder="Link para seu vídeo no YouTube">
                                </div>                        

                                <button type="submit" class="btn btn-outline-primary btn-block">Enviar</button>

                            </form>
                    </div>
                </div>   
            </div>
        </div>
        <div class="float "><a href="{{route('welcome')}}" class="float"><i class=""></i></a></div>
    </div>
</div>

@endsection