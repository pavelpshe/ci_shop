$('.add-to-cart').on('click', function(){
	var product_id=$(this).data('id');//zaneset id opredelennogo mucara
 $.ajax({
      
        url:CI_ROOT + "cart/addToCart",  
        type: "GET", 
        dataType: "html",
        data: { id: product_id}, //vozmet id producta s dome
        success: function(data) {
          
        location.reload();
        
        } 
        
    });
    
  });
  
  
  
 $('.update-btn').on('click',function(){ // pri najatie na - + v cart
 	var op=$(this).data('op');
 	var amount;
 	if(op=='up'){
 		amount=parseInt($(this).prev().val());
 		amount++;
 		$(this).prev().val(amount);
 	}else{
 		amount=parseInt($(this).next().val());
 		amount--;
 		$(this).next().val(amount);
 	}
 	$('#checkout-form').submit();//pri kajdom najatie proisxodit submit
 });
          

