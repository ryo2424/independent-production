<html lang="ja">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/css/edit.css" >
</head>
<body>
<div class="edit">
    <h1>商品編集</h1>
    <form action="{{url('update')}}/{{$items->id}}">

        <p>名前：<br>
        <input type="text" name="name" value="{{$items->name}}"></p>
        <p>カテゴリー：<br>
        <!-- <input type="text" name="type" value="{{$items->type}}"></p> -->
        <select id="type" class="form-control" name="type">
            <option value="Tシャツ">Tシャツ</option>
            <option value="ボトム">ボトム</option>
            <option value="帽子">帽子</option>
            <option value="シューズ">シューズ</option>
        </select>
        <p>値段：<br>
        <input type="number" name="price" value="{{$items->price}}"></p>

        <input type="submit" value="編集">
        
    </form>
    
</div>

</div>

</body>
</html>




