<?php
require_once '../../autoload.php';


$items = autors()->all();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Jquery -->
    <script src="../../assets/js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

    <!-- Custom styles -->
    <link rel="stylesheet" href="../../assets/css/app.css">

    <title>Autors</title>
</head>
<body>

<div class="container-fluid body-content p-0 m-0">

    <!-- Main content -->
    <div class="p-4">
        <div class="text-right">
            <a class="btn btn-outline-primary btn-sm mb-4" role="button" href="autors-edit.php">Add new</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($items as $item) { ?>
                    <tr>
                        <td><?php echo $item->id; ?></td>
                        <td><?php echo $item->name; ?></td>
                        <td class="text-center">
                            <a href="autors-edit.php?item=<?php echo $item->id ?>" class="text-info mr-2">Edit</a>
                            <a href="autors-delete.php?item=<?php echo $item->id ?>" class="text-danger mr-2">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
