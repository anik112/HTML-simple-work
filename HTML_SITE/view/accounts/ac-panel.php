<?php
require './view/header.php';
require './view/pofile/header-part.php';
$sql="SELECT id, sur_name, gender,birthday, current_city, interested_in, image FROM tb_user_info WHERE id IN (select friends_id from tb_frends_list where user_id=$activeId)";

$getData = $connect->prepare($sql);
$getData->execute();
$dataList=$getData->fetchAll(PDO::FETCH_OBJ);

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
<!-- Middel section of this screen -->
<div class="col-sm-10" id="mid-size">

<?php

if(isset($_POST["submit-ac"])){

    echo 'enter submit';

    if(isset($_POST['date']) && isset($_POST['head']) && isset($_POST['amount']) && isset($_POST['cardNo'])
    && isset($_POST['vat']) && isset($_POST['vatAmt']) && isset($_POST['totalAmount'])){

        $date=$_POST['date'];
        $head=$_POST['head'];
        $amount=(int) $_POST['amount'];
        $cardno=$_POST['cardNo'];
        $vat=(int) $_POST['vat'];
        $vatAmt=(int) $_POST['vatAmt'];
        $totalAmoumt=(int) $amount+$vat+$vatAmt;
        $semester=0;

        $getTakenSemesterNumber=$connect->prepare("SELECT runing_semester FROM `tb_user_info` WHERE student_id=$cardno");
        $getTakenSemesterNumber->execute();
        $getTakenSemester=$getTakenSemesterNumber->fetchAll(PDO::FETCH_OBJ);
        foreach($getTakenSemester as $c){
            $semester=$c->runing_semester;
        }

        $sqlInsertData="INSERT INTO `tb_dues`(`semester`, `student`, `adviser`, `date`, `head`, `amount`, `discount`, `dve_vat`, `vat_adjusted`, `payable`) 
                        VALUES ($semester,'$cardno','anik','$date','$head',$amount,$vatAmt,0,$vat,$totalAmoumt)";
        $inserData= $connect->prepare($sqlInsertData);
        $inserData->execute() or die('Data not insert line 151 in ac-panel');
    }


    if(isset($_POST['date1']) && isset($_POST['head1']) && isset($_POST['amount1']) && isset($_POST['cardNo1'])
    && isset($_POST['vat1']) && isset($_POST['vatAmt1']) && isset($_POST['totalAmount1'])){

        $date=$_POST['date1'];
        $head=$_POST['head1'];
        $amount=(int) $_POST['amount1'];
        $cardno=$_POST['cardNo1'];
        $vat=(int) $_POST['vat1'];
        $vatAmt=(int) $_POST['vatAmt1'];
        $totalAmoumt=(int) $amount+$vat+$vatAmt;
        $semester=0;


        $sqlInsertData="INSERT INTO `tb_dues`(`semester`, `student`, `adviser`, `date`, `head`, `amount`, `discount`, `dve_vat`, `vat_adjusted`, `payable`) 
                        VALUES ($semester,'$cardno','anik','$date','$head',$amount,$vatAmt,0,$vat,$totalAmoumt)";
        $inserData= $connect->prepare($sqlInsertData);
        $inserData->execute() or die('Data not insert line 151 in ac-panel');
    }

    if(isset($_POST['date2']) && isset($_POST['head2']) && isset($_POST['amount2']) && isset($_POST['cardNo2'])
    && isset($_POST['vat2']) && isset($_POST['vatAmt2']) && isset($_POST['totalAmount2'])){

        $date=$_POST['date2'];
        $head=$_POST['head2'];
        $amount=(int) $_POST['amount2'];
        $cardno=$_POST['cardNo2'];
        $vat=(int) $_POST['vat2'];
        $vatAmt=(int) $_POST['vatAmt2'];
        $totalAmoumt=(int) $amount+$vat+$vatAmt;
        $semester=0;


        $sqlInsertData="INSERT INTO `tb_dues`(`semester`, `student`, `adviser`, `date`, `head`, `amount`, `discount`, `dve_vat`, `vat_adjusted`, `payable`) 
                        VALUES ($semester,'$cardno','anik','$date','$head',$amount,$vatAmt,0,$vat,$totalAmoumt)";
        $inserData= $connect->prepare($sqlInsertData);
        $inserData->execute() or die('Data not insert line 151 in ac-panel');
    }
    

}

?>


<form class="border rounded border-primary p-4" method="POST" action="" enctype="multipart/form-data">

<div class="row mt-1">
<div class="col-sm-2" >
      <input type="text" class="form-control" id="date" placeholder="DD/MM/YYYY" name="date">
    </div>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="cardNo" placeholder="Write student id" name="cardNo">
    </div>
    <div class="col-sm-3" >
      <input type="text" class="form-control" id="head" placeholder="Write Head" name="head">
    </div>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="amount" placeholder="Amount" name="amount">
    </div>
    <div class="col-sm-1">
      <input type="text" class="form-control" id="vat" placeholder="VAT" name="vat">
    </div>
    <div class="col-sm-1">
      <input type="text" class="form-control" id="vatAmt" placeholder="Due Amount" name="vatAmt">
    </div>
    <div class="col-sm-1">
      <input type="text" class="form-control" id="totalAmount" placeholder="" name="totalAmount">
    </div>
  </div>

  <div class="row mt-1">
  <div class="col-sm-2" >
      <input type="text" class="form-control" id="date1" placeholder="DD/MM/YYYY" name="date1">
    </div>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="cardNo1" placeholder="Write student id" name="cardNo1">
    </div>
    <div class="col-sm-3" >
      <input type="text" class="form-control" id="head1" placeholder="Write Head" name="head1">
    </div>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="amount1" placeholder="Amount" name="amount1">
    </div>
    <div class="col-sm-1">
      <input type="text" class="form-control" id="vat1" placeholder="VAT" name="vat1">
    </div>
    <div class="col-sm-1">
      <input type="text" class="form-control" id="vatAmt1" placeholder="Due Amount" name="vatAmt1">
    </div>
    <div class="col-sm-1">
      <input type="text" class="form-control" id="totalAmount1" placeholder="" name="totalAmount1">
    </div>
  </div>

  <div class="row mt-1">
  <div class="col-sm-2" >
      <input type="text" class="form-control" id="date2" placeholder="DD/MM/YYYY" name="date2">
    </div>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="cardNo2" placeholder="Write student id" name="cardNo2">
    </div>
    <div class="col-sm-3" >
      <input type="text" class="form-control" id="head2" placeholder="Write Head" name="head2">
    </div>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="amount2" placeholder="Amount" name="amount2">
    </div>
    <div class="col-sm-1">
      <input type="text" class="form-control" id="vat2" placeholder="VAT" name="vat2">
    </div>
    <div class="col-sm-1">
      <input type="text" class="form-control" id="vatAmt2" placeholder="Due Amount" name="vatAmt2">
    </div>
    <div class="col-sm-1">
      <input type="text" class="form-control" id="totalAmount2" placeholder="" name="totalAmount2">
    </div>
  </div>

  <div class='row mt-5'>
  <div class='col'>
  <div class="form-group">
    <button type="submit" name="submit-ac" class="btn btn-primary" style="width: 200px">Save</button>
    </div>
  </div>
  </div>
</form>
</div>
</div>
<?php require './view/footer.php'; ?>