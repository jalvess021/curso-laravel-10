{{-- <input type="hidden" value="{{csrf_token()}}" name="_token"> --}}
@csrf()
<input type="text" placeholder="Assunto" name='subject' value='{{ $support->subject ?? old('subject') }}'>
<textarea name="body" cols="30" rows="5" placeholder="Descrição">{{$support->body ?? old('body')}}</textarea>
{{--Imprime o valor para ediçao, caso nao haja (create) na hora que o formulario der erro permanecer o valor antigo--}} 
<button type="submit">Enviar</button>