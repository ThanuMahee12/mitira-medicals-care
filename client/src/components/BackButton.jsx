import React,{useCallback,memo} from 'react'
import { Button } from 'react-bootstrap'
import { BsArrowLeftCircleFill } from "react-icons/bs";
function BackButton() {
    const on_go_back=useCallback(()=>window.history.back(),[])
    return (
        <div className='position-absolute top-0 start-0 p-2'>
   <Button onClick={on_go_back} className='p-2 rounded rounded-circle d-flex justify-content-center align-items-center'>
            <BsArrowLeftCircleFill size={25} />
        </Button>
        </div>
     
    )
}

export default memo(BackButton)
