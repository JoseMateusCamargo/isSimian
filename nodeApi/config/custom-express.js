const express = require('express');
var consign = require('consign');
var bodyParser = require('body-parser');
//var expressValidator = require('express-validator');
var { check, validationResult } = require('express-validator');

module.exports = function(){
    const app = express();

    app.use(bodyParser.urlencoded({extended: true}));
    app.use(bodyParser.json());

    //app.use(expressValidator());
    app.use(check());

    consign()
        .include('controllers')
        .then('persistencia')
        .into(app);

    return app;
}