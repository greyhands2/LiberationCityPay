$(function(){


$('#submit').click(function(event) {


    var name = $('#name').val();
    var email = $('#email').val();
    var amount = $('#amount').val() * 100;
    var token = name + $('#token').val();
    var statusButton = document.getElementById('submit');
    if (validateInput(name, email, amount)) {
console.log('hi')
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
        var assignGiveTypeResults = assignGiveType(giving_type);

            if( _.contains([1, 2, 3], assignGiveTypeResults)){

                var derivedGivingType = assignGiveTypeResults;
            }
var returnInfo = '<div class="card" style="width: 18rem;">\n' +
    '  <ul class="list-group list-group-flush">\n' +
    '    <li class="list-group-item">Cras justo odio</li>\n' +
    '    <li class="list-group-item">Dapibus ac facilisis in</li>\n' +
    '    <li class="list-group-item">Vestibulum at eros</li>\n' +
    '  </ul>\n' +
    '</div>';


    // userPaymentDetails.append('product_id', product_id);
        // userPaymentDetails.append('pay_item_id', pay_item_id);
        // userPaymentDetails.append('currency', currency);
        // userPaymentDetails.append('site_redirect_url', site_redirect_url);
        // userPaymentDetails.append();
        // userPaymentDetails.append();
        // userPaymentDetails.append('site_name', site_name);
        // userPaymentDetails.append('cust_name', cust_name);
        // userPaymentDetails.append('hash', hash);
        //





        $('#holder').html('');
        statusButton.setAttribute('value', 'Loading...');

        axios.post('/savePaymentDetails', {
        'amount': amount, 'txn_ref': txn_ref, 'cust_id' : cust_id, 'email' : email, 'giving_type' : derivedGivingType
        }).then(function (response){


            statusButton.setAttribute('value', '');
            statusButton.setAttribute('value', 'Pay Now');
            statusButton.setAttribute('type', 'submit');
            statusButton.setAttribute('style', 'width:90px; border: 1px solid #fff; background-color: #117A65;');
            $('#feedback').html('');
            document.getElementById('feedback').setAttribute('style', 'color: #117A65');
$('#feedback').append('SUCCESS!!');
            $('#holder').append(returnInfo);

                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
                statusButton.setAttribute('value', '');

                statusButton.setAttribute('value', 'Error');
                statusButton.setAttribute('type', 'submit');
                $('#feedback').html('');
                $('#feedback').append('Error!!! Please Refresh and Try Again');
                setTimer('#feedback', 5);
            });


} else
    {

        $('#feedback').empty();
console.log('gba')
        $('#feedback').append('Please Fill The Form Properly');
        setTimer('#feedback', 5);
    }
    //  $('#holder').empty();

});



});



function validateInput(name, email, amount){
   if((name !== null && name.trim() !== '') && (email !== null && email.trim() !== '' && validateEmail(email) !== false ) &&  (amount !== null )) {
console.log('madam')
return true;

   } else {

       return false;
   }
}

function validateEmail(email)
{
    var re = /\S+@\S+\.\S+/;
    //console.log(re.test(email))
    return re.test(email);
}


function assignGiveType(giveTypeString){
    var return_var;
    switch (giveTypeString) {
        case "tithe":
            return_var = 1;
            break;
        case "offering":
            return_var = 2;
            break;
        case "partnership":
            return_var = 3;
            break;
        default:
            return_var = 0;


    }
    return return_var;
}


function setTimer(dom_ref, tyme){

    setTimeout(function(){
        $(dom_ref).html('');
    }, tyme * 1000);

}


