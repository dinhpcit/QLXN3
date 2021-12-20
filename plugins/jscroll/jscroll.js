$(document).ready(function() {
    var $item = $('button.mitem'), //Cache your DOM selector
        visible = 2, //Set the number of items that will be visible
        index = 0, //Starting index
        endIndex = ( $item.length / visible ) - 1; //End index
    
    $('div#marrowR').click(function(){
        if(index < endIndex ){
          index++;
          $item.animate({'left':'-=100px'});
        }
    });
    
    $('div#marrowL').click(function(){
        if(index > 0){
          index--;            
          $item.animate({'left':'+=100px'});
        }
    });
});