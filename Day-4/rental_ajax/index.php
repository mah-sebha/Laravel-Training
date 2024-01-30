<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Books Rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .sidebar {
            background-color: #efefef;
            height: 100vh;
        }
        .nav-item {
            background-color: lightgray;
        }
        .nav-item:hover {
            background-color: lightskyblue;
        }
        
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-3 sidebar">
                <h3>Books Rental</h3>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active section" href="#" id="books-list">Books List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link section" href="#" id="my-rentals">My Rentals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Logout</a>
                </li>
            </ul>
            </div>
            <div class="col-9" id="content">
                <div id="loading" class="text-center mt-5">
                <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
                </div>
            
            </div>
       
    </div>

    <?php
    // Login Modal
    include __DIR__ . '/login.php';
    // Book entry
    include __DIR__ . '/book-entry.php';
    // Rental entry
    include __DIR__ . '/rental-entry.php';
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="api.js?v=<?php echo time(); ?>"></script>
    <script src="auth.js?v=<?php echo time(); ?>"></script>
    <script src="app.js?v=<?php echo time(); ?>"></script>
  </body>
</html>