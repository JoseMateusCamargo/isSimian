function RegistryDao(connection){
    this._connection = connection;
}

RegistryDao.prototype.salva = function(dna, status, callback){
    this._connection.query('INSERT INTO issimian(dna, status) VALUES(?,?)', [dna, status], callback);
}

RegistryDao.prototype.select = function(dna, callback){
    this._connection.query('SELECT ID from issimian WHERE dna = ? LIMIT 1', dna, callback);
}

RegistryDao.prototype.stats = function(callback){
    this._connection.query('SELECT sum(case when status = "False" then 1 else 0 end) AS count_human_dna, sum(case when status = "True" then 1 else 0 end) AS count_mutant_dna, (sum(case when status = "False" then 1 else 0 end)/ sum(case when status = "True" then 1 else 0 end)) as ratio FROM issimian', callback);
}

module.exports = function(){
    return RegistryDao;
}

