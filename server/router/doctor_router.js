import express from 'express'
const doctor_router=express.Router()

doctor_router.get("/",(req,res)=>{
    res.status(200).json([32323,23232,232,323,23,23,2,3,23,2])
})
doctor_router.post("/",(req,res)=>{
    res.status(200).json("Thanush")
})
doctor_router.put("/",(req,res)=>{
    res.status(200).json("Thanush")
})

export default doctor_router