

<?php
require './view/header.php';
require './view/pofile/header-part.php';

$sqlCourse="SELECT `course_id`, `course_name`, `credits` FROM `tb_coures_info`";
$getCourse=$connect->prepare($sqlCourse);
$getCourse->execute();
$getCourses=$getCourse->fetchAll(PDO::FETCH_OBJ);


?>


<div class="row" id="frm-main">

    <!-- Left section of this screeen -->
    <div class="col-sm-2" id="left-side">
        <div class="card">
            <div class="card-header">About Me:</div>
            <div class='card-body'>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/account.png" alt="name" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$sur_name.' [ '.$nik_name.' ]'; $sur_name=null;?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/mail.png" alt="mail" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$email; $email=null;?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/phone-contact.png" alt="number" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$mobile; $mobile=null;?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/gender.png" alt="gender" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$gender; $gender=null;?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/birthday-reminder.png" alt="date Of birth" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$birthday; $birthday=null;?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/location.png" alt="current city" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$current_city; $current_city=null;?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/house.png" alt="home town" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$home_town; $home_town=null;?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/point-of-interest.png" alt="interest" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$interested_in; $interested_in=null;?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/language.png" alt="language" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$languages; $languages=null;?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/care.png" alt="relationship" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$relationship; $relationship=null;?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row'>
                            <div class=''><img src="../image/icon/street-name.png" alt="user name" srcset=""
                                    style="width: 20px; hight:20px;"></div>
                            <div class='col-sm-10 px-3'>
                                <?=$user_name; $user_name=null;?>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="col-sm-8" id="mid-size">

    <div class="card">
    <?php 
    $runingSemester=0;
    $studentId='';
    $getTakenUserDoc=$connect->prepare("SELECT `sur_name`, `nick_name`, `runing_semester`, `student_id` FROM `tb_user_info` WHERE id=$activeId");
    $getTakenUserDoc->execute();
    $getTakenUserDocument=$getTakenUserDoc->fetchAll(PDO::FETCH_OBJ);
    foreach($getTakenUserDocument as $c){
        $runingSemester=$c->runing_semester;
        $studentId=$c->student_id;
    }
    
    $totalPayable=0;
    $getDuesAmount=$connect->prepare("SELECT sum(payable) as payableAmt FROM `tb_dues` WHERE semester=$runingSemester and student=$studentId" );
                $getDuesAmount->execute();
                $getDuesAmounts=$getDuesAmount->fetchAll(PDO::FETCH_OBJ);
                foreach($getDuesAmounts as $c){
                    $totalPayable=$c->payableAmt;
                }

    $totalPayment=0;
    $getPayment=$connect->prepare("SELECT sum(`total_paid`) as paidAmt FROM `tb_billing` WHERE semester=$runingSemester and student=$studentId" );
                $getPayment->execute();
                $getPaymentAmounts=$getPayment->fetchAll(PDO::FETCH_OBJ);
                foreach($getPaymentAmounts as $c){
                    $totalPayment=$c->paidAmt;
                }

    ?>

        <div class="card-header" style="text-align: center;"><h4>Billing History</h4></div>
        <div class="card-body">
            <h5>Semester: <?php echo $runingSemester;?></h5>
            <h5>Student: <?php echo $userName;?> (<?php echo $studentId; ?>)</h5>
            <h5>Adviser: <?php echo 'Anik' ?></h5>
            <hr class="style2">
            <h5>Total Payable: <?php echo $totalPayable; ?></h5>
            <h5>Total Payment: <?php echo $totalPayment; ?></h5>
            <h5>Total Outstanding Bill: <?php echo ($totalPayable-$totalPayment);?></h5>
        </div>
    </div>

        <table class="table" style=' background-color: rgba(255, 255, 255,  0.5); '>
        <h2 class="mt-3">Total Outstanding Bill's</h2>
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Head</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Discount</th>
                    <th scope="col">VAT</th>
                    <th scope="col">Payable</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $getDues=$connect->prepare("SELECT `id`, `semester`, `student`, `adviser`, `date`, `head`, `amount`, `discount`, `dve_vat`, `vat_adjusted`, `payable` FROM `tb_dues` WHERE student=$studentId" );
                $getDues->execute();
                $getDuesArray=$getDues->fetchAll(PDO::FETCH_OBJ);
                foreach($getDuesArray as $c):
                ?>
                <tr>
                    <th scope="row">
                        <?php echo $c->date;?>
                    </th>
                    <td>
                        <?php echo $c->head;?>
                    </td>
                    <td>
                        <?php echo $c->amount;?>
                    </td>
                    <td>
                        <?php echo $c->discount;?>
                    </td>
                    <td>
                        <?php echo $c->vat_adjusted;?>
                    </td>
                    <td>
                        <?php echo $c->payable;?>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>


        <table class="table" style='background-color: rgba(255, 255, 255, 0.3);'>
            <h2 class="mt-3">Total Paid</h2>
            <thead>
                <tr>
                    <th scope="col">Paid Date</th>
                    <th scope="col">Head</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Discount</th>
                    <th scope="col">VAT</th>
                    <th scope="col">Payable</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $getPaidAmt=$connect->prepare("SELECT `id`, `semester`, `student`,`paidDate`, `adviser`, `total_outstanding`, `total_payable`, `total_paid`, `dues`, `payments`, `vat_amount`, `discount` FROM `tb_billing` WHERE student=$studentId" );
                $getPaidAmt->execute();
                $getPaidAmts=$getPaidAmt->fetchAll(PDO::FETCH_OBJ);
                
                foreach($getPaidAmts as $c):
                ?>
               <tr>
                    <th scope="row">
                        <?php echo $c->paidDate;?>
                    </th>
                    <td>
                        <?php echo $c->head;?>
                    </td>
                    <td>
                        <?php echo $c->total_paid;?>
                    </td>
                    <td>
                        <?php echo $c->discount;?>
                    </td>
                    <td>
                        <?php $vat_adjusted=0; echo $c->vat_adjusted;?>
                    </td>
                    <td>
                        <?php echo $c->total_paid;?>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>


<!-- Right section of this screeen -->
<div class="col-sm-2" id="right-side">
    <div class="card">
        <div class="card-header">Public Friends</div>
        <div class="card-body">
            <?php
                       $sqlFrinds="SELECT * FROM `tb_user_info`";
                       $selectFrnd=$connect->prepare($sqlFrinds);
                       $selectFrnd->execute();
                       $publicFnds=$selectFrnd->fetchAll(PDO::FETCH_OBJ);

                       foreach($publicFnds as $fnds):?>

            <div class="card m-2 bg-dark text-center text-white"
                style="width: 100%; background-color: rgba(245, 245, 245, 0.6);">
                <h5 class="card-title p-1"><a href="/frnd-profile?id=<?=$fnds->id;?>" class="text-light">
                        <?php echo $fnds->sur_name ?>
                    </a></h5>
                <div class='card-body' style="margin:2px; padding: 0px;">
                    <img src="./image/avatar.png" class="rounded-circle mx-auto d-block mx-3" id="small-head-pro-img"
                        alt="...">
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>


<?php require './view/footer.php'; ?>