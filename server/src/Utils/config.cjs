exports.PORT = process.env.BACKEND_PORT || 8080;
exports.Host = process.env.BACKEND_HOST || 'localhost';

exports.fun_listen = (error) => {
  if (error) console.error(`Exeption found when running the server ${error}`)
  console.log(`server running http://localhost:${exports.PORT}`)
}
