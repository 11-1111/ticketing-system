<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/intasend-inlinejs-sdk@3.0.4/build/intasend-inline.js"></script>
</head>
<body>
<div class="payment">
    <form>
        <label for="name">Name</label>
        <p class="output"><!-- Name will be displayed here --></p>

        <label for="amount">Amount to be Paid</label>
        <p class="output"><!-- Amount will be displayed here --></p>

        <label for="vehicle">Vehicle</label>
        <p class="output"><!-- Vehicle will be displayed here --></p>
    </form>
</div>
<button class="intaSendPayButton" data-method="M-PESA" data-amount="1" data-currency="KES" data-phone_number="254759856000">Pay Now</button>  
<script>

  new window.IntaSend({
  publicAPIKey: "ISPubKey_test_68461029-1e28-4e8a-9ac2-cd54ca0ba108",
  live: false //set to true when going live
  })
  .on("COMPLETE", (results) => console.log("Do something on success", results))
  .on("FAILED", (results) => console.log("Do something on failure", results))
  .on("IN-PROGRESS", (results) => console.log("Payment in progress status", results))

</script>
</body>
</html>