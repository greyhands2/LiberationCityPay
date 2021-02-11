$(function(){


$('#submit').click(function(event) {


    var name = $('#name').val();
    var email = $('#email').val();
    var amount = $('#amount1').val() * 100;
    var token = name + $('#token').val();
    var statusButton = document.getElementById('submit');
    if (validateInput(name, email, amount)) {



        var giving_type = $('#giving_type').val();
        var assignGiveTypeResults = assignGiveType(giving_type);

            if( _.contains([1, 2, 3], assignGiveTypeResults)){

                var derivedGivingType = assignGiveTypeResults;
            }



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






        statusButton.setAttribute('value', 'Loading...');

        axios.post('/savePaymentDetails', {'name' : name,
        'amount': amount, 'txn_ref': txn_ref, 'cust_id' : cust_id, 'email' : email, 'giving_type' : derivedGivingType
        })
            .then(function (response){
            var payload = response.data.data;
            console.log(payload);
            var returnInfo = '<div class="form-group row">\n' +
                '<div class="input-group mb-2">\n' +
                '<div class="input-group-prepend">\n' +
                '<div class="input-group-text">TRANSACTION REFERENCE</div>\n' +
                '</div>\n' +
                '<input type="text" class="form-control" id="email" name="email" disabled value="'+payload.transaction_reference+'" required>'+
                '</div>\n' +
                '</div><div class="form-group row">\n' +
                '<div class="input-group mb-2">\n' +
                '<div class="input-group-prepend">\n' +
                '<div class="input-group-text">AMOUNT</div>\n' +
                '</div>\n' +
                '<input type="text" class="form-control" id="email" name="email" disabled value="NGN'+$('#amount1').val()+'.00" required>\n' +
                '</div>\n' +
                '</div>';



            document.getElementById('product_id').setAttribute('value', payload.product_id);
            document.getElementById('pay_item_id').setAttribute('value', payload.item_id);
            document.getElementById('amount').setAttribute('value', payload.amount);
            document.getElementById('currency').setAttribute('value', payload.currency);
            document.getElementById('site_redirect_url').setAttribute('value', payload.redirect_url);
            document.getElementById('txn_ref').setAttribute('value', payload.transaction_reference);
            document.getElementById('cust_id').setAttribute('value', payload.user_id);
            document.getElementById('site_name').setAttribute('value', payload.site_name);
            document.getElementById('cust_name').setAttribute('value', payload.user_name);
            document.getElementById('hash').setAttribute('value', payload.hash);
            document.getElementById('myForm').setAttribute('action', payload.action_url);

            statusButton.setAttribute('value', '');
            statusButton.setAttribute('value', 'Pay Now');
            statusButton.setAttribute('type', 'submit');
            statusButton.setAttribute('style', 'width:90px; border: 1px solid #fff; background-color: #117A65;');
            $('#feedback').html('');
            document.getElementById('feedback').setAttribute('style', 'color: #117A65');
$('#feedback').append('SUCCESS!!');
            $('#holder').html('');
            $('#holder').append(returnInfo);


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
            return_var = 1;
    }
    return return_var;
}


function setTimer(dom_ref, tyme){

    setTimeout(function(){
        $(dom_ref).html('');
    }, tyme * 1000);

}


