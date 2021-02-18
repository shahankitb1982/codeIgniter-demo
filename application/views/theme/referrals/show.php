<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>View Data</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="<?php echo base_url('referrals');?>"> Back</a>

        </div>

    </div>

</div>


<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>First name:</strong>

            <?php echo $referral->first_name; ?>

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Last name:</strong>

            <?php echo $referral->last_name; ?>

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Email:</strong>

            <?php echo $referral->email; ?>

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Code:</strong>

            <?php echo $referral->code; ?>

        </div>

    </div>

</div>