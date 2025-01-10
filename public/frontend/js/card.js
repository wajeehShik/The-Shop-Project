
(()=>{ 
    var t;
    (t=jQuery)
    (".item-quantity").on("change",(function(a){
        id=t(this).data("id");
        console.log(t(this).val());
        t.ajax({
            url:"/card/"+id
            ,method:"put",
            data:{
                quantity:t(this).val(),_token:csrf_token},
            success:function(data){
                console.log(data);
                console.log("#total-"+id);
                $("#total").text(data['total']);
                $("#total-"+id).text(data['product']);
            }
            },  
            )})),
            t(".remove-item").on("click",(function(a){
                var deleteItem=confirm("are sure delete this item from card");
                if(deleteItem){
                var c=t(this).data("id");
                t.ajax({
                    url:"/card/"+c,
                    method:"delete",
                    data:{_token:csrf_token},
                    success:function(a){
                        t("#".concat(c)).remove()}})}})),
                        t(".add-to-cart").on("click",(function(a){
                            t.ajax({url:"/cart",
                            method:"post",
                            data:{
                                product_id:t(this).data("id"),
                                quantity:t(this).data("quantity"),
                                _token:csrf_token
                            },success:function(t){}})}))})();