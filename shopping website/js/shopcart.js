
window.addEventListener("load", function() { 

  let url = 'server/shopcart.php';
  fetch(url, {
          method:'POST',
          credentials:'include',
          headers:{"Content-Type":"application/x-www-form-urlencoded"},
        })
      .then(response => response.text())
      .then(success)
})
  

  function toHtml(data){
  let html =' <div class="items" id = "del'+data.id+'">'
  html +=' <div class="buttons" onclick="del('+data.id+')">'
      html +='<span class="delete-btn" ></span>'
    html += '</div>'
    html +='<div class="image">'
      html +='<img src="img/'+data.img+'" alt="" height="80px";width="80px"  />'
    html +='</div>'
 
    html +='<div class="description">'
      html +='<span>'+data.item_name+'</span>'
    html +='</div>'
 
    html +='<div class="quantity">'
      html +='<button class="plus-btn" type="button" name="button">'
        html +='<i onclick="add('+data.id+')">+</i>'
      html +='</button>'
      html +='<input type="text"  name="name" id="val'+data.id+'" onchange="changenum('+data.id+')" value="'+data.quantity+'">'
      html +='<button class="minus-btn" type="button" name="button">'
        html +='<i onclick="reduce('+data.id+')" >-</i>'
      html +='</button>'
    html +='</div>'
    html +='<input type=hidden id="hidval'+data.id+'" value="'+data.price+'">'
    html +='<div class="total-price" id ="price'+data.id+'">$'+data.quantity*data.price+'</div>'
    html +='</div>'    
     return html;
  }
   function success(users) {
    
        let shops = "";
         let arr = JSON.parse(users)
        for (let i = 0; i < arr.length; i++) {
            shops += toHtml(arr[i]);
        }

        document.getElementById("shop").innerHTML = shops;
    }
  
 function del(id){

      let url = 'server/delshop.php';
       let params="id="+id;
      fetch(url, {
          method:'POST',
          credentials:'include',
          headers:{"Content-Type":"application/x-www-form-urlencoded"},
          body:params
        })
      .then(response => response.text())
      .then(fnew(id))
  }  
  function fnew(id) {  
  
    let newid =  document.getElementById('del'+id)
   newid.parentNode.removeChild(newid);
  }



  function add(id){
    let url = 'server/add.php';
       let params="id="+id;
      fetch(url, {
          method:'POST',
          credentials:'include',
          headers:{"Content-Type":"application/x-www-form-urlencoded"},
          body:params
        })
      .then(response => response.text())
      .then(addquantity(id))
  }

   function addquantity(id) {  
  document.getElementById('val'+id).value = Number(document.getElementById('val'+id).value)+1;
  document.getElementById('price'+id).innerHTML = '$'+document.getElementById('val'+id).value*document.getElementById('hidval'+id).value
  }

    function reduce(id){
      let value = document.getElementById('val'+id).value;
      if(value<=1){
        return ;
      }
        let url = 'server/reduce.php';
       let params="id="+id;
      fetch(url, {
          method:'POST',
          credentials:'include',
          headers:{"Content-Type":"application/x-www-form-urlencoded"},
          body:params
        })
      .then(response => response.text())
      .then(reducequantity(id))
    }

   function reducequantity(id) {  
  document.getElementById('val'+id).value = Number(document.getElementById('val'+id).value)-1;
  document.getElementById('price'+id).innerHTML = '$'+document.getElementById('val'+id).value*document.getElementById('hidval'+id).value
  }


  function changenum(id){

    let changeval =  document.getElementById('val'+id).value;
      if(changeval<=1){
        return ;
      }
    changeval=changeval.replace(/\D/g,'');
      let url = 'server/changenum.php';
       let params="id="+id+"&num="+changeval;
      fetch(url, {
          method:'POST',
          credentials:'include',
          headers:{"Content-Type":"application/x-www-form-urlencoded"},
          body:params
        })
      .then(response => response.text())
      .then(changeprice(id))

  }


   function changeprice(id) {  
  document.getElementById('val'+id).value = Number(document.getElementById('val'+id).value);
  document.getElementById('price'+id).innerHTML = '$'+document.getElementById('val'+id).value*document.getElementById('hidval'+id).value
  }


  