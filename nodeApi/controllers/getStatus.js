module.exports = function(app){

    app.get("/stats", function(req, res){
        console.log('Recebida requisição de teste na porta 3000.')

        var connection = app.persistencia.connectionFactory();
        var registryDao = new app.persistencia.RegistryDao(connection);

        registryDao.stats(function(exception, result){
            console.log(result);
            res.send(result);
        });
    });

    app.post("/simian", function(req, res){

        var dna = req.body;
        console.log('Processando requisição...');

        var connection = app.persistencia.connectionFactory();
        var registryDao = new app.persistencia.RegistryDao(connection);

        //const dnaStr = req.body.dna;

        const dnaStr = req.body.dna.toString().trim().replace(/,/g, ' ');

        console.log(dnaStr);

        registryDao.select(dnaStr.toString(), function(exception, result){ 

            if(result != ''){
                console.log('DNA já registrado: ' + dnaStr);
                res.send('DNA já registrado');
                return 0;
            }

            //start script
            var spawn = require("child_process").spawn;
            var process = spawn('python', ["./python/isSimian.py", dnaStr]);

            process.stdout.on('data', function(data){

                const status = data.toString().trim();
                            
                registryDao.salva(dnaStr, status, function(exception, result){
                console.log('DNA salvo: ' + dnaStr.toString());
                    //res.json(dna);
                });

                if(status == 'True') {
                    res.status(200).send();
                } else {
                    res.status(403).send();     
                }
            });
        });
    })
}