import * as mymodels from "./Mymodel.js";
$(document).ready(function () {
    //get system data from system.php
    $.ajax({
        type: "POST",
        data:{mydata:"System"},
        url: "Ayush.php",
        success: function (Ayush) {
            if(sessionStorage.getItem("Ayush")===null){
                    sessionStorage.setItem("Ayush",Ayush);
                }
         }
    });
    let Ayushobj=JSON.parse(sessionStorage.getItem("Ayush"));
    let System =mymodels.Systemset(Ayushobj.Title,Ayushobj.logo);
    System.setlogotitle();
    let csslinks=Ayushobj.css;
    let jslink=Ayushobj.js;
   for (const key in csslinks) {
        System.csslinks(csslinks[key],key);
   }
  for (const key in jslink) {
        let i=0;
        System.addscript(jslink[key],i++,key);
  }
});
