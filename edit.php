<?php
    include "include/autoload.php";

    //Get user id
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        //Creating an instance of a class
        $loaddata = new UserView();
        //Display user data
        $loaddata->viewUserId($id);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
</head>
<body>
<div class="container">
    <div class="header p-3 pb-5 text-center">
        <h2>Edit User</h2>
    </div>
    <div class="row">
        <div class="col">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Enter desired username" class="form-control" require value="<?php echo $loaddata->username; ?>">
                    <input type="hidden" value="<?php echo $id; ?>" name="id">
                </div>
                <div class="alert" style="display: none">

                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="first">First Name:</label>
                            <input type="text" id="first" name="first" class="form-control" require placeholder="Enter user first name" value="<?php echo $loaddata->firstname; ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="last">Last</label>
                            <input type="text" id="last" name="last" placeholder="Enter user last name" class="form-control" require value="<?php echo $loaddata->lastname; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Update" class="form-control btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    <a href="index.php" class="btn btn-primary">Back</a>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="js/edit_user.js"></script>
</body>
</html>
