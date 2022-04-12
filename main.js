function newblog(e,type){
    var myblog = document.getElementById("newblog");
   if (type == "newone") {
       myblog.classList.replace("d-none","d-block");
   } 
   e.classList.add("active");
}
