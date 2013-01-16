<h1>My Classes</h1>
<h2><a href="<?php echo site_url('class/add') ?>" >  <?php echo 'Add Class' ?></a></h2>
<?php foreach($classes as $class): ?>
    <?php
        $viewSegments = array('class','view',$class['class_id']);
        $editSegments = array('class','edit',$class['class_id']);
        $removeSegments = array('class','remove',$class['class_id']);
    ?>
    <li>
        <a href="<?php echo site_url($viewSegments) ?>" >  <?php echo $class['class_name'] ?></a>
        <?php if($class['class_teacher_access_level'] >= 2): ?>
        <a href="<?php echo site_url($editSegments) ?>" >  <?php echo 'edit' ?></a>
        <a href="<?php echo site_url($removeSegments) ?>" >  <?php echo 'remove' ?></a>
        <?php endif ?>
    </li>
<?php endforeach ?>
