<div class="row">
<?php foreach($posts as $data):?>
    <?php if($data->imsge != ""):?>
        <div class="card text-white m-2" style="width: 19rem; background-color: rgba(245, 245, 245, 0); border:0px;">
            <a target="_blank" href="<?php echo $data->imsge; ?>">
                <img src="<?php echo $data->imsge; ?>" alt="Forest" style="width:100%" class='thmb-img'>
            </a>
        </div>
    <?php endif; ?>
<?php endforeach; ?>
</div>
