const paymentForm = document.getElementById('paymentForm');

paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
    e.preventDefault();
    let handler = PaystackPop.setup({
        key: 'pk_test_041c5e863a27f0ad1ee97b824b8d39f46bbc014f', // Replace with your public key
        email: document.getElementById("email-address").value,
        first_name : document.getElementById('first-name').value,
        last_name : document.getElementById('last-name').value,
        amount: (document.getElementById("amount").value * 100) + 50000,

        ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        // label: "Optional string that replaces customer email"
        onClose: function(){
            alert('Window closed.');
        },
        callback: function(response){
            alert(`Payment complete! Reference: ${response.reference}. Redirecting to orders...`);
            // let ids = [];
            setTimeout(function () {
                // quantity.forEach(function (text,index,arrays){
                //     ids.push(text.innerHTML);
                // })
                window.location.href = `/buy/cart/complete/${paymentForm[0].value}`
            }, 1000)
        }

    });
    handler.openIframe();
}


