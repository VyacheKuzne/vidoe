<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>video</title>
</head>
<body>
@if($restoran)
<a href="{{route('log_in.create_video')}}">Загрузить свое видео</a>

    <h3>{{ $restoran->tittle }}</h3>
    <video src="{{ asset('storage/video/' . $restoran->file_video) }}" width="700px" height="400px" controls></video>
    <p>{{ $restoran->description }}</p>
 
    
@else
    <p>ролик не найден.</p>
@endif

</body>
</html>
