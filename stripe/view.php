
<!-- Start Stripe Code -->
    <?php 
    require_once('./stripe/config.php'); 
    if ($row1["status"] == 3) {
        echo "<b style='color:green;'>Paid</p>";
    }elseif($row1["status"] == 1){?>
        <form action="charge.php" method="post">
            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="<?php echo $stripe['publishable_key']; ?>"
                data-description="Access for a year"
                data-amount="1000"
                data-locale="auto"></script>
            <input type="hidden" name="amount" value="500">
            <input type="hidden" name="currency" value="usd">
            <input type="hidden" name="patient_id" value="<?php echo $_SESSION['patid']; ?>">
            <input type="hidden" name="appointment_id" value="<?php echo $row1['appointid'] ?>">
        </form>
    <?php } ?>
    <!-- End Stripe Code --> 