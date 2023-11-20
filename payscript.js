document.getElementById("rzp-button1").onclick = function (e) {
  var uname = document.getElementById("username").value;
  var amt = document.getElementById("amount").value;
  amt = amt * 100;
  var options = {
    // key: "rzp_test_ed8WeGcGzOe4x5",
    amount: amt,
    currency: "INR",
    name: "Smart Fuel Station",
    description: "Test Transaction",
    image:
      "https://www.google.com/url?sa=i&url=https%3A%2F%2Fm.facebook.com%2Flogomakershop%2F&psig=AOvVaw2QJFrSvLM8Z9GN0bFHtsEq&ust=1699880732308000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCKi_-qvDvoIDFQAAAAAdAAAAABAE",
    handler: function (response) {
      console.log(response.razorpay_payment_id);
      var xhr = new XMLHttpRequest();
      var url = "dopayment.php";
      var params =
        "payment_id=" +
        response.razorpay_payment_id +
        "&amount=" +
        amt +
        "&username=" +
        uname;
      var strparams = params.toString();
      xhr.open("POST", url, true);
      // Set the appropriate headers if needed
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          // Handle the response
          console.log(xhr.responseText);
        }
      };

      // Send the request
      xhr.send(strparams);
    },
  };
  var rzp1 = new Razorpay(options);
  rzp1.open();
  e.preventDefault();
};
