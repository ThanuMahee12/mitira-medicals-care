import { error_array, error_Integer } from "../ErrorHandling/type_error.js"

class Pagination{
    #data
    #resources
    #pages
    #last_page
    #current_page
    #count
    constructor({resource=[],current_page=1,count=10}){
        error_array(resource,'resources')
        error_Integer(current_page,'current page')
        error_Integer(count,'no of items')
        this.resource=resource
        this.current_page=current_page
        this.count=count
        this.last_page=Math.ceil(resource.length/count)

    }
    splitpages(){
       let [first_index,last_index]=this.#childindex()
       


    }

    #childindex(){
        let first_index=(this.current_page-1)*this.count,last_index=this.current_page*(this.count-1)
        return [first_index,last_index]
    }

}