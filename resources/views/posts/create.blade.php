
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Crea Post</title>
</head>
<body>
        <form action="{{route('admin.posts.store')}}" method='POST'>
            @csrf
            <label for="title">Title</label>
            <input id="title" type="text" name="title">
            @error('title')
            <div class="invalid-feedback">
            {{$message}}
            </div>
            @enderror
            <br>
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
            @error('content')
            <div class="invalid-feedback">
            {{$message}}
            </div>
            @enderror
            <br>
            <label for="image">Image</label>
            <input id="image" name="image" type="text">
            @error('image')
            <div class="invalid-feedback">
            {{$message}}
            </div>
            @enderror
            <br>
            <label for="category_id">Categoria</label>
            <select id="category_id" name="category_id">
                <option value="">nessuna categoria</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->label}}</option>
            @endforeach
            </select>
            @error('category_id')
            <div class="invalid-feedback">
            {{$message}}
            </div>
            @enderror
            <br>
            <label>Tags</label>
            @foreach ($tags as $tag)
            <input type="checkbox" name="tags[]" value="{{$tag->id}}" id="tag-{{$tag->id}}">
            <label for="tag-{{$tag->id}}">{{$tag->label}}</label>
            @endforeach
            <br>
            <button type="submit">Invia</button>

        </form>
        <a href="{{route('admin.posts.index')}}" class='btn'>Annulla</a>
</body>
</html>