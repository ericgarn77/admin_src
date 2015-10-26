(function($){

    var o = {
        message : 'Drag and Drop',
        clone : true,
        scriptIMG : 'http://localhost:8765/admin/projets/uploadImage',
        scriptPDF : 'http://localhost:8765/admin/projets/uploadPDF',
        scriptGAL : 'http://localhost:8765/admin/galeries/uploadGalerie'
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
            var input = area.find('#plan_pdf');
            var par = area.parent().find('.upload-name');
            var remove = area.find('.remove');
            if(img.length == 1 && par.length == 1)
            {
                img.remove();
                par.html('');
                area.append(json.img);
                par.html(json.name);
                input.val(json.name);
            
            }
            else
            {
                area.append(json.img);
                par.html(json.name);
                input.val(json.name);
                remove.css('display', 'block');
                
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
        var dossier = $('#dossier_image').val();
        
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
            var input = area.find('#image');
            var par = area.parent().find('.upload-name');
            var remove = area.find('.remove');
            if(img.length == 1 && par.length == 1)
            {
                img.remove();
                par.html('');
                area.append(json.img);
                par.html(json.name);
                input.val(json.name);

            }
            else
            {
                area.append(json.img);
                par.html(json.name);
                input.val(json.name);
                remove.css('display', 'block');
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

    //////////////////////////
    //
    //FONCTION UPLOAD D'UNE GALERIE d'IMAGE
    //
    //////////////////////////

    function uploadGalerie(files,area,index){
        var file = files[index];
        console.log(file.name);
        var xhr = new XMLHttpRequest();
        var progress = area.find('.progress');
        var dossier = $('#dossier_image').val();
        
        // Evenement
        xhr.addEventListener('load', function(e){
            var json = jQuery.parseJSON(e.target.responseText);
            var img = area.find('img');
            var input = area.find('#image');
            var par = area.find('.upload-name');
            var remove = area.find('.remove');
            var dropfileArea = area.find('.dropfile');
            dropfileArea.removeClass('hover');
            progress.css('height', 0).html('');
            
            if(index < files.length-1)
            {
                uploadGalerie(files,area,index+1);
            }
            
            if(json.error)
            {
                alert(json.error);
                return false;
            }
            
            if(o.clone)
            {
                var cloneArea = area.clone();
                cloneArea.find('.instruction').remove();
                cloneArea.find('.progress').remove();
                cloneArea.insertAfter(area).find('.dropfile').dropfile(o);
            }
            
            dropfileArea.append(json.img);
            par.html(json.name);
            input.val(json.name);
            remove.css('display', 'block');
            
        },false);
        xhr.upload.addEventListener('progress', function(e){
            if(e.lengthComputable)
            {
                var perc = (Math.round(e.loaded/e.total) * 100)+ '%';
                progress.css('height', perc).html(perc);
                console.log(perc);
            }
        },false);


        xhr.open('post', o.scriptGAL, true);
        xhr.setRequestHeader('x-file-type', file.type);
        xhr.setRequestHeader('x-file-size', file.size);
        xhr.setRequestHeader('x-file-name', file.name);
        xhr.setRequestHeader('x-file-dossier', dossier);
        for(var i in area.data())
        {
            if(typeof area.data(i) !== 'object')
            {
                xhr.setRequestHeader('x-param-'+i, area.data(i));
            }
        }
        xhr.send(file);
    }

    $.fn.dropfile = function(oo){
        if(oo) $.extend(o,oo);
        this.each(function(){
            $('<span class="instruction">').append(o.message).appendTo(this);
            $('<span>').addClass('progress').appendTo(this);
            $(this).bind({
                dragenter : function(e){
                    e.preventDefault();
                    
                },
                dragover : function(e){
                    $(this).addClass('hover');
                    e.preventDefault();
                    
                   
                },
                dragleave : function(e){
                    $(this).removeClass('hover');
                    e.preventDefault();
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
                else if($(this).hasClass('galerie'))
                {
                    var files = e.dataTransfer.files;
                    uploadGalerie(files,$(this).parent(),0);
                }
            }, false);
        });

    }

})(jQuery);