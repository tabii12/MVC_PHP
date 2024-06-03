<?php 
    $data = $data['user'];
    
    if(isset($_POST['submit'])){
        $lname = $_POST['name'];
        $lpassword = $_POST['password'];

        $flag = 0;
        $count = -1;

        for($i=0; $i<count($data); $i++){
            if(empty($lname)){
                echo 'Chưa nhậ  p tên!<br>';
                $flag = 1;
                break;
            }else{
                if($data[$i]['name'] == $lname){
                    $count = $i;
                    break;
                }
            }
        }

        if($count == -1){
            echo 'Tài khoảng không tồn tại!<br>';
            $flag = 1;
        }

        if($flag == 0){
            if ($data[$count]['password'] == $lpassword){
                if($data[$count]['role'] == 0){
                    header('location: ../admin/index.php');
                } else {
                    header('location: index.php');
                }
            } else {
                echo 'Sai mật khẩu!';
            }
        }

    }
    
?>

<div class="main-wrapper">
    <div class="new-arrivals">
        <div class="new-arrivals__title">
            <p>Log in</p>
        </div>
        <div class="new-arrivals__form">
            <form action="index.php?page=login" method="post">
                <input type="text" name="name"  placeholder="Name"><br>
                <input type="password" name="password" placeholder="Password"><br>
                <input type="submit" name="submit">
            </form>
        </div>
    </div>
</div>