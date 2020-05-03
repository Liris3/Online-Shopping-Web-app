

let button = document.getElementsByClassName("shop");
//ajax get product info
for (let i =0 ;i<button.length; i++){
button[i].addEventListener("click", function() {
      // construct the url
        let url = "server/getshop.php";
        //get num and id
        let num = document.getElementsByClassName("sss")[i].value;
        let id = document.getElementsByClassName("id")[i].value;
        if (num == ''){ // num can't be null
            return ;  
        }
        let params="num="+num+"&id="+id;
        // do the fetch
        fetch(url, {
          method:'POST',
          credentials:'include',
          headers:{"Content-Type":"application/x-www-form-urlencoded"},
          body:params
        })
            .then(response => response.text())
            .then(success => {
                if(success==0){
                location.href='login.html'
                } 
            })
 })
}
 