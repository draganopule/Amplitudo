<?php

use Bookstore\User\Repositories\UserRepository;

require_once '../../autoload.php';

    $errors     = fetchErrors();
    $activeItem = isset($_GET['item']) ? books()->findById($_GET['item']) : null;
    $books = books()->all();
    $users = users()->all();
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
                    <h1 class="display-4">Review for book "<?php echo $activeItem->name; ?>"</h1>
                    <p class="lead">Review represents your opinion of the book.</p>
                    <p> A review gives the reader a concise summary of the content. 
                        This includes a description of the research topic and scope 
                        of analysis as well as an overview of the book's overall 
                        perspective, argument, and purpose...
                        Also you need to give a grade to a book</p>
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

        <!-- Main form -->
        <div class="row mt-4">
            <div class="col-sm-12">
                <form action="reviews-processors.php" method="POST" class="bg-light rounded p-4">

                    <!-- Book -->
                    <div class="form-group">
                        <label for="book">Book:</label>

                        <select class="custom-select" name="book_id" id="book">
                            <?php foreach ($books as $book) { ?>
                                <option value="<?php echo $book->id ?>" <?php if ($activeItem && $activeItem->id == $book->id) echo 'selected' ?>>
                                    <?php echo $book->name ?>
                                    </option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Review Text -->
                    <div class="form-group">
                        <label for="rev_text">Review Text:</label>

                        <textarea type="text"
                                  cols="5"
                                  rows="10"
                                  class="form-control"
                                  id="rev_text"
                                  name="rev_text"></textarea>
                    </div>

                    <!-- Grade -->
                    <div class="form-group">
                        <label for="grade">Grade:</label>

                        <select class="custom-select" name="grade" id="grade">
                            <?php for ($g = 5; $g > 0; $g--) {
                                echo "<option value=$g>$g</option>";
                             } ?>
                        </select>
                    </div>

                    <!-- Users -->
                    <div class="form-group">
                        <label for="user_id">Choose user:</label>

                        <select class="custom-select" name="user_id" id="user_id">
                            <?php foreach ($users as $user) {
                                echo "<option value=\"$user->id\">$user->username</option>";
                             } ?>
                        </select>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary mb-2">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
