<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <title>The Eating Club</title>
    <link rel="icon" sizes="500x500" href="logo.jpg">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
        integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="http://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>

<body>

    <nav class="navbar navbar-default ">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">AdminPanel</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.html">Dashboard</a></li>
                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Welcome, User</a></li>
                    <li><a href="post.html">Logout</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1><i class="fas fa-id-card"></i>
                        THE EATING CLUB <small>Dashboard</small>
                    </h1>
                </div>
            </div>
        </div>
    </header>
    <!-- section breadcrumb -->
    <section id="breadcrumb">
        <div class="container">
            <div class="breadcrumb">
                <li class="active">Dashboard</li>
            </div>
        </div>
    </section>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item active main-color-bg">
                            <i class="fas fa-cog"></i> &nbsp; Dashboard
                        </a>
                        <a href="swigy.html" class="list-group-item"> <i class="fas fa-list-alt"></i> &nbsp;Websites</a>
                        <a href="adprof.php" class="list-group-item"><i class="fas fa-pencil-alt"></i> &nbsp;Admin Profile</a>
                        <a href="user.php" class="list-group-item"><i class="fas fa-user"></i> &nbsp;Users</a>
                        <a href="table.php" class="list-group-item"><i class="fas fa-user"></i> &nbsp;Add Restaurant</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title">Views</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><i class="fas fa-user"></i>&nbsp;20</h2>
                                    <h4>Users</h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><i class="fas fa-list-alt"></i>&nbsp;12</h2>
                                    <h4>Pages</h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><i class="fas fa-chart-bar"></i>&nbsp;100</h2>
                                    <h4>Visitors</h4>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- second panel -->
                    <div class="panel panel-default ">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title">Latest Users</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Mobile Number</th>
                                    <th>Joined</th>
                                </tr>
                                <?php
                                include 'server.php';
                                // Fetch data from the users table
                                $sql = "SELECT username, name, mobnumber, DATE_FORMAT(NOW(), '%b %d,%Y') AS joined FROM users";
                                $result = $conn->query($sql);
                                
                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["mobnumber"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["joined"]) . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>No users found</td></tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </body>
                    </html>
                    
                    <?php
                    // Close the connection
                    $conn->close();
                    ?>
    </section>
<footer id="footer">
    <p>© 2017, theeatingclub.co.in. All Rights Reserved.</p>
</footer>
    <script>
        CKEDITOR.replace('editor1');
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


</body>

</html>