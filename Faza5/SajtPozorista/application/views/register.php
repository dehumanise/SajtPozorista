<div class="container">
    <div class="section">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Register</h1>
            </div>

        </div>

        <?php echo validation_errors(); ?>

        <?php echo form_open('register/registerUser') ?>

        <label for="name" align="left">Username <font color="red"> * </font></label><br/>
        <input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" spellcheck="false" maxlength="40" size="40"/><br/>

        <label for="password">Lozinka <font color="red"> * </font></label><br/>
        <input type="password" id="password" name="password"  maxlength="40" size="40"/><br/>

        <label for="password">Ponovite lozinku <font color="red"> * </font></label><br/>
        <input type="password" id="passwordagain" name="passwordagain" maxlength="40" size="40"  /><br/>

        <label for="email">Email <font color="red"> * </font></label><br/>
        <input type="text" id="email" name="email" value="<?php echo set_value('email'); ?>" spellcheck="false" maxlength="40" size="40"/><br/>

        <label for="role">Rola<font color="red"> * </font></label><br/>
        <select id="role" name="role" value="<?php echo set_value('role'); ?>">
            <option value="registrovan">registrovan</option>
            <option value="kriticar">kriticar</option>
            <option value="moderator">moderator</option>
        </select><br/>

        <label for="telefon">Telefon<font color="red"> * </font></label><br/>
        <input type="text" id="telefon" name="telefon" value="<?php echo set_value('telefon'); ?>" spellcheck="false" maxlength="40" size="40"  /><br/>

        <label for="starost">Godina rođenja <font color="red"> * </font></label><br/>
        <select id="birthyear" name="birthyear">
            <?php
            for ($i = 60; $i >= 0; $i--) {
                $year = 1945 + $i;
                $selected = $year == set_value('birthyear') ? 'selected' : '';
                echo " <option " . $selected . " value=\"" . $year . "\">" . $year . "</option>";
            }
            ?>
        </select><br/>

        <label for="posta">Obaveštenja putem email-a?</label>
        <input type="checkbox" id="posta" name="posta" spellcheck="false"/>

        <br/><br/>
        <input type="submit" value="Registruj se!" name="button" id="create-account" class="button" align="center"/>                                           

        <?php echo form_close() ?>
    </div>
</div>
