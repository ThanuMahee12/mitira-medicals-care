import express from 'express'
const admin_router=express.Router()

admin_router.get("/",(req,res)=>{
    res.status(200).json([32323,23232,232,323,23,23,2,3,23,2])
})


export default admin_router