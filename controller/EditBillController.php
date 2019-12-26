<?php
     include_once('C:\xampp\htdocs\admin_balo\model\BillModel.php');
     include_once('C:\xampp\htdocs\admin_balo\controller\EditBillController.php');
    include_once('C:\xampp\htdocs\admin_balo\helper\mail.php');
     class EditBillController{
         function updateBill($idOrder,$name,$idEmploy,$idShiper,$idCus){
             $model=new BillModel;
             $result=$model->getEmailCus($idCus);
             $array = get_object_vars($result);
             $email=$array["email"];
             $nameCus=$array["name"];
             $subject = "Trạng Thái đơn hàng DH".$idOrder;
                 $content = "
                                Chào bạn $nameCus,<br/>
                                Cảm ơn bạn đã đặt hàng tại website của chúng tôi.<br/>
                                Đơn Hàng của bạn đang được đóng gói và vận chuyển.<br/>
                                Vui lòng thường xuyên cập nhật để biết trạng thái đơn hàng <br/>                              
                                Thanks and Best Regard.
                            ";
                $check=maill($name,$email,$subject,$content);
                    if($check){
                                 $status=1;
                                 $rs=$model->updateOrder($idOrder,$idEmploy,$idShiper);
                                    if(!$rs){
                                            echo"Cập Nhật Thất Bại";
                                    }
                    }else{
                            echo "Gửi Email Thất Bại";
                        }
                echo "ok";

            
                
            
         }

         function updateBillFininsh($idOrder,$name,$idCus){
            $model=new BillModel;
            $result=$model->getEmailCus($idCus);
            $array = get_object_vars($result);
            $email=$array["email"];
            $nameCus=$array["name"];
           
            $subject = "Trạng Thái đơn hàng DH".$idOrder;
            $content = "
                        Chào bạn $nameCus,<br/>
                        Đơn Hàng của bạn đã được hoàn tất.<br/>
                        Cảm ơn bạn đã đặt hàng tại website của chúng tôi.<br/>                            
                        Thanks and Best Regard.
                        ";
            $check1=maill($name,$email,$subject,$content);
               if($check1){
                   
                    $rs1=$model->updateFinishOrder($idOrder);
                                if(!$rs1){
                                    echo"Cập Nhật Thất Bại";
                                }
                    }else{
                    echo "Gửi Email Thất Bại";
                }
                echo "ok";
         }

         function updateBillCancel($idOrder,$name,$idCus){
            $model=new BillModel;
            $result=$model->getEmailCus($idCus);
            $array = get_object_vars($result);
            $email=$array["email"];
            $nameCus=$array["name"];
            $productOrder=$model->getOrderDetail($idOrder); 
            foreach($productOrder as $p){
                $qualityOut=$p->quanlity_out;
                $idProduct=$p->id_product;
                $product=$model->getProduct($idProduct);
                $quantityExist=$product->quanlity_exist+$qualityOut;
                $model->updateQuantiProduct($quantityExist,$idProduct);
            }
            $subject = "Trạng Thái đơn hàng DH".$idOrder;
            $content = "
                        Chào bạn $nameCus,<br/>
                        Đơn Hàng của bạn đã được hủy.<br/>           
                        Thanks and Best Regard.
                        ";
            $check1=maill($name,$email,$subject,$content);
               if($check1){
                    $rs1=$model->updateCancelOrder($idOrder);
                                if(!$rs1){
                                    echo"Cập Nhật Thất Bại";
                                }
                    }else{
                    echo "Gửi Email Thất Bại";
                }
                echo "ok";
         }
     }
?>