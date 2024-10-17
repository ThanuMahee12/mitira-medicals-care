const express=require("express")
const { PORT, fun_listen } = require("./util/config.js") // manage enviroment varible 

const mithira_app=express()
mithira_app.listen(PORT,fun_listen)