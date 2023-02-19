<?php include("../partials/header.php"); ?>
<?php include("../partials/navbar.php"); ?>

<div class="checkout-container">
  
<form action="" class="checkout-form">
    <div class="checkout-form-image form-control">
        <img src="../images/credit_card.png" alt="">
    </div>
    <div class="checkout-form-card-number form-control">
    <label for="card-number">Card number</label>
            <input type="text" id="card-number" name="card-number" class="card-number" placeholder="1234 5678 9012 3456">
    </div>
    <div class="checkout-form-card-name form-control">
    <label for="card-name">Name on card</label>
            <input type="text" id="card-number" name="card-name" class="card-name" placeholder="Ex. Example Test">
    </div>
    <div class="expire-security">
    <div class="checkout-form-card-expire form-control">
    <label for="card-expire">Expiry date</label>
            <input type="text" id="card-expire" name="card-expire" class="card-expire" placeholder="10/19">
    </div>
    <div class="checkout-form-card-security form-control">
    <label for="card-security">Security Code</label>
            <input type="password" id="card-security" name="card-security" class="card-security" placeholder="***">
    </div>
    </div>
    <div class="checkout-form-button form-control">
        <button>Pay</button>
    </div>
</form>

</div>

<?php include("../partials/footer.php"); ?>