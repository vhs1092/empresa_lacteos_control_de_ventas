$(document).ready(function () 
{
   $(".tran_select").select2();

   $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });

   $(".tran_select").on("change", function() {
      console.log("change");
      valor = $(this).val();
      
      $.ajax({
            type: "post",
            url:'transaccion_get_tipo',
            dataType : 'json',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: 'id='+valor,
            success: function( data ) {
            	if(data.maneja_cliente==1)
            	{
            		$("#clientes-control").show();
            		$("#clientes").autocomplete({
            		   //source: data
                     source:'transaccion_get_clientes'
                       
                 });

            	}else{
            		$("#clientes-control").hide();
            		$("#clientes").val("");
            	}
               
            }
        });

    });

   var contador=1;

   $("#boton_nuevo").click(function(){  
      contador++;
     event.preventDefault();
     $("#mas_elementos").append('\
     	              <div class="col-md-6 pro_'+  contador +'"> \
                            <div class="form-group">\
                               <label class="col-sm-2 control-label" for="producto_'+ contador +'">Producto</label>\
                                <div class="col-sm-10">\
                                    <input class="form-control" id="producto_' + contador + '" type="text" placeholder="Producto">\
                                </div>\
                             </div>\
                      </div> \
                      <div class="col-md-6 can_'+ contador +'">\
                        <div class="form-group">\
                            <label class="col-sm-2 control-label" for="cantidad_'+ contador +'">Cantidad</label>\
                                <div class="col-sm-4">\
                                    <input class="form-control" id="cantidad_'+ contador +'" type="text" placeholder="Cantidad">\
                                </div>\
                        </div>\
                      </div>\
     	');

       $("#producto_"+contador).autocomplete({

       	 source:'transaccion_get_productos'
           });

   });


 $("#boton_menos").click(function(){  
    
     event.preventDefault();
     if(contador>1){
     	 $(".pro_"+contador).remove();
    	 $(".can_"+contador).remove();
       contador--;
     }
   });

$( "#producto_1" ).autocomplete({
    //source: data
    source:'transaccion_get_productos'
    });



});