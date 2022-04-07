
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elenco Post</title>
</head>
<body>
    <a href="{{route('admin.posts.create')}}" class='btn'>Aggiungi</a>
    @foreach($posts as $post)
        <h2>{{$post->title}}</h2>
        <p>{{$post->content}}</p>
        <img src="{{$post->image}}" alt="">
        <br>
        @if($post->category)
        <span style="color:{{$post->category->color}}">{{$post->category->label}}</span>
        @endif

        @if($post->tags)
            @foreach($post->tags as $tag)
                <span style="backgound-color:{{$tag->color}}">{{$tag->label}}</span>
            @endforeach
        @endif
        <a href="{{route('admin.posts.show', $post->id)}}" class='btn'>mostra</a>
        <br>
        <a href="{{route('admin.posts.edit', $post->id)}}">Modifica</a>
        <hr>
        @endforeach
</body>
</html>