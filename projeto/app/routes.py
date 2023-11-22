from flask import Blueprint, render_template
from app.models import Cliente, Imovel, ApoliceSeguro, CoberturaSeguro, Pagamento, Corretor, Seguradora, EventoSinistro

main = Blueprint('main', __name__)

@main.route('/')
def home():
    # Adicione lógica para recuperar dados do banco de dados e renderizar o template
    return render_template('home.html')
