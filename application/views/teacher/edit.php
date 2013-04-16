<h1>Edit Account Data</h1>
<form action="edit" method="post">
    <h3>*First Name:</h3>
    <input type="" name="firstName" id="firstName" value="<?php echo $teacher->teacher_first_name ?>"  />
    <h3>Middle Name:</h3>
    <input type="" name="middleName" id="middleName" value="<?php echo $teacher->teacher_middle_name ?>"  />
    <h3>*Last Name:</h3>
    <input type="" name="lastName" id="lastName" value="<?php echo $teacher->teacher_last_name ?>"  />
    <h3>*Email Adress:</h3>
    <input type="" name="email" id="email" value="<?php echo $teacher->teacher_email ?>"  />
    <h3>New Password:</h3>
    <input type="password" name="newPassword" id="newPassword" value=""  />
    <h3>*Password:</h3>
    <input type="password" name="password" id="password" value=""  />
    </br>
    <input type="submit"  value="Edit" />
    </form>
