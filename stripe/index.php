<?php require_once('./config.php'); ?>

<!-- <form action="charge.php" method="post">
  	<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-description="Access for a year"
          data-amount="200000"
          data-locale="auto">
  	</script>
  	<input type="text" name="amount">
  	<input type="text" name="currency">
</form> -->
<script
id="stripe-script"
src="https://checkout.stripe.com/checkout.js" 
class="stripe-button"
data-image="{% static 'img/marketplace.png' %}"
data-key="<?php echo $stripe['publishable_key']; ?>""
data-name="ABC"
data-description="Tut tut"
data-amount="100000">
</script>
