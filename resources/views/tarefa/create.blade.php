<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/create.css" />

    <title>Document</title>
</head>
<body>
<h1>Crie uma nova tarefa</h1>
<div class="container">
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('tarefa.store')}}">
        @csrf
        @method('post')
        <div>
            <label>Título:</label>
            <input type="text" name="titulo" placeholder="Nome da tarefa" required />
        </div>

        <div>
            <label>Responsável:</label>
            <select name="id_responsavel" required>
                <option value="">Selecione um responsável</option>
                @foreach($responsaveis as $responsavel)
                    <option value="{{ $responsavel->id }}">{{ $responsavel->nome }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Categoria:</label>
            <select name="id_categoria" required>
                <option value="">Selecione uma categoria</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <input type="submit" value="Salvar" />
        </div>

    </form>
</div>
</body>
</html>