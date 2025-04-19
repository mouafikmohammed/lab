<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Business Management</title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/search.css">
   <link rel="stylesheet" href="css/bootstrap2.min.css">
   <link rel="icon" type="image/x-icon" href="img/logo.png" />
</head>

<body>
   <div id="background">
      <img src="img/backgroud.jpg" class="stretch" alt="" />
   </div>
   <div class="wrapper">
      <div class="sidebar">
         <!-- <a href="#"><img class="logo" src="img/logo.png"></a> -->
         <ul>
            <li class="active"><a  href="search.php"><img class="fas"src="icons/search.svg">Search</a></li>
            <li><a  href="index.php"><img class="fas"src="icons/dashboard.svg">DashBoard</a></li>
            <li><a href="contacts.php"><img class="fas"src="icons/contacts.svg">Contacts</a></li>
            <li><a  href="note.php"><img class="fas"src="icons/contacts.svg">Notes</a></li>
            <li><a href="purchase.php"><img class="fas"src="icons/buy.svg">Purchase</a></li>
            <li><a href="sells.php"><img class="fas"src="icons/sells.svg">Sells</a></li>
            <li><a href="sold.php"><img class="fas"src="icons/sells.svg">Sold</a></li>
            <li><a href="stock.php"><img class="fas"src="icons/stock.svg">Stock</a></li>
            <li><a href="expired.php"><img class="fas"src="icons/expired.svg">Expired Products</a></li>
            <li><a href="logout.php"><img class="fas"src="icons/logout.svg">Logout</a></li>
         </ul> 
      </div>
      <div class="main_content">
         <div class="header">Search</div>
         <!-- Search ----------------->
         <div class="search"> 
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="card mt-4">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-7">
                                 <form action="" method="GET">
                                    <div class="input-group mb-3">
                                       <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                       <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                        <div class="col-md-12">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <?php             
                                                if(isset($_GET['search']))
                                                {
                                                    $filtervalues = $_GET['search'];
                                                    $query = "SELECT * FROM contacts WHERE CONCAT(name,phone,email) LIKE '%$filtervalues%' ";
                                                    $query_run = mysqli_query($con, $query);

                                                    if(mysqli_num_rows($query_run) > 0)
                                                    {?>
                                                         <tr>
                                                            <th>name</th>
                                                            <th>phone</th>
                                                            <th>email</th>
                                                         </tr>
                                                    <?php
                                                      foreach($query_run as $items)
                                                      {
                                                         ?>

                                                         <tr>
                                                            <td><?= $items['name']; ?></td>
                                                            <td><?= $items['phone']; ?></td>
                                                            <td><?= $items['email']; ?></td>                                                   
                                                         </tr>
                                                         <?php
                                                      }
                                                    }
                                                    else{
                                                        ?>
                                                        <p>There is no (<?=$_GET['search'];?>) in <b>Contact</b></p>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                        <tbody>
                                            <?php             
                                                if(isset($_GET['search']))
                                                {
                                                    $filtervalues = $_GET['search'];
                                                    $query = "SELECT * FROM notes WHERE CONCAT(subject, note) LIKE '%$filtervalues%' ";
                                                    $query_run = mysqli_query($con, $query);

                                                    if(mysqli_num_rows($query_run) > 0)
                                                    {?>
                                                            <tr>
                                                               <th>Subject</th>
                                                               <th>Note</th>
                                                            </tr>
                                                    <?php
                                                        foreach($query_run as $items)
                                                        {
                                                            ?>
                                                            <tr>
                                                               <td><?= $items['subject']; ?></td>
                                                               <td><?= $items['note']; ?></td>                                                  
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                            <p>There is no (<?=$_GET['search'];?>) in <b>Note</b></p>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                        <tbody>
                                            <?php             
                                                if(isset($_GET['search']))
                                                { 
                                                    $filtervalues = $_GET['search'];
                                                    $query = "SELECT * FROM purchase WHERE CONCAT(reference, name, quantity, price, companyname, email) LIKE '%$filtervalues%' ";
                                                    $query_run = mysqli_query($con, $query);

                                                    if(mysqli_num_rows($query_run) > 0)
                                                    { ?>
                                                            <tr>
                                                               <th>reference</th>
                                                               <th>name</th>
                                                               <th>Qty</th>
                                                               <th>price</th>
                                                               <th>Company-name</th>
                                                            </tr>
                                                    <?php  

                                                        foreach($query_run as $items)
                                                        { 
                                                            ?>
                                                            <tr>
                                                               <td><?= $items['reference']; ?></td>
                                                               <td><?= $items['name']; ?></td>
                                                               <td><?= $items['quantity']; ?></td>
                                                               <td><?= $items['price']; ?></td>
                                                               <td><?= $items['companyname']; ?></td>                                                 
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                            <p>There is no (<?=$_GET['search'];?>) in <b>Purchase</b></p>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                        <tbody>
                                            <?php             
                                                if(isset($_GET['search']))
                                                {
                                                    $filtervalues = $_GET['search'];
                                                    $query = "SELECT * FROM sells WHERE CONCAT(reference, name, quantity, price, companyname, email) LIKE '%$filtervalues%' ";
                                                    $query_run = mysqli_query($con, $query);

                                                    if(mysqli_num_rows($query_run) > 0)
                                                    {?>
                                                            <tr>
                                                               <th>reference</th>
                                                               <th>name</th>
                                                               <th>Qty</th>
                                                               <th>price</th>
                                                               <th>comany-name</th>
                                                            </tr>
                                                    <?php
                                                        foreach($query_run as $items)
                                                        { 
                                                            ?>
                                                            <tr>
                                                               <td><?= $items['reference']; ?></td>
                                                               <td><?= $items['name']; ?></td>
                                                               <td><?= $items['quantity']; ?></td>
                                                               <td><?= $items['price']; ?></td>
                                                               <td><?= $items['companyname']; ?></td>                                                   
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                            <p>There is no (<?=$_GET['search'];?>) in <b>Sell</b></p>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
   </div>
</body>
</html>
