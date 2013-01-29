<h1>Create Teacher Account</h1>
<form action="create" method="post">
    <h3>*First Name:</h3>
    <input type="" name="firstName" id="firstName" value=""  />
    <h3>Middle Name:</h3>
    <input type="" name="middleName" id="middleName" value=""  />
    <h3>*Last Name:</h3>
    <input type="" name="lastName" id="lastName" value=""  />
    <h3>*Email Adress:</h3>
    <input type="" name="email" id="email" value=""  />
    <h3>*School:</h3>
    <select name="school">
        <?php foreach($schools as $school): ?>
            <option value="<?php echo $school['school_id'] ?>"><?php echo $school['school_name'] .', '. $school['school_city'] ?></option>
        <?php endforeach ?>
    </select>
    <h3><a href="<?php echo site_url('school/create') ?>" >  <?php echo 'Create New School' ?></a></h3>
    <h3>*Password:</h3>
    <input type="password" name="password" id="password" value=""  />
    </br>
    <input type="submit"  value="Create" />
    </form>
