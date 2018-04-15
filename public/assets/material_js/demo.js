
demo = {

    showNotification: function(from, message){
       // type = ['','info','success','warning','danger','rose','primary'];

        $.notify( message,{
            position:from,
            style: 'bootstrap',
            showAnimation: 'slideDown',
            showDuration: 400,
            hideAnimation: 'slideUp',
            hideDuration: 200,
            gap: 2
        });

    	/*$.notify({
        	icon: title,
        	message: message

        },{
            type: type_color,
            timer: 3000,
            placement: {
                from: from,
                align: align
            }
        });*/
	}

}
