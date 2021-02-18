<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Referral Codes List</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo base_url('referrals/create') ?>"> Create New Referral Code</a>
            <a class="btn btn-success" href="<?php echo base_url('referrals/process') ?>"> Validate Referral Code</a>
        </div>
    </div>
</div>


<table class="table table-bordered">


    <thead>

    <tr>

        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Code</th>
        <th width="220px">Action</th>

    </tr>

    </thead>


    <tbody>

    <?php foreach ($data as $referral) { ?>

        <tr>

            <td><?php echo $referral->first_name; ?></td>
            <td><?php echo $referral->last_name; ?></td>
            <td><?php echo $referral->email; ?></td>
            <td><?php echo $referral->code; ?></td>

            <td>

                <form method="DELETE" action="<?php echo base_url('referrals/delete/' . $referral->id); ?>">

                    <a class="btn btn-info" href="<?php echo base_url('referrals/' . $referral->id) ?>"> View</a>

                    <a class="btn btn-primary" href="<?php echo base_url('referrals/edit/' . $referral->id) ?>"> Edit</a>

                    <button type="submit" class="btn btn-danger"> Delete</button>

                </form>

            </td>

        </tr>

    <?php } ?>

    </tbody>


</table>