<?php
    require_once 'vendor/autoload.php';
    use Dompdf\Dompdf;


    $dompdf = new Dompdf();//select * from bill where idbill=45;select * from cart where idbill=45;

    //////connect DB
    $server="localhost";
    $user="root";
    $pass="";
    $db="db_shopbanxe";
    $conn=mysqli_connect($server,$user,$pass,$db);
    if(!$conn){
        die("Loi ".mysqli_connect_error());
        exit();
    }
    $idbill=$_GET['idbill'];
    
    $sql="select * from bill where idbill='$idbill'";
    $list=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($list);
    
    //$row2=mysqli_fetch_assoc($list2);
    
    
    
   
    
    $html='
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
<!--JQUERY-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<!--JQUERY-->
<!----css3---->
<link rel="stylesheet" href="../../css/custom.css">
<link rel="stylesheet" href="../../css/msg-custom.css">
<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">




<!--google material icon-->
<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" href="../../table.css">
<div class="container ">
    <div class="card-content table-responsive">
        
        <div class="row">
            <div class="col-sm-9"></div>
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="./" class="btn btn-primary btn-sm mb-2">Back</a>
                        <a href="./" class="btn btn-success btn-sm mb-2">Export Bill</a>
                    </div>
                </div>
                Date:'.$row['orderdate'].'
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-4">
                Email name:'.$row['email'].'  <br>
                Adress:'.$row['address'].' <br>
                Phone:'.$row['tel'].'
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                Order ID:#'.$idbill.'
            </div>
        </div>
        <div class="row m-0">
            <table class="table ">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Id Bill</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
       
                    <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
    ';

    $sql2="select * from cart where idbill='$idbill'";
    $list2=mysqli_query($conn,$sql2);
    $i=0;
    while($row2=mysqli_fetch_assoc($list2)){
        $i++;
        $html.= "
            <tr>
                <td>".$row2['idcart']."</td>
                <td>".$row2['idbill']."</td>
                <td>".$row2['namep']."</td>
                <td>".$row2['price']."</td>
                <td>".$row2['quantity']."</td>
                <td>".$row2['thanhtien']."</td>
            </tr>
        ";
    }
    $html.='
    </tbody>
            </table>
        </div>
        
    </div>
</div>
    
    ';
    

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'porttrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream('hoadon.pdf');

?>