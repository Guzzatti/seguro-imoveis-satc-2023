CREATE TABLE cliente (
    cliente_id INT PRIMARY KEY,
    nome_cliente VARCHAR(255),
    endereco_cliente VARCHAR(255),
    telefone_cliente VARCHAR(15),
    email_cliente VARCHAR(255)
);

CREATE TABLE imovel (
    imovel_id INT PRIMARY KEY,
    cliente_id INT REFERENCES cliente(cliente_id),
    endereco_imovel VARCHAR(255),
    tipo_imovel VARCHAR(50),
    valor_imovel DECIMAL(12, 2)
);


CREATE TABLE apolice_seguro (
    apolice_id INT PRIMARY KEY,
    cliente_id INT UNIQUE REFERENCES cliente(cliente_id),
    imovel_id INT UNIQUE REFERENCES imovel(imovel_id),
    seguradora_id INT REFERENCES seguradora(seguradora_id),
    data_inicio DATE,
    data_termino DATE,
    premio DECIMAL(12, 2)
);


CREATE TABLE cobertura_seguro (
    cobertura_id INT PRIMARY KEY,
    descricao VARCHAR(255),
    corretor_id INT REFERENCES corretor(corretor_id),
    valor_cobertura DECIMAL(10, 2),
    apolice_id INT REFERENCES apolice_seguro(apolice_id)
);


CREATE TABLE pagamento (
    pagamento_id INT PRIMARY KEY,
    apolice_id INT REFERENCES apolice_seguro(apolice_id),
    data_pagamento DATE,
    valor_pagamento DECIMAL(10, 2)
);


CREATE TABLE corretor (
    corretor_id INT PRIMARY KEY,
    nome_corretor VARCHAR(255),
    numero_registro VARCHAR(50),
    seguradora_id INT REFERENCES seguradora(seguradora_id),
    telefone_corretor VARCHAR(15),
    email_corretor VARCHAR(255)
);

CREATE TABLE seguradora (
    seguradora_id INT PRIMARY KEY,
    nome_seguradora VARCHAR(255) UNIQUE,
    endereco_seguradora VARCHAR(255),
    telefone_seguradora VARCHAR(15),
    email_seguradora VARCHAR(255)
);

CREATE TABLE evento_sinistro (
    sinistro_id INT PRIMARY KEY,
    apolice_id INT REFERENCES apolice_seguro(apolice_id),
    data_sinistro DATE,
    descricao_sinistro VARCHAR(255),
    valor_sinistro DECIMAL(12, 2)
);