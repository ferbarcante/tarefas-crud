<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Crie um responsavel</h1>
    <form method="post" action="{{route('responsavel.store')}}">
        @csrf
        @method('post')
        <div>
            <label>Nome:</label>
            <input type="nome" name="nome" placeholder="nome" />
        </div>
        <div>
            <input type="submit" value="Salvar" />
        </div>

    </form>
</body>
</html>