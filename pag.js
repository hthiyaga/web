$(document).ready(function(){

  $(document).on('click','.submit_code', function(e){ 

  var group_id = e.currentTarget.id;
  e.preventDefault();
  var content = $('textarea[name=code]').val();
  $.ajax({
    url:'comment.php',
    type: 'post',
    data:{ 'code':{'group_id':group_id, 'content':content}},
    dataType: 'text',
    success: function(data){
      var obj = JSON.parse(data);
      str="";
      console.log(data);
     obj['messages'].forEach(function(e){
           if(e['user_image']==""){
                
                $dp ="default.jpg";
                 }
                  else{
                       $dp =e['user_image'];
                       }

     
     
      str+= "<br>";
      
    
      str+= "<div id='dis"+e['post_id']+"' class='dis'>";
      str+= "<div>";
      str+= "<img width='40' height='40' src ='img/"+$dp+"' alt= 'ddp'>";
      str+= "</div><br>";
      str+= "<div id= 'posts' style='float:left;' >";
      str+= "<H6><a href='userprofile.php?'>"+ e['user_name']+"</a></H6>";
      str+= "</div>";
      str+= "<p id='tstamp' style='margin-left:100px;'>"+e['post_timestamp']+"</p>";
      str+= "<pre><code>"+e['code_content']+"</code></pre>";

      var post_id= e['post_id'];

      //userlike
       $.ajax({ 

        async:false,
        url:'comment.php',
        type: 'post',
        data:{ 'userLiked':post_id},
        dataType: 'text',
        success: function(data){ 
         
          var userLiked =  parseInt(data);

            if(e['archive_action'] != "archive")
            {
              if(userLiked == 1){ 
              str+=  "<i class='fa fa-thumbs-up like-btn' data-id="+ post_id + "></i>  ";
                  }
               else {
              str+= "<i class='fa fa-thumbs-o-up like-btn' data-id="+ post_id + "></i>";
        
                }
              
            }

            else {

                if(userLiked == 1){ 
                  str+=  "<i class='fa fa-thumbs-up'></i>  ";
                  }
               else {
                 str+= "<i class='fa fa-thumbs-o-up'></i>";
        
                }
            }
        

           }

            });
            str +="<span class='likes'>";
             $.ajax({ 

        async:false,
        url:'comment.php',
        type: 'post',
        data:{ 'getLikes':post_id},
        dataType: 'text',
        success: function(data){ 
            console.log(data);
                   
                   str += data;
           }

            });
            str +="</span>"
            str +="&nbsp;&nbsp;&nbsp;&nbsp;";
        //userdislike
        $.ajax({ 

        async:false,
        url:'comment.php',
        type: 'post',
        data:{ 'userDisliked':post_id},
        dataType: 'text',
        success: function(data){ 
           
          var userDisliked =  parseInt(data);

          if(e['archive_action'] != "archive"){
                if(userDisliked == 1){

                str+=  "<i class='fa fa-thumbs-down dislike-btn' data-id="+ post_id + "></i>  ";
              }

                    else{
           
                str+= "<i class='fa fa-thumbs-o-down dislike-btn' data-id="+ post_id + "></i>";
            
                 }

          }

          else{
                  if(userDisliked == 1){

                str+=  "<i class='fa fa-thumbs-down'></i>  ";
              }

                    else{
           
                str+= "<i class='fa fa-thumbs-o-down'></i>";
            
                 }

          }
         
          

           }

            });


            str +="<span class='dislikes'>";
             $.ajax({ 

        async:false,
        url:'comment.php',
        type: 'post',
        data:{ 'getDislikes':post_id},
        dataType: 'text',
        success: function(data){ 
            console.log(data);
                   
                   str += data;
           }

            });
            str +="</span>"
            str +="&nbsp;&nbsp;&nbsp;&nbsp;";

      //before closing
      str+="</div>";
      str+= "<br>";
      

    });
      
      $('#posts').prepend(str);
      $('textarea[name=content]').val('');







    }

  });
     
    
});


//upload image to posts

  $(".form").on('submit', function(e){ 

  var group_id = e.currentTarget.id;
  e.preventDefault();
  
  $.ajax({
    url:'comment.php',
    type: 'post',
    data: new FormData(this),
    dataType: 'text',
    success: function(data){
      var obj = JSON.parse(data);
      str="";
      console.log(data);
     obj['messages'].forEach(function(e){
           if(e['user_image']==""){
                
                $dp ="default.jpg";
                 }
                  else{
                       $dp =e['user_image'];
                       }

     
     
      str+= "<br>";
      
    
      str+= "<div id='dis"+e['post_id']+"' class='dis'>";
      str+= "<div>";
      str+= "<img width='40' height='40' src ='img/"+$dp+"' alt= 'ddp'>";
      str+= "</div><br>";
      str+= "<div id= 'posts' style='float:left;' >";
      str+= "<H6><a href='userprofile.php?'>"+ e['user_name']+"</a></H6>";
      str+= "</div>";
      str+= "<p id='tstamp' style='margin-left:100px;'>"+e['post_timestamp']+"</p>";
      str+= "<pre><code>"+e['code_content']+"</code></pre>";

      var post_id= e['post_id'];

      //userlike
       $.ajax({ 

        async:false,
        url:'comment.php',
        type: 'post',
        data:{ 'userLiked':post_id},
        dataType: 'text',
        success: function(data){ 
         
          var userLiked =  parseInt(data);

            if(e['archive_action'] != "archive")
            {
              if(userLiked == 1){ 
              str+=  "<i class='fa fa-thumbs-up like-btn' data-id="+ post_id + "></i>  ";
                  }
               else {
              str+= "<i class='fa fa-thumbs-o-up like-btn' data-id="+ post_id + "></i>";
        
                }
              
            }

            else {

                if(userLiked == 1){ 
                  str+=  "<i class='fa fa-thumbs-up'></i>  ";
                  }
               else {
                 str+= "<i class='fa fa-thumbs-o-up'></i>";
        
                }
            }
        

           }

            });
            str +="<span class='likes'>";
             $.ajax({ 

        async:false,
        url:'comment.php',
        type: 'post',
        data:{ 'getLikes':post_id},
        dataType: 'text',
        success: function(data){ 
            console.log(data);
                   
                   str += data;
           }

            });
            str +="</span>"
            str +="&nbsp;&nbsp;&nbsp;&nbsp;";
        //userdislike
        $.ajax({ 

        async:false,
        url:'comment.php',
        type: 'post',
        data:{ 'userDisliked':post_id},
        dataType: 'text',
        success: function(data){ 
           
          var userDisliked =  parseInt(data);

          if(e['archive_action'] != "archive"){
                if(userDisliked == 1){

                str+=  "<i class='fa fa-thumbs-down dislike-btn' data-id="+ post_id + "></i>  ";
              }

                    else{
           
                str+= "<i class='fa fa-thumbs-o-down dislike-btn' data-id="+ post_id + "></i>";
            
                 }

          }

          else{
                  if(userDisliked == 1){

                str+=  "<i class='fa fa-thumbs-down'></i>  ";
              }

                    else{
           
                str+= "<i class='fa fa-thumbs-o-down'></i>";
            
                 }

          }
         
          

           }

            });


            str +="<span class='dislikes'>";
             $.ajax({ 

        async:false,
        url:'comment.php',
        type: 'post',
        data:{ 'getDislikes':post_id},
        dataType: 'text',
        success: function(data){ 
            console.log(data);
                   
                   str += data;
           }

            });
            str +="</span>"
            str +="&nbsp;&nbsp;&nbsp;&nbsp;";

      //before closing
      str+="</div>";
      str+= "<br>";
      

    });
      
      $('#posts').prepend(str);
      $('textarea[name=content]').val('');







    }

  });
     
    
});

	});