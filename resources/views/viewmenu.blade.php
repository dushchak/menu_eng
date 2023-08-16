@extends('layouts.base')



@section ('main')
<div class="newdish">
    <a href="{{route('dish.add', $menu[0]->places_id) }}">new dish</a>
</div>
@if(count ($menu) > 0) 
<table class="table table-striped">
    @foreach ($menu as $dish)
    <tr>
        <td><img class="dish__image" src="/storage/images/dishes/{{$dish->thumbnail}}" alt=""></td>
        <td>{{ $dish->dishtitle }}</td>
        <td>{{ $dish->dishgroup }}</td>
        <td>{{ $dish->description }}</td>
        <td>{{ $dish->portionweight }}</td>
        <td>{{ $dish->portioncost }}</td>
        <td>{{ $dish->cost100g }}</td>
        @auth
        <td><a href="{{ route('dish.up', $dish->id)  }}">+</a></td>
        <td><a href="{{ route('dish.down', $dish->id)  }}">-</a></td>
        <td><a href="{{ route('dish.editdish', $dish->id) }}">edit</a></td>
        <td><a href="{{ route('dish.formdeldish', $dish->id) }}">delete</a></td>
        @endauth
        @guest
        <td><a href="">Повідомити про помилку</a></td>
        @endguest
        


    </tr>
    @endforeach
</table>
@endif

<div class="testinfo">
    Lorem ipsum dolor sit amet consectetur adipisicing, elit. Eligendi aspernatur provident pariatur, corrupti placeat molestias tenetur quidem voluptatem vero voluptatibus ipsa vitae, magni quasi quae optio nisi ipsum eius assumenda.
</div>

<div class="footer">
   
    {!! 
        
     QrCode::size(400)
 //       ->style('dot')
        ->eye('circle')
 //       ->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
        ->gradient(255, 0, 0, 0, 0, 255, 'diagonal')
        ->margin(1)
        ->generate(Request::url()); 
    !!}
<div>
    <a href="{{ route('printQRpage', $menu[0]->places_id )   }}">Сторінка для друку</a>   
</div>
    

    
</div>
@endsection('main')
