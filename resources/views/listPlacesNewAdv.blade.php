
@extends('layouts.base')

@section ('title', 'Онлайн меню Вінниці - qr меню, піццерії, кафе, ресторани та інші заклади харчування міста Вінниці')

@section ('main')


@if(count ($places) > 0)
	<div class="listblock">

		<div>
			Список закладів
		</div>

		<h1>+ Додати Промо-оголошення</h1>

	@foreach ($places as $place)
	<div class="listplace">


		<div class="listplace__info">
			
			<h2><a href="{{ route('place.view', $place->id) }}">{{ $place->name }}</a></h2>
			<div> {{ $place->adress }}</div>



			@php
				//echo  count ($place->ads()->latest()->get()); /// кількість оголошень ресторана
				$countads = count ($place->ads()->latest()->get()); /// кількість оголошень ресторана
			@endphp
			<div>
				<a class="place_promos_link" href="{{ route('placeAds', $place->id) }}">Промо-Акції </a>({{$countads}})
				<a class="btn_m" href="{{ route('ads.new', $place->id) }}">+ Нове оголошення</a>
			</div>

		</div>
</div>


	@endforeach
	</div>
@endif
@endsection('main')