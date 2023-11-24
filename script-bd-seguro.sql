-- Tabela Cliente
CREATE TABLE Cliente (
    ClienteID INT PRIMARY KEY,
    Nome VARCHAR(255),
    Endereco VARCHAR(255),
    Telefone VARCHAR(15),
    Email VARCHAR(255)
);

-- Tabela Imovel
CREATE TABLE Imovel (
    ImovelID INT PRIMARY KEY,
    Endereco VARCHAR(255),
    TipoImovel VARCHAR(50),
    ValorImovel DECIMAL(10, 2)
);

-- Tabela ApoliceSeguro
CREATE TABLE ApoliceSeguro (
    ApoliceID INT PRIMARY KEY,
    ClienteID INT,
    ImovelID INT,
    DataInicio DATE,
    DataTermino DATE,
    Premio DECIMAL(10, 2),
    FOREIGN KEY (ClienteID) REFERENCES Cliente(ClienteID),
    FOREIGN KEY (ImovelID) REFERENCES Imovel(ImovelID)
);

-- Tabela CoberturaSeguro
CREATE TABLE CoberturaSeguro (
    CoberturaID INT PRIMARY KEY,
    Descricao VARCHAR(255),
    ValorCobertura DECIMAL(10, 2),
    ApoliceID INT,
    FOREIGN KEY (ApoliceID) REFERENCES ApoliceSeguro(ApoliceID)
);

-- Tabela Pagamento
CREATE TABLE Pagamento (
    PagamentoID INT PRIMARY KEY,
    ApoliceID INT,
    ClienteID INT,
    DataPagamento DATE,
    ValorPagamento DECIMAL(10, 2),
    FOREIGN KEY (ApoliceID) REFERENCES ApoliceSeguro(ApoliceID),
    FOREIGN KEY (ClienteID) REFERENCES Cliente(ClienteID)
);

-- Tabela Corretor
CREATE TABLE Corretor (
    CorretorID INT PRIMARY KEY,
    Nome VARCHAR(255),
    NumeroRegistro VARCHAR(50),
    Telefone VARCHAR(15),
    Email VARCHAR(255)
);

-- Tabela Seguradora
CREATE TABLE Seguradora (
    SeguradoraID INT PRIMARY KEY,
    Nome VARCHAR(255),
    Endereco VARCHAR(255),
    Telefone VARCHAR(15),
    Email VARCHAR(255)
);

-- Tabela EventoSinistro
CREATE TABLE EventoSinistro (
    SinistroID INT PRIMARY KEY,
    ApoliceID INT,
    DataSinistro DATE,
    DescricaoSinistro VARCHAR(255),
    ValorSinistro DECIMAL(10, 2),
    FOREIGN KEY (ApoliceID) REFERENCES ApoliceSeguro(ApoliceID)
);
