1) Download openssl for windows
-- https://www.openssl.org/source/
-- https://wiki.openssl.org/index.php/Bi...
-- https://indy.fulgan.com/SSL/
2) Configure  openssl it in your windows path
3) Create directory with .cfg file
4) Change config directory with open SSL
set OPENSSL_CONF=C:\openssl\openssl.cfg
5) Generate CA - Certificate Authority - key and certificate (third-party)
openssl genrsa -out CA.key -des3 2048
openssl req -x509 -sha256 -new -nodes -days 3650 -key CA.key -out CA.pem
6) Generate certificate for your domain
- create file localhost.ext
- Generate a key: openssl genrsa -out localhost.key -des3 2048
- Generate a certificate request: openssl req -new -key localhost.key -out localhost.csr
- Generate certiticate: openssl x509 -req -in localhost.csr -CA CA.pem -CAkey CA.key -CAcreateserial -days 3650 -sha256 -extfile localhost.ext -out localhost.crt
7) Store decripted key: openssl rsa -in localhost.key -out localhost.decrypted.key
8) Install node modules for express and https: npm i express https
9) Include Certificate and Key in NodeJs Server.
> Run node program