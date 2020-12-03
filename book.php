<?php
    //getting the id of the book in hte database
    $id = $_GET['id'];

    //connecting to the DB
    $conn = mysqli_connect('localhost' , 'root' , 'frontend' , 'books');

    //making query to selecct the detailes of the specified book
    $query = "SELECT * FROM collection WHERE id = '$id';";
    $result = mysqli_query($conn , $query);
    $detailes = mysqli_fetch_assoc($result);

    //deleting the book from the list 
    if (isset($_POST['delete'])) {
            $deleteQuery = "DELETE FROM collection WHERE id = '$id';";
            mysqli_query($conn , $deleteQuery);
            header('Location: index.php');
    }
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
    <?php include 'header.php'; ?>
    <div class="container my-5">
        <div class="row text-center">
        <div class="col-12 col-md-6">
                <div class="book-image">
                    <img src="./images/<?php echo $detailes['image'];?>" class="img-fluid">
                </div>
            </div>
            <div class="col-12 col-md-6  d-flex flex-column align-items-center justify-content-center">
                <div class="book-desc">
                    <h1 class="mb-4 text-danger"><?php echo $detailes['name']?></h1>
                    <h3 class="mb-3"><?php echo $detailes['author'];?></h3>
                    <p class="mb-4 lead"><?php echo $detailes['description'];?>
                    </p>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="hidden" name="id" value="">
                        <a href="editBook.php?id=<?php echo $id;?>" class="btn btn-success">Edit</a>
                        <input type="submit" name="delete" value="Delete from list" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--bootstrap CDN-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!--Bootstrap compiled javascript-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>