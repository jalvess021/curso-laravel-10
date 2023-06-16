<h1>Editar Dúvida {{$support->id}}</h1>
 <x-alert/>
<form action="{{route('supports.update', $support->id)}}" method="post">
    @method('PUT') <!--Método-->
    @include('admin.supports.partials.form') {{--caminho todo a partir do diretorio view--}}
</form>