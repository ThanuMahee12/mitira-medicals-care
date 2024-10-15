import morgan from "morgan";
import fs from "fs"


// Create a write stream (in append mode)
const accessLogStream = fs.createWriteStream( '../api.log', { flags: 'a' });

// morgan.token('param', function(req, res, param) {
//     return req.params[param];
// });
morgan.token('host', function(req, res) {
    return req.hostname;
});
morgan.token('res', function(req, res) {
    return res
});
const logger=morgan(':status  :method Host: :host URL: :url -- :response-time ms -- :res[content-length]', { stream: accessLogStream })
export const consoleLogger=(req,res,next)=>{
    console.log(`Host:${req.hostname} Method:${req.method} URL:${req.url} Status:${ res.statusCode} Params: ${req.params?.length} Body: ${res.body} `);
    next()
}
export default logger
