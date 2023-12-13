$(document).ready(function(){
 
   
    $(document).on('click', '.read-one-product-button', function(){
        
        var id = $(this).attr('data-id');
       
        $.getJSON("http://localhost/interface/SneakersCovi/api/product/read_one.php?id=" + id, function(data){
            
            var read_one_product_html=`
 
            <!-- when clicked, it will show the product's list -->
            <div id='read-products' class='btn btn-primary pull-right m-b-15px read-products-button'>
                <span class='glyphicon glyphicon-list'></span> Read Products
            </div>
            <!-- product data will be shown in this table -->
            <table class='table table-bordered table-hover'>
 
            <!-- nome do produto -->
            <tr>
                <td class='w-30-pct'>Name</td>
                <td class='w-70-pct'>` + data.name + `</td>
            </tr>
 
            <!-- preço -->
            <tr>
                <td>Price</td>
                <td>` + data.price + `</td>
            </tr>
 
            <!-- descrição do produto -->
            <tr>
                <td>Description</td>
                <td>` + data.description + `</td>
            </tr>
 
            <!-- nome da categoria do produto -->
            <tr>
                <td>Category</td>
                <td>` + data.category_name + `</td>
            </tr>
 
            </table>`;
           
            $("#page-content").html(read_one_product_html);
 
            
            changePageTitle("Read Product");
            });
        });
 
});