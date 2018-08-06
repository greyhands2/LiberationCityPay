$(function(){


$('#submit').click(function(event) {
    event.preventDefault();

    var name = $('#name').val();
    var email = $('#email').val();
    var amount = $('#amount').val() * 100;
    var token = name + $('#token').val();
    if (validateInput(name, email, amount, token)) {
        document.getElementById('amount1').setAttribute = amount;

    console.log(token)
    var userPaymentDetails = new FormData();


    userPaymentDetails.append('name', name);
    userPaymentDetails.append('email', email);
    userPaymentDetails.append('amount', amount);
    userPaymentDetails.append('token', token);

    $.ajax({

        url: 'http://localhost:80/lostit/getmore.php', // point to server-side PHP script
        type: "POST",             // Type of request to be send, called as method
        data: userPaymentDetails, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,
        mimeType: 'multiform/data',// To unable request pages to be cached
        crossDomain: true,
        processData: false,
        beforeSend: function () {
            $('.getmore').html('Loading...');
        },
        success: function (data, textStatus, jqXHR) {
            $('.getmore').remove();
            $('#foodz').append(data);
            console.log(data);

        }, error: function (xhr) {

            console.log(xhr.statusText + xhr.responseText);

        }

    });


} else
    {


    }
    // $('#holder').empty();

});



});



function validateInput(name, email, amount){
   if((name !== null && name.trim() !== '') && (email !== null && email.trim() !== '' && validateEmail(email) ) && (amount !== null && amount.trim() !== '')) {

return true;

   }



}

function validateEmail(email)
{
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}