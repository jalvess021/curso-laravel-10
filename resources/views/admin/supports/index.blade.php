<h1>Listagem do suportes</h1>
<!--Passar o route (poderia passar a url /supports/create), mas perderia tudo o que eu fiz-->
<a href="{{route('supports.create')}}">Criar Dúvida</a>

{{-- o "{{}}" converte para entidade html, previnindo ataques de scripts entre outro q seria possivel com o echo --}}

<table>
     <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
     </thead>

    <tbody>
        @foreach ($supports as $support)
            <tr>
                <td>{{$support['subject']}}</td>
                <td>{{$support['status']}}</td>
                <td>{{$support['body']}}</td>
                <td>
                    <a href="{{route('supports.show', $support['id'])}}">Visualizar</a>
                </td>
                <td>
                    <a href="{{route('supports.edit', $support['id'])}}">Atualizar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    
</table>