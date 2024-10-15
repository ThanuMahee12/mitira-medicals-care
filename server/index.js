import express from 'express'
import router from './router/router.js'
import logger from './util/logger.js'


const PORT=process.env.BACKEND_PORT??8000
const App=express()
App.use(express.json())



App.use(logger);

App.use("/mitira-api",router)


App.listen(PORT,(err)=>{
    if(err) console.error(err)
    if (process.env.NODE_ENV === 'development') {
     console.log(`application start on ${PORT} you can access "http://localhost:${PORT}/"`)
      }
})