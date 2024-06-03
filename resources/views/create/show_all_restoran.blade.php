<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>all_restoran</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <a href="{{ route('admin.user_table') }}">БАЗА ПОЛЬЗОВАТЕЛЕЙ</a>

    <h1>видео</h1>
    <h2>Популярные видео</h2>
    <p>Мы собрали для вас наиболее популярные видео</p>
    
    <table>
 
        <tr>
                <td>id</td>
                <td>tittle</td>
                <td>description</td>
                <td>status</td>
                <td>category</td>
            </tr>
         
                @foreach($restoran  as $elem)
                    <tr>    
                        
                        <td>{{  $elem ->id  }}   </td> 
                        <td>{{  $elem ->tittle  }}   </td> 
                        <td>{{  $elem ->description  }}   </td> 
                        <td>{{  $elem ->status  }}   </td> 
                        <td>{{  $elem ->category  }}   </td> 
                        <td>
                        <a href="{{route('admin.login_date_update_video', $elem -> id)}}"><button>Изменить</button></a>
                        </td>
                    </tr>  
                    <tr>
           

                 @endforeach
               
          <style>
            td{
                border: 1px solid black;
                padding: 10px;
                margin: 0px;
                text-align: center
            }
            tr{
                border: 1px solid black;
                padding: 0px;
                margin: 0px;
            }


</body>
</html>