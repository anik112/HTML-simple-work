<?php
require './view/header.php';
?>

<div class="container">
<h3 class=" text-center">Messaging</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
          </div>
          <div class="inbox_chat">
          <?php

            $selectChats='';
            $fID=0;
            $fName='';
            if(isset($_POST["fndID"])){$fID=$_POST["fndID"];}
            if(isset($_POST["userID"])){$fID=$_POST["userID"];}
            if(isset($_POST["uName"])){$fName=$_POST["uName"];}
            $selectChat=$connect->prepare("SELECT * FROM `tb_chat_list` WHERE user_id=$activeId and friend_id=$fID;");
            $selectChat->execute();
            $selectChats=$selectChat->fetchAll(PDO::FETCH_OBJ);

          //  if(isset($_POST["submit"])){
             
          //  }

          if(isset($_POST["send"])){
            $msg=$_POST["msg"];
            $fID=$_POST["userID"];
            $currentDate=date("d/m/y h:i:sa");
            $insertChat=$connect->prepare("INSERT INTO `tb_chat_list`(`user_id`, `user_name`, `friend_id`, `friend_name`, `sending_text`, `timestamp`, `in_out`) 
                                            VALUES ($activeId,'$userName',$fID,'$fName','$msg','$currentDate',1);");
            $insertChat->execute();

            $insertChat2=$connect->prepare("INSERT INTO `tb_chat_list`(`user_id`, `user_name`, `friend_id`, `friend_name`, `sending_text`, `timestamp`, `in_out`) 
                                            VALUES ($fID,'$userName',$activeId,'$fName','$msg','$currentDate',0);");
            $insertChat2->execute();
          }

          $sqlFrinds="SELECT id, sur_name, image_url FROM tb_user_info WHERE id IN (select friends_id from tb_frends_list where user_id=$activeId)";
          $selectFrnd=$connect->prepare($sqlFrinds);
          $selectFrnd->execute();
          $publicFnds=$selectFrnd->fetchAll(PDO::FETCH_OBJ);

          foreach($publicFnds as $fnds):?>
            <div class="chat_list <?php if($fID==$fnds->id){echo 'active_chat';}?>" style="margin-bottom: 5px;">
              <div class="chat_people">
                <div class="chat_img"> <img id="chat_imgs" src="<?php echo $fnds->image_url;?>" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5><?php echo $fnds->sur_name;?> <span class="chat_date">Dec 25</span></h5>
                  <form method="POST" action="" enctype="multipart/form-data">
                      <div class="form-group">
                      <input type="hidden" name="fndID" value="<?php echo $fnds->id; ?>">
                      <input type="hidden" name="uName" value="<?php echo $fnds->sur_name; ?>">
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary" style="width: 200px">Tap to chat</button>
                  </form>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <!----------------------->
        <div class="mesgs">
          <div class="msg_history">
          <?php
          foreach($selectChats as $chat):
          ?>

          <?php if($chat->in_out==0): ?>
          <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="../image/avatar.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p><?php echo $chat->sending_text; ?></p>
                  <span class="time_date"> <?php echo $chat->timestamp; ?></span></div>
              </div>
            </div>
          <?php endif;?>
          <?php if($chat->in_out==1):?>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p><?php echo $chat->sending_text; ?></p>
                <span class="time_date"> <?php echo $chat->timestamp; ?></span> </div>
            </div>
          <?php endif;?>
          <?php endforeach; ?>
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
              <form method="POST" action="" enctype="multipart/form-data">
                <input type="text" name="msg" class="write_msg" placeholder="Type a message" />
                <input type="hidden" name="userID" value="<?php echo $fID; ?>">
                <input type="hidden" name="inOrOut" value="<?php echo 1; ?>">
                <button class="msg_send_btn" name="send" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php require './view/footer.php'; ?>