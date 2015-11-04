$(function(){

    $( ".wrap-galerie" ).sortable();
    $( ".wrap-galerie" ).disableSelection();
    $('.dropfile.photo').dropfile();
    $('.dropfile.pdf').dropfile();
    $('.dropfile.galerie').dropfile();

    var imgdrop = $('.dropfile img');
    var area = $('.dropfile');

    if(imgdrop.length > 0)
    {
        $.each( imgdrop, function() {
            $(this).next().css('display', 'block');
        });
    }

    $('.input_wrapper').on('click', '.remove', function(){
        var area = $(this).parent().parent();
        var drop = area.find('.dropfile');
        area.find('img').remove();
        area.find('input').val("");
        area.find('.upload-name').html('');
        area.find('.nom_image').html('');
        $(this).css('display', 'none');
        
        if(drop.hasClass('galerie'))
        {
            area.remove();
        }

    });

    $('#addGaleries').submit(function(e){
        e.preventDefault();
        var projet_id = $('#projet_id').val();
        var url = "http://localhost:8765/admin/galeries/addGaleries"
        var galArray = [];
        var i = 1;
        
        $('.gal').each(function(){
                var value = $(this).val();
                galArray.push({'projet_id' : projet_id, 'nom' : value, 'order_image' : i});
                i++
        });
        
        $.ajax({
            type: "post",       
            url: url,
            data: { 'projet_id' : projet_id, 'galerie' : galArray }, 
            dataType: "json",  
            success: function(data){
                
                console.log(data);              
                $('.flash').html(data.msg).show();
                setTimeout(function() {
                    $('.flash').hide()
                }, 4000); 
            },
            error : function(data) {
                
                console.log(data);               
                $('.flash').html(data.msg).show();
                setTimeout(function() {
                    $('.flash').hide()
                }, 4000);
            }

        });
       
    });

    $('.caract-content .ajouter_champ').click(function(){

        var row = $('.wrap-row-caract').find('.row.caract');
        if(row.length > 0)
        {
            var index = $('.row.caract').last().index() + 2;
        }
        else
        {
            var index = 1;
        }

       $('.wrap-row-caract').append('<div class="row caract">' +
                                    '<label>Caractéristique - ' + index + '</label>' +
                                    '<div class="inputs">' +
                                        '<span class="input_wrapper">' +
                                            '<input name="nom[]" type="text" class="text input-caract" />' +
                                        '</span>' +
                                    '</div>' +
                                '</div>');
    });

    $('.html-content .delete_champ').click(function(){

        $('.row.contenu').last().remove();

        

    });

    $('.html-content .ajouter_champ').click(function(){

        var row = $('.wrap-row-contenu').find('.row.contenu');
        if(row.length > 0)
        {
            var index = $('.row.contenu').last().index() + 2;
        }
        else
        {
            var index = 1;
        }

       $('.wrap-row-contenu').append('<div class="row contenu">' +
                                    '<label>Contenu Html - ' + index + '</label>' +
                                    '<div class="inputs">' +
                                        '<div class="textarea_wrapper">' +
                                            '<textarea name="contenu[]" row="10" cols="80" id="contenu-html"></textarea>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>');

    });

    $('.caract-content .delete_champ').click(function(){

        $('.row.caract').last().remove();

        

    });




    

    // $('.filetree').fileTree({
    //         root: '/some/folder/',
    //         script: 'jqueryFileTree.asp',
    //         expandSpeed: 1000,
    //         collapseSpeed: 1000,
    //         multiFolder: false
    //     }, function(file) {
    //         $('#path').val(file);
    // });

    $('select').fancySelect();

    $(".colorbox").colorbox();
    $(".colorboxiframed").colorbox({
        iframe:true,
        width:'800px',
        height:'500px'
    });

    $(".colorboxiframedlarge").colorbox({
        iframe:true,
        width:'1100',
        height:'600px'
    });

    $(".cb-enable").click(function(){
        var parent = $(this).parents('.switch');
        $('.cb-disable',parent).removeClass('selected');
        $(this).addClass('selected');
        $('.checkbox',parent).attr('checked', true);
    });
    $(".cb-disable").click(function(){
        var parent = $(this).parents('.switch');
        $('.cb-enable',parent).removeClass('selected');
        $(this).addClass('selected');
        $('.checkbox',parent).attr('checked', false);
    });
    
    $('.relcheckbox').click(function() {
        if ($(this).attr('checked')) {
            $(this).parent().css('border-style','dashed');
            $(this).parent().css('border-width','2px');
            $(this).parent().css('border-color','#007fd8');
            $(this).parent().css('font-weight','bold');
            $(this).parent().css('color','#007fd8');
            
        }else{
            $(this).parent().css('border-style','solid');
            $(this).parent().css('border-width','1px');
            $(this).parent().css('font-weight','normal');
            $(this).parent().css('color','#4d4d4d');
            $(this).parent().css('border-color','#cecece');     
        }
    });

    $('.date').datepicker({
        dateFormat: 'yy-mm-dd',
        dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
        dayNamesMin: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
        monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre']
    });
    
    $(".slider-range").slider({
            min: 0,
            max: 5,
            slide: function(event, ui) {
                $("#"+this.id).val(ui.value);
                $("#ammount"+this.id).html(ui.value);
            }
    });
    
        
    $("#selectable").selectable({
        stop: function(){
            var result = $("#select-result").empty();
            $(".ui-selected", this).each(function(){
                var index = $("#selectable li").index(this);
                result.append(" #" + (index + 1));
            });
        }
    });
    
    $("#progressbar").progressbar({
            value: 59
        });

    $('.mainmenu').click(function() {
        //alert($(this).attr('showsousmenu'))
        var obj = $(this).attr('showsousmenu');
        $(".sousmenu").fadeOut("fast");
        $("#"+obj).fadeIn("fast");
        $(".mainmenu").removeClass("selected_lk");
        $(this).addClass("selected_lk");

    }); 

    $('.deleteselected').click(function(){

        var isGood = confirm('Voulez-vous vraiment supprimer la ou les régions sélectionnées ?');
        if(isGood == true)
        {
            $('#delForm').submit();
        }
    });

    $('span.oui.terrain').click(function(){

        $('#check-terrain').val('oui');

    });

    $('span.non.terrain').click(function(){

        $('#check-terrain').val('non');

    });

    $('span.oui.presentation').click(function(){

        $('#check-presentation').val('oui');

    });

    $('span.non.presentation').click(function(){

        $('#check-presentation').val('non');

    });

    $('span.oui.vendu').click(function(){

        $('#check-vendu').val('vendu');

    });

    $('span.non.vendu').click(function(){

        $('#check-vendu').val('à vendre');

    });

    

    if($('#check-terrain').val() == 'oui')
    {
        $('.cb-enable.terrain').addClass('selected');
        $('.cb-disable.terrain').removeClass('selected');
        
    }

    if($('#check-terrain').val() == 'non')
    {
        $('.cb-disable.terrain').addClass('selected');
        $('.cb-enable.terrain').removeClass('selected');
        
    }

    if($('#check-presentation').val() == 'oui')
    {
        $('.cb-enable.presentation').addClass('selected');
        $('.cb-disable.presentation').removeClass('selected');
        
    }

    if($('#check-presentation').val() == 'non')
    {
        $('.cb-disable.presentation').addClass('selected');
        $('.cb-enable.presentation').removeClass('selected');
        
    }

    if($('#check-vendu').val() == 'Vendu')
    {
        $('.cb-enable.vendu').addClass('selected');
        $('.cb-disable.vendu').removeClass('selected');
        
    }

    if($('#check-vendu').val() == 'À vendre')
    {
        $('.cb-disable.vendu').addClass('selected');
        $('.cb-enable.vendu').removeClass('selected');
        
    }

    $( ".region_id .options li" ).click(function( event ) {

        var option = $(this).data('raw-value');
        $('#region_id').val(option);
        
        
    });

    $( ".region .options li" ).click(function( event ) {

        var option = $(this).data('raw-value');
        $('#region_id').val(option);
        
        
    });

    $( ".dossier .options li" ).click(function( event ) {

        var option = $(this).data('raw-value');
        $('#dossier_image').val(option);
        
        
    });

    

       

    
});