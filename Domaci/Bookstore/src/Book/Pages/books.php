<?php
require_once '../../autoload.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $items = books()->all();
}
else{
    if (!isset($_POST['name'])) {
        $errors['name'] = 'Name is required';
    } else {
        $name = $_POST['name'];
        $items = books()->booksSearch($name);
    }
}

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

    <title>Books</title>
</head>
<body>
<!-- Header -->
<?php require_once '../../Partials/header.php'; ?>

<div class="container-fluid body-content p-0 m-0">
    <!-- Navigation -->
    <?php require_once '../../Partials/header.php'; ?>

    <!-- Main content -->
    <div class="p-4">
        <div class="text-right">
            <a class="btn btn-outline-primary btn-sm mb-4" role="button" href="books-edit.php">Add new</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>ISBN</th>
                    <th>Name</th>
                    <th>Year of publication</th>
                    <th>Publisher</th>
                    <th class="text-center">Reviews</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($items as $item) { ?>
                    <tr>
                        <td><?php echo $item->id; ?></td>
                        <td><?php echo $item->isbn; ?></td>
                        <td><?php echo $item->name; ?></td>
                        <td><?php echo $item->yearOfPublication; ?></td>
                        <td><?php echo $item->publisher()->name ?></td>
                        <td class="text-center">
                            <a href="../../Review/Pages/reviews-from-book.php?item=<?php echo $item->id ?>" method="GET" class="text-info mr-2">View</a>
                            <a href="../../Review/Pages/reviews-add.php?item=<?php echo $item->id ?>" method="GET" class="text-info mr-2">Write</a>
                        </td>
                        <td class="text-center">
                            <a href="books-edit.php?item=<?php echo $item->id ?>" class="text-info mr-2">Edit</a>
                            <a href="books-delete.php?item=<?php echo $item->id ?>" class="text-danger mr-2">Delete</a>
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
