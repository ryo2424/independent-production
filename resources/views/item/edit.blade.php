<html lang="ja">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/css/edit.css" >
</head>
<body>
<div class="edit">
    <h1>会員編集</h1>
    <form action="{{url('update')}}/{{$items->id}}">

        <p>名前：<br>
        <input type="text" name="name" value="{{$items->name}}"></p>
        <p>カテゴリー：<br>
        <input type="text" name="type" value="{{$items->type}}"></p>
        <p>値段：<br>
        <input type="number" name="price" value="{{$items->price}}"></p>

        <input type="submit" value="編集">
        <!-- <a href="{{url('delete')}}/{{$items->id}}">削除</a> -->
    </form>
    
</div>

</div>

</body>
</html>




