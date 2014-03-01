<h1>Create Account</h1>

<fieldset class="login">
    <legend>Personal Information</legend>
    
    <?php
    // looks at the login controllers with the validate credentials method
    echo form_open('login/create_member');
    // first input is name - second is value
    echo form_input('firstname', 'First Name');
    echo form_input('lastname', 'Last Name');
    echo form_input('email', 'Email Address');

    ?>
</fieldset>

<fieldset class="login">
    <legend>Login Info</legend>
    <?php
        echo form_input('username', set_value('username', 'Username'));
        echo form_input('password', set_value('password', 'Password'));
        echo form_input('password2', set_value('password2', 'Password Confirm'));
        
        echo form_submit('submit','Create Account');
    ?>
    <?php echo validation_errors('<p class="error">'); ?>
    
</fieldset>