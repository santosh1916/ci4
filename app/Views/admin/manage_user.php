<!-- app/Views/admin/manage_users.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
</head>
<body>
    <h1>Manage Users</h1>
    
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->username ?></td>
                    <td><?= $user->email ?></td>
                    <td>
                        <a href="<?= site_url('admin/editUser/' . $user->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= site_url('admin/deleteUser/' . $user->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="<?= site_url('admin/createUser') ?>" class="btn btn-primary">Create User</a>
    <a href="<?= site_url('admin/dashboard') ?>" class="btn btn-secondary">Back to Dashboard</a>
    <a href="<?= site_url('admin/logout') ?>" class="btn btn-danger">Logout</a>
</body>
</html>
