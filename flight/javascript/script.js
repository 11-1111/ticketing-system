function select_items(){
  var x =document.getElementById("item").value; 
 //var y =document.getElememtById("items").value;
  $.ajax({
   url:"showmobile.php",
   method:"POST",
   data:{
     id : x
    // id : y
   },
   success:function(data){
     $("#ans").html(data);
   }
  })

}