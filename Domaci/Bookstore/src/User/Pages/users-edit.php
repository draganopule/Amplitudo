<?php
    require_once '../../autoload.php';

    $errors     = fetchErrors();
    $activeItem = isset($_GET['item']) ? users()->findById($_GET['item']) : null;
    
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

    <title>Users</title>
</head>
<body>

<div class="container-fluid body-content p-0 m-0">

    <!-- Main content -->
    <div class="container p-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="bg-light p-4 rounded">
                    <h1 class="display-4">Users</h1>
                    <p class="lead">User is represent with username, email, and birth year</p>
                    <p>User is a person who can rent books and  write reviews</p>
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
                <form action="users-processors.php" method="POST" class="bg-light rounded p-4">

                    <!-- ID -->
                    <?php if ($activeItem) { ?>
                    <input type="hidden" value="<?php echo $activeItem->id; ?>" name="id" id="id">
                    <?php } ?>

                    <!-- Username -->
                    <div class="form-group">
                        <label for="username">Username:</label>

                        <input type="text"
                               class="form-control"
                               id="username"
                               name="username"
                               value="<?php if ($activeItem) echo $activeItem->username ?>">
                    </div>

                    <!-- Email address -->
                    <div class="form-group">
                        <label for="email">Email address:</label>

                        <input type="text"
                               class="form-control"
                               id="email"
                               name="email"
                               value="<?php if ($activeItem) echo $activeItem->email ?>">
                    </div>

                    <!-- Birth Year -->
                    <div class="form-group">
                        <label for="birth_year">Birth Year:</label>

                        <select class="custom-select" name="birth_year" id="birth_year">
                            <?php for ($g = 2020; $g > 1900; $g--) {
                                echo "<option value=$g>$g</option>";
                             } ?>
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
