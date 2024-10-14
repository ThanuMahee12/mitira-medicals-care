import React from 'react'
import { Button, Container} from 'react-bootstrap';
import { useRouteError } from 'react-router-dom';
import BackButton from '../components/BackButton';

function NotFound(){
const error=useRouteError()
console.error(error);
const [code1,code2,code3]=error?.status?.toString()?.split("")
    return (
        <>
        <Container fluid className='d-flex justify-content-center align-items-center min-vh-100 position-relative'>
            <BackButton/>
            <Container className='w-50 text-center text-capitalize'>
                
                <h1 className='font-weight-bold'>
                    <span>{code1}</span>
                    <span>{code2}</span>
                    <span>{code3}</span>
                </h1>
                <h1>{error?.statusText}</h1>
           <Button className='font-weight-bold' href='/mithira/home'> Home</Button>
            </Container>
        </Container>
       
        </>
        
    )
}

export default NotFound
