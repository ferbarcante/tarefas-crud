<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <link rel="stylesheet" type="text/css" href="/css/exibir.css" />
</head>
<body>
    <div class="container">
        <h1>Lista de Tarefas</h1>

        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Responsável</th>
                    <th>Categoria</th>
                    <th>Início</th>
                    <th>Pausa</th>
                    <th>Retomada</th>
                    <th>Finalização</th>
                    <th>Tempo Gasto</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tarefasComTempo as $tarefa)
                <tr>
                    <td>{{ $tarefa->titulo }}</td>
                    <td>{{ $tarefa->responsavel->nome }}</td>
                    <td>{{ $tarefa->categoria->nome }}</td>
                    <td>{{ $tarefa->inicio ? $tarefa->inicio->format('Y-m-d H:i:s') : 'N/A' }}</td>
                    <td>{{ $tarefa->pausa ? $tarefa->pausa->format('Y-m-d H:i:s') : 'N/A' }}</td>
                    <td>{{ $tarefa->retomada ? $tarefa->retomada->format('Y-m-d H:i:s') : 'N/A' }}</td>
                    <td>{{ $tarefa->termino ? $tarefa->termino->format('Y-m-d H:i:s') : 'N/A' }}</td>
                    <td>{{ $tarefa->tempo_gasto }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
