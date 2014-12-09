<?php

    /**
     *	Ace plugin
     *
     *	@package Monstra
     *  @subpackage Plugins
     *	@author MonstraHost
     *	@version 1.0a
     *
     */


    // Register plugin
    Plugin::register( __FILE__,                    
                    __('Ace'),
                    __('Ace editor from cloud9.io'),  
                    '1.0a',
                    'MonstraHost',                 
                    'http://monstrahost.com/');


   // Add hooks
Action::add('admin_header', 'Ace::headers');

/**
 * Ace Class
 */
class Ace
{
    /**
     * Set editor headers
     */
    public static function headers()
    {
        
        echo ('
            <!-- add Ace -->
            <script src="/plugins/ace/src-min/ace.js"></script>
             ');

        echo ('<script>
				    // Hook up ACE editor to all textareas with .source-editor attribute
				    $(function () {	
				    
				    				    
				    
				    
				    
				        $(".source-editor").each(function () {
				            var textarea = $(this);
				            
				            				    		
				    		var findMode = $(".input-group-addon").html();
				    		
				    		if ( findMode == ".chunk.php" || ".template.php" ){
								var editMode = "php";
								};
							if ( findMode == ".js" ) {
								var editMode = "javascript";
								};
							if ( findMode == ".css" ) {
								var editMode = "css";
								};
							
				
							
				            var mode = textarea.data("editor");
				
				            var editDiv = $("<div>", {
				                position: "absolute",
				                width: textarea.width(),
				                height: textarea.height(),
				                "class": textarea.attr("class")
				            }).insertBefore(textarea);
				
				            //textarea.css("visibility", "hidden");
							textarea.css("display", "none");
							
				            var editor = ace.edit(editDiv[0]);
				            editor.renderer.setShowGutter(true);
				            editor.getSession().setValue(textarea.val());
				            editor.getSession().setMode("ace/mode/"+editMode);
				            editor.setTheme("ace/theme/clouds");
				            
				            // copy back to textarea on form submit...
				            textarea.closest("form").submit(function () {
				                textarea.val(editor.getSession().getValue());
				            })
				
				        });
				    });
				</script>
			  ');
    }

}
