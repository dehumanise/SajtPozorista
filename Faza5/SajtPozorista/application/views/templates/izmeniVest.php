<div class="container">
    <div class="section">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Izmeni vest</h1>
            </div>

        </div>

        <br/>

        <div class="row">

            <?php echo validation_errors(); ?>

            <?php echo form_open('vesti/izmeniVest/','',array('VestID' => $vest['VestID']))?>
            <div class="form-group">
                <label for="naslov">Naslov <font color="red"> * </font></label>
                <input type="text" id="naslov" name="naslov" value="<?php echo $vest['Naslov']; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="sadrzaj">Sadrzaj <font color="red"> * </font></label>
                <textarea class="form-control" id="sadrzaj" name="sadrzaj" rows="15"><?php echo $vest['Sadrzaj']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="slika">Slika</label>
                <input type="file" id="slika" name="slika">
            </div>
            <input type="submit" value="Izmeni" name="button" id="izmeniVest" class="button"/>
            <?php echo form_close() ?>

        </div>
    </div>
</div>