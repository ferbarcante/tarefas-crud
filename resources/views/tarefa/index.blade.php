<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/index.css" />

    <title>Document</title>
</head>
<body>
<table>
    <thead>
        <tr>
            <th>Título</th>
            <th>Responsável</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tarefas as $tarefa)
            <tr>
                <td>{{ $tarefa->titulo }}</td>
                <td>{{ $tarefa->responsavel->nome }}</td>
                <td>{{ $tarefa->categoria->nome }}</td>
                <td>
                    <form action="{{ route('tarefa.iniciar', $tarefa->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit">Iniciar</button>
                    </form>
                    <form action="{{ route('tarefa.pausar', $tarefa->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit">Pausar</button>
                    </form>
                    <form action="{{ route('tarefa.finalizar', $tarefa->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit">Finalizar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>