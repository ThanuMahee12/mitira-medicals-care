const express = require('express')
const { PORT, fun_listen } = require('./Utils/config.cjs') // manage enviroment varible

const mithira_app = express()
mithira_app.listen(PORT, fun_listen)
