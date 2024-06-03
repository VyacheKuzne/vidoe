<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление нового ролика</title>
</head>
<body>

    <form action="{{ route('log_in.create_restoran') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="tittle">Заголовок:</label>
        <input type="text" id="tittle" name="tittle">
        
        <label for="description">Описание:</label>
        <input type="text" id="description" name="description"> 
        
        <label for="category">Категория:</label>
        <input type="text" id="category" name="category">    
        
        <label for="file_video">Видеофайл:</label>
        <input type="file" id="file_video" name="file_video">
        
        <label for="file_poster">Постер (первый кадр видео):</label>
        <input type="file" id="file_poster" name="file_poster">
        
        @isset($path)
            <img src="{{ asset('storage/img/' . $path) }}" alt="Постер">
        @endisset

        <button type="submit">Добавить новый ролик</button>  
    </form>
</body>
</html>