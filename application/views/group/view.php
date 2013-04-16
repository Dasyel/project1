<h1><?php echo $className ?></h1>
<h3><a href="<?php echo site_url('group/add_teacher') ?>" >  <?php echo 'Add Teacher' ?></a></h3>

<h2>Teachers</h2>
<?php if(empty($teachers)): ?>
No teachers in this class
<?php endif ?>
<?php foreach($teachers as $teacher): ?>
    <?php
        $removeSegments = array('group','remove_teacher',$teacher['teacher_id']);
    ?>
    <li>
        <?php echo $teacher['teacher_first_name'] .' '. $teacher['teacher_middle_name'] .' '. $teacher['teacher_last_name'] ?>
        <?php if($teacher['class_teacher_access_level'] >= 2): ?>
        <a href="<?php echo site_url($removeSegments) ?>" >  <?php echo 'remove' ?></a>
        <?php endif ?>
    </li>
<?php endforeach ?>
</br>

<h3><a href="<?php echo site_url('student/add') ?>" >  <?php echo 'Add Student' ?></a></h3>

<h2>Students</h2>
<?php if(empty($students)): ?>
No students in this class
<?php endif ?>
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

<h2><a href="<?php echo site_url('group/remove') ?>" >  <?php echo 'Remove Class' ?></a></h2>
