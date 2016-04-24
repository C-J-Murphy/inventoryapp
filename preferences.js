$(document).ready(function() {
    $('.alert-success').hide();
    var validate_text = /([A-Z]|[a-z])\w+/;
    var validate_product_amount = /([1-9]|[1-9][0-9])+/;
    var action;
    var location;
    
    // Add selected inventory location to dropdown title
    $('.location_select').click(function(){
        location = $(this).attr('title');
        $('.location_text').empty();
        $('.location_text').append($(this).attr('title'));
    });
    
    
    $('#add_product').bind("click touchstart", function(event) {
        event.preventDefault();
        action = "addproduct";
        var productid = $('#productid').val();     
        var product_amount = parseInt($('#product_amount').val());
        if (!validate_text.test(productid)) {
            return;
        }
        if (!validate_product_amount.test(product_amount)) {
            return;
        }
        
        $.ajax ({
            url: 'action.php',
            type: 'GET',
            data: {
                productid: productid,
                product_amount: product_amount,
                location: location,
                action: action,
            },
            
            success: function (serverResponse) {
                $('#product_success').empty();
                $('#product_success').append(productid + " added to " + location + "!");
                $('#get_product').hide();
                $('#product_success').fadeIn();
                $('#product_success').click(function(){
                    
                    $('#product_success').hide();
                    $('#get_product').fadeIn();
                });
                action = '';
            }
        });
    });
    
    $('#remove_product').bind("click touchstart", function(event) {
        event.preventDefault();
        var productid = $('#productid').val();   
        action = "removeproduct";
        if (!validate_text.test(productid)) {
            return;
        }
        
        $.ajax ({
            url: 'action.php',
            type: 'GET',
            data: {
                productid: productid,
                location: location,
                action: action,
            },
            
            success: function (serverResponse) {
                $('#product_success').empty();
                $('#product_success').append(productid + " removed from" + location + "!");
                $('#get_product').hide();
                $('#product_success').fadeIn();
                $('#product_success').click(function(){
                    
                    $('#product_success').hide();
                    $('#get_product').fadeIn();
                });
                action = '';
            }
        });
    });
    
    $('#add_storage').bind("click touchstart",function(event) {
        event.preventDefault();
        action = "addstorage";
        var storageid = $('#storageid').val();
        if (!validate_text.test(storageid)) {
            return;
        }
        
        $.ajax ({
            url: 'action.php',
            type: 'GET',
            data: {
                storageid: storageid,
                action: action,
            },
            
            success: function (serverResponse) {
                $('#storage_success').empty();
                $('#storage_success').append(storageid + " added!");
                $('#get_storage').hide();
                $('#storage_success').fadeIn();
                $('#storage_success').click(function(){
                    
                    $('#storage_success').hide();
                    $('#get_storage').fadeIn();
                });
            }
        });
    });
    
    $('#remove_storage').bind("click touchstart",function(event) {
        event.preventDefault();
        action = "removestorage";
        var storageid = $('#storageid').val();
        if (!validate_text.test(storageid)) {
            return;
        }
        
        $.ajax ({
            url: 'action.php',
            type: 'GET',
            data: {
                storageid: storageid,
                action: action,
            },
            
            success: function (serverResponse) {
                $('#storage_success').empty();
                $('#storage_success').append(storageid + " removed!");
                $('#get_storage').hide();
                $('#storage_success').fadeIn();
                $('#storage_success').click(function(){
                    
                    $('#storage_success').hide();
                    $('#get_storage').fadeIn();
                });
            }
        });
    });
});
