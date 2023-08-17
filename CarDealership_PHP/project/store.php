
<?php
session_start();
$database_name="phplogin";
$con = mysqli_connect("localhost","root","",$database_name);

if (isset($_POST["add"])){
    if (isset($_SESSION["cart"])){
        $item_array_id = array_column($_SESSION["cart"],"product_id");
        if (!in_array($_GET["id"],$item_array_id)){
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="store.php"</script>';
        }else{
            echo '<script>alert("Product is already Added to Cart")</script>';
            echo '<script>window.location="store.php"</script>';
        }
    }else{
        $item_array = array(
            'product_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'product_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],
        );
        $_SESSION["cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])){
    if ($_GET["action"] == "delete"){
        foreach ($_SESSION["cart"] as $keys => $value){
            if ($value["product_id"] == $_GET["id"]){
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Product has been Removed...!")</script>';
                echo '<script>window.location="store.php"</script>';
            }
        }
    }
}

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="bwm1.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="undefined" crossorigin="anonymous"></script>
    <style>
      
                .product{
            border:1px solid #eaeaec;
                    margin: -1px 19px 3px -1px;
                    padding:10px;
                    text-align:center;
                    background-color: #efefef;
        }
        table, th, tr{
            text-align:center;
        }
        .title2{
            text-align:center;
            color: #66afe9;
            background-color: #efefef;
            padding:2%;

        }
        h2{
            text-align:center;
            color:#66afe9;
            background-color: #efefef;
            padding:2%;

        }
        table th{
            background-color: #efefef;

        }
        .navtop {
	background-color: black;
	height: 60px;
	width: 100%;
	border: 0;
}
.navtop div {
	display: flex;
	margin: 0 auto;
	width: 1000px;
	height: 100%;
}
.navtop div h1, .navtop div a {
	display: inline-flex;
	align-items: center;
}
.navtop div h1 {
	flex: 1;
	font-size: 24px;
	padding: 0;
	margin: 0;
	color: #eaebed;
	font-weight: normal;
}
.navtop div a {
	padding: 0 20px;
	text-decoration: none;
	color: #c1c4c8;
	font-weight: bold;
}
.navtop div a i {
	padding: 2px 8px 0 0;
}
.navtop div a:hover {
	color: #eaebed;
}
.pomocni{
    width:100%;
   height:50px;
    background: black;
    margin-top:15px;
}
.pomocni a{
padding: 0 20px;
    text-decoration:none;
    color:white;
transition:0.4s;
font-size:20px;
float:left;
margin-left:11cm;
}
.pomocni a:hover{
color: red;
transition:0.4s;
}

        </style>
</head>
<body>
<nav class="navtop">
			<div>
				<h1>Membership</h1>
                <a href="store.php">Store</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                
			</div>
		
		</nav>
        <div class="pomocni">
    <a href="store.php">Cars</a>
        <a href="tires.php">Tires</a>
    <a href="felne.php">Rams</a>
    </div>
    <div class="container" style="width:65%">
<h2>Cars</h2>
<?php
        $query = "SELECT * FROM product ORDER BY id ASC ";
        $result = mysqli_query($con,$query);
        if(mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) {

       ?>

       <div class="col-md-3">
           <form method="post" action="store.php?action=add&id=<?php echo $row["id"]; ?>">
        <div class="product">
                <img src="<?php echo $row["image"] ?>" class="img-responsive">
                <h5 class="text-info"><?php echo $row["pname"];?></h5>
                <h5 class="text-danger"><?php echo $row["price"];?></h5>
                <input type="text" name="quantity" class="form-control" value="1">
                <input type="hidden" name="hidden_name" value="<?php echo $row["pname"];?>">
                <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>">
                <input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">

        </div>
        
        
        
        </form>
       </div>
       <?php
            }
        }
       ?>
       <div style="clear:both">

       </div>
       <h3 class="title2">Your Orders</h3>
       <div class="table-responsive">
           <table class="table table-bordered">
           <tr>
               <th width="30%">Product name</th>
               <th width="10%">Quantity</th>
               <th width="13%">Price details</th>
               <th width="10%">Total price</th>
               <th width="17%">Remove Item</th>
           </tr>
           <?php
                    if(!empty($_SESSION["cart"])){
                        $total=0;
                        foreach($_SESSION["cart"] as $key => $value){
                             ?>
                             <tr>
                                 <td><?php echo $value["item_name"]; ?></td>
                                 <td><?php echo $value["item_quantity"]; ?></td>
                                <td>$ <?php echo $value["product_price"]; ?></td>
                                <td>$ <?php echo number_format($value["item_quantity"] * $value["product_price"],2); ?></td>
                                <td><a href="store.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span class="text-danger">Remove Item</span></a></td>
                            </tr>
                            <?php
                                $total = $total + ($value["item_quantity"] * $value["product_price"]);
                        }
                            ?>
                            <tr>
                                <td colspan="3" align="right">Total</td>
                                <th align="right"><?php echo number_format($total,2);?></th>
                                <td></td>
                                
                            </tr>
                            <?php

                        }
                            ?>
                            </table>
       </div>
</div>
</body>
</html>