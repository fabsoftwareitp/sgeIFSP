@extends('admin.dashboard')


@section('container-dashboard')

{{-- @section('footer')
	@include('components.footer')
@endsection --}}
<div class="container">
    <div class="row">
        @if(session()->has('success'))
        <div class="alert alert-success col-12">
            {{ session()->get('success') }}
        </div>
        @elseif(session()->has('error'))
        <div class="alert alert-danger col-12">
            {{ session()->get('error') }}
        </div>
        @endif
    </div>

    <div class="row">
        @if(count($eventos)==0)
        <div class="col-md-12 text-center">
            <h1>Ainda Não Há Eventos Disponíveis</h1>
            <!-- Permitir exbição somente para Admins -->
            <p>Clique aqui para adicionar um novo evento: <a class="link_form" href="{{route('showForm_create_evento')}}"><strong> Adicionar Novo Evento</strong></a>
                <p>
        </div>
        @else
        @foreach ($eventos as $evento)
        <div class="col-xs-12 col-sm-12 col-md-6 col-xl-4 col-lg-4 p-2" id="services-evento">
            <div class="box">
                @if ($evento->CondicaoEvento == "Ativado")
                <img src="{{ url("/storage/{$evento->Logo}") }}" class="img-fluid list_image" alt="logo_do_evento.{{$evento->Nome}}">
                <div class="card-body">
                    <h4 class="card-title text-center"><?php echo ucfirst ($evento->Nome) ?></h4>
                    <hr id="list_hr">
                    <div class="row text-center">
                        <a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('showEvent',['Apelido' => $evento->Apelido]) }}"><img src="{{ asset('images/search.svg') }}" class="img-fluid text-center button list_svg">
                            <figcaption>Visualizar</figcaption>
                        </a>
                        <a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('showForm_create_evento', ['idEvento' => $evento->idEvento])}}"><img src="{{ asset('images/edit.svg') }}" class="img-fluid text-center button list_svg">
                            <figcaption>Editar</figcaption>
                        </a>
                        <a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('lista_de_chamada', ['idEvento' => $evento->idEvento])}}"><img src="{{ asset('images/checklist.svg') }}" class="img-fluid text-center button list_svg">
                            <figcaption>Lista de Chamada</figcaption>
                        </a>
                        <a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('list_atividade_admin', ['idEvento' => $evento->idEvento])}}"><img src="{{ asset('images/workshop.svg') }}" class="img-fluid text-center button list_svg">
                            <figcaption>Atividades</figcaption>
                        </a>
                        <a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('show_galeria', ['idEvento' => $evento->idEvento])}}"><img src="{{ asset('images/galery_add.svg') }}" class="img-fluid text-center button list_svg">
                            <figcaption>Galeria</figcaption>
                        </a>
                        <a class="col-md-4 col-sm-6 col-xl-4 links"> <img src="{{ asset('images/delete.svg') }}" class="img-fluid text-center button list_svg" data-toggle="modal" data-target="#exampleModal_{{$evento->idEvento}}">
                            <figcaption>Desativar</figcaption>
                        </a>
                    </div>
                </div>
                @else
                <div class="desativado">
                    <img class="img-fluid list_image" alt="logo_do_evento_{{$evento->Nome}}" src="{{ url("/storage/{$evento->Logo}") }}">
                    <div class="card-body ">
                        <h4 class="card-title text-center "><?php echo ucfirst($evento->Nome) ?></h4>
                        <hr id="list_hr">
                        <h4 class="text-center">Evento Desativado</h4>
                        <div class="row text-center">
                            <a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('showEvent',['idEvento' => $evento->idEvento]) }}"><img src="{{ asset('images/search.svg') }}" class="img-fluid text-center button list_svg">
                                <figcaption>Visualizar</figcaption>
                            </a>
                            <a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('lista_de_chamada', ['idEvento' => $evento->idEvento])}}"><img src="{{ asset('images/checklist.svg') }}" class="img-fluid text-center button list_svg">
                                <figcaption>Lista de Chamada</figcaption>
                            </a>
                            <a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('show_galeria', ['idEvento' => $evento->idEvento])}}"><img src="{{ asset('images/galery_add.svg') }}" class="img-fluid text-center button list_svg">
                                <figcaption>Galeria</figcaption>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                <!-- Modal -->
                <div class="modal fade" id="exampleModal_{{$evento->idEvento}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Desativar Evento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Deseja realmente desativar o evento permanentemente? A ação não poderá ser desfeita.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <a href="{{ route('deletar_evento', ['idEvento' => $evento->idEvento])}}"><button type="button" class="btn btn-danger">Desativar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
        <div class="col-lg-4 col-md-4 p-6">
            <div class="card add circle">
                <a class="text-secondary p-3" href="{{ route('showForm_create_evento') }}">
                    <img src="{{ asset('images/plus-icon.svg') }}" class="img-fluid text-center col-md-12 button p-1">
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
