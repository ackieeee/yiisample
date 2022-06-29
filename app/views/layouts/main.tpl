<!DOCTYPE html>
<html lang="ja" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>title</title>
</head>
<body class="d-flex flex-column h-100">

<header class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <h2 class="" style="color: white;">Admin</h2>
</header>

<main role="main" class="flex-shrink-0" style="padding-top: 100px;">
    <div class="container">
        {$content}
    </div>
</main>

</body>
</html>
