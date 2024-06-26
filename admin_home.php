<?php
    require_once './includes/header.php';
    LogInCheck();
    require_once './includes/admin_nav.php';
    flash();
?>
<!--begin caurosol-->
<div>
<div class="container">
    <div class="row">
        <?php if($_SESSION['role'] == 'admin'){?>
        <div class="col-md-4">
            <?php
            require_once 'db.php';
            $sql = "SELECT COUNT(`dept_id`) AS dept_available FROM `department` WHERE `dept_id` <> '1'";
            $result0 = $conn->query($sql);
            $row=$result0->fetch_assoc();
            $alert_dept = ($row>0)? "<div class=''><h3 CLASS='alert alert-success text-center'> Total Departments - ".$row['dept_available']."</h3></div>":"<div class=''><h3 CLASS='alert alert-danger'> NO DEPARTMENTS AVAILABLE </h3></div>";
            echo $alert_dept;
            ?>
        </div>
        <div class="col-md-4">
            <?php
            require_once 'db.php';
            $sql = "SELECT   COUNT(`supplier_id`) AS supplier_available FROM `supplier` WHERE 1";
            $result1 = $conn->query($sql);
            $row=$result1->fetch_assoc();
            $alert_supplier = ($row>0)? "<div class=''><h3 class='alert alert-success text-center'> Available Suppliers - ".$row['supplier_available']."</h3></div>":"<div class=''><h3 CLASS='alert alert-danger text-center'> NO SUPPLIER AVAILABLE </h3></div>";
            echo $alert_supplier;
            ?>
        </div>
        <div class="col-md-4">
            <?php
            require_once 'db.php';
            $sql = "SELECT COUNT(`item_id`) AS item_available FROM `item` WHERE `dept_id` = 1";
            $result0 = $conn->query($sql);
            $row=$result0->fetch_assoc();
            $alert_item = ($row>0)? "<div class=''><h3 CLASS='alert alert-success text-center'> Items In Stock - ".$row['item_available']."</h3></div>":"<div class=''><h3 CLASS='alert alert-danger'> NO ITEMS AVAILABLE </h3></div>";
            echo $alert_item;
            ?>
        </div>
        <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-3">
        </div> 
        <div class="col-md-3">
        </div> 
        <div class="col-md-3">
        </div>
        </div>
        <?php       
    }?>
    
    
    
    </div>
</div>

<?php require_once './includes/footer.php'; ?>