//const { parse } = require("postcss");

$( function() {
    var selectandsort=$('.sortable-option');
    
    selectandsort.each( function(ik){
        var selected_options = $(this).data('selected-options');
        var all_options = $(this).data('options');
        var selectEl=$(this).find('.select2');
            selectEl.select2();
        var sortEl=$(this).find('ul.select2-selection__rendered');
            if (sortEl.length > 0) {
              console.log(sortEl);
              sortEl.sortable({
                containment: "parent",
                create: function( event, ui ) {
                  if (selected_options!=='') {
                    $.each(selected_options, function(i, el){ 
                      var title = all_options[el];
                      var original = $( 'option:contains(' + title + ')', selectEl ).filter(function() {return $(this).text() === title; }).first();
                      original.detach();
                      selectEl.append(original).trigger('change');
                    });
                  }
                },
                update: function( event, ui ) {
                 ui.item.parent().children('[title]').each(function () {
                    var title = $(this).attr('title');
                    var original = $( 'option:contains(' + title + ')', selectEl ).filter(function() {return $(this).text() === title; }).first();
                    original.detach();
                    selectEl.append(original)
                  });
                  selectEl.change();
                }
              });
            }
    });
    
    $('button.btn-tool').on('click', function(e){
        var action=$(this).data('feature-widget');
        var row=$(this).parents('.ui-sortable-handle');
        var sortable=$(this).parents('.sortable.ui-sortable');
        if (action=='add') {
          console.log(row);
          row.clone(true, true).appendTo( ".sortable" );
        }else if (action=='remove') {
          row.remove();
        } else {
          
        }
      });
    

    $(".sortable:not(.no-sort)").sortable({ 
      cursor: "move"
    }); 


    $('a.save-order-button').on('click',function(e){
      e.preventDefault();
        var sort_element=$(this).prev();
        var formdata=sort_element.sortable("toArray");
        var metadata=sort_element.data('metadata');
        var url=sort_element.data('url');

        $.ajax({
          type: 'post',
          url: url,
          data: {
            'formdata':formdata,
            'metadata':metadata,
          },
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          beforeSend: function(){
              $('#create_new').html('Please wait');
          },
          success: function(response){
              alert(response.success);
          },
          complete: function(response){
              $('#create_new').html('Create New');
          }
        });
    });

    // Publish button
    $('a.publish-button').on('click',function(e){
      e.preventDefault();
      var element=$(this);
        var formdata=element.data("value");
        var metadata=element.data('metadata');
        var url=element.data('url');
                    
        $.ajax({
          type: 'post',
          url: url,
          dataType : 'JSON',
          data: {
            'formdata':formdata,
            'metadata':metadata,
          },
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response){
              //alert(response.success);
            //console.log(response);
	        	if (response.message) {
	        		if (response.value==1) {
                console.log('response v 1');
		        		element.data('value',"0").removeClass('bg-danger').addClass('bg-success').find('i').removeClass('fa-times').addClass('fa-check');
              }
              if (response.value==0) {
                console.log('response v 0');
                element.data('value',"1").removeClass('bg-success').addClass('bg-danger').find('i').removeClass('fa-check').addClass('fa-times');
              }              
	        	}else{
              console.log('Ricord 0 :'+response.message);
            }
          }
        });
    });

      
  });  