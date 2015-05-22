<div class="container">
    <div class="section">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Login</h1>
            </div>

        </div>

        <?php
        if (isset($msg)) {
            echo "<div>$msg</div><br/>";
        }
        ?>

        <?php echo validation_errors(); ?>

        <?php echo form_open('login/loginUser') ?>

        <label for="name" align="left">Username <font color="red"> * </font></label><br/>
        <input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" spellcheck="false" maxlength="40" size="40"/><br/>

        <label for="password">Lozinka <font color="red"> * </font></label><br/>
        <input type="password" id="password" name="password"  maxlength="40" size="40"/><br/>

        <br/>
        <input type="submit" value="Login" name="button" id="create-account" class="button" align="center"/>                                           

        <?php echo form_close() ?>
    </div>
</div>
