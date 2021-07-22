<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/css/geral.css" rel="stylesheet">

</head>
<body class="antialiased">
    <article>
        <h1>My first post</h1>
        <p>teste asdasdasd</p>
        <p>Slug: {{$article->slug}}</p>
    </article>
    <a href="/articles">Voltar aos artigos</a>
</body>
</html>