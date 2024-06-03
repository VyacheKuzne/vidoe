<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="../img/Main page/four brouzer.png" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   
    <title>Главная</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link
      rel="preconnect"
      href="https://fonts.googleapis.com"
    />
    <link
      rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap"
      rel="stylesheet"
    />
    <link
      rel="preconnect"
      href="https://fonts.googleapis.com"
    />
    <link
      rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap"
      rel="stylesheet"
    />
  </head>
<body>
  <a href="{{route('log_in.create_video')}}">Загрузить свое видео</a>
            <div class="popularity-place_conteiner">
                <h1>Популярные видео</h1>
                <span>Мы собрали для вас наиболее популярные видео </span>
                <div class="popularity-place_card-of-tovar">
                <table>
                @foreach($restoran as $elem)
    <tr>
    @if($elem->status !== 'block')
        <td>
            <h3>{{ $elem->tittle }}</h3>
            {{$elem->created_at}}
         
                <video src="{{ asset('storage/video/' . $elem->file_video) }}" width="700px" height="400px" poster="{{ asset('storage/img/' . $elem->file_poster) }}"></video>
           
            <p>{{ $elem->description }}</p>
            <a href="{{route('video', $elem -> id)}}">смотреть видео</a>
        </td>
        @endif
    </tr>
@endforeach

    </table>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        tr {
            border: 1px solid black;
        }
    </style>
                </div>
</body> 
</html>