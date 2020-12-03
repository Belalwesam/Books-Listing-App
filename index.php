<?php
  //connecting to the DB
  $conn = mysqli_connect('localhost' , 'root' , 'frontend' , 'books');
  $query = "SELECT * from collection";
  $result = mysqli_query($conn , $query);
  $books = mysqli_fetch_all($result ,  MYSQLI_ASSOC);
  mysqli_free_result($result);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="./bootstrap/style.css" media="screen">
    <title>Books Listing App</title>
  </head>
  <body>
    <?php require 'header.php';?>
    <div class="container my-5  text-center">
        <h1 class="text-danger">Your Current Books Collection</h1>
        <div class="row my-5">
            <?php foreach($books as $book) : ?>
              <div class="col-12 col-md-3 my-3 my-md-0">
                <div class="book">
                  <div class="book-cover border">
                    <img src="images/<?php echo $book['image'] ?>" class="img-fluid" style="height: 250px;" >
                  </div>
                  <div class="book-info px-2 border">
                    <h5 class="my-3 text-danger"><?php echo $book['name'] ?></h5>
                    <a href="book.php?id=<?php echo $book['id'];?>" class="btn btn-danger btn-block mb-2">Detailes</a>
                  </div>
              </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
     <!--Bootstrap CDN-->
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <!--Bootstrap compiled javascript-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>