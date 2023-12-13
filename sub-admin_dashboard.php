<?php
    session_start();
    if($_SESSION['login']==TRUE AND $_SESSION['status']=='Active'){
        include("db_con/dbCon.php");

        // Fetching laws from the database
        $laws_query = "SELECT * FROM laws";
        $laws_result = mysqli_query($con, $laws_query);
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags and other head elements -->
    </head>
    <body>
        <div class="container">
            <h1>Subadmin Dashboard</h1>
            <!-- Laws Section -->
            <div class="laws">
                <h2>Laws</h2>
                <?php while($law = mysqli_fetch_assoc($laws_result)) {
                    echo "<p>".$law['law_text']."</p>";
                } ?>
            </div>
            <!-- Other subadmin functionalities -->
        </div>
        <!-- Bootstrap JavaScript and other body elements -->
    </body>
</html>
<?php
    }
    else {
        header("Location: login.php"); // Redirect to login if not authenticated
    }
?>

