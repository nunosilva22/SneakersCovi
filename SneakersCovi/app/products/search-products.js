$(document).ready(function(){
 
    
    $(document).on('submit', '#search-product-form', function(){
 
        
        var keywords = $(this).find(":input[name='keywords']").val();
 
       
        $.getJSON("http://localhost/interface/SneakersCovi/api/product/search.php" + keywords, function(data){
 
            
            readProductsTemplate(data, keywords);
 
           
            changePageTitle("Search products: " + keywords);
 
        });
 
        
        return false;
    });
 
});