<h1>Teacher Main Page</h1>
<h2><?php echo 'Welcome '. $teacher->teacher_first_name .' '. $teacher->teacher_middle_name .' '. $teacher->teacher_last_name?></h2>
<a href="<?php echo site_url('teacher/classes') ?>">My Classes</a> </br>
<a href="<?php echo site_url('teacher/students') ?>">My Students</a> </br>
<a href="<?php echo site_url('teacher/account') ?>">My Account</a> </br>
<a href="<?php echo site_url('teacher/statistics') ?>">My Statistics</a> </br>
<a href="<?php echo site_url('teacher/logout') ?>">Log Out</a> </br>
