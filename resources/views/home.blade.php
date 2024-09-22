<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/home.css" />

    <title>Página Inicial</title>
</head>
<body>
    <h1>Sistema de Gerenciamento de Tarefas</h1>
    <nav>
        <ul>
            <li><a href="{{ route('responsavel.create') }}">Criar Responsável</a></li>
            <li><a href="{{ route('categorias.create') }}">Criar Categoria</a></li>
            <li><a href="{{ route('tarefa.create') }}">Criar Tarefa</a></li>
            <li><a href="{{ route('tarefa.index') }}">Gerenciar Tarefas</a></li>
            <li><a href="{{ route('tarefa.exibir') }}">Ver Detalhes das Tarefas</a></li>
        </ul>
    </nav>
</body>
</html>
