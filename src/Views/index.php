<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MVC - Index</title>
    <link rel="stylesheet" href="default.css">
</head>
<body>
<h1>Here is a list of Products:</h1>

<table style="width:100%; border: 1px solid black">
    <tr>
        <th style=" border: 1px solid blue">ID</th>
        <th style=" border: 1px solid blue">Name</th>
        <th style=" border: 1px solid blue">Description</th>
        <th style=" border: 1px solid blue">Price</th>
        <th style=" border: 1px solid blue">Picture</th>
    </tr>
    <?php foreach ($data as $model) : ?>
        <tr>

            <td><a href="/edit?id=<?= $model['id'] ?>"><?= $model['id'] ?></a></td>
            <td><?= $model['name'] ?></td>
            <td><?= $model['description'] ?></td>
            <td><?= $model['price'] ?></td>
            <td><img src="/pictures/<?= $model['picture'] ?>" width="100px"></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>