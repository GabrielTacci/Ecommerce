@extends("layout")
@section("scriptjs")
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function(){
        //JQUERY --- ONLOAD --- Ao carregar a pagina
        $("#cpf").mask("000.000.000-00")
        $("#cep").mask("00000-00")

})
        </script>
@endsection
@section("conteudo")
    <div class="col-12">
        <h2 class="mb-3">Cadastrar Cliente</h2>
    </div>

    <form action="{{ route('cadastrar_cliente') }}" method="post">
        @csrf
        <div class="row">
        <div class="col-6">
        <div class="form-group">
            Nome: <input type="text" name="nome" class="form-control"/>
        </div>
        </div>

        <div class="col-6">
        <div class="form-group">
            E-mail: <input type="text" name="email" class="form-control"/>
        </div>
        </div>

        <div class="col-6">
        <div class="form-group">
            CPF: <input type="text" name="cpf" id="cpf" class="form-control"/>
        </div>
        </div>

        <div class="col-6">
        <div class="form-group">
            Senha: <input type="text" name="password" class="form-control"/>
        </div>
        </div>

        <div class="col-8">
        <div class="form-group">
            Endereço: <input type="text" name="endereco" class="form-control"/>
        </div>
        </div>

        <div class="col-1">
        <div class="form-group">
            Número: <input type="text" name="numero" class="form-control"/>
        </div>
        </div>

        <div class="col-3">
        <div class="form-group">
            Complemento: <input type="text" name="complemento" class="form-control"/>
        </div>
        </div>


        <div class="col-4">
        <div class="form-group">
            Cidade: <input type="text" name="cidade" class="form-control"/>
        </div>
        </div>

        <div class="col-4">
        <div class="form-group">
            Cep: <input type="text" name="cep" id="cep" class="form-control"/>
        </div>
        </div>

        <div class="col-4">
        <div class="form-group">
            Estado: <input type="text" name="estado" class="form-control"/>
        </div>
        </div>
        </div>
        <input type="submit" value="Cadastrar" class="btn btn-success btn-sm"/>
        
    </form>
@endsection