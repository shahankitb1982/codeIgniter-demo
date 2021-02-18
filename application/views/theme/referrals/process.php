<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Get referral code info</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="<?php echo base_url('referrals'); ?>"> Back</a>

        </div>

    </div>

</div>


<form method="post" class="form-validate-code" action="<?php echo base_url('referralsProcess'); ?>">

    <?php


    if ($this->session->flashdata('errors')) {

        echo '<div class="alert alert-danger">';

        echo $this->session->flashdata('errors');

        echo "</div>";

    }
    ?>


    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Referral Code:</strong>

                <input type="text" required name="referralcode" class="form-control" minlength="6" maxlength="6"
                       style="text-transform:uppercase">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>
</form>
<div class="row" id="result" style="display: none">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>First name:</strong>

            <span id="response_first_name"></span>

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Last name:</strong>

            <span id="response_last_name"></span>

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Email:</strong>

            <span id="response_email"></span>

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Code:</strong>

            <span id="response_code"></span>

        </div>

    </div>

</div>
<style>
    .loader {
        display: none;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 999;
        background: rgba(255, 255, 255, 0.8) url("<?php echo base_url(); ?>assets/images/loader.gif") center no-repeat;
    }
</style>
<div id="loaderDiv" class="loader" style="display: none"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>

    $(document).on({
        ajaxStart: function () {
            $("body").addClass("loading");
        },
        ajaxStop: function () {
            $("body").removeClass("loading");
        }
    });

    $(function () {

        jQuery.validator.addMethod("alphanumeric", function (value, element) {
            return this.optional(element) || /^[A-Z0-9]+$/i.test(value);
        }, "Only Uppercase Letters & Numbers allowed");


        $('form.form-validate-code').validate({
            rules: {
                referralcode: {
                    required: true,
                    minlength: 6,
                    maxlength: 6,
                    alphanumeric: true
                },
            },
            messages: {
                referralcode: {
                    minlength: "Must no longer than 6 characters",
                    maxlength: "Must no longer than 6 characters",
                    required: "Must not be empty",
                    alphanumeric: "Only alphanumeric (A-Z0-9) allowed."
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: "/referrals/validate",
                    dataType: 'json',
                    data: $('form.form-validate-code').serialize(),
                    beforeSend: function () {
                        $("#loaderDiv").show();
                        $("#result").hide();
                    },
                    success: function (msg) {
                        $("#loaderDiv").hide();
                        if (!msg) {
                            alert("Please enter valid referral code");
                        } else {
                            $("#result").show();
                           // alert(msg.first_name);
                            $("#result #response_first_name").text(msg.first_name);
                            $("#result #response_last_name").text(msg.last_name);
                            $("#result #response_email").text(msg.email);
                            $("#result #response_code").text(msg.code);
                        }
                    },
                    error: function () {
                        $("#loaderDiv").hide();
                        $("#result").hide();
                        alert("Invalid Code");
                    }
                });
            },
        });
    });


</script>