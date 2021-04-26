<?php
require './view/header.php';
?>

<div class="card m-5">
        <div class="card-header">Notification
        <a class="close" data-dismiss="alert" aria-label="Close" href="/deshboard"><span aria-hidden="true"><i class="material-icons">Close</i></span></a>
        </div>
        <div class="card-body">
            <?php
            $getNotification=$connect->prepare("SELECT `friend_id`, `post_id`, `friend_name`, `content` FROM `tb_notification_list` WHERE `user_id`=$activeId order by id desc;" );
            $getNotification->execute();
            $getNotifications=$getNotification->fetchAll(PDO::FETCH_OBJ);
            foreach($getNotifications as $c):
            ?>

            <div class="alert alert-info">
                <div class="container">
                    <div class="alert-icon">
                        <i class="material-icons"><b><?php echo $c->friend_name; ?></b></i>
                    </div>

                    <b>Dtls:</b> <?php echo $c->friend_name." ".$c->content; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php require './view/footer.php'; ?>