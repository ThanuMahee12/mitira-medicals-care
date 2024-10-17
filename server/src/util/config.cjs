exports.module={
    PORT:process.env.BACKEND_PORT??8080,
Host:process.env.BACKEND_HOST??"localhost",
 fun_listen:(error)=>{
    if(error)
        console.error(`Exeption found when running the server ${error}`);
    console.log(`server running http://localhost:${PORT}`)
        
    }
}
