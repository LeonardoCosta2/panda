<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.10/css/froala_style.min.css' rel='stylesheet' type='text/css'>
    <title>teste</title>
</head>
<body>
    
<div class='container'>
    <div class="fr-view">
        @foreach($posts as $post)
            <h1 class="h1">{{$post->title}}</h1>
            {!! $post->description !!}<br>
        @endforeach
    </div>
</div>
</body>
</html>

