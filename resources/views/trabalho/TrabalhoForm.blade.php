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

                            <form method="post" action="{{ route('create_trabalho')}}" enctype="multipart/form-data">

                                @csrf
                                <input type="hidden" name="Apelido" value="{{$Apelido}}">

                                <div class="form-group">
                                    <label for="nome">Título do trabalho: </label>
                                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" placeholder="Insira o título do seu trabalho">
                                    @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="autor">Autor: </label>
                                    <input id="autor" type="text" class="form-control @error('autor') is-invalid @enderror" name="autor" placeholder="Insira o nome do autor principal">
                                    @error('autor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="coautores">Coautores: </label>
                                    <input id="coautores" type="text" class="form-control @error('coautores') is-invalid @enderror" name="coautores" placeholder="Insira o nome dos coautores">
                                    @error('coautores')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="trabalhoPdf">Trabalho em arquivo PDF</label>
                                    <input id="trabalhoPdf" type="file" class="form-control @error('trabalhoPdf') is-invalid @enderror" name="trabalhoPdf">
                                    @error('trabalhoPdf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="diarioPdf">Diário de bordo em arquivo PDF</label>
                                    <input id="diarioPdf" type="file" class="form-control @error('diarioPdf') is-invalid @enderror" name="diarioPdf">
                                    @error('diarioPdf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="linkVid">Link para vídeo</label>
                                    <input id="linkVid" type="url" class="form-control @error('linkVid') is-invalid @enderror" name="linkVid" placeholder="Link para seu vídeo no YouTube">
                                    @error('linkVid')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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