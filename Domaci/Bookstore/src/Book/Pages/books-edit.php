<?php
    require_once './autoload.php';

    $errors     = fetchErrors();
    $activeItem = isset($_GET['item']) ? books()->findById($_GET['item']) : null;
    
    $publishers  = publishers()->all();
    //$wordQuery  = empty($_GET['q']) ? null : $_GET['q'];
    //$searchResults = $wordQuery ? words()->search($wordQuery, null) : [];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Jquery -->
    <script src="./assets/js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

    <!-- Custom styles -->
    <link rel="stylesheet" href="./assets/css/app.css">

    <title>Books</title>
</head>
<body>
<!-- Header -->
<?php require_once './Partials/header.php'; ?>

<div class="container-fluid body-content p-0 m-0">

    <!-- Main content -->
    <div class="container p-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="bg-light p-4 rounded">
                    <h1 class="display-4">Books</h1>
                    <p class="lead">Book is represent with name, year of publication, publisher and ISBN number.</p>
                    <p>Define all aspects of a single book.</p>
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
                <form action="books-processors.php" method="POST" class="bg-light rounded p-4">

                    <!-- ID -->
                    <?php if ($activeItem) { ?>
                    <input type="hidden" value="<?php echo $activeItem->id; ?>" name="id" id="id">
                    <?php } ?>

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Name:</label>

                        <input type="text"
                               class="form-control"
                               id="name"
                               name="name"
                               value="<?php if ($activeItem) echo $activeItem->name ?>">
                    </div>

                    <!-- ISBN -->
                    <div class="form-group">
                        <label for="description">ISBN:</label>

                        <input type="text"
                               class="form-control"
                               id="isbn"
                               name="isbn"
                               value="<?php if ($activeItem) echo $activeItem->isbn ?>">
                    </div>

                     <!-- Year od publication -->
                     <div class="form-group">
                        <label for="description">Year od publication:</label>

                        <input type="text"
                               class="form-control"
                               id="year_of_publication"
                               name="year_of_publication"
                               value="<?php if ($activeItem) echo $activeItem->yearOfPublication ?>">
                    </div>

                   <!-- Publisher -->
                    <div class="form-group">
                        <label for="publisher">Publisher:</label>

                        <select class="custom-select" name="publisher_id" id="publisher">
                            <?php foreach ($publishers as $publisher) { ?>
                                <option value="<?php echo $publisher->id ?>" <?php if ($activeItem && $activeItem->publisherId == $publisher->id) echo 'selected' ?>>
                                    <?php echo $publisher->name ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary mb-2">
                        <?php if ($activeItem) echo 'Update'; else echo 'Create'; ?>
                    </button>
                </form>
            </div>
        </div>

        
    </div>
</div>
</body>
</html>
