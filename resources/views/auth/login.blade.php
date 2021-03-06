@extends('template.main')
@section('color-bg')
background-image
@endsection
@section('content')
@section('navbar')
	@include('components.navbar')
@endsection

<div class="container ">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6">
            <div class="card form-box">
                <div class="card-body row p-0">
                    <div class="col-md-12 p-5">
                        <div class="circle mx-auto div-green">
                            <i class="material-icons font-white">account_circle</i>
                        </div>
                        <h2 class="text-center">Login do Participante</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email"  value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Senha" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outline-dark btn-block col-12">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>

                            <div class="form-group">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu sua senha?') }}
                                    </a>
                                <a class="btn btn-link" href="{{route('register')}}"> Cadastre-se </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="float "><a href="{{route('welcome')}}" class="float"><i class=""></i></a>

        </div>


</div>

@endsection
