<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MVC - Edit</title>
    <link rel="stylesheet" href="default.css">
</head>
<body>
<H1>Edit</H1>

<form action="/save?id=<?= $data['id'] ?>" method="post">
    <table>
        <tr>
            <td>ID</td>
            <td><label>
                    <input type="text" required readonly name="id" value="<?= $data['id'] ?>"
                           placeholder="<?= $data['id'] ?>">
                </label>
            </td>
        </tr>
        <tr>
            <td>Name</td>
            <td><label>
                    <input type="text" required name="name" value="<?= $data['name'] ?>"
                           placeholder="<?= $data['name'] ?>">
                </label>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <label for="email">
                    <input type="text" required name="email" value="<?= $data['description'] ?>"
                           placeholder="<?= $data['description'] ?>">
                </label>
            </td>
        </tr>
        <tr>
            <td>Price</td>
            <td>
                <label>
                    <input type="text" required name="price" value="<?= $data['price'] ?>"
                           placeholder="<?= $data['price'] ?>">
                </label>
            </td>
        </tr>
    </table>

    <button type="submit">Save</button>
</form>
</body>
</html>