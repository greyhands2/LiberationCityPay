$(function(){


$('#submit').click(function(event) {


    var name = $('#name').val();
    var email = $('#email').val();
    var amount = $('#amount').val() * 100;
    var token = name + $('#token').val();
    if (validateInput(name, email, amount)) {

        document.getElementById('amount1').setAttribute('value', amount);
        document.getElementById('cust_id').setAttribute('value', token);
        document.getElementById('cust_name').setAttribute('value', name);

        var product_id = $('#product_id').val();
        var pay_item_id = $('#pay_item_id').val();
        var currency = $('#currency').val();
        var site_redirect_url = $('#site_redirect_url').val();
        var txn_ref = $('#txn_ref').val();
        var cust_id = $('#cust_id').val();
        var site_name = $('#site_name').val();
        var cust_name = $('#cust_name').val();
        var hash = $('#hash').val();
        var giving_type = $('#giving_type').val();



    var userPaymentDetails = new FormData();



    // userPaymentDetails.append('email', email);
    userPaymentDetails.append('amount', amount);
    // userPaymentDetails.append('product_id', product_id);
        // userPaymentDetails.append('pay_item_id', pay_item_id);
        // userPaymentDetails.append('currency', currency);
        // userPaymentDetails.append('site_redirect_url', site_redirect_url);
        userPaymentDetails.append('txn_ref', txn_ref);
        userPaymentDetails.append('cust_id', cust_id);
        // userPaymentDetails.append('site_name', site_name);
        // userPaymentDetails.append('cust_name', cust_name);
        // userPaymentDetails.append('hash', hash);
        userPaymentDetails.append('giving_type', giving_type);



        var statusButton = document.getElementById('submit');
        statusButton.setAttribute('value', '');
        statusButton.setAttribute('value', 'loading...');

console.log(cust_id)


        axios.post('/savePaymentDetails', {
            userPaymentDetails
        }).then(function (response){
            statusButton.setAttribute('value', '');
            statusButton.setAttribute('value', 'Pay Now');
            statusButton.setAttribute('type', 'submit');
$('SUCESS').appendTo($('#feedback'));
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
                statusButton.setAttribute('value', '');

                statusButton.setAttribute('value', 'Error');
                statusButton.setAttribute('type', 'submit');
                $('Error please refresh the page and try again').appendTo($('#feedback'));

            });


} else
    {
    $('#feedback').empty();

        $('Please Fill the Form').appendTo($('#feedback'));
    }
    // $('#holder').empty();

});



});



function validateInput(name, email, amount){
   if((name !== null && name.trim() !== '') && (email !== null && email.trim() !== '' && validateEmail(email) ) && (amount !== null )) {

return true;

   }



}

function validateEmail(email)
{
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}








