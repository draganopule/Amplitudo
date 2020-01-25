<?php
//use Bookstore\Review\Repositories\ReviewRepository;
//use Bookstore\Library\DB\DBConnection;

require_once '../../autoload.php';

$errors = [];
$reviewRepository = reviews();
$bookRepository = books();
$autorRepository = autors();
$bookId = null;
$bookName = null;

if (!isset($_GET['item'])) {
    $errors['item'] = 'Book Id is required';
} else {
    $bookId = $_GET['item'];
    $bookName = $bookRepository->findById($bookId);
}

$avGrade = $reviewRepository->averageGradeOfBook($bookId);
$autor = $autorRepository->autorFromBook($bookId);
$reviews = $reviewRepository->reviewsFromBooks($bookId);

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

    <title>Reviews</title>
</head>
<body>

<div class="container-fluid body-content p-0 m-0">

    <!-- Main content -->
    <div class="container p-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="bg-light p-4 rounded">
                    <h1 class="display-4"><?php echo $bookName ?></h1>
                    <p class="lead"><?php echo $autor ?></p>
                    <p class="lead">Average grade: <?php echo $avGrade ?></p>
                </div>
            </div>
        </div>

        <!-- Errors -->
        <?php if (count($errors)) { ?>
            <div class="row">
                <div class="col-sm-12">
                    <?php foreach ($errors as $error => $message) { ?>
                        <div class="alert alert-danger mb-0 mt-4"><?php echo $message ?></div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        <!-- Reviews -->
        <div class="row mt-4">
        <?php foreach ($reviews as $review) {
            echo '<div class="col-sm-12">
                    Grade: ' . $review->grade .
                    '<div class="bg-light p-4 rounded">'
                     . $review .
                    '</div>
                    <br>
                </div>';
            }?>
        </div>
        
    </div>
</div>
</body>
</html>