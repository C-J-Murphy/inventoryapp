// This script is used update and display changes to inventory displayed on cp.php
$(document).ready(function() {
    var this_item;
    var itemid;
    var count;
    
    // Store the first table from the MySQL Database and display it to the page
    var location = $('.location_select').attr('title');
    $('.default_location').empty();
    $('.default_location').append(location);
    
    
    // Add to the inventory count of the selected product
    $('.glyphicon-plus').click(function() {
        event.preventDefault();
        // Store the selected product name and update its display count on the page
        this_item = $(this).attr('title');
        itemid = this_item.substr(0, this_item.length - 1);
        count = parseInt($('#'+itemid).text());
        count++;
        
        // Send the inventory count to modifyproduct.php and update new count to MySQL
        $.ajax ({
            url: 'modifyproduct.php',
            type: 'GET',
            data: {
                location: location,
                itemid: itemid,
                count: count,
            },
                
            success: function(serverResponse) {
                    $('#'+itemid).hide();
                    $('#'+itemid).html(count).delay(170);
                    $('#'+itemid).fadeIn();
            }
                
        });
    });
    
    // Remove from the select inventory count
    $('.glyphicon-minus').click(function() {
        event.preventDefault();
        // Store the selected product name and update its display count on the page
        this_item = $(this).attr('title');
        itemid = this_item.substr(0, this_item.length - 1);
        count = parseInt($('#'+itemid).text());
        count--;
        
        // Send the inventory count to modifyproduct.php and update new count to MySQL
        $.ajax ({
            url: 'modifyproduct.php',
            type: 'GET',
            data: {
                location: location,
                itemid: itemid,
                count: count,
            },
                
            success: function(serverResponse) {
                    $('#'+itemid).hide();
                    $('#'+itemid).html(count).delay(170);
                    $('#'+itemid).fadeIn();
            }
                
        });
    });
    
    // Select inventory location to be displayed from .location_select menu
    $('.location_select').click(function(){
        location = $(this).attr('title');
        $('.default_location').empty();
        $('.default_location').append(location);
        $.ajax ({
            url: 'display.php',
            type: 'GET',
            data: {
                location: location,
            },
            
            success: function(serverResponse) {
                $('#display_inventory').fadeOut('slow');
                $('#display_inventory').empty();
                $('#display_inventory').hide();
                $('#display_inventory').append(serverResponse);
                $('#display_inventory').fadeIn('slow');
    
                $('.glyphicon-plus').click(function() {
                    event.preventDefault();
                    this_item = $(this).attr('title');
                    itemid = this_item.substr(0, this_item.length - 1);
                    count = parseInt($('#'+itemid).text());
                    count++;
                    
                    $.ajax ({
                        url: 'modifyproduct.php',
                        type: 'GET',
                        data: {
                            location: location,
                            itemid: itemid,
                            count: count,
                        },
                            
                        success: function(serverResponse) {
                                $('#'+itemid).hide();
                                $('#'+itemid).html(count).delay(170);
                                $('#'+itemid).fadeIn();
                        }
                            
                    });
                });
                
                $('.glyphicon-minus').click(function() {
                    event.preventDefault();
                    this_item = $(this).attr('title');
                    itemid = this_item.substr(0, this_item.length - 1);
                    count = parseInt($('#'+itemid).text());
                    count--;
                    
                    $.ajax ({
                        url: 'modifyproduct.php',
                        type: 'GET',
                        data: {
                            location: location,
                            itemid: itemid,
                            count: count,
                        },
                            
                        success: function(serverResponse) {
                                $('#'+itemid).hide();
                                $('#'+itemid).html(count).delay(170);
                                $('#'+itemid).fadeIn();
                        }
                            
                    });
                });
                
            }
        })
    });
});
