<h1>My Account</h1>
<h2><a href="<?php echo site_url('teacher/edit') ?>" >  <?php echo 'Edit Account Data' ?></a></h2>
<?php echo 'Name: '. $teacher->teacher_first_name .' '. $teacher->teacher_middle_name .' '. $teacher->teacher_last_name ?></br>
<?php echo 'Teacher Id: '. $teacher->teacher_id ?></br>
<?php echo 'Email Adress: '. $teacher->teacher_email ?></br>
<?php echo 'School: '. $teacher->school_name ?></br>
