<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>個人情報登録アプリ</title>
    <style>
    body {font-size: 16px; color: #999; }
    h1 {font-size: 50px; text-align: center; color: #999; margin: 0 30px;}
    .error {color: red;}
    </style>
</head>
<body>
    <h1>登録画面</h1>
    <p>フォームを入力してください。</p>
    <form method="post" action="/register">
        <table>
            <?php echo csrf_field(); ?>
            <tr>
                <th>お名前: </th>
                <td>姓: <input type="text" name="lastName" value="<?php echo e(old('lastName')); ?>"> ミドル: <input type="text" name="middleName" value="<?php echo e(old('middleName')); ?>"> 名: <input type="text" name="firstName" value="<?php echo e(old('firstName')); ?>"></td>
            </tr>
            <?php $__errorArgs = ['lastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <tr class="error">
                    <th></th>
                    <td><?php echo e($message); ?></td>
                </tr>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php $__errorArgs = ['firstName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <tr class="error">
                    <th></th>
                    <td><?php echo e($message); ?></td>
                </tr>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <tr>
                <th>メールアドレス: </th>
                <td><input type="text" name="mail" value="<?php echo e(old('mail')); ?>"></td>
            </tr>
            <?php $__errorArgs = ['mail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <tr class="error">
                    <th></th>
                    <td><?php echo e($message); ?></td>
                </tr>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <tr><th></th><td><input type="submit" value="登録"></td></tr>
        </table>
    </form>
</body>
</html>


<?php /**PATH C:\xampp\htdocs\開発環境\registerlaravelapp\resources\views/register/index.blade.php ENDPATH**/ ?>