(function($){

    var o = {
        message : 'Drag and Drop',
        scriptIMG : 'uploadImage',
        scriptPDF : 'uploadPDF'
    }

    //////////////////////////
    //
    //FONCTION UPLOAD PDF
    //
    //////////////////////////

    function uploadPDF(files,area,index){
        var file = files[index];
        console.log(file.name);
        var xhr = new XMLHttpRequest();
        var progress = area.find('.progress');
        
        
        // Evenement
        xhr.addEventListener('load', function(e){
            var json = jQuery.parseJSON(e.target.responseText);
            area.removeClass('hover');
            progress.css('height', 0).html('');
            if(json.error)
            {
                alert(json.error);
                return false;
            }
            var img = area.find('img');
            var input = area.find('input');
            if(img.length == 1 && input.length == 1)
            {
                img.remove();
                input.remove();
                area.append(json.img);
                area.append(json.input);

            }
            else
            {
                area.append(json.img);
                area.append(json.input);
            }
            
        },false);
        xhr.upload.addEventListener('progress', function(e){
            if(e.lengthComputable)
            {
                var perc = (Math.round(e.loaded/e.total) * 100)+ '%';
                progress.css('height', perc).html(perc);
                console.log(perc);
            }
        },false);


        xhr.open('post', o.scriptPDF, true);
        xhr.setRequestHeader('x-file-type', file.type);
        xhr.setRequestHeader('x-file-size', file.size);
        xhr.setRequestHeader('x-file-name', file.name);
        xhr.send(file);
    }

    //////////////////////////
    //
    //FONCTION UPLOAD D'IMAGE
    //
    //////////////////////////

    function uploadImage(files,area,index){
        var file = files[index];
        console.log(file.name);
        var xhr = new XMLHttpRequest();
        var progress = area.find('.progress');
        var dossier = $('#dossier').val();
        
        // Evenement
        xhr.addEventListener('load', function(e){
            var json = jQuery.parseJSON(e.target.responseText);
            area.removeClass('hover');
            progress.css('height', 0).html('');
            if(json.error)
            {
                alert(json.error);
                return false;
            }
            var img = area.find('img');
            var input = area.find('input');
            if(img.length == 1 && input.length == 1)
            {
                img.remove();
                input.remove();
                area.append(json.img);
                area.append(json.input);

            }
            else
            {
                area.append(json.img);
                area.append(json.input);
            }
            
        },false);
        xhr.upload.addEventListener('progress', function(e){
            if(e.lengthComputable)
            {
                var perc = (Math.round(e.loaded/e.total) * 100)+ '%';
                progress.css('height', perc).html(perc);
                console.log(perc);
            }
        },false);


        xhr.open('post', o.scriptIMG, true);
        xhr.setRequestHeader('x-file-type', file.type);
        xhr.setRequestHeader('x-file-size', file.size);
        xhr.setRequestHeader('x-file-name', file.name);
        xhr.setRequestHeader('x-file-dossier', dossier);
        xhr.send(file);
    }

    $.fn.dropfile = function(oo){
        if(oo) $.extend(o,oo);
        this.each(function(){
            $('<span>').append(o.message).appendTo(this);
            $('<span>').addClass('progress').appendTo(this);
            $(this).bind({
                dragenter : function(e){
                    e.preventDefault();
                },
                dragover : function(e){
                    e.preventDefault();
                    $(this).addClass('hover');
                },
                dragleave : function(e){
                    e.preventDefault();
                    $(this).removeClass('hover');
                }
            });
            this.addEventListener('drop', function(e){
                e.preventDefault();
                if($(this).hasClass('photo'))
                {
                    var files = e.dataTransfer.files;
                    uploadImage(files,$(this),0);
                }
                else if($(this).hasClass('pdf'))
                {
                    var files = e.dataTransfer.files;
                    uploadPDF(files,$(this),0);
                }
            }, false);
        });

    }

})(jQuery);