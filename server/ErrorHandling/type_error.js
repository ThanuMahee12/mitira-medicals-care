export const error_array=(array,name)=>!Array.isArray(array) && TypeError(`${name} is Required Array Type`)

export const error_Integer=(num,name,min=0,max=Number.MAX_SAFE_INTEGER)=>{
    if(!Number.isInteger(num))
        throw TypeError(`${name} is Required Integer Type`)
if(num<min || num>max)
    throw RangeError(`${name} in insufficent Range`)    
}

export const error_Number=(num,name,min=0,max=Number.MAX_VALUE)=>{
    if(Number.isNaN(num))
        throw TypeError(`${name} is Required NumberType`)
if(num<min || num>max)
    throw RangeError(`${name} in insufficent Range`)    
}