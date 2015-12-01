jQuery(document).ready(function(){
    jQuery('.panel.entry-content:not(:first)').hide();
    jQuery('.tabs li a').click(function(){	
        jQuery('.tabs li a').removeClass('active');
        jQuery(this).addClass('active');
        jQuery('.panel.entry-content').hide();  
        var activeTab = jQuery(this).attr('href');
        jQuery(activeTab).fadeIn();
        return false;
    });
    
})