<?php

$sql="SELECT id, sur_name, gender,birthday, current_city, interested_in, image FROM tb_user_info WHERE id IN (select friends_id from tb_frends_list where user_id=$activeId)";

$getData = $connect->prepare($sql);
$getData->execute();
$dataList=$getData->fetchAll(PDO::FETCH_OBJ);

?>

<div class="row">
<?php foreach($dataList as $data):?>
    <div class="card bg-dark text-white m-2" style="width: 18rem;">
        <img class="card-img" src="./image/COVER.png" alt="Card image">
        <div class="card-img-overlay">
            <h5 class="card-title"><a href="/frnd-profile?id=1" class="text-light"><?php echo $data->sur_name ?></a></h5>
            <img src="./image/avatar.png" class="rounded-circle mx-auto d-block mx-3" id="head-pro-img" alt="...">
            <h6 class="m-1"><?php echo $data->birthday ?></h6>
            <h6 class="m-1"><?php echo $data->current_city ?></h6>
            <h6 class="m-1"><?php echo $data->interested_in ?></h6>
        </div>
    </div>
<?php endforeach; ?>
</div>