$(document).ready(function(){



$(document).on('click','.submit_chat', function(e){ 


var cuser_id = e.currentTarget.id;
e.preventDefault();
var content = $('textarea[name=content]').val();

 $.ajax({ 

    url:'chatform.php',
    type: 'post',
    data:{ 'chat':{'cuser_id':cuser_id, 'content':content}},
    dataType: 'text',

    success: function(data){


    	console.log(data);
    	$('textarea[name=content]').val('');
    }

 });

});





});