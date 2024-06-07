
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Sửa sản phẩm</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <form action="index.php?page=edit" method="post" enctype="multipart/form-data">
                                    <label for="">Danh mục sản phẩm</label>
                                    <select name="id_list" id="cate" class="form-control">
                                        <?php
                                            $category = $data['category'];
                                            $product = $data['product']['id_list'];
                                         
                                            foreach($category as $item){
                                                extract($item);
                                                if($id == $product){
                                                    echo '<option value="'.$id.'">'.$name.'</option>';
                                                }
                                                
                                            }
                                            foreach($category as $item){
                                                extract($item);
                                                if($id != $product){
                                                    echo '<option value="'.$id.'">'.$name.'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                        
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" name="name" value="<?php echo $data['product']['name'] ?>" id="name" class="form-control"> 

                                    <label for="">Giá sản phẩm</label>
                                    <input type="number" name="price" value="<?php echo $data['product']['price'] ?>"  id="price" class="form-control">

                                    <label for="">Hình ảnh</label>
                                    <p><?php echo $data['product']['image'] ?></p>
                                    <img src="../public/img/product_<?php echo $data['product']['image']?>" alt="" style="width: 200px;">
                                    <input type="file" name="image" id="image" class="form-control">
                                    

                                    <input type="hidden" name="idpro" value="<?php echo $data['product']['id'] ?>">
                                    <input type="hidden" name="image_old" value="<?php echo $data['product']['image']?>">

                                    <input type="submit" name="submit" value="Sửa sản phẩm" onclick="" >
                                </form>

                            </div>
                            
                        </div>
                    </div>

        <footer class="footer">
            <div class="container-fluid">
                
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com"></a>
                </p>
            </div>
        </footer>


    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="/javascripts/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="/javascripts/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="/javascripts/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="/javascripts/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="/javascripts/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="/javascripts/demo.js"></script>
    <script src="./index.js"></script>

</html>
