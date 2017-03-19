window.onload = function(){
  beans = document.getElementsByClassName("bean");
  //console.log("# of beans: " + beans.length);

  for (i = 0; i < beans.length; i++){
    beans[i].onclick = function(){
      if (this.style.cssFloat == "left") {
        this.style.cssFloat = "right";
      } else {
        this.style.cssFloat = "left";
      }
    }
  }
}
