var mysql = require('mysql');

function createDBConnection(){
    return mysql.createConnection({
        host: 'localhost',
        user: 'pfwkfmqh_laravel',
        password: 'q1w2e3r4',
        database: 'pfwkfmqh_issimian'
    });
}

module.exports = function(){
    return createDBConnection;
}