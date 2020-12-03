<?php
    //getting the id of the book
    $id= $_GET['id'];
    //connecting to the database
    $conn = mysqli_connect('localhost' , 'root' , 'frontend' , 'books');
    //making query to selecct the detailes of the specified book
    $query = "SELECT * FROM collection WHERE id = '$id';";
    $result = mysqli_query($conn , $query);
    $detailes = mysqli_fetch_assoc($result);
    //hearing the saving button 
    if (isset($_POST['submit'])) {
        $name = $_POST['bookName'];
        $description = $_POST['bookDesc'];
        $author = $_POST['authorName'];
        $image = $_FILES['image']['name'];

        //the update query
        $updateQuery = "UPDATE collection SET name = '$name' ,  description = '$description ', author = '$author';";
        mysqli_query($conn , $updateQuery);
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
    <link rel="stylesheet" href="style.css" media="screen">
    <title>Books Listing App</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container my-5 text-center">
       <div class="row">
           <div class="col-12 col-md-6 offset-md-3">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-4">
                        <label>Name of the book </label>
                        <input type="text" name="bookName" class="form-control" value="<?php echo $detailes['name']; ?>">
                    </div>
                    <div class="form-group mb-4">
                        <label>Description of the book </label>
                        <textarea name="bookDesc" id="" cols="25" rows="10" class="form-control"><?php echo $detailes['description']; ?></textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label>Author of the book </label>
                        <input type="text" name="authorName" class="form-control" value="<?php echo $detailes['author']; ?>">
                    </div>
                    <div class="form-group mb-4 text-left">
                        <label>Upload cover </label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <input type="submit" name="submit" class="btn btn-danger btn-lg" value="Save Changes">
                </form>
           </div>
       </div>
    </div>
    <!--Bootstrap CDN-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!--Bootstrap compiled javascript-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>