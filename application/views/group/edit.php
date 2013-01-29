<h1>Edit Class</h1>
<form action="edit" method="post">
    <h3>*Name:</h3>
    <input type="" name="name" id="name" value="<?php echo $className ?>"  />
    <input type="hidden" name="classId" id="classId" value="<?php echo $cid ?>"  />
    </br>
    <input type="submit"  value="Edit" />
    </form>
