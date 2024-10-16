import {Sequelize} from 'sequelize'
const host=process.env.DB_HOST
const username=process.env.DB_USERNAME
const password=process.env.DB_PASSWORD
const db_name=process.env.DB_DATABASE_NAME
const db=process.env.DB_DATABSE

const database=new Sequelize(db_name,username,password,{
    dialect:db,
    host:host,
    logging: (...msg) => console.log(msg), // Displays all log function call parameters
})
export const verifyDatabase=async()=>{
        try {
            await database.authenticate();
            console.log('Connection has been established successfully.');  
        } catch (error) {
            console.error('Unable to connect to the database:', error);
        }
    
}

export default database