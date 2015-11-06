jQuery(document).ready(function() {  

    var stickyNavTop = jQuery('.menu').offset().top;  
      
    var stickyNav = function(){  
    var scrollTop = jQuery(window).scrollTop();  
           
    if (scrollTop > stickyNavTop) {   
        jQuery('.menu').addClass('sticky');  
    } else {  
        jQuery('.menu').removeClass('sticky');   
    }  
    };

    if (jQuery(window).width() < 600) {

         stickyNav();  

        jQuery(window).scroll(function() {  
            stickyNav();  
        }); 
    }
    else {
       
    }

    //terrains
    jQuery('.table_infos td:nth-child(5)').css('color','#d50409');
    jQuery('.table_infos td:nth-child(5)').css('font-weight','bold');

    jQuery("#map_canvas").gmap3({
      map:{
        options:{
          center:[46.8323359,-71.1919038],
           maxZoom:15,
           scrollwheel: false
        }
      },
      marker:{
        values:[
                {address:'Allen-Neil, Stoneham-et-Tewkesbury', data:'Allen-Neil, Stoneham-et-Tewkesbury'},
                {address:'Thomas-Griffin, Stoneham-et-Tewkesbury', data:'Thomas-Griffin, Stoneham-et-Tewkesbury'},
                {address:'Boisé Georges Muir, St-Émile', data:'Boisé Georges Muir'},
                {address:'rue Alliance, St-Émile', data:'rue Alliance'},
                {address:'rue des sables, Sainte-Catherine-De-La-Jacques-Cartier', data:'rue des sables'},
                {address:'rue antoine berton, Beauport', data:'rue antoine berton'},
                {address:'rue des caboteurs, Saint-Nicolas, G6X 3L9', data:'rue des caboteurs'}
                
                
        ],      
        options:{
          draggable: false
        },
        events:{
          mouseover: function(marker, event, context){
            var map = jQuery(this).gmap3("get"),
              infowindow = jQuery(this).gmap3({get:{name:"infowindow"}});
            if (infowindow){
              infowindow.open(map, marker);
              infowindow.setContent(context.data);
            } else {
              jQuery(this).gmap3({
                infowindow:{
                  anchor:marker, 
                  options:{content: context.data}
                }
              });
            }
          },
          mouseout: function(){
            var infowindow = jQuery(this).gmap3({get:{name:"infowindow"}});
            if (infowindow){
              infowindow.close();
            }
          }
        }
      }
    },"autofit");
    

 



});
