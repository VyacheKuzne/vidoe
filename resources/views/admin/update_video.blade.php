<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user_update</title>
</head>
<body>
    <h1>Изменение</h1>
    block - блокирование, видео не отоброжаеться
    none -  видео  отоброжаеться
    <form action="{{route('admin.login_date_update_submit_video', $data -> id)}}" method = 'Post'>
        @csrf
        <input type="text" name ='status' id = 'status' placeholder = 'status' value = "{{$data -> status}}">

        <button type="submit">Сохранить изменения</button>
    </form>
</body>
</html>