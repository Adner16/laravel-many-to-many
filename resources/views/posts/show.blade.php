
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dettaglio Post</title>
</head>
<body>
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
        <hr>
        <a href="{{route('admin.posts.index')}}">Torna indietro</a>
        <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
            @csrf 
            @method('DELETE')
            <button type="submit">Cancella</button>
        </form>
    </body>
</html>