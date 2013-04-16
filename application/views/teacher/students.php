<h1>My Students</h1>
<h2><a href="<?php echo site_url('student/add') ?>" >  <?php echo 'Add Student' ?></a></h2>
<?php foreach($students as $student): ?>
    <?php
        $viewSegments = array('student','view',$student['student_id']);
        $editSegments = array('student','edit',$student['student_id']);
        $removeSegments = array('student','remove',$student['student_id']);
    ?>
    <li>
        <a href="<?php echo site_url($viewSegments) ?>" >  <?php echo $student['student_first_name'] .' '. $student['student_middle_name'] .' '. $student['student_last_name'] ?></a>
        <a href="<?php echo site_url($editSegments) ?>" >  <?php echo 'edit' ?></a>
        <a href="<?php echo site_url($removeSegments) ?>" >  <?php echo 'remove' ?></a>
    </li>
<?php endforeach ?>
