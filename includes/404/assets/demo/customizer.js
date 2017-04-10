var Customizer = {};

(function($){
    
    Customizer.controls = {};
    
    Customizer.init = function()
    {
        var $panel = $('#customize-panel'),
            $cog   = $('#customize-panel .cog');
        
        $.each(Customizer.controls, function(id, params){
            var $control = $('<div>').addClass('color-picker'),
                $title   = $('<div>').addClass('control-title').text(params.title),
                $style   = $('<style>'),
                css      = '';
            
            $panel.append($title,$control);
            $('body').append($style);
            
            ColorPicker($control[0], function(hex, hsv, rgb) {
                $.each(params.settings, function(index, value){
                    css += value.selector+" {"+value.property+":"+hex+"}\n";
                });
                $style.html(css);
            });
        });
        
        $cog.click(function(){
            $panel.toggleClass('visible');
        });
    };
    
    Customizer.addControl = function( id, title, defaultVal )
    {
        Customizer.controls[id] = {
            title: title, 
            value: defaultVal,
            settings: []
        };
    };
    
    Customizer.bindSetting = function( id, selector, property)
    {
        Customizer.controls[id].settings.push({
            selector: selector, 
            property: property
        });
    };
    
}(jQuery));
