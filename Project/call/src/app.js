const https = require('https');
const fs = require('fs');
const key = fs.readFileSync('localhost.decrypted.key');
const cert = fs.readFileSync('localhost.crt');
const express = require('express');
const app = express();
const server = https.createServer({ key, cert }, app);
let io = require( 'socket.io' )( server );
let stream = require( './ws/stream' );
let path = require( 'path' );

app.use( '/assets', express.static( path.join( __dirname, 'assets' ) ) );
app.get('/', (req, res, next) => {
  res.sendFile( __dirname + '/index.html' );
});
io.of( '/stream' ).on( 'connection', stream );
const port = 8443;
server.listen(port, () => {
  console.log(`Server is listening over HTTPs on https://localhost:${port}`);
});