<?php

$sqlCourse="SELECT `course_id`, `course_name`, `credits` FROM `tb_coures_info`";
$getCourse=$connect->prepare($sqlCourse);
$getCourse->execute();
$getCourses=$getCourse->fetchAll(PDO::FETCH_OBJ);

?>


<div class="row">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Course ID</th>
        <th scope="col">Course Name</th>
        <th scope="col">Credits</th>
        <th scope="col">Mandatory?</th>
        <th scope="col">Taken?</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($getCourses as $course):?>
        <tr>
        <th scope="row"><?php echo $course->course_id;?></th>
        <td><?php echo $course->course_name;?></td>
        <td><?php echo $course->credits;?></td>
        <td>NO</td>
        <td><a href="">NO</a></td>
        </tr>
        <?php endforeach;?>
    </tbody>
    </table>
</div>