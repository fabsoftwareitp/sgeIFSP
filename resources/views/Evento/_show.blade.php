@extends('template.main')

@section('color-bg')
background-image-solid
@endsection


@section('navbar')
@include('components.navbar')
@endsection

@section('footer')
@include('components.footer')
@endsection

@section('content')
@foreach ($evento as $event)
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 background-blue" >
			<div class="container-fluid">
				<div class="row mt-2">
					<div class="col-2 ">
						<img src="{{ url('/storage/' .$event->Logo) }}" class="circle m-2  border-white m-2" alt="logo_do_evento.{{$event->Nome}}">
					</div>
					<div class="col-8">
						<h1 class="display-4 text-blue-light text-white uppercase">{{ $event->Nome }}</h1>
						<p class="lead text-blue-light text-white">
							Inscrições até: {{ date("d/m/Y", strtotime($event->DataFim)) }}
						</p>
						<a class="btn btn-outline-dark " href="{{ route('inscrever_user_evento',['idEvento' => $event->idEvento]) }}" role="button">Inscrever-se</a>
					</div>
				</div>
			</div>

		</div>
		<svg style="pointer-events: none" class="wave-evento" width="100%" height="50px" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 75">
			<defs>

				<clipPath id="x">
					<rect class="x" width="1920" height="75"></rect>
				</clipPath>
			</defs>
			<title>wave-evento</title>
			<g class="y">
				<path class="w" d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48"></path>
			</g>
			<g class="y">
				<path class="z" d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10"></path>
			</g>
			<g class="y">
				<path class="z" d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24"></path>
			</g>
			<g class="y">
				<path class="z" d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150"></path>
			</g>
		</svg>
		{{-- conteudo --}}
		@if(session()->has('success'))
		<div class="alert alert-success col-12">
			{{ session()->get('success') }}
		</div>
		@elseif(session()->has('error'))
		<div class="alert alert-danger col-12">
			{{ session()->get('error') }}
		</div>
		@endif

		<div class="col-8">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-12">
									<h3>Descrição</h3>
									<hr>
									<p class="text-justify h4">O evento <strong>{{$event->Nome}}</strong> será realizado no(s) dia(s) <strong>{{ date("d/m/Y", strtotime($event->DataInicio)) }} </strong> à <strong>{{ date("d/m/Y", strtotime($event->DataFim)) }}</strong>, no local: <strong>{{$event->Local}}</strong>, às: <strong> {{$event->HorarioInicio}}</strong> até <strong> {{$event->HorarioFim}}</strong>,
										ministrado por: <strong>{{$event->Responsavel}}</strong>. </p>
										<h3 class="text-center"> Carga Horária</h3>
										<p class="text-center h3"> {{$event->CargaHoraria}} </p>
										<hr>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 mt-1 mb-1">
						<div class="card">
							<div class="card-body">
								<h3 class="text-center"> Atividades <hr>

									@php
									$side = false;
									@endphp
									@foreach ($atividades as $atividade)
									<div class="container">

										@if ($side == false)
										<div class="row border-right col-md-6 ml-1 pt-1 pb-1">
											<p class="ml-5 pl-4">
												{{$atividade->nomeAtividade}}
											</p>
										</div>
										@php
										$side = true;
										@endphp
										@else
										<div class="row border-left col-md-6 float-right pt-1 pb-1">
											<p class="ml-5 pl-5">

												{{$atividade->nomeAtividade}}
											</p>
										</div>
										@endif
									</div>
								@endforeach </h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
					<div class="card-body">
						<h3 class="text-center">Fotos</h3>
						<hr>
						<div class="col-12">

							<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img class="carousel-galery" src="{{ url('/storage/' . $images[0]->Images) }}" class="img-fluid list_image">
									</div>
									<?php 
									unset($images[0]);
									?>
									@foreach($images as $img)
									<div class="carousel-item">
										<img class="carousel-galery" src="{{ url('/storage/' . $img->Images) }}" class="img-fluid list_image">
									</div>
									@endforeach

								</div>
								<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Anterior</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Próximo</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endforeach
@endsection
