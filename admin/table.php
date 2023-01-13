<?php
    require_once('../Config.php');
    $data = $db->query("select * from donators")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
       
        <!-- <div id="main"> -->
         

            


                <!--  Inverse table start -->
                <section class="section">
                    <div class="row" id="table-inverse">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Donators</h4>
                                </div>
                                <div class="card-content">
                                 
                                    <!-- table with dark -->
                                    <div class="table-responsive">
                                        <table class="table table-dark mb-0">
                                            <thead>
                                                <tr>
                                                    <th>First name</th>
                                                    <th>Last name</th>
                                                    <th>email</th>
                                                    <th>amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data as $datum) {?>
                                                    <tr>
                                                        <td class="text-bold-500"><?= $datum["fname"] ?></td>
                                                        <td><?= $datum["lname"] ?></td>
                                                        <td class="text-bold-500"><?= $datum["email"] ?></td>
                                                        <td class="text-bold-500"><?= $datum["amount"] ?></td>
                                                        
                                                    </tr>
                                                <?php } ?>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                               
                        
                            </div>
                        </div>
                    </div>
                </section>
            
    
            </div>

        <!-- </div> -->
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>