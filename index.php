<?php
    include "include/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Rest API</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
</head>
<body>
<div class="container">
    <div class="header p-3 pb-5 text-center">
        <h2>Simple REST API</h2>
    </div>
    <div class="row mb-4">
        <div class="col-2">
            <a href="api/" class="btn btn-primary">View All REST API</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Enter desired username" class="form-control" require>
                </div>
                <div id="alert" class="alert" style="display: none">
                    
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="first">First Name:</label>
                            <input type="text" id="first" name="first" class="form-control" require placeholder="Enter user first name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="last">Last</label>
                            <input type="text" id="last" name="last" placeholder="Enter user last name" class="form-control" require>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Submit" class="form-control btn btn-primary">
                </div>
            </form>
        </div>
        <div class="col">
        <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
        <thead>
            <tr>
                <th>First</th>
                <th>Last</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr class="loader">
                <td><img src="loader/loader.gif" alt="" height="100" width="100"></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>First</th>
                <th>Last</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="js/userload.js"></script>
</body>
</html>