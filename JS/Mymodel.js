export const Systemset=(title,logo)=>{
    return{
    setlogotitle:()=>{
        document.title=title;
        let logotag=document.createElement("link");
        $(logotag).attr("rel", "shortcut icon");
        $(logotag).attr("href",logo);
        $(logotag).attr("type","image/x-icon");
        $(document.head).append(logotag);
        $(logotag).after(`<!--logo-->`);
    },
    csslinks:(href,comment)=>{
    let link=document.createElement("link");
    $(link).attr("rel", "stylesheet");
    $(link).attr("href",href);
    $(document.head).append(link);
    $(link).after(`<!--${comment}-->`);
    },
    addscript:(script,comment)=>{
        let next=document.getElementsByTagName("footer")[0];
        let modelscript=document.createElement("script");
        modelscript.setAttribute("src",script);
        modelscript.async=true
        $(next).before(modelscript);
        $(modelscript).after(`<!--${comment}-->`);
    }
}
}

