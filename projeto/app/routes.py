from flask import Blueprint, render_template
from app.models import Cliente, Imovel, ApoliceSeguro, CoberturaSeguro, Pagamento, Corretor, Seguradora, EventoSinistro
from app import db

main = Blueprint('main', __name__)

@main.route('/')
def home():
    clientes = Cliente.query.all()
    imoveis = Imovel.query.all()
    apolices = ApoliceSeguro.query.all()
    coberturas = CoberturaSeguro.query.all()
    pagamentos = Pagamento.query.all()
    corretores = Corretor.query.all()
    seguradoras = Seguradora.query.all()
    eventos_sinistros = EventoSinistro.query.all()

    return render_template(
        'home.html',
        clientes=clientes,
        imoveis=imoveis,
        apolices=apolices,
        coberturas=coberturas,
        pagamentos=pagamentos,
        corretores=corretores,
        seguradoras=seguradoras,
        eventos_sinistros=eventos_sinistros
    )
