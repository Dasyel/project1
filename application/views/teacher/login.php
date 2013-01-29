<h1>Login</h1>
<form action="login" method="post">
    <h3>Email Adress:</h3>
    <input type=""  name="email" id="email" value="<?php echo set_value('email'); ?>"  />
    <h3>Password:</h3>
    <input type="password" name="password" id="password" value=""  />
    </br>
    <input type="submit"  value="Login" />
    </form>

<h2><a href="<?php echo site_url('teacher/create') ?>" >  <?php echo 'Create Account' ?></a></h2>
