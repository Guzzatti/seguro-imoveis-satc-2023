INSERT INTO cliente (nome_cliente, endereco_cliente, telefone_cliente, email_cliente)
VALUES
('João Vitor', 'Rua A, 123', '+55 11 98765-4321', 'joao.vitor@gmail.com'),
('Maria Oliveira', 'Av. B, 456', '+55 21 99876-5432', 'maria.oliveira@gmail.com'),
('Carlos Santos', 'Rua C, 789', '+55 31 98765-8765', 'carlos.santos@gmail.com'),
('Fernanda de Souza', 'Rua D, 321', '+55 11 12345-6789', 'fernanda@gmail.com'),
('Ricardo Silva', 'Av. E, 654', '+55 21 98765-4321', 'ricardo@gmail.com'),
('Patricia Duarte', 'Rua F, 987', '+55 31 87654-3210', 'patricia@gmail.com'),
('Pedro Pinto', 'Av. G, 789', '+55 11 5555-1111', 'pedro@gmail.com'),
('Isabela Rodrigues', 'Rua H, 987', '+55 21 6666-2222', 'isabela@gmail.com'),
('Felipe Rocha', 'Av. I, 654', '+55 31 7777-3333', 'felipe@gmail.com'),
('Amanda Lima', 'Rua J, 321', '+55 41 8888-4444', 'amanda@gmail.com')

INSERT INTO imovel (cliente_id, endereco_imovel, tipo_imovel, valor_imovel)
VALUES
(1, 'Rua A, 123', 'Casa', 300000.00),
(2, 'Av. B, 456', 'Apartamento', 200000.00),
(3, 'Rua C, 789', 'Casa', 250000.00),
(4, 'Rua D, 321', 'Apartamento', 180000.00),
(5, 'Av. E, 654', 'Casa', 280000.00),
(6, 'Rua F, 987', 'Apartamento', 220000.00),
(7, 'Av. G, 789', 'Casa', 350000.00),
(8, 'Rua H, 987', 'Apartamento', 180000.00),
(9, 'Av. I, 654', 'Casa', 270000.00),
(10, 'Rua J, 321', 'Apartamento', 200000.00)

INSERT INTO seguradora (nome_seguradora, endereco_seguradora, telefone_seguradora, email_seguradora)
VALUES
('Seguradora A', 'Av. X, 789', '+55 11 1111-2222', 'contato@seguradoraA.com'),
('Seguradora B', 'Rua Y, 456', '+55 21 2222-3333', 'contato@seguradoraB.com'),
('Seguradora C', 'Av. Z, 123', '+55 31 3333-4444', 'contato@seguradoraC.com'),
('Seguradora D', 'Av. W, 987', '+55 11 5555-7777', 'contato@seguradoraD.com'),
('Seguradora E', 'Rua X, 654', '+55 21 6666-8888', 'contato@seguradoraE.com'),
('Seguradora F', 'Av. Y, 321', '+55 31 7777-9999', 'contato@seguradoraF.com'),
('Seguradora G', 'Rua K, 123', '+55 11 1111-5555', 'contato@seguradoraG.com'),
('Seguradora H', 'Av. L, 456', '+55 21 2222-6666', 'contato@seguradoraH.com'),
('Seguradora I', 'Rua M, 789', '+55 31 3333-7777', 'contato@seguradoraI.com'),
('Seguradora J', 'Av. N, 987', '+55 41 4444-8888', 'contato@seguradoraJ.com')

INSERT INTO corretor (nome_corretor, numero_registro, seguradora_id, telefone_corretor, email_corretor)
VALUES
('Ana 1', 'CR123', 1, '+55 11 5555-6666', 'ana.1@corretora.com'),
('José 2', 'CR456', 2, '+55 21 6666-7777', 'jose.2@corretora.com'),
('Mariana 3', 'CR789', 3, '+55 31 7777-8888', 'mariana.3@corretora.com'),
('Roberto 4', 'CR234', 1, '+55 11 2222-3333', 'roberto.4@corretora.com'),
('Camila 5', 'CR567', 2, '+55 21 3333-4444', 'camila.5@corretora.com'),
('Lucas Fortunato Martins', 'CR890', 3, '+55 31 4444-5555', 'lucasfm20@corretora.com'),
('Rafaela 6', 'CR567', 1, '+55 11 5555-9999', 'rafaela.6@corretora.com'),
('Luciano 7', 'CR890', 2, '+55 21 6666-0000', 'luciano.7@corretora.com'),
('Gabriel Guzzati', 'CR123', 3, '+55 31 7777-1111', 'guzzateradasnovinha+18@corretora.com'),
('João Pedro Darabas', 'CR456', 4, '+55 41 8888-2222', 'jpdarabas@corretora.com')

INSERT INTO cobertura (descricao, premio, limite_indenizacao, seguradora_id, obrigatorio)
VALUES
('Roubo', 500.00, 10000.00, 1, true),
('Incêndio', 400.00, 8000.00, 2, true),
('Danos Elétricos', 300.00, 6000.00, 3, false),
('Vidros Quebrados', 150.00, 3000.00, 1, false),
('Responsabilidade Civil', 200.00, 5000.00, 2, true),
('Furto Qualificado', 120.00, 2000.00, 3, false),
('Assistência 24 horas', 100.00, 2000.00, 1, false),
('Danos Morais', 250.00, 5000.00, 2, true),
('Furto Simples', 80.00, 1000.00, 3, false),
('Riscos Atmosféricos', 180.00, 3000.00, 4, true)

INSERT INTO apolice_seguro (cliente_id, imovel_id, seguradora_id, corretor_id, data_inicio, data_termino)
VALUES
(1, 1, 1, 1, '2023-01-01', '2024-01-01'),
(2, 2, 2, 2, '2023-02-01', '2024-02-01'),
(3, 3, 3, 3, '2023-03-01', '2024-03-01'),
(4, 4, 1, 1, '2023-04-01', '2024-04-01'),
(5, 5, 2, 2, '2023-05-01', '2024-05-01'),
(6, 6, 3, 3, '2023-06-01', '2024-06-01'),
(7, 7, 1, 1, '2023-07-01', '2024-07-01'),
(8, 8, 2, 2, '2023-08-01', '2024-08-01'),
(9, 9, 3, 3, '2023-09-01', '2024-09-01'),
(10, 10, 4, 4, '2023-10-01', '2024-10-01')

INSERT INTO cobertura_apolice (apolice_id, cobertura_id)
VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10)

INSERT INTO pagamento (apolice_id, data_pagamento, valor_pagamento)
VALUES
(1, '2023-01-15', 1500.00),
(2, '2023-02-15', 1200.00),
(3, '2023-03-15', 1300.00),
(4, '2023-04-15', 1400.00),
(5, '2023-05-15', 1100.00),
(6, '2023-06-15', 1200.00),
(7, '2023-07-15', 1600.00),
(8, '2023-08-15', 1300.00),
(9, '2023-09-15', 1400.00),
(10, '2023-10-15', 1500.00)

INSERT INTO evento_sinistro (apolice_id, data_sinistro, descricao_sinistro, valor_sinistro)
VALUES
(1, '2023-02-01', 'Roubo na residência', 10000.00),
(2, '2023-03-10', 'Incêndio no apartamento', 20000.00),
(3, '2023-04-05', 'Danos elétricos na casa', 15000.00),
(4, '2023-05-01', 'Vandalismo no apartamento', 8000.00),
(5, '2023-06-10', 'Roubo na residência', 15000.00),
(6, '2023-07-05', 'Danos causados por tempestade', 10000.00),
(7, '2023-08-01', 'Roubo na residência', 12000.00),
(8, '2023-09-10', 'Incêndio no apartamento', 25000.00),
(9, '2023-10-05', 'Vandalismo na casa', 18000.00),
(10, '2023-11-20', 'Inundação no apartamento', 20000.00)
