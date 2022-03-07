<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>個人情報登録アプリ</title>
    <style>
    body {font-size: 20px; color: #999;}
    h1 {font-size: 50px; text-align: center; color: #999; margin: 0 30px;}
    th {background-color: #999; color: #fff; padding: 5px 10px;}
    td {border: solid 1px #aaa; color: #999; padding: 5px 10px;}
    table {margin: 30px auto;}
    .btn {text-align: center;}
    </style>
</head>
<body>
    <h1>登録データ一覧</h1>
    <table>
        <tr><th>#</th><th>姓</th><th>名</th><th>メールアドレス</th></tr>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->id); ?></td>
                <td><?php echo e($item->lastName); ?></td>
                <td><?php echo e($item->firstName); ?></td>
                <td><?php echo e($item->mail); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <div class="btn">
        <button onclick="location.href='/register'">入力へ</button>
        <button onclick="location.href='/register/people/download'">CSVダウンロード</button>
    </div>
</body>
</html>


<?php /**PATH C:\xampp\htdocs\registerapp\resources\views/register/people.blade.php ENDPATH**/ ?>