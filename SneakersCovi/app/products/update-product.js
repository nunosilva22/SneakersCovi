$(document).ready(function(){
 
   
    $(document).on('click', '.update-product-button', function(){
       
        var id = $(this).attr('data-id');
       
        $.getJSON("http://localhost/interface/SneakersCovi/api/product/read_one.php?id=" + id, function(data){
 
        
        var name = data.name;
        var price = data.price;
        var description = data.description;
        var category_id = data.category_id;
        var category_name = data.category_name;
 
      
        $.getJSON("http://localhost/interface/SneakersCovi/api/category/read.php", function(data){
        var categories_options_html=`<select name='category_id' class='form-control'>`;
 
        $.each(data.records, function(key, val){
            
            if(val.id==category_id){ categories_options_html+=`<option value='` + val.id + `' selected>` + val.name + `</option>`; }
 
            else{ categories_options_html+=`<option value='` + val.id + `'>` + val.name + `</option>`; }
        });
        categories_options_html+=`</select>`;
 
        
        var update_product_html=`
        <div id='read-products' class='btn btn-primary pull-right m-b-15px read-products-button'>
            <span class='glyphicon glyphicon-list'></span> Read Products
        </div>
        
        <form id='update-product-form' action='#' method='post' border='0'>
        <table class='table table-hover table-responsive table-bordered'>
 
        
        <tr>
            <td>Name</td>
            <td><input value=\"` + name + `\" type='text' name='name' class='form-control' required /></td>
        </tr>
 
        
        <tr>
            <td>Price</td>
            <td><input value=\"` + price + `\" type='number' min='1' name='price' class='form-control' required /></td>
        </tr>
 
        
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control' required>` + description + `</textarea></td>
        </tr>
 
        
        <tr>
            <td>Category</td>
            <td>` + categories_options_html + `</td>
        </tr>
 
        <tr>
 
            
            <td><input value=\"` + id + `\" name='id' type='hidden' /></td>
 
           
            <td>
                <button type='submit' class='btn btn-info'>
                    <span class='glyphicon glyphicon-edit'></span> Update Product
                </button>
            </td>
 
        </tr>
 
    </table>
</form>`;

$("#page-content").html(update_product_html);
 

changePageTitle("Update Product");
});
});
    });
 
  
    $(document).on('submit', '#update-product-form', function(){
 
        
        var form_data=JSON.stringify($(this).serializeObject());
        
        $.ajax({
            url: "http://localhost/interface/SneakersCovi/api/product/update.php",
            type : "POST",
            contentType : 'application/json',
            data : form_data,
            success : function(result) {
            showProducts();
        },
        error: function(xhr, resp, text) {
           
            console.log(xhr, resp, text);
        }
}); 
 
    return false;
});
});