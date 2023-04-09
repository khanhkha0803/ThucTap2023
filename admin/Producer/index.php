<?php
  session_start();
  ob_start();
  include "../../model/pdo.php";
  include "../../model/producer.php";
  require_once "../Classes/PHPExcel.php";

  if(!isset($_SESSION['admin'])){
    header('location: ../login');
  }


  include "../header.php";
  include "../sidebar.php";

  if(isset($_GET['action'])){
    $action = $_GET['action'];
    switch ($action) {
      case 'listproducer':
        $listproducer = loadall_producer();
        include "list.php";
        break;
      case 'addproducer':
        if(isset($_POST['add'])&&($_POST['add'])){
          $tenloai = $_POST['namepc'];
          insert_producer($tenloai);
          $thongbao = "Thêm thành công";
        }
        include "add.php";
        break;
      case 'deletepc':
        $status = 0;
        if(isset($_GET['id'])&&($_GET['id']>0)){
          remove_producer($_GET['id'],$status);// hàm xóa mềm để dễ dàng backup giữ liệu
          // delete_producer($id);//hàm xóa cứng xóa thằng vào database
        }
        $listproducer = loadall_producer();
        include "list.php";
        break;
      case 'editpc':
        if(isset($_GET['id'])&&($_GET['id']>0)){
          $producer = loadone_producer($_GET['id']);
        }
        include "update.php";
        break;
      case 'updateproducer':
          if(isset($_POST['update'])&&($_POST['update'])){
              $namepc = $_POST['namepc'];
              $id = $_POST['id'];
              update_producer($id,$namepc);
              //$thongbao = "Cập nhật thành công";
          }
          $listproducer = loadall_producer();
          include "list.php";
          break;
      case 'logout':
        unset($_SESSION['admin']);
        header('location: ../login');
        break;
      default:
        include "../content.php";
        break;
    }
  }else{
    include "../content.php";
  }

  include "../footer.php";
  ob_end_flush();



?>