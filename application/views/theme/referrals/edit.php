<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Edit</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="<?php echo base_url('referrals');?>"> Back</a>

        </div>

    </div>

</div>


<form method="post" action="<?php echo base_url('referrals/update/'.$referral->id);?>">

    <?php


    if ($this->session->flashdata('errors')){

        echo '<div class="alert alert-danger">';

        echo $this->session->flashdata('errors');

        echo "</div>";

    }


    ?>


    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>First name:</strong>

                <input type="text" name="first_name" class="form-control" value="<?php echo $referral->first_name; ?>">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Last name:</strong>

                <input type="text" name="last_name" class="form-control" value="<?php echo $referral->last_name; ?>">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>E-mail:</strong>

                <input type="text" name="email" class="form-control" value="<?php echo $referral->email; ?>">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Referral Code:</strong>

                <input type="text" name="code" class="form-control" minlength="6" maxlength="6" style="text-transform:uppercase" value="<?php echo $referral->code; ?>">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>


</form>