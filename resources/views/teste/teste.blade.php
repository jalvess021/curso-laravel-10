<h1>Editar Dúvidaedfr {{$support->id}}</h1>
 <x-alert/>
<form action="{{route('teste.update', $support->id)}}" method="post">
    @method('PUT') <!--Método-->
    @include('admin.supports.partials.form') {{--caminho todo a partir do diretorio view--}}
</form>