from app import db

class Cliente(db.Model):
    ClienteID = db.Column(db.Integer, primary_key=True)
    Nome = db.Column(db.String(255))
    Endereco = db.Column(db.String(255))
    Telefone = db.Column(db.String(15))
    Email = db.Column(db.String(255))

    def __repr__(self):
        return f"Cliente(ID: {self.ClienteID}, Nome: {self.Nome})"


class Imovel(db.Model):
    ImovelID = db.Column(db.Integer, primary_key=True)
    Endereco = db.Column(db.String(255))
    TipoImovel = db.Column(db.String(50))
    ValorImovel = db.Column(db.DECIMAL(10, 2))

    def __repr__(self):
        return f"Imovel(ID: {self.ImovelID}, Endereco: {self.Endereco})"


class ApoliceSeguro(db.Model):
    ApoliceID = db.Column(db.Integer, primary_key=True)
    ClienteID = db.Column(db.Integer, db.ForeignKey('cliente.ClienteID'))
    ImovelID = db.Column(db.Integer, db.ForeignKey('imovel.ImovelID'))
    DataInicio = db.Column(db.Date)
    DataTermino = db.Column(db.Date)
    Premio = db.Column(db.DECIMAL(10, 2))

    Cliente = db.relationship('Cliente', backref='apolices')
    Imovel = db.relationship('Imovel', backref='apolices')

    def __repr__(self):
        return f"ApoliceSeguro(ID: {self.ApoliceID}, Cliente: {self.Cliente.Nome}, Imovel: {self.Imovel.Endereco})"


class CoberturaSeguro(db.Model):
    CoberturaID = db.Column(db.Integer, primary_key=True)
    Descricao = db.Column(db.String(255))
    ValorCobertura = db.Column(db.DECIMAL(10, 2))
    ApoliceID = db.Column(db.Integer, db.ForeignKey('apolice_seguro.ApoliceID'))

    Apolice = db.relationship('ApoliceSeguro', backref='coberturas')

    def __repr__(self):
        return f"CoberturaSeguro(ID: {self.CoberturaID}, Descricao: {self.Descricao})"


class Pagamento(db.Model):
    PagamentoID = db.Column(db.Integer, primary_key=True)
    ApoliceID = db.Column(db.Integer, db.ForeignKey('apolice_seguro.ApoliceID'))
    ClienteID = db.Column(db.Integer, db.ForeignKey('cliente.ClienteID'))
    DataPagamento = db.Column(db.Date)
    ValorPagamento = db.Column(db.DECIMAL(10, 2))

    Apolice = db.relationship('ApoliceSeguro', backref='pagamentos')
    Cliente = db.relationship('Cliente', backref='pagamentos')

    def __repr__(self):
        return f"Pagamento(ID: {self.PagamentoID}, Apolice: {self.Apolice.ApoliceID}, Cliente: {self.Cliente.Nome})"


class Corretor(db.Model):
    CorretorID = db.Column(db.Integer, primary_key=True)
    Nome = db.Column(db.String(255))
    NumeroRegistro = db.Column(db.String(50))
    Contato = db.Column(db.String(15))

    def __repr__(self):
        return f"Corretor(ID: {self.CorretorID}, Nome: {self.Nome})"


class Seguradora(db.Model):
    SeguradoraID = db.Column(db.Integer, primary_key=True)
    Nome = db.Column(db.String(255))
    Endereco = db.Column(db.String(255))
    Contato = db.Column(db.String(15))

    def __repr__(self):
        return f"Seguradora(ID: {self.SeguradoraID}, Nome: {self.Nome})"


class EventoSinistro(db.Model):
    SinistroID = db.Column(db.Integer, primary_key=True)
    ApoliceID = db.Column(db.Integer, db.ForeignKey('apolice_seguro.ApoliceID'))
    DataSinistro = db.Column(db.Date)
    DescricaoSinistro = db.Column(db.String(255))
    ValorSinistro = db.Column(db.DECIMAL(10, 2))

    Apolice = db.relationship('ApoliceSeguro', backref='sinistros')

    def __repr__(self):
        return f"EventoSinistro(ID: {self.SinistroID}, Apolice: {self.Apolice.ApoliceID})"
