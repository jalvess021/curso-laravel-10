@extends('admin.layouts.app')

    @section('title', 'Edição de Dúvida')

@section('header')
    <h1 class="text-lg text-black-500">Editar Dúvida {{$support->id}}</h1>
@endsection

@section('content')
    <form action="{{route('supports.update', $support->id)}}" method="post">
    @method('PUT') <!--Método-->
        @include('admin.supports.partials.form')
    </form>
@endsection