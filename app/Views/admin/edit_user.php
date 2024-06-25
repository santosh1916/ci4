<!-- app/Views/admin/edit_user.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    
    <form action="<?= site_url('admin/editUser/' . $user->id) ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?= $user->username ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $user->email ?>" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Update</button>
    </form>

    <a href="<?= site_url('admin/manageUsers') ?>">Cancel</a>
</body>
</html>
