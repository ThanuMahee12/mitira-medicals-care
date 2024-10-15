import express from 'express'
import user_router from './user_router.js'
import doctor_router from './doctor_router.js'
import admin_router from './admin_router.js'
const router=express.Router()

router.use("/users",user_router)
router.use("/doctors",doctor_router)
router.use("/admins",admin_router)


export default router